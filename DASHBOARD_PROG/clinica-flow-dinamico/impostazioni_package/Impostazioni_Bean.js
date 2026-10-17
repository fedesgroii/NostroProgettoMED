// [BEAN/DTO - Impostazioni] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Impostazioni_Bean {
    // [BEAN/DTO - Impostazioni] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Impostazioni] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
