// [BEAN/DTO - Sessione] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Sessione_Bean {
    // [BEAN/DTO - Sessione] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Sessione] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
