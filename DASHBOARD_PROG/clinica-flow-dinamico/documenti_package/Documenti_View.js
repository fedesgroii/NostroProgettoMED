// [VIEW - documents] Contiene esclusivamente la struttura grafica della funzionalità documents.
export class Documenti_View {
    // [VIEW - documents] Crea e restituisce la sezione grafica completa della funzionalità.
    crea() {
        // [VIEW - documents] Crea un elemento temporaneo per convertire il markup in DOM.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - documents] Inserisce nel contenitore la struttura grafica esistente.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page" id="documents"> <!-- Sezione documenti; dati reali dal database. -->
<div class="page-heading"><div><p class="eyebrow">ARCHIVIO</p><h1>Documenti</h1><p class="muted">Gestisci documenti amministrativi e clinici con permessi dedicati.</p></div><button class="primary" id="caricaDocumento">↑ Carica documento</button></div> <!-- Intestazione documenti. -->
<div class="document-cards"><div class="doc-stat"><span>Documenti totali</span><strong id="docTotali">—</strong></div><div class="doc-stat"><span>Da firmare</span><strong id="docDaFirmare">—</strong></div><div class="doc-stat"><span>In scadenza</span><strong id="docInScadenza">—</strong></div></div> <!-- Contatori dinamici. -->
<div class="card table-card"><table><thead><tr><th>Documento</th><th>Categoria</th><th>Paziente / struttura</th><th>Data</th><th>Stato</th><th></th></tr></thead><tbody id="listaDocumenti"></tbody></table></div> <!-- Tabella dinamica. -->
</section>`;
        // [VIEW - documents] Restituisce la sezione senza introdurre logica applicativa.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - documents] Inserisce la View nel contenitore principale dell'applicazione.
    monta(contenitorePrincipale) {
        // [VIEW - documents] Rimuove la precedente schermata dal contenitore.
        contenitorePrincipale.replaceChildren();
        // [VIEW - documents] Inserisce la nuova schermata nella pagina.
        contenitorePrincipale.appendChild(this.crea());
    }
}
