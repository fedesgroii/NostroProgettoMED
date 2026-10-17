<?php
// [INFRASTRUTTURA] Apre il parser tecnico delle richieste HTTP.
declare(strict_types=1);
// [INFRASTRUTTURA] Colloca il parser nella struttura tecnica.
namespace ClinicaFlow\Core;
// [INFRASTRUTTURA] Centralizza la lettura JSON in ingresso ai ControllerApplicativi.
final class Request
{
    // [INFRASTRUTTURA] Legge il body JSON della richiesta corrente.
    public static function json(): array
    {
        // [INFRASTRUTTURA] Recupera il body grezzo inviato dal ControllerGrafico.
        $contenuto = file_get_contents('php://input');
        // [INFRASTRUTTURA] Decodifica il body nel formato associativo PHP.
        $dati = json_decode($contenuto ?: '{}', true);
        // [INFRASTRUTTURA] Garantisce ai ControllerApplicativi un array valido.
        return is_array($dati) ? $dati : [];
    }
    // [INFRASTRUTTURA] Legge un parametro query per il routing della funzionalità.
    public static function query(string $chiave): ?string
    {
        // [INFRASTRUTTURA] Restituisce il valore della query string se presente.
        return isset($_GET[$chiave]) ? (string)$_GET[$chiave] : null;
    }
}
