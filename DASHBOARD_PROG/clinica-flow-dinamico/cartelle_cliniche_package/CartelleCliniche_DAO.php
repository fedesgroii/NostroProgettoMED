<?php
// [DAO - CartelleCliniche] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - CartelleCliniche] Incapsula SQL e accesso al database della funzionalità.
final class CartelleCliniche_DAO
{
    // [DAO - CartelleCliniche] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - CartelleCliniche] Punto unico in cui verranno definite le query della funzionalità.
    public function leggiDati(int $strutturaId,array $parametri=[]): array
    {
        // [DAO - CartelleCliniche] Blocca accidentalmente l'uso di SQL inventato prima dello schema reale.
        throw new RuntimeException('Collegare il DAO CartelleCliniche allo schema reale prima dell’uso.');
    }
}
