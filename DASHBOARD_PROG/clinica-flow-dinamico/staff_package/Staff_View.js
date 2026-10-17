// [VIEW - team] Contiene esclusivamente la struttura grafica della funzionalità team.
export class Staff_View {
    // [VIEW - team] Crea e restituisce la sezione grafica completa della funzionalità.
    crea() {
        // [VIEW - team] Crea un elemento temporaneo per convertire il markup in DOM.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - team] Inserisce nel contenitore la struttura grafica esistente.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page" id="team"> <!-- Sezione staff; professionisti reali dal database. -->
<div class="page-heading"><div><p class="eyebrow">STRUTTURA</p><h1>Staff</h1><p class="muted">Professionisti, ruoli e autorizzazioni.</p></div><button class="primary">+ Invita professionista</button></div> <!-- Intestazione staff. -->
<div class="team-grid" id="grigliaStaff"></div> <!-- Professionisti dinamici. -->
</section>`;
        // [VIEW - team] Restituisce la sezione senza introdurre logica applicativa.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - team] Inserisce la View nel contenitore principale dell'applicazione.
    monta(contenitorePrincipale) {
        // [VIEW - team] Rimuove la precedente schermata dal contenitore.
        contenitorePrincipale.replaceChildren();
        // [VIEW - team] Inserisce la nuova schermata nella pagina.
        contenitorePrincipale.appendChild(this.crea());
    }
}
