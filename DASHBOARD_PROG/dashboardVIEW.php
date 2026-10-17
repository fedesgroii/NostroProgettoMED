<?php
// La View riceve dal Controllore Grafico esclusivamente i dati necessari al rendering.
// Il DTO e il Controllore Applicativo non vengono utilizzati direttamente dalla View.
/**
 * Shortcut per l'escape HTML sicuro.
 * Previene attacchi XSS, gestisce apici doppi/singoli e forza la codifica UTF-8.
 *
 * @param mixed $value Il valore da stampare (verrà automaticamente convertito in stringa).
 * @return string La stringa resa sicura per l'HTML.
 */
$h = static fn ($value): string => htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
?>

<!-- ====================================================================== -->
<!-- LAYOUT COMUNE: HEADER, SIDEBAR E TOPBAR (Struttura fissa)              -->
<!-- In MVC: questo blocco andrebbe in un file "layout.php" o "header.php"  -->
<!-- ====================================================================== -->
<!DOCTYPE html> <!-- Dichiara che il documento usa lo standard HTML5. -->
<html lang="it"> <!-- Apre l'elemento radice e imposta la lingua italiana. -->
<head> <!-- Apre la sezione dei metadati e delle risorse. -->
  <meta charset="UTF-8"> <!-- Imposta la codifica UTF-8. -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Rende il layout adattabile a smartphone e tablet. -->
  <meta name="theme-color" content="#0f766e"> <!-- Imposta il colore del tema del browser. -->
  <title>ClinicaFlow — Area Professionisti</title> <!-- Imposta il titolo della scheda del browser. -->
  <link rel="stylesheet" href="style.css"> <!-- Collega il file CSS, separando struttura e presentazione. -->
</head> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
<body> <!-- Apre il contenuto visibile dell'applicazione. -->
  <div class="app-shell"> <!-- Contenitore generale dell'intera interfaccia. -->
    <aside class="sidebar" id="sidebar"> <!-- Contiene la sidebar e la navigazione principale. -->
      <div class="brand"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        <div class="brand-mark">+</div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        <div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <strong>ClinicaFlow</strong> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <span>Area professionisti</span> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
      </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

      <div class="profile-mini"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        <div class="avatar" id="avatarProfessionista"><?= $h($avatarProfessionista) ?></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        <div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <strong id="nomeProfessionista"><?= $h($nomeProfessionista) ?></strong> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <span id="ruoloProfessionista"><?= $h($ruoloProfessionista) ?></span> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        <button class="icon-btn" title="Impostazioni profilo">⚙</button> <!-- Pulsante interattivo collegabile a JavaScript. -->
      </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

      <nav class="nav"> <!-- Raggruppa semanticamente i comandi di navigazione. -->
        <p class="nav-label">GESTIONE</p> <!-- Etichetta che raggruppa una sezione del menu. -->
        <button class="nav-item active" data-page="dashboard"><span>⌂</span> Dashboard</button> <!-- Pulsante interattivo collegabile a JavaScript. -->
        <button class="nav-item" data-page="agenda"><span>◷</span> Agenda</button> <!-- Voce di navigazione; data-page identifica la pagina da mostrare. -->
        <button class="nav-item" data-page="patients"><span>♙</span> Pazienti</button> <!-- Voce di navigazione; data-page identifica la pagina da mostrare. -->
        <button class="nav-item" data-page="clinical"><span>▤</span> Cartelle cliniche</button> <!-- Voce di navigazione; data-page identifica la pagina da mostrare. -->
        <button class="nav-item" data-page="documents"><span>□</span> Documenti</button> <!-- Voce di navigazione; data-page identifica la pagina da mostrare. -->

        <p class="nav-label">AMMINISTRAZIONE</p> <!-- Etichetta che raggruppa una sezione del menu. -->
        <button class="nav-item" data-page="finance"><span>€</span> Finanze e fatture</button> <!-- Voce di navigazione; data-page identifica la pagina da mostrare. -->
        <button class="nav-item" data-page="taxes"><span>▣</span> Tasse e scadenze</button> <!-- Voce di navigazione; data-page identifica la pagina da mostrare. -->
        <button class="nav-item" data-page="reports"><span>◒</span> Report</button> <!-- Voce di navigazione; data-page identifica la pagina da mostrare. -->

        <p class="nav-label">STRUTTURA</p> <!-- Etichetta che raggruppa una sezione del menu. -->
        <button class="nav-item" data-page="team"><span>♧</span> Staff</button> <!-- Voce di navigazione; data-page identifica la pagina da mostrare. -->
        <button class="nav-item" data-page="settings"><span>⚙</span> Impostazioni</button> <!-- Voce di navigazione; data-page identifica la pagina da mostrare. -->
      </nav> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

      <div class="sidebar-bottom"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        <div class="security-card"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <div class="security-icon">✓</div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <strong>Sessione protetta</strong> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <span id="ultimoAccesso"><?= $h($ultimoAccesso) ?></span> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        <button class="logout-btn" id="logoutBtn">↪ Esci dall'account</button> <!-- Pulsante interattivo collegabile a JavaScript. -->
      </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
    </aside> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

    <main class="main"> <!-- Contiene l'area principale del gestionale. -->
      <header class="topbar"> <!-- Apre la sezione dei metadati e delle risorse. -->
        <button class="mobile-menu" id="mobileMenu">☰</button> <!-- Pulsante interattivo collegabile a JavaScript. -->
        <div class="breadcrumb">Area professionisti <span>/</span> <strong id="pageTitle">Dashboard</strong></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        <div class="top-actions"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <button class="icon-btn notification-btn" id="notificationBtn" title="Notifiche">♢<b id="notificheCount">3</b></button> <!-- Pulsante interattivo collegabile a JavaScript. -->
          <button class="user-chip"> <!-- Pulsante interattivo collegabile a JavaScript. -->
            <div class="avatar small" id="topbarAvatar"><?= $h($avatarProfessionista) ?></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <span id="nomeProfessionista"><?= $h($nomeProfessionista) ?></span> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <span>⌄</span> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          </button> <!-- Pulsante interattivo collegabile a JavaScript. -->
        </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
      </header> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

      <div class="content"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: DASHBOARD (id="dashboard")                                  -->
