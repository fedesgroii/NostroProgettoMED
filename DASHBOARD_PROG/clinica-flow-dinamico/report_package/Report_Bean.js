// [BEAN/DTO - Report] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Report_Bean {
    // [BEAN/DTO - Report] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Report] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
