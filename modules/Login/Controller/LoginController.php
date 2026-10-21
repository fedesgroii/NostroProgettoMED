<?php
/**
 * CONTROLLER APPLICATIVO: LoginController
 * Modulo: Login — Pattern MVC (C del triangolo MVC)
 *
 * RESPONSABILITÀ DI QUESTO FILE (e SOLO queste):
 *  1. Ricevere la richiesta (GET = mostra il form; POST = elabora i dati).
 *  2. Validare gli input e difendersi (CSRF, rate limiting).
 *  3. Interrogare il MODELLO (LoginModel), MAI direttamente il DB.
 *  4. Decidere cosa mostrare e "preparare" le variabili per la VIEW.
 *  5. Includere la View. Qui NON c'è HTML di layout: l'HTML vive solo nelle
 *     view (es. login_credential.php).
 *
 * REGOLA D'ORO DEL PATTERN: il Controller non conosce SQL né HTML;
 * il Model non conosce HTTP; la View non contiene logica di business.
 *
 * NOTA SU $ruolo: è una variabile globale preparata dal front controller
 * (index.php, FIX DEPLOY-8) a partire da $routeParams, quindi è una fonte
 * FIDATA definita dal codice, NON letta dal query string dell'utente.
 * Vale 'paziente' o 'specialista'.
 */

if (!defined('APP_BOOTSTRAPPED')) {
    // Il controller è raggiungibile SOLO tramite il router.
    http_response_code(403);
    exit('Accesso negato: i controller sono raggiungibili solo tramite il front controller.');
}

$ruoloAttuale = ($ruolo ?? null) === 'specialista' ? 'specialista' : 'paziente';

/* ----------------------------------------------------------------------
 * FASE 1 — POST: l'utente ha premuto "Accedi". Elabora le credenziali.
 * -------------------------------------------------------------------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1a. Controllo CSRF. Il token è nel campo hidden del form e nasce in
    // sessione (funzione csrf_token() definita nel front controller).
    // hash_equals confronta in tempo costante: impedisce attacchi "timing".
    $tokenInviato = $_POST['csrf_token'] ?? '';
    if (!csrf_verify($tokenInviato)) {
        audit_log('csrf.failed', ['ruolo' => $ruoloAttuale], 'fail');
        http_response_code(400);
        $errore = 'Sessione scaduta o richiesta non valida. Riprova.';
        // Non proseguiamo: ricadiamo nella fase 2 e mostriamo il form con l'errore.
    } else {
        // 1b. Raccolta input. htmlspecialchars NON serve qui (non stampiamo
        // l'email grezza): l'escaping si fa al momento della stampa, nella view.
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // 1b-bis. Rate limiting SUL TENTATIVO DI LOGIN (blocca brute force).
        // La chiave combina IP + email: un attaccante che prova molte email
        // diverse non "esaurisce" lo stesso contatore, e viceversa.
        $rlKey = 'login|' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . '|' . strtolower($email);
        $rlOk = rate_limit_check($rlKey, 5, 300); // max 5 tentativi / 5 minuti

        // 1c. Validazione minimale (mai fidarsi del client).
        if (!$rlOk) {
            audit_log('login.rate_limited', ['ruolo' => $ruoloAttuale], 'fail');
            http_response_code(429);
            $errore = 'Troppi tentativi. Attendi qualche minuto e riprova.';
        } elseif ($email === '' || $password === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errore = 'Inserisci un indirizzo email valido e la password.';
        } else {
            /* 1d. Chiamata al MODELLO. Il Model caricherà Bean + DAO e
               eseguirà la SELECT preparata contro la tabella utenti.
               FINCHÉ IL MODELLO NON ESISTE, simuliamo il fallimento per non
               autenticare mai nessuno "per sbaglio" (fail-closed). */
            $modelPath = __DIR__ . '/../Model/LoginModel.php';
            if (is_file($modelPath)) {
                require_once $modelPath;   // require_once: se già caricato, non duplica
                $loginModel = new LoginModel();
                $esito = $loginModel->autentica($email, $password, $ruoloAttuale);
            } else {
                error_log('[mindlab] LoginModel mancante: ' . $modelPath);
                $esito = ['ok' => false, 'messaggio' => 'Servizio non disponibile. Riprova più tardi.'];
            }

            if ($esito['ok'] === true) {
                // 1e. SUCCESSO. Rigeneriamo l'ID sessione PRIMA di salvare
                // l'identità: previene il "session fixation attack" (l'ID che
                // l'attaccante poteva conoscere pre-login diventa inutile).
                session_regenerate_id(true);
                $_SESSION['utente_id']   = (int) $esito['utente']->getId();
                $_SESSION['ruolo']       = $esito['utente']->getRuolo(); // fonte: DB, non input!
                $_SESSION['nome']        = $esito['utente']->getNome();
                $_SESSION['login_time']  = time();                      // per timeout assoluto
                audit_log('login.success', ['ruolo' => $_SESSION['ruolo'] ?? null], 'ok');

                // Redirect dopo POST (pattern PRG: Post/Redirect/Get): evita
                // doppi submit con F5 e tiene l'URL pulito. redirect() è la
                // helper definita nel front controller (valida il path).
                redirect('/index.php?page=dashboard');
                exit;
            }

            // 1f. FALLIMENTO. Messaggio volutamente GENERICO: non dobbiamo
            // rivelare se l'email esiste o meno (user enumeration).
            audit_log('login.failed', ['ruolo' => $ruoloAttuale], 'fail');
            $errore = 'Credenziali non valide.';
        }
    }
}

/* ----------------------------------------------------------------------
 * FASE 2 — GET (o POST fallito): prepara i dati e include la VIEW.
 * Nessun accesso al DB qui: la view riceve solo variabili semplici.
 * -------------------------------------------------------------------- */
$csrfToken = csrf_token();               // helper definita in index.php
$titoloPagina = 'Accedo come ' . $ruoloAttuale;

// NOTARE: le variabili sopra ($csrfToken, $errore, $titoloPagina...)
// saranno visibili dentro la view perché `require` condivide lo scope.
require __DIR__ . '/../View/login_credential.php';
