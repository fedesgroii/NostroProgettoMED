<?php
// [DAO - Notifiche] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Notifiche] Incapsula SQL e accesso al database della funzionalità.
final class Notifiche_DAO
{
    // [DAO - Notifiche] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Notifiche] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - Notifiche] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO Notifiche allo schema reale prima dell’uso.');
    }
}
