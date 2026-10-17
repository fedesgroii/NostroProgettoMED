// [VIEW - agenda] Contiene esclusivamente la struttura grafica della funzionalità agenda.
export class Appuntamenti_View {
    // [VIEW - agenda] Crea e restituisce la sezione grafica completa della funzionalità.
    crea() {
        // [VIEW - agenda] Crea un elemento temporaneo per convertire il markup in DOM.
        const contenitoreTemporaneo = document.createElement('div');
        // [VIEW - agenda] Inserisce nel contenitore la struttura grafica esistente.
        contenitoreTemporaneo.innerHTML = String.raw`<section class="page" id="agenda"> <!-- Sezione agenda; appuntamenti e professionisti arrivano dal database. -->
<div class="page-heading"><div><p class="eyebrow">GESTIONE</p><h1>Agenda</h1><p class="muted">Trascina un appuntamento in un altro giorno e orario libero per spostarlo.</p></div><button class="primary" id="newAppointment">+ Nuovo appuntamento</button></div> <!-- Intestazione agenda. -->
<div class="toolbar"><div class="segmented"><button class="active">Giorno</button><button>Settimana</button><button>Mese</button></div><button class="secondary">‹</button><strong id="intervalloSettimana"></strong><button class="secondary">›</button><select id="filtroProfessionista"><option value="">Tutti i professionisti</option></select></div> <!-- Controlli dinamici dell’agenda. -->
<div class="agenda-help"><span>↕</span><span><strong>Spostamento rapido:</strong> trascina un appuntamento su un altro giorno/orario.</span><span class="agenda-help-rule">Lo slot deve essere libero.</span></div> <!-- Istruzioni statiche dell'interfaccia. -->
<div class="card agenda-full"><div class="agenda-week"><div class="agenda-time-column"><div class="agenda-corner">Ora</div><div class="agenda-time-labels"><span>08:00</span><span>09:00</span><span>10:00</span><span>11:00</span><span>12:00</span><span>13:00</span><span>14:00</span><span>15:00</span><span>16:00</span><span>17:00</span><span>18:00</span><span>19:00</span></div></div><div class="agenda-days" id="agendaGiorni"></div></div></div> <!-- Griglia dinamica dell’agenda. -->
</section>`;
        // [VIEW - agenda] Restituisce la sezione senza introdurre logica applicativa.
        return contenitoreTemporaneo.firstElementChild;
    }

    // [VIEW - agenda] Inserisce la View nel contenitore principale dell'applicazione.
    monta(contenitorePrincipale) {
        // [VIEW - agenda] Rimuove la precedente schermata dal contenitore.
        contenitorePrincipale.replaceChildren();
        // [VIEW - agenda] Inserisce la nuova schermata nella pagina.
        contenitorePrincipale.appendChild(this.crea());
    }
}
