<?php
// [CONTROLLER APPLICATIVO - Dashboard] Abilita i tipi stretti del controller applicativo.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Dashboard] Colloca il controller nel package della Dashboard.
namespace ClinicaFlow\dashboard_package;
// [CONTROLLER APPLICATIVO - Dashboard] Importa il Bean/DTO della funzionalità.
use ClinicaFlow\dashboard_package\Dashboard_Bean;
// [CONTROLLER APPLICATIVO - Dashboard] Coordina Model e DAO nel flusso richiesto.
final class Dashboard_ControlApp
{
    // [CONTROLLER APPLICATIVO - Dashboard] Riceve il DAO già collegato a PDO dal front controller.
    public function __construct(private Dashboard_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Dashboard] Esegue il caricamento completo della Dashboard.
    public function esegui(Dashboard_Bean $bean): array
    {
        // [MODEL - Dashboard] Prepara il Bean prima del recupero dati.
        $modello->preparaRichiesta($bean);
        // [DAO - Dashboard] Recupera statistiche, appuntamenti, scadenze e grafico da MySQL.
        $righeDao = $this->dao->leggi();
        // [MODEL - Dashboard] Prepara le righe DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Dashboard] Trasforma i dati del database nel contratto DTO della Dashboard.
        return ['stats' => array_map(static fn(array $riga) => $riga, $dati['statistiche']), 'appointments' => array_map(static fn(array $riga) => ['id' => (string)$riga['id'], 'patientName' => $riga['first_name'].' '.$riga['last_name'], 'date' => $riga['appointment_date'], 'time' => $riga['time'], 'duration' => (int)$riga['duration'], 'type' => in_array((int)($riga['id'] ?? 0), [1, 5], true) ? 'Psicologia · Seduta individuale' : $riga['type'], 'professional' => trim(($riga['professional_first'] ?? '').' '.($riga['professional_last'] ?? '')), 'colorClass' => $riga['colorClass'], 'status' => $riga['status'] === 'current' ? 'In corso' : ($riga['status'] === 'pending' ? 'Da confermare' : 'Confermato')], $dati['appuntamenti']), 'deadlines' => array_map(static fn(array $riga) => ['day' => (string)$riga['day'], 'month' => [9=>'SET',10=>'OTT',11=>'NOV'][(int)$riga['month_number']] ?? (string)$riga['month_number'], 'title' => $riga['title'], 'description' => $riga['description'], 'badge' => $riga['badge']], $dati['scadenze']), 'chartYear' => '2026', 'chartMonths' => array_column($dati['grafico'], 'month'), 'chartValues' => array_column($dati['grafico'], 'value')];
    }
}
