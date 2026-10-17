<?php
// [CONTROLLER APPLICATIVO - Report] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Report] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\report_package;
// [CONTROLLER APPLICATIVO - Report] Importa il Bean server.
use ClinicaFlow\report_package\Report_Bean;
// [CONTROLLER APPLICATIVO - Report] Coordina Model e DAO senza SQL nel controller.
final class Report_ControlApp
{
    // [CONTROLLER APPLICATIVO - Report] Riceve il DAO.
    public function __construct(private Report_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Report] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Report_Bean $bean): array
    {
        // [MODEL - Report] Crea il Model della funzionalità.
        $modello = new Report_Model();
        // [MODEL - Report] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - Report] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - Report] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Report] Restituisce il risultato nel contratto della View.
        return ['metriche' => $dati];
    }
}
