// [BEAN/DTO - Fatturazione] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Fatturazione_Bean {
    // [BEAN/DTO - Fatturazione] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Fatturazione] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
