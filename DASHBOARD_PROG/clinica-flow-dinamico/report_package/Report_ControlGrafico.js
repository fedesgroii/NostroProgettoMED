// [CONTROLLER GRAFICO - Report] Importa la View della funzionalità.
import { Report_View } from './Report_View.js';
// [CONTROLLER GRAFICO - Report] Importa il Bean/DTO della funzionalità.
import { Report_Bean } from './Report_Bean.js';

// [CONTROLLER GRAFICO - Report] Gestisce gli eventi grafici della funzionalità.
export class Report_ControlGrafico {
    // [CONTROLLER GRAFICO - Report] Riceve il client HTTP e la View.
    constructor(apiClient, view = new Report_View()) {
        // [CONTROLLER GRAFICO - Report] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Report] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Report] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Report] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('report', 'carica', parametri);
        // [BEAN/DTO - Report] Incapsula la risposta nel Bean.
        const bean = new Report_Bean(dati);
        // [CONTROLLER GRAFICO - Report] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Report] Restituisce il DTO.
        return bean;
    }
    // [CONTROLLER GRAFICO - Report] Apre la schermata e monta la View nel contenitore principale.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - Report] Monta la View grafica della funzionalità.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - Report] Restituisce il ControllerGrafico per completare eventuali azioni successive.
        return this;
    }

}
