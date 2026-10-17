<?php
// [MODEL - Documenti] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Documenti] Contiene regole e trasformazioni non legate alla UI.
final class Documenti_Model
{
    // [MODEL - Documenti] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Documenti] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
