<?php
// [MODEL - Report] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Report] Contiene regole e trasformazioni non legate alla UI.
final class Report_Model
{
    // [MODEL - Report] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Report] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
