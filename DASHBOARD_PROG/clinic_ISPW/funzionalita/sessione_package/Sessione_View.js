// [VIEW - Sessione] Crea la View logica della funzionalità sessione senza modificare il layout.
window.ClinicaFlow.sessione_package = window.ClinicaFlow.sessione_package || {};
// [VIEW - Sessione] Espone esclusivamente il selettore del controllo logout già presente nella Sidebar_View.
window.ClinicaFlow.sessione_package.Sessione_View = class Sessione_View {
  // [VIEW - Sessione] Restituisce il controllo grafico esistente.
  selettoreLogout() {
    // [VIEW - Sessione] Individua il pulsante di uscita già presente nella UI.
    return '#logoutBtn';
  }
};
