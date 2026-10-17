window.ClinicaFlow.dashboard_package = window.ClinicaFlow.dashboard_package || {};

// [VIEW - Dashboard] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.dashboard_package.Dashboard_View = class Dashboard_View {

  // [VIEW - Dashboard] Costruisce la pagina principale con statistiche, agenda, scadenze, grafico e azioni rapide.
  render(model) {
    // [VIEW - Dashboard > Statistiche] Traduce ogni statistica del Model in una card.
    const statsHtml = model.stats.map((stat) => `
            <!-- [VIEW - Dashboard > Statistiche] Card della statistica corrente. -->
            <article class="stat-card">
              <!-- [VIEW - Dashboard > Statistiche] Icona cromatica. -->
              <div class="stat-icon ${stat.iconClass}">${stat.icon}</div>
              <!-- [VIEW - Dashboard > Statistiche] Etichetta, valore e confronto. -->
              <div><span>${stat.label}</span><strong>${stat.value}</strong><small${stat.detailClass ? ` class="${stat.detailClass}"` : ""}>${stat.detail}</small></div>
            </article>`).join("");
    // [VIEW - Dashboard > Agenda di oggi] Traduce gli appuntamenti del Model nella timeline.
    const agendaHtml = model.appointments.map((appointment) => `
                <!-- [VIEW - Dashboard > Agenda di oggi] Riga timeline per ${appointment.patientName}. -->
                <div class="timeline-item${appointment.status === "In corso" ? " current" : ""}">
                  <!-- [VIEW - Dashboard > Agenda di oggi] Orario visualizzato. -->
                  <span class="time">${appointment.time}</span><div class="dot ${appointment.colorClass}"></div>
                  <!-- [VIEW - Dashboard > Agenda di oggi] Nome, descrizione e stato. -->
                  <div class="appointment"><div><strong>${appointment.patientName}</strong><span>${appointment.type}</span></div><span class="status ${appointment.status === "Confermato" ? "confirmed" : appointment.status === "In corso" ? "current" : "pending"}">${appointment.status}</span></div>
                </div>`).join("");
    // [VIEW - Dashboard > Scadenze] Traduce le scadenze del Model nella lista sintetica.
    const deadlinesHtml = model.deadlines.map((deadline, index) => `
                  <!-- [VIEW - Dashboard > Prossime scadenze] Riga scadenza ${index + 1}. -->
                  <div class="deadline">
                    <!-- [VIEW - Dashboard > Prossime scadenze] Box data. -->
                    <div class="date-box"><strong>${deadline.day}</strong><span>${deadline.month}</span></div>
                    <!-- [VIEW - Dashboard > Prossime scadenze] Titolo e descrizione. -->
                    <div><strong>${deadline.title}</strong><span>${deadline.description}</span></div>
                    <!-- [VIEW - Dashboard > Prossime scadenze] Badge. -->
                    <span class="pill ${index === 0 ? "orange" : "gray"}">${deadline.badge}</span>
                  </div>`).join("");
    // [VIEW - Dashboard > Andamento mensile] Mantiene identico il tracciato della demo originale.
    const points = "M0 175 L100 150 L200 160 L300 105 L400 125 L500 70 L600 88";
    // [VIEW - Dashboard] Restituisce l'intera UI mantenendo classi, testi e attributi originali.
    return `
      <!-- [VIEW - Dashboard] Sezione pagina attiva all'avvio dell'applicazione. -->
      <section class="page active" id="dashboard">
        <!-- [VIEW - Dashboard > Intestazione] Saluto e azione di nuovo appuntamento. -->
        <div class="welcome-row">
          <!-- [VIEW - Dashboard > Intestazione] Contenitore dei testi introduttivi. -->
          <div>
            <!-- [VIEW - Dashboard > Intestazione] Data corrente mostrata dalla demo. -->
            <p class="eyebrow">MARTEDÌ 22 SETTEMBRE 2026</p>
            <!-- [VIEW - Dashboard > Intestazione] Saluto principale. -->
            <h1>Buon pomeriggio, Maria 👋</h1>
            <!-- [VIEW - Dashboard > Intestazione] Descrizione sintetica. -->
            <p class="muted">Ecco una panoramica dell'attività della struttura.</p>
          </div>
          <!-- [VIEW - Dashboard > Intestazione] Azione rapida verso Agenda. -->
          <button class="primary" data-page-action="agenda">+ Nuovo appuntamento</button>
        </div>
        <!-- [VIEW - Dashboard > Statistiche] Griglia delle quattro statistiche principali. -->
        <div class="stats-grid">${statsHtml}
        </div>
        <!-- [VIEW - Dashboard] Primo gruppo a due colonne. -->
        <div class="dashboard-grid">
          <!-- [VIEW - Dashboard > Agenda di oggi] Card agenda sintetica. -->
          <article class="card agenda-card">
            <!-- [VIEW - Dashboard > Agenda di oggi] Header della card. -->
            <div class="card-header"><div><h2>Agenda di oggi</h2><span class="muted">Martedì 22 settembre</span></div><button class="text-btn" data-page-action="agenda">Vedi agenda →</button></div>
            <!-- [VIEW - Dashboard > Agenda di oggi] Timeline degli appuntamenti. -->
            <div class="timeline">${agendaHtml}
            </div>
          </article>
          <!-- [VIEW - Dashboard > Prossime scadenze] Card delle scadenze amministrative. -->
          <article class="card deadlines-card">
            <!-- [VIEW - Dashboard > Prossime scadenze] Header. -->
            <div class="card-header"><div><h2>Prossime scadenze</h2><span class="muted">Amministrazione</span></div><button class="text-btn" data-page-action="taxes">Tutte →</button></div>
            <!-- [VIEW - Dashboard > Prossime scadenze] Elenco. -->
            <div class="deadline-list">${deadlinesHtml}
            </div>
          </article>
        </div>
        <!-- [VIEW - Dashboard] Secondo gruppo a due colonne. -->
        <div class="dashboard-grid bottom">
          <!-- [VIEW - Dashboard > Andamento mensile] Card del grafico. -->
          <article class="card">
            <!-- [VIEW - Dashboard > Andamento mensile] Header con selettore anno. -->
            <div class="card-header"><div><h2>Andamento mensile</h2><span class="muted">Incassi ultimi 6 mesi</span></div><select><option>${model.chartYear}</option><option>2025</option></select></div>
            <!-- [VIEW - Dashboard > Andamento mensile] Area del grafico. -->
            <div class="chart-wrap">
              <!-- [VIEW - Dashboard > Andamento mensile] Etichette verticali. -->
              <div class="y-labels"><span>€10k</span><span>€7.5k</span><span>€5k</span><span>€2.5k</span><span>€0</span></div>
              <!-- [VIEW - Dashboard > Andamento mensile] Contenitore SVG. -->
              <div class="chart">
                <!-- [VIEW - Dashboard > Andamento mensile] Griglia del grafico. -->
                <div class="gridline g1"></div><div class="gridline g2"></div><div class="gridline g3"></div><div class="gridline g4"></div>
                <!-- [VIEW - Dashboard > Andamento mensile] Grafico incassi. -->
                <svg viewBox="0 0 600 220" preserveAspectRatio="none" aria-label="Grafico incassi">
                  <!-- [VIEW - Dashboard > Andamento mensile] Gradiente di riempimento. -->
                  <defs><linearGradient id="fill" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#0f766e" stop-opacity=".25"/><stop offset="1" stop-color="#0f766e" stop-opacity="0"/></linearGradient></defs>
                  <!-- [VIEW - Dashboard > Andamento mensile] Area sotto la curva. -->
                  <path d="${points} L600 220 L0 220Z" fill="url(#fill)"/>
                  <!-- [VIEW - Dashboard > Andamento mensile] Linea principale. -->
                  <path d="${points}" fill="none" stroke="#0f766e" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                  <!-- [VIEW - Dashboard > Andamento mensile] Punto finale. -->
                  <circle cx="600" cy="88" r="6" fill="#fff" stroke="#0f766e" stroke-width="4"/>
                </svg>
                <!-- [VIEW - Dashboard > Andamento mensile] Etichette dei mesi. -->
                <div class="x-labels">${model.chartMonths.map((month) => `<span>${month}</span>`).join("")}</div>
              </div>
            </div>
          </article>
          <!-- [VIEW - Dashboard > Azioni rapide] Card delle scorciatoie. -->
          <article class="card quick-card">
            <!-- [VIEW - Dashboard > Azioni rapide] Header. -->
            <div class="card-header"><div><h2>Azioni rapide</h2><span class="muted">Operazioni frequenti</span></div></div>
            <!-- [VIEW - Dashboard > Azioni rapide] Griglia azioni. -->
            <div class="quick-grid">
              <!-- [VIEW - Dashboard > Azioni rapide] Nuovo paziente. -->
              <button data-page-action="patients"><span>♙</span><strong>Nuovo paziente</strong><small>Registra un assistito</small></button>
              <!-- [VIEW - Dashboard > Azioni rapide] Appuntamento. -->
              <button data-page-action="agenda"><span>◷</span><strong>Appuntamento</strong><small>Inserisci in agenda</small></button>
              <!-- [VIEW - Dashboard > Azioni rapide] Nuova fattura. -->
              <button data-page-action="finance"><span>€</span><strong>Nuova fattura</strong><small>Registra una prestazione</small></button>
              <!-- [VIEW - Dashboard > Azioni rapide] Carica documento. -->
              <button data-page-action="documents"><span>□</span><strong>Carica documento</strong><small>Archivio digitale</small></button>
            </div>
          </article>
        </div>
      </section>`;
  }

};
