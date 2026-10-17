<?php
// [DAO - Report] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Report] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\report_package;
// [DAO - Report] Importa PDO per query preparate.
use PDO;
// [DAO - Report] Isola la query della funzionalità.
final class Report_DAO
{
    // [DAO - Report] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Report] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Report] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT label, value_display AS value, width_value AS width, detail FROM report_metrics ORDER BY position_no')->fetchAll();
    }
}
