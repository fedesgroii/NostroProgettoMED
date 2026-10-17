// [BEAN/DTO - Appuntamenti] Crea lo spazio globale della funzionalità Appuntamenti.
window.ClinicaFlow.appuntamenti_package = window.ClinicaFlow.appuntamenti_package || {};
// [BEAN/DTO - Appuntamenti] Incapsula le richieste e i dati degli appuntamenti.
window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean = class Appuntamenti_Bean {
  // [BEAN/DTO - Appuntamenti] Costruisce il DTO con tutti i dati necessari alle operazioni.
  constructor({ operazione = 'carica', id = null, data = '', orario = '', durata = 60, pazienteId = null, professionistaId = 1, tipo = '', appuntamenti = [] } = {}) {
    // [BEAN/DTO - Appuntamenti] Memorizza l'operazione richiesta.
    this.operazione = operazione;
    // [BEAN/DTO - Appuntamenti] Memorizza l'identificativo dell'appuntamento.
    this.id = id;
    // [BEAN/DTO - Appuntamenti] Memorizza la data target.
    this.data = data;
    // [BEAN/DTO - Appuntamenti] Memorizza l'orario target.
    this.orario = orario;
    // [BEAN/DTO - Appuntamenti] Memorizza la durata.
    this.durata = durata;
    // [BEAN/DTO - Appuntamenti] Memorizza il paziente selezionato.
    this.pazienteId = pazienteId;
    // [BEAN/DTO - Appuntamenti] Memorizza il professionista selezionato.
    this.professionistaId = professionistaId;
    // [BEAN/DTO - Appuntamenti] Memorizza la tipologia.
    this.tipo = tipo;
    // [BEAN/DTO - Appuntamenti] Memorizza gli appuntamenti ricevuti dal server per la View.
    this.appuntamenti = appuntamenti.map((riga) => this._creaRiga(riga));
  }
  // [BEAN/DTO - Appuntamenti] Crea l'oggetto riga con il metodo grafico usato da Appuntamenti_View.
  _creaRiga(riga) {
    // [BEAN/DTO - Appuntamenti] Restituisce i campi necessari senza introdurre regole di dominio.
    return { ...riga, getAgendaLabel: () => `${riga.time} · ${riga.type}` };
  }
  // [BEAN/DTO - Appuntamenti] Serializza soltanto i dati richiesti dal ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Appuntamenti] Restituisce il contratto JSON della funzionalità.
    return { operazione: this.operazione, id: this.id, data: this.data, orario: this.orario, durata: this.durata, pazienteId: this.pazienteId, professionistaId: this.professionistaId, tipo: this.tipo };
  }
  // [BEAN/DTO - Appuntamenti] Ricostruisce il DTO risposta con le righe dell'agenda.
  static daRisposta(dati) {
    // [BEAN/DTO - Appuntamenti] Restituisce un Bean pronto per Appuntamenti_View.
    return new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ dati, appuntamenti: dati.appuntamenti || [] });
  }
  // [BEAN/DTO - Appuntamenti] Costruisce il DTO per un movimento di agenda.
  static movimentoDaElemento(elemento, data, orario) {
    // [BEAN/DTO - Appuntamenti] Crea il Bean usando i data-* già presenti nella View.
    return new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ operazione: 'sposta', id: elemento.dataset.id, data, orario, durata: Number(elemento.dataset.duration) || 60 });
  }
};
