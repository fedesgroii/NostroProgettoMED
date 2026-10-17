<?php
// [DAO - Documenti] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Documenti] Incapsula SQL e accesso al database della funzionalità.
final class Documenti_DAO
{
    // [DAO - Documenti] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Documenti] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Documenti] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Documenti allo schema reale prima dell’uso.');
    }
}
