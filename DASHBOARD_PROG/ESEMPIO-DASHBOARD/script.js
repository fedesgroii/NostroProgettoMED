// Seleziona tutte le voci del menu laterale.
const navItems = document.querySelectorAll('.nav-item');
// Seleziona tutte le sezioni che rappresentano le pagine dell'app.
const pages = document.querySelectorAll('.page');
// Seleziona il titolo della pagina mostrato nella barra superiore.
const pageTitle = document.getElementById('pageTitle');
// Seleziona la sidebar per poterla aprire o chiudere su mobile.
const sidebar = document.getElementById('sidebar');
// Seleziona il pulsante che controlla la sidebar su mobile.
const mobileMenu = document.getElementById('mobileMenu');
// Seleziona il contenitore della finestra modale.
const modal = document.getElementById('modal');
// Seleziona il contenitore nel quale inserire il modulo della modale.
const modalContent = document.getElementById('modalContent');
// Seleziona il componente usato per mostrare messaggi temporanei.
const toast = document.getElementById('toast');

// Mappa gli ID tecnici delle pagine ai titoli mostrati all'utente.
const titles = {
  // Titolo della dashboard.
  dashboard: 'Dashboard',
  // Titolo della pagina agenda.
  agenda: 'Agenda',
  // Titolo della pagina pazienti.
  patients: 'Pazienti',
  // Titolo della pagina clinica.
  clinical: 'Cartelle cliniche',
  // Titolo della pagina documenti.
  documents: 'Documenti',
  // Titolo della pagina finanziaria.
  finance: 'Finanze e fatture',
  // Titolo della pagina fiscale.
  taxes: 'Tasse e scadenze',
  // Titolo della pagina report.
  reports: 'Report',
  // Titolo della pagina staff.
  team: 'Staff',
  // Titolo della pagina impostazioni.
  settings: 'Impostazioni'
// Fine della configurazione dei titoli.
};

