<?php
// [CONTROLLER APPLICATIVO - Dashboard] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [CONTROLLER APPLICATIVO - Dashboard] Coordina Bean, Model e DAO.
final class Dashboard_ControlApp
{
    // [CONTROLLER APPLICATIVO - Dashboard] Riceve Model e DAO.
    public function __construct(
        // [DAO - Dashboard] Inietta il DAO.
        private readonly Dashboard_DAO $dao,
        // [MODEL - Dashboard] Inietta il Model.
        private readonly Dashboard_Model $model
    ) {}

    // [CONTROLLER APPLICATIVO - Dashboard] Esegue l'intera operazione richiesta dal ControllerGrafico.
    public function carica(int $utenteId,int $strutturaId): Dashboard_Bean
    {
        // [CONTROLLER APPLICATIVO - Dashboard] Recupera il profilo tramite DAO.
        $utente=$this->dao->leggiUtente($utenteId,$strutturaId);
        // [CONTROLLER APPLICATIVO - Dashboard] Determina il mese corrente.
        $mese=date('Y-m-01');
        // [CONTROLLER APPLICATIVO - Dashboard] Determina il mese precedente.
        $mesePrecedente=date('Y-m-01',strtotime('-1 month'));
        // [CONTROLLER APPLICATIVO - Dashboard] Recupera gli appuntamenti reali.
        $appuntamenti=$this->dao->leggiAppuntamenti($strutturaId);
        // [CONTROLLER APPLICATIVO - Dashboard] Recupera le scadenze reali.
        $scadenze=$this->dao->leggiScadenze($strutturaId);
        // [CONTROLLER APPLICATIVO - Dashboard] Recupera la serie storica reale.
        $andamento=$this->dao->leggiAndamento($strutturaId);
        // [CONTROLLER APPLICATIVO - Dashboard] Recupera i dati grezzi necessari al Model.
        $dati=[
            'dataOdierna'=>$this->dataItaliana(time()),
            'dataAgendaOggi'=>date('d/m/Y'),
            'appuntamentiOggi'=>$this->dao->contaAppuntamentiOggi($strutturaId),
            'appuntamentiIeri'=>$this->dao->contaAppuntamentiIeri($strutturaId),
            'pazientiAttivi'=>$this->dao->contaPazientiAttivi($strutturaId),
            'nuoviPazientiMese'=>$this->dao->contaNuoviPazientiMese($strutturaId),
            'incassiMese'=>$this->dao->incassiMese($strutturaId,$mese),
            'incassiMesePrecedente'=>$this->dao->incassiMesePrecedente($strutturaId,$mesePrecedente),
            'scadenzeVicine'=>$this->dao->contaScadenze($strutturaId),
            'notificheCount'=>$this->dao->contaNotifiche($utenteId,$strutturaId),
        ];
        // [CONTROLLER APPLICATIVO - Dashboard] Delega le elaborazioni derivate al Model.
        $statistiche=$this->model->costruisciStatistiche($dati);
        // [CONTROLLER APPLICATIVO - Dashboard] Trasforma i dati utente in un DTO grafico.
        $utenteDto=[
            'nomeCompleto'=>trim(($utente['ruolo']??'').' '.($utente['nome']??'').' '.($utente['cognome']??'')),
            'nomeBreve'=>$utente['nome']??'',
            'ruolo'=>$utente['ruolo']??'',
            'iniziali'=>strtoupper(substr($utente['nome']??'',0,1).substr($utente['cognome']??'',0,1)),
            'ultimoAccesso'=>!empty($utente['ultimo_accesso']) ? 'Ultimo accesso: '.date('d/m/Y H:i',strtotime($utente['ultimo_accesso'])) : '',
        ];
        // [CONTROLLER APPLICATIVO - Dashboard] Trasforma gli appuntamenti per la View.
        $appuntamentiDto=array_map(fn(array $r)=>[
            'ora'=>date('H:i',strtotime($r['data_ora_inizio'])),
            'pazienteNome'=>trim($r['nome'].' '.$r['cognome']),
            'descrizione'=>$r['tipologia'],
            'statoEtichetta'=>$this->etichettaStato($r['stato']),
            'classeStato'=>$r['stato']==='confermato'?'confirmed':($r['stato']==='in_corso'?'current':'pending'),
            'coloreDot'=>$this->coloreTipologia($r['tipologia']),
            'inCorso'=>$r['stato']==='in_corso',
        ],$appuntamenti);
        // [CONTROLLER APPLICATIVO - Dashboard] Trasforma le scadenze per la View.
        $scadenzeDto=array_map(fn(array $r)=>[
            'giorno'=>date('d',strtotime($r['data_scadenza'])),
            'mese'=>strtoupper(date('M',strtotime($r['data_scadenza']))),
            'titolo'=>$r['titolo'],
            'descrizione'=>$r['descrizione']??'',
            'giorniResidui'=>$this->giorniResidui($r['data_scadenza']),
            'classePill'=>$r['stato']==='urgente'?'orange':'gray',
        ],$scadenze);
        // [CONTROLLER APPLICATIVO - Dashboard] Trasforma il grafico per la View.
        $andamentoDto=array_map(fn(array $r)=>[
            'etichetta'=>strtoupper(date('M',strtotime($r['periodo'].'-01'))),
            'valore'=>(float)$r['totale'],
        ],$andamento);
        // [CONTROLLER APPLICATIVO - Dashboard] Restituisce il Bean/DTO completo.
        return new Dashboard_Bean($utenteDto,$statistiche,$appuntamentiDto,$scadenzeDto,$andamentoDto);
    }

