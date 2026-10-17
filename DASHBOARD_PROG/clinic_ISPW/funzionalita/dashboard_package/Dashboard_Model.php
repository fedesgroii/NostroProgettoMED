<?php
// [MODEL - Dashboard] Abilita i tipi stretti del modello Dashboard.
declare(strict_types=1);
// [MODEL - Dashboard] Colloca il modello nel package della Dashboard.
namespace ClinicaFlow\dashboard_package;
// [MODEL - Dashboard] Rappresenta la trasformazione dei dati dashboard senza conoscere PDO.
final class Dashboard_Model
{
    // [MODEL - Dashboard] Riceve il Bean prima dell'accesso ai dati e non esegue I/O.
    public function preparaRichiesta(Dashboard_Bean $bean): void
    {
        // [MODEL - Dashboard] Mantiene il DTO invariato perché la demo non usa filtri lato server.
    }
    // [MODEL - Dashboard] Indica quali dati devono essere presentati dalla View.
    public function prepara(array $dati): array
    {
        // [MODEL - Dashboard] Restituisce i risultati DAO nello shape stabile usato dal DTO client.
        return $dati;
    }
}
