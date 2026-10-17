<?php
// [CONTROLLER APPLICATIVO - Fatturazione] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Fatturazione] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\fatturazione_package;
// [CONTROLLER APPLICATIVO - Fatturazione] Importa il Bean server.
use ClinicaFlow\fatturazione_package\Fatturazione_Bean;
// [CONTROLLER APPLICATIVO - Fatturazione] Coordina Model e DAO senza SQL nel controller.
final class Fatturazione_ControlApp
{
    // [CONTROLLER APPLICATIVO - Fatturazione] Riceve il DAO.
    public function __construct(private Fatturazione_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Fatturazione] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Fatturazione_Bean $bean): array
    {
        // [MODEL - Fatturazione] Crea il Model della funzionalità.
        $modello = new Fatturazione_Model();
        // [MODEL - Fatturazione] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - Fatturazione] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - Fatturazione] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Fatturazione] Restituisce il risultato nel contratto della View.
        return ['fatture' => $dati];
    }
}
