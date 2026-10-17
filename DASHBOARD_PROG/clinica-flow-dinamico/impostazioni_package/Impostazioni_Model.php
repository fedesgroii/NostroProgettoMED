<?php
// [MODEL - Impostazioni] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Impostazioni] Contiene regole e trasformazioni non legate alla UI.
final class Impostazioni_Model
{
    // [MODEL - Impostazioni] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Impostazioni] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
