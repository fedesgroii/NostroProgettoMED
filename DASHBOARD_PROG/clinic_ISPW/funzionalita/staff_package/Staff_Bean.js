// [BEAN/DTO - Staff] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.staff_package = window.ClinicaFlow.staff_package || {};
// [BEAN/DTO - Staff] Incapsula i professionisti.
window.ClinicaFlow.staff_package.Staff_Bean = class Staff_Bean {
  // [BEAN/DTO - Staff] Costruisce il DTO con la lista professionisti.
  constructor({ operazione = 'carica', professionisti = [] } = {}) {
    // [BEAN/DTO - Staff] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Staff] Memorizza i professionisti.
    this.professionisti = professionisti.map((riga) => ({ ...riga, getSubtitle: () => riga.role ? `${riga.specialty} · ${riga.role}` : riga.specialty }));
  }
  // [BEAN/DTO - Staff] Serializza il DTO.
  toJSON() {
    // [BEAN/DTO - Staff] Restituisce il contratto minimo.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Staff] Ricostruisce il DTO risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Staff] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.staff_package.Staff_Bean({ dati, professionisti: dati.professionisti || [] });
  }
};
