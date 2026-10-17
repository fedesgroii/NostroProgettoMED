// [BEAN/DTO - Documenti] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.documenti_package = window.ClinicaFlow.documenti_package || {};
// [BEAN/DTO - Documenti] Incapsula il registro documentale.
window.ClinicaFlow.documenti_package.Documenti_Bean = class Documenti_Bean {
  // [BEAN/DTO - Documenti] Costruisce il DTO con la lista documentale.
  constructor({ operazione = 'carica', documenti = [] } = {}) {
    // [BEAN/DTO - Documenti] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Documenti] Memorizza le righe documentali.
    this.documenti = documenti;
  }
  // [BEAN/DTO - Documenti] Serializza il DTO verso il ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Documenti] Restituisce il contratto minimo.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Documenti] Ricostruisce il DTO della risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Documenti] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.documenti_package.Documenti_Bean({ dati, documenti: dati.documenti || [] });
  }
};
