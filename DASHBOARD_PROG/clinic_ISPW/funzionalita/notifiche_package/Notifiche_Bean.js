// [BEAN/DTO - Notifiche] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.notifiche_package = window.ClinicaFlow.notifiche_package || {};
// [BEAN/DTO - Notifiche] Incapsula la richiesta di visualizzazione delle notifiche.
window.ClinicaFlow.notifiche_package.Notifiche_Bean = class Notifiche_Bean {
  // [BEAN/DTO - Notifiche] Costruisce il DTO dell'interazione.
  constructor({ operazione = 'mostra' } = {}) {
    // [BEAN/DTO - Notifiche] Memorizza l'operazione.
    this.operazione = operazione;
  }
  // [BEAN/DTO - Notifiche] Serializza la richiesta verso il ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Notifiche] Restituisce il contratto JSON minimo.
    return { operazione: this.operazione };
  }
};
