<?php
// [CONTROLLER APPLICATIVO - Staff] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Staff] Coordina Bean, Model e DAO della funzionalità.
final class Staff_ControlApp
{
    // [CONTROLLER APPLICATIVO - Staff] Riceve DAO e Model.
    public function __construct(
        // [DAO - Staff] Memorizza il DAO della funzionalità.
        private readonly Staff_DAO $dao,
        // [MODEL - Staff] Memorizza il Model della funzionalità.
        private readonly Staff_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Staff] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Staff_Bean
    {
        // [CONTROLLER APPLICATIVO - Staff] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Staff] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Staff] Costruisce il DTO di risposta.
        return new Staff_Bean($dati);
    }
}
