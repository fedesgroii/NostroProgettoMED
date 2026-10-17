<?php
// [DAO - Notifiche] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Notifiche] Colloca il DAO nel package notifiche.
namespace ClinicaFlow\notifiche_package;
// [DAO - Notifiche] Importa PDO per leggere la tabella notifiche.
use PDO;
// [DAO - Notifiche] Isola la persistenza delle notifiche.
final class Notifiche_DAO
{
    // [DAO - Notifiche] Riceve PDO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Notifiche] Conta le notifiche attive per la topbar.
    public function conta(): int
    {
        // [DAO - Notifiche] Esegue la query parametrica prevista dal package.
        return (int)$this->connessione->query('SELECT COUNT(*) FROM notifications WHERE active = 1')->fetchColumn();
    }
}
