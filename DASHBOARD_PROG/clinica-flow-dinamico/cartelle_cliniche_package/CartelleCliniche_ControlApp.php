<?php
// [CONTROLLER APPLICATIVO - CartelleCliniche] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - CartelleCliniche] Coordina Bean, Model e DAO della funzionalità.
final class CartelleCliniche_ControlApp
{
    // [CONTROLLER APPLICATIVO - CartelleCliniche] Riceve DAO e Model.
    public function __construct(
        // [DAO - CartelleCliniche] Memorizza il DAO della funzionalità.
        private readonly CartelleCliniche_DAO $dao,
        // [MODEL - CartelleCliniche] Memorizza il Model della funzionalità.
        private readonly CartelleCliniche_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - CartelleCliniche] Esegue il flusso applicativo della lettura.
    public function carica(int $strutturaId,array $parametri=[]): CartelleCliniche_Bean
    {
        // [CONTROLLER APPLICATIVO - CartelleCliniche] Chiede i dati al DAO.
        $righe=$this->dao->leggiDati($strutturaId,$parametri);
        // [CONTROLLER APPLICATIVO - CartelleCliniche] Delega al Model le trasformazioni.
        $dati=$this->model->trasformaDati($righe);
        // [CONTROLLER APPLICATIVO - CartelleCliniche] Costruisce il DTO di risposta.
        return new CartelleCliniche_Bean($dati);
    }
}
