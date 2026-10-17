<?php
// [DAO - Staff] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Staff] Incapsula SQL e accesso al database della funzionalità.
final class Staff_DAO
{
    // [DAO - Staff] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Staff] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Staff] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Staff allo schema reale prima dell’uso.');
    }
}
