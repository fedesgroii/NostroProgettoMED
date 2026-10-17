<?php

// NOTA STUDIO: declare(strict_types=1) forza il type checking rigoroso in PHP.
// Questo significa che se una funzione si aspetta un int e gli passi un "1" (stringa),
// PHP lancerà un errore invece di fare la conversione automatica (casting).
// È una best practice fondamentale per evitare bug sottili in applicazioni complesse.
declare(strict_types=1);

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
 */

// -----------------------------------------------------------------------------
// 1. Ambiente
// -----------------------------------------------------------------------------

// NOTA STUDIO: Definiamo una costante globale che identifica l'ambiente corrente.
// Serve per differenziare il comportamento (es. mostrare errori, usare log dettagliati)
// a seconda che siamo in sviluppo (localmente) o in produzione (sul server pubblico).
const APP_ENV = 'development'; // cambierà in 'production' sul server reale.

// NOTA STUDIO: Determiniamo se la richiesta è avvenuta tramite HTTPS.
// $isHttps sarà true se l'app è sicura, false se è in chiaro (HTTP).
// Questo controllo è vitale per impostare correttamente i cookie sicuri.
// $_SERVER['HTTPS'] potrebbe essere vuoto o 'off' se non è HTTPS.
// $_SERVER['SERVER_PORT'] 443 è la porta standard per HTTPS.
// Usiamo ?? 0 per evitare errori se SERVER_PORT non è definito.
$isHttps = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || ((int)($_SERVER['SERVER_PORT'] ?? 0) === 443)
);

// -----------------------------------------------------------------------------
// 2. Cookie/sessione: hardening prima di session_start()
// -----------------------------------------------------------------------------

// NOTA STUDIO: "Hardening" significa irrigidire la sicurezza.
// Tutte queste configurazioni DEVONO essere fatte PRIMA di chiamare session_start().
// Se le fai dopo, PHP le ignorerà o lancerà avvisi.

// Forza PHP a usare SOLO i cookie per tracciare la sessione.
// Evita che l'ID di sessione (PHPSESSID) venga passato nell'URL,
// che è insicuro perché finirebbe nei log dei server, nella cronologia, ecc.
ini_set('session.use_only_cookies', '1');

// "Strict mode" previene attacchi di "Session Fixation".
// Se un attaccante prova a forzare un ID di sessione sconosciuto nel browser della vittima,
// PHP lo rifiuterà e ne genererà uno nuovo invece di usarlo.
ini_set('session.use_strict_mode', '1');

// Disabilita l'inserimento automatico dell'ID di sessione negli URL e nei form.
// È una protezione aggiuntiva contro la "Session Hijacking" (furto di sessione).
ini_set('session.use_trans_sid', '0');

// HttpOnly: Impedisce a JavaScript di accedere al cookie di sessione.
// Questo è cruciale per mitigare gli attacchi XSS (Cross-Site Scripting):
// anche se un attaccante inietta del JavaScript malevolo, non potrà rubare il cookie.
ini_set('session.cookie_httponly', '1');

// Secure: Dice al browser di inviare il cookie SOLO se la connessione è HTTPS.
// Se il sito è in HTTP, il cookie non viene inviato, prevenendo il furto su reti non sicure.
ini_set('session.cookie_secure', $isHttps ? '1' : '0');

// SameSite: Protegge contro gli attacchi CSRF (Cross-Site Request Forgery).
// 'Lax' significa che il cookie viene inviato solo se la richiesta proviene dal tuo stesso sito
// o da un link diretto. Impedisce a siti di terze parti di fare richieste a tuo nome.
ini_set('session.cookie_samesite', 'Lax');

// Dice a PHP di non cachare le pagine che usano le sessioni.
// Questo evita che dati sensibili rimangano salvati in cache sul browser dell'utente.
ini_set('session.cache_limiter', 'nocache');

// Cambiamo il nome del cookie di sessione dal predefinito 'PHPSESSID' a uno personalizzato.
// NOTA STUDIO: Questo è fatto principalmente per "Security through obscurity"
// (sicurezza tramite oscurità). Non è una difesa forte, ma nasconde il fatto
// che l'app usa PHP agli scanner automatici.
session_name('MINDLAB_SESSION');

// Impostiamo i parametri del cookie in modo programmatico (metodo moderno).
// È più pulito e flessibile rispetto alle singole chiamate a ini_set().
session_set_cookie_params([
    'lifetime' => 0,      // 0 significa "cookie di sessione": scade quando il browser viene chiuso.
    'path'     => '/',    // Il cookie è valido per tutto il dominio (tutte le cartelle del sito).
    'secure'   => $isHttps,// true se HTTPS, false altrimenti.
    'httponly' => true,   // Inaccessibile da JavaScript (anti-XSS).
    'samesite' => 'Lax',  // Protezione anti-CSRF.
]);

