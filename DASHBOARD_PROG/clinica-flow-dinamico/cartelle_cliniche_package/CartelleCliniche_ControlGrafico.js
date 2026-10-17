// [CONTROLLER GRAFICO - CartelleCliniche] Importa la View della funzionalità.
import { CartelleCliniche_View } from './CartelleCliniche_View.js';
// [CONTROLLER GRAFICO - CartelleCliniche] Importa il Bean/DTO della funzionalità.
import { CartelleCliniche_Bean } from './CartelleCliniche_Bean.js';

// [CONTROLLER GRAFICO - CartelleCliniche] Gestisce gli eventi grafici della funzionalità.
export class CartelleCliniche_ControlGrafico {
    // [CONTROLLER GRAFICO - CartelleCliniche] Riceve il client HTTP e la View.
    constructor(apiClient, view = new CartelleCliniche_View()) {
        // [CONTROLLER GRAFICO - CartelleCliniche] Memorizza il client API.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - CartelleCliniche] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - CartelleCliniche] Carica i dati della funzionalità.
    async carica(parametri = {}) {
        // [CONTROLLER GRAFICO - CartelleCliniche] Invia la richiesta al ControllerApplicativo PHP.
        const dati = await this.apiClient.get('cartelle_cliniche', 'carica', parametri);
        // [BEAN/DTO - CartelleCliniche] Incapsula la risposta nel Bean.
        const bean = new CartelleCliniche_Bean(dati);
        // [CONTROLLER GRAFICO - CartelleCliniche] Passa il DTO alla View.
        this.view?.renderizza(bean);
        // [CONTROLLER GRAFICO - CartelleCliniche] Restituisce il DTO.
        return bean;
    }
    // [CONTROLLER GRAFICO - CartelleCliniche] Apre la schermata e monta la View nel contenitore principale.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - CartelleCliniche] Monta la View grafica della funzionalità.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - CartelleCliniche] Restituisce il ControllerGrafico per completare eventuali azioni successive.
        return this;
    }

}
