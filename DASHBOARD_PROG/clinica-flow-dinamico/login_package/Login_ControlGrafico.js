// [CONTROLLER GRAFICO - Login] Importa il DTO della funzionalità.
import { Login_Bean } from './Login_Bean.js';

// [CONTROLLER GRAFICO - Login] Gestisce il form login senza conoscere PHP o MySQL.
export class Login_ControlGrafico {
    // [CONTROLLER GRAFICO - Login] Riceve il client API.
    constructor(apiClient) {
        // [CONTROLLER GRAFICO - Login] Memorizza il client.
        this.apiClient = apiClient;
    }

    // [CONTROLLER GRAFICO - Login] Invia le credenziali.
    async accedi(email, password) {
        // [BEAN/DTO - Login] Incapsula i dati della View.
        const bean = new Login_Bean(email, password);
        // [CONTROLLER GRAFICO - Login] Passa il DTO al ControllerApplicativo via API.
        return this.apiClient.post('login', 'accedi', bean);
    }
}
