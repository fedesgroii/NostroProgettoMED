<?php
// [CONTROLLER APPLICATIVO - Sessione] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Sessione] Coordina Bean, Model e DAO della funzionalità.
final class Sessione_ControlApp
{
    // [CONTROLLER APPLICATIVO - Sessione] Riceve DAO e Model.
    public function __construct(
        // [DAO - Sessione] Memorizza il DAO della funzionalità.
        private readonly Sessione_DAO $dao,
        // [MODEL - Sessione] Memorizza il Model della funzionalità.
        private readonly Sessione_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Sessione] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Sessione_Bean
    {
        // [CONTROLLER APPLICATIVO - Sessione] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Sessione] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Sessione] Costruisce il DTO di risposta.
        return new Sessione_Bean($dati);
    }
}
