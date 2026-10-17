<?php
// [CONTROLLER APPLICATIVO - Sessione] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Sessione] Colloca il ControllerApplicativo nel package sessione.
namespace ClinicaFlow\sessione_package;
// [CONTROLLER APPLICATIVO - Sessione] Importa il Bean/DTO server.
use ClinicaFlow\sessione_package\Sessione_Bean;
// [CONTROLLER APPLICATIVO - Sessione] Coordina Model e DAO mantenendo il logout in modalità demo.
final class Sessione_ControlApp
{
    // [CONTROLLER APPLICATIVO - Sessione] Riceve il DAO.
    public function __construct(private Sessione_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Sessione] Esegue il flusso della funzione logout.
    public function esegui(Sessione_Bean $bean): array
    {
        // [MODEL - Sessione] Crea il Model della funzionalità.
        $modello = new Sessione_Model();
        // [DAO - Sessione] Verifica lo stato della sessione demo nel database.
        $this->dao->sessioneDemoValida();
        // [CONTROLLER APPLICATIVO - Sessione] Non invalida la sessione perché la versione esistente è esplicitamente demo.
        return ['messaggio' => $modello->messaggioDemo()];
    }
}
