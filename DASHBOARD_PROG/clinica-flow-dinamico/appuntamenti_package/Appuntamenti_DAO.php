<?php
// [DAO - Appuntamenti] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Appuntamenti] Incapsula SQL e accesso al database della funzionalità.
final class Appuntamenti_DAO
{
    // [DAO - Appuntamenti] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Appuntamenti] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Appuntamenti] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Appuntamenti allo schema reale prima dell’uso.');
    }
}
