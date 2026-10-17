// [CONTROLLER GRAFICO - Navigazione] Gestisce esclusivamente la navigazione visuale tra le schermate.
export class Navigazione_ControlGrafico {
    // [CONTROLLER GRAFICO - Navigazione] Riceve il contenitore delle pagine e il titolo del breadcrumb.
    constructor(contenitorePagine, elementoTitolo) {
        // [CONTROLLER GRAFICO - Navigazione] Memorizza il contenitore delle View.
        this.contenitorePagine = contenitorePagine;
        // [CONTROLLER GRAFICO - Navigazione] Memorizza il titolo della schermata corrente.
        this.elementoTitolo = elementoTitolo;
        // [CONTROLLER GRAFICO - Navigazione] Memorizza le rotte applicative disponibili.
        this.rotte = {};
        // [CONTROLLER GRAFICO - Navigazione] Associa i titoli mostrati nel breadcrumb agli identificativi delle pagine.
        this.titoli = { dashboard:'Dashboard', agenda:'Agenda', patients:'Pazienti', clinical:'Cartelle cliniche', documents:'Documenti', finance:'Finanze e fatture', taxes:'Tasse e scadenze', reports:'Report', team:'Staff', settings:'Impostazioni' };
    }

    // [CONTROLLER GRAFICO - Navigazione] Registra una View e il relativo ControllerGrafico per una pagina.
    registra(idPagina, controllerGrafico) {
        // [CONTROLLER GRAFICO - Navigazione] Salva il controller associato alla rotta.
        this.rotte[idPagina] = controllerGrafico;
    }

    // [CONTROLLER GRAFICO - Navigazione] Collega i click delle voci della sidebar.
    collegaVociSidebar() {
        // [CONTROLLER GRAFICO - Navigazione] Recupera tutte le voci del menu laterale.
        document.querySelectorAll('.nav-item').forEach(voce => {
            // [CONTROLLER GRAFICO - Navigazione] Collega l'evento click alla rotta corrispondente.
            voce.addEventListener('click', () => this.apri(voce.dataset.page, voce));
        });
    }

    // [CONTROLLER GRAFICO - Navigazione] Collega le azioni rapide alle relative pagine.
    collegaAzioniRapide() {
        // [CONTROLLER GRAFICO - Navigazione] Gestisce anche i pulsanti caricati successivamente dalle View.
        this.contenitorePagine.addEventListener('click', evento => {
            // [CONTROLLER GRAFICO - Navigazione] Cerca l'azione di pagina partendo dall'elemento cliccato.
            const pulsante = evento.target.closest('[data-page-action]');
            // [CONTROLLER GRAFICO - Navigazione] Ignora i click che non rappresentano azioni di navigazione.
            if (!pulsante) return;
            // [CONTROLLER GRAFICO - Navigazione] Apre la pagina indicata dall'attributo data-page-action.
            this.apri(pulsante.dataset.pageAction, document.querySelector(`.nav-item[data-page="${pulsante.dataset.pageAction}"]`));
        });
    }

    // [CONTROLLER GRAFICO - Navigazione] Apre la schermata richiesta.
    async apri(idPagina, voceSelezionata = null) {
        // [CONTROLLER GRAFICO - Navigazione] Recupera il controller grafico della funzionalità.
        const controller = this.rotte[idPagina];
        // [CONTROLLER GRAFICO - Navigazione] Interrompe la navigazione quando la rotta non esiste.
        if (!controller) return;
        // [CONTROLLER GRAFICO - Navigazione] Chiede al controller grafico di mostrare la propria View.
        await controller.apri(this.contenitorePagine);
        // [CONTROLLER GRAFICO - Navigazione] Aggiorna il breadcrumb.
        if (this.elementoTitolo) this.elementoTitolo.textContent = this.titoli[idPagina] || idPagina;
        // [CONTROLLER GRAFICO - Navigazione] Aggiorna visivamente la voce attiva.
        document.querySelectorAll('.nav-item').forEach(voce => voce.classList.toggle('active', voce === voceSelezionata || voce.dataset.page === idPagina));
        // [CONTROLLER GRAFICO - Navigazione] Chiude la sidebar su dispositivi mobili.
        document.getElementById('sidebar')?.classList.remove('open');
    }
}
