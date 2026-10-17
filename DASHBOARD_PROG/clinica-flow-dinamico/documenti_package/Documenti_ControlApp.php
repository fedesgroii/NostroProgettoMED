<?php
// [CONTROLLER APPLICATIVO - Documenti] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Documenti] Coordina Bean, Model e DAO della funzionalità.
final class Documenti_ControlApp
{
    // [CONTROLLER APPLICATIVO - Documenti] Riceve DAO e Model.
    public function __construct(
        // [DAO - Documenti] Memorizza il DAO della funzionalità.
        private readonly Documenti_DAO $dao,
        // [MODEL - Documenti] Memorizza il Model della funzionalità.
        private readonly Documenti_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Documenti] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Documenti_Bean
    {
        // [CONTROLLER APPLICATIVO - Documenti] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Documenti] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Documenti] Costruisce il DTO di risposta.
        return new Documenti_Bean($dati);
    }
}
