<?php
// [INFRASTRUTTURA] Apre il componente tecnico della connessione al database.
declare(strict_types=1);
// [INFRASTRUTTURA] Colloca la classe nella struttura tecnica dell'applicazione.
namespace ClinicaFlow\Core;
// [INFRASTRUTTURA] Importa PDO per utilizzare prepared statement.
use PDO;
// [INFRASTRUTTURA] Crea la connessione MySQL condivisa ai DAO.
final class Database
{
    // [INFRASTRUTTURA] Costruisce e configura una connessione PDO.
    public static function crea(array $config): PDO
    {
        // [INFRASTRUTTURA] Costruisce il DSN utf8mb4 usato dall'applicazione.
        $dsn = sprintf('mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4', $config['db_host'], $config['db_port'], $config['db_name']);
        // [INFRASTRUTTURA] Restituisce PDO con errori a eccezione e risultati associativi.
        return new PDO($dsn, $config['db_user'], $config['db_password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false]);
    }
}
