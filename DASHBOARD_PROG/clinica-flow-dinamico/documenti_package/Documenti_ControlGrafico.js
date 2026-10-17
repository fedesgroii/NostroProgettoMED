// [CONTROLLER GRAFICO - Documenti] Importa la View della funzionalità.
import { Documenti_View } from './Documenti_View.js';
// [CONTROLLER GRAFICO - Documenti] Importa il Bean/DTO della funzionalità.
import { Documenti_Bean } from './Documenti_Bean.js';

// [CONTROLLER GRAFICO - Documenti] Gestisce gli eventi grafici della funzionalità.
export class Documenti_ControlGrafico {
    // [CONTROLLER GRAFICO - Documenti] Riceve il client HTTP e la View.
    constructor(apiClient, view = new Documenti_View()) {
        // [CONTROLLER GRAFICO - Documenti] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Documenti] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Documenti] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Documenti] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('documenti', 'carica', parametri);
        // [BEAN/DTO - Documenti] Incapsula la risposta nel Bean.
        const bean = new Documenti_Bean(dati);
        // [CONTROLLER GRAFICO - Documenti] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Documenti] Restituisce il DTO.
        return bean;
    }
    // [CONTROLLER GRAFICO - Documenti] Apre la schermata e monta la View nel contenitore principale.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - Documenti] Monta la View grafica della funzionalità.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - Documenti] Restituisce il ControllerGrafico per completare eventuali azioni successive.
        return this;
    }

}
