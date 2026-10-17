<?php
// [DAO - Pazienti] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Pazienti] Incapsula SQL e accesso al database della funzionalità.
final class Pazienti_DAO
{
    // [DAO - Pazienti] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Pazienti] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Pazienti] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Pazienti allo schema reale prima dell’uso.');
    }
}
