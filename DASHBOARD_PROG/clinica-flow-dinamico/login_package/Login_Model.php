<?php
// [MODEL - Login] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [MODEL - Login] Contiene le regole di autenticazione.
final class Login_Model
{
    // [MODEL - Login] Verifica la password rispetto all'hash.
    public function passwordValida(string $password, ?string $hash): bool
    {
        // [MODEL - Login] Rifiuta dati di autenticazione incompleti.
        if ($hash === null || $hash === '') return false;
        // [MODEL - Login] Applica la funzione nativa di verifica password.
        return password_verify($password, $hash);
    }
}
