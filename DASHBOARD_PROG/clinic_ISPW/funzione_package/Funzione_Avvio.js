// [CONTROLLER GRAFICO - Avvio] Crea lo spazio globale dell'applicazione.
window.ClinicaFlow = window.ClinicaFlow || {};
// [CONTROLLER GRAFICO - Avvio] Avvia tutte le funzionalità senza contenere logica di dominio.
window.ClinicaFlow.Funzione_Avvio = class Funzione_Avvio {
  // [CONTROLLER GRAFICO - Avvio] Avvia la dashboard quando il Browser ha caricato il DOM.
  static async avvia() {
    // [VIEW - Interfaccia] Monta Sidebar_View senza aggiungere logica applicativa.
    document.getElementById('sidebar-root').outerHTML = new window.ClinicaFlow.interfaccia_package.Sidebar_View().render({ initials: 'MR', name: 'Dott.ssa Giorgia Sgroi', specialty: 'Psicologa' });
    // [VIEW - Interfaccia] Monta Topbar_View senza aggiungere logica applicativa.
    document.getElementById('topbar-root').outerHTML = new window.ClinicaFlow.interfaccia_package.Topbar_View().render({ initials: 'MR', name: 'Dott.ssa Giorgia Sgroi', specialty: 'Psicologa' });
    // [VIEW - Interfaccia] Monta il contenitore Modale.
    document.getElementById('modal-root').outerHTML = new window.ClinicaFlow.interfaccia_package.Modal_View().render();
    // [VIEW - Interfaccia] Monta il Toast.
    document.getElementById('toast-root').outerHTML = new window.ClinicaFlow.interfaccia_package.Toast_View().render();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Dashboard.
    const dashboard = new window.ClinicaFlow.dashboard_package.Dashboard_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Appuntamenti.
    const appuntamenti = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Pazienti.
    const pazienti = new window.ClinicaFlow.pazienti_package.Pazienti_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Cartelle cliniche.
    const cartelle = new window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Documenti.
    const documenti = new window.ClinicaFlow.documenti_package.Documenti_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Fatturazione.
    const fatturazione = new window.ClinicaFlow.fatturazione_package.Fatturazione_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Tasse.
    const tasse = new window.ClinicaFlow.tasse_package.Tasse_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Report.
    const report = new window.ClinicaFlow.report_package.Report_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Staff.
    const staff = new window.ClinicaFlow.staff_package.Staff_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Impostazioni.
    const impostazioni = new window.ClinicaFlow.impostazioni_package.Impostazioni_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Avvia il caricamento iniziale di tutte le View tramite i rispettivi Bean.
    await Promise.all([dashboard.inizializza(), appuntamenti.inizializza(), pazienti.inizializza(), cartelle.inizializza(), documenti.inizializza(), fatturazione.inizializza(), tasse.inizializza(), report.inizializza(), staff.inizializza(), impostazioni.inizializza()]);
    // [CONTROLLER GRAFICO - Avvio] Collega la navigazione dopo che tutte le pagine sono state montate.
    window.ClinicaFlow.Navigazione_ControlGrafico.collega();
    // [CONTROLLER GRAFICO - Avvio] Collega il click delle notifiche tramite il suo ControllerGrafico.
    new window.ClinicaFlow.notifiche_package.Notifiche_ControlGrafico().collega();
    // [CONTROLLER GRAFICO - Avvio] Collega il logout demo tramite il suo ControllerGrafico.
    new window.ClinicaFlow.sessione_package.Sessione_ControlGrafico().collega();
  }
};
// [CONTROLLER GRAFICO - Avvio] Avvia l'applicazione solo dopo il caricamento del DOM.
document.addEventListener('DOMContentLoaded', () => window.ClinicaFlow.Funzione_Avvio.avvia().catch((errore) => console.error(errore)));
