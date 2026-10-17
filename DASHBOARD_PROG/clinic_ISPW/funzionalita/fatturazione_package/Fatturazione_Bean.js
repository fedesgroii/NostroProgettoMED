// [BEAN/DTO - Fatturazione] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.fatturazione_package = window.ClinicaFlow.fatturazione_package || {};
// [BEAN/DTO - Fatturazione] Incapsula il registro delle fatture.
window.ClinicaFlow.fatturazione_package.Fatturazione_Bean = class Fatturazione_Bean {
  // [BEAN/DTO - Fatturazione] Costruisce il DTO con le righe fattura.
  constructor({ operazione = 'carica', fatture = [] } = {}) {
    // [BEAN/DTO - Fatturazione] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Fatturazione] Memorizza le fatture ricevute.
    this.fatture = fatture;
  }
  // [BEAN/DTO - Fatturazione] Serializza il DTO verso il ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Fatturazione] Restituisce il contratto minimo.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Fatturazione] Ricostruisce il DTO risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Fatturazione] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.fatturazione_package.Fatturazione_Bean({ dati, fatture: dati.fatture || [] });
  }
};
