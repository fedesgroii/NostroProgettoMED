// [BEAN/DTO - Sessione] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.sessione_package = window.ClinicaFlow.sessione_package || {};
// [BEAN/DTO - Sessione] Incapsula la richiesta di logout mantenendo il comportamento demo originale.
window.ClinicaFlow.sessione_package.Sessione_Bean = class Sessione_Bean {
  // [BEAN/DTO - Sessione] Costruisce il DTO dell'operazione logout.
  constructor({ operazione = 'logout' } = {}) {
    // [BEAN/DTO - Sessione] Memorizza il tipo di operazione.
    this.operazione = operazione;
  }
  // [BEAN/DTO - Sessione] Serializza la richiesta.
  toJSON() {
    // [BEAN/DTO - Sessione] Restituisce il contratto JSON minimo.
    return { operazione: this.operazione };
  }
};
