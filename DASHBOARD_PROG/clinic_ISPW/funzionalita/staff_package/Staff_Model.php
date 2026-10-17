<?php
// [MODEL - Staff] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Staff] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\staff_package;
// [MODEL - Staff] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Staff_Model
{
    // [MODEL - Staff] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Staff] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Staff] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Staff] Non accede a PDO e non conosce la View.
        return $dati;
    }
}
