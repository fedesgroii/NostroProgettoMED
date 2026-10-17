<?php
// [CONTROLLER APPLICATIVO - Fatturazione] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Fatturazione] Coordina Bean, Model e DAO della funzionalità.
final class Fatturazione_ControlApp
{
    // [CONTROLLER APPLICATIVO - Fatturazione] Riceve DAO e Model.
    public function __construct(
        // [DAO - Fatturazione] Memorizza il DAO della funzionalità.
        private readonly Fatturazione_DAO $dao,
        // [MODEL - Fatturazione] Memorizza il Model della funzionalità.
        private readonly Fatturazione_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Fatturazione] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Fatturazione_Bean
    {
        // [CONTROLLER APPLICATIVO - Fatturazione] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Fatturazione] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Fatturazione] Costruisce il DTO di risposta.
        return new Fatturazione_Bean($dati);
    }
}
