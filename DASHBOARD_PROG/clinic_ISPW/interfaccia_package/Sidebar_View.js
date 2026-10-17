window.ClinicaFlow.interfaccia_package = window.ClinicaFlow.interfaccia_package || {};

// [VIEW - Layout > Sidebar] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.interfaccia_package.Sidebar_View = class SidebarView {

  // [VIEW - Layout > Sidebar] Costruisce la sidebar con brand, profilo, navigazione e logout.
  render(currentUser) {
    // [VIEW - Layout > Sidebar] Legge le iniziali del professionista dal Model.
    const initials = currentUser.initials;
    // [VIEW - Layout > Sidebar] Legge il nome visualizzato del professionista dal Model.
    const name = currentUser.name;
    // [VIEW - Layout > Sidebar] Legge la specialità mostrata sotto il nome.
    const specialty = currentUser.specialty;
    // [VIEW - Layout > Sidebar] Restituisce lo stesso markup grafico della sidebar originale.
    return `
      <!-- [VIEW - Layout > Sidebar] Contenitore grafico della navigazione principale. -->
      <aside class="sidebar" id="sidebar">
        <!-- [VIEW - Layout > Sidebar] Brand ClinicaFlow visibile nella parte alta. -->
        <div class="brand">
          <!-- [VIEW - Layout > Sidebar] Simbolo grafico del brand. -->
          <div class="brand-mark">+</div>
          <!-- [VIEW - Layout > Sidebar] Testo del brand e del contesto applicativo. -->
          <div>
            <!-- [VIEW - Layout > Sidebar] Nome dell'applicazione. -->
            <strong>ClinicaFlow</strong>
            <!-- [VIEW - Layout > Sidebar] Sottotitolo dell'applicazione. -->
            <span>Area professionisti</span>
          </div>
        </div>
        <!-- [VIEW - Layout > Sidebar] Profilo sintetico dell'utente corrente. -->
        <div class="profile-mini">
          <!-- [VIEW - Layout > Sidebar] Avatar dell'utente. -->
          <div class="avatar">${initials}</div>
          <!-- [VIEW - Layout > Sidebar] Dati testuali del profilo. -->
          <div>
            <!-- [VIEW - Layout > Sidebar] Nome completo del professionista. -->
            <strong>${name}</strong>
            <!-- [VIEW - Layout > Sidebar] Specialità professionale. -->
            <span>${specialty}</span>
          </div>
          <!-- [VIEW - Layout > Sidebar] Pulsante grafico delle impostazioni profilo. -->
          <button class="icon-btn" title="Impostazioni profilo">⚙</button>
        </div>
        <!-- [VIEW - Layout > Sidebar] Menu principale diviso nelle tre sezioni originali. -->
        <nav class="nav">
          <!-- [VIEW - Layout > Sidebar] Intestazione della sezione Gestione. -->
          <p class="nav-label">GESTIONE</p>
          <!-- [VIEW - Layout > Sidebar] Voce Dashboard. -->
          <button class="nav-item active" data-page="dashboard"><span>⌂</span> Dashboard</button>
          <!-- [VIEW - Layout > Sidebar] Voce Agenda. -->
          <button class="nav-item" data-page="agenda"><span>◷</span> Agenda</button>
          <!-- [VIEW - Layout > Sidebar] Voce Pazienti. -->
          <button class="nav-item" data-page="patients"><span>♙</span> Pazienti</button>
          <!-- [VIEW - Layout > Sidebar] Voce Cartelle cliniche. -->
          <button class="nav-item" data-page="clinical"><span>▤</span> Cartelle cliniche</button>
          <!-- [VIEW - Layout > Sidebar] Voce Documenti. -->
          <button class="nav-item" data-page="documents"><span>□</span> Documenti</button>
          <!-- [VIEW - Layout > Sidebar] Intestazione della sezione amministrativa. -->
          <p class="nav-label">AMMINISTRAZIONE</p>
          <!-- [VIEW - Layout > Sidebar] Voce Finanze e fatture. -->
          <button class="nav-item" data-page="finance"><span>€</span> Finanze e fatture</button>
          <!-- [VIEW - Layout > Sidebar] Voce Tasse e scadenze. -->
          <button class="nav-item" data-page="taxes"><span>▣</span> Tasse e scadenze</button>
          <!-- [VIEW - Layout > Sidebar] Voce Report. -->
          <button class="nav-item" data-page="reports"><span>◒</span> Report</button>
          <!-- [VIEW - Layout > Sidebar] Intestazione della sezione struttura. -->
          <p class="nav-label">STRUTTURA</p>
          <!-- [VIEW - Layout > Sidebar] Voce Staff. -->
          <button class="nav-item" data-page="team"><span>♧</span> Staff</button>
          <!-- [VIEW - Layout > Sidebar] Voce Impostazioni. -->
          <button class="nav-item" data-page="settings"><span>⚙</span> Impostazioni</button>
        </nav>
        <!-- [VIEW - Layout > Sidebar] Area inferiore con stato sicurezza e logout. -->
        <div class="sidebar-bottom">
          <!-- [VIEW - Layout > Sidebar] Card che comunica la sessione protetta. -->
          <div class="security-card">
            <!-- [VIEW - Layout > Sidebar] Icona di sicurezza. -->
            <div class="security-icon">✓</div>
            <!-- [VIEW - Layout > Sidebar] Testo dello stato di sessione. -->
            <div>
              <!-- [VIEW - Layout > Sidebar] Titolo della card sicurezza. -->
              <strong>Sessione protetta</strong>
              <!-- [VIEW - Layout > Sidebar] Data/ora dell'ultimo accesso demo. -->
              <span>Ultimo accesso: oggi, 14:42</span>
            </div>
          </div>
          <!-- [VIEW - Layout > Sidebar] Pulsante che il Controller collega al logout demo. -->
          <button class="logout-btn" id="logoutBtn">↪ Esci dall'account</button>
        </div>
      </aside>`;
  }

};
