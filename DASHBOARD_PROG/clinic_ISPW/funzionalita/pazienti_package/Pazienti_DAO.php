<?php
// [DAO - Pazienti] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Pazienti] Colloca il DAO nel package Pazienti.
namespace ClinicaFlow\pazienti_package;
// [DAO - Pazienti] Importa PDO per MySQL.
use PDO;
// [DAO - Pazienti] Isola tutte le query pazienti.
final class Pazienti_DAO
{
    // [DAO - Pazienti] Riceve la connessione PDO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Pazienti] Legge le righe paziente usate dalla tabella della View.
    public function leggi(): array
    {
        // [DAO - Pazienti] Esegue la query con i dati demo necessari alla stessa UI.
        return $this->connessione->query('SELECT initials, name_display AS name, code, professional, specialty, last_visit AS lastVisit, next_appointment AS nextAppointment, status_label AS status FROM patients_view ORDER BY id')->fetchAll();
    }
    // [DAO - Pazienti] Verifica la connessione per la creazione demo senza salvare dati come nella versione precedente.
    public function verificaConnessione(): bool
    {
        // [DAO - Pazienti] Esegue una query innocua.
        return (int)$this->connessione->query('SELECT 1')->fetchColumn() === 1;
    }
}
