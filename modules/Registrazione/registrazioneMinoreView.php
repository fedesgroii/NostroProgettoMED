<!DOCTYPE html>
<!--
    ============================================================================
    MINDLAB - VISTA: PAGINA DI REGISTRAZIONE
    ============================================================================
    RUOLO NEL PATTERN MVC:
        Questo file e' SOLO la View. Il suo unico compito e' MOSTRARE
        l'interfaccia all'utente: layout, campi, etichette, pulsanti.

        NON contiene ALCUNA logica di:
          - validazione dei dati (compito del Model / ControlApp lato server);
          - accesso al database (compito del DAO);
          - decisioni di routing o autenticazione (compito del Controller).

        Le uniche "operazioni" presenti sono di PURA PRESENTAZIONE e
        non toccano i dati ne' le decisioni di business:
          1) blocco della selezione del testo (user-select CSS per i 4
             motori di rendering + handler JS per browser), come gia'
             fatto nelle viste accedi_come.php e login_credential.php;
          2) abilitazione/disabilitazione della colonna "Genitore 2"
             e comparsa del blocco di caricamento PDF in funzione della
             checkbox: sono cambi di STATO VISIVO del DOM (equivalenti
             a un hover o a un :focus), senza alcuna elaborazione dei
             dati. La validazione effettiva (obbligatorieta', PDF,
             coerenza Genitore 1/2) spetta al Model/ControlApp.

    COME VIENE INCLUSA:
        L'entrypoint index.php fa `require` di questo file dopo aver avviato
        la sessione e generato il token CSRF. Il controller, PRIMA di
        includere questa view, deve rendere disponibile la variabile
        $csrfToken (stringa) con csrf_token(). La vista si limita a STAMPARLA
        in un campo hidden: non la genera, non la verifica.
