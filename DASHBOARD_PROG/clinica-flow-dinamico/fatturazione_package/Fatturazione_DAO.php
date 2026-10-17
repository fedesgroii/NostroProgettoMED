<?php
// [DAO - Fatturazione] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Fatturazione] Incapsula SQL e accesso al database della funzionalità.
final class Fatturazione_DAO
{
    // [DAO - Fatturazione] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Fatturazione] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Fatturazione] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Fatturazione allo schema reale prima dell’uso.');
    }
}
