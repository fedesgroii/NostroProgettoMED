// [CONTROLLER GRAFICO - Pazienti] Importa la View della funzionalità.
import { Pazienti_View } from './Pazienti_View.js';
// [CONTROLLER GRAFICO - Pazienti] Importa il Bean/DTO della funzionalità.
import { Pazienti_Bean } from './Pazienti_Bean.js';

// [CONTROLLER GRAFICO - Pazienti] Gestisce gli eventi grafici della funzionalità.
export class Pazienti_ControlGrafico {
    // [CONTROLLER GRAFICO - Pazienti] Riceve il client HTTP e la View.
    constructor(apiClient, view = new Pazienti_View()) {
        // [CONTROLLER GRAFICO - Pazienti] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Pazienti] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Pazienti] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Pazienti] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('pazienti', 'carica', parametri);
        // [BEAN/DTO - Pazienti] Incapsula la risposta nel Bean.
        const bean = new Pazienti_Bean(dati);
        // [CONTROLLER GRAFICO - Pazienti] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Pazienti] Restituisce il DTO.
        return bean;
    }
    // [CONTROLLER GRAFICO - Pazienti] Apre la schermata e monta la View nel contenitore principale.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - Pazienti] Monta la View grafica della funzionalità.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - Pazienti] Restituisce il ControllerGrafico per completare eventuali azioni successive.
        return this;
    }

}
