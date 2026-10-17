// [BEAN/DTO - Staff] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Staff_Bean {
    // [BEAN/DTO - Staff] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Staff] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
