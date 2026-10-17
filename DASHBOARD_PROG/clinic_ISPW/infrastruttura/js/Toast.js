// [INFRASTRUTTURA] Recupera lo spazio globale dell'applicazione.
window.ClinicaFlow = window.ClinicaFlow || {};
// [INFRASTRUTTURA] Crea il piccolo servizio grafico comune per i messaggi esistenti.
window.ClinicaFlow.Infrastruttura = window.ClinicaFlow.Infrastruttura || {};
// [INFRASTRUTTURA] Mostra il toast senza contenere logica di business.
window.ClinicaFlow.Infrastruttura.mostraToast = (messaggio) => {
  // [INFRASTRUTTURA] Recupera il componente Toast_View già montato nell'interfaccia.
  const toast = document.getElementById('toast');
  // [INFRASTRUTTURA] Esce silenziosamente se la View non è stata ancora montata.
  if (!toast) return;
  // [INFRASTRUTTURA] Scrive il messaggio richiesto dall'interazione grafica.
  toast.textContent = messaggio;
  // [INFRASTRUTTURA] Attiva la resa grafica del toast.
  toast.classList.add('show');
  // [INFRASTRUTTURA] Pianifica la scomparsa automatica identica al comportamento precedente.
  setTimeout(() => toast.classList.remove('show'), 2800);
};
