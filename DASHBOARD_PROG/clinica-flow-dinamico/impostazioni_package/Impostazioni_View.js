// [VIEW - settings] Contiene esclusivamente la struttura grafica della funzionalità settings.
export class Impostazioni_View {
    // [VIEW - settings] Crea e restituisce la sezione grafica completa della funzionalità.
    crea() {
        // [VIEW - settings] Crea un elemento temporaneo per convertire il markup in DOM.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - settings] Inserisce nel contenitore la struttura grafica esistente.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page" id="settings"> <!-- Sezione impostazioni; valori reali dal database. -->
<div class="page-heading"><div><p class="eyebrow">STRUTTURA</p><h1>Impostazioni</h1><p class="muted">Configura struttura, profilo, notifiche e sicurezza.</p></div><button class="primary" id="salvaImpostazioni">Salva modifiche</button></div> <!-- Intestazione impostazioni. -->
<div class="settings-layout"><div class="card settings-nav"><button class="active">Profilo struttura</button><button>Notifiche</button><button>Permessi e ruoli</button><button>Fatturazione</button><button>Privacy e sicurezza</button></div><div class="card settings-form"><h2>Profilo struttura</h2><p class="muted">Informazioni visualizzate nei documenti e nelle comunicazioni.</p><label>Nome struttura<input id="inputNomeStruttura"/></label><div class="two-col"><label>Partita IVA<input id="inputPartitaIva"/></label><label>Telefono<input id="inputTelefono"/></label></div><label>Email<input id="inputEmail"/></label><label>Indirizzo<input id="inputIndirizzo"/></label></div></div> <!-- Form popolato dal database. -->
</section>`;
        // [VIEW - settings] Restituisce la sezione senza introdurre logica applicativa.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - settings] Inserisce la View nel contenitore principale dell'applicazione.
    monta(contenitorePrincipale) {
        // [VIEW - settings] Rimuove la precedente schermata dal contenitore.
        contenitorePrincipale.replaceChildren();
        // [VIEW - settings] Inserisce la nuova schermata nella pagina.
        contenitorePrincipale.appendChild(this.crea());
    }
}
