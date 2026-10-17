// [BEAN/DTO - Login] Rappresenta i dati inseriti nel form di login.
export class Login_Bean {
    // [BEAN/DTO - Login] Costruisce il DTO della richiesta.
    constructor(email, password) {
        // [BEAN/DTO - Login] Memorizza l'email normalizzata.
        this.email = email.trim();
        // [BEAN/DTO - Login] Memorizza la password inserita.
        this.password = password;
    }
}
