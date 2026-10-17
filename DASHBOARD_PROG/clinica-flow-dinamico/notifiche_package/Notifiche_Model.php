<?php
// [MODEL - Notifiche] Dichiara il modello della funzionalità.
declare(strict_types=1);

// [MODEL - Notifiche] Contiene regole e trasformazioni non legate alla UI.
final class Notifiche_Model
{
    // [MODEL - Notifiche] Riceve dati grezzi dal DAO e li prepara per il ControllerApplicativo.
    public function trasformaDati(array $righe): array
    {
        // [MODEL - Notifiche] Non inventa dati quando la struttura reale non è ancora definita.
        return $righe;
    }
}
