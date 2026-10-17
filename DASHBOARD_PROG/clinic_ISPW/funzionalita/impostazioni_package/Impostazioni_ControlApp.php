<?php
// [CONTROLLER APPLICATIVO - Impostazioni] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Impostazioni] Colloca il controller nel package impostazioni.
namespace ClinicaFlow\impostazioni_package;
// [CONTROLLER APPLICATIVO - Impostazioni] Importa il Bean/DTO.
use ClinicaFlow\impostazioni_package\Impostazioni_Bean;
// [CONTROLLER APPLICATIVO - Impostazioni] Coordina Model e DAO.
final class Impostazioni_ControlApp
{
    // [CONTROLLER APPLICATIVO - Impostazioni] Riceve il DAO.
    public function __construct(private Impostazioni_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Impostazioni] Esegue la lettura della struttura.
    public function esegui(Impostazioni_Bean $bean): array
    {
        // [MODEL - Impostazioni] Crea il modello della funzionalità.
        $modello = new Impostazioni_Model();
        // [CONTROLLER APPLICATIVO - Impostazioni] Legge dal DAO dopo aver creato il Model.
        $dati = $modello->prepara($this->dao->leggi());
        // [CONTROLLER APPLICATIVO - Impostazioni] Restituisce un unico oggetto impostazioni alla View.
        return $dati;
    }
}
