<?php
// [MODEL - Sessione] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Sessione] Contiene regole e trasformazioni non legate alla UI.
final class Sessione_Model
{
    // [MODEL - Sessione] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Sessione] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
