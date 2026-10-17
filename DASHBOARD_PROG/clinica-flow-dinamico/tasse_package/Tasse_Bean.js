// [BEAN/DTO - Tasse] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Tasse_Bean {
    // [BEAN/DTO - Tasse] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Tasse] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
