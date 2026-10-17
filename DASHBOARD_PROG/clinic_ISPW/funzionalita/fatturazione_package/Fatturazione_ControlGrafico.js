// [CONTROLLER GRAFICO - Fatturazione] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.fatturazione_package = window.ClinicaFlow.fatturazione_package || {};
// [CONTROLLER GRAFICO - Fatturazione] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.fatturazione_package.Fatturazione_ControlGrafico = class Fatturazione_ControlGrafico {
  // [CONTROLLER GRAFICO - Fatturazione] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Fatturazione] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('finance-root');
    // [CONTROLLER GRAFICO - Fatturazione] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.fatturazione_package.Fatturazione_View();
  }
  // [CONTROLLER GRAFICO - Fatturazione] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Fatturazione] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.fatturazione_package.Fatturazione_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Fatturazione] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('finance', bean);
    // [BEAN/DTO - Fatturazione] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.fatturazione_package.Fatturazione_Bean.daRisposta(risposta.data);
    // [VIEW - Fatturazione] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.fatture);
  }
};
