<?php
// [CONTROLLER APPLICATIVO - Tasse] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Tasse] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\tasse_package;
// [CONTROLLER APPLICATIVO - Tasse] Importa il Bean server.
use ClinicaFlow\tasse_package\Tasse_Bean;
// [CONTROLLER APPLICATIVO - Tasse] Coordina Model e DAO senza SQL nel controller.
final class Tasse_ControlApp
{
    // [CONTROLLER APPLICATIVO - Tasse] Riceve il DAO.
    public function __construct(private Tasse_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Tasse] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Tasse_Bean $bean): array
    {
        // [MODEL - Tasse] Crea il Model della funzionalità.
        $modello = new Tasse_Model();
        // [CONTROLLER APPLICATIVO - Tasse] Recupera i dati tramite DAO dopo il passaggio nel Model.
        $dati = $modello->prepara($this->dao->leggi());
        // [CONTROLLER APPLICATIVO - Tasse] Restituisce il risultato nel contratto della View.
        return ['scadenze' => array_map(static fn(array $riga) => ['day' => (string)$riga['day'], 'month' => [9=>'SET',10=>'OTT',11=>'NOV'][(int)$riga['month_number']] ?? (string)$riga['month_number'], 'title' => $riga['title'], 'description' => $riga['description'], 'badge' => $riga['badge'], 'urgent' => (bool)$riga['urgent']], $dati)];
    }
}
