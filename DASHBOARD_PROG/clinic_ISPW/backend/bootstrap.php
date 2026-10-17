<?php
// [INFRASTRUTTURA] Abilita i tipi stretti nel bootstrap.
declare(strict_types=1);
// [INFRASTRUTTURA] Registra un autoloader locale che mantiene i package funzionali separati.
spl_autoload_register(static function (string $classe): void {
    // [INFRASTRUTTURA] Ignora classi esterne al namespace applicativo.
    if (!str_starts_with($classe, 'ClinicaFlow\\')) return;
    // [INFRASTRUTTURA] Rimuove il prefisso namespace applicativo.
    $relativo = substr($classe, strlen('ClinicaFlow\\'));
    // [INFRASTRUTTURA] Traduce i package PHP in percorsi dentro funzionalita/.
    $parti = explode('\\', $relativo);
    // [INFRASTRUTTURA] Gestisce i Componenti Core nella cartella backend/Core.
    if (($parti[0] ?? '') === 'Core') { $file = __DIR__.'/Core/'.end($parti).'.php'; }
    else { $file = dirname(__DIR__).'/funzionalita/'.($parti[0] ?? '').'/'.end($parti).'.php'; }
    // [INFRASTRUTTURA] Carica la classe se il file del package esiste.
    if (is_file($file)) require_once $file;
});
// [INFRASTRUTTURA] Carica la configurazione applicativa.
$config = require __DIR__.'/config/config.php';
// [INFRASTRUTTURA] Crea l'unica connessione PDO condivisa dai ControllerApplicativi.
$pdo = \ClinicaFlow\Core\Database::crea($config);
