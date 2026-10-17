<?php
// [DAO - Report] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Report] Incapsula SQL e accesso al database della funzionalità.
final class Report_DAO
{
    // [DAO - Report] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Report] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Report] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Report allo schema reale prima dell’uso.');
    }
}
