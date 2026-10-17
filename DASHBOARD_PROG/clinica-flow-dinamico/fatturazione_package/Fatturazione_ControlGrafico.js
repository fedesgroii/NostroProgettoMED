// [CONTROLLER GRAFICO - Fatturazione] Importa la View della funzionalità.
import { Fatturazione_View } from './Fatturazione_View.js';
// [CONTROLLER GRAFICO - Fatturazione] Importa il Bean/DTO della funzionalità.
import { Fatturazione_Bean } from './Fatturazione_Bean.js';

// [CONTROLLER GRAFICO - Fatturazione] Gestisce gli eventi grafici della funzionalità.
export class Fatturazione_ControlGrafico {
    // [CONTROLLER GRAFICO - Fatturazione] Riceve il client HTTP e la View.
    constructor(apiClient, view = new Fatturazione_View()) {
        // [CONTROLLER GRAFICO - Fatturazione] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Fatturazione] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Fatturazione] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - Fatturazione] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('fatturazione', 'carica', parametri);
        // [BEAN/DTO - Fatturazione] Incapsula la risposta nel Bean.
        const bean = new Fatturazione_Bean(dati);
        // [CONTROLLER GRAFICO - Fatturazione] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - Fatturazione] Restituisce il DTO.
        return bean;
    }
    // [CONTROLLER GRAFICO - Fatturazione] Apre la schermata e monta la View nel contenitore principale.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - Fatturazione] Monta la View grafica della funzionalità.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - Fatturazione] Restituisce il ControllerGrafico per completare eventuali azioni successive.
        return this;
    }

}
