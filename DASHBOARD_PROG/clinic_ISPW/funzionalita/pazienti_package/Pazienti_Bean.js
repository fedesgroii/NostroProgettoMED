// [BEAN/DTO - Pazienti] Crea lo spazio globale della funzionalità Pazienti.
window.ClinicaFlow.pazienti_package = window.ClinicaFlow.pazienti_package || {};
// [BEAN/DTO - Pazienti] Incapsula richieste e risposte dell'anagrafica.
window.ClinicaFlow.pazienti_package.Pazienti_Bean = class Pazienti_Bean {
  // [BEAN/DTO - Pazienti] Costruisce il DTO della funzione Pazienti.
  constructor({ operazione = 'carica', nome = '', cognome = '', telefono = '', email = '', professionistaId = 1, pazienti = [] } = {}) {
    // [BEAN/DTO - Pazienti] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Pazienti] Memorizza il nome inserito nel form.
    this.nome = nome;
    // [BEAN/DTO - Pazienti] Memorizza il cognome inserito nel form.
    this.cognome = cognome;
    // [BEAN/DTO - Pazienti] Memorizza il telefono inserito.
    this.telefono = telefono;
    // [BEAN/DTO - Pazienti] Memorizza l'email inserita.
    this.email = email;
    // [BEAN/DTO - Pazienti] Memorizza il professionista associato.
    this.professionistaId = professionistaId;
    // [BEAN/DTO - Pazienti] Memorizza le righe paziente restituite dal database.
    this.pazienti = pazienti;
  }
  // [BEAN/DTO - Pazienti] Serializza il DTO per il ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Pazienti] Restituisce solo dati di trasporto.
    return { operazione: this.operazione, nome: this.nome, cognome: this.cognome, telefono: this.telefono, email: this.email, professionistaId: this.professionistaId };
  }
  // [BEAN/DTO - Pazienti] Ricostruisce il DTO a partire dalla risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Pazienti] Restituisce il Bean completo per Pazienti_View.
    return new window.ClinicaFlow.pazienti_package.Pazienti_Bean({ dati, pazienti: dati.pazienti || [] });
  }
};
