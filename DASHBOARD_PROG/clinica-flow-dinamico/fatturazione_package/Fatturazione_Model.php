<?php
// [MODEL - Fatturazione] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Fatturazione] Contiene regole e trasformazioni non legate alla UI.
final class Fatturazione_Model
{
    // [MODEL - Fatturazione] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Fatturazione] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
