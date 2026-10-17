<?php
// [DAO - Tasse] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Tasse] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\tasse_package;
// [DAO - Tasse] Importa PDO per query preparate.
use PDO;
// [DAO - Tasse] Isola la query della funzionalità.
final class Tasse_DAO
{
    // [DAO - Tasse] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Tasse] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Tasse] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT DAY(due_date) AS day, MONTH(due_date) AS month_number, title, description, badge, urgent FROM deadlines_view ORDER BY due_date')->fetchAll();
    }
}
