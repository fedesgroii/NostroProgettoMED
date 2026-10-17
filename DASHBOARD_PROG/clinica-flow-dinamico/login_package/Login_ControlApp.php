<?php
// [CONTROLLER APPLICATIVO - Login] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Login] Coordina Bean, Model e DAO dell'autenticazione.
final class Login_ControlApp
{
    // [CONTROLLER APPLICATIVO - Login] Riceve DAO e Model.
    public function __construct(
        // [DAO - Login] Memorizza il DAO.
        private readonly Login_DAO $dao,
        // [MODEL - Login] Memorizza il Model.
        private readonly Login_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Login] Esegue l'intero processo di autenticazione.
    public function accedi(Login_Bean $bean): array
    {
        // [CONTROLLER APPLICATIVO - Login] Normalizza l'email ricevuta dal Bean.
        $email = strtolower(trim($bean->email));
        // [CONTROLLER APPLICATIVO - Login] Recupera l'utente tramite DAO.
        $utente = $this->dao->trovaUtente($email);
        // [CONTROLLER APPLICATIVO - Login] Verifica che l'account sia attivo.
        if (!$utente || (int)$utente['attivo'] !== 1) throw new RuntimeException('Credenziali non valide.');
        // [CONTROLLER APPLICATIVO - Login] Verifica la password usando il Model.
        if (!$this->model->passwordValida($bean->password, $utente['password_hash'])) throw new RuntimeException('Credenziali non valide.');
        // [CONTROLLER APPLICATIVO - Login] Rigenera la sessione dopo autenticazione riuscita.
        session_regenerate_id(true);
        // [CONTROLLER APPLICATIVO - Login] Memorizza l'utente autenticato nella sessione.
        $_SESSION['utente_id'] = (int)$utente['id'];
        // [CONTROLLER APPLICATIVO - Login] Memorizza la struttura dell'utente autenticato.
        $_SESSION['struttura_id'] = (int)$utente['struttura_id'];
        // [CONTROLLER APPLICATIVO - Login] Aggiorna l'ultimo accesso tramite DAO.
        $this->dao->aggiornaUltimoAccesso((int)$utente['id']);
        // [CONTROLLER APPLICATIVO - Login] Restituisce solo il risultato applicativo necessario al browser.
        return ['autenticato' => true];
    }
}
