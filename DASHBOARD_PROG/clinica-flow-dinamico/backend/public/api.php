<?php
// [CONTROLLER APPLICATIVO - API] Abilita tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - API] Avvia la sessione necessaria alla sicurezza applicativa.
session_start();

// [CONTROLLER APPLICATIVO - API] Imposta il formato della risposta.
header('Content-Type: application/json; charset=utf-8');

// [CONTROLLER APPLICATIVO - API] Carica la connessione PDO.
$connessione=require __DIR__.'/../config/connessione.php';

// [CONTROLLER APPLICATIVO - API] Carica i componenti della Dashboard.
require_once __DIR__.'/../../dashboard_package/Dashboard_Bean.php';
require_once __DIR__.'/../../dashboard_package/Dashboard_Model.php';
require_once __DIR__.'/../../dashboard_package/Dashboard_DAO.php';
require_once __DIR__.'/../../dashboard_package/Dashboard_ControlApp.php';

// [CONTROLLER APPLICATIVO - API] Carica i componenti del Login.
require_once __DIR__.'/../../login_package/Login_Bean.php';
require_once __DIR__.'/../../login_package/Login_Model.php';
require_once __DIR__.'/../../login_package/Login_DAO.php';
require_once __DIR__.'/../../login_package/Login_ControlApp.php';

try {
    // [CONTROLLER APPLICATIVO - API] Legge la funzionalità richiesta.
    $funzione=$_GET['funzione'] ?? '';
    // [CONTROLLER APPLICATIVO - API] Legge l'azione richiesta.
    $azione=$_GET['azione'] ?? '';

    // [CONTROLLER APPLICATIVO - API] Gestisce l'azione di login.
    if($funzione==='login' && $azione==='accedi'){
        // [CONTROLLER GRAFICO - Login] Recupera il JSON inviato dal browser.
        $corpo=json_decode(file_get_contents('php://input'),true) ?: [];
        // [BEAN/DTO - Login] Crea il Bean lato server.
        $bean=new Login_Bean((string)($corpo['email']??''),(string)($corpo['password']??''));
        // [CONTROLLER APPLICATIVO - Login] Crea il controller applicativo.
        $controller=new Login_ControlApp(new Login_DAO($connessione),new Login_Model());
        // [CONTROLLER APPLICATIVO - Login] Esegue l'autenticazione.
        $dati=$controller->accedi($bean);
        // [CONTROLLER APPLICATIVO - API] Restituisce il risultato.
        echo json_encode(['ok'=>true,'dati'=>$dati],JSON_UNESCAPED_UNICODE);
        // [CONTROLLER APPLICATIVO - API] Termina l'azione login.
        exit;
    }

    // [CONTROLLER APPLICATIVO - API] Verifica la sessione prima di esporre dati aziendali.
    $utenteId=(int)($_SESSION['utente_id']??0);
    // [CONTROLLER APPLICATIVO - API] Recupera la struttura autenticata dalla sessione.
    $strutturaId=(int)($_SESSION['struttura_id']??0);
    // [CONTROLLER APPLICATIVO - API] Blocca le richieste senza sessione.
    if($utenteId<=0 || $strutturaId<=0) { http_response_code(401); throw new RuntimeException('Sessione non autenticata.'); }

    // [CONTROLLER APPLICATIVO - API] Gestisce il caricamento della dashboard.
    if($funzione==='dashboard' && $azione==='carica'){
        // [CONTROLLER APPLICATIVO - Dashboard] Crea il ControllerApplicativo della funzionalità.
        $controller=new Dashboard_ControlApp(new Dashboard_DAO($connessione),new Dashboard_Model());
        // [CONTROLLER APPLICATIVO - Dashboard] Esegue la catena completa fino al DAO.
        $bean=$controller->carica($utenteId,$strutturaId);
        // [CONTROLLER APPLICATIVO - API] Serializza il Bean/DTO per il browser.
        echo json_encode(['ok'=>true,'dati'=>$bean->toArray()],JSON_UNESCAPED_UNICODE);
        // [CONTROLLER APPLICATIVO - API] Termina l'azione dashboard.
        exit;
    }

    // [CONTROLLER APPLICATIVO - API] Segnala una funzione non ancora collegata.
    throw new RuntimeException('Funzionalità non ancora collegata al database.');
} catch(Throwable $errore) {
    // [CONTROLLER APPLICATIVO - API] Mantiene 401 per sessioni non autenticate e 400 per gli altri errori.
    if($errore->getMessage()==='Sessione non autenticata.') http_response_code(401); else http_response_code(400);
    // [CONTROLLER APPLICATIVO - API] Serializza il messaggio applicativo.
    echo json_encode(['ok'=>false,'messaggio'=>$errore->getMessage()],JSON_UNESCAPED_UNICODE);
}
