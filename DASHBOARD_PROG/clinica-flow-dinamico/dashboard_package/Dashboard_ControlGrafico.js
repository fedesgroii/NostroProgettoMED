// [CONTROLLER GRAFICO - Dashboard] Importa il Bean/DTO della Dashboard.
import { Dashboard_Bean } from './Dashboard_Bean.js';

// [CONTROLLER GRAFICO - Dashboard] Gestisce gli eventi e il rendering grafico della Dashboard.
export class Dashboard_ControlGrafico {
    // [CONTROLLER GRAFICO - Dashboard] Riceve API e View senza conoscere il database.
    constructor(apiClient, view) {
        // [CONTROLLER GRAFICO - Dashboard] Memorizza il client HTTP.
        this.apiClient = apiClient;
        // [CONTROLLER GRAFICO - Dashboard] Memorizza la View.
        this.view = view;
    }

    // [CONTROLLER GRAFICO - Dashboard] Carica i dati della Dashboard.
    async carica() {
        // [CONTROLLER GRAFICO - Dashboard] Chiede al backend la Dashboard autenticata.
        const dati = await this.apiClient.get('dashboard', 'carica');
        // [BEAN/DTO - Dashboard] Incapsula il payload ricevuto.
        const bean = new Dashboard_Bean(dati);
        // [CONTROLLER GRAFICO - Dashboard] Passa il DTO alla View.
        this.view.renderizza(bean);
        // [CONTROLLER GRAFICO - Dashboard] Restituisce il DTO per eventuali altri controller grafici.
        return bean;
    }
    // [CONTROLLER GRAFICO - Dashboard] Apre la schermata Dashboard e monta la View.
    async apri(contenitorePrincipale) {
        // [CONTROLLER GRAFICO - Dashboard] Monta la struttura grafica della Dashboard.
        this.view.monta(contenitorePrincipale);
        // [CONTROLLER GRAFICO - Dashboard] Prova a caricare i dati reali dopo aver mostrato la schermata.
        try {
            // [CONTROLLER GRAFICO - Dashboard] Esegue il caricamento dei dati dal backend.
            await this.carica();
        } catch (errore) {
            // [CONTROLLER GRAFICO - Dashboard] Mantiene visibile la View anche quando il backend non è disponibile.
            console.warn('Dashboard non caricata dal backend:', errore.message);
        }
        // [CONTROLLER GRAFICO - Dashboard] Restituisce il controller corrente.
        return this;
    }

}
