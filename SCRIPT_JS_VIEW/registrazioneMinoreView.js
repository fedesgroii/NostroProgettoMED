/**
 * MindLab - Script di presentazione per la vista Registrazione Minore
 * Cartella: SCRIPT_JS_VIEW/registrazioneMinoreView.js
 * Responsabilità MVC: Gestione interazioni client-side (View Presentation)
 */

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

    if (!checkbox || !colonna || !uploadBox || !form) {
        return;
    }

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
