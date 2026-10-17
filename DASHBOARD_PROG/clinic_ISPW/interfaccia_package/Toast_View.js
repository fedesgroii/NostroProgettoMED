window.ClinicaFlow.interfaccia_package = window.ClinicaFlow.interfaccia_package || {};

// [VIEW - Toast] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.interfaccia_package.Toast_View = class ToastView {

  // [VIEW - Toast] Restituisce il contenitore per i messaggi temporanei.
  render() {
    // [VIEW - Toast] Mantiene la stessa struttura usata dal CSS e dal Controller.
    return `<!-- [VIEW - Toast] Messaggio temporaneo iniziale della dashboard. --><div class="toast" id="toast">Operazione completata</div>`;
  }

};
