// [BEAN/DTO - Report] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.report_package = window.ClinicaFlow.report_package || {};
// [BEAN/DTO - Report] Incapsula le metriche restituite dal database.
window.ClinicaFlow.report_package.Report_Bean = class Report_Bean {
  // [BEAN/DTO - Report] Costruisce il DTO con le metriche.
  constructor({ operazione = 'carica', metriche = [] } = {}) {
    // [BEAN/DTO - Report] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Report] Memorizza le metriche.
    this.metriche = metriche;
  }
  // [BEAN/DTO - Report] Serializza il DTO.
  toJSON() {
    // [BEAN/DTO - Report] Restituisce il contratto minimo.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Report] Ricostruisce il DTO risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Report] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.report_package.Report_Bean({ dati, metriche: dati.metriche || [] });
  }
};
