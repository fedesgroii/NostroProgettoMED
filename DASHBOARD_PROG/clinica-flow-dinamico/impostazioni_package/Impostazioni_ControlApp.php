<?php
// [CONTROLLER APPLICATIVO - Impostazioni] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Impostazioni] Coordina Bean, Model e DAO della funzionalità.
final class Impostazioni_ControlApp
{
    // [CONTROLLER APPLICATIVO - Impostazioni] Riceve DAO e Model.
    public function __construct(
        // [DAO - Impostazioni] Memorizza il DAO della funzionalità.
        private readonly Impostazioni_DAO $dao,
        // [MODEL - Impostazioni] Memorizza il Model della funzionalità.
        private readonly Impostazioni_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Impostazioni] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Impostazioni_Bean
    {
        // [CONTROLLER APPLICATIVO - Impostazioni] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Impostazioni] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Impostazioni] Costruisce il DTO di risposta.
        return new Impostazioni_Bean($dati);
    }
}
