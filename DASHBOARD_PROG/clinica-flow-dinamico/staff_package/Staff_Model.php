<?php
// [MODEL - Staff] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Staff] Contiene regole e trasformazioni non legate alla UI.
final class Staff_Model
{
    // [MODEL - Staff] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Staff] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
