// [CONTROLLER GRAFICO - Notifiche] Crea lo spazio della funzionalità notifiche.
window.ClinicaFlow.notifiche_package = window.ClinicaFlow.notifiche_package || {};
// [CONTROLLER GRAFICO - Notifiche] Gestisce il click grafico e il passaggio Bean -> ControllerApplicativo.
window.ClinicaFlow.notifiche_package.Notifiche_ControlGrafico = class Notifiche_ControlGrafico {
  // [CONTROLLER GRAFICO - Notifiche] Costruisce il controller con la View della funzionalità.
  constructor() {
    // [VIEW - Notifiche] Crea la View che conosce il controllo grafico notifiche.
    this.view = new window.ClinicaFlow.notifiche_package.Notifiche_View();
  }
  // [CONTROLLER GRAFICO - Notifiche] Collega l'icona notifiche della Topbar_View.
  collega() {
    // [CONTROLLER GRAFICO - Notifiche] Recupera il pulsante notifiche.
    const pulsante = document.querySelector(this.view.selettorePulsante());
    // [CONTROLLER GRAFICO - Notifiche] Collega il click alla richiesta applicativa.
    if (pulsante) pulsante.onclick = () => this.mostra();
  }
  // [CONTROLLER GRAFICO - Notifiche] Esegue il flusso completo della funzionalità.
  async mostra() {
    // [BEAN/DTO - Notifiche] Costruisce il DTO dell'azione mostra.
    const bean = new window.ClinicaFlow.notifiche_package.Notifiche_Bean({ operazione: 'mostra' });
    // [CONTROLLER GRAFICO - Notifiche] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('notifiche', bean);
    // [CONTROLLER GRAFICO - Notifiche] Mostra il messaggio identico a quello esistente usando il risultato server.
    window.ClinicaFlow.Infrastruttura.mostraToast(risposta.data.messaggio);
  }
};
