<?php
// [CONTROLLER APPLICATIVO - Router] Carica il bootstrap prima di instradare la funzionalità.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Router] Include connessione e autoloader tecnici.
require dirname(__DIR__).'/bootstrap.php';
// [CONTROLLER APPLICATIVO - Router] Importa il parser request.
use ClinicaFlow\Core\Request;
// [CONTROLLER APPLICATIVO - Router] Importa il gestore JSON.
use ClinicaFlow\Core\JsonResponse;
// [CONTROLLER APPLICATIVO - Router] Legge la funzionalità richiesta dal ControllerGrafico.
$funzione = Request::query('funzione') ?? '';
// [CONTROLLER APPLICATIVO - Router] Legge il Bean/DTO inviato dal browser.
$payload = Request::json();
try {
    // [CONTROLLER APPLICATIVO - Router] Smista Dashboard al suo ControllerApplicativo dedicato.
    if ($funzione === 'dashboard') { $c = new \ClinicaFlow\dashboard_package\Dashboard_ControlApp(new \ClinicaFlow\dashboard_package\Dashboard_DAO($pdo)); $b = \ClinicaFlow\dashboard_package\Dashboard_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Appuntamenti al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'appuntamenti') { $c = new \ClinicaFlow\appuntamenti_package\Appuntamenti_ControlApp(new \ClinicaFlow\appuntamenti_package\Appuntamenti_DAO($pdo)); $b = \ClinicaFlow\appuntamenti_package\Appuntamenti_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Pazienti al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'pazienti') { $c = new \ClinicaFlow\pazienti_package\Pazienti_ControlApp(new \ClinicaFlow\pazienti_package\Pazienti_DAO($pdo)); $b = \ClinicaFlow\pazienti_package\Pazienti_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Cartelle cliniche al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'cartelle_cliniche') { $c = new \ClinicaFlow\cartelle_cliniche_package\CartelleCliniche_ControlApp(new \ClinicaFlow\cartelle_cliniche_package\CartelleCliniche_DAO($pdo)); $b = \ClinicaFlow\cartelle_cliniche_package\CartelleCliniche_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Documenti al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'documenti') { $c = new \ClinicaFlow\documenti_package\Documenti_ControlApp(new \ClinicaFlow\documenti_package\Documenti_DAO($pdo)); $b = \ClinicaFlow\documenti_package\Documenti_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Fatturazione al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'fatturazione') { $c = new \ClinicaFlow\fatturazione_package\Fatturazione_ControlApp(new \ClinicaFlow\fatturazione_package\Fatturazione_DAO($pdo)); $b = \ClinicaFlow\fatturazione_package\Fatturazione_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Tasse al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'tasse') { $c = new \ClinicaFlow\tasse_package\Tasse_ControlApp(new \ClinicaFlow\tasse_package\Tasse_DAO($pdo)); $b = \ClinicaFlow\tasse_package\Tasse_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Report al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'report') { $c = new \ClinicaFlow\report_package\Report_ControlApp(new \ClinicaFlow\report_package\Report_DAO($pdo)); $b = \ClinicaFlow\report_package\Report_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Staff al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'staff') { $c = new \ClinicaFlow\staff_package\Staff_ControlApp(new \ClinicaFlow\staff_package\Staff_DAO($pdo)); $b = \ClinicaFlow\staff_package\Staff_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Impostazioni al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'impostazioni') { $c = new \ClinicaFlow\impostazioni_package\Impostazioni_ControlApp(new \ClinicaFlow\impostazioni_package\Impostazioni_DAO($pdo)); $b = \ClinicaFlow\impostazioni_package\Impostazioni_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Notifiche al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'notifiche') { $c = new \ClinicaFlow\notifiche_package\Notifiche_ControlApp(new \ClinicaFlow\notifiche_package\Notifiche_DAO($pdo)); $b = \ClinicaFlow\notifiche_package\Notifiche_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Sessione al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'sessione') { $c = new \ClinicaFlow\sessione_package\Sessione_ControlApp(new \ClinicaFlow\sessione_package\Sessione_DAO($pdo)); $b = \ClinicaFlow\sessione_package\Sessione_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Restituisce 404 per una funzione sconosciuta.
    else JsonResponse::invia(['message' => 'Funzionalità non trovata.'], 404);
} catch (InvalidArgumentException $eccezione) {
    // [CONTROLLER APPLICATIVO - Router] Converte gli errori di validazione in 422.
    JsonResponse::invia(['message' => $eccezione->getMessage()], 422);
} catch (Throwable $eccezione) {
    // [CONTROLLER APPLICATIVO - Router] Nasconde i dettagli interni in produzione.
    JsonResponse::invia(['message' => 'Errore interno del server.'], 500);
}
