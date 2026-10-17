// [VIEW - finance] Contiene esclusivamente la struttura grafica della funzionalità finance.
export class Fatturazione_View {
    // [VIEW - finance] Crea e restituisce la sezione grafica completa della funzionalità.
    crea() {
        // [VIEW - finance] Crea un elemento temporaneo per convertire il markup in DOM.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - finance] Inserisce nel contenitore la struttura grafica esistente.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page" id="finance"> <!-- Sezione finanze; dati reali dal database. -->
<div class="page-heading"><div><p class="eyebrow">AMMINISTRAZIONE</p><h1>Finanze e fatture</h1><p class="muted">Entrate, fatture, pagamenti e riepiloghi per il commercialista.</p></div><button class="primary" id="nuovaFattura">+ Nuova fattura</button></div> <!-- Intestazione finanze. -->
<div class="finance-stats"><div class="finance-stat"><span>Fatturato mese</span><strong id="fatturatoMese">—</strong><small id="numeroFattureMese"></small></div><div class="finance-stat"><span>Incassato</span><strong id="incassatoMese">—</strong><small class="positive" id="percentualeIncassato"></small></div><div class="finance-stat"><span>Da incassare</span><strong id="daIncassare">—</strong><small class="warning-text" id="numeroFattureAperte"></small></div><div class="finance-stat"><span>Spese</span><strong id="speseMese">—</strong><small id="periodoSpese"></small></div></div> <!-- Statistiche dinamiche. -->
<div class="card table-card"><div class="card-header"><div><h2>Ultime fatture</h2><span class="muted" id="periodoFatturazione"></span></div><button class="secondary">Esporta CSV</button></div><table><thead><tr><th>Numero</th><th>Cliente</th><th>Prestazione</th><th>Importo</th><th>Data</th><th>Stato</th></tr></thead><tbody id="listaFatture"></tbody></table></div> <!-- Tabella dinamica. -->
</section>`;
        // [VIEW - finance] Restituisce la sezione senza introdurre logica applicativa.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - finance] Inserisce la View nel contenitore principale dell'applicazione.
    monta(contenitorePrincipale) {
        // [VIEW - finance] Rimuove la precedente schermata dal contenitore.
        contenitorePrincipale.replaceChildren();
        // [VIEW - finance] Inserisce la nuova schermata nella pagina.
        contenitorePrincipale.appendChild(this.crea());
    }
}
