<?php
// [DAO - Impostazioni] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Impostazioni] Incapsula SQL e accesso al database della funzionalità.
final class Impostazioni_DAO
{
    // [DAO - Impostazioni] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Impostazioni] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Impostazioni] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Impostazioni allo schema reale prima dell’uso.');
    }
}
