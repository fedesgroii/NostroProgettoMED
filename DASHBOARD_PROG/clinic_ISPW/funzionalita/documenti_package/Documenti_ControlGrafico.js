// [CONTROLLER GRAFICO - Documenti] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.documenti_package = window.ClinicaFlow.documenti_package || {};
// [CONTROLLER GRAFICO - Documenti] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.documenti_package.Documenti_ControlGrafico = class Documenti_ControlGrafico {
  // [CONTROLLER GRAFICO - Documenti] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Documenti] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('documents-root');
    // [CONTROLLER GRAFICO - Documenti] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.documenti_package.Documenti_View();
  }
  // [CONTROLLER GRAFICO - Documenti] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Documenti] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.documenti_package.Documenti_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Documenti] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('documents', bean);
    // [BEAN/DTO - Documenti] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.documenti_package.Documenti_Bean.daRisposta(risposta.data);
    // [VIEW - Documenti] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.documenti);
  }
};
