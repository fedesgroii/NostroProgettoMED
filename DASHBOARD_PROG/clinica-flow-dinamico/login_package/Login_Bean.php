<?php
// [BEAN/DTO - Login] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Login] Incapsula i dati ricevuti dal browser.
final class Login_Bean
{
    // [BEAN/DTO - Login] Costruisce il DTO.
    public function __construct(
        // [BEAN/DTO - Login] Memorizza l'email.
        public readonly string $email,
        // [BEAN/DTO - Login] Memorizza la password.
        public readonly string $password
    ) {}
}
