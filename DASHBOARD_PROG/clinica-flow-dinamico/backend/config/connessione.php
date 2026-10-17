<?php
// [CONFIGURAZIONE - Database] Abilita tipizzazione stretta.
declare(strict_types=1);

// [CONFIGURAZIONE - Database] Legge il server MySQL dalla configurazione dell'ambiente.
$host=getenv('DB_HOST') ?: '127.0.0.1';
// [CONFIGURAZIONE - Database] Legge il nome del database.
$nomeDatabase=getenv('DB_NAME') ?: 'clinicaflow';
// [CONFIGURAZIONE - Database] Legge l'utente MySQL.
$utente=getenv('DB_USER') ?: 'root';
// [CONFIGURAZIONE - Database] Legge la password MySQL.
$password=getenv('DB_PASS') ?: '';
// [CONFIGURAZIONE - Database] Costruisce il DSN UTF-8.
$dsn="mysql:host={$host};dbname={$nomeDatabase};charset=utf8mb4";
// [CONFIGURAZIONE - Database] Crea una connessione PDO con prepared statement.
return new PDO($dsn,$utente,$password,[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES=>false,
]);
