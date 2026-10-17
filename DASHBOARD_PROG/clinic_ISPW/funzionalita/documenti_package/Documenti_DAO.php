<?php
// [DAO - Documenti] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Documenti] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\documenti_package;
// [DAO - Documenti] Importa PDO per query preparate.
use PDO;
// [DAO - Documenti] Isola la query della funzionalità.
final class Documenti_DAO
{
    // [DAO - Documenti] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Documenti] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Documenti] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT file_name AS name, category, owner_display AS owner, DATE_FORMAT(document_date, "%d/%m/%Y") AS date, status_label AS status, status_class AS statusClass FROM documents_view ORDER BY id')->fetchAll();
    }
}
