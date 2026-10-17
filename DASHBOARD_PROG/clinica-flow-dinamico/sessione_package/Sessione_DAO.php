<?php
// [DAO - Sessione] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Sessione] Incapsula SQL e accesso al database della funzionalità.
final class Sessione_DAO
{
    // [DAO - Sessione] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Sessione] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Sessione] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Sessione allo schema reale prima dell’uso.');
    }
}
