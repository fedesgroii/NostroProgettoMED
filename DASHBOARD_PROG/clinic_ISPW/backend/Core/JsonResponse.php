<?php
// [INFRASTRUTTURA] Apre il componente tecnico per le risposte JSON.
declare(strict_types=1);
// [INFRASTRUTTURA] Colloca la risposta nella struttura tecnica.
namespace ClinicaFlow\Core;
// [INFRASTRUTTURA] Centralizza la serializzazione delle risposte HTTP.
final class JsonResponse
{
    // [INFRASTRUTTURA] Invia dati JSON con codice HTTP esplicito.
    public static function invia(array $dati, int $status = 200): never
    {
        // [INFRASTRUTTURA] Imposta lo status HTTP della risposta.
        http_response_code($status);
        // [INFRASTRUTTURA] Imposta il content type JSON UTF-8.
        header('Content-Type: application/json; charset=utf-8');
        // [INFRASTRUTTURA] Serializza i dati senza logica di dominio.
        echo json_encode($dati, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        // [INFRASTRUTTURA] Interrompe il front controller dopo aver risposto.
        exit;
    }
}
