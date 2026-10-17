// [CONTROLLER GRAFICO - Sessione] Crea lo spazio della funzionalità sessione.
window.ClinicaFlow.sessione_package = window.ClinicaFlow.sessione_package || {};
// [CONTROLLER GRAFICO - Sessione] Gestisce l'evento logout mantenendo invariato il comportamento demo.
window.ClinicaFlow.sessione_package.Sessione_ControlGrafico = class Sessione_ControlGrafico {
  // [CONTROLLER GRAFICO - Sessione] Costruisce il controller con la View della funzionalità.
  constructor() {
    // [VIEW - Sessione] Crea la View che conosce il controllo grafico logout.
    this.view = new window.ClinicaFlow.sessione_package.Sessione_View();
  }
  // [CONTROLLER GRAFICO - Sessione] Collega il pulsante di logout presente nella Sidebar_View.
  collega() {
    // [CONTROLLER GRAFICO - Sessione] Recupera il pulsante esci.
    const pulsante = document.querySelector(this.view.selettoreLogout());
    // [CONTROLLER GRAFICO - Sessione] Collega il click al flusso Bean -> ControllerApplicativo.
    if (pulsante) pulsante.onclick = () => this.eseguiLogoutDemo();
  }
  // [CONTROLLER GRAFICO - Sessione] Esegue il flusso applicativo senza effettuare il logout reale.
  async eseguiLogoutDemo() {
    // [BEAN/DTO - Sessione] Costruisce il DTO logout.
    const bean = new window.ClinicaFlow.sessione_package.Sessione_Bean({ operazione: 'logout' });
    // [CONTROLLER GRAFICO - Sessione] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('sessione', bean);
    // [INFRASTRUTTURA - Toast] Mantiene esattamente il messaggio demo mostrato prima.
    window.ClinicaFlow.Infrastruttura.mostraToast(risposta.data.messaggio);
  }
};
