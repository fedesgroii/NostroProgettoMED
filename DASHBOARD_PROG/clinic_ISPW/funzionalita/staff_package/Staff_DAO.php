<?php
// [DAO - Staff] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Staff] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\staff_package;
// [DAO - Staff] Importa PDO per query preparate.
use PDO;
// [DAO - Staff] Isola la query della funzionalità.
final class Staff_DAO
{
    // [DAO - Staff] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Staff] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Staff] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT initials, name_display AS name, specialty, role, status_label AS status FROM professionals_view ORDER BY id')->fetchAll();
    }
}
