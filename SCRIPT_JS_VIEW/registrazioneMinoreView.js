/**
 * MindLab - Script di presentazione per la vista Registrazione Minore
 * Cartella: SCRIPT_JS_VIEW/registrazioneMinoreView.js
 * Responsabilità MVC: Gestione interazioni client-side (View Presentation)
 */

// ============================================================
// 1. BLOCCO SELEZIONE - versione NON invasiva
// ============================================================
// Non usiamo più `document.onselectstart`: in Chrome/Safari/Firefox
// può impedire la collocazione del caret negli input e bloccare la
// digitazione. Ci limitiamo a scoraggiare copia/taglio/menu contestuale
// FUORI dai campi editabili, lasciando intatta la digitazione.
function initBloccoSelezione() {
    var isEditable = function (node) {
        while (node && node !== document) {
            if (node.tagName === 'INPUT' || node.tagName === 'TEXTAREA' || node.tagName === 'SELECT') {
                return true;
            }
            node = node.parentNode;
        }
        return false;
    };

    // Blocca copia/taglio solo fuori dai campi editabili
    document.addEventListener('copy', function (e) {
        if (!isEditable(e.target)) e.preventDefault();
    }, false);

    document.addEventListener('cut', function (e) {
        if (!isEditable(e.target)) e.preventDefault();
    }, false);

    // Blocca il tasto destro solo fuori dai campi editabili
    document.addEventListener('contextmenu', function (e) {
        if (!isEditable(e.target)) e.preventDefault();
    }, false);

    // Blocca Ctrl+A / Ctrl+C / Ctrl+X solo fuori dai campi
    document.addEventListener('keydown', function (e) {
        if (isEditable(e.target)) return;
        var k = (e.ctrlKey || e.metaKey) ? String(e.key || '').toLowerCase() : '';
        if (k === 'a' || k === 'c' || k === 'x') e.preventDefault();
    }, false);
}

// ============================================================
// 2. GESTIONE GENITORE 2 (Esclusione & Documento PDF)
// ============================================================
function initGenitore2() {
    var checkbox   = document.getElementById('genitore2_escluso');
    var colonna    = document.getElementById('colonna-genitore2');
    var uploadBox  = document.getElementById('blocco-allegato');
    var fileInput  = document.getElementById('allegato_responsabilita_genitoriale');

    if (!checkbox || !colonna || !uploadBox) {
        return;
    }

    var campiGen2 = Array.prototype.slice.call(
        colonna.querySelectorAll('input, select')
    );

    function aggiornaStato() {
        var escluso = checkbox.checked;

        campiGen2.forEach(function (el) {
            el.disabled = escluso;
            if (escluso) {
                el.removeAttribute('required');
                el.value = '';
                el.classList.remove('error');
            } else {
                el.setAttribute('required', 'required');
            }
        });
        colonna.classList.toggle('disabled', escluso);

        uploadBox.classList.toggle('show', escluso);
        if (fileInput) {
            fileInput.required = escluso;
            if (!escluso) fileInput.value = '';
        }
    }

    aggiornaStato();
    checkbox.addEventListener('change', aggiornaStato);
    checkbox.addEventListener('click', aggiornaStato);
}

// ============================================================
// 3. MASCHERA DATA AUTOMATICA (GG/MM/AAAA) PER TUTTI I SOGGETTI
// Inserisce automaticamente lo slash ogni due numeri
// ============================================================
function initMascheraData() {
    function applicaMaschera(idInput) {
        var input = document.getElementById(idInput);
        if (!input) return;

        input.addEventListener('input', function (e) {
            if (e.inputType === 'deleteContentBackward' || e.inputType === 'deleteContentForward') {
                return;
            }

            var cifre = input.value.replace(/\D/g, '').slice(0, 8);
            var formattato = '';

            if (cifre.length >= 4) {
                formattato = cifre.slice(0, 2) + '/' + cifre.slice(2, 4) + '/' + cifre.slice(4);
            } else if (cifre.length >= 2) {
                formattato = cifre.slice(0, 2) + '/' + cifre.slice(2);
            } else {
                formattato = cifre;
            }

            input.value = formattato;
        });

        input.addEventListener('keydown', function (e) {
            var tastiSpeciali = [
                'Backspace', 'Delete', 'Tab', 'Escape', 'Enter',
                'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown',
                'Home', 'End'
            ];
            if (tastiSpeciali.indexOf(e.key) !== -1 || e.ctrlKey || e.metaKey) {
                return;
            }
            if (!/^[0-9]$/.test(e.key)) {
                e.preventDefault();
            }
        });
    }

    applicaMaschera('minore_data_nascita');
    applicaMaschera('genitore1_data_nascita');
    applicaMaschera('genitore2_data_nascita');
}

