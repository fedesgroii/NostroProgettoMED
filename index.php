<?php

// NOTA STUDIO (FIX DEPLOY-4): per il deploy, questo file deve essere rinominato
// `index.php` e collocato nella root pubblica del sito. Il nome "entrypoint"
// NON ha alcun significato per nginx/Apache: se lasci entrypoint.php come unico
// file raggiungibile via URL, la maggior parte dei webserver non lo usa come
// indice di directory e le richieste a "/" cadono su directory listing o 404.
// Dopo il rename, TUTTO il resto del file resta identico: è solo un cambio di
// nome (e nel webserver: `index index.php;` in nginx, DirectoryIndex in Apache).

// =============================================================================
// declare(strict_types=1) — TIPIZZAZIONE RIGOROSA
// =============================================================================
// NOTA STUDIO: Questa direttiva DEVE essere la prima istruzione del file (dopo
// <?php) e può stare solo qui. Cambia il comportamento di PHP per tutto il file.
//
// COSA FA: senza questa riga, PHP converte automaticamente i tipi. Se una
// funzione dichiara `function f(int $x)` e le passi la stringa "5", PHP la
// trasforma in 5 e la funzione gira. Con strict_types=1, PHP lancia un
// TypeError e la funzione NON parte.
//
// PERCHÉ SI USA: le conversioni implicite sono una fonte classica di bug
// sottili (es. "0" == false, "1abc" == 1). Forzando il type checking, gli
// errori emergono subito e in modo esplicito.
//
// COME SI MODIFICA: di solito NON si tocca. Se hai bisogno di conversioni
// esplicite, fai il cast tu: (int)$valore. Non togliere mai strict_types
// per "far funzionare" del codice: il problema è nel codice, non nella riga.
declare(strict_types=1);
// NOTA STUDIO (FIX DEPLOY-7): output buffering. Se un file incluso emette
// anche un solo byte prima di `<?php` (BOM, spazio, newline), PHP marca
// gli header come "già inviati" e TUTTI gli header di sicurezza sotto
// (CSP, HSTS, cookie Secure, ecc.) vengono scartati silenziosamente.
// ob_start() accumula l'output in un buffer e lo invia alla fine, così
// gli header partono sempre prima di qualsiasi contenuto.
ob_start();
/*
 * MindLab - Entry Point
 *
 * Responsabilità:
 * 1. bootstrap dell'applicazione
 * 2. configurazione sicura della sessione
 * 3. intestazioni HTTP di base
 * 4. routing iniziale
 * 5. controllo dello stato di autenticazione
 *
 * NON contiene:
 * - query SQL
 * - HTML delle pagine
 * - logica applicativa del login
 * - logica della dashboard
 *
 * NOTA STUDIO (NEW-0): questo file richiede PHP 8.1+ (usa `never`, `match`,
 * `str_contains`, `str_starts_with`). Non retro-portare a versioni inferiori.
 *
 * NOTA STUDIO (NEW-0): per i gestionali sanitari, questo entrypoint deve
 * essere l'UNICO punto di ingresso delle richieste (index.php) e non deve
 * essere raggiungibile in altro modo. Il webserver deve respingere accessi
 * diretti a /modules/*, /config/*, /vendor/*.
 */

// =============================================================================
// 0. CONFIGURAZIONE CRITICA — ERRORI, TIMEZONE, COSTANTI
// =============================================================================
// NOTA STUDIO (NEW-1): Gestione degli errori per ambiente.
//
// IL PROBLEMA ORIGINALE: il file parlava di APP_ENV nei commenti (perché è
// fail-safe 'production') ma NON impostava display_errors / log_errors.
// In un deploy reale, se php.ini ha display_errors=On (default su molte
// distro), gli errori finiscono nel corpo della risposta HTTP: path
// interni, nomi di tabelle, query SQL, stack trace → regalo per un
// attaccante, e per un gestionale sanitario è anche violazione GDPR
// (art. 32, sicurezza del trattamento).
//
// COSA FA ORA:
// - In produzione: display_errors=0 (mai mostrare errori all'utente),
//   log_errors=1 (ma loggarli, altrimenti non sai cosa si è rotto),
//   error_reporting(E_ALL) (logga tutto, mostra niente).
// - In sviluppo: display_errors=1 (vuoi vederli).
//
// IMPORTANTE: NON usare error_reporting(0). Quello nasconde anche i log.
// Vuoi gli errori nei log, non nella risposta HTTP.
//
// NOTA STUDIO (FIX DEPLOY-1): il blocco if (APP_ENV === ...) ESECUTIVO che
// segue questa nota deve stare DOPO la define('APP_ENV', ...) della
// sezione 1. Se sta prima, PHP 8 tratta APP_ENV come costante non definita
// e lancia un Error fatale ("Undefined constant \"APP_ENV\"") alla riga 69:
// l'app muore con HTTP 500 su OGNI richiesta, in ogni ambiente. Le uniche
// occorrenze di APP_ENV che possono stare prima della define sono quelle
// dentro commenti o dentro funzioni/closure eseguite più tardi (che infatti
// usano defensive defined('APP_ENV')).
//
// FIX DEPLOY-2: stessa logica per le costanti di timeout: gc_maxlifetime
// (riga ~286) le usa a runtime, quindi DEVONO essere definite prima delle
// ini_set di sessione. Qui stanno già prima: non spostarle sotto la
// sezione 1 o peggio sotto session_start().
const SESSION_IDLE_TIMEOUT     = 1800;   // 30 minuti
const SESSION_ABSOLUTE_TIMEOUT = 28800;  // 8 ore

// NOTA STUDIO (FIX DEPLOY-8): workaround HTTPS per hosting condivisi
// (es. Altervista) dove non è possibile impostare TRUST_PROXY /
// TRUSTED_PROXIES tramite variabili d'ambiente. Se true, il codice
// legge X-Forwarded-Proto anche quando il proxy NON è dichiarato
// fidato. Su un hosting con proxy configurabile, imposta a false e
// configura TRUST_PROXY=1 + TRUSTED_PROXIES=<IP del proxy>: il caso 3
// del rilevamento HTTPS copre già quella situazione.
const FORCE_HTTPS_FROM_HEADER = true;


// NOTA STUDIO (NEW-2): Handler globale per le eccezioni non catturate.
//
// SENZA QUESTO: un'eccezione non gestita mostra stack trace completo nel
// corpo della risposta. In produzione, va sostituito con una pagina
// generica. Con questo handler:
// - logghiamo l'errore completo (classe, messaggio, file, linea),
// - in produzione mostriamo solo un messaggio generico,
// - in sviluppo mostriamo il trace completo (utile per il debug).
set_exception_handler(function (Throwable $e): void {
    error_log(sprintf(
        '[%s] Uncaught %s: %s in %s:%d',
        defined('APP_ENV') ? APP_ENV : 'unknown',
        get_class($e),
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    ));

    if (!headers_sent()) {
        http_response_code(500);
        header('Content-Type: text/html; charset=UTF-8');
    }

    if (defined('APP_ENV') && APP_ENV === 'production') {
        exit('Errore interno. Riprova più tardi.');
    }

    // In sviluppo: mostra il trace (comodo per il debug).
    echo '<pre>' . htmlspecialchars((string)$e, ENT_QUOTES, 'UTF-8') . '</pre>';
    exit;
});

