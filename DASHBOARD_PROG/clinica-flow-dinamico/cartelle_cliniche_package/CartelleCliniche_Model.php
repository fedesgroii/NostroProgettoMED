<?php
// [MODEL - CartelleCliniche] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - CartelleCliniche] Contiene regole e trasformazioni non legate alla UI.
final class CartelleCliniche_Model
{
    // [MODEL - CartelleCliniche] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - CartelleCliniche] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
