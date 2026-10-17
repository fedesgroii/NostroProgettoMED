// [BEAN/DTO - Appuntamenti] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Appuntamenti_Bean {
    // [BEAN/DTO - Appuntamenti] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Appuntamenti] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
