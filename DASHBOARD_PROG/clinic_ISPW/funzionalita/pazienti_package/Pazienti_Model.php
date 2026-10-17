<?php
// [MODEL - Pazienti] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Pazienti] Colloca il modello nel package Pazienti.
namespace ClinicaFlow\pazienti_package;
// [MODEL - Pazienti] Contiene la validazione anagrafica senza accesso al database.
final class Pazienti_Model
{
    // [MODEL - Pazienti] Verifica i dati minimi del form demo.
    public function validaCreazione(?string $nome, ?string $cognome): void
    {
        // [MODEL - Pazienti] Rifiuta il nome mancante.
        if (trim((string)$nome) === '' || trim((string)$cognome) === '') throw new \InvalidArgumentException('Nome e cognome sono obbligatori.');
    }
}