    // [CONTROLLER APPLICATIVO - Dashboard] Costruisce la data odierna in lingua italiana.
    private function dataItaliana(int $timestamp): string
    {
        // [CONTROLLER APPLICATIVO - Dashboard] Definisce i giorni della settimana in italiano.
        $giorni=['domenica','lunedì','martedì','mercoledì','giovedì','venerdì','sabato'];
        // [CONTROLLER APPLICATIVO - Dashboard] Definisce i mesi dell'anno in italiano.
        $mesi=['gennaio','febbraio','marzo','aprile','maggio','giugno','luglio','agosto','settembre','ottobre','novembre','dicembre'];
        // [CONTROLLER APPLICATIVO - Dashboard] Restituisce la data completa in italiano.
        return strtoupper($giorni[(int)date('w',$timestamp)].' '.date('d',$timestamp).' '.$mesi[(int)date('n',$timestamp)-1].' '.date('Y',$timestamp));
    }

    // [CONTROLLER APPLICATIVO - Dashboard] Traduce gli stati tecnici per la View.
    private function etichettaStato(string $stato): string
    {
        // [CONTROLLER APPLICATIVO - Dashboard] Restituisce l'etichetta confermata.
        if($stato==='confermato') return 'Confermato';
        // [CONTROLLER APPLICATIVO - Dashboard] Restituisce l'etichetta in corso.
        if($stato==='in_corso') return 'In corso';
        // [CONTROLLER APPLICATIVO - Dashboard] Restituisce l'etichetta da confermare.
        if($stato==='da_confermare') return 'Da confermare';
        // [CONTROLLER APPLICATIVO - Dashboard] Restituisce un'etichetta generica.
        return ucfirst(str_replace('_',' ',$stato));
    }

    // [CONTROLLER APPLICATIVO - Dashboard] Traduce la tipologia in colore grafico.
    private function coloreTipologia(string $tipologia): string
    {
        // [CONTROLLER APPLICATIVO - Dashboard] Colore per primo colloquio.
        if(stripos($tipologia,'primo')!==false) return 'blue-bg';
        // [CONTROLLER APPLICATIVO - Dashboard] Colore per follow-up.
        if(stripos($tipologia,'follow')!==false) return 'purple-bg';
        // [CONTROLLER APPLICATIVO - Dashboard] Colore per seduta.
        if(stripos($tipologia,'seduta')!==false) return 'orange-bg';
        // [CONTROLLER APPLICATIVO - Dashboard] Colore predefinito.
        return 'teal-bg';
    }

    // [CONTROLLER APPLICATIVO - Dashboard] Calcola i giorni residui.
    private function giorniResidui(string $data): string
    {
        // [CONTROLLER APPLICATIVO - Dashboard] Calcola la differenza in giorni.
        $giorni=(int)floor((strtotime($data)-strtotime(date('Y-m-d')))/86400);
        // [CONTROLLER APPLICATIVO - Dashboard] Restituisce il testo.
        return $giorni<=0?'Oggi':$giorni.' gg';
    }
}
