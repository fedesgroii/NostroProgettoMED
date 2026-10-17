<?php
// [CONTROLLER APPLICATIVO - Report] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Report] Coordina Bean, Model e DAO della funzionalità.
final class Report_ControlApp
{
    // [CONTROLLER APPLICATIVO - Report] Riceve DAO e Model.
    public function __construct(
        // [DAO - Report] Memorizza il DAO della funzionalità.
        private readonly Report_DAO $dao,
        // [MODEL - Report] Memorizza il Model della funzionalità.
        private readonly Report_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Report] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Report_Bean
    {
        // [CONTROLLER APPLICATIVO - Report] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Report] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Report] Costruisce il DTO di risposta.
        return new Report_Bean($dati);
    }
}