// NOTA STUDIO: Finalmente avviamo la sessione.
// Questa riga crea il cookie (se non esiste) o legge quello esistente.
// Da qui in poi, la superglobal $_SESSION è disponibile per leggere/scrivere dati.
session_start();

// -----------------------------------------------------------------------------
// 3. Intestazioni HTTP di base
// -----------------------------------------------------------------------------

// NOTA STUDIO: Le intestazioni HTTP (Headers) sono istruzioni inviate al browser
// per dirgli come comportarsi con la pagina. Sono fondamentali per la sicurezza.

// Impedisce al browser di "indovinare" il tipo di file (MIME type sniffing).
// Previene attacchi dove un file immagine contiene in realtà codice eseguibile.
header('X-Content-Type-Options: nosniff');

// Impedisce che la tua pagina venga caricata dentro un <iframe> di un altro sito.
// Previene attacchi di "Clickjacking".
header('X-Frame-Options: DENY');

// Controlla quali informazioni sul "Referer" vengono inviate ad altri siti.
// 'strict-origin-when-cross-origin' invia solo il dominio quando vai su un sito esterno,
// non l'URL completo (che potrebbe contenere dati sensibili come /patient/123).
header('Referrer-Policy: strict-origin-when-cross-origin');

// Disabilita l'accesso a funzionalità sensibili del browser (camera, mic, geolocalizzazione).
// Riduce la "superficie di attacco" dell'applicazione.
// NOTA: geolocation=(self) consente la geolocalizzazione solo al nostro stesso dominio.
header('Permissions-Policy: camera=(), microphone=(), geolocation=(self)');

// Istruisce il browser a NON salvare la pagina in cache.
// Fondamentale per pagine che contengono dati medici o finanziari sensibili.
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache'); // Per compatibilità con vecchi browser HTTP/1.0.

// HSTS (HTTP Strict Transport Security): dice al browser "per i prossimi 31536000 secondi
// (1 anno), collegati a questo sito SOLO tramite HTTPS, anche se scrivo http:// nell'URL".
// Previene attacchi di "Downgrade" (da HTTPS a HTTP) e protegge i cookie.
if ($isHttps) {
    header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
}

// -----------------------------------------------------------------------------
// 4. Helper minimi
// -----------------------------------------------------------------------------

// NOTA STUDIO: Funzione helper per reindirizzare l'utente.
// 'never' come return type significa che questa funzione non ritorna MAI (chiama sempre exit).
// È un'informazione utile sia per il programmatore che per l'analizzatore statico di PHP.
function redirect(string $path): never
{
    // Invia l'header Location e forza un redirect HTTP 302 (temporaneo).
    header('Location: ' . $path, true, 302);
    exit; // Termina l'esecuzione immediatamente per evitare che il resto del codice giri.
}

// NOTA STUDIO: Funzione che verifica se l'utente è autenticato.
// Controlla che la sessione contenga un array 'auth' ben formato.
// Questo è un "Single Point of Truth": invece di ripetere questo controllo ovunque,
// chiamiamo questa funzione. Se in futuro cambiamo come gestiamo l'autenticazione,
// modifichiamo solo qui.
function isAuthenticated(): bool
{
    return isset($_SESSION['auth'])
        && is_array($_SESSION['auth'])
        // NOTA: usa ?? per evitare warning se la chiave manca.
        && ($_SESSION['auth']['authenticated'] ?? false) === true
        && isset($_SESSION['auth']['user_id'])
        && isset($_SESSION['auth']['user_type']);
}

// NOTA STUDIO: Funzione che decide dove mandare l'utente dopo il login
// (o se prova ad aprire una pagina pubblica mentre è già autenticato).
// Il ruolo del paziente ha una "home" diversa dalla dashboard del dottore/admin.
function getRedirectAfterLogin(): string
{
    // Assegna a $type il valore di $_SESSION['auth']['user_type'] se esiste e non è null;
    // altrimenti assegna stringa vuota ''.
    $type = $_SESSION['auth']['user_type'] ?? '';

    return match ($type) {
        'admin', 'doctor' => '/?page=dashboard',
        'patient'         => '/?page=patient_home',
        default           => '/?page=login-choice',
    };
}

// -----------------------------------------------------------------------------
// 5. Routing iniziale
// -----------------------------------------------------------------------------

// NOTA STUDIO: Leggiamo il parametro 'page' dall'URL (es. index.php?page=dashboard).
// Se non c'è, usiamo 'login-choice' come pagina predefinita (fallback).
// Il cast a (string) assicura che sia sempre una stringa, anche se l'utente passa un array.
$page = (string)($_GET['page'] ?? 'login-choice');

// NOTA STUDIO: Definiamo le rotte "pubbliche", accessibili a tutti (anche senza login).
$publicRoutes = [
    'login-choice',  // Pagina di scelta: Dottore o Paziente?
    'login-patient', // Form login paziente
    'login-doctor',  // Form login dottore
];

