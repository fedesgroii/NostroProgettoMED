// [CONTROLLER GRAFICO - Pazienti] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.pazienti_package = window.ClinicaFlow.pazienti_package || {};
// [CONTROLLER GRAFICO - Pazienti] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.pazienti_package.Pazienti_ControlGrafico = class Pazienti_ControlGrafico {
  // [CONTROLLER GRAFICO - Pazienti] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Pazienti] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('patients-root');
    // [CONTROLLER GRAFICO - Pazienti] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.pazienti_package.Pazienti_View();
  }
  // [CONTROLLER GRAFICO - Pazienti] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Pazienti] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.pazienti_package.Pazienti_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Pazienti] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('patients', bean);
    // [BEAN/DTO - Pazienti] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.pazienti_package.Pazienti_Bean.daRisposta(risposta.data);
    // [VIEW - Pazienti] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.pazienti);
    // [CONTROLLER GRAFICO - Pazienti] Collega il pulsante Nuovo paziente dopo il rendering della View.
    this.collegaNuovoPaziente();
  }
  // [CONTROLLER GRAFICO - Pazienti] Apre il form grafico della funzione mantenendo il comportamento esistente.
  collegaNuovoPaziente() {
    // [CONTROLLER GRAFICO - Pazienti] Recupera il pulsante della View.
    const pulsante = document.getElementById('newPatient');
    // [CONTROLLER GRAFICO - Pazienti] Esce quando la View non contiene il pulsante.
    if (!pulsante) return;
    // [CONTROLLER GRAFICO - Pazienti] Collega il click al form della funzione.
    pulsante.addEventListener('click', () => this.apriModale());
  }
  // [VIEW - Pazienti] Monta la form View della feature nel contenitore modale comune.
  apriModale() {
    // [VIEW - Pazienti] Recupera il contenitore modale.
    const modal = document.getElementById('modal');
    // [VIEW - Pazienti] Recupera il contenitore del form.
    const contenuto = document.getElementById('modalContent');
    // [VIEW - Pazienti] Inserisce la View del form Pazienti.
    contenuto.innerHTML = new window.ClinicaFlow.pazienti_package.Pazienti_Form_View().render();
    // [CONTROLLER GRAFICO - Pazienti] Mostra la modale.
    modal.classList.add('open');
    // [CONTROLLER GRAFICO - Pazienti] Collega Annulla.
    document.getElementById('cancelModal').onclick = () => modal.classList.remove('open');
    // [CONTROLLER GRAFICO - Pazienti] Collega Crea al passaggio Bean -> ControllerApplicativo.
    document.getElementById('saveModal').onclick = () => this.creaPaziente(modal);
  }
  // [CONTROLLER GRAFICO - Pazienti] Invia il Bean di creazione senza modificare il messaggio grafico della demo.
  async creaPaziente(modal) {
    // [CONTROLLER GRAFICO - Pazienti] Recupera i campi grafici del form.
    const campi = modal.querySelectorAll('input');
    // [BEAN/DTO - Pazienti] Crea il DTO con i valori inseriti dall'utente.
    const bean = new window.ClinicaFlow.pazienti_package.Pazienti_Bean({ operazione: 'registra_demo', nome: campi[0]?.value || '', cognome: campi[1]?.value || '', telefono: campi[3]?.value || '', email: campi[4]?.value || '' });
    // [CONTROLLER GRAFICO - Pazienti] Passa il DTO al ControllerApplicativo.
    try { await window.ClinicaFlow.Infrastruttura.ApiClient.invia('pazienti', bean); } catch (_) {}
    // [VIEW - Pazienti] Chiude la modale come nella versione esistente.
    modal.classList.remove('open');
    // [INFRASTRUTTURA - Toast] Mantiene il messaggio demo esistente.
    window.ClinicaFlow.Infrastruttura.mostraToast('Operazione registrata (demo)');
  }
};
