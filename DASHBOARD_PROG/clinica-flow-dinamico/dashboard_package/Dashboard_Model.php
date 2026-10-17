<?php
// [MODEL - Dashboard] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [MODEL - Dashboard] Contiene le trasformazioni di dominio della Dashboard.
final class Dashboard_Model
{
    // [MODEL - Dashboard] Calcola le statistiche derivate dai dati recuperati dal DAO.
    public function costruisciStatistiche(array $dati): array
    {
        // [MODEL - Dashboard] Legge il numero degli appuntamenti odierni.
        $oggi = (int)($dati['appuntamentiOggi'] ?? 0);
        // [MODEL - Dashboard] Legge il valore del giorno precedente.
        $ieri = (int)($dati['appuntamentiIeri'] ?? 0);
        // [MODEL - Dashboard] Calcola la variazione appuntamenti.
        $deltaAppuntamenti = $oggi - $ieri;
        // [MODEL - Dashboard] Legge gli incassi correnti.
        $incassi = (float)($dati['incassiMese'] ?? 0);
        // [MODEL - Dashboard] Legge gli incassi precedenti.
        $incassiPrecedenti = (float)($dati['incassiMesePrecedente'] ?? 0);
        // [MODEL - Dashboard] Calcola la variazione percentuale degli incassi.
        $deltaIncassi = $incassiPrecedenti > 0 ? (($incassi - $incassiPrecedenti) / $incassiPrecedenti) * 100 : 0;
        // [MODEL - Dashboard] Costruisce la descrizione della variazione appuntamenti.
        $testoDelta = $deltaAppuntamenti > 0 ? "+{$deltaAppuntamenti} rispetto a ieri" : ($deltaAppuntamenti < 0 ? "{$deltaAppuntamenti} rispetto a ieri" : 'Nessuna variazione');
        // [MODEL - Dashboard] Restituisce dati pronti per il DTO.
        return [
            'dataOdierna' => $dati['dataOdierna'] ?? '',
            'dataAgendaOggi' => $dati['dataAgendaOggi'] ?? '',
            'numeroAppuntamentiOggi' => $oggi,
            'variazioneAppuntamenti' => $testoDelta,
            'numeroPazientiAttivi' => (int)($dati['pazientiAttivi'] ?? 0),
            'nuoviPazientiMese' => ((int)($dati['nuoviPazientiMese'] ?? 0)).' nuovi questo mese',
            'incassiMese' => $incassi,
            'variazioneIncassi' => sprintf('%+.1f%% vs mese scorso', $deltaIncassi),
            'scadenzeVicine' => (int)($dati['scadenzeVicine'] ?? 0),
            'giorniScadenza' => 'Entro 30 giorni',
            'notificheCount' => (int)($dati['notificheCount'] ?? 0),
        ];
    }
}
