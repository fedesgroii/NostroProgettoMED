// [BEAN/DTO - Dashboard] Crea lo spazio globale della funzionalità Dashboard.
window.ClinicaFlow.dashboard_package = window.ClinicaFlow.dashboard_package || {};
// [BEAN/DTO - Dashboard] Incapsula la richiesta e la risposta della Dashboard.
window.ClinicaFlow.dashboard_package.Dashboard_Bean = class Dashboard_Bean {
  // [BEAN/DTO - Dashboard] Costruisce il DTO con operazione e dati ricevuti dal ControllerApplicativo.
  constructor({ operazione = 'carica', dati = {} } = {}) {
    // [BEAN/DTO - Dashboard] Memorizza il tipo di operazione richiesto.
    this.operazione = operazione;
    // [BEAN/DTO - Dashboard] Copia i dati della dashboard nel DTO.
    Object.assign(this, dati);
  }
  // [BEAN/DTO - Dashboard] Converte il DTO nella struttura JSON inviata al ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Dashboard] Restituisce operazione e filtri senza aggiungere logica di dominio.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Dashboard] Ricostruisce un DTO a partire dalla risposta del ControllerApplicativo.
  static daRisposta(dati) {
    // [BEAN/DTO - Dashboard] Restituisce il DTO pronto per Dashboard_View.
    return new window.ClinicaFlow.dashboard_package.Dashboard_Bean({ dati });
  }
};
