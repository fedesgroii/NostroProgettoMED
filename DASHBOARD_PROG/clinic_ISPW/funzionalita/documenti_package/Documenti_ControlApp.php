<?php
// [CONTROLLER APPLICATIVO - Documenti] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Documenti] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\documenti_package;
// [CONTROLLER APPLICATIVO - Documenti] Importa il Bean server.
use ClinicaFlow\documenti_package\Documenti_Bean;
// [CONTROLLER APPLICATIVO - Documenti] Coordina Model e DAO senza SQL nel controller.
final class Documenti_ControlApp
{
    // [CONTROLLER APPLICATIVO - Documenti] Riceve il DAO.
    public function __construct(private Documenti_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Documenti] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Documenti_Bean $bean): array
    {
        // [MODEL - Documenti] Crea il Model della funzionalità.
        $modello = new Documenti_Model();
        // [MODEL - Documenti] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - Documenti] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - Documenti] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Documenti] Restituisce il risultato nel contratto della View.
        return ['documenti' => $dati];
    }
}
