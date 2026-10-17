// [BEAN/DTO - Documenti] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Documenti_Bean {
    // [BEAN/DTO - Documenti] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Documenti] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
