window.ClinicaFlow.appuntamenti_package = window.ClinicaFlow.appuntamenti_package || {};

// [VIEW - Modale > Form Appuntamento] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.appuntamenti_package.Appuntamenti_Form_View = class Appuntamenti_Form_View {

  // [VIEW - Modale > Form Appuntamento] Costruisce esclusivamente il form demo per un nuovo appuntamento.
  render() {
    // [VIEW - Modale > Form Appuntamento] Restituisce i campi identici alla demo originale.
    return `
      <!-- [VIEW - Modale > Form Appuntamento] Titolo. -->
      <h2>Nuovo appuntamento</h2>
      <!-- [VIEW - Modale > Form Appuntamento] Nota sul backend futuro. -->
      <p>Questa è una demo dell'interfaccia. I dati saranno collegati al backend PHP in seguito.</p>
      <!-- [VIEW - Modale > Form Appuntamento] Campo paziente. -->
      <label>Paziente<input placeholder="Cerca paziente..."></label>
      <!-- [VIEW - Modale > Form Appuntamento] Professionista. -->
      <label>Professionista<select><option>Dott.ssa Maria Rossi — Psicologia</option><option>Dott. Luca Verdi — Logopedia</option><option>Dott.ssa Elena Neri — Dietologia</option></select></label>
      <!-- [VIEW - Modale > Form Appuntamento] Data e ora. -->
      <div class="two-col"><label>Data<input type="date" value="2026-09-22"></label><label>Ora<input type="time" value="15:00"></label></div>
      <!-- [VIEW - Modale > Form Appuntamento] Tipologia. -->
      <label>Tipologia<select><option>Seduta individuale</option><option>Primo colloquio</option><option>Follow-up</option></select></label>
      <!-- [VIEW - Modale > Form Appuntamento] Azioni. -->
      <div class="form-actions"><button class="secondary" id="cancelModal">Annulla</button><button class="primary" id="saveModal">Salva appuntamento</button></div>`;
  }

};
