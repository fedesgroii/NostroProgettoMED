<?php
// [MODEL - Fatturazione] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Fatturazione] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\fatturazione_package;
// [MODEL - Fatturazione] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Fatturazione_Model
{
    // [MODEL - Fatturazione] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Fatturazione] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Fatturazione] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Fatturazione] Non accede a PDO e non conosce la View.
        return $dati;
    }
}
