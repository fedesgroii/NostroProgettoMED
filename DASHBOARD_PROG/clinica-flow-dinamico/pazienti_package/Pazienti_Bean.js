// [BEAN/DTO - Pazienti] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Pazienti_Bean {
    // [BEAN/DTO - Pazienti] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Pazienti] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
