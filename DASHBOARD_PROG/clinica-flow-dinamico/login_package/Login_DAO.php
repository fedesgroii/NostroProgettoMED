<?php
// [DAO - Login] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Login] Incapsula esclusivamente l'accesso SQL del login.
final class Login_DAO
{
    // [DAO - Login] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Login] Cerca l'utente per email.
    public function trovaUtente(string $email): array
    {
        // [DAO - Login] Prepara una query parametrizzata.
        $query = $this->connessione->prepare('SELECT id, struttura_id, nome, cognome, ruolo, password_hash, attivo FROM utenti WHERE email = :email LIMIT 1');
        // [DAO - Login] Esegue la query con il parametro email.
        $query->execute(['email' => $email]);
        // [DAO - Login] Restituisce il record trovato.
        return $query->fetch() ?: [];
    }

    // [DAO - Login] Aggiorna l'ultimo accesso dell'utente.
    public function aggiornaUltimoAccesso(int $utenteId): void
    {
        // [DAO - Login] Prepara l'UPDATE parametrizzato.
        $query = $this->connessione->prepare('UPDATE utenti SET ultimo_accesso = NOW() WHERE id = :id');
        // [DAO - Login] Esegue l'UPDATE.
        $query->execute(['id' => $utenteId]);
    }
}
