// [CONTROLLER GRAFICO - Report] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.report_package = window.ClinicaFlow.report_package || {};
// [CONTROLLER GRAFICO - Report] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.report_package.Report_ControlGrafico = class Report_ControlGrafico {
  // [CONTROLLER GRAFICO - Report] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Report] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('reports-root');
    // [CONTROLLER GRAFICO - Report] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.report_package.Report_View();
  }
  // [CONTROLLER GRAFICO - Report] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Report] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.report_package.Report_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Report] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('reports', bean);
    // [BEAN/DTO - Report] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.report_package.Report_Bean.daRisposta(risposta.data);
    // [VIEW - Report] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.metriche);
  }
};
