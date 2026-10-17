window.ClinicaFlow.pazienti_package = window.ClinicaFlow.pazienti_package || {};

// [VIEW - Pazienti] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.pazienti_package.Pazienti_View = class Pazienti_View {

  // [VIEW - Pazienti] Costruisce anagrafica, filtri e tabella pazienti.
  render(patients) {
    // [VIEW - Pazienti > Tabella] Trasforma ogni bean paziente nella riga originale.
    const rows = patients.map((patient) => `
            <!-- [VIEW - Pazienti > Tabella] Riga del paziente ${patient.name}. -->
            <tr>
              <!-- [VIEW - Pazienti > Tabella] Anagrafica con avatar e codice. -->
              <td><div class="person"><div class="avatar pastel">${patient.initials}</div><div><strong>${patient.name}</strong><span>${patient.code}</span></div></div></td>
              <!-- [VIEW - Pazienti > Tabella] Professionista e specialità. -->
              <td>${patient.professional}<br><small>${patient.specialty}</small></td>
              <!-- [VIEW - Pazienti > Tabella] Ultima visita. -->
              <td>${patient.lastVisit}</td>
              <!-- [VIEW - Pazienti > Tabella] Prossimo appuntamento. -->
              <td>${patient.nextAppointment}</td>
              <!-- [VIEW - Pazienti > Tabella] Stato. -->
              <td><span class="status ${patient.status === "Attivo" ? "confirmed" : "pending"}">${patient.status}</span></td>
              <!-- [VIEW - Pazienti > Tabella] Azioni demo. -->
              <td>•••</td>
            </tr>`).join("");
    // [VIEW - Pazienti] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Pazienti] Sezione anagrafica. -->
      <section class="page" id="patients">
        <!-- [VIEW - Pazienti > Intestazione] Titolo e pulsante nuovo paziente. -->
        <div class="page-heading"><div><p class="eyebrow">ASSISTITI</p><h1>Pazienti</h1><p class="muted">Anagrafica, contatti e percorso assistenziale.</p></div><button class="primary" id="newPatient">+ Nuovo paziente</button></div>
        <!-- [VIEW - Pazienti > Filtri] Ricerca e filtri invariati. -->
        <div class="filters"><div class="search"><span>⌕</span><input placeholder="Cerca per nome, codice o telefono..."></div><select><option>Tutti i professionisti</option><option>Psicologia</option><option>Logopedia</option><option>Dietologia</option></select><select><option>Stato: tutti</option><option>Attivo</option><option>In attesa</option></select></div>
        <!-- [VIEW - Pazienti > Tabella] Card tabella. -->
        <div class="card table-card"><table>
          <!-- [VIEW - Pazienti > Tabella] Intestazioni. -->
          <thead><tr><th>Paziente</th><th>Professionista</th><th>Ultima visita</th><th>Prossimo appuntamento</th><th>Stato</th><th></th></tr></thead>
          <!-- [VIEW - Pazienti > Tabella] Righe. -->
          <tbody>${rows}</tbody>
        </table></div>
      </section>`;
  }

};
