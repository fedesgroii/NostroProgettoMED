// [VIEW - reports] Contiene esclusivamente la struttura grafica della funzionalità reports.
export class Report_View {
    // [VIEW - reports] Crea e restituisce la sezione grafica completa della funzionalità.
    crea() {
        // [VIEW - reports] Crea un elemento temporaneo per convertire il markup in DOM.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - reports] Inserisce nel contenitore la struttura grafica esistente.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page" id="reports"> <!-- Sezione report; indicatori reali dal database. -->
<div class="page-heading"><div><p class="eyebrow">ANALISI</p><h1>Report</h1><p class="muted">Indicatori operativi e amministrativi della struttura.</p></div><button class="secondary">↓ Scarica report</button></div> <!-- Intestazione report. -->
<div class="report-grid" id="grigliaReport"></div> <!-- Indicatori dinamici. -->
</section>`;
        // [VIEW - reports] Restituisce la sezione senza introdurre logica applicativa.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - reports] Inserisce la View nel contenitore principale dell'applicazione.
    monta(contenitorePrincipale) {
        // [VIEW - reports] Rimuove la precedente schermata dal contenitore.
        contenitorePrincipale.replaceChildren();
        // [VIEW - reports] Inserisce la nuova schermata nella pagina.
        contenitorePrincipale.appendChild(this.crea());
    }
}
