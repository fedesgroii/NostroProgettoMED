<?php
// [MODEL - Sessione] Abilita i tipi stretti.
declare(strict_types=1);
// [MODEL - Sessione] Colloca il modello nel package sessione.
namespace ClinicaFlow\sessione_package;
// [MODEL - Sessione] Mantiene invariato il comportamento demo di logout.
final class Sessione_Model
{
    // [MODEL - Sessione] Costruisce il messaggio demo restituito alla View.
    public function messaggioDemo(): string
    {
        // [MODEL - Sessione] Restituisce esattamente il testo già mostrato all'utente.
        return 'Demo: qui verrà eseguito il logout PHP';
    }
}
