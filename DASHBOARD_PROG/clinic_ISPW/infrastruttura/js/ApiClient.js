// [INFRASTRUTTURA] Recupera lo spazio globale dell'applicazione.
window.ClinicaFlow = window.ClinicaFlow || {};
// [INFRASTRUTTURA] Crea il contenitore del client HTTP.
window.ClinicaFlow.Infrastruttura = window.ClinicaFlow.Infrastruttura || {};
// [INFRASTRUTTURA] Incapsula esclusivamente il trasporto HTTP tra ControllerGrafico e ControllerApplicativo.
window.ClinicaFlow.Infrastruttura.ApiClient = class ApiClient {
  // [INFRASTRUTTURA] Invia un Bean/DTO al ControllerApplicativo della funzionalità indicata.
  static async invia(funzione, bean) {
    // [INFRASTRUTTURA] Costruisce l'URL dell'endpoint PHP della funzionalità.
    const url = `${window.ClinicaFlow.Configurazione.urlApi}?funzione=${encodeURIComponent(funzione)}`;
    // [INFRASTRUTTURA] Invia il Bean come JSON senza contenere logica applicativa.
    const risposta = await fetch(url, {
      // [INFRASTRUTTURA] Usa POST per mantenere uniforme il trasporto DTO verso ogni ControllerApplicativo.
      method: 'POST',
      // [INFRASTRUTTURA] Dichiara il formato JSON inviato dal ControllerGrafico.
      headers: { 'Content-Type': 'application/json' },
      // [INFRASTRUTTURA] Serializza il Bean/DTO nel body HTTP.
      body: JSON.stringify(bean.toJSON()),
    });
    // [INFRASTRUTTURA] Converte la risposta HTTP in JSON.
    const dati = await risposta.json();
    // [INFRASTRUTTURA] Propaga un errore tecnico quando il ControllerApplicativo risponde con HTTP non riuscito.
    if (!risposta.ok) throw new Error(dati.message || 'Errore di comunicazione con il server.');
    // [INFRASTRUTTURA] Restituisce i dati senza interpretarli in termini di dominio.
    return dati;
  }
};
