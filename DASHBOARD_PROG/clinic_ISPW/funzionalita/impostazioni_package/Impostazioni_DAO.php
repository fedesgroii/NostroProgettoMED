<?php
// [DAO - Impostazioni] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Impostazioni] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\impostazioni_package;
// [DAO - Impostazioni] Importa PDO per query preparate.
use PDO;
// [DAO - Impostazioni] Isola la query della funzionalità.
final class Impostazioni_DAO
{
    // [DAO - Impostazioni] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Impostazioni] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Impostazioni] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT name, vat_number AS vat, phone, email, address FROM structure_settings WHERE id = 1')->fetchAll();
    }
}
