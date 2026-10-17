// [CONTROLLER GRAFICO - Appuntamenti] Importa la View della funzionalità.
import { Appuntamenti_View } from './Appuntamenti_View.js';
// [CONTROLLER GRAFICO - Appuntamenti] Importa il Bean/DTO della funzionalità.
import { Appuntamenti_Bean } from './Appuntamenti_Bean.js';

// [CONTROLLER GRAFICO - Appuntamenti] Gestisce gli eventi grafici della funzionalità.
export class Appuntamenti_ControlGrafico {
    // [CONTROLLER GRAFICO - Appuntamenti] Riceve il client HTTP e la View.
    constructor(apiClient, view = new Appuntamenti_View()) {
        // [CONTROLLER GRAFICO - Appuntamenti] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Appuntamenti] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Appuntamenti] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Appuntamenti] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('appuntamenti', 'carica', parametri);
        // [BEAN/DTO - Appuntamenti] Incapsula la risposta nel Bean.
        const bean = new Appuntamenti_Bean(dati);
        // [CONTROLLER GRAFICO - Appuntamenti] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Appuntamenti] Restituisce il DTO.
        return bean;
    }
    // [CONTROLLER GRAFICO - Appuntamenti] Apre la schermata e monta la View nel contenitore principale.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - Appuntamenti] Monta la View grafica della funzionalità.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - Appuntamenti] Restituisce il ControllerGrafico per completare eventuali azioni successive.
        return this;
    }

}
