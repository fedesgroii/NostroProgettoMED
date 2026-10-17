// [CONTROLLER GRAFICO - Impostazioni] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.impostazioni_package = window.ClinicaFlow.impostazioni_package || {};
// [CONTROLLER GRAFICO - Impostazioni] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.impostazioni_package.Impostazioni_ControlGrafico = class Impostazioni_ControlGrafico {
  // [CONTROLLER GRAFICO - Impostazioni] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Impostazioni] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('settings-root');
    // [CONTROLLER GRAFICO - Impostazioni] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.impostazioni_package.Impostazioni_View();
  }
  // [CONTROLLER GRAFICO - Impostazioni] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Impostazioni] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.impostazioni_package.Impostazioni_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Impostazioni] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('settings', bean);
    // [BEAN/DTO - Impostazioni] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.impostazioni_package.Impostazioni_Bean.daRisposta(risposta.data);
    // [VIEW - Impostazioni] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati);
  }
};
