window.ClinicaFlow.interfaccia_package = window.ClinicaFlow.interfaccia_package || {};

// [VIEW - Layout > Topbar] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.interfaccia_package.Topbar_View = class TopbarView {

  // [VIEW - Layout > Topbar] Costruisce la barra superiore con breadcrumb, notifiche e profilo.
  render(currentUser) {
    // [VIEW - Layout > Topbar] Legge le iniziali dell'utente dal Model.
    const initials = currentUser.initials;
    // [VIEW - Layout > Topbar] Legge il nome mostrato nella chip utente.
    const displayName = currentUser.name.replace(/^Dott\.ssa\s+/, "");
    // [VIEW - Layout > Topbar] Restituisce il markup identico alla barra superiore originale.
    return `
      <!-- [VIEW - Layout > Topbar] Contenitore della barra superiore. -->
      <header class="topbar">
        <!-- [VIEW - Layout > Topbar] Pulsante menu mobile. -->
        <button class="mobile-menu" id="mobileMenu">☰</button>
        <!-- [VIEW - Layout > Topbar] Breadcrumb con titolo aggiornabile dal Controller. -->
        <div class="breadcrumb">Area professionisti <span>/</span> <strong id="pageTitle">Dashboard</strong></div>
        <!-- [VIEW - Layout > Topbar] Azioni disponibili nella barra superiore. -->
        <div class="top-actions">
          <!-- [VIEW - Layout > Topbar] Pulsante notifiche con badge invariato. -->
          <button class="icon-btn notification-btn" id="notificationBtn" title="Notifiche">♢<b>3</b></button>
          <!-- [VIEW - Layout > Topbar] Chip del professionista corrente. -->
          <button class="user-chip">
            <!-- [VIEW - Layout > Topbar] Avatar piccolo del professionista. -->
            <div class="avatar small">${initials}</div>
            <!-- [VIEW - Layout > Topbar] Nome mostrato nella chip. -->
            <span>${displayName}</span>
            <!-- [VIEW - Layout > Topbar] Indicatore di menu della chip. -->
            <span>⌄</span>
          </button>
        </div>
      </header>`;
  }

};
