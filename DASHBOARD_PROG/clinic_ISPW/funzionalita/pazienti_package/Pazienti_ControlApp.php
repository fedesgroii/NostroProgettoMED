<?php
// [CONTROLLER APPLICATIVO - Pazienti] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Pazienti] Colloca il controller nel package Pazienti.
namespace ClinicaFlow\pazienti_package;
// [CONTROLLER APPLICATIVO - Pazienti] Importa il Bean server.
use ClinicaFlow\pazienti_package\Pazienti_Bean;
// [CONTROLLER APPLICATIVO - Pazienti] Coordina Model e DAO della funzionalità.
final class Pazienti_ControlApp
{
    // [CONTROLLER APPLICATIVO - Pazienti] Riceve il DAO.
    public function __construct(private Pazienti_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Pazienti] Esegue lettura o validazione della creazione demo.
    public function esegui(Pazienti_Bean $bean): array
    {
        // [MODEL - Pazienti] Crea il Model della funzionalità.
        $modello = new Pazienti_Model();
        // [CONTROLLER APPLICATIVO - Pazienti] Gestisce il caricamento della lista pazienti.
        if ($bean->operazione === 'carica') return ['pazienti' => $this->dao->leggi()];
        // [MODEL - Pazienti] Valida i campi del DTO prima del contatto con il DAO.
        $modello->validaCreazione($bean->nome, $bean->cognome);
        // [DAO - Pazienti] Mantiene una verifica DB ma non persiste, così il comportamento demo resta invariato.
        $this->dao->verificaConnessione();
        // [CONTROLLER APPLICATIVO - Pazienti] Restituisce esito neutro compatibile con la demo.
        return ['demo' => true];
    }
}
