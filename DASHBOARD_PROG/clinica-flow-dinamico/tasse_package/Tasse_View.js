// [VIEW - taxes] Contiene esclusivamente la struttura grafica della funzionalità taxes.
export class Tasse_View {
    // [VIEW - taxes] Crea e restituisce la sezione grafica completa della funzionalità.
    crea() {
        // [VIEW - taxes] Crea un elemento temporaneo per convertire il markup in DOM.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - taxes] Inserisce nel contenitore la struttura grafica esistente.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page" id="taxes"> <!-- Sezione tasse; scadenze reali dal database. -->
<div class="page-heading"><div><p class="eyebrow">AMMINISTRAZIONE</p><h1>Tasse e scadenze</h1><p class="muted">Calendario fiscale e documenti per la gestione amministrativa.</p></div><button class="secondary">Esporta riepilogo</button></div> <!-- Intestazione tasse. -->
<div class="tax-alert"><span>!</span><div><strong id="taxAlertCount">—</strong><p>Controlla gli importi e coordina i versamenti con il commercialista.</p></div></div> <!-- Alert dinamico. -->
<div class="card deadline-table"><div class="card-header"><h2>Calendario fiscale</h2><select id="annoTasse"><option>Anno corrente</option></select></div><div id="listaScadenzeTasse"></div></div> <!-- Calendario dinamico. -->
</section>`;
        // [VIEW - taxes] Restituisce la sezione senza introdurre logica applicativa.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - taxes] Inserisce la View nel contenitore principale dell'applicazione.
    monta(contenitorePrincipale) {
        // [VIEW - taxes] Rimuove la precedente schermata dal contenitore.
        contenitorePrincipale.replaceChildren();
        // [VIEW - taxes] Inserisce la nuova schermata nella pagina.
        contenitorePrincipale.appendChild(this.crea());
    }
}
