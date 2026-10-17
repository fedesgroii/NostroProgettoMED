# ClinicaFlow — MVC con flusso applicativo rigoroso per funzionalità

Questa versione parte dall’ultima versione MVC disponibile e riorganizza le funzionalità seguendo in modo uniforme il flusso richiesto:

```text
Browser
  ↓
View
  ↓
ControllerGrafico
  ↓
Bean / DTO
  ↓
ControllerApplicativo
  ↓
Model
  ↓
DAO
  ↓
MySQL
```

## Regola architetturale

Per ogni funzionalità applicativa il `ControllerGrafico` gestisce esclusivamente eventi e dati grafici, costruisce il `Bean/DTO` e lo passa al trasporto HTTP. Il `ControllerApplicativo` riceve il DTO, crea e invoca il `Model`, poi usa il `DAO` per l’accesso a MySQL e coordina la risposta. Il `Model` non conosce il Browser, la View o PDO; il `DAO` non conosce la View.

La connessione PDO viene creata una sola volta nell’infrastruttura tecnica e iniettata nei DAO: il DAO resta quindi l’unico componente della funzionalità che esegue SQL. Non esiste un Service/Repository di business tra Model e DAO.

## Package per funzionalità

Sono presenti 12 package funzionali:

- `dashboard_package`
- `appuntamenti_package`
- `pazienti_package`
- `cartelle_cliniche_package`
- `documenti_package`
- `fatturazione_package`
- `tasse_package`
- `report_package`
- `staff_package`
- `impostazioni_package`
- `notifiche_package`
- `sessione_package`

In ogni package sono separati i file del flusso. Per le feature con UI dedicata ci sono anche eventuali View di form.

## Infrastruttura separata

`interfaccia_package/`, `infrastruttura/`, `navigazione_package/` e `funzione_package/` non sono funzionalità di dominio: ospitano rispettivamente View comuni, trasporto/configurazione, navigazione grafica e bootstrap/composition root. Forzarli a passare da Bean → ControllerApplicativo → Model → DAO non aggiungerebbe un flusso dati reale e introdurrebbe dipendenze artificiali.

## UI e comportamento

Il CSS è stato mantenuto invariato. Le View funzionali derivano direttamente dalle View della versione MVC precedente: classi CSS, testi, attributi, ID e markup visualizzato restano gli stessi. I mountpoint tecnici non sono `.page`, quindi non modificano il comportamento CSS.

Le funzionalità demo già presenti restano demo: “Nuovo appuntamento”, “Nuovo paziente” e logout mantengono gli stessi messaggi e non introducono nuove operazioni persistenti. Il drag&drop dell’agenda, che già modificava la posizione dell’appuntamento, passa invece attraverso Bean → ControllerApplicativo → Model → DAO e aggiorna MySQL.

## Dati demo preservati

Lo schema e il seed includono i dati necessari a ricostruire la stessa UI della versione precedente, compreso l’appuntamento di Sara Moretti. Sara viene mantenuta come record tecnico per il vincolo FK ma esclusa dalla tabella pazienti per non cambiare il numero di righe visibili. I mesi sono convertiti in abbreviazioni italiane nel ControllerApplicativo dove necessario.

## Avvio

1. Importare `backend/database/schema.sql`.
2. Importare `backend/database/seed_demo.sql`.
3. Impostare `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`.
4. Servire la cartella con un web server PHP.
5. Aprire `index.html` tramite HTTP, non con `file://`, perché il Browser deve raggiungere l’endpoint PHP.

Esempio con il server PHP incorporato:

```bash
cd clinica-flow-mvc-flusso-strict
DB_HOST=127.0.0.1 DB_PORT=3306 DB_NAME=clinicaflow DB_USER=clinicaflow DB_PASSWORD='' php -S 127.0.0.1:8080 -t .
```

## Produzione

I dati del progetto sono demo. Prima di dati sanitari reali servono autenticazione, autorizzazioni per ruolo, gestione sessioni, audit log, protezione dei documenti, backup, logging sicuro, gestione errori e tutte le misure di sicurezza/conformità applicabili.
