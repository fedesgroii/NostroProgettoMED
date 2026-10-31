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
    <link rel="icon" type="image/x-icon" href="/Logo/logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/Logo/logo.ico">
    <link rel="apple-touch-icon" href="/Logo/logo.png">
    <!-- Font Inter: lo stesso usato nelle pagine paziente, per coerenza visiva -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Foglio di stile esterno (Separazione MVC View) -->
    <link rel="stylesheet" href="/STILI_CSS_VIEW/registrazioneMinoreView.css?v=<?= time() ?>">
</head>


<body>
    <div class="container">
        <!-- ============================================================
        INTESTAZIONE
        ============================================================ -->
        <div class="header">
            <!-- Logo ufficiale del progetto: file nel repository,
                 cartella /Logo/) -->
            <img src="/Logo/logo.png" alt="MindLab Logo">
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
            SEZIONE 1: DATI ANAGRAFICI MINORE (EVIDENZIATA E DISTINTA)
            ======================================================== -->
            <div class="sezione-minore-card">
                <div class="minore-header-row">
                    <span class="badge-minore">PAZIENTE MINORENNE</span>
                    <h2 class="section-title-minore">Dati anagrafici del Minore</h2>
                </div>

                <!-- Riga con due campi affiancati: nome e cognome -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="minore_nome">Nome del Minore</label>
                        <input type="text" id="minore_nome" name="minore_nome" placeholder="Mario" required>
                        <div class="error-message" id="minore_nome-error">Inserisci un nome valido (solo lettere, min. 2 caratteri)</div>
                    </div>
                    <div class="form-group">
                        <label for="minore_cognome">Cognome del Minore</label>
                        <input type="text" id="minore_cognome" name="minore_cognome" placeholder="Rossi" required>
                        <div class="error-message" id="minore_cognome-error">Inserisci un cognome valido (solo lettere, min. 2 caratteri)</div>
                    </div>
                </div>

                <!-- Riga con due campi affiancati: data di nascita ed eta' -->
                <div class="form-row form-row-nascita-eta">
                    <div class="form-group">
                        <label for="minore_data_nascita">Data di Nascita del Minore</label>
                        <!-- Formato italiano GG/MM/AAAA con inserimento automatico dello slash via JS -->
                        <input type="text"
                               inputmode="numeric"
                               id="minore_data_nascita"
                               name="minore_data_nascita"
                               placeholder="GG/MM/AAAA"
                               maxlength="10"
                               pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}"
                               autocomplete="bday"
                               required>
                        <div class="error-message" id="minore_data_nascita-error">Inserisci una data di nascita valida (GG/MM/AAAA)</div>
                    </div>
                    <div class="form-group">
                        <label for="minore_eta">Eta'</label>
                        <!-- inputmode="numeric": su mobile apre la tastiera numerica -->
                        <input type="text" inputmode="numeric" id="minore_eta" name="minore_eta" placeholder="Es. 14" maxlength="3" required>
                        <div class="error-message" id="minore_eta-error">Inserisci un'eta' valida (numero)</div>
                    </div>
                </div>

                <!-- Riga affiancata: Luogo di nascita e Codice Fiscale del Minore -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="minore_luogo_nascita">Luogo di Nascita del Minore</label>
                        <input type="text" id="minore_luogo_nascita" name="minore_luogo_nascita" placeholder="Roma (RM)" required>
                        <div class="error-message" id="minore_luogo_nascita-error">Inserisci un luogo di nascita valido</div>
                    </div>
                    <div class="form-group">
                        <label for="minore_cf">Codice Fiscale del Minore</label>
                        <input type="text" id="minore_cf" name="minore_cf" placeholder="RSSMRA10H15H501Y" maxlength="16" pattern="[A-Za-z0-9]{16}" style="text-transform: uppercase;" required>
                        <div class="error-message" id="minore_cf-error">Inserisci un codice fiscale valido (16 caratteri alfanumerici)</div>
                    </div>
                </div>

                <!-- Riga con tre campi: classe, scuola, sport -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="minore_classe">Classe</label>
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
                        <input type="text" id="minore_sport" name="minore_sport" placeholder="Calcio, nuoto, ..., Nessuno" required>
                        <div class="error-message" id="minore_sport-error">Inserisci lo sport praticato</div>
                    </div>
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
                    <strong>Avviso importante per la compilazione.</strong><br>
                    Si prega di compilare i dati anagrafici di <strong>entrambi i genitori</strong>.
                    L&rsquo;inserimento dei dati relativi al <strong>Genitore&nbsp;2</strong> &egrave; richiesto
                    a meno che non ricorra una delle seguenti condizioni:<br>
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
                    oppure perch&eacute; il Genitore&nbsp;2 &egrave; deceduto.<br>
                    In tal caso, i campi del Genitore&nbsp;2 verranno disabilitati e sar&agrave;
                    necessario allegare l'apposita documentazione in formato PDF.
                </label>
            </div>

            <div class="genitori-grid">

                <!-- ================= COLONNA GENITORE 1 ================= -->
                <div class="genitore-colonna">
                    <h3>Genitore 1</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="genitore1_nome">Nome</label>
                            <input type="text" id="genitore1_nome" name="genitore1_nome" placeholder="Anna" required>
                            <div class="error-message" id="genitore1_nome-error">Inserisci un nome valido (solo lettere, min. 2 caratteri)</div>
                        </div>
                        <div class="form-group">
                            <label for="genitore1_cognome">Cognome</label>
                            <input type="text" id="genitore1_cognome" name="genitore1_cognome" placeholder="Rossi" required>
                            <div class="error-message" id="genitore1_cognome-error">Inserisci un cognome valido (solo lettere, min. 2 caratteri)</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="genitore1_cf">Codice Fiscale</label>
                        <input type="text" id="genitore1_cf" name="genitore1_cf" placeholder="RSSNNA75C41H501Z" maxlength="16" pattern="[A-Za-z0-9]{16}" style="text-transform: uppercase;" required>
                        <div class="error-message" id="genitore1_cf-error">Inserisci un codice fiscale valido (16 caratteri alfanumerici)</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore1_data_nascita">Data di nascita</label>
                        <!-- Formato italiano GG/MM/AAAA con inserimento automatico dello slash via JS -->
                        <input type="text"
                               inputmode="numeric"
                               id="genitore1_data_nascita"
                               name="genitore1_data_nascita"
                               placeholder="GG/MM/AAAA"
                               maxlength="10"
                               pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}"
                               autocomplete="bday"
                               required>
                        <div class="error-message" id="genitore1_data_nascita-error">Inserisci una data di nascita valida (GG/MM/AAAA)</div>
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

                    <div class="form-row">
                        <div class="form-group">
                            <label for="genitore2_nome">Nome</label>
                            <input type="text" id="genitore2_nome" name="genitore2_nome" placeholder="Luca">
                            <div class="error-message" id="genitore2_nome-error">Inserisci un nome valido (solo lettere, min. 2 caratteri)</div>
                        </div>
                        <div class="form-group">
                            <label for="genitore2_cognome">Cognome</label>
                            <input type="text" id="genitore2_cognome" name="genitore2_cognome" placeholder="Bianchi">
                            <div class="error-message" id="genitore2_cognome-error">Inserisci un cognome valido (solo lettere, min. 2 caratteri)</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="genitore2_cf">Codice Fiscale</label>
                        <input type="text" id="genitore2_cf" name="genitore2_cf" placeholder="BNCLCU72A01F205W" maxlength="16" pattern="[A-Za-z0-9]{16}" style="text-transform: uppercase;">
                        <div class="error-message" id="genitore2_cf-error">Inserisci un codice fiscale valido (16 caratteri alfanumerici)</div>
                    </div>

                    <div class="form-group">
                        <label for="genitore2_data_nascita">Data di nascita</label>
                        <!-- Formato italiano GG/MM/AAAA con inserimento automatico dello slash via JS -->
                        <input type="text"
                               inputmode="numeric"
                               id="genitore2_data_nascita"
                               name="genitore2_data_nascita"
                               placeholder="GG/MM/AAAA"
                               maxlength="10"
                               pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}"
                               autocomplete="bday">
                        <div class="error-message" id="genitore2_data_nascita-error">Inserisci una data di nascita valida (GG/MM/AAAA)</div>
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

            <!-- Checkbox di default: consenso a fatturare a nome del minore -->
            <div class="checkbox-group checkbox-fattura-minore">
                <input type="checkbox" id="fattura_a_nome_minore" name="fattura_a_nome_minore" value="1" checked>
                <label for="fattura_a_nome_minore">
                    L'utente d&agrave; l'esplicito consenso di fatturare a nome del minore, facendo comunque rimanere valida la possibilit&agrave; di scaricare la fattura dalle tasse (&egrave; solo una comodit&agrave; per lo specialista).
                </label>
            </div>

            <!-- Sezione dati fatturazione: nascosta di default se la checkbox è spuntata -->
            <div id="sezione-dati-fatturazione" class="billing-choice-box" style="display: none;">
                <!-- Controllo obbligatorio: Intestatario fattura -->
                <div class="form-group">
                    <label id="label-intestatario-fattura" class="intestatario-label">
                        Intestatario fattura <span class="required-star" aria-hidden="true">*</span>
                    </label>
                    <div class="billing-type-radios" role="radiogroup" aria-labelledby="label-intestatario-fattura">
                        <label class="radio-label">
                            <input type="radio" id="fattura_tipo_persona" name="tipo_intestatario_fattura" value="persona">
                            <span>Persona fisica</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" id="fattura_tipo_azienda" name="tipo_intestatario_fattura" value="azienda">
                            <span>Azienda / Partita IVA</span>
                        </label>
                    </div>
                </div>

                <!-- ================= SOTTOSEZIONE: PERSONA FISICA ================= -->
                <div id="subform-persona-fisica" class="billing-subform" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fatturazione_persona_nome">Nome <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_persona_nome" name="fatturazione_persona_nome" placeholder="Mario">
                            <div class="error-message" id="fatturazione_persona_nome-error">Inserisci il nome</div>
                        </div>
                        <div class="form-group">
                            <label for="fatturazione_persona_cognome">Cognome <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_persona_cognome" name="fatturazione_persona_cognome" placeholder="Rossi">
                            <div class="error-message" id="fatturazione_persona_cognome-error">Inserisci il cognome</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fatturazione_persona_cf">Codice Fiscale <span class="required-star" aria-hidden="true">*</span></label>
                        <input type="text" id="fatturazione_persona_cf" name="fatturazione_persona_cf" placeholder="RSSMRA80A01H501X" maxlength="16" pattern="[A-Za-z0-9]{16}" style="text-transform: uppercase;">
                        <div class="error-message" id="fatturazione_persona_cf-error">Inserisci un codice fiscale valido (16 caratteri alfanumerici)</div>
                    </div>

                    <!-- Indirizzo di residenza completo -->
                    <div class="form-row">
                        <div class="form-group form-group-flex-3">
                            <label for="fatturazione_persona_via">Indirizzo di residenza: Via/Piazza <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_persona_via" name="fatturazione_persona_via" placeholder="Via Roma">
                            <div class="error-message" id="fatturazione_persona_via-error">Inserisci la via o piazza</div>
                        </div>
                        <div class="form-group form-group-flex-1">
                            <label for="fatturazione_persona_civico">Numero civico <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_persona_civico" name="fatturazione_persona_civico" placeholder="10">
                            <div class="error-message" id="fatturazione_persona_civico-error">Inserisci il numero civico</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group form-group-flex-1">
                            <label for="fatturazione_persona_cap">CAP <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" inputmode="numeric" id="fatturazione_persona_cap" name="fatturazione_persona_cap" placeholder="00100" maxlength="5" pattern="[0-9]{5}">
                            <div class="error-message" id="fatturazione_persona_cap-error">Inserisci il CAP (5 cifre)</div>
                        </div>
                        <div class="form-group form-group-flex-2">
                            <label for="fatturazione_persona_citta">Citt&agrave; <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_persona_citta" name="fatturazione_persona_citta" placeholder="Roma">
                            <div class="error-message" id="fatturazione_persona_citta-error">Inserisci la citt&agrave;</div>
                        </div>
                        <div class="form-group form-group-flex-1">
                            <label for="fatturazione_persona_provincia">Provincia <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_persona_provincia" name="fatturazione_persona_provincia" placeholder="RM" maxlength="2" pattern="[A-Za-z]{2}" style="text-transform: uppercase;">
                            <div class="error-message" id="fatturazione_persona_provincia-error">Sigla prov.</div>
                        </div>
                        <div class="form-group form-group-flex-2">
                            <label for="fatturazione_persona_nazione">Nazione <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_persona_nazione" name="fatturazione_persona_nazione" value="Italia" placeholder="Italia">
                            <div class="error-message" id="fatturazione_persona_nazione-error">Inserisci la nazione</div>
                        </div>
                    </div>
                </div>

                <!-- ================= SOTTOSEZIONE: AZIENDA / PARTITA IVA ================= -->
                <div id="subform-azienda" class="billing-subform" style="display: none;">
                    <div class="form-group">
                        <label for="fatturazione_azienda_ragione_sociale">Denominazione / Ragione Sociale <span class="required-star" aria-hidden="true">*</span></label>
                        <input type="text" id="fatturazione_azienda_ragione_sociale" name="fatturazione_azienda_ragione_sociale" placeholder="Es. Rossi & Co. S.r.l.">
                        <div class="error-message" id="fatturazione_azienda_ragione_sociale-error">Inserisci la denominazione o ragione sociale</div>
                    </div>

                    <!-- Indirizzo della sede legale completo -->
                    <div class="form-row">
                        <div class="form-group form-group-flex-3">
                            <label for="fatturazione_azienda_via">Sede legale: Via/Piazza <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_azienda_via" name="fatturazione_azienda_via" placeholder="Via Dante">
                            <div class="error-message" id="fatturazione_azienda_via-error">Inserisci la via o piazza</div>
                        </div>
                        <div class="form-group form-group-flex-1">
                            <label for="fatturazione_azienda_civico">Numero civico <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_azienda_civico" name="fatturazione_azienda_civico" placeholder="25">
                            <div class="error-message" id="fatturazione_azienda_civico-error">Inserisci il numero civico</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group form-group-flex-1">
                            <label for="fatturazione_azienda_cap">CAP <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" inputmode="numeric" id="fatturazione_azienda_cap" name="fatturazione_azienda_cap" placeholder="20121" maxlength="5" pattern="[0-9]{5}">
                            <div class="error-message" id="fatturazione_azienda_cap-error">Inserisci il CAP (5 cifre)</div>
                        </div>
                        <div class="form-group form-group-flex-2">
                            <label for="fatturazione_azienda_citta">Citt&agrave; <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_azienda_citta" name="fatturazione_azienda_citta" placeholder="Milano">
                            <div class="error-message" id="fatturazione_azienda_citta-error">Inserisci la citt&agrave;</div>
                        </div>
                        <div class="form-group form-group-flex-1">
                            <label for="fatturazione_azienda_provincia">Provincia <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_azienda_provincia" name="fatturazione_azienda_provincia" placeholder="MI" maxlength="2" pattern="[A-Za-z]{2}" style="text-transform: uppercase;">
                            <div class="error-message" id="fatturazione_azienda_provincia-error">Sigla prov.</div>
                        </div>
                        <div class="form-group form-group-flex-2">
                            <label for="fatturazione_azienda_nazione">Nazione <span class="required-star" aria-hidden="true">*</span></label>
                            <input type="text" id="fatturazione_azienda_nazione" name="fatturazione_azienda_nazione" value="Italia" placeholder="Italia">
                            <div class="error-message" id="fatturazione_azienda_nazione-error">Inserisci la nazione</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fatturazione_azienda_piva">Partita IVA (11 cifre) <span class="required-star" aria-hidden="true">*</span></label>
                        <input type="text" inputmode="numeric" id="fatturazione_azienda_piva" name="fatturazione_azienda_piva" placeholder="12345678901" maxlength="11" pattern="[0-9]{11}">
                        <div class="error-message" id="fatturazione_azienda_piva-error">Inserisci una Partita IVA italiana valida (11 cifre)</div>
                    </div>

                    <!-- Codice Destinatario o PEC (obbligatorio uno dei due) -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fatturazione_azienda_sdi">Codice Destinatario SDI</label>
                            <input type="text" id="fatturazione_azienda_sdi" name="fatturazione_azienda_sdi" placeholder="Es. M5UXCR1 (o 0000000)" maxlength="7" pattern="[A-Za-z0-9]{7}" style="text-transform: uppercase;">
                            <div class="error-message" id="fatturazione_azienda_sdi-error">Codice SDI di 7 caratteri</div>
                        </div>
                        <div class="form-group">
                            <label for="fatturazione_azienda_pec">Indirizzo PEC</label>
                            <input type="email" id="fatturazione_azienda_pec" name="fatturazione_azienda_pec" placeholder="azienda@pec.it">
                            <div class="error-message" id="fatturazione_azienda_pec-error">Inserisci un indirizzo PEC valido</div>
                        </div>
                    </div>
                    <span class="help-text">Obbligatorio compilare almeno uno tra Codice Destinatario SDI e indirizzo PEC.</span>
                </div>
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

    <!-- Script esterno (Separazione MVC View) -->
    <script src="/SCRIPT_JS_VIEW/registrazioneMinoreView.js?v=<?= time() ?>" defer></script>
</body>
</html>
