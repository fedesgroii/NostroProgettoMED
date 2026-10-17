<?php
// [MODEL - CartelleCliniche] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - CartelleCliniche] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\cartelle_cliniche_package;
// [MODEL - CartelleCliniche] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class CartelleCliniche_Model
{
    // [MODEL - CartelleCliniche] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - CartelleCliniche] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - CartelleCliniche] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - CartelleCliniche] Non accede a PDO e non conosce la View.
        return $dati;
    }
}
