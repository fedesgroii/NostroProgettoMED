// [BEAN/DTO - Cartelle cliniche] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.cartelle_cliniche_package = window.ClinicaFlow.cartelle_cliniche_package || {};
// [BEAN/DTO - Cartelle cliniche] Incapsula il paziente richiesto e le note restituite.
window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_Bean = class CartelleCliniche_Bean {
  // [BEAN/DTO - Cartelle cliniche] Costruisce il DTO con identificativo paziente e liste.
  constructor({ operazione = 'carica', pazienteId = 1, pazienti = [], pazienteSelezionato = null, note = [] } = {}) {
    // [BEAN/DTO - Cartelle cliniche] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Cartelle cliniche] Memorizza il paziente richiesto.
    this.pazienteId = pazienteId;
    // [BEAN/DTO - Cartelle cliniche] Memorizza l'elenco pazienti sintetico.
    this.pazienti = pazienti;
    // [BEAN/DTO - Cartelle cliniche] Memorizza il paziente selezionato.
    this.pazienteSelezionato = pazienteSelezionato;
    // [BEAN/DTO - Cartelle cliniche] Memorizza le note cliniche.
    this.note = note;
  }
  // [BEAN/DTO - Cartelle cliniche] Serializza il parametro necessario al ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Cartelle cliniche] Restituisce il contratto JSON della funzione.
    return { operazione: this.operazione, pazienteId: this.pazienteId };
  }
  // [BEAN/DTO - Cartelle cliniche] Costruisce il DTO di risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Cartelle cliniche] Restituisce il Bean completo per la View.
    return new window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_Bean({ dati, pazienti: dati.pazienti || [], pazienteSelezionato: dati.pazienteSelezionato || null, note: dati.note || [] });
  }
};
