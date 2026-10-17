window.ClinicaFlow.appuntamenti_package = window.ClinicaFlow.appuntamenti_package || {};

// [VIEW - Agenda] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.appuntamenti_package.Appuntamenti_View = class Appuntamenti_View {

  // [VIEW - Agenda] Costruisce la settimana con le destinazioni per il drag and drop.
  render(appointments) {
    // [VIEW - Agenda] Definisce i sette giorni presenti nella UI originale.
    const days = [
      { date: "2026-09-21", day: "LUN", label: "21 SET" },
      { date: "2026-09-22", day: "MAR", label: "22 SET" },
      { date: "2026-09-23", day: "MER", label: "23 SET" },
      { date: "2026-09-24", day: "GIO", label: "24 SET" },
      { date: "2026-09-25", day: "VEN", label: "25 SET" },
      { date: "2026-09-26", day: "SAB", label: "26 SET" },
      { date: "2026-09-27", day: "DOM", label: "27 SET" }
    ];
    // [VIEW - Agenda] Definisce i dodici orari della colonna sinistra.
    const times = ["08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00"];
    // [VIEW - Agenda] Costruisce le etichette orarie.
    const timeLabels = times.map((time) => `<span>${time}</span>`).join("");
    // [VIEW - Agenda] Costruisce tutte le colonne giornaliere.
    const dayColumns = days.map((day) => {
      // [VIEW - Agenda] Filtra gli appuntamenti del singolo giorno.
      const dayAppointments = appointments.filter((appointment) => appointment.date === day.date);
      // [VIEW - Agenda] Costruisce i blocchi trascinabili del giorno.
      const appointmentHtml = dayAppointments.map((appointment) => `
        <!-- [VIEW - Agenda > Appuntamenti] Blocco trascinabile dell'appuntamento ${appointment.id}. -->
        <div class="appointment-block ${appointment.colorClass}" draggable="true" data-id="${appointment.id}" data-date="${appointment.date}" data-time="${appointment.time}" data-duration="${appointment.duration}"><strong>${appointment.patientName}</strong><span>${appointment.getAgendaLabel()}</span></div>`).join("");
      // [VIEW - Agenda] Restituisce la colonna con header e area drop.
      return `
                <!-- [VIEW - Agenda > Settimana] Colonna del giorno ${day.date}. -->
                <div class="agenda-day" data-date="${day.date}">
                  <!-- [VIEW - Agenda > Settimana] Intestazione del giorno. -->
                  <div class="agenda-day-header"><strong>${day.day}</strong><span>${day.label}</span></div>
                  <!-- [VIEW - Agenda > Settimana] Area di drop del giorno. -->
                  <div class="agenda-day-body" data-date="${day.date}">${appointmentHtml}</div>
                </div>`;
    }).join("");
    // [VIEW - Agenda] Restituisce la pagina completa dell'agenda.
    return `
      <!-- [VIEW - Agenda] Sezione agenda. -->
      <section class="page" id="agenda">
        <!-- [VIEW - Agenda > Intestazione] Titolo e descrizione. -->
        <div class="page-heading">
          <!-- [VIEW - Agenda > Intestazione] Contenitore titolo. -->
          <div>
            <!-- [VIEW - Agenda > Intestazione] Etichetta di area. -->
            <p class="eyebrow">GESTIONE</p>
            <!-- [VIEW - Agenda > Intestazione] Titolo. -->
            <h1>Agenda</h1>
            <!-- [VIEW - Agenda > Intestazione] Istruzione drag and drop. -->
            <p class="muted">Trascina un appuntamento in un altro giorno e orario libero per spostarlo.</p>
          </div>
          <!-- [VIEW - Agenda > Intestazione] Nuovo appuntamento. -->
          <button class="primary" id="newAppointment">+ Nuovo appuntamento</button>
        </div>
        <!-- [VIEW - Agenda > Toolbar] Controlli di vista, periodo e professionista. -->
        <div class="toolbar">
          <!-- [VIEW - Agenda > Toolbar] Modalità Giorno/Settimana/Mese. -->
          <div class="segmented">
            <!-- [VIEW - Agenda > Toolbar] Modalità giorno attiva. -->
            <button class="active">Giorno</button>
            <!-- [VIEW - Agenda > Toolbar] Modalità settimana presente nella demo. -->
            <button>Settimana</button>
            <!-- [VIEW - Agenda > Toolbar] Modalità mese presente nella demo. -->
            <button>Mese</button>
          </div>
          <!-- [VIEW - Agenda > Toolbar] Navigazione temporale precedente. -->
          <button class="secondary">‹</button>
          <!-- [VIEW - Agenda > Toolbar] Periodo mostrato. -->
          <strong>Settimana 21 – 27 settembre 2026</strong>
          <!-- [VIEW - Agenda > Toolbar] Navigazione temporale successiva. -->
          <button class="secondary">›</button>
          <!-- [VIEW - Agenda > Toolbar] Selettore del professionista. -->
          <select><option>Tutti i professionisti</option><option>Dott.ssa Giorgia Sgroi</option><option>Dott. Luca Verdi</option><option>Dott.ssa Elena Neri</option></select>
        </div>
        <!-- [VIEW - Agenda > Aiuto] Pannello informativo drag and drop. -->
        <div class="agenda-help">
          <!-- [VIEW - Agenda > Aiuto] Icona. -->
          <span>↕</span>
          <!-- [VIEW - Agenda > Aiuto] Istruzione. -->
          <span><strong>Spostamento rapido:</strong> trascina un appuntamento su un altro giorno/orario.</span>
          <!-- [VIEW - Agenda > Aiuto] Regola disponibilità. -->
          <span class="agenda-help-rule">Lo slot deve essere libero.</span>
        </div>
        <!-- [VIEW - Agenda > Griglia] Contenitore principale. -->
        <div class="card agenda-full">
          <!-- [VIEW - Agenda > Griglia] Griglia settimanale. -->
          <div class="agenda-week">
            <!-- [VIEW - Agenda > Griglia] Colonna degli orari. -->
            <div class="agenda-time-column">
              <!-- [VIEW - Agenda > Griglia] Cella d'angolo. -->
              <div class="agenda-corner">Ora</div>
              <!-- [VIEW - Agenda > Griglia] Etichette temporali. -->
              <div class="agenda-time-labels">${timeLabels}</div>
            </div>
            <!-- [VIEW - Agenda > Griglia] Colonne dei giorni. -->
            <div class="agenda-days">${dayColumns}</div>
          </div>
        </div>
      </section>`;
  }

};
