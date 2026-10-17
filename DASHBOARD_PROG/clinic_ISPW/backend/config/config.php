<?php
// [CONFIG] Abilita i tipi stretti nella configurazione backend.
declare(strict_types=1);
// [CONFIG] Restituisce la configurazione applicativa e database da variabili d'ambiente.
return [
    // [CONFIG] Definisce l'ambiente applicativo senza inserire segreti nel repository.
    'app_env' => getenv('APP_ENV') ?: 'development',
    // [CONFIG] Definisce l'host MySQL.
    'db_host' => getenv('DB_HOST') ?: '127.0.0.1',
    // [CONFIG] Definisce la porta MySQL.
    'db_port' => (int)(getenv('DB_PORT') ?: 3306),
    // [CONFIG] Definisce il nome del database.
    'db_name' => getenv('DB_NAME') ?: 'clinicaflow',
    // [CONFIG] Definisce l'utente MySQL.
    'db_user' => getenv('DB_USER') ?: 'clinicaflow',
    // [CONFIG] Definisce la password MySQL da ambiente.
    'db_password' => getenv('DB_PASSWORD') ?: '',
];