<!-- File MVC suggerito: views/dashboard.php                                -->
<!-- ====================================================================== -->
        <section class="page active" id="dashboard"> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="welcome-row"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <p class="eyebrow" id="dataOdierna"><?= $h($dataOdierna) ?></p> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <h1>Ciao, <span id="nomeSaluto"><?= $h($nomeSaluto) ?></span> 👋</h1> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <p class="muted">Ecco una panoramica dell'attività della struttura.</p> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <button class="primary" data-page-action="agenda">+ Nuovo appuntamento</button> <!-- Pulsante interattivo collegabile a JavaScript. -->
          </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

          <div class="stats-grid"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <article class="stat-card"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="stat-icon teal">◷</div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div><span>Appuntamenti oggi</span><strong id="numeroAppuntamentiOggi"><?= $h($numeroAppuntamentiOggi) ?></strong><small class="positive" id="variazioneAppuntamenti"><?= $h($variazioneAppuntamenti) ?></small></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </article> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <article class="stat-card"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="stat-icon blue">♙</div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div><span>Pazienti attivi</span><strong id="numeroPazientiAttivi"><?= $h($numeroPazientiAttivi) ?></strong><small id="nuoviPazientiMese"><?= $h($nuoviPazientiMese) ?></small></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </article> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <article class="stat-card"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="stat-icon purple">€</div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div><span>Incassi del mese</span><strong id="incassiMese"><?= $h($incassiMese) ?></strong><small class="positive" id="variazioneIncassi"><?= $h($variazioneIncassi) ?></small></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </article> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <article class="stat-card"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="stat-icon orange">!</div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div><span>Scadenze vicine</span><strong id="scadenzeVicine"><?= $h($scadenzeVicine) ?></strong><small class="warning-text">Entro 30 giorni</small></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </article> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

          <div class="dashboard-grid"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <article class="card agenda-card"> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
              <div class="card-header"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div><h2>Agenda di oggi</h2><span class="muted" id="dataAgendaOggi"><?= $h($dataAgendaOggi) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <button class="text-btn" data-page-action="agenda">Vedi agenda →</button> <!-- Pulsante interattivo collegabile a JavaScript. -->
              </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="timeline"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="timeline-item"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <span class="time" id="agendaDashboardOra1"><?= $h($agendaOggi[0]['ora']) ?></span><div class="dot teal-bg"></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <div class="appointment"><div><strong id="agendaDashboardNomePaziente1"><?= $h($agendaOggi[0]['nomePaziente']) ?></strong><span id="agendaDashboardDettaglio1"><?= $h($agendaOggi[0]['dettaglio']) ?></span></div><span class="status <?= $h($agendaOggi[0]['statoClasse']) ?>" id="agendaDashboardStato1"><?= $h($agendaOggi[0]['stato']) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="timeline-item"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <span class="time" id="agendaDashboardOra2"><?= $h($agendaOggi[1]['ora']) ?></span><div class="dot blue-bg"></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <div class="appointment"><div><strong id="agendaDashboardNomePaziente2"><?= $h($agendaOggi[1]['nomePaziente']) ?></strong><span id="agendaDashboardDettaglio2"><?= $h($agendaOggi[1]['dettaglio']) ?></span></div><span class="status <?= $h($agendaOggi[1]['statoClasse']) ?>" id="agendaDashboardStato2"><?= $h($agendaOggi[1]['stato']) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="timeline-item current"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <span class="time" id="agendaDashboardOra3"><?= $h($agendaOggi[2]['ora']) ?></span><div class="dot purple-bg"></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <div class="appointment"><div><strong id="agendaDashboardNomePaziente3"><?= $h($agendaOggi[2]['nomePaziente']) ?></strong><span id="agendaDashboardDettaglio3"><?= $h($agendaOggi[2]['dettaglio']) ?></span></div><span class="status <?= $h($agendaOggi[2]['statoClasse']) ?>" id="agendaDashboardStato3"><?= $h($agendaOggi[2]['stato']) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="timeline-item"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <span class="time" id="agendaDashboardOra4"><?= $h($agendaOggi[3]['ora']) ?></span><div class="dot orange-bg"></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <div class="appointment"><div><strong id="agendaDashboardNomePaziente4"><?= $h($agendaOggi[3]['nomePaziente']) ?></strong><span id="agendaDashboardDettaglio4"><?= $h($agendaOggi[3]['dettaglio']) ?></span></div><span class="status <?= $h($agendaOggi[3]['statoClasse']) ?>" id="agendaDashboardStato4"><?= $h($agendaOggi[3]['stato']) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="timeline-item"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <span class="time" id="agendaDashboardOra5"><?= $h($agendaOggi[4]['ora']) ?></span><div class="dot teal-bg"></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <div class="appointment"><div><strong id="agendaDashboardNomePaziente5"><?= $h($agendaOggi[4]['nomePaziente']) ?></strong><span id="agendaDashboardDettaglio5"><?= $h($agendaOggi[4]['dettaglio']) ?></span></div><span class="status <?= $h($agendaOggi[4]['statoClasse']) ?>" id="agendaDashboardStato5"><?= $h($agendaOggi[4]['stato']) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </article> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

            <article class="card deadlines-card"> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
              <div class="card-header"><div><h2>Prossime scadenze</h2><span class="muted">Amministrazione</span></div><button class="text-btn" data-page-action="taxes">Tutte →</button></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="deadline-list"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="deadline"><div class="date-box"><strong id="scadenzaDashboard1Giorno"><?= $h($scadenze[0]['giorno']) ?></strong><span id="scadenzaDashboard1Mese"><?= $h($scadenze[0]['mese']) ?></span></div><div><strong id="scadenzaDashboard1Titolo"><?= $h($scadenze[0]['titolo']) ?></strong><span id="scadenzaDashboard1Dettaglio"><?= $h($scadenze[0]['dettaglio']) ?></span></div><span class="pill orange" id="scadenzaDashboard1Stato"><?= $h($scadenze[0]['stato']) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="deadline"><div class="date-box"><strong id="scadenzaDashboard2Giorno"><?= $h($scadenze[1]['giorno']) ?></strong><span id="scadenzaDashboard2Mese"><?= $h($scadenze[1]['mese']) ?></span></div><div><strong id="scadenzaDashboard2Titolo"><?= $h($scadenze[1]['titolo']) ?></strong><span id="scadenzaDashboard2Dettaglio"><?= $h($scadenze[1]['dettaglio']) ?></span></div><span class="pill gray" id="scadenzaDashboard2Stato"><?= $h($scadenze[1]['stato']) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="deadline"><div class="date-box"><strong id="scadenzaDashboard3Giorno"><?= $h($scadenze[2]['giorno']) ?></strong><span id="scadenzaDashboard3Mese"><?= $h($scadenze[2]['mese']) ?></span></div><div><strong id="scadenzaDashboard3Titolo"><?= $h($scadenze[2]['titolo']) ?></strong><span id="scadenzaDashboard3Dettaglio"><?= $h($scadenze[2]['dettaglio']) ?></span></div><span class="pill gray" id="scadenzaDashboard3Stato"><?= $h($scadenze[2]['stato']) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="deadline"><div class="date-box"><strong id="scadenzaDashboard4Giorno"><?= $h($scadenze[3]['giorno']) ?></strong><span id="scadenzaDashboard4Mese"><?= $h($scadenze[3]['mese']) ?></span></div><div><strong id="scadenzaDashboard4Titolo"><?= $h($scadenze[3]['titolo']) ?></strong><span id="scadenzaDashboard4Dettaglio"><?= $h($scadenze[3]['dettaglio']) ?></span></div><span class="pill gray" id="scadenzaDashboard4Stato"><?= $h($scadenze[3]['stato']) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </article> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

          <div class="dashboard-grid bottom"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <article class="card"> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
              <div class="card-header"><div><h2>Andamento mensile</h2><span class="muted">Incassi ultimi 6 mesi</span></div><select><option>2026</option><option>2025</option></select></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="chart-wrap"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="y-labels"><span>€10k</span><span>€7.5k</span><span>€5k</span><span>€2.5k</span><span>€0</span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <div class="chart"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <div class="gridline g1"></div><div class="gridline g2"></div><div class="gridline g3"></div><div class="gridline g4"></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <svg viewBox="0 0 600 220" preserveAspectRatio="none" aria-label="Grafico incassi"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                    <defs><linearGradient id="fill" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#0f766e" stop-opacity=".25"/><stop offset="1" stop-color="#0f766e" stop-opacity="0"/></linearGradient></defs> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                    <path id="graficoIncassiArea" d="<?= $h($graficoIncassi['areaPath']) ?>" fill="url(#fill)"/> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                    <path id="graficoIncassiLinea" d="<?= $h($graficoIncassi['linePath']) ?>" fill="none" stroke="#0f766e" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                    <circle id="graficoIncassiPuntoUltimo" cx="<?= $h($graficoIncassi['lastX']) ?>" cy="<?= $h($graficoIncassi['lastY']) ?>" r="6" fill="#fff" stroke="#0f766e" stroke-width="4"/> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  </svg> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                  <div class="x-labels"><span id="meseGrafico1"><?= $h($graficoIncassi['labels'][0]) ?></span><span id="meseGrafico2"><?= $h($graficoIncassi['labels'][1]) ?></span><span id="meseGrafico3"><?= $h($graficoIncassi['labels'][2]) ?></span><span id="meseGrafico4"><?= $h($graficoIncassi['labels'][3]) ?></span><span id="meseGrafico5"><?= $h($graficoIncassi['labels'][4]) ?></span><span id="meseGrafico6"><?= $h($graficoIncassi['labels'][5]) ?></span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </article> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

            <article class="card quick-card"> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
              <div class="card-header"><div><h2>Azioni rapide</h2><span class="muted">Operazioni frequenti</span></div></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="quick-grid"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
                <button data-page-action="patients"><span>♙</span><strong>Nuovo paziente</strong><small>Registra un assistito</small></button> <!-- Pulsante interattivo collegabile a JavaScript. -->
                <button data-page-action="agenda"><span>◷</span><strong>Appuntamento</strong><small>Inserisci in agenda</small></button> <!-- Pulsante interattivo collegabile a JavaScript. -->
                <button data-page-action="finance"><span>€</span><strong>Nuova fattura</strong><small>Registra una prestazione</small></button> <!-- Pulsante interattivo collegabile a JavaScript. -->
                <button data-page-action="documents"><span>□</span><strong>Carica documento</strong><small>Archivio digitale</small></button> <!-- Pulsante interattivo collegabile a JavaScript. -->
              </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </article> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        </section> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: AGENDA (id="agenda")                                        -->
