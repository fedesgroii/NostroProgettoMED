// [INFRASTRUTTURA] Crea lo spazio globale condiviso dalla dashboard senza contenere logica di dominio.
window.ClinicaFlow = window.ClinicaFlow || {};
// [INFRASTRUTTURA] Crea il contenitore della configurazione client.
window.ClinicaFlow.Configurazione = window.ClinicaFlow.Configurazione || {};
// [INFRASTRUTTURA] Definisce l'URL del front controller PHP usato come trasporto verso i ControllerApplicativi.
window.ClinicaFlow.Configurazione.urlApi = 'backend/public/index.php';
