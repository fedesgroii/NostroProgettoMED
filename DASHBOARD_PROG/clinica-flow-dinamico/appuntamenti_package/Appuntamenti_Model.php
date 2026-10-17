<?php
// [MODEL - Appuntamenti] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Appuntamenti] Contiene regole e trasformazioni non legate alla UI.
final class Appuntamenti_Model
{
    // [MODEL - Appuntamenti] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Appuntamenti] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
