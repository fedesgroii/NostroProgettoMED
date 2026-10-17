// [BEAN/DTO - Impostazioni] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.impostazioni_package = window.ClinicaFlow.impostazioni_package || {};
// [BEAN/DTO - Impostazioni] Incapsula i dati della struttura.
window.ClinicaFlow.impostazioni_package.Impostazioni_Bean = class Impostazioni_Bean {
  // [BEAN/DTO - Impostazioni] Costruisce il DTO con i valori della struttura.
  constructor({ operazione = 'carica', name = '', vat = '', phone = '', email = '', address = '' } = {}) {
    // [BEAN/DTO - Impostazioni] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Impostazioni] Memorizza il nome della struttura.
    this.name = name;
    // [BEAN/DTO - Impostazioni] Memorizza la partita IVA.
    this.vat = vat;
    // [BEAN/DTO - Impostazioni] Memorizza il telefono.
    this.phone = phone;
    // [BEAN/DTO - Impostazioni] Memorizza l'email.
    this.email = email;
    // [BEAN/DTO - Impostazioni] Memorizza l'indirizzo.
    this.address = address;
  }
  // [BEAN/DTO - Impostazioni] Serializza il DTO.
  toJSON() {
    // [BEAN/DTO - Impostazioni] Restituisce i dati richiesti dal ControllerApplicativo.
    return { operazione: this.operazione, name: this.name, vat: this.vat, phone: this.phone, email: this.email, address: this.address };
  }
  // [BEAN/DTO - Impostazioni] Ricostruisce il DTO della risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Impostazioni] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.impostazioni_package.Impostazioni_Bean({ ...dati });
  }
};
