// [CONTROLLER GRAFICO - Impostazioni] Importa la View della funzionalità.
import { Impostazioni_View } from './Impostazioni_View.js';
// [CONTROLLER GRAFICO - Impostazioni] Importa il Bean/DTO della funzionalità.
import { Impostazioni_Bean } from './Impostazioni_Bean.js';

// [CONTROLLER GRAFICO - Impostazioni] Gestisce gli eventi grafici della funzionalità.
export class Impostazioni_ControlGrafico {
    // [CONTROLLER GRAFICO - Impostazioni] Riceve il client HTTP e la View.
    constructor(apiClient, view = new Impostazioni_View()) {
        // [CONTROLLER GRAFICO - Impostazioni] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Impostazioni] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Impostazioni] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Impostazioni] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('impostazioni', 'carica', parametri);
        // [BEAN/DTO - Impostazioni] Incapsula la risposta nel Bean.
        const bean = new Impostazioni_Bean(dati);
        // [CONTROLLER GRAFICO - Impostazioni] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Impostazioni] Restituisce il DTO.
        return bean;
    }
    // [CONTROLLER GRAFICO - Impostazioni] Apre la schermata e monta la View nel contenitore principale.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - Impostazioni] Monta la View grafica della funzionalità.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - Impostazioni] Restituisce il ControllerGrafico per completare eventuali azioni successive.
        return this;
    }

}