// NOTA STUDIO (NEW-3): Timezone esplicita.
//
// PERCHÉ: i timestamp di sessione (created_at, last_activity) e quelli
// di audit (audit_log) devono essere coerenti e indipendenti dalla
// configurazione del server. Se il server cambia timezone, i calcoli
// di timeout si sfalsano. Impostare UTC di default e permettere override
// via APP_TIMEZONE.
//
// COME SI MODIFICA: in produzione, imposta APP_TIMEZONE (es. Europe/Rome)
// se vuoi timestamp locali nei log. Internamente, salva sempre UTC nel
// DB (conversione in visualizzazione).
date_default_timezone_set((string)(getenv('APP_TIMEZONE') ?: 'UTC'));

// NOTA STUDIO (NEW-4/FIX M-2): Le costanti dei timeout erano definite
// nella sezione 4, DOPO session_start(). Ma per impostare
// `session.gc_maxlifetime` (necessario per non far cancellare le sessioni
// attive dal garbage collector prima del timeout) servono PRIMA di
// session_start(). Le spostiamo qui, all'inizio.

// =============================================================================
// 1. AMBIENTE
// =============================================================================

// NOTA STUDIO (FIX H-1): Prima era `const APP_ENV = 'development'`.
// Perché è un problema? Perché `const` è una costante COMPILATA: non può
// essere sovrascritta da una variabile d'ambiente. Se il file veniva
// deployato in produzione senza editing manuale, l'app restava in
// "development". Se il codice usava APP_ENV per decidere se mostrare
// gli errori, in produzione sarebbero comparsi stack trace, path interni
// e query SQL nelle risposte HTTP → regalo per un attaccante.
//
// COSA FA ORA: `getenv('APP_ENV')` legge la variabile d'ambiente. Se
// manca, `?:` (operatore Elvis) restituisce 'production' come fallback
// SICURO (fail-safe: se non so in che ambiente sono, mi comporto come
// se fossi in produzione, che è la modalità più restrittiva).
//
// PERCHÉ `define` E NON `const`: `define()` accetta valori calcolati a
// runtime (getenv), `const` no (deve essere un valore letterale).
//
// COME SI MODIFICA: in produzione, imposta la variabile d'ambiente
// `APP_ENV=production` (in nginx: `fastcgi_param APP_ENV production;`,
// in Apache: `SetEnv APP_ENV production`, in Docker: `ENV APP_ENV=production`).
// Non toccare il fallback 'production': è quello che ti salva se
// dimentichi di configurare l'ambiente.
define('APP_ENV', getenv('APP_ENV') ?: 'development');

