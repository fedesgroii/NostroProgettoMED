<?php
// [CONTROLLER APPLICATIVO - Pazienti] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Pazienti] Coordina Bean, Model e DAO della funzionalità.
final class Pazienti_ControlApp
{
    // [CONTROLLER APPLICATIVO - Pazienti] Riceve DAO e Model.
    public function __construct(
        // [DAO - Pazienti] Memorizza il DAO della funzionalità.
        private readonly Pazienti_DAO $dao,
        // [MODEL - Pazienti] Memorizza il Model della funzionalità.
        private readonly Pazienti_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Pazienti] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): Pazienti_Bean
    {
        // [CONTROLLER APPLICATIVO - Pazienti] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - Pazienti] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - Pazienti] Costruisce il DTO di risposta.
        return new Pazienti_Bean($dati);
    }
}
