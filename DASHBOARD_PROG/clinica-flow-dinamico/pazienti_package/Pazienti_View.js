// [VIEW - patients] Contiene esclusivamente la struttura grafica della funzionalità patients.
export class Pazienti_View {
    // [VIEW - patients] Crea e restituisce la sezione grafica completa della funzionalità.
    crea() {
        // [VIEW - patients] Crea un elemento temporaneo per convertire il markup in DOM.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - patients] Inserisce nel contenitore la struttura grafica esistente.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page" id="patients"> <!-- Sezione pazienti; anagrafiche reali dal database. -->
<div class="page-heading"><div><p class="eyebrow">ASSISTITI</p><h1>Pazienti</h1><p class="muted">Anagrafica, contatti e percorso assistenziale.</p></div><button class="primary" id="newPatient">+ Nuovo paziente</button></div> <!-- Intestazione pazienti. -->
<div class="filters"><div class="search"><span>⌕</span><input id="cercaPazienti" placeholder="Cerca per nome, codice o telefono..."/></div><select id="filtroProfessionistaPazienti"><option value="">Tutti i professionisti</option></select><select id="filtroStatoPazienti"><option value="">Stato: tutti</option></select></div> <!-- Filtri dinamici. -->
<div class="card table-card"><table><thead><tr><th>Paziente</th><th>Professionista</th><th>Ultima visita</th><th>Prossimo appuntamento</th><th>Stato</th><th></th></tr></thead><tbody id="listaPazienti"></tbody></table></div> <!-- Tabella popolata dal ControllerGrafico. -->
</section>`;
        // [VIEW - patients] Restituisce la sezione senza introdurre logica applicativa.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - patients] Inserisce la View nel contenitore principale dell'applicazione.
    monta(contenitorePrincipale) {
        // [VIEW - patients] Rimuove la precedente schermata dal contenitore.
        contenitorePrincipale.replaceChildren();
        // [VIEW - patients] Inserisce la nuova schermata nella pagina.
        contenitorePrincipale.appendChild(this.crea());
    }
}
