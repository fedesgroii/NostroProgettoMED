// [CONTROLLER GRAFICO - Staff] Importa la View della funzionalità.
import { Staff_View } from './Staff_View.js';
// [CONTROLLER GRAFICO - Staff] Importa il Bean/DTO della funzionalità.
import { Staff_Bean } from './Staff_Bean.js';

// [CONTROLLER GRAFICO - Staff] Gestisce gli eventi grafici della funzionalità.
export class Staff_ControlGrafico {
    // [CONTROLLER GRAFICO - Staff] Riceve il client HTTP e la View.
    constructor(apiClient, view = new Staff_View()) {
        // [CONTROLLER GRAFICO - Staff] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Staff] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Staff] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Staff] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('staff', 'carica', parametri);
        // [BEAN/DTO - Staff] Incapsula la risposta nel Bean.
        const bean = new Staff_Bean(dati);
        // [CONTROLLER GRAFICO - Staff] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Staff] Restituisce il DTO.
        return bean;
    }
    // [CONTROLLER GRAFICO - Staff] Apre la schermata e monta la View nel contenitore principale.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - Staff] Monta la View grafica della funzionalità.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - Staff] Restituisce il ControllerGrafico per completare eventuali azioni successive.
        return this;
    }

}
