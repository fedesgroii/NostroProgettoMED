<?php
// [MODEL - Notifiche] Abilita i tipi stretti.
declare(strict_types=1);
// [MODEL - Notifiche] Colloca il modello nel package notifiche.
namespace ClinicaFlow\notifiche_package;
// [MODEL - Notifiche] Compone il messaggio UI senza interrogare direttamente il database.
final class Notifiche_Model
{
    // [MODEL - Notifiche] Costruisce il messaggio usando il conteggio restituito dal DAO.
    public function costruisciMessaggio(int $conteggio): string
    {
        // [MODEL - Notifiche] Mantiene lo stesso testo del comportamento esistente.
        return $conteggio.' notifiche: 1 documento da firmare, 1 pagamento, 1 scadenza';
    }
}