// Mostra una pagina e nasconde tutte le altre.
function showPage(id) {
  // Scorre tutte le pagine disponibili.
  pages.forEach((page) => {
    // La pagina diventa attiva solo se il suo id coincide con quello richiesto.
    page.classList.toggle('active', page.id === id);
  });

  // Scorre tutte le voci del menu.
  navItems.forEach((item) => {
    // Evidenzia la voce associata alla pagina attualmente aperta.
    item.classList.toggle('active', item.dataset.page === id);
  });

  // Aggiorna il titolo visualizzato nel breadcrumb.
  pageTitle.textContent = titles[id] || 'Dashboard';
  // Chiude la sidebar dopo la navigazione su dispositivi mobili.
  sidebar.classList.remove('open');
  // Riporta l'utente in cima alla pagina.
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Collega ogni voce del menu alla funzione di navigazione.
navItems.forEach((item) => {
  // Quando l'utente fa click, usa il valore data-page come destinazione.
  item.addEventListener('click', () => showPage(item.dataset.page));
});

// Collega le azioni rapide della dashboard alle pagine indicate nel relativo data attribute.
document.querySelectorAll('[data-page-action]').forEach((button) => {
  // Quando viene cliccato il pulsante, apre la pagina richiesta.
  button.addEventListener('click', () => showPage(button.dataset.pageAction));
});

// Apre o chiude la sidebar quando l'utente usa il menu mobile.
mobileMenu.addEventListener('click', () => {
  // La classe open viene interpretata dal CSS.
  sidebar.classList.toggle('open');
});

// Apre la modale richiesta dall'utente.
function openModal(type) {
  // Controlla se la modale richiesta è quella dell'appuntamento.
  if (type === 'appointment') {
    // Inserisce nella modale il modulo dell'appuntamento.
    modalContent.innerHTML = `
      <!-- Titolo del modulo appuntamento. -->
      <h2>Nuovo appuntamento</h2>
      <!-- Nota che spiega che il backend arriverà in seguito. -->
      <p>Questa è una demo dell'interfaccia. I dati saranno collegati al backend PHP in seguito.</p>
      <!-- Campo per cercare il paziente. -->
      <label>Paziente<input placeholder="Cerca paziente..."></label>
      <!-- Selettore del professionista. -->
      <label>Professionista<select><option>Dott.ssa Maria Rossi — Psicologia</option><option>Dott. Luca Verdi — Logopedia</option><option>Dott.ssa Elena Neri — Dietologia</option></select></label>
      <!-- Campi per data e ora. -->
      <div class="two-col"><label>Data<input type="date" value="2026-09-22"></label><label>Ora<input type="time" value="15:00"></label></div>
      <!-- Selettore della tipologia di appuntamento. -->
      <label>Tipologia<select><option>Seduta individuale</option><option>Primo colloquio</option><option>Follow-up</option></select></label>
      <!-- Pulsanti della modale. -->
      <div class="form-actions"><button class="secondary" id="cancelModal">Annulla</button><button class="primary" id="saveModal">Salva appuntamento</button></div>`;
  } else {
    // Inserisce nella modale il modulo del paziente.
    modalContent.innerHTML = `
      <!-- Titolo del modulo paziente. -->
      <h2>Nuovo paziente</h2>
      <!-- Nota informativa sulla futura integrazione backend. -->
      <p>Demo UI: anagrafica e consenso saranno gestiti dal backend.</p>
      <!-- Campi per nome e cognome. -->
      <div class="two-col"><label>Nome<input placeholder="Nome"></label><label>Cognome<input placeholder="Cognome"></label></div>
      <!-- Campi per data di nascita e telefono. -->
      <div class="two-col"><label>Data di nascita<input type="date"></label><label>Telefono<input placeholder="+39 ..."></label></div>
      <!-- Campo email. -->
      <label>Email<input type="email" placeholder="email@esempio.it"></label>
      <!-- Selettore del professionista associato. -->
      <label>Professionista<select><option>Dott.ssa Maria Rossi — Psicologia</option><option>Dott. Luca Verdi — Logopedia</option><option>Dott.ssa Elena Neri — Dietologia</option></select></label>
      <!-- Pulsanti della modale. -->
      <div class="form-actions"><button class="secondary" id="cancelModal">Annulla</button><button class="primary" id="saveModal">Crea paziente</button></div>`;
  }

  // Rende visibile la modale aggiungendo la classe open.
  modal.classList.add('open');
  // Collega il pulsante Annulla alla funzione di chiusura.
  document.getElementById('cancelModal').onclick = closeModal;
  // Collega il pulsante Salva/Crea al comportamento demo.
  document.getElementById('saveModal').onclick = () => {
    // Chiude la modale.
    closeModal();
    // Mostra una conferma visiva.
    showToast('Operazione registrata (demo)');
  };
}

// Chiude la modale.
function closeModal() {
  // Rimuove la classe che la rende visibile.
  modal.classList.remove('open');
}

// Collega il pulsante X della modale alla chiusura.
document.getElementById('modalClose').onclick = closeModal;

// Chiude la modale se viene cliccato il suo sfondo.
modal.addEventListener('click', (event) => {
  // Verifica che il click sia sul backdrop e non sul contenuto della modale.
  if (event.target === modal) {
    // Chiude la finestra.
    closeModal();
  }
});

// Collega il pulsante "Nuovo appuntamento" alla relativa modale.
document.getElementById('newAppointment').onclick = () => openModal('appointment');

// Collega il pulsante "Nuovo paziente" alla relativa modale.
document.getElementById('newPatient').onclick = () => openModal('patient');

// Mostra le notifiche demo quando l'utente clicca sull'icona.
document.getElementById('notificationBtn').onclick = () => {
  // Mostra il messaggio temporaneo.
  showToast('3 notifiche: 1 documento da firmare, 1 pagamento, 1 scadenza');
};

// Mostra il comportamento demo del logout.
document.getElementById('logoutBtn').onclick = () => {
  // In futuro questo punto chiamerà PHP per distruggere la sessione.
  showToast('Demo: qui verrà eseguito il logout PHP');
};

// Mostra un messaggio temporaneo nella parte bassa dello schermo.
function showToast(message) {
  // Inserisce il messaggio ricevuto nel componente toast.
  toast.textContent = message;
  // Attiva la classe CSS che rende visibile il toast.
  toast.classList.add('show');
  // Dopo 2,8 secondi nasconde nuovamente il toast.
  setTimeout(() => {
    // Rimuove la classe CSS di visualizzazione.
    toast.classList.remove('show');
  }, 2800);
}

// Cerca tutti gli appuntamenti presenti nella griglia settimanale.
const appointmentBlocks = document.querySelectorAll('.appointment-block');
// Cerca tutte le aree giornaliere che possono ricevere un appuntamento.
const agendaDayBodies = document.querySelectorAll('.agenda-day-body');
// Memorizza l'appuntamento che l'utente sta trascinando.
let draggedAppointment = null;

// Converte un orario HH:MM nel numero di minuti trascorsi dalle 00:00.
function timeToMinutes(time) {
  // Divide ore e minuti e li converte in numeri.
  const parts = time.split(':').map(Number);
  // Restituisce il totale dei minuti.
  return (parts[0] * 60) + parts[1];
}

// Converte un numero di minuti in un orario HH:MM.
function minutesToTime(minutes) {
  // Calcola l'ora intera.
  const hours = Math.floor(minutes / 60);
  // Calcola i minuti residui.
  const remainingMinutes = minutes % 60;
  // Aggiunge uno zero davanti ai valori inferiori a 10.
  const paddedHours = String(hours).padStart(2, '0');
  // Aggiunge uno zero davanti ai minuti inferiori a 10.
  const paddedMinutes = String(remainingMinutes).padStart(2, '0');
  // Restituisce l'orario nel formato usato dall'agenda.
  return `${paddedHours}:${paddedMinutes}`;
}

// Calcola la posizione verticale dell'appuntamento partendo dal suo orario.
function updateAppointmentPosition(appointment) {
  // Legge l'orario attuale dell'appuntamento.
  const startMinutes = timeToMinutes(appointment.dataset.time);
  // Definisce l'inizio della giornata visualizzata.
  const agendaStartMinutes = 8 * 60;
  // Calcola la distanza verticale in pixel, usando 1 pixel per ogni minuto.
  const top = startMinutes - agendaStartMinutes;
  // Legge la durata dell'appuntamento in minuti.
  const duration = Number(appointment.dataset.duration);
  // Imposta la posizione verticale.
  appointment.style.top = `${top}px`;
  // Imposta l'altezza in base alla durata.
  appointment.style.height = `${duration}px`;
}

// Aggiorna la posizione iniziale di tutti gli appuntamenti presenti nell'HTML.
appointmentBlocks.forEach((appointment) => {
  // Posiziona l'appuntamento in base al suo orario.
  updateAppointmentPosition(appointment);
});

// Rimuove gli stati grafici usati durante il trascinamento.
function clearDragStates() {
  // Scorre tutte le aree giornaliere.
  agendaDayBodies.forEach((dayBody) => {
    // Rimuove l'evidenziazione di destinazione valida.
    dayBody.classList.remove('drag-over');
    // Rimuove l'evidenziazione di destinazione non valida.
    dayBody.classList.remove('drag-invalid');
  });
}

// Calcola quale slot da 30 minuti corrisponde alla posizione del mouse.
function getDropTime(dayBody, event) {
  // Recupera il rettangolo dell'area giornaliera.
  const rectangle = dayBody.getBoundingClientRect();
  // Calcola la posizione verticale del mouse rispetto all'area.
  const y = event.clientY - rectangle.top;
  // Converte la posizione in minuti partendo dalle 08:00.
  const rawMinutes = (8 * 60) + Math.max(0, y);
  // Arrotonda verso il basso al precedente slot di 30 minuti.
  const roundedMinutes = Math.floor(rawMinutes / 30) * 30;
  // Restituisce l'orario risultante.
  return minutesToTime(roundedMinutes);
}

// Controlla se un appuntamento può essere inserito nel nuovo giorno e orario.
function isSlotAvailable(appointment, targetDate, targetTime) {
  // Definisce l'inizio minimo consentito dalla struttura.
  const openingMinutes = (8 * 60) + 30;
  // Definisce la fine massima consentita dalla struttura.
  const closingMinutes = 19 * 60;
  // Converte l'orario di destinazione in minuti.
  const targetStart = timeToMinutes(targetTime);
  // Calcola la fine del nuovo appuntamento.
  const targetEnd = targetStart + Number(appointment.dataset.duration);

  // Rifiuta lo spostamento se l'appuntamento esce dagli orari disponibili.
  if (targetStart < openingMinutes || targetEnd > closingMinutes) {
    // Restituisce false perché la destinazione non è disponibile.
    return false;
  }

  // Cerca tutti gli appuntamenti esistenti.
  const appointments = document.querySelectorAll('.appointment-block');
  // Controlla uno per uno gli appuntamenti esistenti.
  return Array.from(appointments).every((otherAppointment) => {
    // L'appuntamento che stiamo spostando non deve essere confrontato con sé stesso.
    if (otherAppointment === appointment) {
      // Considera automaticamente valido questo caso.
      return true;
    }

    // Ignora gli appuntamenti presenti in un giorno diverso.
    if (otherAppointment.dataset.date !== targetDate) {
      // Considera libero lo slot rispetto a questo appuntamento.
      return true;
    }

    // Calcola l'inizio dell'appuntamento già presente.
    const otherStart = timeToMinutes(otherAppointment.dataset.time);
    // Calcola la fine dell'appuntamento già presente.
    const otherEnd = otherStart + Number(otherAppointment.dataset.duration);
    // Verifica che i due intervalli temporali non si sovrappongano.
    return targetEnd <= otherStart || targetStart >= otherEnd;
  });
}

// Aggiorna visivamente il testo dell'appuntamento dopo uno spostamento.
function updateAppointmentLabel(appointment) {
  // Cerca il testo secondario che contiene ora e professione.
  const details = appointment.querySelector('span');
  // Se il testo non esiste, non è necessario fare altro.
  if (!details) {
    // Interrompe la funzione in modo sicuro.
    return;
  }
  // Mantiene la parte descrittiva dopo il separatore e aggiorna soltanto l'orario.
  const description = details.textContent.split('·').slice(1).join('·').trim();
  // Scrive il nuovo orario insieme alla descrizione precedente.
  details.textContent = `${appointment.dataset.time} · ${description}`;
}

// Mostra un'anteprima valida o non valida mentre l'utente trascina un appuntamento.
function previewDrop(dayBody, event) {
  // Calcola l'orario dello slot sotto il mouse.
  const targetTime = getDropTime(dayBody, event);
  // Controlla se lo slot è realmente disponibile.
  const available = isSlotAvailable(draggedAppointment, dayBody.dataset.date, targetTime);
  // Evidenzia la colonna come destinazione valida o non valida.
  dayBody.classList.toggle('drag-over', available);
  // Mostra un colore di errore quando lo slot non può essere usato.
  dayBody.classList.toggle('drag-invalid', !available);
}

// Configura l'inizio del trascinamento per ogni appuntamento.
appointmentBlocks.forEach((appointment) => {
  // Ascolta l'evento nativo HTML5 dragstart.
  appointment.addEventListener('dragstart', (event) => {
    // Memorizza l'elemento trascinato per usarlo durante il drop.
    draggedAppointment = appointment;
    // Applica uno stato grafico temporaneo all'elemento originale.
    appointment.classList.add('dragging');
    // Inserisce nell'evento i dati principali dell'appuntamento.
    event.dataTransfer.setData('text/plain', appointment.dataset.id);
    // Indica che l'operazione prevista è uno spostamento.
    event.dataTransfer.effectAllowed = 'move';
  });

  // Ascolta la fine del trascinamento.
  appointment.addEventListener('dragend', () => {
    // Rimuove lo stato grafico dell'elemento trascinato.
    appointment.classList.remove('dragging');
    // Rimuove tutte le evidenziazioni dalle destinazioni.
    clearDragStates();
    // Azzera il riferimento all'appuntamento trascinato.
    draggedAppointment = null;
  });
});

// Configura ogni giornata come possibile destinazione del drag and drop.
agendaDayBodies.forEach((dayBody) => {
  // Gestisce il movimento del mouse sopra la giornata durante il trascinamento.
  dayBody.addEventListener('dragover', (event) => {
    // Senza preventDefault il browser non permetterebbe il drop.
    event.preventDefault();
    // Verifica che esista un appuntamento in fase di trascinamento.
    if (!draggedAppointment) {
      // Interrompe la gestione se non c'è alcun elemento trascinato.
      return;
    }
    // Aggiorna l'anteprima dello slot.
    previewDrop(dayBody, event);
    // Comunica al browser che l'operazione prevista è uno spostamento.
    event.dataTransfer.dropEffect = 'move';
  });

  // Gestisce l'uscita del mouse dalla giornata.
  dayBody.addEventListener('dragleave', (event) => {
    // Rimuove l'evidenziazione solo quando si esce realmente dall'area.
    if (!dayBody.contains(event.relatedTarget)) {
      // Rimuove gli stati grafici della giornata.
      dayBody.classList.remove('drag-over');
      // Rimuove anche lo stato di errore.
      dayBody.classList.remove('drag-invalid');
    }
  });

  // Gestisce il rilascio dell'appuntamento nella giornata.
  dayBody.addEventListener('drop', (event) => {
    // Blocca il comportamento predefinito del browser.
    event.preventDefault();
    // Verifica che esista un appuntamento da spostare.
    if (!draggedAppointment) {
      // Interrompe la funzione quando non c'è nulla da spostare.
      return;
    }

    // Calcola data e ora della nuova posizione.
    const targetDate = dayBody.dataset.date;
    // Calcola l'orario dello slot selezionato.
    const targetTime = getDropTime(dayBody, event);
    // Controlla nuovamente la disponibilità prima di modificare i dati.
    const available = isSlotAvailable(draggedAppointment, targetDate, targetTime);

    // Se lo slot è occupato o fuori dagli orari disponibili, annulla lo spostamento.
    if (!available) {
      // Mostra un errore immediatamente visibile all'utente.
      showToast('Errore: lo slot selezionato non è disponibile. Appuntamento non spostato.');
      // Rimuove gli stati grafici temporanei.
      clearDragStates();
      // Interrompe la funzione senza modificare l'appuntamento.
      return;
    }

    // Aggiorna la data dell'appuntamento.
    draggedAppointment.dataset.date = targetDate;
    // Aggiorna l'orario dell'appuntamento.
    draggedAppointment.dataset.time = targetTime;
    // Sposta fisicamente l'elemento nella nuova colonna.
    dayBody.appendChild(draggedAppointment);
    // Ricalcola la posizione verticale in base al nuovo orario.
    updateAppointmentPosition(draggedAppointment);
    // Aggiorna il testo mostrato all'utente.
    updateAppointmentLabel(draggedAppointment);
    // Mostra una conferma del nuovo giorno e orario.
    showToast(`Appuntamento spostato a ${targetDate} alle ${targetTime}.`);
    // Rimuove tutte le evidenziazioni della fase di drag.
    clearDragStates();
  });
});

// Mostra la dashboard come pagina iniziale quando viene caricato il file.
showPage('dashboard');
