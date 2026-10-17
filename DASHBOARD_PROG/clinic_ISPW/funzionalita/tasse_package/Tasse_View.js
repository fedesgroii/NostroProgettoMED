window.ClinicaFlow.tasse_package = window.ClinicaFlow.tasse_package || {};

// [VIEW - Tasse e scadenze] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.tasse_package.Tasse_View = class Tasse_View {

  // [VIEW - Tasse e scadenze] Costruisce alert e calendario fiscale.
  render(deadlines) {
    // [VIEW - Tasse e scadenze > Calendario] Trasforma i bean in righe fiscali.
    const rows = deadlines.map((deadline, index) => `
            <!-- [VIEW - Tasse e scadenze > Calendario] Riga fiscale ${index + 1}. -->
            <div class="tax-row">
              <!-- [VIEW - Tasse e scadenze > Calendario] Data e stato urgente. -->
              <div class="tax-date${deadline.urgent ? " urgent" : ""}"><strong>${deadline.day}</strong><span>${deadline.month}</span></div>
              <!-- [VIEW - Tasse e scadenze > Calendario] Titolo e descrizione. -->
              <div><strong>${deadline.title}</strong><span>${deadline.description}</span></div>
              <!-- [VIEW - Tasse e scadenze > Calendario] Badge. -->
              <span class="pill ${deadline.urgent ? "orange" : "gray"}">${deadline.badge}</span>
              <!-- [VIEW - Tasse e scadenze > Calendario] Azione. -->
              <button class="text-btn">${index === 0 ? "Apri" : "Dettagli"} →</button>
            </div>`).join("");
    // [VIEW - Tasse e scadenze] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Tasse e scadenze] Sezione fiscale. -->
      <section class="page" id="taxes">
        <!-- [VIEW - Tasse e scadenze > Intestazione] Titolo ed esportazione. -->
        <div class="page-heading"><div><p class="eyebrow">AMMINISTRAZIONE</p><h1>Tasse e scadenze</h1><p class="muted">Calendario fiscale e documenti per la gestione amministrativa.</p></div><button class="secondary">Esporta riepilogo</button></div>
        <!-- [VIEW - Tasse e scadenze > Alert] Avviso scadenze. -->
        <div class="tax-alert"><span>!</span><div><strong>4 scadenze richiedono attenzione</strong><p>Controlla gli importi e coordina i versamenti con il commercialista.</p></div></div>
        <!-- [VIEW - Tasse e scadenze > Calendario] Card calendario. -->
        <div class="card deadline-table">
          <!-- [VIEW - Tasse e scadenze > Calendario] Header con anno. -->
          <div class="card-header"><h2>Calendario fiscale</h2><select><option>2026</option><option>2027</option></select></div>
          <!-- [VIEW - Tasse e scadenze > Calendario] Righe delle scadenze. -->
          ${rows}
        </div>
      </section>`;
  }

};
