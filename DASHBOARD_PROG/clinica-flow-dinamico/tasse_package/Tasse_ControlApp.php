<?php
// [CONTROLLER APPLICATIVO - Tasse] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Tasse] Coordina Bean, Model e DAO della funzionalità.
final class Tasse_ControlApp
{
    // [CONTROLLER APPLICATIVO - Tasse] Riceve DAO e Model.
    public function __construct(
        // [DAO - Tasse] Memorizza il DAO della funzionalità.
        private readonly Tasse_DAO $dao,
        // [MODEL - Tasse] Memorizza il Model della funzionalità.
        private readonly Tasse_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Tasse] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Tasse_Bean
    {
        // [CONTROLLER APPLICATIVO - Tasse] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Tasse] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Tasse] Costruisce il DTO di risposta.
        return new Tasse_Bean($dati);
    }
}
