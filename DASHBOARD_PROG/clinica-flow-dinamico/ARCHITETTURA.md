# Architettura MVC a flusso fisso

La regola del progetto è:

Browser -> View -> ControllerGrafico -> Bean/DTO -> ControllerApplicativo -> Model -> DAO -> MySQL.

## Regole

La View non conosce il backend.
Il ControllerGrafico non contiene SQL e non apre connessioni.
Il Bean/DTO trasporta dati.
Il ControllerApplicativo coordina Model e DAO e applica la logica applicativa.
Il Model contiene regole e trasformazioni di dominio.
Il DAO è l'unico componente della feature che conosce SQL/PDO.

## Stato della migrazione

### Già funzionante
- Dashboard
- Login
- Sessione PHP con utente_id e struttura_id
- Filtraggio delle query Dashboard per struttura_id
- Appuntamenti della giornata
- Scadenze
- Notifiche non lette
- Statistiche
- Grafico incassi

### Predisposto
- Appuntamenti
- Pazienti
- Cartelle cliniche
- Documenti
- Fatturazione
- Tasse
- Report
- Staff
- Impostazioni
- Notifiche
- Sessione

I package predisposti non inventano query: i DAO sono deliberatamente bloccati finché non viene definito lo schema reale di ciascuna funzionalità.

## Perché non esiste un Service

È intenzionale. Il flusso richiesto dal progetto non usa un Service tra ControllerApplicativo e DAO.

## Perché il database viene filtrato per struttura

L'applicazione è pensata per separare i dati di aziende/strutture differenti. La struttura viene recuperata dalla sessione autenticata, non dal browser.
