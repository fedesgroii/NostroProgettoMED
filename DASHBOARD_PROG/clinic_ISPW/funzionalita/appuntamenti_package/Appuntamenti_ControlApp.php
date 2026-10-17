<?php
// [CONTROLLER APPLICATIVO - Appuntamenti] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Appuntamenti] Colloca il controller nel package appuntamenti.
namespace ClinicaFlow\appuntamenti_package;
// [CONTROLLER APPLICATIVO - Appuntamenti] Importa il Bean/DTO server.
use ClinicaFlow\appuntamenti_package\Appuntamenti_Bean;
// [CONTROLLER APPLICATIVO - Appuntamenti] Gestisce orchestration Model -> DAO -> risposta.
final class Appuntamenti_ControlApp
{
    // [CONTROLLER APPLICATIVO - Appuntamenti] Riceve il DAO per la persistenza.
    public function __construct(private Appuntamenti_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Appuntamenti] Esegue tutte le operazioni della feature.
    public function esegui(Appuntamenti_Bean $bean): array
    {
        // [MODEL - Appuntamenti] Crea il Model della funzionalità.
        $modello = new Appuntamenti_Model();
        // [MODEL - Appuntamenti] Prepara il Bean prima di ogni lettura applicativa.
        $modello->prepara($bean);
        // [CONTROLLER APPLICATIVO - Appuntamenti] Gestisce il caricamento agenda tramite DAO.
        if ($bean->operazione === 'carica') {
            // [DAO - Appuntamenti] Recupera gli appuntamenti della settimana dal database.
            $righeDao = $this->dao->leggiSettimana();
            // [MODEL - Appuntamenti] Mantiene i dati del DAO senza aggiungere accesso al database.
            $righe = $modello->preparaRighe($righeDao);
            // [CONTROLLER APPLICATIVO - Appuntamenti] Traduce le righe in DTO di risposta per la View.
            return ['appuntamenti' => array_map(static fn(array $riga) => ['id' => (string)$riga['id'], 'patientName' => $riga['first_name'].' '.$riga['last_name'], 'date' => $riga['appointment_date'], 'time' => $riga['time'], 'duration' => (int)$riga['duration'], 'type' => $riga['type'], 'colorClass' => $riga['colorClass'], 'status' => $riga['status']], $righe)];
        }
        // [CONTROLLER APPLICATIVO - Appuntamenti] Valida e verifica lo slot durante l'anteprima grafica.
        if ($bean->operazione === 'verifica_slot') return ['disponibile' => $bean->id !== null && $modello->slotValido((string)$bean->data, (string)$bean->orario, (int)$bean->durata) && $this->dao->slotDisponibile((int)$bean->id, (string)$bean->data, (string)$bean->orario, (int)$bean->durata)];
        // [CONTROLLER APPLICATIVO - Appuntamenti] Valida lo spostamento con il Model prima del DAO.
        if ($bean->operazione === 'sposta') {
            // [MODEL - Appuntamenti] Controlla disponibilità oraria di dominio.
            if (!$modello->slotValido((string)$bean->data, (string)$bean->orario, (int)$bean->durata)) throw new \InvalidArgumentException('Lo slot selezionato non è disponibile.');
            // [DAO - Appuntamenti] Controlla sovrapposizioni reali nel database.
            if (!$this->dao->slotDisponibile((int)$bean->id, (string)$bean->data, (string)$bean->orario, (int)$bean->durata)) throw new \InvalidArgumentException('Lo slot selezionato non è disponibile.');
            // [DAO - Appuntamenti] Aggiorna il database solo dopo le validazioni.
            $this->dao->sposta((int)$bean->id, (string)$bean->data, (string)$bean->orario);
            // [CONTROLLER APPLICATIVO - Appuntamenti] Restituisce l'esito applicativo al ControllerGrafico.
            return ['id' => $bean->id, 'data' => $bean->data, 'orario' => $bean->orario];
        }
        // [DAO - Appuntamenti] Mantiene un controllo DB per l'azione demo senza introdurre la persistenza che prima non esisteva.
        $this->dao->verificaConnessione();
        // [CONTROLLER APPLICATIVO - Appuntamenti] Restituisce un esito neutro per mantenere il comportamento demo esistente.
        return ['demo' => true];
    }
}
