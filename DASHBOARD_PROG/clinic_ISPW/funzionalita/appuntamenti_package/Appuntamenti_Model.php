<?php
// [MODEL - Appuntamenti] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Appuntamenti] Colloca il Model nel package appuntamenti.
namespace ClinicaFlow\appuntamenti_package;
// [MODEL - Appuntamenti] Contiene esclusivamente le regole di dominio per gli slot.
final class Appuntamenti_Model
{
    // [MODEL - Appuntamenti] Riceve il Bean e mantiene il contratto applicativo senza accesso al database.
    public function prepara(Appuntamenti_Bean $bean): void
    {
        // [MODEL - Appuntamenti] Non modifica la richiesta: il Bean resta la fonte dei dati della funzionalità.
    }
    // [MODEL - Appuntamenti] Mantiene le righe DAO pronte per il ControllerApplicativo.
    public function preparaRighe(array $righe): array
    {
        // [MODEL - Appuntamenti] Restituisce le righe senza conoscere la View o PDO.
        return $righe;
    }
    // [MODEL - Appuntamenti] Converte un orario HH:MM in minuti.
    public function minuti(string $orario): int
    {
        // [MODEL - Appuntamenti] Divide ore e minuti per ottenere il totale.
        [$ore, $minuti] = array_map('intval', explode(':', substr($orario, 0, 5)));
        // [MODEL - Appuntamenti] Restituisce il totale dei minuti dalla mezzanotte.
        return $ore * 60 + $minuti;
    }
    // [MODEL - Appuntamenti] Verifica la disponibilità oraria demo prevista dalla funzionalità.
    public function slotValido(string $data, string $orario, int $durata): bool
    {
        // [MODEL - Appuntamenti] Definisce l'apertura 08:30.
        $apertura = 8 * 60 + 30;
        // [MODEL - Appuntamenti] Definisce la chiusura 19:00.
        $chiusura = 19 * 60;
        // [MODEL - Appuntamenti] Calcola l'inizio dell'operazione richiesta.
        $inizio = $this->minuti($orario);
        // [MODEL - Appuntamenti] Calcola la fine dell'appuntamento.
        $fine = $inizio + $durata;
        // [MODEL - Appuntamenti] Restituisce vero soltanto nello stesso intervallo temporale usato dalla demo.
        return $inizio >= $apertura && $fine <= $chiusura && preg_match('/^\d{4}-\d{2}-\d{2}$/', $data) === 1;
    }
}
