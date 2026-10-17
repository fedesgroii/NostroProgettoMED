// [CONTROLLER GRAFICO - Cartelle cliniche] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.cartelle_cliniche_package = window.ClinicaFlow.cartelle_cliniche_package || {};
// [CONTROLLER GRAFICO - Cartelle cliniche] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_ControlGrafico = class CartelleCliniche_ControlGrafico {
  // [CONTROLLER GRAFICO - Cartelle cliniche] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Cartelle cliniche] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('clinical-root');
    // [CONTROLLER GRAFICO - Cartelle cliniche] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_View();
  }
  // [CONTROLLER GRAFICO - Cartelle cliniche] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Cartelle cliniche] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Cartelle cliniche] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('clinical', bean);
    // [BEAN/DTO - Cartelle cliniche] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_Bean.daRisposta(risposta.data);
    // [VIEW - Cartelle cliniche] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.pazienti, dati.pazienteSelezionato, dati.note);
  }
};
