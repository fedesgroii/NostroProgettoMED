// [VIEW - Notifiche] Crea la View logica della funzionalità notifiche senza modificare l'interfaccia esistente.
window.ClinicaFlow.notifiche_package = window.ClinicaFlow.notifiche_package || {};
// [VIEW - Notifiche] Espone esclusivamente il selettore dell'elemento già presente nella Topbar_View.
window.ClinicaFlow.notifiche_package.Notifiche_View = class Notifiche_View {
  // [VIEW - Notifiche] Restituisce il controllo grafico già previsto dalla UI.
  selettorePulsante() {
    // [VIEW - Notifiche] Individua il pulsante notifiche esistente.
    return '#notificationBtn';
  }
};
