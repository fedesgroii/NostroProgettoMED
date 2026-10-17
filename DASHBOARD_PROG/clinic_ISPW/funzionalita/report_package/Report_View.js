window.ClinicaFlow.report_package = window.ClinicaFlow.report_package || {};

// [VIEW - Report] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.report_package.Report_View = class Report_View {

  // [VIEW - Report] Costruisce le quattro metriche operative e amministrative.
  render(metrics) {
    // [VIEW - Report > Metriche] Trasforma ogni bean in una card con barra percentuale.
    const cards = metrics.map((metric) => `
            <!-- [VIEW - Report > Metriche] Card ${metric.label}. -->
            <div class="card report-card">
              <!-- [VIEW - Report > Metriche] Etichetta. -->
              <span>${metric.label}</span>
              <!-- [VIEW - Report > Metriche] Valore. -->
              <strong>${metric.value}</strong>
              <!-- [VIEW - Report > Metriche] Barra percentuale. -->
              <div class="mini-bar"><i style="width:${metric.width}%"></i></div>
              <!-- [VIEW - Report > Metriche] Dettaglio. -->
              <small>${metric.detail}</small>
            </div>`).join("");
    // [VIEW - Report] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Report] Sezione analisi. -->
      <section class="page" id="reports">
        <!-- [VIEW - Report > Intestazione] Titolo e download report. -->
        <div class="page-heading"><div><p class="eyebrow">ANALISI</p><h1>Report</h1><p class="muted">Indicatori operativi e amministrativi della struttura.</p></div><button class="secondary">↓ Scarica report</button></div>
        <!-- [VIEW - Report > Metriche] Griglia indicatori. -->
        <div class="report-grid">${cards}</div>
      </section>`;
  }

};
