// [CONTROLLER GRAFICO - Notifiche] Importa il Bean/DTO della funzionalità.
import { Notifiche_Bean } from './Notifiche_Bean.js';

// [CONTROLLER GRAFICO - Notifiche] Gestisce gli eventi grafici della funzionalità.
export class Notifiche_ControlGrafico {
    // [CONTROLLER GRAFICO - Notifiche] Riceve il client HTTP e la View.
    constructor(apiClient, view = null) {
        // [CONTROLLER GRAFICO - Notifiche] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Notifiche] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Notifiche] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Notifiche] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('notifiche', 'carica', parametri);
        // [BEAN/DTO - Notifiche] Incapsula la risposta nel Bean.
        const bean = new Notifiche_Bean(dati);
        // [CONTROLLER GRAFICO - Notifiche] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Notifiche] Restituisce il DTO.
        return bean;
    }
}
