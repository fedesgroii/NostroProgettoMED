<?php
// [CONTROLLER APPLICATIVO - Notifiche] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Notifiche] Coordina Bean, Model e DAO della funzionalità.
final class Notifiche_ControlApp
{
    // [CONTROLLER APPLICATIVO - Notifiche] Riceve DAO e Model.
    public function __construct(
        // [DAO - Notifiche] Memorizza il DAO della funzionalità.
        private readonly Notifiche_DAO $dao,
        // [MODEL - Notifiche] Memorizza il Model della funzionalità.
        private readonly Notifiche_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Notifiche] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Notifiche_Bean
    {
        // [CONTROLLER APPLICATIVO - Notifiche] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Notifiche] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Notifiche] Costruisce il DTO di risposta.
        return new Notifiche_Bean($dati);
    }
}
