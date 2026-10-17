// [BEAN/DTO - Notifiche] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class Notifiche_Bean {
    // [BEAN/DTO - Notifiche] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - Notifiche] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