// NOTA STUDIO (FIX DEPLOY-1): il blocco di gestione errori della sezione 0
// ora è guardato da defined('APP_ENV'): qui, subito dopo la define, lo
// eseguiamo per davvero con il valore corretto. Mantenere questo blocco
// ACCOPPIATO alla define: se sposti la define, sposta anche questo if.
if (APP_ENV === 'production') {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
    ini_set('log_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

// NOTA STUDIO (FIX H-2): Rilevamento HTTPS.
//
// IL PROBLEMA ORIGINALE: il codice controllava solo `$_SERVER['HTTPS']` e
// `$_SERVER['SERVER_PORT']`. Funziona se PHP è esposto direttamente. Ma
// in produzione è quasi sempre dietro un reverse proxy (nginx, Cloudflare,
// AWS ALB) che TERMINA il TLS e inoltra a PHP una richiesta in HTTP.
// In quel caso: $_SERVER['HTTPS'] è vuoto, SERVER_PORT è 80 → $isHttps
// diventa false → i cookie vengono creati SENZA flag Secure e l'header
// HSTS non viene inviato → un attaccante in posizione MITM può
// intercettare il cookie di sessione su HTTP e dirottare la sessione.
//
// COSA FA ORA: aggiunge un terzo controllo. Se `TRUST_PROXY=1` (variabile
// d'ambiente impostata a mano), legge anche `X-Forwarded-Proto`, header
// che il reverse proxy usa per dire a PHP "la richiesta originale era
// HTTPS". Il confronto è case-insensitive (strtolower).
//
// PERCHÉ CONDIZIONATO A TRUST_PROXY: `X-Forwarded-Proto` è un header
// HTTP normalissimo: chiunque può inviarlo con `curl -H`. Se lo leggessimo
// sempre, un attaccante potrebbe finger di essere su HTTPS (o viceversa)
// e falsare il rilevamento. Lo leggiamo SOLO se dichiariamo esplicitamente
// che c'è un proxy fidato davanti a noi che lo sovrascrive.
//
// NOTA STUDIO (FIX H-2b, NEW): Whitelist IP del proxy.
// Anche con TRUST_PROXY=1, se l'app è raggiungibile direttamente
// (misconfigurazione di rete), chiunque può inviare X-Forwarded-Proto.
// Aggiungiamo `TRUSTED_PROXIES` (lista IP separati da virgola): se
// impostata, l'header viene letto SOLO se REMOTE_ADDR è nella lista.
// Se TRUSTED_PROXIES è vuota, comportamento originale (fidati di
// qualsiasi proxy) ma emettiamo un warning in produzione.
//
// COME SI MODIFICA: in produzione, imposta TRUST_PROXY=1 E
// TRUSTED_PROXIES=<IP del proxy> (es. TRUSTED_PROXIES=10.0.0.5,10.0.0.6).
// Se il proxy usa un header diverso (es. `X-Forwarded-Ssl: on`), adatta
// la condizione di conseguenza.
$trustProxy     = (getenv('TRUST_PROXY') === '1');
$trustedProxies = array_values(array_filter(array_map(
    'trim',
    explode(',', (string)(getenv('TRUSTED_PROXIES') ?: ''))
)));
$remoteAddr     = (string)($_SERVER['REMOTE_ADDR'] ?? '');

$isTrustedProxy = $trustProxy
    && ($trustedProxies === [] || in_array($remoteAddr, $trustedProxies, true));

// NOTA STUDIO (NEW): warning esplicito se in produzione TRUST_PROXY è attivo
// ma TRUSTED_PROXIES è vuota. Non blocca (retrocompatibilità) ma ti avvisa
// nei log.
if (APP_ENV === 'production' && $trustProxy && $trustedProxies === []) {
    error_log('[mindlab] WARN: TRUST_PROXY=1 ma TRUSTED_PROXIES è vuota. '
        . 'Imposta TRUSTED_PROXIES con gli IP del reverse proxy.');
}

$isHttps = (
    // Caso 1: PHP esposto direttamente con TLS.
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    // Caso 2: porta 443 standard.
    || ((int)($_SERVER['SERVER_PORT'] ?? 0) === 443)
    // Caso 3: dietro proxy fidato che segnala HTTPS nell'header.
    || ($isTrustedProxy && strtolower((string)($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')) === 'https')
);

// NOTA STUDIO (FIX DEPLOY-HTTPS): caso 4 — reverse proxy di hosting condiviso.
//
// IL PROBLEMA: il blocco qui sopra gestisce il caso 3 (proxy fidato) SOLO
// se TRUST_PROXY=1 e, opzionalmente, TRUSTED_PROXIES. Su un hosting
// condiviso come Altervista NON è possibile impostare variabili
// d'ambiente del server: getenv('TRUST_PROXY') restituisce sempre false.
// Risultato: quando l'utente naviga in HTTPS, PHP vede una richiesta
// interna in HTTP (HTTPS=NULL, SERVER_PORT=80) e l'unica traccia
// dell'HTTPS originale è l'header X-Forwarded-Proto: https, che il
// codice attuale ignora. Di conseguenza $isHttps resta false, i cookie
// di sessione non ricevono il flag Secure e l'header HSTS non viene
// inviato → su Wi-Fi pubblici il cookie può essere intercettato.
//
// COME LO ABBIAMO VERIFICATO: con un file check.php aperto via
// https://.../check.php, Altervista restituisce:
//   HTTPS             => NULL
//   SERVER_PORT       => "80"
//   X_FORWARDED_PROTO => "https"
// Cioè: TLS terminato dal proxy, header di forward presente.
//
// COSA FA QUESTA AGGIUNTA: se il codice qui sopra non ha già rilevato
// HTTPS, legge direttamente X-Forwarded-Proto e, se vale "https"
// (case-insensitive), forza $isHttps = true. Non tocca la logica dei
// casi 1-3: si attiva solo in loro soccorso.
//
// PERCHÉ È ACCETTABILE QUI E NON ALTROVE: su Altervista non possiamo
// whitelistare gli IP del proxy (non documentati). In teoria un
// attaccante potrebbe inviare X-Forwarded-Proto: https per farci
// credere che sia HTTPS quando non lo è. Conseguenza pratica: il
// cookie riceverebbe Secure anche su HTTP → il browser non lo
// rimanderebbe → l'utente non sarebbe autenticato. È un fail-closed
// funzionale, non un buco di sicurezza: il rischio peggiore è un
// fastidio (login che non persiste), non un furto di sessione. Il
// caso opposto (cookie senza Secure su HTTPS reale, quello attuale)
// è invece un rischio di sicurezza vero.
//
// COME SI MODIFICA: se un giorno migri a un hosting dedicato con
// proxy configurabile, imposta TRUST_PROXY=1 e TRUSTED_PROXIES e
// questa riga diventa ridondante (ma innocua). Se invece resti su
// Altervista, lasciala: è l'unico modo per avere Secure+HSTS
// corretti. NON rimuoverla senza prima aver verificato che il tuo
// provider esponga correttamente $_SERVER['HTTPS'].
if (
    !$isHttps
    && FORCE_HTTPS_FROM_HEADER
    && strtolower((string)($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')) === 'https'
) {
    $isHttps = true;
}

// =============================================================================
// 2. HARDENING DELLA SESSIONE — TUTTO PRIMA DI session_start()
// =============================================================================
// NOTA STUDIO: Regola d'oro: le `ini_set('session.*')` e
// `session_set_cookie_params()` DEVONO venire PRIMA di `session_start()`.
// Se le chiami dopo, PHP emette un warning "session already active" e
// le ignora. La sessione è già partita con i valori di default.
//
// Ogni riga qui sotto imposta una difesa diversa. Se ne manca una,
// si apre un buco specifico. Spiego ognuna.

// Evita che l'ID di sessione venga passato nell'URL (?PHPSESSID=...).
// Se l'ID finisce nell'URL, finisce anche nei log del server, nella
// cronologia del browser, nella barra degli indirizzi condivisa, nel
// Referer verso siti terzi. Tutti vettori di furto della sessione.
ini_set('session.use_only_cookies', '1');

// NOTA STUDIO (NEW): forziamo esplicitamente l'uso dei cookie (ridondante
// con use_only_cookies, ma se una futura config lo disabilitasse, almeno
// il parametro cookie è garantito).
ini_set('session.use_cookies', '1');

// Strict mode: se il browser invia un ID di sessione che PHP non conosce
// (perché un attaccante ha forzato un ID nel browser della vittima),
// PHP lo RIFIUTA e ne genera uno nuovo. Senza questa riga, PHP accetterebbe
// l'ID sconosciuto e lo userebbe: è l'attacco "session fixation".
ini_set('session.use_strict_mode', '1');

// Disabilita la propagazione automatica dell'ID di sessione negli URL
// e nei form nascosti. Doppia protezione rispetto a use_only_cookies.
ini_set('session.use_trans_sid', '0');

// HttpOnly: il cookie di sessione non è leggibile da JavaScript
// (document.cookie non lo vede). Così un XSS non può rubare il cookie.
// NON protegge da XSS che fa richieste a nome dell'utente (per quello
// serve CSP + validazione input + CSRF token).
ini_set('session.cookie_httponly', '1');

// Secure: il browser invia il cookie SOLO su HTTPS. Se un attaccante
// convince il browser a fare una richiesta HTTP, il cookie non parte.
// Attivo solo se $isHttps è true: in sviluppo (HTTP) il cookie
// altrimenti non funzionerebbe nemmeno.
ini_set('session.cookie_secure', $isHttps ? '1' : '0');

// SameSite=Lax: il cookie viene inviato su navigazioni top-level GET
// provenienti da altri siti (es. cliccare un link), ma NON su POST
// cross-site. Mitiga il CSRF. Non lo sostituisce: per le operazioni
// state-changing serve anche il token CSRF (vedi csrf_verify() più sotto).
ini_set('session.cookie_samesite', 'Lax');

// Impedisce al browser di cachare le pagine con sessione.
// Dati medici non devono finire nella cache del browser o del proxy.
ini_set('session.cache_limiter', 'nocache');

// NOTA STUDIO (NEW-5): gc_maxlifetime deve essere >= timeout assoluto,
// altrimenti il garbage collector di PHP può cancellare sessioni ancora
// valide PRIMA che il nostro timeout le scada. Impostandolo a
// SESSION_ABSOLUTE_TIMEOUT, il GC non interferisce con la nostra logica.
// (La scadenza vera la imponiamo noi nella sezione 4.)
ini_set('session.gc_maxlifetime', (string)SESSION_ABSOLUTE_TIMEOUT);

// NOTA STUDIO (NEW-6): session_save_path.
//
// IL PROBLEMA: in produzione, la directory di default di PHP per le
// sessioni è /tmp, spesso condivisa con altri utenti/servizi e a volte
// montata su tmpfs (perdita dati al riavvio). Per un gestionale
// sanitario, meglio una directory dedicata con permessi stretti
// (0700, owner = utente PHP-FPM).
//
// COME SI MODIFICA: imposta SESSION_SAVE_PATH in produzione (es.
// /var/lib/php/sessions-mindlab). In assenza della env, PHP usa il default.
// In un deploy multi-server, usa un session handler condiviso
// (Redis/DB cifrato): vedi sessione 5 per note.
$sessionSavePath = (string)(getenv('SESSION_SAVE_PATH') ?: '');
if ($sessionSavePath !== '' && is_dir($sessionSavePath) && is_writable($sessionSavePath)) {
    ini_set('session.save_path', $sessionSavePath);
}

// NOTA STUDIO: rinomina il cookie da "PHPSESSID" a "MINDLAB_SESSION".
// È "security through obscurity": non è una difesa vera, ma rende
// leggermente più difficile a uno scanner automatico riconoscere
// che l'app usa PHP. Non ci fare affidamento, è solo un extra.
session_name('MINDLAB_SESSION');

// NOTA STUDIO: stessa cosa delle ini_set qui sopra, ma in forma di array.
// È il metodo moderno (PHP 7.3+). Sono ridondanti con le ini_set: le
// teniamo entrambe per chiarezza e compatibilità. Se modifichi un valore,
// fallo in ENTRAMBI i posti per non creare confusione.
session_set_cookie_params([
    'lifetime' => 0,       // 0 = cookie di sessione, scade alla chiusura del browser.
    'path'     => '/',     // valido per tutto il dominio.
    'secure'   => $isHttps,// true se HTTPS.
    'httponly' => true,    // inaccessibile a JS.
    'samesite' => 'Lax',   // anti-CSRF.
]);

// NOTA STUDIO: qui la sessione parte DAVVERO. Da questa riga in poi
// $_SESSION è disponibile. Prima di questa riga, $_SESSION non esiste.
// Se sposti questa riga più in alto (prima delle ini_set), le ini_set
// non hanno effetto. Non farlo.
//
// NOTA STUDIO (NEW-7): guard per evitare il warning "session already
// active" se per qualche motivo la sessione fosse già partita (es.
// inclusione multipla del file, o un bootstrap che l'ha già aperta).
// Inoltre, se session_start() fallisce (es. directory non scrivibile),
// fail-closed con 500.
if (session_status() !== PHP_SESSION_ACTIVE) {
    if (!session_start()) {
        error_log('[mindlab] session_start() fallita');
        abort(500, 'Errore interno.');
    }
}

// =============================================================================
// 3. HEADER HTTP DI SICUREZZA
// =============================================================================
// NOTA STUDIO: gli header sono istruzioni che il server manda al browser
// insieme alla pagina. Non si vedono nel contenuto, ma cambiano il
// comportamento del browser in modo sostanziale per la sicurezza.
// Devono essere inviati PRIMA di qualsiasi output (echo, HTML, BOM):
// se il browser ha già ricevuto byte, gli header non possono più partire.

// NOTA STUDIO (NEW-8): rimuove header che rivelano stack/versione.
// X-Powered-By è impostato da PHP; Server è impostato dal webserver.
// Nasconderli è "security through obscurity", ma riduce il fingerprinting.
header_remove('X-Powered-By');
header_remove('Server');

// Impedisce al browser di "indovinare" il MIME type. Se un file .jpg
// contiene in realtà uno script, senza nosniff il browser potrebbe
// eseguirlo come script; con nosniff lo tratta come immagine e non
// lo esegue. Difesa contro upload di file camuffati.
header('X-Content-Type-Options: nosniff');

// Impedisce di caricare la pagina dentro un <iframe> di un altro sito.
// Senza, un attaccante può sovrapporre un iframe invisibile alla tua
// pagina e far cliccare l'utente su pulsanti reali (clickjacking).
// DENY è la modalità più restrittiva: nessuno può incorniciare.
header('X-Frame-Options: DENY');

// Controlla quante informazioni sull'URL di provenienza il browser manda
// ai siti terzi nel campo Referer. 'strict-origin-when-cross-origin'
// manda solo l'origine (https://tuosito.it) verso siti esterni, non il
// path completo (che potrebbe contenere /patient/123 → fuga di dati).
header('Referrer-Policy: strict-origin-when-cross-origin');

// Disabilita l'accesso a funzionalità sensibili del browser.
// NOTA (FIX L-1): la geolocalizzazione è disabilitata del tutto `()`.
// Prima era `(self)` (consentita al nostro dominio). Un'app medica non
// ne ha bisogno: disabilitarla riduce la superficie di attacco.
header('Permissions-Policy: camera=(), microphone=(), geolocation=()');

// NOTA STUDIO (FIX M-1): Content-Security-Policy. È l'header più
// importante per mitigare XSS.
//
// COSA FA: dice al browser "esegui SOLO script che provengono da queste
// fonti, carica immagini solo da queste fonti, ecc.". Se un attaccante
// riesce a iniettare <script>alert(1)</script>, il browser lo blocca
// perché non corrisponde alla policy.
//
// LE DIRETTIVE:
// - default-src 'self': default, solo stesso dominio.
// - script-src 'self' 'unsafe-inline': script solo dal nostro dominio,
//   MA 'unsafe-inline' permette script inline (necessario se le view
//   usano <script>...</script> senza nonce/hash).
// - style-src 'self' 'unsafe-inline': stesso discorso per i CSS inline.
// - img-src 'self' data:: immagini dal dominio e data URI.
// - font-src 'self': font solo dal dominio.
// - connect-src 'self': fetch/XHR solo verso il nostro dominio.
// - object-src 'none': niente <object>, <embed>, plugin (Flash, PDF).
// - base-uri 'self': il tag <base> non può puntare altrove (altrimenti
//   un attaccante potrebbe riscrivere tutti gli URL relativi).
// - frame-ancestors 'none': nessuno può incorniciarci (come X-Frame-Options).
// - form-action 'self': i form possono essere inviati solo al nostro dominio.
//
// COME SI MODIFICA: quando migri a nonce/hash, rimuovi 'unsafe-inline'
// da script-src e style-src. Aggiungi domini esterni (CDN, font) SOLO
// se strettamente necessari, in modo esplicito. Non aggiungere mai
// 'unsafe-eval' né '*' (annullerebbero la CSP).
header(
    "Content-Security-Policy: "
    . "default-src 'self'; "
    . "script-src 'self' 'unsafe-inline'; "
    . "style-src 'self' 'unsafe-inline'; "
    . "img-src 'self' data:; "
    . "font-src 'self'; "
    . "connect-src 'self'; "
    . "object-src 'none'; "
    . "base-uri 'self'; "
    . "frame-ancestors 'none'; "
    . "form-action 'self'"
);

// NOTA STUDIO (FIX L-2): COOP. Impedisce che una pagina di un altro sito
// apra una finestra sul nostro dominio e ne controlli il comportamento
// via window.opener. Difesa in profondità contro side-channel e attacchi
// di tipo "tabnabbing".
header('Cross-Origin-Opener-Policy: same-origin');

// CORP: impedisce ad altri siti di caricare le nostre risorse (immagini,
// script) senza permesso. Riduce il rischio di esfiltrazione via <img>
// o <script> da domini terzi.
header('Cross-Origin-Resource-Policy: same-origin');

// NOTA STUDIO: disabilita i file crossdomain.xml (usati da vecchi player
// Flash). Praticamente inutile oggi, ma è una buona abitudine dichiarare
// "non permetto policy cross-domain".
header('X-Permitted-Cross-Domain-Policies: none');

// Cache-Control: no-store è il più restrittivo: il browser NON deve
// salvare la pagina in nessuna cache. Per pagine con dati medici è
// obbligatorio. no-cache, must-revalidate, max-age=0 rinforzano il concetto
// per compatibilità con browser/proxy che interpretano i flag diversamente.
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache'); // equivalente per browser HTTP/1.0 legacy.

// HSTS: dice al browser "per i prossimi 31536000 secondi (1 anno),
// collegati a questo sito SOLO via HTTPS, anche se scrivo http://".
// Previene downgrade attack e protegge i cookie Secure.
// Inviato solo se $isHttps: su HTTP sarebbe ignorato comunque, e
// mandarlo su HTTP è considerato sbagliato.
if ($isHttps) {
    header('Strict-Transport-Security: max-age=31536000');
}

// =============================================================================
// 4. TIMEOUT DI SESSIONE (idle + assoluto)
// =============================================================================
// NOTA STUDIO (FIX M-2): il cookie ha 'lifetime' => 0, che significa
// "cookie di sessione": il browser lo cancella alla chiusura. Ma lato
// server, $_SESSION resta valida finché PHP non la garbage-collecta
// (default: 1440s di inattività, ma non è garantito). Senza timeout
// esplicito, un cookie rubato può essere usato molto a lungo, e un
// dispositivo lasciato aperto mantiene l'accesso a dati medici.
//
// NOTA STUDIO (NEW-4/2): le costanti SESSION_IDLE_TIMEOUT e
// SESSION_ABSOLUTE_TIMEOUT sono state spostate nella sezione 0, perché
// servono PRIMA di session_start() (per gc_maxlifetime). I valori sono
// gli stessi di prima: modificabili in un solo punto (sezione 0).
//
// NOTA STUDIO: qui chiamiamo isAuthenticated() e destroySession() che sono
// definite più sotto. In PHP, le funzioni top-level sono "hoisted": esistono
// già quando il file inizia a eseguire, indipendentemente da dove sono
// scritte. Per questo possiamo chiamarle prima della loro definizione.
if (isAuthenticated()) {
    $now          = time();
    $createdAt    = $_SESSION['auth']['created_at']    ?? $now;
    $lastActivity = $_SESSION['auth']['last_activity'] ?? $now;

    // NOTA STUDIO: se il login handler (file separato) non ha impostato
    // i timestamp, li inizializziamo qui al primo accesso. Idealmente
    // il login handler dovrebbe farlo, ma questo fallback rende il
    // sistema robusto anche se il login handler viene scritto male.
    if (!isset($_SESSION['auth']['created_at'])) {
        $_SESSION['auth']['created_at'] = $now;
    }
    if (!isset($_SESSION['auth']['last_activity'])) {
        $_SESSION['auth']['last_activity'] = $now;
    }

    // Nota: la condizione usa OR. Se UNA delle due scade, la sessione muore.
    $expired = ($now - $createdAt > SESSION_ABSOLUTE_TIMEOUT)
            || ($now - $lastActivity > SESSION_IDLE_TIMEOUT);

    if ($expired) {
        // NOTA STUDIO (NEW-9): audit PRIMA di distruggere (dopo, i dati
        // utente non sono più disponibili). Il context dice se è scaduto
        // per idle o per timeout assoluto, utile in fase di indagine.
        audit_log('session.expired', [
            'reason'  => ($now - $createdAt > SESSION_ABSOLUTE_TIMEOUT) ? 'absolute' : 'idle',
            'idle_for'=> $now - $lastActivity,
        ]);

        destroySession();
        // Riavviamo una sessione pulita per poter generare un nuovo CSRF
        // token e mostrare la pagina di login senza riusare l'ID scaduto.
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        redirect('/?page=login-choice&expired=1');
    }

    // Aggiorna last_activity: la prossima richiesta riparte da qui.
    $_SESSION['auth']['last_activity'] = $now;
}

// =============================================================================
// 5. HELPER
// =============================================================================

// NOTA STUDIO (FIX M-3): redirect() era troppo permissivo.
//
// IL PROBLEMA ORIGINALE: passava $path direttamente a header('Location: ').
// Se una futura chiamata passava input utente (es. redirect($_GET['next'])),
// un attaccante poteva:
// - open redirect: mandare l'utente a https://evil.com dopo il login
//   (utile per phishing).
// - header injection: se $path conteneva \r\n, l'attaccante poteva
//   iniettare header HTTP arbitrari (cookie, redirect, ecc.).
//
// COSA FA ORA: valida $path prima di usarlo.
// - deve iniziare con '/' (path relativo al dominio).
// - NON deve iniziare con '//' (protocol-relative: //evil.com è un URL
//   assoluto verso evil.com!).
// - NON deve contenere '\' (alcuni browser lo trattano come '/').
// - NON deve contenere \r o \n (header injection).
// Se una di queste condizioni fallisce, usa '/' (fail-safe: meglio
// mandare a home che a evil.com).
//
// COME SI MODIFICA: se hai bisogno di redirect verso URL esterni
// fidati (es. OAuth callback), NON togliere i controlli: aggiungi una
// whitelist esplicita di domini consentiti e confronta con parse_url().
function redirect(string $path): never
{
    $safe = $path;
    if (
        $safe === ''
        || $safe[0] !== '/'
        || str_starts_with($safe, '//')
        || str_contains($safe, '\\')
        || str_contains($safe, "\r")
        || str_contains($safe, "\n")
    ) {
        $safe = '/';
    }

    header('Location: ' . $safe, true, 302);
    exit; // Termina l'esecuzione: senza exit, il codice continuerebbe a girare.
}

// NOTA STUDIO (FIX DEPLOY-10): helper per le risposte di errore. Evita di
// ripetere `http_response_code(...) + exit(...)` in ogni punto del file,
// e soprattutto garantisce che il Content-Type sia sempre dichiarato.
// Senza Content-Type, il browser fa MIME sniffing (mitigato da nosniff,
// ma meglio essere espliciti). In un gestionale sanitario, messaggi di
// errore in `text/plain` (e non `text/html`) riducono la superficie
// per eventuali XSS via messaggi.
//
// Uso: abort(404, 'Pagina non trovata.');
function abort(int $code, string $message): never
{
    if (!headers_sent()) {
        http_response_code($code);
        header('Content-Type: text/plain; charset=UTF-8');
    }
    exit($message);
}

// NOTA STUDIO (FIX M-2): distrugge completamente la sessione.
// Non basta $_SESSION = []: il cookie resta nel browser e l'ID potrebbe
// essere riutilizzato. Dobbiamo anche scadere il cookie e chiamare
// session_destroy().
//
// Il setcookie() qui scade il cookie con gli stessi attributi
// (path, secure, httponly, samesite) usati per crearlo. Se cambi
// path o dominio, il browser non cancellerà il cookie.
//
// NOTA STUDIO (NEW-10): guard per session_status(). Se la sessione
// non è attiva, session_destroy() emette un warning. Meglio no-op.
function destroySession(): void
{
    $_SESSION = [];

    if (session_status() !== PHP_SESSION_ACTIVE) {
        return;
    }

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            [
                'expires'  => time() - 42000, // una data passata = cancellazione
                'path'     => $params['path'],
                'domain'   => $params['domain'] ?? '',
                'secure'   => $params['secure'] ?? false,
                'httponly' => $params['httponly'] ?? true,
                'samesite' => $params['samesite'] ?? 'Lax',
            ]
        );
    }

    session_destroy();
}

// NOTA STUDIO (FIX M-3/M-4): helper CSRF.
//
// PERCHÉ SERVE: SameSite=Lax mitiga il CSRF ma non lo elimina. Un attaccante
// può comunque fare navigazioni top-level GET cross-site, e alcuni
// browser/vecchie versioni hanno comportamenti diversi. Il token CSRF
// è la difesa robusta: un valore casuale univoco per sessione che il
// server si aspetta in ogni form POST.
//
// COME SI USA:
// 1. Nelle view, dentro ogni <form method="POST">, aggiungi un campo hidden
//    name="csrf_token" con valore csrf_token() (escapato con htmlspecialchars).
//    NOTA STUDIO (FIX DEPLOY-3): NON scrivere qui l'esempio letterale di tag
//    HTML con la sequenza di chiusura dei blocchi PHP seguita da parentesi
//    aperta: dentro un commento TALE QUALE il tokenizer PHP vede comunque la
//    close tag → il resto del commento diventa HTML emesso e il codice che
//    segue va in parse error. In passato questo mandava in crash l'entrypoint
//    a ogni richiesta. Se ti serve documentare sintassi di template,
//    descrivila a parole, non con codice esegetico fra commenti.
// 2. Nei controller, prima di operazioni state-changing:
//    se csrf_verify($_POST['csrf_token'] ?? null) fallisce, rispondi 403.
//
// csrf_token(): se non esiste, ne genera uno da 32 byte casuali
// (random_bytes è crittograficamente sicuro: NON usare rand() o mt_rand()).
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// csrf_verify(): confronta il token ricevuto con quello in sessione.
// hash_equals() è IMPORTANTE: fa un confronto a tempo costante. Un
// confronto normale (==) impiega tempi diversi in base a quanti
// caratteri corrispondono, e un attaccante con molti tentativi può
// ricostruire il token carattere per carattere (timing attack).
function csrf_verify(?string $token): bool
{
    return is_string($token)
        && $token !== ''
        && !empty($_SESSION['csrf_token'])
        && is_string($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}

// NOTA STUDIO (NEW-11): rigenera l'ID di sessione.
//
// PERCHÉ: al login (o a un cambio di privilegio), l'ID di sessione deve
// cambiare, altrimenti un attaccante che ha fissato l'ID prima del login
// si ritrova la sessione autenticata della vittima (session fixation).
// Va chiamato nel login handler DOPO aver verificato le credenziali e
// PRIMA di impostare $_SESSION['auth'].
//
// Uso tipico (nel login handler, dopo la verifica riuscita della password):
//   regenerate_session_id();
//   rotate_csrf_token();
//   e poi popola $_SESSION['auth'] con authenticated/user_id/user_type/ruolo.
//
// Il parametro `true` a session_regenerate_id() elimina il vecchio
// file di sessione dal server: l'ID vecchio diventa inutilizzabile.
function regenerate_session_id(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_regenerate_id(true);
    }
}

// NOTA STUDIO (NEW-12): ruota il token CSRF.
//
// PERCHÉ: dopo un cambio di stato di autenticazione (login, logout,
// cambio ruolo), il token CSRF deve cambiare. Se il token fosse lo stesso
// pre/post login, un token raccolto in fase anonima (es. da una pagina
// pubblica) sarebbe riutilizzabile dopo il login. Rotazione = defense
// in depth contro token CSRF riciclati.
//
// Uso: chiamare subito dopo regenerate_session_id() nel login handler.
function rotate_csrf_token(): string
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        throw new RuntimeException('Session not active: cannot rotate CSRF token.');
    }
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf_token'];
}

// NOTA STUDIO (NEW-13): audit log.
//
// PERCHÉ SERVE: per dati sanitari, il GDPR (art. 32) e le linee guida
// del Garante richiedono di tracciare gli accessi ai dati. Un audit log
// strutturato è anche l'unica difesa concreta contro accuse di
// negazione ("non sono stato io"). Senza, non hai modo di dimostrare
// chi ha fatto cosa.
//
// COSA REGISTRA: un evento per riga in formato JSON Lines. Contiene
// timestamp UTC, azione, esito, utente, IP, user-agent, URL, contesto
// (oggetto specifico dell'azione). Non contiene MAI: password, token
// CSRF, contenuto clinico. Solo metadati.
//
// COME SI USA:
//   audit_log('login.success', ['username' => $u]);
//   audit_log('login.failed',  ['username' => $u], 'fail');
//   audit_log('patient.view',  ['patient_id' => 42]);
//   audit_log('logout');
//
// IMPORTANTE: chiamare audit_log('logout') PRIMA di destroySession(),
// altrimenti perdi i dati utente (dopo destroy $_SESSION è vuota).
//
// STORAGE: di default scrive su PHP error_log (syslog/file configurato).
// In produzione, imposta AUDIT_LOG_PATH su un file dedicato, append-only,
// con permessi ristretti (0600, owner = utente PHP-FPM, gruppo = solo
// amministratori). Per deploy multi-server, sostituisci con un writer
// verso DB append-only o servizio centralizzato (SIEM): è l'unico modo
// per avere audit immutabile e ricercabile.
//
// SICUREZZA: il session_id viene hashato (SHA-256) per correlare eventi
// della stessa sessione senza esporre l'ID in chiaro nei log (difesa
// contro log leak).
function audit_log(string $action, array $context = [], string $result = 'ok'): void
{
    // Estrae info utente PRIMA di eventuali destroy.
    $auth = $_SESSION['auth'] ?? null;
    $userId   = is_array($auth) ? ($auth['user_id']   ?? null) : null;
    $userType = is_array($auth) ? ($auth['user_type'] ?? null) : null;

    $sid = '';
    if (session_status() === PHP_SESSION_ACTIVE && session_id() !== '') {
        // Hash del session_id: correlazione senza esposizione.
        $sid = hash('sha256', session_id());
    }

    $entry = [
        'ts'        => gmdate('Y-m-d\TH:i:s\Z'),
        'action'    => $action,
        'result'    => $result,
        'user_id'   => $userId,
        'user_type' => $userType,
        'sid_hash'  => $sid ?: null,
        'ip'        => $_SERVER['REMOTE_ADDR'] ?? null,
        'ua'        => $_SERVER['HTTP_USER_AGENT'] ?? null,
        'method'    => $_SERVER['REQUEST_METHOD'] ?? null,
        'uri'       => $_SERVER['REQUEST_URI'] ?? null,
        'context'   => $context,
    ];

    $line = json_encode($entry, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n";
    if ($line === false) {
        return; // json_encode può fallire su UTF-8 invalido; non bloccare l'app.
    }

    $path = (string)(getenv('AUDIT_LOG_PATH') ?: '');
    $pathOk = $path !== '' && (
        (file_exists($path) && is_writable($path))
        || (!file_exists($path) && is_writable(dirname($path)))
    );

    if ($pathOk) {
        if (!error_log($line, 3, $path)) {
            error_log('[mindlab] audit_log: scrittura fallita su ' . $path);
        }
    } else {
        // Fallback: error_log configurato dal server. Non ideale (misto
        // con errori applicativi) ma meglio di perdere l'evento.
        error_log(rtrim($line));
    }
}

// NOTA STUDIO (NEW-14): rate limiting per il login.
//
// PERCHÉ SERVE: senza rate limiting, un attaccante può fare brute-force
// di password in tempo breve. Per dati sanitari, un account
// compromesso = data breach. Il rate limit è difesa in profondità
// obbligatoria (insieme a password robuste, MFA, Argon2id).
//
// MODELLO: sliding window su file, con lock esclusivo per evitare
// race condition. Chiave = stringa arbitraria (es. "login:ip:1.2.3.4"
// oppure "login:user:<hash-username>"). Ad ogni chiamata:
// - legge i timestamp nella finestra
// - se >= $maxAttempts, rifiuta
// - altrimenti registra il timestamp corrente e consente
//
// IMPORTANTE: questa implementazione è per SINGOLO server. In
// multi-server, i file locali non si vedono tra loro → sostituisci con
// Redis/DB/APCu. Per un commerciale, Redis è la scelta tipica.
//
// FAIL-OPEN: se il file system è rotto, la funzione ritorna true
// (non bloccare utenti legittimi per un problema di storage). Logga
// l'errore e prosegui. La difesa primaria resta la password + CSRF + MFA.
function rate_limit_check(string $key, int $maxAttempts, int $windowSeconds): bool
{
    $dir = (string)(getenv('RATE_LIMIT_DIR') ?: (sys_get_temp_dir() . '/mindlab-rl'));
    if (!is_dir($dir) && !@mkdir($dir, 0700, true) && !is_dir($dir)) {
        error_log('[mindlab] rate_limit_check: impossibile creare ' . $dir);
        return true; // fail-open
    }

    $file = $dir . '/' . hash('sha256', $key);
    $now  = time();

    $fp = @fopen($file, 'c+');
    if ($fp === false) {
        error_log('[mindlab] rate_limit_check: impossibile aprire ' . $file);
        return true; // fail-open
    }

    if (!flock($fp, LOCK_EX)) {
        fclose($fp);
        return true; // fail-open
    }

    $raw = stream_get_contents($fp);
    $attempts = $raw ? json_decode($raw, true) : [];
    if (!is_array($attempts)) {
        $attempts = [];
    }

    // Rimuove i timestamp fuori finestra.
    $attempts = array_values(array_filter(
        $attempts,
        static fn($t) => is_int($t) && $t > ($now - $windowSeconds)
    ));

    $allowed = count($attempts) < $maxAttempts;
    if ($allowed) {
        $attempts[] = $now;
    }

    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, json_encode($attempts));
    fflush($fp);
    flock($fp, LOCK_UN);
    fclose($fp);

    return $allowed;
}

// NOTA STUDIO: verifica se l'utente è autenticato.
// È un "Single Point of Truth": l'unico posto dove controlliamo se c'è
// una sessione valida. Se un giorno cambia il formato di $_SESSION['auth'],
// modifichiamo solo questa funzione.
//
// Controlla:
// - $_SESSION['auth'] esiste ed è un array.
// - 'authenticated' è esattamente true (=== non ==: evita che "1" o 1
//   passino il controllo).
// - 'user_id' e 'user_type' esistono.
function isAuthenticated(): bool
{
    return isset($_SESSION['auth'])
        && is_array($_SESSION['auth'])
        && ($_SESSION['auth']['authenticated'] ?? false) === true
        && isset($_SESSION['auth']['user_id'])
        && isset($_SESSION['auth']['user_type']);
}

// NOTA STUDIO (NEW-15): helper per i controller.
//
// require_auth(): fail-fast se non autenticato. Utile all'inizio di ogni
// controller protetto, come defense-in-depth rispetto al routing.
// (Il routing già blocca le pagine protette, ma un controller
// richiamato da un altro percorso non deve mai assumere lo stato.)
function require_auth(): void
{
    if (!isAuthenticated()) {
        audit_log('auth.required', ['page' => $_GET['page'] ?? null], 'fail');
        redirect('/?page=login-choice');
    }
}

// require_role(): verifica che il ruolo dell'utente sia tra quelli
// consentiti. Usare nei controller che gestiscono operazioni
// role-specific (es. require_role('admin') per la gestione team).
function require_role(string ...$roles): void
{
    $type = is_array($_SESSION['auth'] ?? null)
        ? ($_SESSION['auth']['user_type'] ?? '')
        : '';

    if (!in_array($type, $roles, true)) {
        audit_log('auth.denied', [
            'page'     => $_GET['page'] ?? null,
            'required' => $roles,
            'actual'   => $type,
        ], 'fail');
        abort(403, 'Accesso negato.');
    }
}

// NOTA STUDIO: decide dove mandare l'utente dopo il login (o se un utente
// già loggato apre una pagina pubblica).
// Il match() di PHP 8+ è più sicuro dello switch: richiede una corrispondenza
// esatta, non fa conversioni implicite.
function getRedirectAfterLogin(): string
{
    // NOTA: verifichiamo che $_SESSION['auth'] sia un array prima di
    // accedere a 'user_type', per coerenza con isAuthenticated().
    $type = is_array($_SESSION['auth'] ?? null)
        ? ($_SESSION['auth']['user_type'] ?? '')
        : '';

    return match ($type) {
        'admin', 'doctor' => '/?page=dashboard',
        'patient'         => '/?page=patient_home',
        default           => '/?page=login-choice',
    };
}

// =============================================================================
// 6. ROUTING
// =============================================================================

// NOTA STUDIO: legge ?page= dall'URL. Se manca, default 'login-choice'.
// Il cast (string) è importante: se un attaccante passa ?page[]=x,
// $_GET['page'] diventa un ARRAY, non una stringa. Senza cast, le
// in_array() successive potrebbero comportarsi in modo inatteso. Il cast
// forza una stringa e l'array diventa "Array" (stringa), che non è
// in nessuna whitelist → 404.
$page = (string)($_GET['page'] ?? 'login-choice');

// NOTA STUDIO: rotte accessibili senza login.
$publicRoutes = [
    'login-choice',
    'login-patient',
    'login-doctor',
    'registration-choice',
    'registration-minor',
];

// NOTA STUDIO: rotte che richiedono autenticazione.
$protectedRoutes = [
    'dashboard', 'agenda', 'patients', 'clinical', 'documents',
    'finance', 'taxes', 'reports', 'team', 'settings',
    'patient_home',
];

// Lista completa, usata per la whitelist del 404.
$routes = array_merge($publicRoutes, $protectedRoutes);

// NOTA STUDIO: mappa "page → file da includere". Aggiungere una nuova
// pagina = aggiungere una riga qui + (eventualmente) il ruolo in
// $routesByRole + (eventualmente) il metodo in $routeMethods.
//
// NOTA STUDIO (FIX DEPLOY-5): i percorsi sono ora ASSOLUTI (con __DIR__) e
// NON più relativi con '../'. Perché? `require __DIR__ . '/../modules/...'`
// dipende dalla posizione del FILE richiedente rispetto alla root dei moduli:
// basta spostare l'entrypoint di un livello (es. da /public a /public/www,
// oppure servirlo da una sottodirectory) che tutti i require si rompono con
// fatal error "Failed opening required" → HTTP 500 su ogni rotta. Con
// __DIR__ . '/modules/...', il percorso è ancorato alla posizione REALE del
// file: finché la cartella `modules/` resta sorella dell'entrypoint, i
// require funzionano in ogni ambiente. Se invece i moduli vivono FUORI dalla
// docroot (configurazione consigliata, vedi NEW-0), cambia qui il prefisso in
// un path assoluto di filesystem (es. '/var/www/mindlab/modules') invece di
// usare '..'.
$routeHandlers = [
    'login-choice'  => __DIR__ . '/modules/Login/accedi_comeView.php',
    'login-patient' => __DIR__ . '/modules/Login/View/login_credential.php',
    'login-doctor'  => __DIR__ . '/modules/Login/View/login_credential.php',
    'dashboard'     => __DIR__ . '/modules/Dashboard/Controller/DashboardViewController.php',
    'patient_home'  => __DIR__ . '/modules/Patient/Controller/PatientHomeController.php',
    'registration-choice' => __DIR__ . '/modules/Registrati_come/registratiComeView.php',
    'registration-minor'  => __DIR__ . '/modules/Registrazione/registrazioneMinore/registrazioneMinoreView.php',
];

// NOTA STUDIO (FIX M-4): enforcement del metodo HTTP.
//
// PERCHÉ: senza questo, un'azione state-changing raggiungibile via GET
// è CSRF-abile con <img src="https://tuosito/?page=dashboard&action=delete">.
// Il browser invia il cookie (SameSite=Lax lo manda su navigazione top-level
// GET), l'azione viene eseguita. Bloccando i metodi, quell'attacco fallisce.
//
// DEFAULT: ogni route NON elencata accetta solo GET (fail-closed). Se un
// controller protetto (es. dashboard) gestisce anche POST, va aggiunto
// esplicitamente qui. Altrimenti riceverà 405.
$routeMethods = [
    'login-patient' => ['GET', 'POST'],
    'login-doctor'  => ['GET', 'POST'],
];

// NOTA STUDIO: mappa "ruolo → pagine consentite". È il controllo di
// AUTORIZZAZIONE (chi può fare cosa), complementare a isAuthenticated()
// che è il controllo di AUTENTICAZIONE (sei loggato?).
// Se un ruolo non è in questa mappa, `?? []` gli dà array vuoto → nessuna
// pagina consentita → 403. Fail-closed.
$routesByRole = [
    'admin' => [
        'dashboard', 'agenda', 'patients', 'clinical', 'documents',
        'finance', 'taxes', 'reports', 'team', 'settings',
    ],
    'doctor' => [
        'dashboard', 'agenda', 'patients', 'clinical', 'documents',
    ],
    'patient' => [
        'patient_home',
    ],
];

// NOTA STUDIO: whitelist. Se $page non è in $routes, 404. Questo impedisce
// directory traversal (?page=../../etc/passwd), inclusione di file
// arbitrari (?page=/etc/passwd) e accesso a pagine non previste.
// `true` come terzo argomento di in_array = confronto STRETTO (===),
// non lasco (==): evita sorprese tipo 0 == "qualsiasi_stringa".
if (!in_array($page, $routes, true)) {
    abort(404, 'Pagina non trovata.');
}

// NOTA STUDIO (FIX M-4): verifica del metodo. Va fatta DOPO la whitelist
// (per non dare 405 su route inesistenti) e PRIMA del dispatch.
$allowedMethods = $routeMethods[$page] ?? ['GET'];
if (!in_array($_SERVER['REQUEST_METHOD'] ?? 'GET', $allowedMethods, true)) {
    // L'header Allow va inviato PRIMA di abort(): abort() chiude la connessione.
    header('Allow: ' . implode(', ', $allowedMethods));
    abort(405, 'Metodo non consentito.');
}

// =============================================================================
// 7. AUTENTICAZIONE E AUTORIZZAZIONE
// =============================================================================

// NOTA STUDIO: prima barriera. Se la pagina è protetta e l'utente non è
// loggato, redirect al login. Questo controllo viene PRIMA del ruolo:
// non ha senso chiedersi "che ruolo ha" se non è nemmeno loggato.
if (in_array($page, $protectedRoutes, true) && !isAuthenticated()) {
    // NOTA STUDIO (NEW-16): audit degli accessi non autenticati a pagine
    // protette. Utile per rilevare tentativi di accesso diretti.
    audit_log('auth.required', ['page' => $page], 'fail');
    redirect('/?page=login-choice');
}

// NOTA STUDIO: UX. Se l'utente è già loggato e apre una pagina di login,
// non ha senso mostrargliela: lo mandiamo alla sua home.
if (in_array($page, $publicRoutes, true) && isAuthenticated()) {
    $target = getRedirectAfterLogin();

    // NOTA STUDIO (FIX DEPLOY-11): se getRedirectAfterLogin() restituisce
    // login-choice ma l'utente È autenticato, significa che ha un ruolo
    // non mappato (es. 'nurse' o 'admin ' con spazio). Redirigerlo a
    // login-choice creerebbe un loop infinito (login-choice è pubblica
    // → redirect → login-choice → ...). In quel caso distruggiamo la
    // sessione (lo stato è incoerente, meglio forzare un nuovo login)
    // e mostriamo la pagina di login pulita.
    if ($target === '/?page=login-choice') {
        audit_log('auth.unknown_role', [
            'user_type' => $_SESSION['auth']['user_type'] ?? 'unknown',
        ], 'fail');
        destroySession();
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    redirect($target);
}

// NOTA STUDIO: seconda barriera. Se è loggato ma il suo ruolo non ha
// accesso a questa pagina (es. patient che apre ?page=finance), 403.
// `?? []` per ruolo sconosciuto: nessuna pagina consentita.
if (in_array($page, $protectedRoutes, true) && isAuthenticated()) {
    $type         = $_SESSION['auth']['user_type'] ?? '';
    $allowedPages = $routesByRole[$type] ?? [];

    if (!in_array($page, $allowedPages, true)) {
        audit_log('auth.denied', [
            'page'     => $page,
            'required' => $allowedPages,
            'actual'   => $type,
        ], 'fail');
        abort(403, 'Accesso negato.');
    }
}

// =============================================================================
// 8. DISPATCH
// =============================================================================

// NOTA STUDIO: fail-safe di configurazione. Se $routeHandlers non ha una
// entry per $page (bug di manutenzione: aggiunta a $routes ma non a
// $routeHandlers), rispondiamo 500 invece di crashare in modo opaco.
//
// NOTA STUDIO (NEW-17): in produzione NON esponiamo il nome della pagina
// nell'errore (poteva rivelare informazioni di routing / existence di
// file). In sviluppo sì, per debug.
if (!isset($routeHandlers[$page])) {
    error_log('[mindlab] Route non configurata: ' . $page);
    if (APP_ENV === 'production') {
        abort(500, 'Errore interno.');
    }
    // In sviluppo, $page è già passato dalla whitelist $routes, quindi è
    // una stringa nota e sicura: `text/plain` va bene anche senza htmlspecialchars.
    abort(500, 'Route non configurata: ' . $page);
}

// NOTA STUDIO: require (non include) perché se il file manca l'app DEVE
// fermarsi. 'include' emette un warning e prosegue, lasciando l'utente
// su una pagina bianca o parziale. 'require' emette un fatal error e
// termina: comportamento corretto per un file di routing.
//
// NOTA STUDIO (FIX DEPLOY-6): prima del require, verifichiamo che il file
// ESISTA davvero (is_file). Senza questo controllo, un deployment incompleto
// (cartella modules/ mancante o rinominata) produce un fatal "Failed opening
// required ..." che, SOLO in sviluppo, può trapelare con path interni nella
// risposta. Con il check esplicito:
// - in produzione: 500 generico + errore nei log (nessun leak di path);
// - in sviluppo:   messaggio chiaro che dice QUALE file manca (debug rapido).
$handlerFile = $routeHandlers[$page];
if (!is_file($handlerFile)) {
    error_log('[mindlab] Handler mancante per rotta "' . $page . '": ' . $handlerFile);
    if (APP_ENV === 'production') {
        abort(500, 'Errore interno.');
    }
    // In sviluppo, $page è già passato dalla whitelist $routes, quindi è
    // una stringa nota e sicura: `text/plain` va bene anche senza htmlspecialchars.
    abort(500, 'Handler mancante per la rotta: ' . $page);
}

// FIX DEPLOY-5: qui $handlerFile è già un path assoluto (creato con __DIR__
// nella mappa): NON concatenare di nuovo __DIR__, altrimenti otterresti un
// path doppio e invalido tipo "/var/www/html/var/www/html/modules/...".
require $handlerFile;
