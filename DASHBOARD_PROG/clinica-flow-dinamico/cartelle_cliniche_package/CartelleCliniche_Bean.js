// [BEAN/DTO - CartelleCliniche] Incapsula i dati trasferiti tra ControllerGrafico e backend.
export class CartelleCliniche_Bean {
    // [BEAN/DTO - CartelleCliniche] Costruisce il DTO senza creare dati fittizi.
    constructor(dati = {}) {
        // [BEAN/DTO - CartelleCliniche] Copia nel DTO esclusivamente il payload ricevuto.
        Object.assign(this, dati);
    }
}
