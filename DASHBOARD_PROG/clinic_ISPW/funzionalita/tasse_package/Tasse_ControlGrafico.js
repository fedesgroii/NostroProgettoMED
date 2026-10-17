// [CONTROLLER GRAFICO - Tasse] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.tasse_package = window.ClinicaFlow.tasse_package || {};
// [CONTROLLER GRAFICO - Tasse] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.tasse_package.Tasse_ControlGrafico = class Tasse_ControlGrafico {
  // [CONTROLLER GRAFICO - Tasse] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Tasse] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('taxes-root');
    // [CONTROLLER GRAFICO - Tasse] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.tasse_package.Tasse_View();
  }
  // [CONTROLLER GRAFICO - Tasse] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Tasse] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.tasse_package.Tasse_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Tasse] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('taxes', bean);
    // [BEAN/DTO - Tasse] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.tasse_package.Tasse_Bean.daRisposta(risposta.data);
    // [VIEW - Tasse] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.scadenze);
  }
};