-->
<html lang="it">
<head>
    <meta charset="UTF-8"> <!-- Codifica dei caratteri per supportare lettere accentate -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Adattamento ai dispositivi mobili -->
    <title>Registrazione - MindLab</title>
    <!-- ============================================================
         LOGO UFFICIALE E FAVICON
         I file sono nel repository, nella cartella assets/img/:
           - logo_ML.png : logo ufficiale (header della pagina + favicon)
           - logo_ML.ico : favicon in formato .ico multi-risoluzione
                           (16/32/48 px), per i browser piu' esigenti
         Percorsi RELATIVI: funzionano sia in locale (php -S) sia
         online, perche' l'entrypoint index.php e' servito sempre
         dalla radice del sito. Essendo stessi-origine, rispettano
         la CSP 'self' impostata nell'entrypoint.
         Se in futuro sostituirai il .ico con uno generato da te,
         basta sovrascrivere assets/img/logo_ML.ico: nessun'altra
         modifica e' necessaria.
         ============================================================ -->
    <link rel="icon" type="image/x-icon" href="assets/img/logo_ML.ico">
    <link rel="shortcut icon" type="image/x-icon" href="logo_ML.ico">
    <link rel="apple-touch-icon" href="/logo_ML.png">
    <!-- Font Inter: lo stesso usato nelle pagine paziente, per coerenza visiva -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* ============================================================
           RESET e impostazioni globali
           ============================================================ */

        /* Rimuove margini e padding di default, e imposta il box-sizing per includere padding e bordo nella larghezza totale */
        * {
            box-sizing: border-box;
        }

        /* Corpo della pagina: sfondo grigio chiaro, font principale Inter */
        body {
            display: flex;
            /* Flexbox per centrare il contenuto */
            justify-content: center;
            /* Centra orizzontalmente */
            align-items: flex-start;
            /* Allinea in alto: il form di registrazione e' molto lungo */
            min-height: 100vh;
            /* Altezza minima pari al 100% della viewport */
            margin: 0;
            /* Rimuove margine di default */
            background-color: #f7f9fa;
            /* Colore sfondo grigio chiarissimo, come nel calendario */
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
            /* Font principale, con fallback */
            color: #1f2937;
            /* Colore testo principale (grigio scuro) */
            padding: 32px 20px;
            /* Spazio interno per evitare che il contenuto tocchi i bordi su schermi piccoli */

            /* ========================================================
               DISABILITAZIONE SELEZIONE DEL TESTO - 4 BROWSER
               ========================================================
               Ogni riga copre un motore di rendering diverso:
               1. -webkit-user-select : Safari (macOS/iOS) e Chromium
                                        (Chrome, Edge moderno, Opera)
               2. -moz-user-select    : Firefox
               3. -ms-user-select     : Internet Explorer 10/11 (legacy)
               4. user-select         : standard W3C, gestito da tutti i
                                        browser moderni
               Nota: nei form, i CAMPI DI INSERIMENTO restano comunque
               selezionabili perche' l'utente deve poter correggere il
               testo che digita (vedi regola .form-group input piu' sotto).
               ======================================================== */
            -webkit-user-select: none; /* Per Safari e Chrome */
            -moz-user-select: none;    /* Per Firefox */
            -ms-user-select: none;     /* Per IE/Edge legacy */
            user-select: none;         /* Standard */
        }

        /* ============================================================
           Contenitore principale: scheda bianca con ombra
           ============================================================ */

        .container {
            width: 100%;
            /* Larghezza piena del genitore */
            max-width: 900px;
            /* piu' larga delle altre pagine: qui servono due colonne */
            background-color: #ffffff;
            /* Sfondo bianco per la card */
            padding: 32px 32px 36px;
            /* Padding interno: top/dx/bottom/sx */
            border-radius: 12px;
            /* Angoli arrotondati */
            border: 1px solid #e5e7eb;
            /* Bordo sottile grigio */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            /* Ombra leggera per profondita' */
        }

        /* ============================================================
           Intestazione: logo, titolo e sottotitolo
           ============================================================ */

        .header {
            display: flex;
            /* Flex per allineare gli elementi */
            flex-direction: column;
            /* Disposizione verticale */
            align-items: center;
            /* Centra orizzontalmente */
            justify-content: center;
            /* Centra verticalmente */
            margin-bottom: 28px;
            /* Spazio sotto l'intestazione */
            text-align: center;
            /* Allinea il testo al centro */
        }

        /* Logo: dimensioni fisse, margine sotto */
        .header img {
            width: 100px;
            /* Larghezza logo, modifica per ingrandire/rimpicciolire */
            height: auto;
            /* Altezza automatica per mantenere proporzioni */
            margin-bottom: 8px;
            /* Spazio sotto il logo */
            object-fit: contain;
            /* Mantiene le proporzioni senza tagli */
        }

        /* Titolo principale */
        .header h1 {
            color: #111827;
            /* Colore nero/grigio scuro */
            font-size: 1.5rem;
            /* Dimensione font (24px) */
            font-weight: 600;
            /* Peso semibold */
            margin: 0;
            /* Rimuove margine di default */
            letter-spacing: -0.025em;
            /* Leggera riduzione della spaziatura per un aspetto piu' compatto */
        }

        /* Sottotitolo descrittivo */
        .header p {
            color: #6b7280;
            /* Colore grigio medio per il testo secondario */
            font-size: 0.9rem;
            /* Dimensione leggermente piu' piccola */
            margin: 4px 0 0;
            /* Margine sopra minimo, zero sotto */
        }

        /* ============================================================
           Sezioni del form (DATI ANAGRAFICI / GENITORI / FATTURAZIONE)
           ============================================================ */

        .section-title {
            font-size: 0.8rem;
            /* Etichetta sezione: piccola */
            font-weight: 600;
            /* Semibold */
            text-transform: uppercase;
            /* Tutto maiuscolo, stile "sezione" */
            letter-spacing: 0.05em;
            /* Spaziatura ampia per distinzione visiva */
            color: #2563eb;
            /* Blu MindLab: richiama il colore principale del sito */
            margin: 0 0 14px;
            /* Spazio solo sotto il titolo di sezione */
        }

        /* Linea divisoria orizzontale (separatore tra le sezioni) */
        .divider {
            border: none;
            /* Rimuove bordo di default */
            border-top: 1px solid #e5e7eb;
            /* Bordo superiore sottile grigio */
            margin: 26px 0;
            /* Spazio sopra e sotto */
        }

        /* ============================================================
           Gruppi di campi del form
           ============================================================ */

        .form-group {
            margin-bottom: 18px;
            /* Spazio tra un campo e l'altro */
        }

        /* Etichette dei campi */
        .form-group label {
            display: block;
            /* Ogni etichetta occupa tutta la larghezza */
            font-size: 0.875rem;
            /* 14px */
            font-weight: 500;
            /* Medium */
            color: #374151;
            /* Grigio scuro */
            margin-bottom: 4px;
            /* Spazio tra etichetta e input */
        }

        /* Campi di input e select: stile uniforme */
        .form-group input,
        .form-group select {
            width: 100%;
            /* Larghezza piena */
            padding: 10px 12px;
            /* Spazio interno: top/bottom 10px, left/right 12px */
            border: 1px solid #d1d5db;
            /* Bordo grigio chiaro */
            border-radius: 8px;
            /* Angoli arrotondati */
            font-family: inherit;
            /* Eredita il font dal corpo */
            font-size: 0.95rem;
            /* Dimensione leggibile */
            color: #1f2937;
            /* Colore testo */
            background-color: #ffffff;
            /* Sfondo bianco */
            transition: border-color 0.2s, box-shadow 0.2s;
            /* Animazione fluida per focus e hover */

            /* I campi di inserimento DEVONO restare selezionabili:
               il divieto globale sul body si applica alla pagina, non
               a dove l'utente scrive e corregge il proprio testo. */
            -webkit-user-select: text;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }

        /* Stato focus: bordo blu e ombra leggera */
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            /* Rimuove il contorno di default del browser */
            border-color: #2563eb;
            /* Bordo blu (colore principale MindLab) */
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
            /* Ombra blu trasparente per evidenziare */
        }

        /* Campo in stato di errore: lo stile esiste qui, ma chi lo
           APPLICA o toglie e' il JavaScript/controllore, non la view */
        .form-group input.error {
            border-color: #ef4444;
            /* Bordo rosso per segnalare errore */
        }

        /* Messaggio di errore sotto il campo: nascosto di default, compare con .show */
        .form-group .error-message {
            color: #ef4444;
            /* Colore rosso */
            font-size: 0.75rem;
            /* 12px */
            margin-top: 4px;
            /* Piccolo spazio sopra */
            display: none;
            /* Nascosto finche' non serve */
        }

        .form-group .error-message.show {
            display: block;
            /* Mostra il messaggio quando ha la classe .show */
        }

        /* ============================================================
           Griglie di layout (flexbox, coerenti con le altre pagine)
           ============================================================ */

        /* Riga generica a due campi affiancati (es. Nome / Cognome) */
        .form-row {
            display: flex;
            /* Flex per affiancare i campi */
            gap: 16px;
            /* Spazio tra le colonne */
        }

        /* Ogni colonna dentro una riga occupa meta' dello spazio */
        .form-row > .form-group {
            flex: 1;
            /* Ripartizione equa della larghezza */
        }

        /* ============================================================
           Sezione DATI GENITORI: due colonne identiche
           ============================================================ */

        .genitori-grid {
            display: flex;
            /* Due genitori affiancati */
            gap: 24px;
            /* Spazio tra le due colonne */
        }

        /* Colonna di un genitore: card interna con bordo leggero */
        .genitore-colonna {
            flex: 1;
            /* Larghezza equa tra i due genitori */
            border: 1px solid #e5e7eb;
            /* Bordo sottile per separare visivamente le due colonne */
            border-radius: 10px;
            /* Angoli arrotondati */
            padding: 18px 18px 4px;
            /* Spazio interno (sotto ridotto: pensano i margin dei campi) */
            background-color: #fafbfc;
            /* Sfondo quasi bianco per distinguere la colonna */
        }

        /* Titolo della colonna genitore ("Genitore 1" / "Genitore 2") */
        .genitore-colonna h3 {
            font-size: 0.95rem;
            /* Titolo colonna */
            font-weight: 600;
            /* Semibold */
            color: #111827;
            /* Grigio molto scuro */
            margin: 0 0 14px;
            /* Spazio solo sotto */
            text-align: center;
            /* Centrato nella colonna */
        }

        /* ============================================================
           AVVISI FORMALI (banner "Avviso importante")
           ============================================================ */

        .avviso {
            display: flex;
            /* Icona a sinistra, testo a destra */
            gap: 12px;
            /* Spazio tra icona e testo */
            background-color: #fffbeb;
            /* Ambra chiarissimo: segnala senza allarmare */
            border: 1px solid #fcd34d;
            /* Bordo ambra: coerente con il richiamo visivo */
            border-left: 4px solid #d97706;
            /* Barra spessa a sinistra: stile "notice" formale */
            border-radius: 8px;
            /* Angoli arrotondati come il resto della pagina */
            padding: 14px 16px;
            /* Spazio interno */
            margin-bottom: 18px;
            /* Spazio sotto l'avviso, prima dei campi */
            font-size: 0.85rem;
            /* Testo leggermente piu' piccolo dei campi */
            line-height: 1.55;
            /* Interlinea comoda per un testo discorsivo */
            color: #78350f;
            /* Marrone scuro su fondo ambra: leggibile e formale */
        }

        /* Icona "!": cerchio ambra con glifo bianco */
        .avviso-icon {
            flex-shrink: 0;
            /* Non si restringe mai: l'icona resta intera */
            width: 22px;
            height: 22px;
            border-radius: 50%;
            /* Cerchio perfetto */
            background-color: #d97706;
            /* Ambra scura */
            color: #ffffff;
            /* Glifo bianco */
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.8rem;
            margin-top: 2px;
            /* Allineato alla prima riga di testo */
        }

        /* Elenco puntato dentro l'avviso (le due condizioni di esclusione) */
        .avviso ul {
            margin: 6px 0 0;
            padding-left: 18px;
            /* Rientro standard per i pallini */
        }

        .avviso li {
            margin-top: 3px;
        }

        /* Variante blu: usata per la nota giuridica sul documento PDF */
        .avviso-info {
            background-color: #eff6ff;
            /* Blu chiarissimo */
            border-color: #bfdbfe;
            /* Bordo blu chiaro */
            border-left-color: #2563eb;
            /* Barra blu MindLab */
            color: #1e3a8a;
            /* Blu scuro: testo formale-giuridico */
        }

        /* ============================================================
           CHECKBOX "Genitore 2 facoltativo" e blocco PDF
           ============================================================ */

        /* Riga della checkbox: etichetta affiancata al quadratino */
        .checkbox-group {
            display: flex;
            /* Quadratino + testo sulla stessa riga */
            align-items: flex-start;
            /* Allineati in alto se il testo va su piu' righe */
            gap: 10px;
            /* Spazio tra checkbox ed etichetta */
            background-color: #f9fafb;
            /* Grigio chiarissimo: distingue il controllo dai campi */
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 14px;
            margin-bottom: 18px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin-top: 3px;
            /* Allinea il quadratino alla prima riga di testo */
            accent-color: #2563eb;
            /* Colore blu MindLab quando e' spuntata */
            cursor: pointer;
            flex-shrink: 0;
            -webkit-user-select: text;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }

        .checkbox-group label {
            font-size: 0.85rem;
            font-weight: 500;
            color: #374151;
            cursor: pointer;
            /* Il click sull'etichetta attiva la checkbox */
        }

        /* Blocco di caricamento PDF: DI DEFAULT E' NASCOSTO.
           Chi lo MOSTRA/NASCONDE e' il JS di presentazione legato alla
           checkbox; chi ne CONTROLLA la validita' (PDF vero, dimensione)
           e' il Model lato server. La view fornisce solo il contenitore
           e lo stile degli stati. */
        .upload-box {
            display: none;
        }

        /* Stato "attivo": la classe viene messa dal JS quando il blocco
           deve comparire (genitore 2 non compilato / checkbox spuntata) */
        .upload-box.show {
            display: block;
        }

        /* Etichetta del campo file: stile identico alle altre label */
        .upload-box > label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }

        /* Input type="file": inquadrato come gli altri campi */
        .upload-box input[type="file"] {
            width: 100%;
            padding: 9px 12px;
            border: 1px dashed #9ca3af;
            /* Bordo tratteggiato: convenzione visiva per i caricamenti */
            border-radius: 8px;
            background-color: #fafbfc;
            font-family: inherit;
            font-size: 0.85rem;
            color: #374151;
            cursor: pointer;
            -webkit-user-select: text;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }

        .upload-box input[type="file"]:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        /* Campo disabilitato perche' genitore 2 non richiesto: grigio,
           non cliccabile, ma sempre selezionabile dal JS di supporto */
        .genitore-colonna.disabled {
            opacity: 0.55;
            /* Sfumatura: segnala visivamente che la colonna e' inattiva */
            background-color: #f3f4f6;
        }

        .genitore-colonna.disabled input,
        .genitore-colonna.disabled select {
            background-color: #f3f4f6;
            /* Fondo grigio: standard per i campi non editabili */
            cursor: not-allowed;
        }

        /* ============================================================
           Pulsanti in fondo: Annulla e Registrati
           ============================================================ */

        .buttons {
            display: flex;
            /* Flex per affiancare i pulsanti */
            justify-content: space-between;
            /* Spazio tra i due pulsanti */
            gap: 12px;
            /* Spazio aggiuntivo */
            margin-top: 8px;
            /* Spazio sopra */
            padding-top: 16px;
            /* Spazio interno sopra per separare dal form */
            border-top: 1px solid #f3f4f6;
            /* Linea sottile grigia sopra i pulsanti */
        }

        /* Stile base per tutti i pulsanti */
        .btn {
            display: inline-flex;
            /* Flex per centrare il testo */
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            /* Spazio interno */
            font-size: 0.85em;
            /* Dimensione testo leggermente piu' piccola */
            font-weight: 500;
            /* Medium */
            text-decoration: none;
            /* Rimuove sottolineatura (per link) */
            border-radius: 6px;
            /* Angoli arrotondati */
            cursor: pointer;
            /* Manina */
            width: 100%;
            /* Occupa tutta la larghezza disponibile (poi il flex li divide) */
            transition: all 0.2s ease;
            /* Animazione fluida per hover e focus */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            /* Ombra leggera */
            border: 1px solid transparent;
            /* Bordo trasparente di default */
            background: none;
            /* Rimuove sfondo di default */
            font-family: inherit;
            /* Eredita il font */
        }

        /* Pulsante "Annulla": stile bianco con bordo */
        .btn-cancel {
            background-color: #ffffff;
            /* Sfondo bianco */
            color: #374151;
            /* Testo grigio scuro */
            border-color: #d1d5db;
            /* Bordo grigio chiaro */
        }

        /* Hover per Annulla: sfondo grigio leggerissimo e bordo piu' scuro */
        .btn-cancel:hover {
            background-color: #f9fafb;
            /* Grigio molto chiaro */
            color: #111827;
            /* Testo piu' scuro per contrasto */
            border-color: #9ca3af;
            /* Bordo grigio medio */
        }

        /* Pulsante "Registrati": blu MindLab */
        .btn-submit {
            background-color: #2563eb;
            /* Blu principale */
            color: #ffffff;
            /* Testo bianco */
            border-color: transparent;
            /* Nessun bordo visibile */
        }

        /* Hover per Registrati: blu piu' scuro */
        .btn-submit:hover {
            background-color: #1d4ed8;
            /* Blu piu' scuro */
        }

        /* ============================================================
           Media query per schermi piccoli (max 768px e 480px)
           ============================================================ */

        @media (max-width: 768px) {
            /* Su tablet/phone le colonne dei genitori si impilano */
            .genitori-grid {
                flex-direction: column;
                /* Una colonna sopra l'altra */
            }
        }

        @media (max-width: 480px) {
            /* Su schermi piccoli, anche le righe a due campi diventano singole */
            .form-row {
                flex-direction: column;
                /* Una riga sopra l'altra */
                gap: 0;
                /* Rimuovi il gap (lo gestisce il margin dei singoli campi) */
            }
            /* Riduci il padding del container per adattarlo a schermi piccoli */
            .container {
                padding: 20px 16px;
                /* Meno spazio laterale */
            }
        }
    </style>
