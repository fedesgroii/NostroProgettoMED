<?php
// [MODEL - Pazienti] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Pazienti] Contiene regole e trasformazioni non legate alla UI.
final class Pazienti_Model
{
    // [MODEL - Pazienti] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Pazienti] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
