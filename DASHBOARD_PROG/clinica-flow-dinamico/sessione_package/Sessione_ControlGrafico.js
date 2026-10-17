// [CONTROLLER GRAFICO - Sessione] Importa il Bean/DTO della funzionalità.
import { Sessione_Bean } from './Sessione_Bean.js';

// [CONTROLLER GRAFICO - Sessione] Gestisce gli eventi grafici della funzionalità.
export class Sessione_ControlGrafico {
    // [CONTROLLER GRAFICO - Sessione] Riceve il client HTTP e la View.
    constructor(apiClient, view = null) {
        // [CONTROLLER GRAFICO - Sessione] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Sessione] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Sessione] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Sessione] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('sessione', 'carica', parametri);
        // [BEAN/DTO - Sessione] Incapsula la risposta nel Bean.
        const bean = new Sessione_Bean(dati);
        // [CONTROLLER GRAFICO - Sessione] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Sessione] Restituisce il DTO.
        return bean;
    }
}