</head>

<!--
    BLOCCO SELEZIONE - PARTE JS (operazioni per ogni browser possibile)
    Le 4 proprieta' CSS qui sopra coprono Safari/Chromium, Firefox,
    IE/Edge legacy e lo standard W3C. Questi 4 handler JS sono la stessa
    difesa vista dall'evento: intercettano ONSELECTSTART (Safari/Chromium,
    Firefox, IE/Edge legacy) e ONCOPY prima che la selezione parta.
    Sono puramente interattivi (nessuna logica applicativa): per questo
    stanno nella View.
-->
<body onselectstart="return false" oncopy="return false" oncut="return false" oncontextmenu="return false">
    <div class="container">
        <!-- ============================================================
        INTESTAZIONE
        ============================================================ -->
        <div class="header">
            <!-- Logo ufficiale del progetto: file nel repository,
                 cartella assets/img/ (percorso relativo -> vale la
                 CSP 'self' dell'entrypoint) -->
            <img src="assets/img/logo_ML.png" alt="MindLab Logo">
            <h1>Registrazione nuovo paziente</h1>
            <p>Inserisci i dati del minore, dei genitori e di fatturazione</p>
        </div>

        <!-- ============================================================
        FORM DI REGISTRAZIONE
        method="POST": i dati sensibili viaggiano nel body, non nell'URL.
        action="/?page=registrazione": invia allo stesso entrypoint, che
        instradera' il controller preposto (GET = mostra il form,
        POST = elabora i dati). La view non decide nulla: stampa solo.
        ============================================================ -->
        <form id="registration-form" action="/?page=registrazione" method="POST" enctype="multipart/form-data">

            <!-- Campo hidden di sicurezza: il valore viene dal controller
                 (funzione csrf_token() dell'entrypoint). La view si limita
                 a stamparlo, escaped per prevenire XSS via attributo HTML. -->
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">

            <!-- ====================================================
            ERRORE DI VALIDAZIONE DEL SERVER (re-rendering POST)
            Quando il ControlApp respinge il form (dati non validi,
            PDF mancante, CSRF fallito...) puo' passare alla view la
            variabile $erroreRegistrazione (stringa). La vista si
            limita a STAMPARLA se esiste: nessuna decisione, nessun
            confronto - solo visualizzazione. Banner rosso in cima
            al form, coerente con .error delle altre pagine.
            ==================================================== -->
            <?php if (!empty($erroreRegistrazione)): ?>
                <div class="avviso" role="alert" style="background-color:#fef2f2; border-color:#fecaca; border-left-color:#ef4444; color:#991b1b;">
                    <div class="avviso-icon" style="background-color:#ef4444;">!</div>
                    <div><strong>Registrazione non completata.</strong> <?= htmlspecialchars($erroreRegistrazione, ENT_QUOTES, 'UTF-8') ?></div>
                </div>
            <?php endif; ?>

            <!-- ========================================================
            SEZIONE 1: DATI ANAGRAFICI MINORE
            ======================================================== -->
            <h2 class="section-title">Dati anagrafici minore</h2>

            <!-- Riga con due campi affiancati: nome e cognome -->
            <div class="form-row">
                <div class="form-group">
                    <label for="minore_nome">Nome</label>
                    <input type="text" id="minore_nome" name="minore_nome" placeholder="Mario" required>
                    <div class="error-message" id="minore_nome-error">Inserisci un nome valido (solo lettere, min. 2 caratteri)</div>
                </div>
                <div class="form-group">
                    <label for="minore_cognome">Cognome</label>
                    <input type="text" id="minore_cognome" name="minore_cognome" placeholder="Rossi" required>
                    <div class="error-message" id="minore_cognome-error">Inserisci un cognome valido (solo lettere, min. 2 caratteri)</div>
                </div>
            </div>

            <!-- Riga con due campi affiancati: data di nascita ed eta' -->
            <div class="form-row">
                <div class="form-group">
                    <label for="minore_data_nascita">Data di Nascita</label>
                    <!-- type="date": calendario nativo del browser; il formato
                         inviato al server e' sempre AAAA-MM-GG, indipendente
                         dalla visualizzazione locale -->
                    <input type="date" id="minore_data_nascita" name="minore_data_nascita" required>
                    <div class="error-message" id="minore_data_nascita-error">Inserisci una data di nascita valida</div>
                </div>
                <div class="form-group">
                    <label for="minore_eta">Eta'</label>
                    <!-- inputmode="numeric": su mobile apre la tastiera numerica -->
                    <input type="text" inputmode="numeric" id="minore_eta" name="minore_eta" placeholder="Es. 14" maxlength="3" required>
                    <div class="error-message" id="minore_eta-error">Inserisci un'eta' valida (numero)</div>
                </div>
            </div>

            <!-- Luogo di nascita -->
            <div class="form-group">
                <label for="minore_luogo_nascita">Luogo di Nascita</label>
                <input type="text" id="minore_luogo_nascita" name="minore_luogo_nascita" placeholder="Roma (RM)" required>
                <div class="error-message" id="minore_luogo_nascita-error">Inserisci un luogo di nascita valido</div>
            </div>

            <!-- Riga con tre campi: classe, scuola, sport -->
            <div class="form-row">
                <div class="form-group">
                    <label for="minore_classe">Classe</label>
                    <!-- Select: opzioni statiche di presentazione (le scuole
                         medie inferiori). Nessuna logica: se in futuro le
                         opzioni arriveranno dal Model, sara' il controller a
                         passarle alla view come array da stampare. -->
                         <select id="minore_classe" name="minore_classe" required>
                             <option value="" selected>Seleziona la classe</option>
                             <option value="Asilo">Asilo</option>
                             <option value="I elementare">I elementare</option>
                             <option value="II elementare">II elementare</option>
                             <option value="III elementare">III elementare</option>
                             <option value="IV elementare">IV elementare</option>
                             <option value="V elementare">V elementare</option>
                             <option value="I media">I media</option>
                             <option value="II media">II media</option>
                             <option value="III media">III media</option>
                             <option value="I superiore">I superiore</option>
                             <option value="II superiore">II superiore</option>
                             <option value="III superiore">III superiore</option>
                             <option value="IV superiore">IV superiore</option>
                             <option value="V superiore">V superiore</option>
                         </select>
                </div>
                <div class="form-group">
                    <label for="minore_scuola">Scuola</label>
                    <input type="text" id="minore_scuola" name="minore_scuola" placeholder="Istituto Comprensivo ..." required>
                    <div class="error-message" id="minore_scuola-error">Inserisci il nome della scuola</div>
                </div>
                <div class="form-group">
                    <label for="minore_sport">Sport</label>
                    <input type="text" id="minore_sport" name="minore_sport" placeholder="Calcio, nuoto, ..." required>
                    <div class="error-message" id="minore_sport-error">Inserisci lo sport praticato</div>
                </div>
            </div>

            <!-- Divisore tra le sezioni -->
            <hr class="divider">

            <!-- ========================================================
            SEZIONE 2: DATI GENITORI (due colonne, campi identici)

            OBBLIGATORIETA' (vincoli HTML dichiarativi voluti dal
            committente; la validazione DEFINITIVA resta del Model):
              - Genitore 1: tutti i campi required, come ogni altro
                campo della pagina;
              - Genitore 2: FACOLTATIVO. I suoi campi NON hanno
                l'attributo required in modo statico: viene aggiunto
                o tolto dal JS di presentazione quando la checkbox
                "Genitore 2 non compilato" cambia stato. In piu', il
                JS impedisce l'invio se Genitore 2 e' stato iniziato a
                meta' (regola: o tutto compilato, o niente + PDF).
            ======================================================== -->
            <h2 class="section-title">Dati genitori</h2>

            <!-- ====================================================
            AVVISO FORMALE DI COMPILAZIONE (punto 3 della richiesta)
            Banner ambra ben visibile, tono formale: spiega che il
            Genitore 2 va compilato SALVO le due condizioni previste.
            ==================================================== -->
            <div class="avviso" role="note">
                <div class="avviso-icon">!</div>
                <div>
                    <strong>Avviso importante per la compilazione.</strong>
                    Si prega di compilare i dati anagrafici di <strong>entrambi i genitori</strong>.
                    L&rsquo;inserimento dei dati relativi al <strong>Genitore&nbsp;2</strong> &egrave; richiesto
                    a meno che non ricorra una delle seguenti condizioni:
                    <ul>
                        <li>il <strong>Genitore&nbsp;1</strong> esercita in via esclusiva la responsabilit&agrave; genitoriale
                            sul minore (c.d. piena patria potest&agrave;, ai sensi degli artt.&nbsp;317 e&nbsp;337-quater
                            del Codice Civile);</li>
                        <li>il <strong>Genitore&nbsp;2</strong> &egrave; deceduto per cause naturali (situazione di vedovanza).</li>
                    </ul>
                    In presenza di una di tali condizioni, lasciare in bianco la colonna
                    &ldquo;Genitore&nbsp;2&rdquo;, spuntare l&rsquo;apposita casella di seguito riportata e allegare
                    la documentazione prevista. In caso contrario, la compilazione completa
                    di entrambi i gruppi di dati &egrave; condizione essenziale per la conclusione
                    dell&rsquo;iscrizione.
                </div>
            </div>

            <!-- ====================================================
            CHECKBOX DI ESCLUSIONE DEL GENITORE 2 (punto 4)
            Spuntata  -> i campi del Genitore 2 vengono DISABILITATI
                         e compare il blocco di caricamento del PDF.
            Non       -> i campi del Genitore 2 tornano abilitati e
            spuntata    obbligatori (required rimesso dal JS).
            Il valore viene inviato al server (name presente) cosi'
            il controller sapra' quale regime applicare.
            ==================================================== -->
            <div class="checkbox-group">
                <input type="checkbox" id="genitore2_escluso" name="genitore2_escluso" value="1">
                <label for="genitore2_escluso">
                    Dichiara, sotto la propria responsabilit&agrave;, che il Genitore&nbsp;2
                    <strong>non deve essere compilato</strong> perch&eacute; il Genitore&nbsp;1
                    esercita in via esclusiva la responsabilit&agrave; genitoriale sul minore
                    oppure perch&eacute; il Genitore&nbsp;2 &egrave; deceduto.
                    In tal caso, i campi del Genitore&nbsp;2 verranno disabilitati e sar&agrave;
                    necessario allegare l'apposita documentazione in formato PDF.
                </label>
            </div>

            <div class="genitori-grid">

                <!-- ================= COLONNA GENITORE 1 ================= -->
                <div class="genitore-colonna">
                    <h3>Genitore 1</h3>

                    <div class="form-group">
                        <label for="genitore1_nome">Nome</label>
                        <input type="text" id="genitore1_nome" name="genitore1_nome" placeholder="Anna" required>
                        <div class="error-message" id="genitore1_nome-error">Inserisci un nome valido (solo lettere, min. 2 caratteri)</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore1_data_nascita">Data di nascita</label>
                        <input type="date" id="genitore1_data_nascita" name="genitore1_data_nascita" required>
                        <div class="error-message" id="genitore1_data_nascita-error">Inserisci una data di nascita valida</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore1_luogo_nascita">Luogo di nascita</label>
                        <input type="text" id="genitore1_luogo_nascita" name="genitore1_luogo_nascita" placeholder="Roma (RM)" required>
                        <div class="error-message" id="genitore1_luogo_nascita-error">Inserisci un luogo di nascita valido</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore1_grado_studio">Grado di studio</label>
                        <!-- Select: opzioni statiche di presentazione -->
                        <select id="genitore1_grado_studio" name="genitore1_grado_studio" required>
                            <option value="" selected>Seleziona il grado di studio</option>
                            <option value="Licenza media">Licenza media</option>
                            <option value="Diploma di scuola superiore">Diploma di scuola superiore</option>
                            <option value="Laurea triennale">Laurea triennale</option>
                            <option value="Laurea magistrale">Laurea magistrale</option>
                            <option value="Dottorato di ricerca">Dottorato di ricerca</option>
                            <option value="Altro">Altro</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="genitore1_occupazione">Occupazione</label>
                        <input type="text" id="genitore1_occupazione" name="genitore1_occupazione" placeholder="Impiegata" required>
                        <div class="error-message" id="genitore1_occupazione-error">Inserisci un'occupazione valida</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore1_residenza">Residenza</label>
                        <input type="text" id="genitore1_residenza" name="genitore1_residenza" placeholder="Via Roma 1, Roma (RM)" required>
                        <div class="error-message" id="genitore1_residenza-error">Inserisci la residenza</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore1_telefono">Numero di telefono</label>
                        <input type="tel" id="genitore1_telefono" name="genitore1_telefono" placeholder="3331234567" maxlength="10" required>
                        <div class="error-message" id="genitore1_telefono-error">Inserisci un numero di telefono valido (max 10 cifre)</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore1_email">Indirizzo e-mail</label>
                        <input type="email" id="genitore1_email" name="genitore1_email" placeholder="anna.rossi@email.it" required>
                        <div class="error-message" id="genitore1_email-error">Inserisci un indirizzo email valido (es. nome@dominio.it)</div>
                    </div>
                </div>

                <!-- ================= COLONNA GENITORE 2 ================= -->
                <!-- Campi IDENTICI alla colonna 1: cambia solo il prefisso
                     del name/id (genitore2_), cosi' il controller riceve
                     due set distinti e confrontabili.
                     id="colonna-genitore2": appiglio per il JS che
                     abilita/disabilita l'intera colonna (punto 4).
                     required: NON presente in modo statico -> gestito
                     dal JS secondo lo stato della checkbox. -->
                <div class="genitore-colonna" id="colonna-genitore2">
                    <h3>Genitore 2</h3>

                    <div class="form-group">
                        <label for="genitore2_nome">Nome</label>
                        <input type="text" id="genitore2_nome" name="genitore2_nome" placeholder="Luca">
                        <div class="error-message" id="genitore2_nome-error">Inserisci un nome valido (solo lettere, min. 2 caratteri)</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore2_data_nascita">Data di nascita</label>
                        <input type="date" id="genitore2_data_nascita" name="genitore2_data_nascita">
                        <div class="error-message" id="genitore2_data_nascita-error">Inserisci una data di nascita valida</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore2_luogo_nascita">Luogo di nascita</label>
                        <input type="text" id="genitore2_luogo_nascita" name="genitore2_luogo_nascita" placeholder="Milano (MI)">
                        <div class="error-message" id="genitore2_luogo_nascita-error">Inserisci un luogo di nascita valido</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore2_grado_studio">Grado di studio</label>
                        <select id="genitore2_grado_studio" name="genitore2_grado_studio">
                            <option value="" selected>Seleziona il grado di studio</option>
                            <option value="Licenza media">Licenza media</option>
                            <option value="Diploma di scuola superiore">Diploma di scuola superiore</option>
                            <option value="Laurea triennale">Laurea triennale</option>
                            <option value="Laurea magistrale">Laurea magistrale</option>
                            <option value="Dottorato di ricerca">Dottorato di ricerca</option>
                            <option value="Altro">Altro</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="genitore2_occupazione">Occupazione</label>
                        <input type="text" id="genitore2_occupazione" name="genitore2_occupazione" placeholder="Libero professionista">
                        <div class="error-message" id="genitore2_occupazione-error">Inserisci un'occupazione valida</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore2_residenza">Residenza</label>
                        <input type="text" id="genitore2_residenza" name="genitore2_residenza" placeholder="Via Milano 2, Milano (MI)">
                        <div class="error-message" id="genitore2_residenza-error">Inserisci la residenza</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore2_telefono">Numero di telefono</label>
                        <input type="tel" id="genitore2_telefono" name="genitore2_telefono" placeholder="3337654321" maxlength="10">
                        <div class="error-message" id="genitore2_telefono-error">Inserisci un numero di telefono valido (max 10 cifre)</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore2_email">Indirizzo e-mail</label>
                        <input type="email" id="genitore2_email" name="genitore2_email" placeholder="luca.bianchi@email.it">
                        <div class="error-message" id="genitore2_email-error">Inserisci un indirizzo email valido (es. nome@dominio.it)</div>
                    </div>
                </div>
            </div>

            <!-- Divisore tra le sezioni -->
            <hr class="divider">

            <!-- ========================================================
            BLOCCO ALLEGATO DOCUMENTO PDF (punto 4 + punto 5)
            Nascondo di default (.upload-box senza .show): il JS lo
            mostra quando la checkbox "Genitore 2 escluso" e' spuntata
            oppure quando i campi del Genitore 2 restano in bianco.
            Il form principale ha gia' enctype="multipart/form-data",
            necessario per il trasporto del file al server.
            ======================================================== -->
            <div class="upload-box" id="blocco-allegato">
                <h2 class="section-title">Documentazione integrativa (Genitore 2 non compilato)</h2>

                <!-- Nota giuridica formale con il riferimento normativo
                     corretto (punto 5). Tono istituzionale, identico
                     lessico usato nelle norme citate. -->
                <div class="avviso avviso-info" role="note">
                    <div class="avviso-icon">&#167;</div>
                    <div>
                        Caricare un documento (in formato PDF) che attesti l&rsquo;esercizio
                        esclusivo della responsabilit&agrave; genitoriale, ai sensi degli
                        <strong>artt.&nbsp;317 e&nbsp;337-quater del Codice Civile</strong>
                        (ad esempio: certificato di morte dell&rsquo;altro genitore, provvedimento
                        del giudice, o dichiarazione sostitutiva ai sensi del
                        <strong>D.P.R.&nbsp;445/2000</strong>).
                        Si precisa che, in ambito medico-sanitario, il termine aggiornato ed
                        appropriato &egrave; <em>&ldquo;responsabilit&agrave; genitoriale&rdquo;</em>
                        (introdotto dalla L. 219/2012), preferibile alla locuzione storica
                        &ldquo;patria potest&agrave;&rdquo;; il riferimento agli artt.&nbsp;317 e
                        337-quater c.c. copre sia gli impedimenti di fatto dell&rsquo;altro
                        genitore sia i provvedimenti dell&rsquo;autorit&agrave; giudiziaria.
                    </div>
                </div>

                <!-- Campo di caricamento: accettazione lato client solo
                     PDF; il controllo reale (MIME, firma %, dimensione)
                     sara' del Model/ControlApp. name="allegato_responsabilita_genitoriale"
                     -> il controller ricevera' il file in $_FILES. -->
                <div class="form-group">
                    <label for="allegato_responsabilita_genitoriale">Documento attestante (PDF, max 5&nbsp;MB)</label>
                    <input type="file"
                           id="allegato_responsabilita_genitoriale"
                           name="allegato_responsabilita_genitoriale"
                           accept="application/pdf,.pdf">
                    <div class="error-message" id="allegato_responsabilita_genitoriale-error">
                        Allegare il documento in formato PDF richiesto dall&rsquo;avviso
                    </div>
                </div>
            </div>

            <!-- Divisore prima della fatturazione -->
            <hr class="divider">

            <!-- ========================================================
            SEZIONE 3: DATI FATTURAZIONE
            ======================================================== -->
            <h2 class="section-title">Dati di fatturazione</h2>

            <!-- Riga con due campi affiancati: nome e codice fiscale -->
            <div class="form-row">
                <div class="form-group">
                    <label for="fatturazione_nome">Nome</label>
                    <input type="text" id="fatturazione_nome" name="fatturazione_nome" placeholder="Intestatario della fattura" required>
                    <div class="error-message" id="fatturazione_nome-error">Inserisci un nome valido (solo lettere, min. 2 caratteri)</div>
                </div>
                <div class="form-group">
                    <label for="fatturazione_cf">CF (Codice Fiscale)</label>
                    <!-- pattern: 16 caratteri alfanumerici, il formato ufficiale
                         del codice fiscale italiano. E' solo un vincolo di
                         presentazione: la validazione vera (con l'alfabeto
                         di controllo) spetta al Model lato server -->
                    <input type="text" id="fatturazione_cf" name="fatturazione_cf" placeholder="RSSMRA80A01H501X" maxlength="16" pattern="[A-Za-z0-9]{16}" required>
                    <div class="error-message" id="fatturazione_cf-error">Inserisci un codice fiscale di 16 caratteri alfanumerici</div>
                </div>
            </div>

            <!-- Indirizzo -->
            <div class="form-group">
                <label for="fatturazione_indirizzo">Indirizzo</label>
                <input type="text" id="fatturazione_indirizzo" name="fatturazione_indirizzo" placeholder="Via Roma 1, Roma (RM)" required>
                <div class="error-message" id="fatturazione_indirizzo-error">Inserisci un indirizzo valido</div>
            </div>

            <!-- Indirizzo e-mail -->
            <div class="form-group">
                <label for="fatturazione_email">Indirizzo e-mail</label>
                <input type="email" id="fatturazione_email" name="fatturazione_email" placeholder="mario.rossi@email.it" required>
                <div class="error-message" id="fatturazione_email-error">Inserisci un indirizzo email valido (es. nome@dominio.it)</div>
            </div>

            <!-- ========================================================
            PULSANTI DI NAVIGAZIONE
            ======================================================== -->
            <div class="buttons">
                <!-- Pulsante Annulla: torna alla scelta del tipo di accesso -->
                <a href="/?page=login-choice" class="btn btn-cancel" id="annulla-btn">Annulla</a>
                <!-- Pulsante Registrati: invia il form al controller -->
                <button type="submit" class="btn btn-submit" id="registrati-btn">Registrati</button>
            </div>
        </form>
    </div>

    <script>
        // ============================================================
        // BLOCCO SELEZIONE - parte JS per OGNI BROWSER (4 operazioni)
        // ============================================================
        // Il CSS ha gia' coperto i 4 casi (webkit/moz/ms/standard); qui
        // le stesse difese sono ripetute a livello di EVENTO, per i
        // browser che ignorassero le proprieta' CSS o per selezioni
        // avviate con doppio clic / tripla digitazione.
        // Ogni handler e' agganciato a un browser/famiglia diversa:
        //   1. onselectstart -> Safari e Internet Explorer / Edge legacy
        //   2. mousedown     -> Chrome e Chromium-based (Opera, Edge)
        //   3. FF_domutils   -> Firefox (via getSelection)
        //   4. keydown       -> universale (Ctrl+A, Ctrl+C, tasto menu)
        // NB: NONE of this is application logic: it only affects the
        // presentation layer (what the user can highlight/copy). Data
        // validation and processing belong to Model/Controller.

        document.addEventListener('DOMContentLoaded', function () {
            // Esclusione: dentro gli input la selezione DEVE restare
            // libera, altrimenti l'utente non puo' correggere il testo.
            var isEditable = function (node) {
                while (node && node !== document) {
                    if (node.tagName === 'INPUT' || node.tagName === 'TEXTAREA' || node.tagName === 'SELECT') {
                        return true;
                    }
                    node = node.parentNode;
                }
                return false;
            };

            // 1) Browser WebKit/Blink e IE: intercetta l'evento nativo
            //    di inizio selezione.
            document.onselectstart = function (e) {
                return isEditable(e.target || e.srcElement) ? true : false;
            };

            // 2) Chrome/Chromium: blocca la drag-selection da mouse.
            document.addEventListener('mousedown', function (e) {
                if (!isEditable(e.target) && e.detail > 1) { // doppio/triplo clic
                    e.preventDefault();
                }
            }, false);

            // 3) Firefox: svuota qualsiasi selezione residua.
            document.addEventListener('mouseup', function () {
                if (!isEditable(window.getSelection().anchorNode)) {
                    window.getSelection().removeAllRanges();
                }
            }, false);

            // 4) Universale: blocca le scorciatoie da tastiera che
            //    selezionano/copiano (Ctrl+A, Ctrl+C, Ctrl+X, tasto Menu).
            document.addEventListener('keydown', function (e) {
                if (isEditable(e.target)) return; // negli input tutto libero
                var k = (e.ctrlKey || e.metaKey) ? String(e.key || '').toLowerCase() : '';
                if (k === 'a' || k === 'c' || k === 'x') e.preventDefault();
                if (e.key === 'ContextMenu') e.preventDefault();
            }, false);

            // Extra: disabilita anche copia/taglio contestuale (tasto dx).
            document.addEventListener('copy', function (e) {
                if (!isEditable(e.target)) e.preventDefault();
            }, false);
            document.addEventListener('cut', function (e) {
                if (!isEditable(e.target)) e.preventDefault();
            }, false);
        });

        // ============================================================
        // INTERATTIVITA' DI SOLA PRESENTAZIONE (punti 2, 3 e 4)
        // ------------------------------------------------------------
        // Questo blocco NON e' logica applicativa: non decide nulla dei
        // dati, non parla col server, non valida in senso definitivo.
        // Si limita a MUTARE LO STATO VISIVO di tre elementi gia'
        // presenti nella pagina (checkbox -> colonna Genitore 2 e
        // blocco PDF), esattamente come il selettore nativo del type
        // "date" o l'hover di un pulsante. La validazione che conta
        // resta quella del Model lato server (required HTML = vincolo
        // dichiarativo richiesto dal committente).
        // ============================================================
        document.addEventListener('DOMContentLoaded', function () {
            var checkbox   = document.getElementById('genitore2_escluso');
            var colonna    = document.getElementById('colonna-genitore2');
            var uploadBox  = document.getElementById('blocco-allegato');
            var form       = document.getElementById('registration-form');
            var fileInput  = document.getElementById('allegato_responsabilita_genitoriale');

            // Richiesta esplicita del committente: tutti i campi sono
            // OBBLIGATORI, eccetto la colonna Genitore 2 (facoltativa).
            // Qui raccogliamo i due set di campi per tempo.
            var campiGen2 = Array.prototype.slice.call(
                colonna.querySelectorAll('input, select')
            );

            // ---- Funzione di servizio della UI -------------------
            // Applica lo stato "escluso" (checkbox spuntata) o "attivo".
            function aggiornaStato() {
                var escluso = checkbox.checked;

                // 1) Colonna Genitore 2: disabilitata/ripristinata.
                campiGen2.forEach(function (el) {
                    el.disabled = escluso;
                    if (escluso) {
                        // Se la colonna viene spenta, si toglie anche
                        // il required: un campo disabled non verrebbe
                        // comunque controllato, ma lo togliamo per
                        // chiarezza semantica del DOM.
                        el.removeAttribute('required');
                        el.value = '';           // azzeriamo gli input
                        el.classList.remove('error');
                    } else {
                        // Ripristino: i campi tornano obbligatori,
                        // come da regola "se compili Genitore 2,
                        // devi compilarlo tutto".
                        el.setAttribute('required', 'required');
                    }
                });
                colonna.classList.toggle('disabled', escluso);

                // 2) Blocco PDF: visibile SOLO quando Genitore 2 non
                //    viene compilato (checkbox spuntata).
                uploadBox.classList.toggle('show', escluso);
                if (fileInput) {
                    fileInput.required = escluso;
                    if (!escluso) fileInput.value = '';
                }
            }

            // Lo stato iniziale rispecchia la checkbox (non spuntata
            // -> colonna attiva con required rimesso dal JS).
            aggiornaStato();
            checkbox.addEventListener('change', aggiornaStato);

            // ---- Regola di coerenza (solo feedback visivo) -------
            // "Se i campi del Genitore 2 non vengono compilati deve
            // apparire il campo PDF": lo garantiamo al submit. Se
            // nessuno dei campi Gen2 e' valorizzato e la checkbox
            // non e' spuntata, mostriamo il blocco PDF e chiediamo
            // di confermare l'esclusione. E' un aiuto all'utente:
            // la verifica definitiva sara' del ControlApp.
            form.addEventListener('submit', function (e) {
                var qualcunoPieno = campiGen2.some(function (el) {
                    return String(el.value || '').trim() !== '';
                });
                var errAllegato = document.getElementById(
                    'allegato_responsabilita_genitoriale-error'
                );

                if (!checkbox.checked && !qualcunoPieno) {
                    // Genitore 2 lasciato in bianco senza dichiarazione:
                    // forza la scelta dell'utente invece di spedire.
                    e.preventDefault();
                    checkbox.focus();
                    if (errAllegato) errAllegato.classList.add('show');
                    return;
                }
                if (errAllegato) errAllegato.classList.remove('show');
            });
        });
    </script>
</body>
</html>
