// [CONTROLLER GRAFICO - Staff] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.staff_package = window.ClinicaFlow.staff_package || {};
// [CONTROLLER GRAFICO - Staff] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.staff_package.Staff_ControlGrafico = class Staff_ControlGrafico {
  // [CONTROLLER GRAFICO - Staff] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Staff] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('team-root');
    // [CONTROLLER GRAFICO - Staff] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.staff_package.Staff_View();
  }
  // [CONTROLLER GRAFICO - Staff] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Staff] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.staff_package.Staff_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Staff] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('team', bean);
    // [BEAN/DTO - Staff] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.staff_package.Staff_Bean.daRisposta(risposta.data);
    // [VIEW - Staff] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.professionisti);
  }
};
