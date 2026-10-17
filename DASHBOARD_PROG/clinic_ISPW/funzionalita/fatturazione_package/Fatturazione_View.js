window.ClinicaFlow.fatturazione_package = window.ClinicaFlow.fatturazione_package || {};

// [VIEW - Finanze e fatture] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.fatturazione_package.Fatturazione_View = class Fatturazione_View {

  // [VIEW - Finanze e fatture] Costruisce indicatori finanziari e tabella fatture.
  render(invoices) {
    // [VIEW - Finanze e fatture > Tabella] Costruisce le righe delle fatture.
    const rows = invoices.map((invoice) => `
            <!-- [VIEW - Finanze e fatture > Tabella] Riga ${invoice.number}. -->
            <tr>
              <!-- [VIEW - Finanze e fatture > Tabella] Numero. -->
              <td>${invoice.number}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Cliente. -->
              <td>${invoice.client}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Prestazione. -->
              <td>${invoice.service}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Importo. -->
              <td>${invoice.amount}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Data. -->
              <td>${invoice.date}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Stato. -->
              <td><span class="status ${invoice.statusClass}">${invoice.status}</span></td>
            </tr>`).join("");
    // [VIEW - Finanze e fatture] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Finanze e fatture] Sezione finanziaria. -->
      <section class="page" id="finance">
        <!-- [VIEW - Finanze e fatture > Intestazione] Titolo e nuova fattura. -->
        <div class="page-heading"><div><p class="eyebrow">AMMINISTRAZIONE</p><h1>Finanze e fatture</h1><p class="muted">Entrate, fatture, pagamenti e riepiloghi per il commercialista.</p></div><button class="primary">+ Nuova fattura</button></div>
        <!-- [VIEW - Finanze e fatture > Statistiche] Quattro indicatori. -->
        <div class="finance-stats"><div class="finance-stat"><span>Fatturato settembre</span><strong>€ 9.460,00</strong><small>32 fatture emesse</small></div><div class="finance-stat"><span>Incassato</span><strong>€ 7.840,00</strong><small class="positive">82,9% del fatturato</small></div><div class="finance-stat"><span>Da incassare</span><strong>€ 1.620,00</strong><small class="warning-text">8 fatture aperte</small></div><div class="finance-stat"><span>Spese</span><strong>€ 2.140,00</strong><small>Questo mese</small></div></div>
        <!-- [VIEW - Finanze e fatture > Tabella] Card ultime fatture. -->
        <div class="card table-card">
          <!-- [VIEW - Finanze e fatture > Tabella] Header con periodo ed esportazione. -->
          <div class="card-header"><div><h2>Ultime fatture</h2><span class="muted">Settembre 2026</span></div><button class="secondary">Esporta CSV</button></div>
          <!-- [VIEW - Finanze e fatture > Tabella] Registro fatture. -->
          <table><thead><tr><th>Numero</th><th>Cliente</th><th>Prestazione</th><th>Importo</th><th>Data</th><th>Stato</th></tr></thead><tbody>${rows}</tbody></table>
        </div>
      </section>`;
  }

};