<!-- File MVC suggerito: views/agenda.php                                   -->
<!-- ====================================================================== -->
        <section class="page" id="agenda"> <!-- Sezione agenda; JavaScript gestisce la visualizzazione e il drag and drop. -->
          <div class="page-heading"> <!-- Raggruppa titolo e azioni principali della pagina. -->
            <div> <!-- Contiene il titolo e la descrizione della pagina. -->
              <p class="eyebrow">GESTIONE</p> <!-- Etichetta superiore della sezione. -->
              <h1>Agenda</h1> <!-- Titolo principale della pagina. -->
              <p class="muted">Trascina un appuntamento in un altro giorno e orario libero per spostarlo.</p> <!-- Spiega direttamente il nuovo comportamento dell'agenda. -->
            </div> <!-- Chiude il contenitore del titolo. -->
            <button class="primary" id="newAppointment">+ Nuovo appuntamento</button> <!-- Apre la modale per creare un appuntamento. -->
          </div> <!-- Chiude l'intestazione della pagina. -->
          <div class="toolbar"> <!-- Contiene i controlli di navigazione e filtro dell'agenda. -->
            <div class="segmented"> <!-- Raggruppa le modalità di visualizzazione. -->
              <button class="active">Giorno</button> <!-- Modalità giorno mostrata come scelta attiva nella demo. -->
              <button>Settimana</button> <!-- Modalità settimana presente nell'interfaccia futura. -->
              <button>Mese</button> <!-- Modalità mese presente nell'interfaccia futura. -->
            </div> <!-- Chiude il selettore della modalità. -->
            <button class="secondary">‹</button> <!-- Pulsante grafico per la navigazione temporale. -->
            <strong id="intervalloSettimana">Settimana 21 – 27 settembre 2026</strong> <!-- Intervallo temporale visualizzato nella demo. -->
            <button class="secondary">›</button> <!-- Pulsante grafico per la navigazione temporale. -->
            <select> <!-- Filtro per professionista. -->
              <option>Tutti i professionisti</option> <!-- Mostra tutti gli appuntamenti. -->
              <option>Dott.ssa Giorgia Sgroi</option> <!-- Filtro demo per Giorgia Sgroi. -->
              <option>Dott. Luca Verdi</option> <!-- Filtro demo per Luca Verdi. -->
              <option>Dott.ssa Elena Neri</option> <!-- Filtro demo per Elena Neri. -->
            </select> <!-- Chiude il filtro professionista. -->
          </div> <!-- Chiude la toolbar. -->
          <div class="agenda-help"> <!-- Piccolo pannello informativo dedicato al drag and drop. -->
            <span>↕</span> <!-- Icona visiva che richiama lo spostamento. -->
            <span><strong>Spostamento rapido:</strong> trascina un appuntamento su un altro giorno/orario.</span> <!-- Istruzione sintetica per l'utente. -->
            <span class="agenda-help-rule">Lo slot deve essere libero.</span> <!-- Regola fondamentale del comportamento. -->
          </div> <!-- Chiude il pannello informativo. -->
          <div class="card agenda-full"> <!-- Contenitore grafico principale dell'agenda. -->
            <div class="agenda-week"> <!-- Griglia settimanale completa. -->
              <div class="agenda-time-column"> <!-- Colonna laterale con gli orari. -->
                <div class="agenda-corner">Ora</div> <!-- Cella d'angolo della griglia. -->
                <div class="agenda-time-labels"> <!-- Contiene le etichette degli orari. -->
                  <span>08:00</span> <!-- Etichetta oraria. -->
                  <span>09:00</span> <!-- Etichetta oraria. -->
                  <span>10:00</span> <!-- Etichetta oraria. -->
                  <span>11:00</span> <!-- Etichetta oraria. -->
                  <span>12:00</span> <!-- Etichetta oraria. -->
                  <span>13:00</span> <!-- Etichetta oraria. -->
                  <span>14:00</span> <!-- Etichetta oraria. -->
                  <span>15:00</span> <!-- Etichetta oraria. -->
                  <span>16:00</span> <!-- Etichetta oraria. -->
                  <span>17:00</span> <!-- Etichetta oraria. -->
                  <span>18:00</span> <!-- Etichetta oraria. -->
                  <span>19:00</span> <!-- Etichetta oraria. -->
                </div> <!-- Chiude le etichette degli orari. -->
              </div> <!-- Chiude la colonna degli orari. -->
              <div class="agenda-days"> <!-- Contiene i sette giorni della settimana. -->
                <div class="agenda-day" data-date="2026-09-21"> <!-- Colonna del lunedì. -->
                  <div class="agenda-day-header"><strong>LUN</strong><span id="agendaGiornoDataLunedi">21 SET</span></div> <!-- Intestazione del giorno. -->
                  <div class="agenda-day-body" data-date="2026-09-21"></div> <!-- Area che riceve gli appuntamenti trascinati. -->
                </div> <!-- Chiude il lunedì. -->
                <div class="agenda-day" data-date="2026-09-22"> <!-- Colonna del martedì. -->
                  <div class="agenda-day-header"><strong>MAR</strong><span id="agendaGiornoDataMartedi">22 SET</span></div> <!-- Intestazione del giorno. -->
                  <div class="agenda-day-body" data-date="2026-09-22"> <!-- Area della giornata con gli appuntamenti demo. -->
                    <div class="appointment-block teal-block" draggable="true" data-id="1" data-date="2026-09-22" data-time="09:00" data-duration="60"><strong id="agendaAppuntamento1Nome">Laura Bianchi</strong><span id="agendaAppuntamento1Dettaglio">09:00 · Psicologia</span></div> <!-- Appuntamento trascinabile delle 09:00. -->
                    <div class="appointment-block blue-block" draggable="true" data-id="2" data-date="2026-09-22" data-time="10:30" data-duration="60"><strong id="agendaAppuntamento2Nome">Marco Esposito</strong><span id="agendaAppuntamento2Dettaglio">10:30 · Primo colloquio</span></div> <!-- Appuntamento trascinabile delle 10:30. -->
                    <div class="appointment-block purple-block" draggable="true" data-id="3" data-date="2026-09-22" data-time="12:00" data-duration="60"><strong id="agendaAppuntamento3Nome">Giulia Romano</strong><span id="agendaAppuntamento3Dettaglio">12:00 · Follow-up</span></div> <!-- Appuntamento trascinabile delle 12:00. -->
                    <div class="appointment-block orange-block" draggable="true" data-id="4" data-date="2026-09-22" data-time="15:00" data-duration="60"><strong id="agendaAppuntamento4Nome">Alessandro Conti</strong><span id="agendaAppuntamento4Dettaglio">15:00 · Seduta</span></div> <!-- Appuntamento trascinabile delle 15:00. -->
                    <div class="appointment-block teal-block" draggable="true" data-id="5" data-date="2026-09-22" data-time="17:30" data-duration="60"><strong id="agendaAppuntamento5Nome">Sara Moretti</strong><span id="agendaAppuntamento5Dettaglio">17:30 · Seduta</span></div> <!-- Appuntamento trascinabile delle 17:30. -->
                  </div> <!-- Chiude l'area del martedì. -->
                </div> <!-- Chiude il martedì. -->
                <div class="agenda-day" data-date="2026-09-23"> <!-- Colonna del mercoledì. -->
                  <div class="agenda-day-header"><strong>MER</strong><span id="agendaGiornoDataMercoledi">23 SET</span></div> <!-- Intestazione del giorno. -->
                  <div class="agenda-day-body" data-date="2026-09-23"></div> <!-- Area che riceve gli appuntamenti trascinati. -->
                </div> <!-- Chiude il mercoledì. -->
                <div class="agenda-day" data-date="2026-09-24"> <!-- Colonna del giovedì. -->
                  <div class="agenda-day-header"><strong>GIO</strong><span id="agendaGiornoDataGiovedi">24 SET</span></div> <!-- Intestazione del giorno. -->
                  <div class="agenda-day-body" data-date="2026-09-24"></div> <!-- Area che riceve gli appuntamenti trascinati. -->
                </div> <!-- Chiude il giovedì. -->
                <div class="agenda-day" data-date="2026-09-25"> <!-- Colonna del venerdì. -->
                  <div class="agenda-day-header"><strong>VEN</strong><span id="agendaGiornoDataVenerdi">25 SET</span></div> <!-- Intestazione del giorno. -->
                  <div class="agenda-day-body" data-date="2026-09-25"></div> <!-- Area che riceve gli appuntamenti trascinati. -->
                </div> <!-- Chiude il venerdì. -->
                <div class="agenda-day" data-date="2026-09-26"> <!-- Colonna del sabato. -->
                  <div class="agenda-day-header"><strong>SAB</strong><span id="agendaGiornoDataSabato">26 SET</span></div> <!-- Intestazione del giorno. -->
                  <div class="agenda-day-body" data-date="2026-09-26"></div> <!-- Area che riceve gli appuntamenti trascinati. -->
                </div> <!-- Chiude il sabato. -->
                <div class="agenda-day" data-date="2026-09-27"> <!-- Colonna della domenica. -->
                  <div class="agenda-day-header"><strong>DOM</strong><span id="agendaGiornoDataDomenica">27 SET</span></div> <!-- Intestazione del giorno. -->
                  <div class="agenda-day-body" data-date="2026-09-27"></div> <!-- Area che riceve gli appuntamenti trascinati. -->
                </div> <!-- Chiude la domenica. -->
              </div> <!-- Chiude la griglia dei giorni. -->
            </div> <!-- Chiude la settimana dell'agenda. -->
          </div> <!-- Chiude la card dell'agenda. -->
        </section> <!-- Chiude la pagina agenda. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: PAZIENTI (id="patients")                                    -->
