// [CONTROLLER GRAFICO - Appuntamenti] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.appuntamenti_package = window.ClinicaFlow.appuntamenti_package || {};
// [CONTROLLER GRAFICO - Appuntamenti] Gestisce eventi drag/drop e modale senza contenere SQL o logica DB.
window.ClinicaFlow.appuntamenti_package.Appuntamenti_ControlGrafico = class Appuntamenti_ControlGrafico {
  // [CONTROLLER GRAFICO - Appuntamenti] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Appuntamenti] Recupera il mountpoint della View.
    this.mount = document.getElementById('agenda-root');
    // [CONTROLLER GRAFICO - Appuntamenti] Crea la View agenda.
    this.view = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_View();
    // [CONTROLLER GRAFICO - Appuntamenti] Inizializza l'elemento trascinato.
    this.elementoTrascinato = null;
    // [CONTROLLER GRAFICO - Appuntamenti] Inizializza la data target dell'anteprima.
    this.dataAnteprima = '';
    // [CONTROLLER GRAFICO - Appuntamenti] Inizializza l'orario target dell'anteprima.
    this.orarioAnteprima = '';
    // [CONTROLLER GRAFICO - Appuntamenti] Inizializza l'ultimo risultato di verifica server.
    this.slotDisponibile = false;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Carica la settimana passando dal Bean al ControllerApplicativo.
  async inizializza() {
    // [CONTROLLER GRAFICO - Appuntamenti] Crea il Bean/DTO della richiesta di caricamento.
    const bean = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Appuntamenti] Invia il Bean al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('appuntamenti', bean);
    // [CONTROLLER GRAFICO - Appuntamenti] Ricostruisce il Bean/DTO di risposta.
    const dati = window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean.daRisposta(risposta.data);
    // [VIEW - Appuntamenti] Monta la View con gli appuntamenti arrivati dal database.
    this.mount.innerHTML = this.view.render(dati.appuntamenti);
    // [CONTROLLER GRAFICO - Appuntamenti] Collega tutti gli eventi già presenti nella View.
    this.collegaEventi();
    // [CONTROLLER GRAFICO - Appuntamenti] Posiziona graficamente gli appuntamenti come nella versione precedente.
    this.posizionaAppuntamenti();
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Collega il pulsante nuovo appuntamento e gli eventi drag/drop.
  collegaEventi() {
    // [CONTROLLER GRAFICO - Appuntamenti] Collega il pulsante di apertura della modale.
    const nuovo = document.getElementById('newAppointment');
    // [CONTROLLER GRAFICO - Appuntamenti] Apre il form solo se presente.
    if (nuovo) nuovo.addEventListener('click', () => this.apriModale());
    // [CONTROLLER GRAFICO - Appuntamenti] Collega gli appuntamenti trascinabili.
    this.mount.querySelectorAll('.appointment-block').forEach((elemento) => {
      // [CONTROLLER GRAFICO - Appuntamenti] Registra l'inizio del drag.
      elemento.addEventListener('dragstart', (evento) => this.inizioTrascinamento(elemento, evento));
      // [CONTROLLER GRAFICO - Appuntamenti] Registra la fine del drag.
      elemento.addEventListener('dragend', () => this.fineTrascinamento(elemento));
    });
    // [CONTROLLER GRAFICO - Appuntamenti] Collega le sette aree giornaliere.
    this.mount.querySelectorAll('.agenda-day-body').forEach((giorno) => {
      // [CONTROLLER GRAFICO - Appuntamenti] Gestisce il passaggio del mouse sul giorno.
      giorno.addEventListener('dragover', (evento) => this.sopraGiorno(giorno, evento));
      // [CONTROLLER GRAFICO - Appuntamenti] Gestisce l'uscita dal giorno.
      giorno.addEventListener('dragleave', (evento) => this.esciDaGiorno(giorno, evento));
      // [CONTROLLER GRAFICO - Appuntamenti] Gestisce il rilascio.
      giorno.addEventListener('drop', (evento) => this.rilascia(giorno, evento));
    });
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Memorizza l'elemento trascinato e prepara il trasferimento.
  inizioTrascinamento(elemento, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Memorizza il DOM in movimento.
    this.elementoTrascinato = elemento;
    // [CONTROLLER GRAFICO - Appuntamenti] Applica lo stato grafico originale.
    elemento.classList.add('dragging');
    // [CONTROLLER GRAFICO - Appuntamenti] Scrive l'identificativo nel trasferimento HTML5.
    evento.dataTransfer.setData('text/plain', elemento.dataset.id);
    // [CONTROLLER GRAFICO - Appuntamenti] Mantiene l'effetto move originale.
    evento.dataTransfer.effectAllowed = 'move';
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Chiude lo stato grafico del trascinamento.
  fineTrascinamento(elemento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Rimuove lo stato temporaneo.
    elemento.classList.remove('dragging');
    // [CONTROLLER GRAFICO - Appuntamenti] Pulisce l'anteprima.
    this.pulisciStatiDrag();
    // [CONTROLLER GRAFICO - Appuntamenti] Azzera il riferimento all'elemento.
    this.elementoTrascinato = null;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Converte la posizione grafica in uno slot da 30 minuti senza validarlo localmente.
  calcolaOrarioDaMouse(giorno, coordinataY) {
    // [CONTROLLER GRAFICO - Appuntamenti] Recupera l'altezza relativa all'inizio della colonna.
    const y = coordinataY - giorno.getBoundingClientRect().top;
    // [CONTROLLER GRAFICO - Appuntamenti] Converte la coordinata in minuti partendo dalle 08:00.
    const minutiGrezzi = 8 * 60 + Math.max(0, y);
    // [CONTROLLER GRAFICO - Appuntamenti] Arrotonda allo slot di 30 minuti usato dalla demo.
    const minuti = Math.floor(minutiGrezzi / 30) * 30;
    // [CONTROLLER GRAFICO - Appuntamenti] Forma l'orario HH:MM.
    return `${String(Math.floor(minuti / 60)).padStart(2, '0')}:${String(minuti % 60).padStart(2, '0')}`;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Verifica server-side lo slot quando cambia lo slot grafico.
  async verificaAnteprima(giorno, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola la data target dalla View.
    const data = giorno.dataset.date;
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola l'orario target dalla posizione del mouse.
    const orario = this.calcolaOrarioDaMouse(giorno, evento.clientY);
    // [CONTROLLER GRAFICO - Appuntamenti] Evita richieste duplicate quando il cursore resta nello stesso slot.
    if (data === this.dataAnteprima && orario === this.orarioAnteprima) return;
    // [CONTROLLER GRAFICO - Appuntamenti] Memorizza lo slot appena verificato.
    this.dataAnteprima = data;
    // [CONTROLLER GRAFICO - Appuntamenti] Memorizza l'orario appena verificato.
    this.orarioAnteprima = orario;
    // [BEAN/DTO - Appuntamenti] Costruisce il DTO di verifica usando l'elemento trascinato.
    const bean = window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean.movimentoDaElemento(this.elementoTrascinato, data, orario);
    // [CONTROLLER GRAFICO - Appuntamenti] Passa il Bean al ControllerApplicativo per la validazione reale.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('appuntamenti', new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ ...bean, operazione: 'verifica_slot' }));
    // [CONTROLLER GRAFICO - Appuntamenti] Memorizza l'esito restituito dal Model/DAO server.
    this.slotDisponibile = risposta.data.disponibile === true;
    // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna lo stato grafico valido.
    giorno.classList.toggle('drag-over', this.slotDisponibile);
    // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna lo stato grafico non valido.
    giorno.classList.toggle('drag-invalid', !this.slotDisponibile);
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Gestisce dragover mantenendo l'effetto move originale.
  sopraGiorno(giorno, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Abilita il drop HTML5.
    evento.preventDefault();
    // [CONTROLLER GRAFICO - Appuntamenti] Esce se non esiste un elemento trascinato.
    if (!this.elementoTrascinato) return;
    // [CONTROLLER GRAFICO - Appuntamenti] Chiede al ControllerApplicativo la verifica dello slot corrente.
    this.verificaAnteprima(giorno, evento).catch(() => {});
    // [CONTROLLER GRAFICO - Appuntamenti] Mantiene l'effetto di spostamento.
    evento.dataTransfer.dropEffect = 'move';
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Rimuove gli stati grafici quando il cursore esce dalla colonna.
  esciDaGiorno(giorno, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Verifica l'uscita effettiva dal contenitore.
    if (!giorno.contains(evento.relatedTarget)) {
      // [CONTROLLER GRAFICO - Appuntamenti] Rimuove lo stato valido.
      giorno.classList.remove('drag-over');
      // [CONTROLLER GRAFICO - Appuntamenti] Rimuove lo stato non valido.
      giorno.classList.remove('drag-invalid');
    }
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Esegue il movimento passando nuovamente dal ControllerApplicativo per la verifica autorevole.
  async rilascia(giorno, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Blocca il comportamento predefinito del browser.
    evento.preventDefault();
    // [CONTROLLER GRAFICO - Appuntamenti] Esce senza operazioni quando manca il drag.
    if (!this.elementoTrascinato) return;
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola data e orario target.
    const data = giorno.dataset.date;
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola lo slot target.
    const orario = this.calcolaOrarioDaMouse(giorno, evento.clientY);
    // [BEAN/DTO - Appuntamenti] Crea il DTO di movimento.
    const bean = window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean.movimentoDaElemento(this.elementoTrascinato, data, orario);
    // [CONTROLLER GRAFICO - Appuntamenti] Invia il Bean al ControllerApplicativo per controllo Model + DAO + update DB.
    try {
      // [CONTROLLER GRAFICO - Appuntamenti] Invia la richiesta applicativa definitiva.
      await window.ClinicaFlow.Infrastruttura.ApiClient.invia('appuntamenti', bean);
      // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna i data-* della View dopo esito positivo.
      this.elementoTrascinato.dataset.date = data;
      // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna l'orario grafico dopo esito positivo.
      this.elementoTrascinato.dataset.time = orario;
      // [VIEW - Appuntamenti] Sposta il blocco nella colonna della data selezionata.
      giorno.appendChild(this.elementoTrascinato);
      // [CONTROLLER GRAFICO - Appuntamenti] Ricalcola la posizione verticale senza cambiare CSS.
      this.posizionaElemento(this.elementoTrascinato);
      // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna il testo orario del blocco.
      this.aggiornaEtichetta(this.elementoTrascinato);
      // [INFRASTRUTTURA - Toast] Mostra lo stesso messaggio di conferma della versione precedente.
      window.ClinicaFlow.Infrastruttura.mostraToast(`Appuntamento spostato a ${data} alle ${orario}.`);
    } catch (errore) {
      // [INFRASTRUTTURA - Toast] Mostra lo stesso errore previsto dalla demo.
      window.ClinicaFlow.Infrastruttura.mostraToast('Errore: lo slot selezionato non è disponibile. Appuntamento non spostato.');
    } finally {
      // [CONTROLLER GRAFICO - Appuntamenti] Pulisce sempre gli stati temporanei.
      this.pulisciStatiDrag();
    }
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna posizione e altezza dell'elemento secondo la griglia CSS esistente.
  posizionaElemento(elemento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Legge HH:MM dal data-*.
    const parti = elemento.dataset.time.split(':').map(Number);
    // [CONTROLLER GRAFICO - Appuntamenti] Converte l'orario in minuti.
    const minuti = parti[0] * 60 + parti[1];
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola il top partendo dalle 08:00 come prima.
    elemento.style.top = `${minuti - 8 * 60}px`;
    // [CONTROLLER GRAFICO - Appuntamenti] Mantiene l'altezza in base alla durata.
    elemento.style.height = `${Number(elemento.dataset.duration)}px`;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Posiziona tutti gli elementi dopo il rendering.
  posizionaAppuntamenti() {
    // [CONTROLLER GRAFICO - Appuntamenti] Scorre i blocchi della settimana.
    this.mount.querySelectorAll('.appointment-block').forEach((elemento) => this.posizionaElemento(elemento));
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna soltanto lo span secondario dell'appuntamento.
  aggiornaEtichetta(elemento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Recupera il secondo elemento testuale del blocco.
    const dettagli = elemento.querySelector('span');
    // [CONTROLLER GRAFICO - Appuntamenti] Mantiene la descrizione e aggiorna il nuovo orario.
    if (dettagli) dettagli.textContent = `${elemento.dataset.time} · ${dettagli.textContent.split(' · ').slice(1).join(' · ')}`;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Pulisce le classi grafiche e lo stato dell'anteprima.
  pulisciStatiDrag() {
    // [CONTROLLER GRAFICO - Appuntamenti] Rimuove gli stati sulle colonne.
    this.mount.querySelectorAll('.agenda-day-body').forEach((giorno) => giorno.classList.remove('drag-over', 'drag-invalid'));
    // [CONTROLLER GRAFICO - Appuntamenti] Azzera la cache dell'anteprima.
    this.dataAnteprima = '';
    // [CONTROLLER GRAFICO - Appuntamenti] Azzera l'orario dell'anteprima.
    this.orarioAnteprima = '';
    // [CONTROLLER GRAFICO - Appuntamenti] Azzera l'ultimo risultato server.
    this.slotDisponibile = false;
  }
  // [VIEW - Appuntamenti] Apre il contenitore modale comune e monta la View del form della feature.
  apriModale() {
    // [VIEW - Appuntamenti] Recupera il contenitore modale.
    const modal = document.getElementById('modal');
    // [VIEW - Appuntamenti] Recupera il contenitore del form.
    const contenuto = document.getElementById('modalContent');
    // [VIEW - Appuntamenti] Inserisce la form View della funzionalità.
    contenuto.innerHTML = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Form_View().render();
    // [CONTROLLER GRAFICO - Appuntamenti] Rende visibile la modale.
    modal.classList.add('open');
    // [CONTROLLER GRAFICO - Appuntamenti] Collega Annulla alla chiusura.
    document.getElementById('cancelModal').onclick = () => modal.classList.remove('open');
    // [CONTROLLER GRAFICO - Appuntamenti] Collega Salva alla costruzione del Bean.
    document.getElementById('saveModal').onclick = () => this.salvaNuovoAppuntamento(modal);
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Passa il nuovo appuntamento attraverso Bean e ControllerApplicativo senza cambiare il messaggio demo.
  async salvaNuovoAppuntamento(modal) {
    // [BEAN/DTO - Appuntamenti] Costruisce il DTO dai controlli grafici del form.
    const bean = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ operazione: 'registra_demo', data: modal.querySelector('input[type="date"]').value, orario: modal.querySelector('input[type="time"]').value, tipo: modal.querySelectorAll('select')[1]?.value || 'Seduta individuale' });
    // [CONTROLLER GRAFICO - Appuntamenti] Invia il DTO al ControllerApplicativo per la validazione applicativa.
    try { await window.ClinicaFlow.Infrastruttura.ApiClient.invia('appuntamenti', bean); } catch (_) {}
    // [VIEW - Appuntamenti] Chiude la modale come nella demo originale.
    modal.classList.remove('open');
    // [INFRASTRUTTURA - Toast] Mantiene identico il messaggio originale di registrazione demo.
    window.ClinicaFlow.Infrastruttura.mostraToast('Operazione registrata (demo)');
  }
};