// ============================================================
// 4. GESTIONE DATI FATTURAZIONE (PRESENTAZIONE MVC)
// - Checkbox spuntata di default -> sezione nascosta
// - Deselezionando la checkbox -> appare scelta obbligatoria "Persona fisica / Azienda"
// - Selezione Persona fisica -> visibili solo campi Persona fisica (tutti obbligatori)
// - Selezione Azienda -> visibili solo campi Azienda (tutti obbligatori)
// ============================================================
function initFatturazione() {
    var cbFatturaMinore      = document.getElementById('fattura_a_nome_minore');
    var sezioneFatturazione  = document.getElementById('sezione-dati-fatturazione');
    var radioPersona         = document.getElementById('fattura_tipo_persona');
    var radioAzienda         = document.getElementById('fattura_tipo_azienda');
    var subformPersona       = document.getElementById('subform-persona-fisica');
    var subformAzienda       = document.getElementById('subform-azienda');
    var form                 = document.getElementById('registration-form');

    if (!cbFatturaMinore || !sezioneFatturazione) {
        return;
    }

    var campiPersona = [
        document.getElementById('fatturazione_persona_nome'),
        document.getElementById('fatturazione_persona_cognome'),
        document.getElementById('fatturazione_persona_cf'),
        document.getElementById('fatturazione_persona_via'),
        document.getElementById('fatturazione_persona_civico'),
        document.getElementById('fatturazione_persona_cap'),
        document.getElementById('fatturazione_persona_citta'),
        document.getElementById('fatturazione_persona_provincia'),
        document.getElementById('fatturazione_persona_nazione')
    ].filter(Boolean);

    var campiAziendaObbligatori = [
        document.getElementById('fatturazione_azienda_ragione_sociale'),
        document.getElementById('fatturazione_azienda_via'),
        document.getElementById('fatturazione_azienda_civico'),
        document.getElementById('fatturazione_azienda_cap'),
        document.getElementById('fatturazione_azienda_citta'),
        document.getElementById('fatturazione_azienda_provincia'),
        document.getElementById('fatturazione_azienda_nazione'),
        document.getElementById('fatturazione_azienda_piva')
    ].filter(Boolean);

    var sdiInput = document.getElementById('fatturazione_azienda_sdi');
    var pecInput = document.getElementById('fatturazione_azienda_pec');

    function aggiornaStatoFatturazione() {
        var aNomeMinore = cbFatturaMinore.checked;

        if (aNomeMinore) {
            // Checkbox spuntata di default: sezione dati fatturazione completamente nascosta
            sezioneFatturazione.style.display = 'none';

            // Nessun campo o radio è obbligatorio
            if (radioPersona) radioPersona.removeAttribute('required');
            if (radioAzienda) radioAzienda.removeAttribute('required');

            if (subformPersona) {
                subformPersona.style.display = 'none';
                subformPersona.classList.remove('active');
            }
            if (subformAzienda) {
                subformAzienda.style.display = 'none';
                subformAzienda.classList.remove('active');
            }

            campiPersona.forEach(function (el) {
                el.removeAttribute('required');
                el.classList.remove('error');
            });
            campiAziendaObbligatori.forEach(function (el) {
                el.removeAttribute('required');
                el.classList.remove('error');
            });
            if (sdiInput) {
                sdiInput.removeAttribute('required');
                sdiInput.classList.remove('error');
            }
            if (pecInput) {
                pecInput.removeAttribute('required');
                pecInput.classList.remove('error');
            }
        } else {
            // Checkbox deselezionata: mostra la sezione con la scelta obbligatoria
            sezioneFatturazione.style.display = 'block';

            // La scelta Persona fisica / Azienda è obbligatoria
            if (radioPersona) radioPersona.setAttribute('required', 'required');
            if (radioAzienda) radioAzienda.setAttribute('required', 'required');

            var isPersona = radioPersona && radioPersona.checked;
            var isAzienda = radioAzienda && radioAzienda.checked;

            if (isPersona) {
                // Mostra SOLO campi Persona fisica
                if (subformPersona) {
                    subformPersona.style.display = 'block';
                    subformPersona.classList.add('active');
                }
                if (subformAzienda) {
                    subformAzienda.style.display = 'none';
                    subformAzienda.classList.remove('active');
                }

                // Rendi obbligatori tutti i campi di Persona fisica
                campiPersona.forEach(function (el) {
                    el.setAttribute('required', 'required');
                });

                // Rimuovi required da Azienda
                campiAziendaObbligatori.forEach(function (el) {
                    el.removeAttribute('required');
                    el.classList.remove('error');
                });
                if (sdiInput) {
                    sdiInput.removeAttribute('required');
                    sdiInput.classList.remove('error');
                }
                if (pecInput) {
                    pecInput.removeAttribute('required');
                    pecInput.classList.remove('error');
                }
            } else if (isAzienda) {
                // Mostra SOLO campi Azienda
                if (subformPersona) {
                    subformPersona.style.display = 'none';
                    subformPersona.classList.remove('active');
                }
                if (subformAzienda) {
                    subformAzienda.style.display = 'block';
                    subformAzienda.classList.add('active');
                }

                // Rendi obbligatori tutti i campi di Azienda
                campiAziendaObbligatori.forEach(function (el) {
                    el.setAttribute('required', 'required');
                });

                // Rimuovi required da Persona fisica
                campiPersona.forEach(function (el) {
                    el.removeAttribute('required');
                    el.classList.remove('error');
                });
            } else {
                // Nessuna opzione ancora scelta: mostra solo i radiobutton
                if (subformPersona) {
                    subformPersona.style.display = 'none';
                    subformPersona.classList.remove('active');
                }
                if (subformAzienda) {
                    subformAzienda.style.display = 'none';
                    subformAzienda.classList.remove('active');
                }

                campiPersona.forEach(function (el) {
                    el.removeAttribute('required');
                    el.classList.remove('error');
                });
                campiAziendaObbligatori.forEach(function (el) {
                    el.removeAttribute('required');
                    el.classList.remove('error');
                });
                if (sdiInput) sdiInput.removeAttribute('required');
                if (pecInput) pecInput.removeAttribute('required');
            }
        }
    }

    // Ascolto eventi sia change che click per massima reattività cross-browser
    cbFatturaMinore.addEventListener('change', aggiornaStatoFatturazione);
    cbFatturaMinore.addEventListener('click', aggiornaStatoFatturazione);

    if (radioPersona) {
        radioPersona.addEventListener('change', aggiornaStatoFatturazione);
        radioPersona.addEventListener('click', aggiornaStatoFatturazione);
    }
    if (radioAzienda) {
        radioAzienda.addEventListener('change', aggiornaStatoFatturazione);
        radioAzienda.addEventListener('click', aggiornaStatoFatturazione);
    }

    // Controllo SDI / PEC: obbligatorio almeno uno dei due se Azienda
    if (form) {
        form.addEventListener('submit', function (e) {
            if (!cbFatturaMinore.checked && radioAzienda && radioAzienda.checked) {
                var sdiVal = (sdiInput ? sdiInput.value : '').trim();
                var pecVal = (pecInput ? pecInput.value : '').trim();
                var errPec = document.getElementById('fatturazione_azienda_pec-error');

                if (!sdiVal && !pecVal) {
                    e.preventDefault();
                    if (pecInput) {
                        pecInput.focus();
                        pecInput.classList.add('error');
                    }
                    if (sdiInput) {
                        sdiInput.classList.add('error');
                    }
                    if (errPec) {
                        errPec.textContent = 'Indicare obbligatoriamente almeno uno tra Codice Destinatario SDI e indirizzo PEC';
                        errPec.classList.add('show');
                    }
                } else if (errPec) {
                    errPec.classList.remove('show');
                }
            }
        });
    }

    // Inizializza lo stato
    aggiornaStatoFatturazione();
}

// ============================================================
// BOOTSTRAP: Esecuzione garantita al caricamento del DOM
// ============================================================
function initView() {
    initBloccoSelezione();
    initGenitore2();
    initMascheraData();
    initFatturazione();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initView);
} else {
    initView();
}
