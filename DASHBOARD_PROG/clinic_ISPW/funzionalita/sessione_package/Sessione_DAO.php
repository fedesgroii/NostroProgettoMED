<?php
// [DAO - Sessione] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Sessione] Colloca il DAO nel package sessione.
namespace ClinicaFlow\sessione_package;
// [DAO - Sessione] Importa PDO per verificare la sessione demo nel database.
use PDO;
// [DAO - Sessione] Isola la persistenza tecnica della sessione demo.
final class Sessione_DAO
{
    // [DAO - Sessione] Riceve PDO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Sessione] Verifica che l'utente demo sia ancora disponibile.
    public function sessioneDemoValida(): bool
    {
        // [DAO - Sessione] Legge la riga della sessione senza effettuare il logout reale.
        return (int)$this->connessione->query('SELECT COUNT(*) FROM session_demo WHERE id = 1 AND active = 1')->fetchColumn() === 1;
    }
}