// NOTA STUDIO: Definiamo le rotte "protette", accessibili SOLO agli utenti autenticati.
$protectedRoutes = [
    'dashboard',
    'agenda',
    'patients',
    'clinical',
    'documents',
    'finance',
    'taxes',
    'reports',
    'team',
    'settings',
    'patient_home',  // Home del paziente
];

// Uniamo i due array per avere la lista completa di tutte le pagine valide del sistema.
$routes = array_merge($publicRoutes, $protectedRoutes);

// NOTA STUDIO: Mappa "pagina => file da caricare". Sostituisce lo switch:
// aggiungere una nuova pagina richiede UNA sola riga qui (più l'eventuale ruolo sotto).
// I path sono relativi a questa cartella (__DIR__), quindi '/../modules/...'
// sale di un livello ed entra in modules/.
$routeHandlers = [
    'login-choice'  => '/../modules/Login/View/login-choice.php',
    'login-patient' => '/../modules/Login/View/login-patient.php',
    'login-doctor'  => '/../modules/Login/View/login-doctor.php',

    // NOTA STUDIO: Per la dashboard carichiamo un Controller, non una View diretta.
    // Questo segue il pattern MVC: il Controller gestisce la logica e poi decide
    // quale View mostrare.
    'dashboard'     => '/../modules/Dashboard/Controller/DashboardViewController.php',

    'patient_home'  => '/../modules/Patient/Controller/PatientHomeController.php',
];

// NOTA STUDIO: Mappa "ruolo => pagine consentite".
// Impedisce che un utente autenticato acceda a pagine di un altro ruolo
// (es. un paziente che apre ?page=finance). È il controllo di AUTORIZZAZIONE,
// complementare a isAuthenticated() che è il controllo di AUTENTICAZIONE.
$routesByRole = [
    'admin' => [
        'dashboard',
        'agenda',
        'patients',
        'clinical',
        'documents',
        'finance',
        'taxes',
        'reports',
        'team',
        'settings',
    ],

    'doctor' => [
        'dashboard',
        'agenda',
        'patients',
        'clinical',
        'documents',
    ],

    'patient' => [
        'patient_home',
    ],
];

// NOTA STUDIO: Controllo di sicurezza fondamentale.
// Se l'utente richiede una pagina che NON è nella lista (es. ?page=hacker),
// restituiamo un errore 404 (Not Found). Questo impedisce attacchi di "Directory Traversal"
// o l'inclusione di file arbitrari. Usiamo 'true' in in_array() per un confronto
// rigoroso (strict).
if (!in_array($page, $routes, true)) {
    http_response_code(404);
    exit('Pagina non trovata.');
}

// -----------------------------------------------------------------------------
// 6. Controllo autenticazione e autorizzazione
// -----------------------------------------------------------------------------

// NOTA STUDIO: Logica di protezione.
// Se l'utente chiede una pagina PROTETTA ma NON è autenticato,
// lo buttiamo fuori e lo mandiamo alla scelta di login.
if (in_array($page, $protectedRoutes, true) && !isAuthenticated()) {
    redirect('/?page=login-choice');
}

// NOTA STUDIO: Logica di usabilità (User Experience).
// Se l'utente è GIÀ autenticato e prova ad andare alla pagina di login,
// non ha senso mostrargliela. Lo reindirizziamo direttamente alla sua home.
if (in_array($page, $publicRoutes, true) && isAuthenticated()) {
    redirect(getRedirectAfterLogin());
}

// NOTA STUDIO: Controllo di AUTORIZZAZIONE per ruolo.
// Se l'utente è loggato ma il suo ruolo non ha accesso a questa pagina,
// rispondiamo 403 (Forbidden) invece di mostrargli dati che non gli spettano.
if (in_array($page, $protectedRoutes, true) && isAuthenticated()) {

    $type         = $_SESSION['auth']['user_type'] ?? '';
    $allowedPages = $routesByRole[$type] ?? [];

    if (!in_array($page, $allowedPages, true)) {
        http_response_code(403);
        exit('Accesso negato.');
    }
}

// -----------------------------------------------------------------------------
// 7. Dispatch
//
// NOTA STUDIO: Sostituisce lo switch precedente. In base a $page, carichiamo il
// file registrato in $routeHandlers. Se non esiste un handler, è un errore di
// configurazione (non dovrebbe capitare perché $routes e $routeHandlers sono
// gestiti insieme, ma teniamo il controllo come fail-safe).
// -----------------------------------------------------------------------------

if (!isset($routeHandlers[$page])) {
    http_response_code(500);
    exit('Route non configurata: ' . htmlspecialchars($page, ENT_QUOTES, 'UTF-8'));
}

// NOTA STUDIO: Usiamo 'require' invece di 'include' perché se il file manca,
// l'app deve fermarsi (Fatal Error).
require __DIR__ . $routeHandlers[$page];
