<?php
// [CONTROLLER APPLICATIVO - Appuntamenti] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Appuntamenti] Coordina Bean, Model e DAO della funzionalità.
final class Appuntamenti_ControlApp
{
    // [CONTROLLER APPLICATIVO - Appuntamenti] Riceve DAO e Model.
    public function __construct(
        // [DAO - Appuntamenti] Memorizza il DAO della funzionalità.
        private readonly Appuntamenti_DAO $dao,
        // [MODEL - Appuntamenti] Memorizza il Model della funzionalità.
        private readonly Appuntamenti_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Appuntamenti] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Appuntamenti_Bean
    {
        // [CONTROLLER APPLICATIVO - Appuntamenti] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Appuntamenti] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Appuntamenti] Costruisce il DTO di risposta.
        return new Appuntamenti_Bean($dati);
    }
}
