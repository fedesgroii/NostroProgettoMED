<?php
// [CONTROLLER APPLICATIVO - Notifiche] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Notifiche] Colloca il ControllerApplicativo nel package notifiche.
namespace ClinicaFlow\notifiche_package;
// [CONTROLLER APPLICATIVO - Notifiche] Importa il Bean/DTO server.
use ClinicaFlow\notifiche_package\Notifiche_Bean;
// [CONTROLLER APPLICATIVO - Notifiche] Coordina Model e DAO.
final class Notifiche_ControlApp
{
    // [CONTROLLER APPLICATIVO - Notifiche] Riceve il DAO.
    public function __construct(private Notifiche_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Notifiche] Esegue la richiesta proveniente dal ControllerGrafico.
    public function esegui(Notifiche_Bean $bean): array
    {
        // [MODEL - Notifiche] Crea il Model per la costruzione del messaggio.
        $modello = new Notifiche_Model();
        // [DAO - Notifiche] Recupera il conteggio dal database.
        $conteggio = $this->dao->conta();
        // [CONTROLLER APPLICATIVO - Notifiche] Restituisce il messaggio applicativo al client.
        return ['messaggio' => $modello->costruisciMessaggio($conteggio)];
    }
}
