# ARCHITECTURE — Flusso rigoroso per funzionalità

## Flusso vincolante

```text
Browser → View → ControllerGrafico → Bean/DTO → ControllerApplicativo → Model → DAO → MySQL
```

## Regole di dipendenza

1. La View non accede al database.
2. Il ControllerGrafico non contiene SQL né regole di dominio; costruisce il Bean e coordina gli eventi.
3. Il Bean/DTO trasporta i dati tra lato grafico e applicativo.
4. Il ControllerApplicativo è il punto di coordinamento della funzionalità: crea/invoca Model e DAO e costruisce la risposta.
5. Il Model contiene regole/trasformazioni applicative prive di accesso a PDO.
6. Il DAO contiene l’accesso SQL/PDO al database.
7. Il router PHP e il Core sono infrastruttura tecnica e non appartengono a una funzionalità di dominio.

## Package funzionali

### Dashboard — `dashboard_package`
```text
dashboard_package/
├── Dashboard_View.js
├── Dashboard_ControlGrafico.js
├── Dashboard_Bean.js
├── Dashboard_Bean.php
├── Dashboard_ControlApp.php
├── Dashboard_Model.php
└── Dashboard_DAO.php
```

**Flusso:** `Dashboard_View.js` → `Dashboard_ControlGrafico.js` → `Dashboard_Bean.js` → `Dashboard_ControlApp.php` → `Dashboard_Model.php` → `Dashboard_DAO.php` → MySQL.

### Appuntamenti — `appuntamenti_package`
```text
appuntamenti_package/
├── Appuntamenti_View.js
├── Appuntamenti_ControlGrafico.js
├── Appuntamenti_Bean.js
├── Appuntamenti_Bean.php
├── Appuntamenti_ControlApp.php
├── Appuntamenti_Model.php
└── Appuntamenti_DAO.php
```

**Flusso:** `Appuntamenti_View.js` → `Appuntamenti_ControlGrafico.js` → `Appuntamenti_Bean.js` → `Appuntamenti_ControlApp.php` → `Appuntamenti_Model.php` → `Appuntamenti_DAO.php` → MySQL.

### Pazienti — `pazienti_package`
```text
pazienti_package/
├── Pazienti_View.js
├── Pazienti_ControlGrafico.js
├── Pazienti_Bean.js
├── Pazienti_Bean.php
├── Pazienti_ControlApp.php
├── Pazienti_Model.php
└── Pazienti_DAO.php
```

**Flusso:** `Pazienti_View.js` → `Pazienti_ControlGrafico.js` → `Pazienti_Bean.js` → `Pazienti_ControlApp.php` → `Pazienti_Model.php` → `Pazienti_DAO.php` → MySQL.

### Cartelle cliniche — `cartelle_cliniche_package`
```text
cartelle_cliniche_package/
├── Cartelle cliniche_View.js
├── Cartelle cliniche_ControlGrafico.js
├── Cartelle cliniche_Bean.js
├── Cartelle cliniche_Bean.php
├── Cartelle cliniche_ControlApp.php
├── Cartelle cliniche_Model.php
└── Cartelle cliniche_DAO.php
```

**Flusso:** `Cartelle cliniche_View.js` → `Cartelle cliniche_ControlGrafico.js` → `Cartelle cliniche_Bean.js` → `Cartelle cliniche_ControlApp.php` → `Cartelle cliniche_Model.php` → `Cartelle cliniche_DAO.php` → MySQL.

### Documenti — `documenti_package`
```text
documenti_package/
├── Documenti_View.js
├── Documenti_ControlGrafico.js
├── Documenti_Bean.js
├── Documenti_Bean.php
├── Documenti_ControlApp.php
├── Documenti_Model.php
└── Documenti_DAO.php
```

**Flusso:** `Documenti_View.js` → `Documenti_ControlGrafico.js` → `Documenti_Bean.js` → `Documenti_ControlApp.php` → `Documenti_Model.php` → `Documenti_DAO.php` → MySQL.

### Fatturazione — `fatturazione_package`
```text
fatturazione_package/
├── Fatturazione_View.js
├── Fatturazione_ControlGrafico.js
├── Fatturazione_Bean.js
├── Fatturazione_Bean.php
├── Fatturazione_ControlApp.php
├── Fatturazione_Model.php
└── Fatturazione_DAO.php
```

