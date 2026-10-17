<?php
// [DAO - Tasse] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Tasse] Incapsula SQL e accesso al database della funzionalità.
final class Tasse_DAO
{
    // [DAO - Tasse] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Tasse] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Tasse] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Tasse allo schema reale prima dell’uso.');
    }
}
