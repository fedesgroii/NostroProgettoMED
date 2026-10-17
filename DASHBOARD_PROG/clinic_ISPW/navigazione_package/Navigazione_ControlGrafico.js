// [CONTROLLER GRAFICO - Navigazione] Crea lo spazio del componente grafico di navigazione.
window.ClinicaFlow = window.ClinicaFlow || {};
// [CONTROLLER GRAFICO - Navigazione] Mantiene la sola logica grafica di cambio pagina.
window.ClinicaFlow.Navigazione_ControlGrafico = class Navigazione_ControlGrafico {
  // [CONTROLLER GRAFICO - Navigazione] Collega menu, pagine e menu mobile dopo il montaggio delle View.
  static collega() {
    // [CONTROLLER GRAFICO - Navigazione] Recupera tutte le pagine grafiche.
    this.pagine = document.querySelectorAll('.page');
    // [CONTROLLER GRAFICO - Navigazione] Recupera le voci del menu.
    this.voci = document.querySelectorAll('.nav-item');
    // [CONTROLLER GRAFICO - Navigazione] Recupera il titolo del breadcrumb.
    this.titolo = document.getElementById('pageTitle');
    // [CONTROLLER GRAFICO - Navigazione] Recupera la sidebar per la modalità mobile.
    this.sidebar = document.getElementById('sidebar');
    // [CONTROLLER GRAFICO - Navigazione] Recupera il pulsante del menu mobile.
    this.menuMobile = document.getElementById('mobileMenu');
    // [CONTROLLER GRAFICO - Navigazione] Collega ogni voce al relativo data-page.
    this.voci.forEach((voce) => voce.addEventListener('click', () => this.mostraPagina(voce.dataset.page)));
    // [CONTROLLER GRAFICO - Navigazione] Collega il toggle della sidebar mobile.
    if (this.menuMobile) this.menuMobile.addEventListener('click', () => this.sidebar.classList.toggle('open'));
  }
  // [CONTROLLER GRAFICO - Navigazione] Mostra la pagina richiesta senza coinvolgere dati di dominio.
  static mostraPagina(id) {
    // [CONTROLLER GRAFICO - Navigazione] Attiva una sola pagina per volta.
    this.pagine.forEach((pagina) => pagina.classList.toggle('active', pagina.id === id));
    // [CONTROLLER GRAFICO - Navigazione] Aggiorna lo stato attivo del menu.
    this.voci.forEach((voce) => voce.classList.toggle('active', voce.dataset.page === id));
    // [CONTROLLER GRAFICO - Navigazione] Aggiorna il titolo del breadcrumb.
    this.titolo.textContent = ({ dashboard: 'Dashboard', agenda: 'Agenda', patients: 'Pazienti', clinical: 'Cartelle cliniche', documents: 'Documenti', finance: 'Finanze e fatture', taxes: 'Tasse e scadenze', reports: 'Report', team: 'Staff', settings: 'Impostazioni' }[id] || 'Dashboard');
    // [CONTROLLER GRAFICO - Navigazione] Chiude la sidebar mobile dopo il cambio pagina.
    this.sidebar.classList.remove('open');
    // [CONTROLLER GRAFICO - Navigazione] Mantiene il comportamento di scroll della dashboard precedente.
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
};
