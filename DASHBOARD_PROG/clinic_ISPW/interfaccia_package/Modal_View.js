window.ClinicaFlow.interfaccia_package = window.ClinicaFlow.interfaccia_package || {};

// [VIEW - Modale] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.interfaccia_package.Modal_View = class ModalView {

  // [VIEW - Modale] Restituisce il contenitore grafico usato dai Controller.
  render() {
    // [VIEW - Modale] Mantiene gli stessi ID e classi richiesti dal CSS e dal Controller.
    return `
    <!-- [VIEW - Modale] Backdrop della finestra. -->
    <div class="modal-backdrop" id="modal">
      <!-- [VIEW - Modale] Card della finestra. -->
      <div class="modal">
        <!-- [VIEW - Modale] Pulsante di chiusura. -->
        <button class="modal-close" id="modalClose">×</button>
        <!-- [VIEW - Modale] Punto di mount del contenuto dinamico. -->
        <div id="modalContent"></div>
      </div>
    </div>`;
  }

};