<!-- File MVC suggerito: views/patients.php                                 -->
<!-- ====================================================================== -->
        <section class="page" id="patients"> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="page-heading"><div><p class="eyebrow">ASSISTITI</p><h1>Pazienti</h1><p class="muted">Anagrafica, contatti e percorso assistenziale.</p></div><button class="primary" id="newPatient">+ Nuovo paziente</button></div> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="filters"><div class="search"><span>⌕</span><input placeholder="Cerca per nome, codice o telefono..."></div><select><option>Tutti i professionisti</option><option>Psicologia</option><option>Logopedia</option><option>Dietologia</option></select><select><option>Stato: tutti</option><option>Attivo</option><option>In attesa</option></select></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <div class="card table-card"><table><thead><tr><th>Paziente</th><th>Professionista</th><th>Ultima visita</th><th>Prossimo appuntamento</th><th>Stato</th><th></th></tr></thead><tbody> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
            <tr><td><div class="person"><div class="avatar pastel" id="paziente1Avatar">LB</div><div><strong id="paziente1Nome">Laura Bianchi</strong><span id="paziente1Codice">PT-00124</span></div></div></td><td id="paziente1Professionista">Giorgia Sgroi<br><small id="paziente1Specialita">Psicologia</small></td><td id="paziente1UltimaVisita">22/09/2026</td><td id="paziente1ProssimoAppuntamento">29/09/2026 · 09:00</td><td><span class="status confirmed" id="paziente1Stato">Attivo</span></td><td>•••</td></tr> <!-- Riga della tabella. -->
            <tr><td><div class="person"><div class="avatar pastel" id="paziente2Avatar">ME</div><div><strong id="paziente2Nome">Marco Esposito</strong><span id="paziente2Codice">PT-00118</span></div></div></td><td id="paziente2Professionista">Giorgia Sgroi<br><small id="paziente2Specialita">Psicologia</small></td><td id="paziente2UltimaVisita">22/09/2026</td><td id="paziente2ProssimoAppuntamento">06/10/2026 · 10:30</td><td><span class="status confirmed" id="paziente2Stato">Attivo</span></td><td>•••</td></tr> <!-- Riga della tabella. -->
            <tr><td><div class="person"><div class="avatar pastel" id="paziente3Avatar">GR</div><div><strong id="paziente3Nome">Giulia Romano</strong><span id="paziente3Codice">PT-00107</span></div></div></td><td id="paziente3Professionista">Giorgia Sgroi<br><small id="paziente3Specialita">Psicologia</small></td><td id="paziente3UltimaVisita">15/09/2026</td><td id="paziente3ProssimoAppuntamento">22/09/2026 · 12:00</td><td><span class="status confirmed" id="paziente3Stato">Attivo</span></td><td>•••</td></tr> <!-- Riga della tabella. -->
            <tr><td><div class="person"><div class="avatar pastel" id="paziente4Avatar">SC</div><div><strong id="paziente4Nome">Sofia Costa</strong><span id="paziente4Codice">PT-00098</span></div></div></td><td id="paziente4Professionista">Luca Verdi<br><small id="paziente4Specialita">Logopedia</small></td><td id="paziente4UltimaVisita">18/09/2026</td><td id="paziente4ProssimoAppuntamento">25/09/2026 · 16:00</td><td><span class="status confirmed" id="paziente4Stato">Attivo</span></td><td>•••</td></tr> <!-- Riga della tabella. -->
            <tr><td><div class="person"><div class="avatar pastel" id="paziente5Avatar">AF</div><div><strong id="paziente5Nome">Andrea Ferri</strong><span id="paziente5Codice">PT-00086</span></div></div></td><td id="paziente5Professionista">Elena Neri<br><small id="paziente5Specialita">Dietologia</small></td><td id="paziente5UltimaVisita">10/09/2026</td><td id="paziente5ProssimoAppuntamento">01/10/2026 · 14:30</td><td><span class="status pending" id="paziente5Stato">In attesa</span></td><td>•••</td></tr> <!-- Riga della tabella. -->
          </tbody></table></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        </section> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: CARTELLE CLINICHE (id="clinical")                           -->
