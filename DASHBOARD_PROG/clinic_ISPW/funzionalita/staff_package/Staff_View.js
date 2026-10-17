window.ClinicaFlow.staff_package = window.ClinicaFlow.staff_package || {};

// [VIEW - Staff] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.staff_package.Staff_View = class Staff_View {

  // [VIEW - Staff] Costruisce le card dei professionisti.
  render(professionals) {
    // [VIEW - Staff] Trasforma ogni bean professionista in una card.
    const cards = professionals.map((professional) => `
          <!-- [VIEW - Staff > Membro] Card del professionista ${professional.name}. -->
          <div class="card team-member">
            <!-- [VIEW - Staff > Membro] Avatar. -->
            <div class="avatar large pastel">${professional.initials}</div>
            <!-- [VIEW - Staff > Membro] Nome. -->
            <h3>${professional.name}</h3>
            <!-- [VIEW - Staff > Membro] Specialità e ruolo. -->
            <span>${professional.getSubtitle()}</span>
            <!-- [VIEW - Staff > Membro] Stato e azioni. -->
            <div class="member-actions"><span class="status confirmed">${professional.status}</span><button>•••</button></div>
          </div>`).join("");
    // [VIEW - Staff] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Staff] Sezione professionisti. -->
      <section class="page" id="team">
        <!-- [VIEW - Staff > Intestazione] Titolo e invito. -->
        <div class="page-heading"><div><p class="eyebrow">STRUTTURA</p><h1>Staff</h1><p class="muted">Professionisti, ruoli e autorizzazioni.</p></div><button class="primary">+ Invita professionista</button></div>
        <!-- [VIEW - Staff > Griglia] Cards professionisti. -->
        <div class="team-grid">${cards}</div>
      </section>`;
  }

};
