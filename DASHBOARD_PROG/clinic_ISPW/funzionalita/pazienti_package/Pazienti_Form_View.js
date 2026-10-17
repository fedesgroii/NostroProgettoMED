window.ClinicaFlow.pazienti_package = window.ClinicaFlow.pazienti_package || {};

// [VIEW - Modale > Form Paziente] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.pazienti_package.Pazienti_Form_View = class Pazienti_Form_View {

  // [VIEW - Modale > Form Paziente] Costruisce esclusivamente il form demo per un nuovo paziente.
  render() {
    // [VIEW - Modale > Form Paziente] Restituisce i campi identici alla demo originale.
    return `
      <!-- [VIEW - Modale > Form Paziente] Titolo. -->
      <h2>Nuovo paziente</h2>
      <!-- [VIEW - Modale > Form Paziente] Nota sul backend futuro. -->
      <p>Demo UI: anagrafica e consenso saranno gestiti dal backend.</p>
      <!-- [VIEW - Modale > Form Paziente] Nome e cognome. -->
      <div class="two-col"><label>Nome<input placeholder="Nome"></label><label>Cognome<input placeholder="Cognome"></label></div>
      <!-- [VIEW - Modale > Form Paziente] Data di nascita e telefono. -->
      <div class="two-col"><label>Data di nascita<input type="date"></label><label>Telefono<input placeholder="+39 ..."></label></div>
      <!-- [VIEW - Modale > Form Paziente] Email. -->
      <label>Email<input type="email" placeholder="email@esempio.it"></label>
      <!-- [VIEW - Modale > Form Paziente] Professionista associato. -->
      <label>Professionista<select><option>Dott.ssa Maria Rossi — Psicologia</option><option>Dott. Luca Verdi — Logopedia</option><option>Dott.ssa Elena Neri — Dietologia</option></select></label>
      <!-- [VIEW - Modale > Form Paziente] Azioni. -->
      <div class="form-actions"><button class="secondary" id="cancelModal">Annulla</button><button class="primary" id="saveModal">Crea paziente</button></div>`;
  }

};
