<?php
// [MODEL - Tasse] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Tasse] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\tasse_package;
// [MODEL - Tasse] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Tasse_Model
{
    // [MODEL - Tasse] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Tasse] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Tasse] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Tasse] Non accede a PDO e non conosce la View.
        return $dati;
    }
}
