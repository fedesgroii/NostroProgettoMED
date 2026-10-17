<?php
// [MODEL - Documenti] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Documenti] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\documenti_package;
// [MODEL - Documenti] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Documenti_Model
{
    // [MODEL - Documenti] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Documenti] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Documenti] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Documenti] Non accede a PDO e non conosce la View.
        return $dati;
    }
}