**Flusso:** `Fatturazione_View.js` → `Fatturazione_ControlGrafico.js` → `Fatturazione_Bean.js` → `Fatturazione_ControlApp.php` → `Fatturazione_Model.php` → `Fatturazione_DAO.php` → MySQL.

### Tasse — `tasse_package`
```text
tasse_package/
├── Tasse_View.js
├── Tasse_ControlGrafico.js
├── Tasse_Bean.js
├── Tasse_Bean.php
├── Tasse_ControlApp.php
├── Tasse_Model.php
└── Tasse_DAO.php
```

**Flusso:** `Tasse_View.js` → `Tasse_ControlGrafico.js` → `Tasse_Bean.js` → `Tasse_ControlApp.php` → `Tasse_Model.php` → `Tasse_DAO.php` → MySQL.

### Report — `report_package`
```text
report_package/
├── Report_View.js
├── Report_ControlGrafico.js
├── Report_Bean.js
├── Report_Bean.php
├── Report_ControlApp.php
├── Report_Model.php
└── Report_DAO.php
```

**Flusso:** `Report_View.js` → `Report_ControlGrafico.js` → `Report_Bean.js` → `Report_ControlApp.php` → `Report_Model.php` → `Report_DAO.php` → MySQL.

### Staff — `staff_package`
```text
staff_package/
├── Staff_View.js
├── Staff_ControlGrafico.js
├── Staff_Bean.js
├── Staff_Bean.php
├── Staff_ControlApp.php
├── Staff_Model.php
└── Staff_DAO.php
```

**Flusso:** `Staff_View.js` → `Staff_ControlGrafico.js` → `Staff_Bean.js` → `Staff_ControlApp.php` → `Staff_Model.php` → `Staff_DAO.php` → MySQL.

### Impostazioni — `impostazioni_package`
```text
impostazioni_package/
├── Impostazioni_View.js
├── Impostazioni_ControlGrafico.js
├── Impostazioni_Bean.js
├── Impostazioni_Bean.php
├── Impostazioni_ControlApp.php
├── Impostazioni_Model.php
└── Impostazioni_DAO.php
```

**Flusso:** `Impostazioni_View.js` → `Impostazioni_ControlGrafico.js` → `Impostazioni_Bean.js` → `Impostazioni_ControlApp.php` → `Impostazioni_Model.php` → `Impostazioni_DAO.php` → MySQL.

### Notifiche — `notifiche_package`
```text
notifiche_package/
├── Notifiche_View.js
├── Notifiche_ControlGrafico.js
├── Notifiche_Bean.js
├── Notifiche_Bean.php
├── Notifiche_ControlApp.php
├── Notifiche_Model.php
└── Notifiche_DAO.php
```

**Flusso:** `Notifiche_View.js` → `Notifiche_ControlGrafico.js` → `Notifiche_Bean.js` → `Notifiche_ControlApp.php` → `Notifiche_Model.php` → `Notifiche_DAO.php` → MySQL.

### Sessione — `sessione_package`
```text
sessione_package/
├── Sessione_View.js
├── Sessione_ControlGrafico.js
├── Sessione_Bean.js
├── Sessione_Bean.php
├── Sessione_ControlApp.php
├── Sessione_Model.php
└── Sessione_DAO.php
```

**Flusso:** `Sessione_View.js` → `Sessione_ControlGrafico.js` → `Sessione_Bean.js` → `Sessione_ControlApp.php` → `Sessione_Model.php` → `Sessione_DAO.php` → MySQL.

## Componenti specializzati per feature

`appuntamenti_package` contiene anche `Appuntamenti_Form_View.js`; `pazienti_package` contiene anche `Pazienti_Form_View.js`. Questi sono ulteriori componenti View della stessa singola funzionalità.

## Componenti trasversali

- `interfaccia_package`: View comuni Sidebar/Topbar/Modal/Toast.
- `infrastruttura/js`: configurazione, trasporto HTTP e helper toast.
- `navigazione_package`: solo coordinamento grafico delle pagine.
- `funzione_package`: bootstrap dell’applicazione.
- `backend/Core`: PDO, parsing request e risposta JSON.

## Agenda: controllo di disponibilità

Il flusso resta rigoroso anche per drag&drop: la posizione grafica diventa un Bean, il ControllerApplicativo invoca il Model per la disponibilità oraria e il DAO per la sovrapposizione reale in DB; il DAO esegue l’UPDATE soltanto dopo le validazioni.

Le regole demo originali sono mantenute: slot da 30 minuti, disponibilità 08:30–19:00 e blocco delle sovrapposizioni.
