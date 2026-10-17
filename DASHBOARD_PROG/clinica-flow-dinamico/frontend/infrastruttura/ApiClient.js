// [INFRASTRUTTURA - API] Espone un client HTTP tecnico riutilizzabile dal ControllerGrafico.
export class ApiClient {
    // [INFRASTRUTTURA - API] Costruisce il client con l'endpoint unico del backend.
    constructor(urlApi = new URL('../../backend/public/api.php', import.meta.url).href) {
        // [INFRASTRUTTURA - API] Memorizza l'URL senza conoscere alcuna funzionalità.
        this.urlApi = urlApi;
    }

    // [INFRASTRUTTURA - API] Esegue una richiesta GET verso una funzionalità.
    async get(funzione, azione, parametri = {}) {
        // [INFRASTRUTTURA - API] Costruisce la query string.
        const query = new URLSearchParams({ funzione, azione, ...parametri });
        // [INFRASTRUTTURA - API] Invia la richiesta mantenendo i cookie di sessione.
        const risposta = await fetch(`${this.urlApi}?${query.toString()}`, { credentials: 'same-origin' });
        // [INFRASTRUTTURA - API] Verifica lo stato HTTP.
        if (!risposta.ok) { if (risposta.status === 401) throw new Error('Sessione non autenticata.'); throw new Error(`Errore HTTP ${risposta.status}`); }
        // [INFRASTRUTTURA - API] Decodifica la risposta JSON.
        const risultato = await risposta.json();
        // [INFRASTRUTTURA - API] Propaga gli errori applicativi del backend.
        if (!risultato.ok) throw new Error(risultato.messaggio || 'Errore applicativo.');
        // [INFRASTRUTTURA - API] Restituisce solo i dati funzionali al ControllerGrafico.
        return risultato.dati;
    }

    // [INFRASTRUTTURA - API] Esegue una richiesta POST verso una funzionalità.
    async post(funzione, azione, corpo = {}) {
        // [INFRASTRUTTURA - API] Invia il DTO JSON al backend.
        const risposta = await fetch(`${this.urlApi}?funzione=${encodeURIComponent(funzione)}&azione=${encodeURIComponent(azione)}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            credentials: 'same-origin',
            body: JSON.stringify(corpo)
        });
        // [INFRASTRUTTURA - API] Verifica lo stato HTTP.
        if (!risposta.ok) { if (risposta.status === 401) throw new Error('Sessione non autenticata.'); throw new Error(`Errore HTTP ${risposta.status}`); }
        // [INFRASTRUTTURA - API] Decodifica la risposta JSON.
        const risultato = await risposta.json();
        // [INFRASTRUTTURA - API] Propaga gli errori applicativi del backend.
        if (!risultato.ok) throw new Error(risultato.messaggio || 'Errore applicativo.');
        // [INFRASTRUTTURA - API] Restituisce il DTO serializzato dal ControllerApplicativo.
        return risultato.dati;
    }
}
