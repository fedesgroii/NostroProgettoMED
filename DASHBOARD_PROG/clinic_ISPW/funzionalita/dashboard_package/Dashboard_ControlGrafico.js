// [CONTROLLER GRAFICO - Dashboard] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.dashboard_package = window.ClinicaFlow.dashboard_package || {};
// [CONTROLLER GRAFICO - Dashboard] Gestisce esclusivamente eventi della View e passaggio del Bean al ControllerApplicativo.
window.ClinicaFlow.dashboard_package.Dashboard_ControlGrafico = class Dashboard_ControlGrafico {
  // [CONTROLLER GRAFICO - Dashboard] Costruisce il controller grafico con mountpoint e dipendenze grafiche.
  constructor() {
    // [CONTROLLER GRAFICO - Dashboard] Recupera il contenitore HTML della funzionalità.
    this.mount = document.getElementById('dashboard-root');
    // [CONTROLLER GRAFICO - Dashboard] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.dashboard_package.Dashboard_View();
  }
  // [CONTROLLER GRAFICO - Dashboard] Carica i dati passando obbligatoriamente dal Bean al ControllerApplicativo.
  async inizializza() {
    // [CONTROLLER GRAFICO - Dashboard] Crea il Bean/DTO della richiesta di caricamento.
    const bean = new window.ClinicaFlow.dashboard_package.Dashboard_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Dashboard] Invia il Bean al ControllerApplicativo tramite il solo trasporto HTTP.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('dashboard', bean);
    // [CONTROLLER GRAFICO - Dashboard] Ricostruisce il Bean/DTO di risposta.
    const dati = window.ClinicaFlow.dashboard_package.Dashboard_Bean.daRisposta(risposta.data);
    // [VIEW - Dashboard] Monta la View con i dati arrivati dal ControllerApplicativo.
    this.mount.innerHTML = this.view.render(dati);
    // [CONTROLLER GRAFICO - Dashboard] Collega le sole azioni grafiche della dashboard.
    this.collegaAzioniNavigazione();
  }

  // [CONTROLLER GRAFICO - Dashboard] Collega i pulsanti di navigazione senza gestire dati di altre feature.
  collegaAzioniNavigazione() {
    // [CONTROLLER GRAFICO - Dashboard] Recupera i pulsanti marcati con data-page-action.
    this.mount.querySelectorAll('[data-page-action]').forEach((pulsante) => {
      // [CONTROLLER GRAFICO - Dashboard] Inoltra il cambio pagina al ControllerGrafico di Navigazione infrastrutturale.
      pulsante.addEventListener('click', () => window.ClinicaFlow.Navigazione_ControlGrafico.mostraPagina(pulsante.dataset.pageAction));
    });
  }

};
