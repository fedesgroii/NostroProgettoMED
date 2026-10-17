<?php
// [CONTROLLER APPLICATIVO - CartelleCliniche] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - CartelleCliniche] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\cartelle_cliniche_package;
// [CONTROLLER APPLICATIVO - CartelleCliniche] Importa il Bean server.
use ClinicaFlow\cartelle_cliniche_package\CartelleCliniche_Bean;
// [CONTROLLER APPLICATIVO - CartelleCliniche] Coordina Model e DAO senza SQL nel controller.
final class CartelleCliniche_ControlApp
{
    // [CONTROLLER APPLICATIVO - CartelleCliniche] Riceve il DAO.
    public function __construct(private CartelleCliniche_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - CartelleCliniche] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(CartelleCliniche_Bean $bean): array
    {
        // [MODEL - CartelleCliniche] Crea il Model della funzionalità.
        $modello = new CartelleCliniche_Model();
        // [MODEL - CartelleCliniche] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - CartelleCliniche] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - CartelleCliniche] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - CartelleCliniche] Restituisce il risultato nel contratto della View.
        $mesi = [1 => 'gennaio', 2 => 'febbraio', 3 => 'marzo', 4 => 'aprile', 5 => 'maggio', 6 => 'giugno', 7 => 'luglio', 8 => 'agosto', 9 => 'settembre', 10 => 'ottobre', 11 => 'novembre', 12 => 'dicembre'];
        return ['pazienti' => $this->dao->leggiPazienti(), 'pazienteSelezionato' => $this->dao->leggiPazienteSelezionato(), 'note' => array_map(static fn(array $riga) => ['date' => date('d', strtotime($riga['date_raw'])).' '.$mesi[(int)date('n', strtotime($riga['date_raw']))].' '.date('Y', strtotime($riga['date_raw'])), 'session' => $riga['session'], 'professional' => trim(($riga['professional_first'] ?? '').' '.($riga['professional_last'] ?? '')), 'text' => $riga['text'], 'tag' => $riga['status'] === 'signed' ? 'Firmata' : 'Bozza', 'tagClass' => $riga['status'] === 'signed' ? 'success' : ''], $dati)];
    }
}
