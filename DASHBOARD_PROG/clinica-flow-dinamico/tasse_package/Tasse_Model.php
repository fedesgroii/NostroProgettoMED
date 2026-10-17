<?php
// [MODEL - Tasse] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Tasse] Contiene regole e trasformazioni non legate alla UI.
final class Tasse_Model
{
    // [MODEL - Tasse] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Tasse] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
