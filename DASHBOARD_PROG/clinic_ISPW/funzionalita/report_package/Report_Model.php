<?php
// [MODEL - Report] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Report] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\report_package;
// [MODEL - Report] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Report_Model
{
    // [MODEL - Report] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Report] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Report] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Report] Non accede a PDO e non conosce la View.
        return $dati;
    }
}