<!-- File MVC suggerito: views/clinical.php                                 -->
<!-- ====================================================================== -->
        <section class="page" id="clinical"> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="page-heading"><div><p class="eyebrow">AREA CLINICA</p><h1>Cartelle cliniche</h1><p class="muted">Note, anamnesi, piani terapeutici e documentazione assistenziale.</p></div><button class="primary">+ Nuova nota</button></div> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="clinical-layout"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <div class="card patient-selector"><div class="search"><span>⌕</span><input placeholder="Cerca paziente..."></div><div class="patient-list"> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
              <button class="selected"><div class="avatar pastel" id="cartellaPaziente1Avatar">LB</div><div><strong id="cartellaPaziente1Nome">Laura Bianchi</strong><span id="cartellaPaziente1UltimaNota">Ultima nota · oggi</span></div><span>›</span></button> <!-- Pulsante interattivo collegabile a JavaScript. -->
              <button><div class="avatar pastel" id="cartellaPaziente2Avatar">ME</div><div><strong id="cartellaPaziente2Nome">Marco Esposito</strong><span id="cartellaPaziente2UltimaNota">Ultima nota · oggi</span></div><span>›</span></button> <!-- Pulsante interattivo collegabile a JavaScript. -->
              <button><div class="avatar pastel" id="cartellaPaziente3Avatar">GR</div><div><strong id="cartellaPaziente3Nome">Giulia Romano</strong><span id="cartellaPaziente3UltimaNota">Ultima nota · 15/09</span></div><span>›</span></button> <!-- Pulsante interattivo collegabile a JavaScript. -->
              <button><div class="avatar pastel" id="cartellaPaziente4Avatar">SC</div><div><strong id="cartellaPaziente4Nome">Sofia Costa</strong><span id="cartellaPaziente4UltimaNota">Ultima nota · 18/09</span></div><span>›</span></button> <!-- Pulsante interattivo collegabile a JavaScript. -->
            </div></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <div class="card clinical-detail"><div class="patient-header"><div class="avatar large pastel" id="cartellaPazienteAvatar">LB</div><div><h2 id="cartellaPazienteNome">Laura Bianchi</h2><span id="cartellaPazienteInfo">PT-00124 · Psicologia</span></div><button class="secondary">Apri scheda completa</button></div> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
              <div class="tabs"><button class="active">Note cliniche</button><button>Anamnesi</button><button>Piano terapeutico</button><button>Allegati</button></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="note"><div><strong id="notaClinica1DataTitolo">22 settembre 2026 · Seduta individuale</strong><span id="notaClinica1Professionista">Giorgia Sgroi</span></div><p id="notaClinica1Testo">Area dedicata alla nota clinica. In produzione questa sezione sarà collegata al backend e ai permessi professionali.</p><span class="tag" id="notaClinica1Stato">Bozza</span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
              <div class="note"><div><strong id="notaClinica2DataTitolo">15 settembre 2026 · Follow-up</strong><span id="notaClinica2Professionista">Giorgia Sgroi</span></div><p id="notaClinica2Testo">Spazio per annotazioni della seduta e obiettivi concordati.</p><span class="tag success" id="notaClinica2Stato">Firmata</span></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        </section> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: DOCUMENTI (id="documents")                                  -->
