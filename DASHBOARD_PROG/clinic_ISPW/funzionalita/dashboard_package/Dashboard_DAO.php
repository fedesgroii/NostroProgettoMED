<?php
// [DAO - Dashboard] Abilita i tipi stretti del DAO.
declare(strict_types=1);
// [DAO - Dashboard] Colloca il DAO nel package della Dashboard.
namespace ClinicaFlow\dashboard_package;
// [DAO - Dashboard] Importa PDO per accedere a MySQL con query preparate.
use PDO;
// [DAO - Dashboard] Isola tutte le query della Dashboard.
final class Dashboard_DAO
{
    // [DAO - Dashboard] Riceve la connessione senza creare credenziali nel DAO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Dashboard] Legge statistiche, appuntamenti, scadenze e andamento dal database.
    public function leggi(): array
    {
        // [DAO - Dashboard] Legge le quattro statistiche demo dalla tabella dedicata.
        $statistiche = $this->connessione->query('SELECT label, value, detail, detail_class AS detailClass, icon, icon_class AS iconClass FROM dashboard_statistics ORDER BY position_no')->fetchAll();
        // [DAO - Dashboard] Legge gli appuntamenti mostrati nella card Dashboard.
        $appuntamenti = $this->connessione->query('SELECT a.id, p.first_name, p.last_name, a.appointment_date, TIME_FORMAT(a.start_time, "%H:%i") AS time, a.duration_minutes AS duration, a.type, a.status, a.color_class AS colorClass, pr.first_name AS professional_first, pr.last_name AS professional_last FROM appointments a JOIN patients p ON p.id = a.patient_id LEFT JOIN professionals pr ON pr.id = a.professional_id WHERE a.appointment_date = "2026-09-22" ORDER BY a.start_time LIMIT 5')->fetchAll();
        // [DAO - Dashboard] Legge le prossime quattro scadenze mostrate nella card.
        $scadenze = $this->connessione->query('SELECT DAY(due_date) AS day, MONTH(due_date) AS month_number, title, description, badge FROM deadlines ORDER BY due_date LIMIT 4')->fetchAll();
        // [DAO - Dashboard] Legge le etichette dei mesi del grafico.
        $grafico = $this->connessione->query('SELECT month_label AS month, amount_value AS value FROM dashboard_chart ORDER BY position_no')->fetchAll();
        // [DAO - Dashboard] Ritorna tutti i dati senza eseguire logica di presentazione.
        return ['statistiche' => $statistiche, 'appuntamenti' => $appuntamenti, 'scadenze' => $scadenze, 'grafico' => $grafico];
    }
}
