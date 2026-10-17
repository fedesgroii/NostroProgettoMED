window.ClinicaFlow.documenti_package = window.ClinicaFlow.documenti_package || {};

// [VIEW - Documenti] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.documenti_package.Documenti_View = class Documenti_View {

  // [VIEW - Documenti] Costruisce statistiche e tabella documentale.
  render(documents) {
    // [VIEW - Documenti > Tabella] Costruisce le righe del registro.
    const rows = documents.map((document) => `
            <!-- [VIEW - Documenti > Tabella] Riga ${document.name}. -->
            <tr>
              <!-- [VIEW - Documenti > Tabella] Nome. -->
              <td>${document.name}</td>
              <!-- [VIEW - Documenti > Tabella] Categoria. -->
              <td>${document.category}</td>
              <!-- [VIEW - Documenti > Tabella] Paziente o struttura. -->
              <td>${document.owner}</td>
              <!-- [VIEW - Documenti > Tabella] Data. -->
              <td>${document.date}</td>
              <!-- [VIEW - Documenti > Tabella] Stato. -->
              <td><span class="status ${document.statusClass}">${document.status}</span></td>
              <!-- [VIEW - Documenti > Tabella] Azioni demo. -->
              <td>•••</td>
            </tr>`).join("");
    // [VIEW - Documenti] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Documenti] Sezione archivio. -->
      <section class="page" id="documents">
        <!-- [VIEW - Documenti > Intestazione] Titolo e caricamento. -->
        <div class="page-heading"><div><p class="eyebrow">ARCHIVIO</p><h1>Documenti</h1><p class="muted">Gestisci documenti amministrativi e clinici con permessi dedicati.</p></div><button class="primary">↑ Carica documento</button></div>
        <!-- [VIEW - Documenti > Statistiche] Tre statistiche. -->
        <div class="document-cards"><div class="doc-stat"><span>Documenti totali</span><strong>486</strong></div><div class="doc-stat"><span>Da firmare</span><strong>7</strong></div><div class="doc-stat"><span>In scadenza</span><strong>3</strong></div></div>
        <!-- [VIEW - Documenti > Tabella] Registro documenti. -->
        <div class="card table-card"><table>
          <!-- [VIEW - Documenti > Tabella] Intestazione. -->
          <thead><tr><th>Documento</th><th>Categoria</th><th>Paziente / struttura</th><th>Data</th><th>Stato</th><th></th></tr></thead>
          <!-- [VIEW - Documenti > Tabella] Dati. -->
          <tbody>${rows}</tbody>
        </table></div>
      </section>`;
  }

};