<!-- File MVC suggerito: views/documents.php                                -->
<!-- ====================================================================== -->
        <section class="page" id="documents"> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="page-heading"><div><p class="eyebrow">ARCHIVIO</p><h1>Documenti</h1><p class="muted">Gestisci documenti amministrativi e clinici con permessi dedicati.</p></div><button class="primary">↑ Carica documento</button></div> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="document-cards"><div class="doc-stat"><span>Documenti totali</span><strong id="docTotali">486</strong></div><div class="doc-stat"><span>Da firmare</span><strong id="docDaFirmare">7</strong></div><div class="doc-stat"><span>In scadenza</span><strong id="docInScadenza">3</strong></div></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <div class="card table-card"><table><thead><tr><th>Documento</th><th>Categoria</th><th>Paziente / struttura</th><th>Data</th><th>Stato</th><th></th></tr></thead><tbody> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
            <tr><td id="documento1Nome">Consenso informato.pdf</td><td id="documento1Categoria">Clinico</td><td id="documento1PazienteStruttura">Laura Bianchi</td><td id="documento1Data">22/09/2026</td><td><span class="status pending" id="documento1Stato">Da firmare</span></td><td>•••</td></tr> <!-- Riga della tabella. -->
            <tr><td id="documento2Nome">Fattura 2026-089.pdf</td><td id="documento2Categoria">Amministrativo</td><td id="documento2PazienteStruttura">Laura Bianchi</td><td id="documento2Data">22/09/2026</td><td><span class="status confirmed" id="documento2Stato">Archiviato</span></td><td>•••</td></tr> <!-- Riga della tabella. -->
            <tr><td id="documento3Nome">Documento identità.pdf</td><td id="documento3Categoria">Anagrafica</td><td id="documento3PazienteStruttura">Marco Esposito</td><td id="documento3Data">20/09/2026</td><td><span class="status confirmed" id="documento3Stato">Verificato</span></td><td>•••</td></tr> <!-- Riga della tabella. -->
          </tbody></table></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        </section> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: FINANZE E FATTURE (id="finance")                            -->
