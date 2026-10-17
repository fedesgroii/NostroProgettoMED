// [VIEW - Dashboard] Rappresenta la parte grafica della Dashboard senza accedere al database.
export class Dashboard_View {
    // [VIEW - Dashboard] Crea la struttura grafica completa della Dashboard.
    crea() {
        // [VIEW - Dashboard] Crea un contenitore temporaneo per il markup della Dashboard.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - Dashboard] Inserisce la struttura grafica attuale della Dashboard.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page active" id="dashboard"> <!-- Sezione dashboard; i dati aziendali arrivano dal database tramite MVC. -->
<div class="welcome-row"> <!-- Contenitore grafico del saluto. -->
<div> <!-- Contenitore del testo di benvenuto. -->
<p class="eyebrow" id="dataOdierna"></p> <!-- Data corrente caricata dinamicamente. -->
<h1>Buon pomeriggio, <span id="nomeSaluto"></span> 👋</h1> <!-- Nome dell’utente autenticato caricato dinamicamente. -->
<p class="muted">Ecco una panoramica dell'attività della struttura.</p> <!-- Testo statico di interfaccia. -->
</div> <!-- Chiusura del contenitore del testo. -->
<button class="primary" data-page-action="agenda">+ Nuovo appuntamento</button> <!-- Azione di navigazione verso agenda. -->
</div> <!-- Chiusura del contenitore del saluto. -->
<div class="stats-grid"> <!-- Griglia delle statistiche. -->
<article class="stat-card"><div class="stat-icon teal">◷</div><div><span>Appuntamenti oggi</span><strong id="numeroAppuntamentiOggi">—</strong><small class="positive" id="variazioneAppuntamenti"></small></div></article> <!-- Statistica appuntamenti dinamica. -->
<article class="stat-card"><div class="stat-icon blue">♙</div><div><span>Pazienti attivi</span><strong id="numeroPazientiAttivi">—</strong><small id="nuoviPazientiMese"></small></div></article> <!-- Statistica pazienti dinamica. -->
<article class="stat-card"><div class="stat-icon purple">€</div><div><span>Incassi del mese</span><strong id="incassiMese">—</strong><small class="positive" id="variazioneIncassi"></small></div></article> <!-- Statistica incassi dinamica. -->
<article class="stat-card"><div class="stat-icon orange">!</div><div><span>Scadenze vicine</span><strong id="scadenzeVicine">—</strong><small class="warning-text" id="giorniScadenza"></small></div></article> <!-- Statistica scadenze dinamica. -->
</div> <!-- Chiusura griglia statistiche. -->
<div class="dashboard-grid"> <!-- Griglia centrale dashboard. -->
<article class="card agenda-card"><div class="card-header"><div><h2>Agenda di oggi</h2><span class="muted" id="dataAgendaOggi"></span></div><button class="text-btn" data-page-action="agenda">Vedi agenda →</button></div><div class="timeline" id="dashboardAgendaOggi"></div></article> <!-- Agenda odierna dinamica. -->
<article class="card deadlines-card"><div class="card-header"><div><h2>Prossime scadenze</h2><span class="muted">Amministrazione</span></div><button class="text-btn" data-page-action="taxes">Tutte →</button></div><div class="deadline-list" id="dashboardScadenze"></div></article> <!-- Scadenze dinamiche. -->
</div> <!-- Chiusura griglia centrale. -->
<div class="dashboard-grid bottom"> <!-- Griglia inferiore dashboard. -->
<article class="card"><div class="card-header"><div><h2>Andamento mensile</h2><span class="muted" id="periodoGrafico"></span></div><select id="annoGrafico"><option>Anno corrente</option></select></div><div class="chart-wrap"><div class="y-labels" id="etichetteAsseY"></div><div class="chart"><div class="gridline g1"></div><div class="gridline g2"></div><div class="gridline g3"></div><div class="gridline g4"></div><svg aria-label="Grafico incassi" id="graficoIncassi" preserveaspectratio="none" viewbox="0 0 600 220"></svg><div class="x-labels" id="etichetteAsseX"></div></div></div></article> <!-- Grafico dinamico degli incassi. -->
<article class="card quick-card"><div class="card-header"><div><h2>Azioni rapide</h2><span class="muted">Operazioni frequenti</span></div></div><div class="quick-grid"><button data-page-action="patients"><span>♙</span><strong>Nuovo paziente</strong><small>Registra un assistito</small></button><button data-page-action="agenda"><span>◷</span><strong>Appuntamento</strong><small>Inserisci in agenda</small></button><button data-page-action="finance"><span>€</span><strong>Nuova fattura</strong><small>Registra una prestazione</small></button><button data-page-action="documents"><span>□</span><strong>Carica documento</strong><small>Archivio digitale</small></button></div></article> <!-- Azioni rapide statiche di interfaccia. -->
</div> <!-- Chiusura griglia inferiore. -->
</section>`;
        // [VIEW - Dashboard] Restituisce la sezione Dashboard pronta per il DOM.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - Dashboard] Inserisce la Dashboard nel contenitore principale.
    monta(contenitorePrincipale) {
        // [VIEW - Dashboard] Sostituisce la schermata precedente.
        contenitorePrincipale.replaceChildren();
        // [VIEW - Dashboard] Inserisce la Dashboard nel DOM.
        contenitorePrincipale.appendChild(this.crea());
    }


    // [VIEW - Dashboard] Disegna tutti i dati presenti nel Bean/DTO.
    renderizza(bean) {
        // [VIEW - Dashboard] Mostra il nome breve nel saluto.
        this.testo('nomeSaluto', bean.utente.nomeBreve);
        // [VIEW - Dashboard] Mostra il nome completo nella sidebar.
        this.testo('sidebarNome', bean.utente.nomeCompleto);
        // [VIEW - Dashboard] Mostra il ruolo nella sidebar.
        this.testo('sidebarRuolo', bean.utente.ruolo);
        // [VIEW - Dashboard] Mostra le iniziali nell'avatar della sidebar.
        this.testo('sidebarAvatar', bean.utente.iniziali);
        // [VIEW - Dashboard] Mostra le iniziali nell'avatar della topbar.
        this.testo('topbarAvatar', bean.utente.iniziali);
        // [VIEW - Dashboard] Mostra il nome breve nella topbar.
        this.testo('topbarNome', bean.utente.nomeBreve);
        // [VIEW - Dashboard] Mostra l'ultimo accesso.
        this.testo('ultimoAccesso', bean.utente.ultimoAccesso);
        // [VIEW - Dashboard] Mostra il numero di notifiche non lette.
        this.testo('notificheCount', bean.statistiche.notificheCount ?? 0);
        // [VIEW - Dashboard] Mostra la data odierna.
        this.testo('dataOdierna', bean.statistiche.dataOdierna);
        // [VIEW - Dashboard] Mostra la data della mini-agenda.
        this.testo('dataAgendaOggi', bean.statistiche.dataAgendaOggi);
        // [VIEW - Dashboard] Mostra il numero di appuntamenti.
        this.testo('numeroAppuntamentiOggi', bean.statistiche.numeroAppuntamentiOggi ?? 0);
        // [VIEW - Dashboard] Mostra la variazione appuntamenti.
        this.testo('variazioneAppuntamenti', bean.statistiche.variazioneAppuntamenti);
        // [VIEW - Dashboard] Mostra i pazienti attivi.
        this.testo('numeroPazientiAttivi', bean.statistiche.numeroPazientiAttivi ?? 0);
        // [VIEW - Dashboard] Mostra i nuovi pazienti.
        this.testo('nuoviPazientiMese', bean.statistiche.nuoviPazientiMese);
        // [VIEW - Dashboard] Mostra gli incassi del mese.
        this.testo('incassiMese', this.euro(bean.statistiche.incassiMese));
        // [VIEW - Dashboard] Mostra la variazione incassi.
        this.testo('variazioneIncassi', bean.statistiche.variazioneIncassi);
        // [VIEW - Dashboard] Mostra le scadenze vicine.
        this.testo('scadenzeVicine', bean.statistiche.scadenzeVicine ?? 0);
        // [VIEW - Dashboard] Mostra la distanza delle scadenze.
        this.testo('giorniScadenza', bean.statistiche.giorniScadenza);
        // [VIEW - Dashboard] Disegna gli appuntamenti reali.
        this.renderizzaAppuntamenti(bean.appuntamenti);
        // [VIEW - Dashboard] Disegna le scadenze reali.
        this.renderizzaScadenze(bean.scadenze);
        // [VIEW - Dashboard] Disegna il grafico reale.
        this.renderizzaGrafico(bean.andamentoIncassi);
    }

    // [VIEW - Dashboard] Imposta in sicurezza il testo di un elemento.
    testo(id, valore) {
        // [VIEW - Dashboard] Recupera l'elemento dal DOM.
        const elemento = document.getElementById(id);
        // [VIEW - Dashboard] Aggiorna solo l'elemento esistente.
        if (elemento) elemento.textContent = valore ?? '';
    }

    // [VIEW - Dashboard] Formatta un valore monetario secondo la lingua italiana.
    euro(valore) {
        // [VIEW - Dashboard] Restituisce zero quando il database non fornisce un valore.
        return new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'EUR' }).format(Number(valore || 0));
    }

    // [VIEW - Dashboard] Disegna la timeline degli appuntamenti.
    renderizzaAppuntamenti(appuntamenti) {
        // [VIEW - Dashboard] Recupera il contenitore della timeline.
        const contenitore = document.getElementById('dashboardAgendaOggi');
        // [VIEW - Dashboard] Interrompe se il contenitore non esiste.
        if (!contenitore) return;
        // [VIEW - Dashboard] Rimuove eventuali dati precedentemente visualizzati.
        contenitore.replaceChildren();
        // [VIEW - Dashboard] Crea ogni riga a partire dal DTO.
        appuntamenti.forEach(appuntamento => {
            // [VIEW - Dashboard] Crea il contenitore della singola riga.
            const riga = document.createElement('div');
            // [VIEW - Dashboard] Mantiene le classi grafiche della vecchia dashboard.
            riga.className = `timeline-item${appuntamento.inCorso ? ' current' : ''}`;
            // [VIEW - Dashboard] Crea gli elementi grafici senza interpolare dati HTML non controllati.
            riga.innerHTML = '<span class="time"></span><div class="dot"></div><div class="appointment"><div><strong></strong><span></span></div><span class="status"></span></div>';
            // [VIEW - Dashboard] Inserisce l'orario dell'appuntamento.
            riga.querySelector('.time').textContent = appuntamento.ora;
            // [VIEW - Dashboard] Inserisce il nome del paziente.
            riga.querySelector('strong').textContent = appuntamento.pazienteNome;
            // [VIEW - Dashboard] Inserisce la descrizione.
            riga.querySelector('.appointment div span').textContent = appuntamento.descrizione;
            // [VIEW - Dashboard] Inserisce lo stato.
            riga.querySelector('.status').textContent = appuntamento.statoEtichetta;
            // [VIEW - Dashboard] Applica la classe colore del puntino.
            riga.querySelector('.dot').className = `dot ${appuntamento.coloreDot}`;
            // [VIEW - Dashboard] Applica la classe grafica dello stato.
            riga.querySelector('.status').classList.add(appuntamento.classeStato);
            // [VIEW - Dashboard] Inserisce la riga nella timeline.
            contenitore.appendChild(riga);
        });
    }

    // [VIEW - Dashboard] Disegna le prossime scadenze.
    renderizzaScadenze(scadenze) {
        // [VIEW - Dashboard] Recupera il contenitore delle scadenze.
        const contenitore = document.getElementById('dashboardScadenze');
        // [VIEW - Dashboard] Interrompe se il contenitore non esiste.
        if (!contenitore) return;
        // [VIEW - Dashboard] Svuota la lista precedente.
        contenitore.replaceChildren();
        // [VIEW - Dashboard] Disegna ogni scadenza.
        scadenze.forEach(scadenza => {
            // [VIEW - Dashboard] Crea il blocco grafico.
            const elemento = document.createElement('div');
            // [VIEW - Dashboard] Applica la classe grafica esistente.
            elemento.className = 'deadline';
            // [VIEW - Dashboard] Crea la struttura interna.
            elemento.innerHTML = '<div class="date-box"><strong></strong><span></span></div><div><strong></strong><span></span></div><span class="pill"></span>';
            // [VIEW - Dashboard] Inserisce il giorno.
            elemento.querySelector('.date-box strong').textContent = scadenza.giorno;
            // [VIEW - Dashboard] Inserisce il mese.
            elemento.querySelector('.date-box span').textContent = scadenza.mese;
            // [VIEW - Dashboard] Inserisce il titolo.
            elemento.querySelectorAll('div > strong')[1].textContent = scadenza.titolo;
            // [VIEW - Dashboard] Inserisce la descrizione.
            elemento.querySelectorAll('div > span')[1].textContent = scadenza.descrizione;
            // [VIEW - Dashboard] Inserisce il numero di giorni.
            elemento.querySelector('.pill').textContent = scadenza.giorniResidui;
            // [VIEW - Dashboard] Applica la classe cromatica.
            elemento.querySelector('.pill').classList.add(scadenza.classePill);
            // [VIEW - Dashboard] Inserisce il blocco nella lista.
            contenitore.appendChild(elemento);
        });
    }

    // [VIEW - Dashboard] Disegna il grafico degli incassi.
    renderizzaGrafico(serie) {
        // [VIEW - Dashboard] Recupera il contenitore SVG.
        const svg = document.getElementById('graficoIncassi');
        // [VIEW - Dashboard] Recupera il contenitore delle etichette.
        const asseX = document.getElementById('etichetteAsseX');
        // [VIEW - Dashboard] Interrompe quando i contenitori non esistono.
        if (!svg || !asseX) return;
        // [VIEW - Dashboard] Elimina il grafico precedente.
        svg.replaceChildren();
        // [VIEW - Dashboard] Elimina le etichette precedenti.
        asseX.replaceChildren();
        // [VIEW - Dashboard] Calcola il massimo dell'asse Y.
        const massimo = Math.max(10000, ...serie.map(punto => Number(punto.valore) || 0));
        // [VIEW - Dashboard] Converte i dati in coordinate grafiche.
        const punti = serie.map((punto, indice) => {
            // [VIEW - Dashboard] Calcola la coordinata orizzontale.
            const x = serie.length <= 1 ? 0 : (600 / (serie.length - 1)) * indice;
            // [VIEW - Dashboard] Calcola la coordinata verticale.
            const y = 210 - ((Number(punto.valore) || 0) / massimo) * 180;
            // [VIEW - Dashboard] Crea l'etichetta del mese.
            const etichetta = document.createElement('span');
            // [VIEW - Dashboard] Inserisce il mese.
            etichetta.textContent = punto.etichetta;
            // [VIEW - Dashboard] Aggiunge il mese alla View.
            asseX.appendChild(etichetta);
            // [VIEW - Dashboard] Restituisce la coordinata.
            return { x, y };
        });
        // [VIEW - Dashboard] Esce senza disegnare quando non esistono dati.
        if (!punti.length) return;
        // [VIEW - Dashboard] Crea il percorso SVG.
        const percorso = document.createElementNS('http://www.w3.org/2000/svg','path');
        // [VIEW - Dashboard] Imposta la geometria del percorso.
        percorso.setAttribute('d', punti.map((punto, indice) => `${indice ? 'L' : 'M'}${punto.x} ${punto.y}`).join(' '));
        // [VIEW - Dashboard] Mantiene lo stile grafico esistente.
        percorso.setAttribute('fill','none');
        percorso.setAttribute('stroke','#0f766e');
        percorso.setAttribute('stroke-width','4');
        percorso.setAttribute('stroke-linecap','round');
        percorso.setAttribute('stroke-linejoin','round');
        // [VIEW - Dashboard] Inserisce il percorso nella View.
        svg.appendChild(percorso);
    }
}
