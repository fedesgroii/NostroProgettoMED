<?php
// [CONTROLLER APPLICATIVO - Staff] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Staff] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\staff_package;
// [CONTROLLER APPLICATIVO - Staff] Importa il Bean server.
use ClinicaFlow\staff_package\Staff_Bean;
// [CONTROLLER APPLICATIVO - Staff] Coordina Model e DAO senza SQL nel controller.
final class Staff_ControlApp
{
    // [CONTROLLER APPLICATIVO - Staff] Riceve il DAO.
    public function __construct(private Staff_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Staff] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Staff_Bean $bean): array
    {
        // [MODEL - Staff] Crea il Model della funzionalità.
        $modello = new Staff_Model();
        // [MODEL - Staff] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - Staff] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - Staff] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Staff] Restituisce il risultato nel contratto della View.
        return ['professionisti' => $dati];
    }
}
