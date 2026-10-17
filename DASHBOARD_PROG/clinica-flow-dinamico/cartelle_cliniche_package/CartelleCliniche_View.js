// [VIEW - clinical] Contiene esclusivamente la struttura grafica della funzionalità clinical.
export class CartelleCliniche_View {
    // [VIEW - clinical] Crea e restituisce la sezione grafica completa della funzionalità.
    crea() {
        // [VIEW - clinical] Crea un elemento temporaneo per convertire il markup in DOM.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - clinical] Inserisce nel contenitore la struttura grafica esistente.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page" id="clinical"> <!-- Sezione clinica; dati reali dal database. -->
<div class="page-heading"><div><p class="eyebrow">AREA CLINICA</p><h1>Cartelle cliniche</h1><p class="muted">Note, anamnesi, piani terapeutici e documentazione assistenziale.</p></div><button class="primary" id="nuovaNotaClinica">+ Nuova nota</button></div> <!-- Intestazione clinica. -->
<div class="clinical-layout"><div class="card patient-selector"><div class="search"><span>⌕</span><input id="cercaPazientiClinici" placeholder="Cerca paziente..."/></div><div class="patient-list" id="listaPazientiClinici"></div></div><div class="card clinical-detail"><div class="patient-header"><div class="avatar large pastel" id="cartellaPazienteAvatar"></div><div><h2 id="cartellaPazienteNome"></h2><span id="cartellaPazienteInfo"></span></div><button class="secondary">Apri scheda completa</button></div><div class="tabs"><button class="active">Note cliniche</button><button>Anamnesi</button><button>Piano terapeutico</button><button>Allegati</button></div><div id="listaNoteCliniche"></div></div></div> <!-- Contenuti clinici dinamici. -->
</section>`;
        // [VIEW - clinical] Restituisce la sezione senza introdurre logica applicativa.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - clinical] Inserisce la View nel contenitore principale dell'applicazione.
    monta(contenitorePrincipale) {
        // [VIEW - clinical] Rimuove la precedente schermata dal contenitore.
        contenitorePrincipale.replaceChildren();
        // [VIEW - clinical] Inserisce la nuova schermata nella pagina.
        contenitorePrincipale.appendChild(this.crea());
    }
}
