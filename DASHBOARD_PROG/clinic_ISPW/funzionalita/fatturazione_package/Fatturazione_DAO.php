<?php
// [DAO - Fatturazione] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Fatturazione] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\fatturazione_package;
// [DAO - Fatturazione] Importa PDO per query preparate.
use PDO;
// [DAO - Fatturazione] Isola la query della funzionalità.
final class Fatturazione_DAO
{
    // [DAO - Fatturazione] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Fatturazione] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Fatturazione] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT invoice_number AS number, client_name AS client, service, amount_display AS amount, DATE_FORMAT(issue_date, "%d/%m/%y") AS date, status_label AS status, status_class AS statusClass FROM invoices_view ORDER BY id DESC')->fetchAll();
    }
}
