// [CONTROLLER GRAFICO - Tasse] Importa la View della funzionalità.
import { Tasse_View } from './Tasse_View.js';
// [CONTROLLER GRAFICO - Tasse] Importa il Bean/DTO della funzionalità.
import { Tasse_Bean } from './Tasse_Bean.js';

// [CONTROLLER GRAFICO - Tasse] Gestisce gli eventi grafici della funzionalità.
export class Tasse_ControlGrafico {
    // [CONTROLLER GRAFICO - Tasse] Riceve il client HTTP e la View.
    constructor(apiClient, view = new Tasse_View()) {
        // [CONTROLLER GRAFICO - Tasse] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Tasse] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Tasse] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Tasse] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('tasse', 'carica', parametri);
        // [BEAN/DTO - Tasse] Incapsula la risposta nel Bean.
        const bean = new Tasse_Bean(dati);
        // [CONTROLLER GRAFICO - Tasse] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Tasse] Restituisce il DTO.
        return bean;
    }
    // [CONTROLLER GRAFICO - Tasse] Apre la schermata e monta la View nel contenitore principale.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - Tasse] Monta la View grafica della funzionalità.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - Tasse] Restituisce il ControllerGrafico per completare eventuali azioni successive.
        return this;
    }

}
