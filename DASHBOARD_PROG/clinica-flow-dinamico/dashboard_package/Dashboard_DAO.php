<?php
// [DAO - Dashboard] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [DAO - Dashboard] Incapsula le query MySQL della Dashboard.
final class Dashboard_DAO
{
    // [DAO - Dashboard] Riceve la connessione PDO.
    public function __construct(private readonly PDO $connessione) {}

    // [DAO - Dashboard] Recupera il profilo dell'utente nella struttura autenticata.
    public function leggiUtente(int $utenteId, int $strutturaId): array
    {
        // [DAO - Dashboard] Prepara la query parametrizzata.
        $q=$this->connessione->prepare('SELECT id,nome,cognome,ruolo,avatar,ultimo_accesso FROM utenti WHERE id=:utente AND struttura_id=:struttura AND attivo=1 LIMIT 1');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['utente'=>$utenteId,'struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce il record.
        return $q->fetch() ?: [];
    }

    // [DAO - Dashboard] Conta gli appuntamenti di oggi.
    public function contaAppuntamentiOggi(int $strutturaId): int
    {
        // [DAO - Dashboard] Prepara la query.
        $q=$this->connessione->prepare('SELECT COUNT(*) FROM appuntamenti WHERE struttura_id=:struttura AND DATE(data_ora_inizio)=CURDATE() AND stato<>"annullato"');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce il conteggio.
        return (int)$q->fetchColumn();
    }

    // [DAO - Dashboard] Conta gli appuntamenti di ieri.
    public function contaAppuntamentiIeri(int $strutturaId): int
    {
        // [DAO - Dashboard] Prepara la query.
        $q=$this->connessione->prepare('SELECT COUNT(*) FROM appuntamenti WHERE struttura_id=:struttura AND DATE(data_ora_inizio)=DATE_SUB(CURDATE(),INTERVAL 1 DAY) AND stato<>"annullato"');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce il conteggio.
        return (int)$q->fetchColumn();
    }

    // [DAO - Dashboard] Conta i pazienti attivi.
    public function contaPazientiAttivi(int $strutturaId): int
    {
        // [DAO - Dashboard] Prepara la query.
        $q=$this->connessione->prepare('SELECT COUNT(*) FROM pazienti WHERE struttura_id=:struttura AND stato="attivo"');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce il conteggio.
        return (int)$q->fetchColumn();
    }

    // [DAO - Dashboard] Conta i nuovi pazienti del mese.
    public function contaNuoviPazientiMese(int $strutturaId): int
    {
        // [DAO - Dashboard] Prepara la query.
        $q=$this->connessione->prepare('SELECT COUNT(*) FROM pazienti WHERE struttura_id=:struttura AND data_creazione>=DATE_FORMAT(CURDATE(),"%Y-%m-01")');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce il conteggio.
        return (int)$q->fetchColumn();
    }

    // [DAO - Dashboard] Calcola gli incassi del mese corrente.
    public function incassiMese(int $strutturaId,string $mese): float
    {
        // [DAO - Dashboard] Prepara la query aggregata.
        $q=$this->connessione->prepare('SELECT COALESCE(SUM(importo),0) FROM incassi WHERE struttura_id=:struttura AND data_incasso>=:mese AND data_incasso<DATE_ADD(:mese_fine,INTERVAL 1 MONTH)');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId,'mese'=>$mese,'mese_fine'=>$mese]);
        // [DAO - Dashboard] Restituisce l'importo.
        return (float)$q->fetchColumn();
    }

    // [DAO - Dashboard] Calcola gli incassi del mese precedente.
    public function incassiMesePrecedente(int $strutturaId,string $mese): float
    {
        // [DAO - Dashboard] Prepara la query aggregata.
        $q=$this->connessione->prepare('SELECT COALESCE(SUM(importo),0) FROM incassi WHERE struttura_id=:struttura AND data_incasso>=:mese AND data_incasso<DATE_ADD(:mese_fine,INTERVAL 1 MONTH)');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId,'mese'=>$mese,'mese_fine'=>$mese]);
        // [DAO - Dashboard] Restituisce l'importo.
        return (float)$q->fetchColumn();
    }

    // [DAO - Dashboard] Conta le scadenze entro 30 giorni.
    public function contaScadenze(int $strutturaId): int
    {
        // [DAO - Dashboard] Prepara la query.
        $q=$this->connessione->prepare('SELECT COUNT(*) FROM scadenze WHERE struttura_id=:struttura AND data_scadenza BETWEEN CURDATE() AND DATE_ADD(CURDATE(),INTERVAL 30 DAY) AND stato<>"completata"');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce il conteggio.
        return (int)$q->fetchColumn();
    }

    // [DAO - Dashboard] Conta le notifiche non lette.
    public function contaNotifiche(int $utenteId,int $strutturaId): int
    {
        // [DAO - Dashboard] Prepara la query.
        $q=$this->connessione->prepare('SELECT COUNT(*) FROM notifiche WHERE utente_id=:utente AND struttura_id=:struttura AND letta=0');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['utente'=>$utenteId,'struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce il conteggio.
        return (int)$q->fetchColumn();
    }

    // [DAO - Dashboard] Recupera gli appuntamenti di oggi.
    public function leggiAppuntamenti(int $strutturaId): array
    {
        // [DAO - Dashboard] Prepara la query con join paziente.
        $q=$this->connessione->prepare('SELECT a.data_ora_inizio,a.tipologia,a.stato,p.nome,p.cognome FROM appuntamenti a INNER JOIN pazienti p ON p.id=a.paziente_id WHERE a.struttura_id=:struttura AND DATE(a.data_ora_inizio)=CURDATE() AND a.stato<>"annullato" ORDER BY a.data_ora_inizio ASC LIMIT 5');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce le righe.
        return $q->fetchAll() ?: [];
    }

    // [DAO - Dashboard] Recupera le prossime scadenze.
    public function leggiScadenze(int $strutturaId): array
    {
        // [DAO - Dashboard] Prepara la query.
        $q=$this->connessione->prepare('SELECT data_scadenza,titolo,descrizione,stato FROM scadenze WHERE struttura_id=:struttura AND data_scadenza>=CURDATE() ORDER BY data_scadenza ASC LIMIT 4');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce le righe.
        return $q->fetchAll() ?: [];
    }

    // [DAO - Dashboard] Recupera gli incassi degli ultimi sei mesi.
    public function leggiAndamento(int $strutturaId): array
    {
        // [DAO - Dashboard] Prepara la query aggregata.
        $q=$this->connessione->prepare('SELECT DATE_FORMAT(data_incasso,"%Y-%m") periodo,COALESCE(SUM(importo),0) totale FROM incassi WHERE struttura_id=:struttura AND data_incasso>=DATE_FORMAT(DATE_SUB(CURDATE(),INTERVAL 5 MONTH),"%Y-%m-01") GROUP BY DATE_FORMAT(data_incasso,"%Y-%m") ORDER BY periodo ASC');
        // [DAO - Dashboard] Esegue la query.
        $q->execute(['struttura'=>$strutturaId]);
        // [DAO - Dashboard] Restituisce la serie.
        return $q->fetchAll() ?: [];
    }
}
