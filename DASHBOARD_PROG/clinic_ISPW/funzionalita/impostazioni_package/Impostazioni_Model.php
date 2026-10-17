<?php
// [MODEL - Impostazioni] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Impostazioni] Colloca il modello nel package impostazioni.
namespace ClinicaFlow\impostazioni_package;
// [MODEL - Impostazioni] Mantiene la validazione dei dati struttura senza accesso al database.
final class Impostazioni_Model
{
    // [MODEL - Impostazioni] Verifica il formato minimo dell'email quando un aggiornamento verrà attivato.
    public function valida(?string $email): void
    {
        // [MODEL - Impostazioni] Solleva errore solo per email valorizzate e non valide.
        if ($email !== null && $email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) === false) throw new \InvalidArgumentException('Email non valida.');
    }
    // [MODEL - Impostazioni] Mantiene la risposta DAO senza conoscere la View.
    public function prepara(array $dati): array
    {
        // [MODEL - Impostazioni] Restituisce i dati della struttura.
        return $dati;
    }
}