<!-- File MVC suggerito: views/finance.php                                  -->
<!-- ====================================================================== -->
        <section class="page" id="finance"> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="page-heading"><div><p class="eyebrow">AMMINISTRAZIONE</p><h1>Finanze e fatture</h1><p class="muted">Entrate, fatture, pagamenti e riepiloghi per il commercialista.</p></div><button class="primary">+ Nuova fattura</button></div> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="finance-stats"><div class="finance-stat"><span>Fatturato settembre</span><strong id="fatturatoMese">€ 9.460,00</strong><small id="fattureEmesseMese">32 fatture emesse</small></div><div class="finance-stat"><span>Incassato</span><strong id="incassatoMese">€ 7.840,00</strong><small class="positive" id="percentualeIncassato">82,9% del fatturato</small></div><div class="finance-stat"><span>Da incassare</span><strong id="daIncassare">€ 1.620,00</strong><small class="warning-text" id="fattureAperte">8 fatture aperte</small></div><div class="finance-stat"><span>Spese</span><strong id="speseMese">€ 2.140,00</strong><small id="periodoSpese">Questo mese</small></div></div>
          <div class="card table-card"><div class="card-header"><div><h2>Ultime fatture</h2><span class="muted" id="meseFatture">Settembre 2026</span></div><button class="secondary">Esporta CSV</button></div><table><thead><tr><th>Numero</th><th>Cliente</th><th>Prestazione</th><th>Importo</th><th>Data</th><th>Stato</th></tr></thead><tbody> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
            <tr><td id="fattura1Numero">#2026-089</td><td id="fattura1Cliente">Laura Bianchi</td><td id="fattura1Prestazione">Seduta psicologica</td><td id="fattura1Importo">€ 70,00</td><td id="fattura1Data">22/09/26</td><td><span class="status confirmed" id="fattura1Stato">Pagata</span></td></tr> <!-- Riga della tabella. -->
            <tr><td id="fattura2Numero">#2026-088</td><td id="fattura2Cliente">Marco Esposito</td><td id="fattura2Prestazione">Primo colloquio</td><td id="fattura2Importo">€ 80,00</td><td id="fattura2Data">22/09/26</td><td><span class="status pending" id="fattura2Stato">Da pagare</span></td></tr> <!-- Riga della tabella. -->
            <tr><td id="fattura3Numero">#2026-087</td><td id="fattura3Cliente">Sofia Costa</td><td id="fattura3Prestazione">Logopedia</td><td id="fattura3Importo">€ 55,00</td><td id="fattura3Data">21/09/26</td><td><span class="status confirmed" id="fattura3Stato">Pagata</span></td></tr> <!-- Riga della tabella. -->
          </tbody></table></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        </section> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: TASSE E SCADENZE (id="taxes")                               -->
<!-- File MVC suggerito: views/taxes.php                                    -->
<!-- ====================================================================== -->
        <section class="page" id="taxes"> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="page-heading"><div><p class="eyebrow">AMMINISTRAZIONE</p><h1>Tasse e scadenze</h1><p class="muted">Calendario fiscale e documenti per la gestione amministrativa.</p></div><button class="secondary">Esporta riepilogo</button></div> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="tax-alert"><span>!</span><div><strong id="taxAlertCount">4 scadenze richiedono attenzione</strong><p>Controlla gli importi e coordina i versamenti con il commercialista.</p></div></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          <div class="card deadline-table"><div class="card-header"><h2>Calendario fiscale</h2><select><option>2026</option><option>2027</option></select></div> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
            <div class="tax-row"><div class="tax-date urgent"><strong id="taxScadenza1Giorno">30</strong><span id="taxScadenza1Mese">SET</span></div><div><strong id="taxScadenza1Titolo">Fatture da emettere</strong><span id="taxScadenza1Dettaglio">8 prestazioni ancora da fatturare</span></div><span class="pill orange" id="taxScadenza1Stato">Da completare</span><button class="text-btn">Apri →</button></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <div class="tax-row"><div class="tax-date"><strong id="taxScadenza2Giorno">16</strong><span id="taxScadenza2Mese">OTT</span></div><div><strong id="taxScadenza2Titolo">Versamento IVA</strong><span id="taxScadenza2Dettaglio">Importo da confermare</span></div><span class="pill gray" id="taxScadenza2Stato">In programma</span><button class="text-btn">Dettagli →</button></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <div class="tax-row"><div class="tax-date"><strong id="taxScadenza3Giorno">30</strong><span id="taxScadenza3Mese">OTT</span></div><div><strong id="taxScadenza3Titolo">Contributi previdenziali</strong><span id="taxScadenza3Dettaglio">Promemoria per il professionista</span></div><span class="pill gray" id="taxScadenza3Stato">In programma</span><button class="text-btn">Dettagli →</button></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
            <div class="tax-row"><div class="tax-date"><strong id="taxScadenza4Giorno">15</strong><span id="taxScadenza4Mese">NOV</span></div><div><strong id="taxScadenza4Titolo">Invio documentazione al commercialista</strong><span id="taxScadenza4Dettaglio">Estratto contabile e fatture</span></div><span class="pill gray" id="taxScadenza4Stato">In programma</span><button class="text-btn">Dettagli →</button></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
          </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
        </section> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: REPORT (id="reports")                                       -->
