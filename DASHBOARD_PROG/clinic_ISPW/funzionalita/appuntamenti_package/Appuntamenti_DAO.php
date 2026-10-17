<?php
// [DAO - Appuntamenti] Abilita i tipi stretti del DAO.
declare(strict_types=1);
// [DAO - Appuntamenti] Colloca il DAO nel package appuntamenti.
namespace ClinicaFlow\appuntamenti_package;
// [DAO - Appuntamenti] Importa PDO per query preparate e transazioni.
use PDO;
// [DAO - Appuntamenti] Isola SQL e persistenza degli appuntamenti.
final class Appuntamenti_DAO
{
    // [DAO - Appuntamenti] Riceve la connessione PDO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Appuntamenti] Legge gli appuntamenti della settimana visualizzata.
    public function leggiSettimana(): array
    {
        // [DAO - Appuntamenti] Esegue la query con join anagrafici necessari alla View.
        return $this->connessione->query('SELECT a.id, p.first_name, p.last_name, a.appointment_date, TIME_FORMAT(a.start_time, "%H:%i") AS time, a.duration_minutes AS duration, a.type, a.status, a.color_class AS colorClass FROM appointments a JOIN patients p ON p.id = a.patient_id WHERE a.appointment_date BETWEEN "2026-09-21" AND "2026-09-27" ORDER BY a.appointment_date, a.start_time')->fetchAll();
    }
    // [DAO - Appuntamenti] Verifica sul database la sovrapposizione dello slot richiesto.
    public function slotDisponibile(int $id, string $data, string $orario, int $durata): bool
    {
        // [DAO - Appuntamenti] Calcola l'inizio in secondi per confrontare gli intervalli.
        $inizio = $this->connessione->prepare('SELECT TIME_TO_SEC(?)');
        // [DAO - Appuntamenti] Esegue la conversione dell'orario target.
        $inizio->execute([$orario]);
        // [DAO - Appuntamenti] Recupera il valore numerico dell'inizio.
        $secondiInizio = (int)$inizio->fetchColumn();
        // [DAO - Appuntamenti] Calcola la fine del nuovo intervallo.
        $secondiFine = $secondiInizio + ($durata * 60);
        // [DAO - Appuntamenti] Cerca un appuntamento esistente nello stesso giorno che intersechi l'intervallo.
        $query = $this->connessione->prepare('SELECT COUNT(*) FROM appointments WHERE appointment_date = ? AND id <> ? AND TIME_TO_SEC(start_time) < ? AND TIME_TO_SEC(start_time) + (duration_minutes * 60) > ?');
        // [DAO - Appuntamenti] Esegue la verifica parametrizzata.
        $query->execute([$data, $id, $secondiFine, $secondiInizio]);
        // [DAO - Appuntamenti] Restituisce disponibilità quando non esiste una sovrapposizione.
        return (int)$query->fetchColumn() === 0;
    }
    // [DAO - Appuntamenti] Aggiorna data e orario dell'appuntamento nel database.
    public function sposta(int $id, string $data, string $orario): void
    {
        // [DAO - Appuntamenti] Prepara l'UPDATE parametrizzato.
        $query = $this->connessione->prepare('UPDATE appointments SET appointment_date = ?, start_time = ? WHERE id = ?');
        // [DAO - Appuntamenti] Esegue l'UPDATE.
        $query->execute([$data, $orario, $id]);
    }
    // [DAO - Appuntamenti] Verifica la sola connessione per l'azione demo di nuovo appuntamento.
    public function verificaConnessione(): bool
    {
        // [DAO - Appuntamenti] Esegue una query tecnica innocua senza salvare dati.
        return (int)$this->connessione->query('SELECT 1')->fetchColumn() === 1;
    }
}
