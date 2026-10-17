// [CONTROLLER GRAFICO - Applicazione] Importa il client HTTP tecnico condiviso.
import { ApiClient } from '../infrastruttura/ApiClient.js';
// [CONTROLLER GRAFICO - Navigazione] Importa il controller grafico dedicato alla navigazione.
import { Navigazione_ControlGrafico } from '../../navigazione_package/Navigazione_ControlGrafico.js';
// [CONTROLLER GRAFICO - Dashboard] Importa View e ControllerGrafico della Dashboard.
import { Dashboard_View } from '../../dashboard_package/Dashboard_View.js';
import { Dashboard_ControlGrafico } from '../../dashboard_package/Dashboard_ControlGrafico.js';
// [CONTROLLER GRAFICO - Appuntamenti] Importa il ControllerGrafico degli appuntamenti.
import { Appuntamenti_ControlGrafico } from '../../appuntamenti_package/Appuntamenti_ControlGrafico.js';
// [CONTROLLER GRAFICO - Pazienti] Importa il ControllerGrafico dei pazienti.
import { Pazienti_ControlGrafico } from '../../pazienti_package/Pazienti_ControlGrafico.js';
// [CONTROLLER GRAFICO - CartelleCliniche] Importa il ControllerGrafico delle cartelle cliniche.
import { CartelleCliniche_ControlGrafico } from '../../cartelle_cliniche_package/CartelleCliniche_ControlGrafico.js';
// [CONTROLLER GRAFICO - Documenti] Importa il ControllerGrafico dei documenti.
import { Documenti_ControlGrafico } from '../../documenti_package/Documenti_ControlGrafico.js';
// [CONTROLLER GRAFICO - Fatturazione] Importa il ControllerGrafico della fatturazione.
import { Fatturazione_ControlGrafico } from '../../fatturazione_package/Fatturazione_ControlGrafico.js';
// [CONTROLLER GRAFICO - Tasse] Importa il ControllerGrafico delle tasse.
import { Tasse_ControlGrafico } from '../../tasse_package/Tasse_ControlGrafico.js';
// [CONTROLLER GRAFICO - Report] Importa il ControllerGrafico dei report.
import { Report_ControlGrafico } from '../../report_package/Report_ControlGrafico.js';
// [CONTROLLER GRAFICO - Staff] Importa il ControllerGrafico dello staff.
import { Staff_ControlGrafico } from '../../staff_package/Staff_ControlGrafico.js';
// [CONTROLLER GRAFICO - Impostazioni] Importa il ControllerGrafico delle impostazioni.
import { Impostazioni_ControlGrafico } from '../../impostazioni_package/Impostazioni_ControlGrafico.js';

// [CONTROLLER GRAFICO - Applicazione] Avvia l'applicazione quando il DOM è pronto.
document.addEventListener('DOMContentLoaded', async () => {
    // [CONTROLLER GRAFICO - Applicazione] Crea il client HTTP tecnico condiviso.
    const api = new ApiClient();
    // [VIEW - Applicazione] Recupera il contenitore dove vengono montate le View delle funzionalità.
    const contenitorePagine = document.getElementById('contenitorePagine');
    // [VIEW - Applicazione] Recupera il titolo del breadcrumb.
    const titoloPagina = document.getElementById('pageTitle');
    // [CONTROLLER GRAFICO - Applicazione] Interrompe l'avvio se manca il contenitore delle pagine.
    if (!contenitorePagine) return;

    // [VIEW - Dashboard] Crea la View Dashboard.
    const dashboardView = new Dashboard_View();
    // [CONTROLLER GRAFICO - Dashboard] Crea il ControllerGrafico Dashboard.
    const dashboardController = new Dashboard_ControlGrafico(api, dashboardView);
    // [CONTROLLER GRAFICO - Appuntamenti] Crea il ControllerGrafico Appuntamenti.
    const appuntamentiController = new Appuntamenti_ControlGrafico(api);
    // [CONTROLLER GRAFICO - Pazienti] Crea il ControllerGrafico Pazienti.
    const pazientiController = new Pazienti_ControlGrafico(api);
    // [CONTROLLER GRAFICO - CartelleCliniche] Crea il ControllerGrafico CartelleCliniche.
    const cartelleController = new CartelleCliniche_ControlGrafico(api);
    // [CONTROLLER GRAFICO - Documenti] Crea il ControllerGrafico Documenti.
    const documentiController = new Documenti_ControlGrafico(api);
    // [CONTROLLER GRAFICO - Fatturazione] Crea il ControllerGrafico Fatturazione.
    const fatturazioneController = new Fatturazione_ControlGrafico(api);
    // [CONTROLLER GRAFICO - Tasse] Crea il ControllerGrafico Tasse.
    const tasseController = new Tasse_ControlGrafico(api);
    // [CONTROLLER GRAFICO - Report] Crea il ControllerGrafico Report.
    const reportController = new Report_ControlGrafico(api);
    // [CONTROLLER GRAFICO - Staff] Crea il ControllerGrafico Staff.
    const staffController = new Staff_ControlGrafico(api);
    // [CONTROLLER GRAFICO - Impostazioni] Crea il ControllerGrafico Impostazioni.
    const impostazioniController = new Impostazioni_ControlGrafico(api);

    // [CONTROLLER GRAFICO - Navigazione] Crea il controller grafico che collega sidebar e View.
    const navigazioneController = new Navigazione_ControlGrafico(contenitorePagine, titoloPagina);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View Dashboard sulla rotta dashboard.
    navigazioneController.registra('dashboard', dashboardController);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View Appuntamenti sulla rotta agenda.
    navigazioneController.registra('agenda', appuntamentiController);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View Pazienti sulla rotta patients.
    navigazioneController.registra('patients', pazientiController);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View CartelleCliniche sulla rotta clinical.
    navigazioneController.registra('clinical', cartelleController);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View Documenti sulla rotta documents.
    navigazioneController.registra('documents', documentiController);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View Fatturazione sulla rotta finance.
    navigazioneController.registra('finance', fatturazioneController);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View Tasse sulla rotta taxes.
    navigazioneController.registra('taxes', tasseController);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View Report sulla rotta reports.
    navigazioneController.registra('reports', reportController);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View Staff sulla rotta team.
    navigazioneController.registra('team', staffController);
    // [CONTROLLER GRAFICO - Navigazione] Registra la View Impostazioni sulla rotta settings.
    navigazioneController.registra('settings', impostazioniController);
    // [CONTROLLER GRAFICO - Navigazione] Collega tutti i click delle voci della sidebar.
    navigazioneController.collegaVociSidebar();
    // [CONTROLLER GRAFICO - Navigazione] Collega anche i pulsanti di navigazione presenti dentro le View.
    navigazioneController.collegaAzioniRapide();
    // [CONTROLLER GRAFICO - Layout] Collega il menu mobile della sidebar.
    collegaMenuMobile();
    // [CONTROLLER GRAFICO - Navigazione] Mostra la Dashboard come schermata iniziale.
    await navigazioneController.apri('dashboard', document.querySelector('.nav-item[data-page="dashboard"]'));
});

// [CONTROLLER GRAFICO - Layout] Collega l'apertura e chiusura della sidebar su mobile.
function collegaMenuMobile() {
    // [CONTROLLER GRAFICO - Layout] Recupera il pulsante del menu mobile.
    const pulsante = document.getElementById('mobileMenu');
    // [CONTROLLER GRAFICO - Layout] Gestisce il click del pulsante mobile.
    pulsante?.addEventListener('click', () => document.getElementById('sidebar')?.classList.toggle('open'));
}