<!-- File MVC suggerito: views/reports.php                                  -->
<!-- ====================================================================== -->
        <section class="page" id="reports"> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="page-heading"><div><p class="eyebrow">ANALISI</p><h1>Report</h1><p class="muted">Indicatori operativi e amministrativi della struttura.</p></div><button class="secondary">↓ Scarica report</button></div> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="report-grid"><div class="card report-card"><span>Prestazioni erogate</span><strong id="reportPrestazioni">186</strong><div class="mini-bar"><i id="reportPrestazioniBar" style="width:72%"></i></div><small id="reportPrestazioniVariazione">+12% rispetto ad agosto</small></div><div class="card report-card"><span>Tasso di presenza</span><strong id="reportPresenza">91,4%</strong><div class="mini-bar"><i id="reportPresenzaBar" style="width:91%"></i></div><small id="reportPresenzaAppuntamenti">Su 204 appuntamenti</small></div><div class="card report-card"><span>Nuovi pazienti</span><strong id="reportNuoviPazienti">18</strong><div class="mini-bar"><i id="reportNuoviPazientiBar" style="width:46%"></i></div><small id="reportNuoviPazientiPeriodo">Ultimi 30 giorni</small></div><div class="card report-card"><span>Incasso medio</span><strong id="reportIncassoMedio">€ 50,22</strong><div class="mini-bar"><i id="reportIncassoMedioBar" style="width:63%"></i></div><small id="reportIncassoMedioPeriodo">Per prestazione</small></div></div> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
        </section> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: STAFF (id="team")                                           -->
<!-- File MVC suggerito: views/team.php                                     -->
<!-- ====================================================================== -->
        <section class="page" id="team"> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="page-heading"><div><p class="eyebrow">STRUTTURA</p><h1>Staff</h1><p class="muted">Professionisti, ruoli e autorizzazioni.</p></div><button class="primary">+ Invita professionista</button></div> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="team-grid"><div class="card team-member"><div class="avatar large pastel" id="staff1Avatar">MR</div><h3 id="staff1Nome">Dott.ssa Giorgia Sgroi</h3><span id="staff1Ruolo">Psicologa · Amministratrice</span><div class="member-actions"><span class="status confirmed" id="staff1Stato">Attivo</span><button>•••</button></div></div><div class="card team-member"><div class="avatar large pastel" id="staff2Avatar">LV</div><h3 id="staff2Nome">Dott. Luca Verdi</h3><span id="staff2Ruolo">Logopedista</span><div class="member-actions"><span class="status confirmed" id="staff2Stato">Attivo</span><button>•••</button></div></div><div class="card team-member"><div class="avatar large pastel" id="staff3Avatar">EN</div><h3 id="staff3Nome">Dott.ssa Elena Neri</h3><span id="staff3Ruolo">Dietista</span><div class="member-actions"><span class="status confirmed" id="staff3Stato">Attivo</span><button>•••</button></div></div></div> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
        </section> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- SCHERMATA: IMPOSTAZIONI (id="settings")                                -->
<!-- File MVC suggerito: views/settings.php                                 -->
<!-- ====================================================================== -->
        <section class="page" id="settings"> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="page-heading"><div><p class="eyebrow">STRUTTURA</p><h1>Impostazioni</h1><p class="muted">Configura struttura, profilo, notifiche e sicurezza.</p></div><button class="primary">Salva modifiche</button></div> <!-- Sezione di pagina; JavaScript decide quale mostrare. -->
          <div class="settings-layout"><div class="card settings-nav"><button class="active">Profilo struttura</button><button>Notifiche</button><button>Permessi e ruoli</button><button>Fatturazione</button><button>Privacy e sicurezza</button></div><div class="card settings-form"><h2>Profilo struttura</h2><p class="muted">Informazioni visualizzate nei documenti e nelle comunicazioni.</p><label>Nome struttura<input id="inputNomeStruttura" value="Centro Salute & Benessere"></label><div class="two-col"><label>Partita IVA<input id="inputPartitaIva" value="IT 01234567890"></label><label>Telefono<input id="inputTelefono" value="+39 06 1234 5678"></label></div><label>Email<input id="inputEmail" value="segreteria@centrosalute.it"></label><label>Indirizzo<input id="inputIndirizzo" value="Via Roma 25, Roma"></label></div></div> <!-- Scheda grafica riutilizzabile per raggruppare contenuti. -->
        </section> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

      </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
    </main> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
  </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

<!-- ====================================================================== -->
<!-- LAYOUT COMUNE: MODALI, TOAST E SCRIPT DI CHIUSURA                      -->
<!-- In MVC: questo blocco andrebbe in un file "footer.php"                 -->
<!-- ====================================================================== -->
  <div class="modal-backdrop" id="modal"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
    <div class="modal"> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
      <button class="modal-close" id="modalClose">×</button> <!-- Pulsante interattivo collegabile a JavaScript. -->
      <div id="modalContent"></div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
    </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
  </div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->

  <div class="toast" id="toast">Operazione completata</div> <!-- Elemento HTML che contribuisce alla struttura della pagina. -->
  <script src="script.js"></script> <!-- Carica il JavaScript che gestisce le interazioni. -->
</body> <!-- Chiude il contenuto visibile. -->
</html> <!-- Chiude il documento HTML. -->
