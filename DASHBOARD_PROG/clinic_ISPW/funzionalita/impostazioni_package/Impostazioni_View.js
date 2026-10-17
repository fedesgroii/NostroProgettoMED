window.ClinicaFlow.impostazioni_package = window.ClinicaFlow.impostazioni_package || {};

// [VIEW - Impostazioni] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.impostazioni_package.Impostazioni_View = class Impostazioni_View {

  // [VIEW - Impostazioni] Costruisce il pannello impostazioni e il form della struttura.
  render(settings) {
    // [VIEW - Impostazioni] Restituisce il markup con valori provenienti dal Model.
    return `
      <!-- [VIEW - Impostazioni] Sezione configurazione. -->
      <section class="page" id="settings">
        <!-- [VIEW - Impostazioni > Intestazione] Titolo e salvataggio. -->
        <div class="page-heading"><div><p class="eyebrow">STRUTTURA</p><h1>Impostazioni</h1><p class="muted">Configura struttura, profilo, notifiche e sicurezza.</p></div><button class="primary">Salva modifiche</button></div>
        <!-- [VIEW - Impostazioni] Layout della pagina. -->
        <div class="settings-layout">
          <!-- [VIEW - Impostazioni > Navigazione] Voci del pannello. -->
          <div class="card settings-nav"><button class="active">Profilo struttura</button><button>Notifiche</button><button>Permessi e ruoli</button><button>Fatturazione</button><button>Privacy e sicurezza</button></div>
          <!-- [VIEW - Impostazioni > Profilo struttura] Form. -->
          <div class="card settings-form">
            <!-- [VIEW - Impostazioni > Profilo struttura] Titolo. -->
            <h2>Profilo struttura</h2>
            <!-- [VIEW - Impostazioni > Profilo struttura] Descrizione. -->
            <p class="muted">Informazioni visualizzate nei documenti e nelle comunicazioni.</p>
            <!-- [VIEW - Impostazioni > Profilo struttura] Nome struttura. -->
            <label>Nome struttura<input value="${settings.name}"></label>
            <!-- [VIEW - Impostazioni > Profilo struttura] Partita IVA e telefono. -->
            <div class="two-col"><label>Partita IVA<input value="${settings.vat}"></label><label>Telefono<input value="${settings.phone}"></label></div>
            <!-- [VIEW - Impostazioni > Profilo struttura] Email. -->
            <label>Email<input value="${settings.email}"></label>
            <!-- [VIEW - Impostazioni > Profilo struttura] Indirizzo. -->
            <label>Indirizzo<input value="${settings.address}"></label>
          </div>
        </div>
      </section>`;
  }

};
