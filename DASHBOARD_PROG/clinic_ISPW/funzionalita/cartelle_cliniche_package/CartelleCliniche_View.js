window.ClinicaFlow.cartelle_cliniche_package = window.ClinicaFlow.cartelle_cliniche_package || {};

// [VIEW - Cartelle cliniche] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_View = class CartelleCliniche_View {

  // [VIEW - Cartelle cliniche] Costruisce selettore pazienti e dettaglio clinico.
  render(patients, selectedPatient, notes) {
    // [VIEW - Cartelle cliniche > Selettore] Costruisce la lista laterale dei quattro pazienti originali.
    const patientList = patients.slice(0, 4).map((patient, index) => `
            <!-- [VIEW - Cartelle cliniche > Selettore] Paziente ${patient.name}. -->
            <button${index === 0 ? " class=\"selected\"" : ""}>
              <!-- [VIEW - Cartelle cliniche > Selettore] Avatar. -->
              <div class="avatar pastel">${patient.initials}</div>
              <!-- [VIEW - Cartelle cliniche > Selettore] Nome e ultima nota. -->
              <div><strong>${patient.name}</strong><span>${index < 2 ? "Ultima nota · oggi" : index === 2 ? "Ultima nota · 15/09" : "Ultima nota · 18/09"}</span></div>
              <!-- [VIEW - Cartelle cliniche > Selettore] Freccia. -->
              <span>›</span>
            </button>`).join("");
    // [VIEW - Cartelle cliniche > Note] Costruisce le note del paziente selezionato.
    const notesHtml = notes.map((note) => `
                <!-- [VIEW - Cartelle cliniche > Note] Nota del ${note.date}. -->
                <div class="note">
                  <!-- [VIEW - Cartelle cliniche > Note] Metadati nota. -->
                  <div><strong>${note.date} · ${note.session}</strong><span>${note.professional}</span></div>
                  <!-- [VIEW - Cartelle cliniche > Note] Testo nota. -->
                  <p>${note.text}</p>
                  <!-- [VIEW - Cartelle cliniche > Note] Stato nota. -->
                  <span class="tag ${note.tagClass}">${note.tag}</span>
                </div>`).join("");
    // [VIEW - Cartelle cliniche] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Cartelle cliniche] Sezione clinica. -->
      <section class="page" id="clinical">
        <!-- [VIEW - Cartelle cliniche > Intestazione] Titolo e azione nuova nota. -->
        <div class="page-heading"><div><p class="eyebrow">AREA CLINICA</p><h1>Cartelle cliniche</h1><p class="muted">Note, anamnesi, piani terapeutici e documentazione assistenziale.</p></div><button class="primary">+ Nuova nota</button></div>
        <!-- [VIEW - Cartelle cliniche] Layout a due colonne. -->
        <div class="clinical-layout">
          <!-- [VIEW - Cartelle cliniche > Selettore] Card ricerca e pazienti. -->
          <div class="card patient-selector">
            <!-- [VIEW - Cartelle cliniche > Selettore] Ricerca. -->
            <div class="search"><span>⌕</span><input placeholder="Cerca paziente..."></div>
            <!-- [VIEW - Cartelle cliniche > Selettore] Lista. -->
            <div class="patient-list">${patientList}
            </div>
          </div>
          <!-- [VIEW - Cartelle cliniche > Dettaglio] Dettaglio paziente. -->
          <div class="card clinical-detail">
            <!-- [VIEW - Cartelle cliniche > Dettaglio] Header paziente. -->
            <div class="patient-header"><div class="avatar large pastel">${selectedPatient.initials}</div><div><h2>${selectedPatient.name}</h2><span>${selectedPatient.code} · ${selectedPatient.specialty}</span></div><button class="secondary">Apri scheda completa</button></div>
            <!-- [VIEW - Cartelle cliniche > Dettaglio] Tab originali. -->
            <div class="tabs"><button class="active">Note cliniche</button><button>Anamnesi</button><button>Piano terapeutico</button><button>Allegati</button></div>
            <!-- [VIEW - Cartelle cliniche > Dettaglio] Note cliniche. -->
            ${notesHtml}
          </div>
        </div>
      </section>`;
  }

};
