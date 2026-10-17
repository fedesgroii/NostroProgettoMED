// [BEAN/DTO - Tasse] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.tasse_package = window.ClinicaFlow.tasse_package || {};
// [BEAN/DTO - Tasse] Incapsula le scadenze fiscali.
window.ClinicaFlow.tasse_package.Tasse_Bean = class Tasse_Bean {
  // [BEAN/DTO - Tasse] Costruisce il DTO con le scadenze.
  constructor({ operazione = 'carica', scadenze = [] } = {}) {
    // [BEAN/DTO - Tasse] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Tasse] Memorizza l'elenco delle scadenze.
    this.scadenze = scadenze;
  }
  // [BEAN/DTO - Tasse] Serializza il DTO.
  toJSON() {
    // [BEAN/DTO - Tasse] Restituisce il contratto minimo della funzione.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Tasse] Ricostruisce la risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Tasse] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.tasse_package.Tasse_Bean({ dati, scadenze: dati.scadenze || [] });
  }
};
