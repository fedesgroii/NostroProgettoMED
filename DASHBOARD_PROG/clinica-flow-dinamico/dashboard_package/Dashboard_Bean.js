// [BEAN/DTO - Dashboard] Trasporta al ControllerGrafico il risultato della Dashboard.
export class Dashboard_Bean {
    // [BEAN/DTO - Dashboard] Costruisce il DTO senza inventare dati.
    constructor(dati = {}) {
        // [BEAN/DTO - Dashboard] Memorizza il profilo dell'utente autenticato.
        this.utente = dati.utente ?? {};
        // [BEAN/DTO - Dashboard] Memorizza le statistiche della struttura.
        this.statistiche = dati.statistiche ?? {};
        // [BEAN/DTO - Dashboard] Memorizza gli appuntamenti del giorno.
        this.appuntamenti = dati.appuntamenti ?? [];
        // [BEAN/DTO - Dashboard] Memorizza le scadenze imminenti.
        this.scadenze = dati.scadenze ?? [];
        // [BEAN/DTO - Dashboard] Memorizza l'andamento degli incassi.
        this.andamentoIncassi = dati.andamentoIncassi ?? [];
    }
}
