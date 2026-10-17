# CODE_COMPLETE — Tutti i file del progetto

Il documento contiene il contenuto completo e aggiornato di ogni file sorgente/codice del progetto.

## `ARCHITECTURE.md`

```text
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

```

## `README.md`

```text
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

```

## `VERIFICA_FLUSSO.md`

```text
# VERIFICA FINALE

- css_hash_identico: OK
- script_src_presenti: OK
- feature_package_count: OK
- feature_bean_js_count: OK
- feature_bean_php_count: OK
- feature_control_grafico_count: OK
- feature_control_app_count: OK
- feature_model_count: OK
- feature_dao_count: OK
- JavaScript analizzati: 47
- PHP analizzati: 54
- Mountpoint page tecnici: 10
- CSS SHA-256 precedente: `952bf91f37fa2d535f7da564fe987a687450a8ae763c8a5c1e798fb2d2cf4896`
- CSS SHA-256 nuovo: `952bf91f37fa2d535f7da564fe987a687450a8ae763c8a5c1e798fb2d2cf4896`
- Script mancanti: nessuno

```

## `backend/Core/Database.php`

```php
<?php
// [INFRASTRUTTURA] Apre il componente tecnico della connessione al database.
declare(strict_types=1);
// [INFRASTRUTTURA] Colloca la classe nella struttura tecnica dell'applicazione.
namespace ClinicaFlow\Core;
// [INFRASTRUTTURA] Importa PDO per utilizzare prepared statement.
use PDO;
// [INFRASTRUTTURA] Crea la connessione MySQL condivisa ai DAO.
final class Database
{
    // [INFRASTRUTTURA] Costruisce e configura una connessione PDO.
    public static function crea(array $config): PDO
    {
        // [INFRASTRUTTURA] Costruisce il DSN utf8mb4 usato dall'applicazione.
        $dsn = sprintf('mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4', $config['db_host'], $config['db_port'], $config['db_name']);
        // [INFRASTRUTTURA] Restituisce PDO con errori a eccezione e risultati associativi.
        return new PDO($dsn, $config['db_user'], $config['db_password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false]);
    }
}

```

## `backend/Core/JsonResponse.php`

```php
<?php
// [INFRASTRUTTURA] Apre il componente tecnico per le risposte JSON.
declare(strict_types=1);
// [INFRASTRUTTURA] Colloca la risposta nella struttura tecnica.
namespace ClinicaFlow\Core;
// [INFRASTRUTTURA] Centralizza la serializzazione delle risposte HTTP.
final class JsonResponse
{
    // [INFRASTRUTTURA] Invia dati JSON con codice HTTP esplicito.
    public static function invia(array $dati, int $status = 200): never
    {
        // [INFRASTRUTTURA] Imposta lo status HTTP della risposta.
        http_response_code($status);
        // [INFRASTRUTTURA] Imposta il content type JSON UTF-8.
        header('Content-Type: application/json; charset=utf-8');
        // [INFRASTRUTTURA] Serializza i dati senza logica di dominio.
        echo json_encode($dati, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        // [INFRASTRUTTURA] Interrompe il front controller dopo aver risposto.
        exit;
    }
}

```

## `backend/Core/Request.php`

```php
<?php
// [INFRASTRUTTURA] Apre il parser tecnico delle richieste HTTP.
declare(strict_types=1);
// [INFRASTRUTTURA] Colloca il parser nella struttura tecnica.
namespace ClinicaFlow\Core;
// [INFRASTRUTTURA] Centralizza la lettura JSON in ingresso ai ControllerApplicativi.
final class Request
{
    // [INFRASTRUTTURA] Legge il body JSON della richiesta corrente.
    public static function json(): array
    {
        // [INFRASTRUTTURA] Recupera il body grezzo inviato dal ControllerGrafico.
        $contenuto = file_get_contents('php://input');
        // [INFRASTRUTTURA] Decodifica il body nel formato associativo PHP.
        $dati = json_decode($contenuto ?: '{}', true);
        // [INFRASTRUTTURA] Garantisce ai ControllerApplicativi un array valido.
        return is_array($dati) ? $dati : [];
    }
    // [INFRASTRUTTURA] Legge un parametro query per il routing della funzionalità.
    public static function query(string $chiave): ?string
    {
        // [INFRASTRUTTURA] Restituisce il valore della query string se presente.
        return isset($_GET[$chiave]) ? (string)$_GET[$chiave] : null;
    }
}

```

## `backend/README.md`

```text
# Backend PHP / MySQL

Il backend è un front controller tecnico che istanzia il `*_ControlApp.php` corretto.

La logica di dominio resta nel package della singola funzionalità:

```text
ControllerGrafico JS
  -> Bean JS
  -> HTTP
  -> Bean PHP
  -> *_ControlApp.php
  -> *_Model.php
  -> *_DAO.php
  -> PDO / MySQL
```

Non esiste un Service o Repository di business: il punto di coordinamento è sempre `*_ControlApp.php`, secondo il flusso richiesto.

```

## `backend/bootstrap.php`

```php
<?php
// [INFRASTRUTTURA] Abilita i tipi stretti nel bootstrap.
declare(strict_types=1);
// [INFRASTRUTTURA] Registra un autoloader locale che mantiene i package funzionali separati.
spl_autoload_register(static function (string $classe): void {
    // [INFRASTRUTTURA] Ignora classi esterne al namespace applicativo.
    if (!str_starts_with($classe, 'ClinicaFlow\\')) return;
    // [INFRASTRUTTURA] Rimuove il prefisso namespace applicativo.
    $relativo = substr($classe, strlen('ClinicaFlow\\'));
    // [INFRASTRUTTURA] Traduce i package PHP in percorsi dentro funzionalita/.
    $parti = explode('\\', $relativo);
    // [INFRASTRUTTURA] Gestisce i Componenti Core nella cartella backend/Core.
    if (($parti[0] ?? '') === 'Core') { $file = __DIR__.'/Core/'.end($parti).'.php'; }
    else { $file = dirname(__DIR__).'/funzionalita/'.($parti[0] ?? '').'/'.end($parti).'.php'; }
    // [INFRASTRUTTURA] Carica la classe se il file del package esiste.
    if (is_file($file)) require_once $file;
});
// [INFRASTRUTTURA] Carica la configurazione applicativa.
$config = require __DIR__.'/config/config.php';
// [INFRASTRUTTURA] Crea l'unica connessione PDO condivisa dai ControllerApplicativi.
$pdo = \ClinicaFlow\Core\Database::crea($config);

```

## `backend/config/config.php`

```php
<?php
// [CONFIG] Abilita i tipi stretti nella configurazione backend.
declare(strict_types=1);
// [CONFIG] Restituisce la configurazione applicativa e database da variabili d'ambiente.
return [
    // [CONFIG] Definisce l'ambiente applicativo senza inserire segreti nel repository.
    'app_env' => getenv('APP_ENV') ?: 'development',
    // [CONFIG] Definisce l'host MySQL.
    'db_host' => getenv('DB_HOST') ?: '127.0.0.1',
    // [CONFIG] Definisce la porta MySQL.
    'db_port' => (int)(getenv('DB_PORT') ?: 3306),
    // [CONFIG] Definisce il nome del database.
    'db_name' => getenv('DB_NAME') ?: 'clinicaflow',
    // [CONFIG] Definisce l'utente MySQL.
    'db_user' => getenv('DB_USER') ?: 'clinicaflow',
    // [CONFIG] Definisce la password MySQL da ambiente.
    'db_password' => getenv('DB_PASSWORD') ?: '',
];

```

## `backend/database/schema.sql`

```sql
CREATE DATABASE IF NOT EXISTS clinicaflow CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE clinicaflow;
CREATE TABLE IF NOT EXISTS professionals (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, specialty VARCHAR(120) NOT NULL, role VARCHAR(120) NULL, active TINYINT(1) NOT NULL DEFAULT 1);
CREATE TABLE IF NOT EXISTS patients (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, code VARCHAR(32) NOT NULL UNIQUE, phone VARCHAR(40) NULL, email VARCHAR(190) NULL, status VARCHAR(32) NOT NULL DEFAULT 'active', last_visit VARCHAR(32) NULL, next_appointment VARCHAR(64) NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE IF NOT EXISTS appointments (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, patient_id INT UNSIGNED NOT NULL, professional_id INT UNSIGNED NULL, appointment_date DATE NOT NULL, start_time TIME NOT NULL, duration_minutes SMALLINT UNSIGNED NOT NULL, type VARCHAR(120) NOT NULL, status VARCHAR(32) NOT NULL DEFAULT 'confirmed', color_class VARCHAR(60) NOT NULL, CONSTRAINT fk_app_patient FOREIGN KEY (patient_id) REFERENCES patients(id), CONSTRAINT fk_app_professional FOREIGN KEY (professional_id) REFERENCES professionals(id));
CREATE TABLE IF NOT EXISTS clinical_notes (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, patient_id INT UNSIGNED NOT NULL, professional_id INT UNSIGNED NULL, note_date DATETIME NOT NULL, session_type VARCHAR(120) NOT NULL, note_text TEXT NOT NULL, status VARCHAR(32) NOT NULL DEFAULT 'draft', CONSTRAINT fk_note_patient FOREIGN KEY (patient_id) REFERENCES patients(id), CONSTRAINT fk_note_prof FOREIGN KEY (professional_id) REFERENCES professionals(id));
CREATE TABLE IF NOT EXISTS documents (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, patient_id INT UNSIGNED NULL, file_name VARCHAR(255) NOT NULL, category VARCHAR(80) NOT NULL, owner_display VARCHAR(180) NOT NULL, document_date DATE NOT NULL, status_label VARCHAR(80) NOT NULL, status_class VARCHAR(32) NOT NULL);
CREATE TABLE IF NOT EXISTS invoices (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, invoice_number VARCHAR(40) NOT NULL UNIQUE, patient_id INT UNSIGNED NOT NULL, client_name VARCHAR(180) NOT NULL, service VARCHAR(160) NOT NULL, amount_display VARCHAR(32) NOT NULL, issue_date DATE NOT NULL, status_label VARCHAR(80) NOT NULL, status_class VARCHAR(32) NOT NULL);
CREATE TABLE IF NOT EXISTS deadlines (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, due_date DATE NOT NULL, title VARCHAR(180) NOT NULL, description VARCHAR(255) NOT NULL, badge VARCHAR(80) NOT NULL, urgent TINYINT(1) NOT NULL DEFAULT 0);
CREATE TABLE IF NOT EXISTS dashboard_statistics (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, position_no INT NOT NULL, label VARCHAR(120) NOT NULL, value VARCHAR(80) NOT NULL, detail VARCHAR(180) NOT NULL, detail_class VARCHAR(32) NULL, icon VARCHAR(10) NOT NULL, icon_class VARCHAR(32) NOT NULL);
CREATE TABLE IF NOT EXISTS dashboard_chart (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, position_no INT NOT NULL, month_label VARCHAR(16) NOT NULL, amount_value DECIMAL(12,2) NOT NULL);
CREATE TABLE IF NOT EXISTS report_metrics (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, position_no INT NOT NULL, label VARCHAR(120) NOT NULL, value_display VARCHAR(80) NOT NULL, width_value INT NOT NULL, detail VARCHAR(180) NOT NULL);
CREATE TABLE IF NOT EXISTS notifications (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, active TINYINT(1) NOT NULL DEFAULT 1, title VARCHAR(160) NOT NULL);
CREATE TABLE IF NOT EXISTS session_demo (id INT UNSIGNED PRIMARY KEY, active TINYINT(1) NOT NULL DEFAULT 1);
CREATE TABLE IF NOT EXISTS structure_settings (id INT UNSIGNED PRIMARY KEY, name VARCHAR(180) NOT NULL, vat_number VARCHAR(40) NULL, phone VARCHAR(40) NULL, email VARCHAR(190) NULL, address VARCHAR(255) NULL);
CREATE OR REPLACE VIEW patients_view AS SELECT p.id, CONCAT(UPPER(SUBSTRING(p.first_name,1,1)),UPPER(SUBSTRING(p.last_name,1,1))) AS initials, CONCAT(p.first_name,' ',p.last_name) AS name_display, p.code, CASE p.id WHEN 4 THEN 'Luca Verdi' WHEN 5 THEN 'Elena Neri' ELSE 'Giorgia Sgroi' END AS professional, CASE p.id WHEN 4 THEN 'Logopedia' WHEN 5 THEN 'Dietologia' ELSE 'Psicologia' END AS specialty, p.last_visit, p.next_appointment, CASE p.status WHEN 'waiting' THEN 'In attesa' ELSE 'Attivo' END AS status_label FROM patients p WHERE p.id BETWEEN 1 AND 5;
CREATE OR REPLACE VIEW documents_view AS SELECT d.id, d.file_name, d.category, d.owner_display, d.document_date, d.status_label, d.status_class FROM documents d;
CREATE OR REPLACE VIEW invoices_view AS SELECT i.id, i.invoice_number, i.client_name, i.service, i.amount_display, i.issue_date, i.status_label, i.status_class FROM invoices i;
CREATE OR REPLACE VIEW deadlines_view AS SELECT d.id, d.due_date, d.title, d.description, d.badge, d.urgent FROM deadlines d;
CREATE OR REPLACE VIEW professionals_view AS SELECT p.id, CONCAT(UPPER(SUBSTRING(p.first_name,1,1)),UPPER(SUBSTRING(p.last_name,1,1))) AS initials, CONCAT(p.first_name,' ',p.last_name) AS name_display, p.specialty, COALESCE(p.role,'') AS role, CASE WHEN p.active=1 THEN 'Attivo' ELSE 'Sospeso' END AS status_label FROM professionals p;

```

## `backend/database/seed_demo.sql`

```sql
USE clinicaflow;
INSERT INTO professionals (id,first_name,last_name,specialty,role,active) VALUES
(1,'Giorgia','Sgroi','Psicologa','Amministratrice',1),(2,'Luca','Verdi','Logopedista',NULL,1),(3,'Elena','Neri','Dietista',NULL,1)
ON DUPLICATE KEY UPDATE first_name=VALUES(first_name),last_name=VALUES(last_name),specialty=VALUES(specialty),role=VALUES(role),active=VALUES(active);
INSERT INTO patients (id,first_name,last_name,code,phone,email,status,last_visit,next_appointment) VALUES
(1,'Laura','Bianchi','PT-00124',NULL,NULL,'active','22/09/2026','29/09/2026 · 09:00'),
(2,'Marco','Esposito','PT-00118',NULL,NULL,'active','22/09/2026','06/10/2026 · 10:30'),
(3,'Giulia','Romano','PT-00107',NULL,NULL,'active','15/09/2026','22/09/2026 · 12:00'),
(4,'Sofia','Costa','PT-00098',NULL,NULL,'active','18/09/2026','25/09/2026 · 16:00'),
(5,'Andrea','Ferri','PT-00086',NULL,NULL,'waiting','10/09/2026','01/10/2026 · 14:30'),(6,'Sara','Moretti','PT-00087',NULL,NULL,'active',NULL,'')
ON DUPLICATE KEY UPDATE first_name=VALUES(first_name),last_name=VALUES(last_name),status=VALUES(status),last_visit=VALUES(last_visit),next_appointment=VALUES(next_appointment);
INSERT INTO appointments (id,patient_id,professional_id,appointment_date,start_time,duration_minutes,type,status,color_class) VALUES
(1,1,1,'2026-09-22','09:00:00',60,'Psicologia','confirmed','teal-block'),
(2,2,1,'2026-09-22','10:30:00',60,'Primo colloquio','confirmed','blue-block'),
(3,3,1,'2026-09-22','12:00:00',60,'Follow-up','current','purple-block'),
(4,4,1,'2026-09-22','15:00:00',60,'Seduta','pending','orange-block'),
(5,6,1,'2026-09-22','17:30:00',60,'Seduta','confirmed','teal-block')
ON DUPLICATE KEY UPDATE appointment_date=VALUES(appointment_date),start_time=VALUES(start_time),status=VALUES(status),color_class=VALUES(color_class);
INSERT INTO clinical_notes (id,patient_id,professional_id,note_date,session_type,note_text,status) VALUES
(1,1,1,'2026-09-22 12:00:00','Seduta individuale','Area dedicata alla nota clinica. In produzione questa sezione sarà collegata al backend e ai permessi professionali.','draft'),
(2,1,1,'2026-09-15 12:00:00','Follow-up','Spazio per annotazioni della seduta e obiettivi concordati.','signed')
ON DUPLICATE KEY UPDATE note_text=VALUES(note_text),status=VALUES(status);
INSERT INTO documents (id,patient_id,file_name,category,owner_display,document_date,status_label,status_class) VALUES
(1,1,'Consenso informato.pdf','Clinico','Laura Bianchi','2026-09-22','Da firmare','pending'),
(2,1,'Fattura 2026-089.pdf','Amministrativo','Laura Bianchi','2026-09-22','Archiviato','confirmed'),
(3,2,'Documento identità.pdf','Anagrafica','Marco Esposito','2026-09-20','Verificato','confirmed')
ON DUPLICATE KEY UPDATE status_label=VALUES(status_label),status_class=VALUES(status_class);
INSERT INTO invoices (id,invoice_number,patient_id,client_name,service,amount_display,issue_date,status_label,status_class) VALUES
(1,'#2026-089',1,'Laura Bianchi','Seduta psicologica','€ 70,00','2026-09-22','Pagata','confirmed'),
(2,'#2026-088',2,'Marco Esposito','Primo colloquio','€ 80,00','2026-09-22','Da pagare','pending'),
(3,'#2026-087',4,'Sofia Costa','Logopedia','€ 55,00','2026-09-21','Pagata','confirmed')
ON DUPLICATE KEY UPDATE status_label=VALUES(status_label),status_class=VALUES(status_class);
INSERT INTO deadlines (id,due_date,title,description,badge,urgent) VALUES
(1,'2026-09-30','Fatture da emettere','8 prestazioni ancora da fatturare','Da completare',1),
(2,'2026-10-16','Versamento IVA','Importo da confermare','In programma',0),
(3,'2026-10-30','Contributi previdenziali','Promemoria per il professionista','In programma',0),
(4,'2026-11-15','Invio documentazione al commercialista','Estratto contabile e fatture','In programma',0)
ON DUPLICATE KEY UPDATE title=VALUES(title),description=VALUES(description),badge=VALUES(badge),urgent=VALUES(urgent);
INSERT INTO dashboard_statistics (id,position_no,label,value,detail,detail_class,icon,icon_class) VALUES
(1,1,'Appuntamenti oggi','8','+2 rispetto a ieri','positive','◷','teal'),
(2,2,'Pazienti attivi','124','6 nuovi questo mese',NULL,'♙','blue'),
(3,3,'Incassi del mese','€ 7.840','+8,4% vs mese scorso','positive','€','purple'),
(4,4,'Scadenze vicine','4','Entro 30 giorni','warning-text','!','orange')
ON DUPLICATE KEY UPDATE label=VALUES(label),value=VALUES(value),detail=VALUES(detail),detail_class=VALUES(detail_class),icon=VALUES(icon),icon_class=VALUES(icon_class);
DELETE FROM dashboard_chart; INSERT INTO dashboard_chart (position_no,month_label,amount_value) VALUES (1,'Apr',175),(2,'Mag',150),(3,'Giu',160),(4,'Lug',105),(5,'Ago',125),(6,'Set',70);
INSERT INTO report_metrics (position_no,label,value_display,width_value,detail) VALUES (1,'Prestazioni erogate','186',72,'+12% rispetto ad agosto'),(2,'Tasso di presenza','91,4%',91,'Su 204 appuntamenti'),(3,'Nuovi pazienti','18',46,'Ultimi 30 giorni'),(4,'Incasso medio','€ 50,22',63,'Per prestazione') ON DUPLICATE KEY UPDATE label=VALUES(label),value_display=VALUES(value_display),width_value=VALUES(width_value),detail=VALUES(detail);
INSERT INTO notifications (id,active,title) VALUES (1,1,'Documento da firmare'),(2,1,'Pagamento'),(3,1,'Scadenza') ON DUPLICATE KEY UPDATE active=VALUES(active);
INSERT INTO session_demo (id,active) VALUES (1,1) ON DUPLICATE KEY UPDATE active=VALUES(active);
INSERT INTO structure_settings (id,name,vat_number,phone,email,address) VALUES (1,'Centro Salute & Benessere','IT 01234567890','+39 06 1234 5678','segreteria@centrosalute.it','Via Roma 25, Roma') ON DUPLICATE KEY UPDATE name=VALUES(name),vat_number=VALUES(vat_number),phone=VALUES(phone),email=VALUES(email),address=VALUES(address);

```

## `backend/public/index.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Router] Carica il bootstrap prima di instradare la funzionalità.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Router] Include connessione e autoloader tecnici.
require dirname(__DIR__).'/bootstrap.php';
// [CONTROLLER APPLICATIVO - Router] Importa il parser request.
use ClinicaFlow\Core\Request;
// [CONTROLLER APPLICATIVO - Router] Importa il gestore JSON.
use ClinicaFlow\Core\JsonResponse;
// [CONTROLLER APPLICATIVO - Router] Legge la funzionalità richiesta dal ControllerGrafico.
$funzione = Request::query('funzione') ?? '';
// [CONTROLLER APPLICATIVO - Router] Legge il Bean/DTO inviato dal browser.
$payload = Request::json();
try {
    // [CONTROLLER APPLICATIVO - Router] Smista Dashboard al suo ControllerApplicativo dedicato.
    if ($funzione === 'dashboard') { $c = new \ClinicaFlow\dashboard_package\Dashboard_ControlApp(new \ClinicaFlow\dashboard_package\Dashboard_DAO($pdo)); $b = \ClinicaFlow\dashboard_package\Dashboard_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Appuntamenti al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'appuntamenti') { $c = new \ClinicaFlow\appuntamenti_package\Appuntamenti_ControlApp(new \ClinicaFlow\appuntamenti_package\Appuntamenti_DAO($pdo)); $b = \ClinicaFlow\appuntamenti_package\Appuntamenti_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Pazienti al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'pazienti') { $c = new \ClinicaFlow\pazienti_package\Pazienti_ControlApp(new \ClinicaFlow\pazienti_package\Pazienti_DAO($pdo)); $b = \ClinicaFlow\pazienti_package\Pazienti_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Cartelle cliniche al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'cartelle_cliniche') { $c = new \ClinicaFlow\cartelle_cliniche_package\CartelleCliniche_ControlApp(new \ClinicaFlow\cartelle_cliniche_package\CartelleCliniche_DAO($pdo)); $b = \ClinicaFlow\cartelle_cliniche_package\CartelleCliniche_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Documenti al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'documenti') { $c = new \ClinicaFlow\documenti_package\Documenti_ControlApp(new \ClinicaFlow\documenti_package\Documenti_DAO($pdo)); $b = \ClinicaFlow\documenti_package\Documenti_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Fatturazione al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'fatturazione') { $c = new \ClinicaFlow\fatturazione_package\Fatturazione_ControlApp(new \ClinicaFlow\fatturazione_package\Fatturazione_DAO($pdo)); $b = \ClinicaFlow\fatturazione_package\Fatturazione_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Tasse al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'tasse') { $c = new \ClinicaFlow\tasse_package\Tasse_ControlApp(new \ClinicaFlow\tasse_package\Tasse_DAO($pdo)); $b = \ClinicaFlow\tasse_package\Tasse_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Report al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'report') { $c = new \ClinicaFlow\report_package\Report_ControlApp(new \ClinicaFlow\report_package\Report_DAO($pdo)); $b = \ClinicaFlow\report_package\Report_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Staff al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'staff') { $c = new \ClinicaFlow\staff_package\Staff_ControlApp(new \ClinicaFlow\staff_package\Staff_DAO($pdo)); $b = \ClinicaFlow\staff_package\Staff_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Impostazioni al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'impostazioni') { $c = new \ClinicaFlow\impostazioni_package\Impostazioni_ControlApp(new \ClinicaFlow\impostazioni_package\Impostazioni_DAO($pdo)); $b = \ClinicaFlow\impostazioni_package\Impostazioni_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Notifiche al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'notifiche') { $c = new \ClinicaFlow\notifiche_package\Notifiche_ControlApp(new \ClinicaFlow\notifiche_package\Notifiche_DAO($pdo)); $b = \ClinicaFlow\notifiche_package\Notifiche_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Smista Sessione al suo ControllerApplicativo dedicato.
    elseif ($funzione === 'sessione') { $c = new \ClinicaFlow\sessione_package\Sessione_ControlApp(new \ClinicaFlow\sessione_package\Sessione_DAO($pdo)); $b = \ClinicaFlow\sessione_package\Sessione_Bean::daArray($payload); JsonResponse::invia(['data' => $c->esegui($b)]); }
    // [CONTROLLER APPLICATIVO - Router] Restituisce 404 per una funzione sconosciuta.
    else JsonResponse::invia(['message' => 'Funzionalità non trovata.'], 404);
} catch (InvalidArgumentException $eccezione) {
    // [CONTROLLER APPLICATIVO - Router] Converte gli errori di validazione in 422.
    JsonResponse::invia(['message' => $eccezione->getMessage()], 422);
} catch (Throwable $eccezione) {
    // [CONTROLLER APPLICATIVO - Router] Nasconde i dettagli interni in produzione.
    JsonResponse::invia(['message' => 'Errore interno del server.'], 500);
}

```

## `funzionalita/appuntamenti_package/Appuntamenti_Bean.js`

```javascript
// [BEAN/DTO - Appuntamenti] Crea lo spazio globale della funzionalità Appuntamenti.
window.ClinicaFlow.appuntamenti_package = window.ClinicaFlow.appuntamenti_package || {};
// [BEAN/DTO - Appuntamenti] Incapsula le richieste e i dati degli appuntamenti.
window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean = class Appuntamenti_Bean {
  // [BEAN/DTO - Appuntamenti] Costruisce il DTO con tutti i dati necessari alle operazioni.
  constructor({ operazione = 'carica', id = null, data = '', orario = '', durata = 60, pazienteId = null, professionistaId = 1, tipo = '', appuntamenti = [] } = {}) {
    // [BEAN/DTO - Appuntamenti] Memorizza l'operazione richiesta.
    this.operazione = operazione;
    // [BEAN/DTO - Appuntamenti] Memorizza l'identificativo dell'appuntamento.
    this.id = id;
    // [BEAN/DTO - Appuntamenti] Memorizza la data target.
    this.data = data;
    // [BEAN/DTO - Appuntamenti] Memorizza l'orario target.
    this.orario = orario;
    // [BEAN/DTO - Appuntamenti] Memorizza la durata.
    this.durata = durata;
    // [BEAN/DTO - Appuntamenti] Memorizza il paziente selezionato.
    this.pazienteId = pazienteId;
    // [BEAN/DTO - Appuntamenti] Memorizza il professionista selezionato.
    this.professionistaId = professionistaId;
    // [BEAN/DTO - Appuntamenti] Memorizza la tipologia.
    this.tipo = tipo;
    // [BEAN/DTO - Appuntamenti] Memorizza gli appuntamenti ricevuti dal server per la View.
    this.appuntamenti = appuntamenti.map((riga) => this._creaRiga(riga));
  }
  // [BEAN/DTO - Appuntamenti] Crea l'oggetto riga con il metodo grafico usato da Appuntamenti_View.
  _creaRiga(riga) {
    // [BEAN/DTO - Appuntamenti] Restituisce i campi necessari senza introdurre regole di dominio.
    return { ...riga, getAgendaLabel: () => `${riga.time} · ${riga.type}` };
  }
  // [BEAN/DTO - Appuntamenti] Serializza soltanto i dati richiesti dal ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Appuntamenti] Restituisce il contratto JSON della funzionalità.
    return { operazione: this.operazione, id: this.id, data: this.data, orario: this.orario, durata: this.durata, pazienteId: this.pazienteId, professionistaId: this.professionistaId, tipo: this.tipo };
  }
  // [BEAN/DTO - Appuntamenti] Ricostruisce il DTO risposta con le righe dell'agenda.
  static daRisposta(dati) {
    // [BEAN/DTO - Appuntamenti] Restituisce un Bean pronto per Appuntamenti_View.
    return new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ dati, appuntamenti: dati.appuntamenti || [] });
  }
  // [BEAN/DTO - Appuntamenti] Costruisce il DTO per un movimento di agenda.
  static movimentoDaElemento(elemento, data, orario) {
    // [BEAN/DTO - Appuntamenti] Crea il Bean usando i data-* già presenti nella View.
    return new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ operazione: 'sposta', id: elemento.dataset.id, data, orario, durata: Number(elemento.dataset.duration) || 60 });
  }
};

```

## `funzionalita/appuntamenti_package/Appuntamenti_Bean.php`

```php
<?php
// [BEAN/DTO - Appuntamenti] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Appuntamenti] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\appuntamenti_package;
// [BEAN/DTO - Appuntamenti] Incapsula i dati che attraversano il confine Browser/ControllerApplicativo.
final class Appuntamenti_Bean
{
    // [BEAN/DTO - Appuntamenti] Dichiara il campo operazione del DTO.
    public mixed $operazione;
// [BEAN/DTO - Appuntamenti] Dichiara il campo id del DTO.
    public mixed $id;
// [BEAN/DTO - Appuntamenti] Dichiara il campo data del DTO.
    public mixed $data;
// [BEAN/DTO - Appuntamenti] Dichiara il campo orario del DTO.
    public mixed $orario;
// [BEAN/DTO - Appuntamenti] Dichiara il campo durata del DTO.
    public mixed $durata;
// [BEAN/DTO - Appuntamenti] Dichiara il campo pazienteId del DTO.
    public mixed $pazienteId;
// [BEAN/DTO - Appuntamenti] Dichiara il campo professionistaId del DTO.
    public mixed $professionistaId;
// [BEAN/DTO - Appuntamenti] Dichiara il campo tipo del DTO.
    public mixed $tipo;
    // [BEAN/DTO - Appuntamenti] Costruisce il DTO server-side con i dati del browser.
    public function __construct(string|int|null $operazione = null, string|int|null $id = null, string|int|null $data = null, string|int|null $orario = null, string|int|null $durata = null, string|int|null $pazienteId = null, string|int|null $professionistaId = null, string|int|null $tipo = null)
    {
        // [BEAN/DTO - Appuntamenti] Memorizza il campo operazione ricevuto dal browser.
        $this->operazione = $operazione;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo id ricevuto dal browser.
        $this->id = $id;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo data ricevuto dal browser.
        $this->data = $data;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo orario ricevuto dal browser.
        $this->orario = $orario;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo durata ricevuto dal browser.
        $this->durata = $durata;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo pazienteId ricevuto dal browser.
        $this->pazienteId = $pazienteId;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo professionistaId ricevuto dal browser.
        $this->professionistaId = $professionistaId;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo tipo ricevuto dal browser.
        $this->tipo = $tipo;
    }
    // [BEAN/DTO - Appuntamenti] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Appuntamenti] Legge il campo operazione dal payload del ControllerGrafico.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo id dal payload del ControllerGrafico.
        $id = $dati['id'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo data dal payload del ControllerGrafico.
        $data = $dati['data'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo orario dal payload del ControllerGrafico.
        $orario = $dati['orario'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo durata dal payload del ControllerGrafico.
        $durata = $dati['durata'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo pazienteId dal payload del ControllerGrafico.
        $pazienteId = $dati['pazienteId'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo professionistaId dal payload del ControllerGrafico.
        $professionistaId = $dati['professionistaId'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo tipo dal payload del ControllerGrafico.
        $tipo = $dati['tipo'] ?? null;
        // [BEAN/DTO - Appuntamenti] Restituisce l'istanza DTO tipizzata.
        return new self($operazione, $id, $data, $orario, $durata, $pazienteId, $professionistaId, $tipo);
    }
}

```

## `funzionalita/appuntamenti_package/Appuntamenti_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Appuntamenti] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Appuntamenti] Colloca il controller nel package appuntamenti.
namespace ClinicaFlow\appuntamenti_package;
// [CONTROLLER APPLICATIVO - Appuntamenti] Importa il Bean/DTO server.
use ClinicaFlow\appuntamenti_package\Appuntamenti_Bean;
// [CONTROLLER APPLICATIVO - Appuntamenti] Gestisce orchestration Model -> DAO -> risposta.
final class Appuntamenti_ControlApp
{
    // [CONTROLLER APPLICATIVO - Appuntamenti] Riceve il DAO per la persistenza.
    public function __construct(private Appuntamenti_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Appuntamenti] Esegue tutte le operazioni della feature.
    public function esegui(Appuntamenti_Bean $bean): array
    {
        // [MODEL - Appuntamenti] Crea il Model della funzionalità.
        $modello = new Appuntamenti_Model();
        // [MODEL - Appuntamenti] Prepara il Bean prima di ogni lettura applicativa.
        $modello->prepara($bean);
        // [CONTROLLER APPLICATIVO - Appuntamenti] Gestisce il caricamento agenda tramite DAO.
        if ($bean->operazione === 'carica') {
            // [DAO - Appuntamenti] Recupera gli appuntamenti della settimana dal database.
            $righeDao = $this->dao->leggiSettimana();
            // [MODEL - Appuntamenti] Mantiene i dati del DAO senza aggiungere accesso al database.
            $righe = $modello->preparaRighe($righeDao);
            // [CONTROLLER APPLICATIVO - Appuntamenti] Traduce le righe in DTO di risposta per la View.
            return ['appuntamenti' => array_map(static fn(array $riga) => ['id' => (string)$riga['id'], 'patientName' => $riga['first_name'].' '.$riga['last_name'], 'date' => $riga['appointment_date'], 'time' => $riga['time'], 'duration' => (int)$riga['duration'], 'type' => $riga['type'], 'colorClass' => $riga['colorClass'], 'status' => $riga['status']], $righe)];
        }
        // [CONTROLLER APPLICATIVO - Appuntamenti] Valida e verifica lo slot durante l'anteprima grafica.
        if ($bean->operazione === 'verifica_slot') return ['disponibile' => $bean->id !== null && $modello->slotValido((string)$bean->data, (string)$bean->orario, (int)$bean->durata) && $this->dao->slotDisponibile((int)$bean->id, (string)$bean->data, (string)$bean->orario, (int)$bean->durata)];
        // [CONTROLLER APPLICATIVO - Appuntamenti] Valida lo spostamento con il Model prima del DAO.
        if ($bean->operazione === 'sposta') {
            // [MODEL - Appuntamenti] Controlla disponibilità oraria di dominio.
            if (!$modello->slotValido((string)$bean->data, (string)$bean->orario, (int)$bean->durata)) throw new \InvalidArgumentException('Lo slot selezionato non è disponibile.');
            // [DAO - Appuntamenti] Controlla sovrapposizioni reali nel database.
            if (!$this->dao->slotDisponibile((int)$bean->id, (string)$bean->data, (string)$bean->orario, (int)$bean->durata)) throw new \InvalidArgumentException('Lo slot selezionato non è disponibile.');
            // [DAO - Appuntamenti] Aggiorna il database solo dopo le validazioni.
            $this->dao->sposta((int)$bean->id, (string)$bean->data, (string)$bean->orario);
            // [CONTROLLER APPLICATIVO - Appuntamenti] Restituisce l'esito applicativo al ControllerGrafico.
            return ['id' => $bean->id, 'data' => $bean->data, 'orario' => $bean->orario];
        }
        // [DAO - Appuntamenti] Mantiene un controllo DB per l'azione demo senza introdurre la persistenza che prima non esisteva.
        $this->dao->verificaConnessione();
        // [CONTROLLER APPLICATIVO - Appuntamenti] Restituisce un esito neutro per mantenere il comportamento demo esistente.
        return ['demo' => true];
    }
}

```

## `funzionalita/appuntamenti_package/Appuntamenti_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Appuntamenti] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.appuntamenti_package = window.ClinicaFlow.appuntamenti_package || {};
// [CONTROLLER GRAFICO - Appuntamenti] Gestisce eventi drag/drop e modale senza contenere SQL o logica DB.
window.ClinicaFlow.appuntamenti_package.Appuntamenti_ControlGrafico = class Appuntamenti_ControlGrafico {
  // [CONTROLLER GRAFICO - Appuntamenti] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Appuntamenti] Recupera il mountpoint della View.
    this.mount = document.getElementById('agenda-root');
    // [CONTROLLER GRAFICO - Appuntamenti] Crea la View agenda.
    this.view = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_View();
    // [CONTROLLER GRAFICO - Appuntamenti] Inizializza l'elemento trascinato.
    this.elementoTrascinato = null;
    // [CONTROLLER GRAFICO - Appuntamenti] Inizializza la data target dell'anteprima.
    this.dataAnteprima = '';
    // [CONTROLLER GRAFICO - Appuntamenti] Inizializza l'orario target dell'anteprima.
    this.orarioAnteprima = '';
    // [CONTROLLER GRAFICO - Appuntamenti] Inizializza l'ultimo risultato di verifica server.
    this.slotDisponibile = false;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Carica la settimana passando dal Bean al ControllerApplicativo.
  async inizializza() {
    // [CONTROLLER GRAFICO - Appuntamenti] Crea il Bean/DTO della richiesta di caricamento.
    const bean = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Appuntamenti] Invia il Bean al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('appuntamenti', bean);
    // [CONTROLLER GRAFICO - Appuntamenti] Ricostruisce il Bean/DTO di risposta.
    const dati = window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean.daRisposta(risposta.data);
    // [VIEW - Appuntamenti] Monta la View con gli appuntamenti arrivati dal database.
    this.mount.innerHTML = this.view.render(dati.appuntamenti);
    // [CONTROLLER GRAFICO - Appuntamenti] Collega tutti gli eventi già presenti nella View.
    this.collegaEventi();
    // [CONTROLLER GRAFICO - Appuntamenti] Posiziona graficamente gli appuntamenti come nella versione precedente.
    this.posizionaAppuntamenti();
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Collega il pulsante nuovo appuntamento e gli eventi drag/drop.
  collegaEventi() {
    // [CONTROLLER GRAFICO - Appuntamenti] Collega il pulsante di apertura della modale.
    const nuovo = document.getElementById('newAppointment');
    // [CONTROLLER GRAFICO - Appuntamenti] Apre il form solo se presente.
    if (nuovo) nuovo.addEventListener('click', () => this.apriModale());
    // [CONTROLLER GRAFICO - Appuntamenti] Collega gli appuntamenti trascinabili.
    this.mount.querySelectorAll('.appointment-block').forEach((elemento) => {
      // [CONTROLLER GRAFICO - Appuntamenti] Registra l'inizio del drag.
      elemento.addEventListener('dragstart', (evento) => this.inizioTrascinamento(elemento, evento));
      // [CONTROLLER GRAFICO - Appuntamenti] Registra la fine del drag.
      elemento.addEventListener('dragend', () => this.fineTrascinamento(elemento));
    });
    // [CONTROLLER GRAFICO - Appuntamenti] Collega le sette aree giornaliere.
    this.mount.querySelectorAll('.agenda-day-body').forEach((giorno) => {
      // [CONTROLLER GRAFICO - Appuntamenti] Gestisce il passaggio del mouse sul giorno.
      giorno.addEventListener('dragover', (evento) => this.sopraGiorno(giorno, evento));
      // [CONTROLLER GRAFICO - Appuntamenti] Gestisce l'uscita dal giorno.
      giorno.addEventListener('dragleave', (evento) => this.esciDaGiorno(giorno, evento));
      // [CONTROLLER GRAFICO - Appuntamenti] Gestisce il rilascio.
      giorno.addEventListener('drop', (evento) => this.rilascia(giorno, evento));
    });
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Memorizza l'elemento trascinato e prepara il trasferimento.
  inizioTrascinamento(elemento, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Memorizza il DOM in movimento.
    this.elementoTrascinato = elemento;
    // [CONTROLLER GRAFICO - Appuntamenti] Applica lo stato grafico originale.
    elemento.classList.add('dragging');
    // [CONTROLLER GRAFICO - Appuntamenti] Scrive l'identificativo nel trasferimento HTML5.
    evento.dataTransfer.setData('text/plain', elemento.dataset.id);
    // [CONTROLLER GRAFICO - Appuntamenti] Mantiene l'effetto move originale.
    evento.dataTransfer.effectAllowed = 'move';
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Chiude lo stato grafico del trascinamento.
  fineTrascinamento(elemento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Rimuove lo stato temporaneo.
    elemento.classList.remove('dragging');
    // [CONTROLLER GRAFICO - Appuntamenti] Pulisce l'anteprima.
    this.pulisciStatiDrag();
    // [CONTROLLER GRAFICO - Appuntamenti] Azzera il riferimento all'elemento.
    this.elementoTrascinato = null;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Converte la posizione grafica in uno slot da 30 minuti senza validarlo localmente.
  calcolaOrarioDaMouse(giorno, coordinataY) {
    // [CONTROLLER GRAFICO - Appuntamenti] Recupera l'altezza relativa all'inizio della colonna.
    const y = coordinataY - giorno.getBoundingClientRect().top;
    // [CONTROLLER GRAFICO - Appuntamenti] Converte la coordinata in minuti partendo dalle 08:00.
    const minutiGrezzi = 8 * 60 + Math.max(0, y);
    // [CONTROLLER GRAFICO - Appuntamenti] Arrotonda allo slot di 30 minuti usato dalla demo.
    const minuti = Math.floor(minutiGrezzi / 30) * 30;
    // [CONTROLLER GRAFICO - Appuntamenti] Forma l'orario HH:MM.
    return `${String(Math.floor(minuti / 60)).padStart(2, '0')}:${String(minuti % 60).padStart(2, '0')}`;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Verifica server-side lo slot quando cambia lo slot grafico.
  async verificaAnteprima(giorno, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola la data target dalla View.
    const data = giorno.dataset.date;
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola l'orario target dalla posizione del mouse.
    const orario = this.calcolaOrarioDaMouse(giorno, evento.clientY);
    // [CONTROLLER GRAFICO - Appuntamenti] Evita richieste duplicate quando il cursore resta nello stesso slot.
    if (data === this.dataAnteprima && orario === this.orarioAnteprima) return;
    // [CONTROLLER GRAFICO - Appuntamenti] Memorizza lo slot appena verificato.
    this.dataAnteprima = data;
    // [CONTROLLER GRAFICO - Appuntamenti] Memorizza l'orario appena verificato.
    this.orarioAnteprima = orario;
    // [BEAN/DTO - Appuntamenti] Costruisce il DTO di verifica usando l'elemento trascinato.
    const bean = window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean.movimentoDaElemento(this.elementoTrascinato, data, orario);
    // [CONTROLLER GRAFICO - Appuntamenti] Passa il Bean al ControllerApplicativo per la validazione reale.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('appuntamenti', new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ ...bean, operazione: 'verifica_slot' }));
    // [CONTROLLER GRAFICO - Appuntamenti] Memorizza l'esito restituito dal Model/DAO server.
    this.slotDisponibile = risposta.data.disponibile === true;
    // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna lo stato grafico valido.
    giorno.classList.toggle('drag-over', this.slotDisponibile);
    // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna lo stato grafico non valido.
    giorno.classList.toggle('drag-invalid', !this.slotDisponibile);
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Gestisce dragover mantenendo l'effetto move originale.
  sopraGiorno(giorno, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Abilita il drop HTML5.
    evento.preventDefault();
    // [CONTROLLER GRAFICO - Appuntamenti] Esce se non esiste un elemento trascinato.
    if (!this.elementoTrascinato) return;
    // [CONTROLLER GRAFICO - Appuntamenti] Chiede al ControllerApplicativo la verifica dello slot corrente.
    this.verificaAnteprima(giorno, evento).catch(() => {});
    // [CONTROLLER GRAFICO - Appuntamenti] Mantiene l'effetto di spostamento.
    evento.dataTransfer.dropEffect = 'move';
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Rimuove gli stati grafici quando il cursore esce dalla colonna.
  esciDaGiorno(giorno, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Verifica l'uscita effettiva dal contenitore.
    if (!giorno.contains(evento.relatedTarget)) {
      // [CONTROLLER GRAFICO - Appuntamenti] Rimuove lo stato valido.
      giorno.classList.remove('drag-over');
      // [CONTROLLER GRAFICO - Appuntamenti] Rimuove lo stato non valido.
      giorno.classList.remove('drag-invalid');
    }
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Esegue il movimento passando nuovamente dal ControllerApplicativo per la verifica autorevole.
  async rilascia(giorno, evento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Blocca il comportamento predefinito del browser.
    evento.preventDefault();
    // [CONTROLLER GRAFICO - Appuntamenti] Esce senza operazioni quando manca il drag.
    if (!this.elementoTrascinato) return;
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola data e orario target.
    const data = giorno.dataset.date;
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola lo slot target.
    const orario = this.calcolaOrarioDaMouse(giorno, evento.clientY);
    // [BEAN/DTO - Appuntamenti] Crea il DTO di movimento.
    const bean = window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean.movimentoDaElemento(this.elementoTrascinato, data, orario);
    // [CONTROLLER GRAFICO - Appuntamenti] Invia il Bean al ControllerApplicativo per controllo Model + DAO + update DB.
    try {
      // [CONTROLLER GRAFICO - Appuntamenti] Invia la richiesta applicativa definitiva.
      await window.ClinicaFlow.Infrastruttura.ApiClient.invia('appuntamenti', bean);
      // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna i data-* della View dopo esito positivo.
      this.elementoTrascinato.dataset.date = data;
      // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna l'orario grafico dopo esito positivo.
      this.elementoTrascinato.dataset.time = orario;
      // [VIEW - Appuntamenti] Sposta il blocco nella colonna della data selezionata.
      giorno.appendChild(this.elementoTrascinato);
      // [CONTROLLER GRAFICO - Appuntamenti] Ricalcola la posizione verticale senza cambiare CSS.
      this.posizionaElemento(this.elementoTrascinato);
      // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna il testo orario del blocco.
      this.aggiornaEtichetta(this.elementoTrascinato);
      // [INFRASTRUTTURA - Toast] Mostra lo stesso messaggio di conferma della versione precedente.
      window.ClinicaFlow.Infrastruttura.mostraToast(`Appuntamento spostato a ${data} alle ${orario}.`);
    } catch (errore) {
      // [INFRASTRUTTURA - Toast] Mostra lo stesso errore previsto dalla demo.
      window.ClinicaFlow.Infrastruttura.mostraToast('Errore: lo slot selezionato non è disponibile. Appuntamento non spostato.');
    } finally {
      // [CONTROLLER GRAFICO - Appuntamenti] Pulisce sempre gli stati temporanei.
      this.pulisciStatiDrag();
    }
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna posizione e altezza dell'elemento secondo la griglia CSS esistente.
  posizionaElemento(elemento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Legge HH:MM dal data-*.
    const parti = elemento.dataset.time.split(':').map(Number);
    // [CONTROLLER GRAFICO - Appuntamenti] Converte l'orario in minuti.
    const minuti = parti[0] * 60 + parti[1];
    // [CONTROLLER GRAFICO - Appuntamenti] Calcola il top partendo dalle 08:00 come prima.
    elemento.style.top = `${minuti - 8 * 60}px`;
    // [CONTROLLER GRAFICO - Appuntamenti] Mantiene l'altezza in base alla durata.
    elemento.style.height = `${Number(elemento.dataset.duration)}px`;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Posiziona tutti gli elementi dopo il rendering.
  posizionaAppuntamenti() {
    // [CONTROLLER GRAFICO - Appuntamenti] Scorre i blocchi della settimana.
    this.mount.querySelectorAll('.appointment-block').forEach((elemento) => this.posizionaElemento(elemento));
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Aggiorna soltanto lo span secondario dell'appuntamento.
  aggiornaEtichetta(elemento) {
    // [CONTROLLER GRAFICO - Appuntamenti] Recupera il secondo elemento testuale del blocco.
    const dettagli = elemento.querySelector('span');
    // [CONTROLLER GRAFICO - Appuntamenti] Mantiene la descrizione e aggiorna il nuovo orario.
    if (dettagli) dettagli.textContent = `${elemento.dataset.time} · ${dettagli.textContent.split(' · ').slice(1).join(' · ')}`;
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Pulisce le classi grafiche e lo stato dell'anteprima.
  pulisciStatiDrag() {
    // [CONTROLLER GRAFICO - Appuntamenti] Rimuove gli stati sulle colonne.
    this.mount.querySelectorAll('.agenda-day-body').forEach((giorno) => giorno.classList.remove('drag-over', 'drag-invalid'));
    // [CONTROLLER GRAFICO - Appuntamenti] Azzera la cache dell'anteprima.
    this.dataAnteprima = '';
    // [CONTROLLER GRAFICO - Appuntamenti] Azzera l'orario dell'anteprima.
    this.orarioAnteprima = '';
    // [CONTROLLER GRAFICO - Appuntamenti] Azzera l'ultimo risultato server.
    this.slotDisponibile = false;
  }
  // [VIEW - Appuntamenti] Apre il contenitore modale comune e monta la View del form della feature.
  apriModale() {
    // [VIEW - Appuntamenti] Recupera il contenitore modale.
    const modal = document.getElementById('modal');
    // [VIEW - Appuntamenti] Recupera il contenitore del form.
    const contenuto = document.getElementById('modalContent');
    // [VIEW - Appuntamenti] Inserisce la form View della funzionalità.
    contenuto.innerHTML = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Form_View().render();
    // [CONTROLLER GRAFICO - Appuntamenti] Rende visibile la modale.
    modal.classList.add('open');
    // [CONTROLLER GRAFICO - Appuntamenti] Collega Annulla alla chiusura.
    document.getElementById('cancelModal').onclick = () => modal.classList.remove('open');
    // [CONTROLLER GRAFICO - Appuntamenti] Collega Salva alla costruzione del Bean.
    document.getElementById('saveModal').onclick = () => this.salvaNuovoAppuntamento(modal);
  }
  // [CONTROLLER GRAFICO - Appuntamenti] Passa il nuovo appuntamento attraverso Bean e ControllerApplicativo senza cambiare il messaggio demo.
  async salvaNuovoAppuntamento(modal) {
    // [BEAN/DTO - Appuntamenti] Costruisce il DTO dai controlli grafici del form.
    const bean = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_Bean({ operazione: 'registra_demo', data: modal.querySelector('input[type="date"]').value, orario: modal.querySelector('input[type="time"]').value, tipo: modal.querySelectorAll('select')[1]?.value || 'Seduta individuale' });
    // [CONTROLLER GRAFICO - Appuntamenti] Invia il DTO al ControllerApplicativo per la validazione applicativa.
    try { await window.ClinicaFlow.Infrastruttura.ApiClient.invia('appuntamenti', bean); } catch (_) {}
    // [VIEW - Appuntamenti] Chiude la modale come nella demo originale.
    modal.classList.remove('open');
    // [INFRASTRUTTURA - Toast] Mantiene identico il messaggio originale di registrazione demo.
    window.ClinicaFlow.Infrastruttura.mostraToast('Operazione registrata (demo)');
  }
};

```

## `funzionalita/appuntamenti_package/Appuntamenti_DAO.php`

```php
<?php
// [DAO - Appuntamenti] Abilita i tipi stretti del DAO.
declare(strict_types=1);
// [DAO - Appuntamenti] Colloca il DAO nel package appuntamenti.
namespace ClinicaFlow\appuntamenti_package;
// [DAO - Appuntamenti] Importa PDO per query preparate e transazioni.
use PDO;
// [DAO - Appuntamenti] Isola SQL e persistenza degli appuntamenti.
final class Appuntamenti_DAO
{
    // [DAO - Appuntamenti] Riceve la connessione PDO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Appuntamenti] Legge gli appuntamenti della settimana visualizzata.
    public function leggiSettimana(): array
    {
        // [DAO - Appuntamenti] Esegue la query con join anagrafici necessari alla View.
        return $this->connessione->query('SELECT a.id, p.first_name, p.last_name, a.appointment_date, TIME_FORMAT(a.start_time, "%H:%i") AS time, a.duration_minutes AS duration, a.type, a.status, a.color_class AS colorClass FROM appointments a JOIN patients p ON p.id = a.patient_id WHERE a.appointment_date BETWEEN "2026-09-21" AND "2026-09-27" ORDER BY a.appointment_date, a.start_time')->fetchAll();
    }
    // [DAO - Appuntamenti] Verifica sul database la sovrapposizione dello slot richiesto.
    public function slotDisponibile(int $id, string $data, string $orario, int $durata): bool
    {
        // [DAO - Appuntamenti] Calcola l'inizio in secondi per confrontare gli intervalli.
        $inizio = $this->connessione->prepare('SELECT TIME_TO_SEC(?)');
        // [DAO - Appuntamenti] Esegue la conversione dell'orario target.
        $inizio->execute([$orario]);
        // [DAO - Appuntamenti] Recupera il valore numerico dell'inizio.
        $secondiInizio = (int)$inizio->fetchColumn();
        // [DAO - Appuntamenti] Calcola la fine del nuovo intervallo.
        $secondiFine = $secondiInizio + ($durata * 60);
        // [DAO - Appuntamenti] Cerca un appuntamento esistente nello stesso giorno che intersechi l'intervallo.
        $query = $this->connessione->prepare('SELECT COUNT(*) FROM appointments WHERE appointment_date = ? AND id <> ? AND TIME_TO_SEC(start_time) < ? AND TIME_TO_SEC(start_time) + (duration_minutes * 60) > ?');
        // [DAO - Appuntamenti] Esegue la verifica parametrizzata.
        $query->execute([$data, $id, $secondiFine, $secondiInizio]);
        // [DAO - Appuntamenti] Restituisce disponibilità quando non esiste una sovrapposizione.
        return (int)$query->fetchColumn() === 0;
    }
    // [DAO - Appuntamenti] Aggiorna data e orario dell'appuntamento nel database.
    public function sposta(int $id, string $data, string $orario): void
    {
        // [DAO - Appuntamenti] Prepara l'UPDATE parametrizzato.
        $query = $this->connessione->prepare('UPDATE appointments SET appointment_date = ?, start_time = ? WHERE id = ?');
        // [DAO - Appuntamenti] Esegue l'UPDATE.
        $query->execute([$data, $orario, $id]);
    }
    // [DAO - Appuntamenti] Verifica la sola connessione per l'azione demo di nuovo appuntamento.
    public function verificaConnessione(): bool
    {
        // [DAO - Appuntamenti] Esegue una query tecnica innocua senza salvare dati.
        return (int)$this->connessione->query('SELECT 1')->fetchColumn() === 1;
    }
}

```

## `funzionalita/appuntamenti_package/Appuntamenti_Form_View.js`

```javascript
window.ClinicaFlow.appuntamenti_package = window.ClinicaFlow.appuntamenti_package || {};

// [VIEW - Modale > Form Appuntamento] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.appuntamenti_package.Appuntamenti_Form_View = class Appuntamenti_Form_View {

  // [VIEW - Modale > Form Appuntamento] Costruisce esclusivamente il form demo per un nuovo appuntamento.
  render() {
    // [VIEW - Modale > Form Appuntamento] Restituisce i campi identici alla demo originale.
    return `
      <!-- [VIEW - Modale > Form Appuntamento] Titolo. -->
      <h2>Nuovo appuntamento</h2>
      <!-- [VIEW - Modale > Form Appuntamento] Nota sul backend futuro. -->
      <p>Questa è una demo dell'interfaccia. I dati saranno collegati al backend PHP in seguito.</p>
      <!-- [VIEW - Modale > Form Appuntamento] Campo paziente. -->
      <label>Paziente<input placeholder="Cerca paziente..."></label>
      <!-- [VIEW - Modale > Form Appuntamento] Professionista. -->
      <label>Professionista<select><option>Dott.ssa Maria Rossi — Psicologia</option><option>Dott. Luca Verdi — Logopedia</option><option>Dott.ssa Elena Neri — Dietologia</option></select></label>
      <!-- [VIEW - Modale > Form Appuntamento] Data e ora. -->
      <div class="two-col"><label>Data<input type="date" value="2026-09-22"></label><label>Ora<input type="time" value="15:00"></label></div>
      <!-- [VIEW - Modale > Form Appuntamento] Tipologia. -->
      <label>Tipologia<select><option>Seduta individuale</option><option>Primo colloquio</option><option>Follow-up</option></select></label>
      <!-- [VIEW - Modale > Form Appuntamento] Azioni. -->
      <div class="form-actions"><button class="secondary" id="cancelModal">Annulla</button><button class="primary" id="saveModal">Salva appuntamento</button></div>`;
  }

};

```

## `funzionalita/appuntamenti_package/Appuntamenti_Model.php`

```php
<?php
// [MODEL - Appuntamenti] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Appuntamenti] Colloca il Model nel package appuntamenti.
namespace ClinicaFlow\appuntamenti_package;
// [MODEL - Appuntamenti] Contiene esclusivamente le regole di dominio per gli slot.
final class Appuntamenti_Model
{
    // [MODEL - Appuntamenti] Riceve il Bean e mantiene il contratto applicativo senza accesso al database.
    public function prepara(Appuntamenti_Bean $bean): void
    {
        // [MODEL - Appuntamenti] Non modifica la richiesta: il Bean resta la fonte dei dati della funzionalità.
    }
    // [MODEL - Appuntamenti] Mantiene le righe DAO pronte per il ControllerApplicativo.
    public function preparaRighe(array $righe): array
    {
        // [MODEL - Appuntamenti] Restituisce le righe senza conoscere la View o PDO.
        return $righe;
    }
    // [MODEL - Appuntamenti] Converte un orario HH:MM in minuti.
    public function minuti(string $orario): int
    {
        // [MODEL - Appuntamenti] Divide ore e minuti per ottenere il totale.
        [$ore, $minuti] = array_map('intval', explode(':', substr($orario, 0, 5)));
        // [MODEL - Appuntamenti] Restituisce il totale dei minuti dalla mezzanotte.
        return $ore * 60 + $minuti;
    }
    // [MODEL - Appuntamenti] Verifica la disponibilità oraria demo prevista dalla funzionalità.
    public function slotValido(string $data, string $orario, int $durata): bool
    {
        // [MODEL - Appuntamenti] Definisce l'apertura 08:30.
        $apertura = 8 * 60 + 30;
        // [MODEL - Appuntamenti] Definisce la chiusura 19:00.
        $chiusura = 19 * 60;
        // [MODEL - Appuntamenti] Calcola l'inizio dell'operazione richiesta.
        $inizio = $this->minuti($orario);
        // [MODEL - Appuntamenti] Calcola la fine dell'appuntamento.
        $fine = $inizio + $durata;
        // [MODEL - Appuntamenti] Restituisce vero soltanto nello stesso intervallo temporale usato dalla demo.
        return $inizio >= $apertura && $fine <= $chiusura && preg_match('/^\d{4}-\d{2}-\d{2}$/', $data) === 1;
    }
}

```

## `funzionalita/appuntamenti_package/Appuntamenti_View.js`

```javascript
window.ClinicaFlow.appuntamenti_package = window.ClinicaFlow.appuntamenti_package || {};

// [VIEW - Agenda] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.appuntamenti_package.Appuntamenti_View = class Appuntamenti_View {

  // [VIEW - Agenda] Costruisce la settimana con le destinazioni per il drag and drop.
  render(appointments) {
    // [VIEW - Agenda] Definisce i sette giorni presenti nella UI originale.
    const days = [
      { date: "2026-09-21", day: "LUN", label: "21 SET" },
      { date: "2026-09-22", day: "MAR", label: "22 SET" },
      { date: "2026-09-23", day: "MER", label: "23 SET" },
      { date: "2026-09-24", day: "GIO", label: "24 SET" },
      { date: "2026-09-25", day: "VEN", label: "25 SET" },
      { date: "2026-09-26", day: "SAB", label: "26 SET" },
      { date: "2026-09-27", day: "DOM", label: "27 SET" }
    ];
    // [VIEW - Agenda] Definisce i dodici orari della colonna sinistra.
    const times = ["08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00"];
    // [VIEW - Agenda] Costruisce le etichette orarie.
    const timeLabels = times.map((time) => `<span>${time}</span>`).join("");
    // [VIEW - Agenda] Costruisce tutte le colonne giornaliere.
    const dayColumns = days.map((day) => {
      // [VIEW - Agenda] Filtra gli appuntamenti del singolo giorno.
      const dayAppointments = appointments.filter((appointment) => appointment.date === day.date);
      // [VIEW - Agenda] Costruisce i blocchi trascinabili del giorno.
      const appointmentHtml = dayAppointments.map((appointment) => `
        <!-- [VIEW - Agenda > Appuntamenti] Blocco trascinabile dell'appuntamento ${appointment.id}. -->
        <div class="appointment-block ${appointment.colorClass}" draggable="true" data-id="${appointment.id}" data-date="${appointment.date}" data-time="${appointment.time}" data-duration="${appointment.duration}"><strong>${appointment.patientName}</strong><span>${appointment.getAgendaLabel()}</span></div>`).join("");
      // [VIEW - Agenda] Restituisce la colonna con header e area drop.
      return `
                <!-- [VIEW - Agenda > Settimana] Colonna del giorno ${day.date}. -->
                <div class="agenda-day" data-date="${day.date}">
                  <!-- [VIEW - Agenda > Settimana] Intestazione del giorno. -->
                  <div class="agenda-day-header"><strong>${day.day}</strong><span>${day.label}</span></div>
                  <!-- [VIEW - Agenda > Settimana] Area di drop del giorno. -->
                  <div class="agenda-day-body" data-date="${day.date}">${appointmentHtml}</div>
                </div>`;
    }).join("");
    // [VIEW - Agenda] Restituisce la pagina completa dell'agenda.
    return `
      <!-- [VIEW - Agenda] Sezione agenda. -->
      <section class="page" id="agenda">
        <!-- [VIEW - Agenda > Intestazione] Titolo e descrizione. -->
        <div class="page-heading">
          <!-- [VIEW - Agenda > Intestazione] Contenitore titolo. -->
          <div>
            <!-- [VIEW - Agenda > Intestazione] Etichetta di area. -->
            <p class="eyebrow">GESTIONE</p>
            <!-- [VIEW - Agenda > Intestazione] Titolo. -->
            <h1>Agenda</h1>
            <!-- [VIEW - Agenda > Intestazione] Istruzione drag and drop. -->
            <p class="muted">Trascina un appuntamento in un altro giorno e orario libero per spostarlo.</p>
          </div>
          <!-- [VIEW - Agenda > Intestazione] Nuovo appuntamento. -->
          <button class="primary" id="newAppointment">+ Nuovo appuntamento</button>
        </div>
        <!-- [VIEW - Agenda > Toolbar] Controlli di vista, periodo e professionista. -->
        <div class="toolbar">
          <!-- [VIEW - Agenda > Toolbar] Modalità Giorno/Settimana/Mese. -->
          <div class="segmented">
            <!-- [VIEW - Agenda > Toolbar] Modalità giorno attiva. -->
            <button class="active">Giorno</button>
            <!-- [VIEW - Agenda > Toolbar] Modalità settimana presente nella demo. -->
            <button>Settimana</button>
            <!-- [VIEW - Agenda > Toolbar] Modalità mese presente nella demo. -->
            <button>Mese</button>
          </div>
          <!-- [VIEW - Agenda > Toolbar] Navigazione temporale precedente. -->
          <button class="secondary">‹</button>
          <!-- [VIEW - Agenda > Toolbar] Periodo mostrato. -->
          <strong>Settimana 21 – 27 settembre 2026</strong>
          <!-- [VIEW - Agenda > Toolbar] Navigazione temporale successiva. -->
          <button class="secondary">›</button>
          <!-- [VIEW - Agenda > Toolbar] Selettore del professionista. -->
          <select><option>Tutti i professionisti</option><option>Dott.ssa Giorgia Sgroi</option><option>Dott. Luca Verdi</option><option>Dott.ssa Elena Neri</option></select>
        </div>
        <!-- [VIEW - Agenda > Aiuto] Pannello informativo drag and drop. -->
        <div class="agenda-help">
          <!-- [VIEW - Agenda > Aiuto] Icona. -->
          <span>↕</span>
          <!-- [VIEW - Agenda > Aiuto] Istruzione. -->
          <span><strong>Spostamento rapido:</strong> trascina un appuntamento su un altro giorno/orario.</span>
          <!-- [VIEW - Agenda > Aiuto] Regola disponibilità. -->
          <span class="agenda-help-rule">Lo slot deve essere libero.</span>
        </div>
        <!-- [VIEW - Agenda > Griglia] Contenitore principale. -->
        <div class="card agenda-full">
          <!-- [VIEW - Agenda > Griglia] Griglia settimanale. -->
          <div class="agenda-week">
            <!-- [VIEW - Agenda > Griglia] Colonna degli orari. -->
            <div class="agenda-time-column">
              <!-- [VIEW - Agenda > Griglia] Cella d'angolo. -->
              <div class="agenda-corner">Ora</div>
              <!-- [VIEW - Agenda > Griglia] Etichette temporali. -->
              <div class="agenda-time-labels">${timeLabels}</div>
            </div>
            <!-- [VIEW - Agenda > Griglia] Colonne dei giorni. -->
            <div class="agenda-days">${dayColumns}</div>
          </div>
        </div>
      </section>`;
  }

};

```

## `funzionalita/cartelle_cliniche_package/CartelleCliniche_Bean.js`

```javascript
// [BEAN/DTO - Cartelle cliniche] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.cartelle_cliniche_package = window.ClinicaFlow.cartelle_cliniche_package || {};
// [BEAN/DTO - Cartelle cliniche] Incapsula il paziente richiesto e le note restituite.
window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_Bean = class CartelleCliniche_Bean {
  // [BEAN/DTO - Cartelle cliniche] Costruisce il DTO con identificativo paziente e liste.
  constructor({ operazione = 'carica', pazienteId = 1, pazienti = [], pazienteSelezionato = null, note = [] } = {}) {
    // [BEAN/DTO - Cartelle cliniche] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Cartelle cliniche] Memorizza il paziente richiesto.
    this.pazienteId = pazienteId;
    // [BEAN/DTO - Cartelle cliniche] Memorizza l'elenco pazienti sintetico.
    this.pazienti = pazienti;
    // [BEAN/DTO - Cartelle cliniche] Memorizza il paziente selezionato.
    this.pazienteSelezionato = pazienteSelezionato;
    // [BEAN/DTO - Cartelle cliniche] Memorizza le note cliniche.
    this.note = note;
  }
  // [BEAN/DTO - Cartelle cliniche] Serializza il parametro necessario al ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Cartelle cliniche] Restituisce il contratto JSON della funzione.
    return { operazione: this.operazione, pazienteId: this.pazienteId };
  }
  // [BEAN/DTO - Cartelle cliniche] Costruisce il DTO di risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Cartelle cliniche] Restituisce il Bean completo per la View.
    return new window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_Bean({ dati, pazienti: dati.pazienti || [], pazienteSelezionato: dati.pazienteSelezionato || null, note: dati.note || [] });
  }
};

```

## `funzionalita/cartelle_cliniche_package/CartelleCliniche_Bean.php`

```php
<?php
// [BEAN/DTO - CartelleCliniche] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - CartelleCliniche] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\cartelle_cliniche_package;
// [BEAN/DTO - CartelleCliniche] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class CartelleCliniche_Bean
{
    // [BEAN/DTO - CartelleCliniche] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - CartelleCliniche] Dichiara il campo pazienteId del DTO server della funzionalità.
    public mixed $pazienteId;
    // [BEAN/DTO - CartelleCliniche] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null, mixed $pazienteId = null)
    {
        // [BEAN/DTO - CartelleCliniche] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
        // [BEAN/DTO - CartelleCliniche] Memorizza il campo pazienteId ricevuto dal ControllerGrafico.
        $this->pazienteId = $pazienteId;
    }
    // [BEAN/DTO - CartelleCliniche] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - CartelleCliniche] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - CartelleCliniche] Legge il campo pazienteId dal JSON del Browser.
        $pazienteId = $dati['pazienteId'] ?? null;
        // [BEAN/DTO - CartelleCliniche] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione, $pazienteId);
    }
}

```

## `funzionalita/cartelle_cliniche_package/CartelleCliniche_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - CartelleCliniche] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - CartelleCliniche] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\cartelle_cliniche_package;
// [CONTROLLER APPLICATIVO - CartelleCliniche] Importa il Bean server.
use ClinicaFlow\cartelle_cliniche_package\CartelleCliniche_Bean;
// [CONTROLLER APPLICATIVO - CartelleCliniche] Coordina Model e DAO senza SQL nel controller.
final class CartelleCliniche_ControlApp
{
    // [CONTROLLER APPLICATIVO - CartelleCliniche] Riceve il DAO.
    public function __construct(private CartelleCliniche_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - CartelleCliniche] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(CartelleCliniche_Bean $bean): array
    {
        // [MODEL - CartelleCliniche] Crea il Model della funzionalità.
        $modello = new CartelleCliniche_Model();
        // [MODEL - CartelleCliniche] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - CartelleCliniche] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - CartelleCliniche] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - CartelleCliniche] Restituisce il risultato nel contratto della View.
        $mesi = [1 => 'gennaio', 2 => 'febbraio', 3 => 'marzo', 4 => 'aprile', 5 => 'maggio', 6 => 'giugno', 7 => 'luglio', 8 => 'agosto', 9 => 'settembre', 10 => 'ottobre', 11 => 'novembre', 12 => 'dicembre'];
        return ['pazienti' => $this->dao->leggiPazienti(), 'pazienteSelezionato' => $this->dao->leggiPazienteSelezionato(), 'note' => array_map(static fn(array $riga) => ['date' => date('d', strtotime($riga['date_raw'])).' '.$mesi[(int)date('n', strtotime($riga['date_raw']))].' '.date('Y', strtotime($riga['date_raw'])), 'session' => $riga['session'], 'professional' => trim(($riga['professional_first'] ?? '').' '.($riga['professional_last'] ?? '')), 'text' => $riga['text'], 'tag' => $riga['status'] === 'signed' ? 'Firmata' : 'Bozza', 'tagClass' => $riga['status'] === 'signed' ? 'success' : ''], $dati)];
    }
}

```

## `funzionalita/cartelle_cliniche_package/CartelleCliniche_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Cartelle cliniche] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.cartelle_cliniche_package = window.ClinicaFlow.cartelle_cliniche_package || {};
// [CONTROLLER GRAFICO - Cartelle cliniche] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_ControlGrafico = class CartelleCliniche_ControlGrafico {
  // [CONTROLLER GRAFICO - Cartelle cliniche] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Cartelle cliniche] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('clinical-root');
    // [CONTROLLER GRAFICO - Cartelle cliniche] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_View();
  }
  // [CONTROLLER GRAFICO - Cartelle cliniche] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Cartelle cliniche] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Cartelle cliniche] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('clinical', bean);
    // [BEAN/DTO - Cartelle cliniche] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_Bean.daRisposta(risposta.data);
    // [VIEW - Cartelle cliniche] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.pazienti, dati.pazienteSelezionato, dati.note);
  }
};

```

## `funzionalita/cartelle_cliniche_package/CartelleCliniche_DAO.php`

```php
<?php
// [DAO - CartelleCliniche] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - CartelleCliniche] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\cartelle_cliniche_package;
// [DAO - CartelleCliniche] Importa PDO per query preparate.
use PDO;
// [DAO - CartelleCliniche] Isola la query della funzionalità.
final class CartelleCliniche_DAO
{
    // [DAO - CartelleCliniche] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - CartelleCliniche] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - CartelleCliniche] Legge le note del paziente selezionato.
        return $this->connessione->query('SELECT p.initials, p.name_display AS name, p.code, n.note_date AS date_raw, n.session_type AS session, pr.first_name AS professional_first, pr.last_name AS professional_last, n.note_text AS text, n.status FROM clinical_notes n JOIN patients_view p ON p.id = n.patient_id LEFT JOIN professionals pr ON pr.id = n.professional_id WHERE n.patient_id = 1 ORDER BY n.note_date DESC')->fetchAll();
    }
    // [DAO - CartelleCliniche] Legge i pazienti necessari al selettore della View.
    public function leggiPazienti(): array { return $this->connessione->query('SELECT initials, name_display AS name, code, professional, specialty, last_visit AS lastVisit, next_appointment AS nextAppointment, status_label AS status FROM patients_view ORDER BY id')->fetchAll(); }
    // [DAO - CartelleCliniche] Legge il paziente attivo mostrato nella testata della cartella.
    public function leggiPazienteSelezionato(): array { return $this->connessione->query('SELECT initials, name_display AS name, code, professional, specialty, last_visit AS lastVisit, next_appointment AS nextAppointment, status_label AS status FROM patients_view WHERE id = 1')->fetch() ?: []; }
}

```

## `funzionalita/cartelle_cliniche_package/CartelleCliniche_Model.php`

```php
<?php
// [MODEL - CartelleCliniche] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - CartelleCliniche] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\cartelle_cliniche_package;
// [MODEL - CartelleCliniche] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class CartelleCliniche_Model
{
    // [MODEL - CartelleCliniche] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - CartelleCliniche] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - CartelleCliniche] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - CartelleCliniche] Non accede a PDO e non conosce la View.
        return $dati;
    }
}

```

## `funzionalita/cartelle_cliniche_package/CartelleCliniche_View.js`

```javascript
window.ClinicaFlow.cartelle_cliniche_package = window.ClinicaFlow.cartelle_cliniche_package || {};

// [VIEW - Cartelle cliniche] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_View = class CartelleCliniche_View {

  // [VIEW - Cartelle cliniche] Costruisce selettore pazienti e dettaglio clinico.
  render(patients, selectedPatient, notes) {
    // [VIEW - Cartelle cliniche > Selettore] Costruisce la lista laterale dei quattro pazienti originali.
    const patientList = patients.slice(0, 4).map((patient, index) => `
            <!-- [VIEW - Cartelle cliniche > Selettore] Paziente ${patient.name}. -->
            <button${index === 0 ? " class=\"selected\"" : ""}>
              <!-- [VIEW - Cartelle cliniche > Selettore] Avatar. -->
              <div class="avatar pastel">${patient.initials}</div>
              <!-- [VIEW - Cartelle cliniche > Selettore] Nome e ultima nota. -->
              <div><strong>${patient.name}</strong><span>${index < 2 ? "Ultima nota · oggi" : index === 2 ? "Ultima nota · 15/09" : "Ultima nota · 18/09"}</span></div>
              <!-- [VIEW - Cartelle cliniche > Selettore] Freccia. -->
              <span>›</span>
            </button>`).join("");
    // [VIEW - Cartelle cliniche > Note] Costruisce le note del paziente selezionato.
    const notesHtml = notes.map((note) => `
                <!-- [VIEW - Cartelle cliniche > Note] Nota del ${note.date}. -->
                <div class="note">
                  <!-- [VIEW - Cartelle cliniche > Note] Metadati nota. -->
                  <div><strong>${note.date} · ${note.session}</strong><span>${note.professional}</span></div>
                  <!-- [VIEW - Cartelle cliniche > Note] Testo nota. -->
                  <p>${note.text}</p>
                  <!-- [VIEW - Cartelle cliniche > Note] Stato nota. -->
                  <span class="tag ${note.tagClass}">${note.tag}</span>
                </div>`).join("");
    // [VIEW - Cartelle cliniche] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Cartelle cliniche] Sezione clinica. -->
      <section class="page" id="clinical">
        <!-- [VIEW - Cartelle cliniche > Intestazione] Titolo e azione nuova nota. -->
        <div class="page-heading"><div><p class="eyebrow">AREA CLINICA</p><h1>Cartelle cliniche</h1><p class="muted">Note, anamnesi, piani terapeutici e documentazione assistenziale.</p></div><button class="primary">+ Nuova nota</button></div>
        <!-- [VIEW - Cartelle cliniche] Layout a due colonne. -->
        <div class="clinical-layout">
          <!-- [VIEW - Cartelle cliniche > Selettore] Card ricerca e pazienti. -->
          <div class="card patient-selector">
            <!-- [VIEW - Cartelle cliniche > Selettore] Ricerca. -->
            <div class="search"><span>⌕</span><input placeholder="Cerca paziente..."></div>
            <!-- [VIEW - Cartelle cliniche > Selettore] Lista. -->
            <div class="patient-list">${patientList}
            </div>
          </div>
          <!-- [VIEW - Cartelle cliniche > Dettaglio] Dettaglio paziente. -->
          <div class="card clinical-detail">
            <!-- [VIEW - Cartelle cliniche > Dettaglio] Header paziente. -->
            <div class="patient-header"><div class="avatar large pastel">${selectedPatient.initials}</div><div><h2>${selectedPatient.name}</h2><span>${selectedPatient.code} · ${selectedPatient.specialty}</span></div><button class="secondary">Apri scheda completa</button></div>
            <!-- [VIEW - Cartelle cliniche > Dettaglio] Tab originali. -->
            <div class="tabs"><button class="active">Note cliniche</button><button>Anamnesi</button><button>Piano terapeutico</button><button>Allegati</button></div>
            <!-- [VIEW - Cartelle cliniche > Dettaglio] Note cliniche. -->
            ${notesHtml}
          </div>
        </div>
      </section>`;
  }

};

```

## `funzionalita/dashboard_package/Dashboard_Bean.js`

```javascript
// [BEAN/DTO - Dashboard] Crea lo spazio globale della funzionalità Dashboard.
window.ClinicaFlow.dashboard_package = window.ClinicaFlow.dashboard_package || {};
// [BEAN/DTO - Dashboard] Incapsula la richiesta e la risposta della Dashboard.
window.ClinicaFlow.dashboard_package.Dashboard_Bean = class Dashboard_Bean {
  // [BEAN/DTO - Dashboard] Costruisce il DTO con operazione e dati ricevuti dal ControllerApplicativo.
  constructor({ operazione = 'carica', dati = {} } = {}) {
    // [BEAN/DTO - Dashboard] Memorizza il tipo di operazione richiesto.
    this.operazione = operazione;
    // [BEAN/DTO - Dashboard] Copia i dati della dashboard nel DTO.
    Object.assign(this, dati);
  }
  // [BEAN/DTO - Dashboard] Converte il DTO nella struttura JSON inviata al ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Dashboard] Restituisce operazione e filtri senza aggiungere logica di dominio.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Dashboard] Ricostruisce un DTO a partire dalla risposta del ControllerApplicativo.
  static daRisposta(dati) {
    // [BEAN/DTO - Dashboard] Restituisce il DTO pronto per Dashboard_View.
    return new window.ClinicaFlow.dashboard_package.Dashboard_Bean({ dati });
  }
};

```

## `funzionalita/dashboard_package/Dashboard_Bean.php`

```php
<?php
// [BEAN/DTO - Dashboard] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Dashboard] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\dashboard_package;
// [BEAN/DTO - Dashboard] Incapsula i dati che attraversano il confine Browser/ControllerApplicativo.
final class Dashboard_Bean
{
    // [BEAN/DTO - Dashboard] Dichiara il campo operazione del DTO.
    public mixed $operazione;
    // [BEAN/DTO - Dashboard] Costruisce il DTO server-side con i dati del browser.
    public function __construct(string|int|null $operazione = null)
    {
        // [BEAN/DTO - Dashboard] Memorizza il campo operazione ricevuto dal browser.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Dashboard] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Dashboard] Legge il campo operazione dal payload del ControllerGrafico.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Dashboard] Restituisce l'istanza DTO tipizzata.
        return new self($operazione);
    }
}

```

## `funzionalita/dashboard_package/Dashboard_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Dashboard] Abilita i tipi stretti del controller applicativo.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Dashboard] Colloca il controller nel package della Dashboard.
namespace ClinicaFlow\dashboard_package;
// [CONTROLLER APPLICATIVO - Dashboard] Importa il Bean/DTO della funzionalità.
use ClinicaFlow\dashboard_package\Dashboard_Bean;
// [CONTROLLER APPLICATIVO - Dashboard] Coordina Model e DAO nel flusso richiesto.
final class Dashboard_ControlApp
{
    // [CONTROLLER APPLICATIVO - Dashboard] Riceve il DAO già collegato a PDO dal front controller.
    public function __construct(private Dashboard_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Dashboard] Esegue il caricamento completo della Dashboard.
    public function esegui(Dashboard_Bean $bean): array
    {
        // [MODEL - Dashboard] Prepara il Bean prima del recupero dati.
        $modello->preparaRichiesta($bean);
        // [DAO - Dashboard] Recupera statistiche, appuntamenti, scadenze e grafico da MySQL.
        $righeDao = $this->dao->leggi();
        // [MODEL - Dashboard] Prepara le righe DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Dashboard] Trasforma i dati del database nel contratto DTO della Dashboard.
        return ['stats' => array_map(static fn(array $riga) => $riga, $dati['statistiche']), 'appointments' => array_map(static fn(array $riga) => ['id' => (string)$riga['id'], 'patientName' => $riga['first_name'].' '.$riga['last_name'], 'date' => $riga['appointment_date'], 'time' => $riga['time'], 'duration' => (int)$riga['duration'], 'type' => in_array((int)($riga['id'] ?? 0), [1, 5], true) ? 'Psicologia · Seduta individuale' : $riga['type'], 'professional' => trim(($riga['professional_first'] ?? '').' '.($riga['professional_last'] ?? '')), 'colorClass' => $riga['colorClass'], 'status' => $riga['status'] === 'current' ? 'In corso' : ($riga['status'] === 'pending' ? 'Da confermare' : 'Confermato')], $dati['appuntamenti']), 'deadlines' => array_map(static fn(array $riga) => ['day' => (string)$riga['day'], 'month' => [9=>'SET',10=>'OTT',11=>'NOV'][(int)$riga['month_number']] ?? (string)$riga['month_number'], 'title' => $riga['title'], 'description' => $riga['description'], 'badge' => $riga['badge']], $dati['scadenze']), 'chartYear' => '2026', 'chartMonths' => array_column($dati['grafico'], 'month'), 'chartValues' => array_column($dati['grafico'], 'value')];
    }
}

```

## `funzionalita/dashboard_package/Dashboard_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Dashboard] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.dashboard_package = window.ClinicaFlow.dashboard_package || {};
// [CONTROLLER GRAFICO - Dashboard] Gestisce esclusivamente eventi della View e passaggio del Bean al ControllerApplicativo.
window.ClinicaFlow.dashboard_package.Dashboard_ControlGrafico = class Dashboard_ControlGrafico {
  // [CONTROLLER GRAFICO - Dashboard] Costruisce il controller grafico con mountpoint e dipendenze grafiche.
  constructor() {
    // [CONTROLLER GRAFICO - Dashboard] Recupera il contenitore HTML della funzionalità.
    this.mount = document.getElementById('dashboard-root');
    // [CONTROLLER GRAFICO - Dashboard] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.dashboard_package.Dashboard_View();
  }
  // [CONTROLLER GRAFICO - Dashboard] Carica i dati passando obbligatoriamente dal Bean al ControllerApplicativo.
  async inizializza() {
    // [CONTROLLER GRAFICO - Dashboard] Crea il Bean/DTO della richiesta di caricamento.
    const bean = new window.ClinicaFlow.dashboard_package.Dashboard_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Dashboard] Invia il Bean al ControllerApplicativo tramite il solo trasporto HTTP.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('dashboard', bean);
    // [CONTROLLER GRAFICO - Dashboard] Ricostruisce il Bean/DTO di risposta.
    const dati = window.ClinicaFlow.dashboard_package.Dashboard_Bean.daRisposta(risposta.data);
    // [VIEW - Dashboard] Monta la View con i dati arrivati dal ControllerApplicativo.
    this.mount.innerHTML = this.view.render(dati);
    // [CONTROLLER GRAFICO - Dashboard] Collega le sole azioni grafiche della dashboard.
    this.collegaAzioniNavigazione();
  }

  // [CONTROLLER GRAFICO - Dashboard] Collega i pulsanti di navigazione senza gestire dati di altre feature.
  collegaAzioniNavigazione() {
    // [CONTROLLER GRAFICO - Dashboard] Recupera i pulsanti marcati con data-page-action.
    this.mount.querySelectorAll('[data-page-action]').forEach((pulsante) => {
      // [CONTROLLER GRAFICO - Dashboard] Inoltra il cambio pagina al ControllerGrafico di Navigazione infrastrutturale.
      pulsante.addEventListener('click', () => window.ClinicaFlow.Navigazione_ControlGrafico.mostraPagina(pulsante.dataset.pageAction));
    });
  }

};

```

## `funzionalita/dashboard_package/Dashboard_DAO.php`

```php
<?php
// [DAO - Dashboard] Abilita i tipi stretti del DAO.
declare(strict_types=1);
// [DAO - Dashboard] Colloca il DAO nel package della Dashboard.
namespace ClinicaFlow\dashboard_package;
// [DAO - Dashboard] Importa PDO per accedere a MySQL con query preparate.
use PDO;
// [DAO - Dashboard] Isola tutte le query della Dashboard.
final class Dashboard_DAO
{
    // [DAO - Dashboard] Riceve la connessione senza creare credenziali nel DAO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Dashboard] Legge statistiche, appuntamenti, scadenze e andamento dal database.
    public function leggi(): array
    {
        // [DAO - Dashboard] Legge le quattro statistiche demo dalla tabella dedicata.
        $statistiche = $this->connessione->query('SELECT label, value, detail, detail_class AS detailClass, icon, icon_class AS iconClass FROM dashboard_statistics ORDER BY position_no')->fetchAll();
        // [DAO - Dashboard] Legge gli appuntamenti mostrati nella card Dashboard.
        $appuntamenti = $this->connessione->query('SELECT a.id, p.first_name, p.last_name, a.appointment_date, TIME_FORMAT(a.start_time, "%H:%i") AS time, a.duration_minutes AS duration, a.type, a.status, a.color_class AS colorClass, pr.first_name AS professional_first, pr.last_name AS professional_last FROM appointments a JOIN patients p ON p.id = a.patient_id LEFT JOIN professionals pr ON pr.id = a.professional_id WHERE a.appointment_date = "2026-09-22" ORDER BY a.start_time LIMIT 5')->fetchAll();
        // [DAO - Dashboard] Legge le prossime quattro scadenze mostrate nella card.
        $scadenze = $this->connessione->query('SELECT DAY(due_date) AS day, MONTH(due_date) AS month_number, title, description, badge FROM deadlines ORDER BY due_date LIMIT 4')->fetchAll();
        // [DAO - Dashboard] Legge le etichette dei mesi del grafico.
        $grafico = $this->connessione->query('SELECT month_label AS month, amount_value AS value FROM dashboard_chart ORDER BY position_no')->fetchAll();
        // [DAO - Dashboard] Ritorna tutti i dati senza eseguire logica di presentazione.
        return ['statistiche' => $statistiche, 'appuntamenti' => $appuntamenti, 'scadenze' => $scadenze, 'grafico' => $grafico];
    }
}

```

## `funzionalita/dashboard_package/Dashboard_Model.php`

```php
<?php
// [MODEL - Dashboard] Abilita i tipi stretti del modello Dashboard.
declare(strict_types=1);
// [MODEL - Dashboard] Colloca il modello nel package della Dashboard.
namespace ClinicaFlow\dashboard_package;
// [MODEL - Dashboard] Rappresenta la trasformazione dei dati dashboard senza conoscere PDO.
final class Dashboard_Model
{
    // [MODEL - Dashboard] Riceve il Bean prima dell'accesso ai dati e non esegue I/O.
    public function preparaRichiesta(Dashboard_Bean $bean): void
    {
        // [MODEL - Dashboard] Mantiene il DTO invariato perché la demo non usa filtri lato server.
    }
    // [MODEL - Dashboard] Indica quali dati devono essere presentati dalla View.
    public function prepara(array $dati): array
    {
        // [MODEL - Dashboard] Restituisce i risultati DAO nello shape stabile usato dal DTO client.
        return $dati;
    }
}

```

## `funzionalita/dashboard_package/Dashboard_View.js`

```javascript
window.ClinicaFlow.dashboard_package = window.ClinicaFlow.dashboard_package || {};

// [VIEW - Dashboard] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.dashboard_package.Dashboard_View = class Dashboard_View {

  // [VIEW - Dashboard] Costruisce la pagina principale con statistiche, agenda, scadenze, grafico e azioni rapide.
  render(model) {
    // [VIEW - Dashboard > Statistiche] Traduce ogni statistica del Model in una card.
    const statsHtml = model.stats.map((stat) => `
            <!-- [VIEW - Dashboard > Statistiche] Card della statistica corrente. -->
            <article class="stat-card">
              <!-- [VIEW - Dashboard > Statistiche] Icona cromatica. -->
              <div class="stat-icon ${stat.iconClass}">${stat.icon}</div>
              <!-- [VIEW - Dashboard > Statistiche] Etichetta, valore e confronto. -->
              <div><span>${stat.label}</span><strong>${stat.value}</strong><small${stat.detailClass ? ` class="${stat.detailClass}"` : ""}>${stat.detail}</small></div>
            </article>`).join("");
    // [VIEW - Dashboard > Agenda di oggi] Traduce gli appuntamenti del Model nella timeline.
    const agendaHtml = model.appointments.map((appointment) => `
                <!-- [VIEW - Dashboard > Agenda di oggi] Riga timeline per ${appointment.patientName}. -->
                <div class="timeline-item${appointment.status === "In corso" ? " current" : ""}">
                  <!-- [VIEW - Dashboard > Agenda di oggi] Orario visualizzato. -->
                  <span class="time">${appointment.time}</span><div class="dot ${appointment.colorClass}"></div>
                  <!-- [VIEW - Dashboard > Agenda di oggi] Nome, descrizione e stato. -->
                  <div class="appointment"><div><strong>${appointment.patientName}</strong><span>${appointment.type}</span></div><span class="status ${appointment.status === "Confermato" ? "confirmed" : appointment.status === "In corso" ? "current" : "pending"}">${appointment.status}</span></div>
                </div>`).join("");
    // [VIEW - Dashboard > Scadenze] Traduce le scadenze del Model nella lista sintetica.
    const deadlinesHtml = model.deadlines.map((deadline, index) => `
                  <!-- [VIEW - Dashboard > Prossime scadenze] Riga scadenza ${index + 1}. -->
                  <div class="deadline">
                    <!-- [VIEW - Dashboard > Prossime scadenze] Box data. -->
                    <div class="date-box"><strong>${deadline.day}</strong><span>${deadline.month}</span></div>
                    <!-- [VIEW - Dashboard > Prossime scadenze] Titolo e descrizione. -->
                    <div><strong>${deadline.title}</strong><span>${deadline.description}</span></div>
                    <!-- [VIEW - Dashboard > Prossime scadenze] Badge. -->
                    <span class="pill ${index === 0 ? "orange" : "gray"}">${deadline.badge}</span>
                  </div>`).join("");
    // [VIEW - Dashboard > Andamento mensile] Mantiene identico il tracciato della demo originale.
    const points = "M0 175 L100 150 L200 160 L300 105 L400 125 L500 70 L600 88";
    // [VIEW - Dashboard] Restituisce l'intera UI mantenendo classi, testi e attributi originali.
    return `
      <!-- [VIEW - Dashboard] Sezione pagina attiva all'avvio dell'applicazione. -->
      <section class="page active" id="dashboard">
        <!-- [VIEW - Dashboard > Intestazione] Saluto e azione di nuovo appuntamento. -->
        <div class="welcome-row">
          <!-- [VIEW - Dashboard > Intestazione] Contenitore dei testi introduttivi. -->
          <div>
            <!-- [VIEW - Dashboard > Intestazione] Data corrente mostrata dalla demo. -->
            <p class="eyebrow">MARTEDÌ 22 SETTEMBRE 2026</p>
            <!-- [VIEW - Dashboard > Intestazione] Saluto principale. -->
            <h1>Buon pomeriggio, Maria 👋</h1>
            <!-- [VIEW - Dashboard > Intestazione] Descrizione sintetica. -->
            <p class="muted">Ecco una panoramica dell'attività della struttura.</p>
          </div>
          <!-- [VIEW - Dashboard > Intestazione] Azione rapida verso Agenda. -->
          <button class="primary" data-page-action="agenda">+ Nuovo appuntamento</button>
        </div>
        <!-- [VIEW - Dashboard > Statistiche] Griglia delle quattro statistiche principali. -->
        <div class="stats-grid">${statsHtml}
        </div>
        <!-- [VIEW - Dashboard] Primo gruppo a due colonne. -->
        <div class="dashboard-grid">
          <!-- [VIEW - Dashboard > Agenda di oggi] Card agenda sintetica. -->
          <article class="card agenda-card">
            <!-- [VIEW - Dashboard > Agenda di oggi] Header della card. -->
            <div class="card-header"><div><h2>Agenda di oggi</h2><span class="muted">Martedì 22 settembre</span></div><button class="text-btn" data-page-action="agenda">Vedi agenda →</button></div>
            <!-- [VIEW - Dashboard > Agenda di oggi] Timeline degli appuntamenti. -->
            <div class="timeline">${agendaHtml}
            </div>
          </article>
          <!-- [VIEW - Dashboard > Prossime scadenze] Card delle scadenze amministrative. -->
          <article class="card deadlines-card">
            <!-- [VIEW - Dashboard > Prossime scadenze] Header. -->
            <div class="card-header"><div><h2>Prossime scadenze</h2><span class="muted">Amministrazione</span></div><button class="text-btn" data-page-action="taxes">Tutte →</button></div>
            <!-- [VIEW - Dashboard > Prossime scadenze] Elenco. -->
            <div class="deadline-list">${deadlinesHtml}
            </div>
          </article>
        </div>
        <!-- [VIEW - Dashboard] Secondo gruppo a due colonne. -->
        <div class="dashboard-grid bottom">
          <!-- [VIEW - Dashboard > Andamento mensile] Card del grafico. -->
          <article class="card">
            <!-- [VIEW - Dashboard > Andamento mensile] Header con selettore anno. -->
            <div class="card-header"><div><h2>Andamento mensile</h2><span class="muted">Incassi ultimi 6 mesi</span></div><select><option>${model.chartYear}</option><option>2025</option></select></div>
            <!-- [VIEW - Dashboard > Andamento mensile] Area del grafico. -->
            <div class="chart-wrap">
              <!-- [VIEW - Dashboard > Andamento mensile] Etichette verticali. -->
              <div class="y-labels"><span>€10k</span><span>€7.5k</span><span>€5k</span><span>€2.5k</span><span>€0</span></div>
              <!-- [VIEW - Dashboard > Andamento mensile] Contenitore SVG. -->
              <div class="chart">
                <!-- [VIEW - Dashboard > Andamento mensile] Griglia del grafico. -->
                <div class="gridline g1"></div><div class="gridline g2"></div><div class="gridline g3"></div><div class="gridline g4"></div>
                <!-- [VIEW - Dashboard > Andamento mensile] Grafico incassi. -->
                <svg viewBox="0 0 600 220" preserveAspectRatio="none" aria-label="Grafico incassi">
                  <!-- [VIEW - Dashboard > Andamento mensile] Gradiente di riempimento. -->
                  <defs><linearGradient id="fill" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#0f766e" stop-opacity=".25"/><stop offset="1" stop-color="#0f766e" stop-opacity="0"/></linearGradient></defs>
                  <!-- [VIEW - Dashboard > Andamento mensile] Area sotto la curva. -->
                  <path d="${points} L600 220 L0 220Z" fill="url(#fill)"/>
                  <!-- [VIEW - Dashboard > Andamento mensile] Linea principale. -->
                  <path d="${points}" fill="none" stroke="#0f766e" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                  <!-- [VIEW - Dashboard > Andamento mensile] Punto finale. -->
                  <circle cx="600" cy="88" r="6" fill="#fff" stroke="#0f766e" stroke-width="4"/>
                </svg>
                <!-- [VIEW - Dashboard > Andamento mensile] Etichette dei mesi. -->
                <div class="x-labels">${model.chartMonths.map((month) => `<span>${month}</span>`).join("")}</div>
              </div>
            </div>
          </article>
          <!-- [VIEW - Dashboard > Azioni rapide] Card delle scorciatoie. -->
          <article class="card quick-card">
            <!-- [VIEW - Dashboard > Azioni rapide] Header. -->
            <div class="card-header"><div><h2>Azioni rapide</h2><span class="muted">Operazioni frequenti</span></div></div>
            <!-- [VIEW - Dashboard > Azioni rapide] Griglia azioni. -->
            <div class="quick-grid">
              <!-- [VIEW - Dashboard > Azioni rapide] Nuovo paziente. -->
              <button data-page-action="patients"><span>♙</span><strong>Nuovo paziente</strong><small>Registra un assistito</small></button>
              <!-- [VIEW - Dashboard > Azioni rapide] Appuntamento. -->
              <button data-page-action="agenda"><span>◷</span><strong>Appuntamento</strong><small>Inserisci in agenda</small></button>
              <!-- [VIEW - Dashboard > Azioni rapide] Nuova fattura. -->
              <button data-page-action="finance"><span>€</span><strong>Nuova fattura</strong><small>Registra una prestazione</small></button>
              <!-- [VIEW - Dashboard > Azioni rapide] Carica documento. -->
              <button data-page-action="documents"><span>□</span><strong>Carica documento</strong><small>Archivio digitale</small></button>
            </div>
          </article>
        </div>
      </section>`;
  }

};

```

## `funzionalita/documenti_package/Documenti_Bean.js`

```javascript
// [BEAN/DTO - Documenti] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.documenti_package = window.ClinicaFlow.documenti_package || {};
// [BEAN/DTO - Documenti] Incapsula il registro documentale.
window.ClinicaFlow.documenti_package.Documenti_Bean = class Documenti_Bean {
  // [BEAN/DTO - Documenti] Costruisce il DTO con la lista documentale.
  constructor({ operazione = 'carica', documenti = [] } = {}) {
    // [BEAN/DTO - Documenti] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Documenti] Memorizza le righe documentali.
    this.documenti = documenti;
  }
  // [BEAN/DTO - Documenti] Serializza il DTO verso il ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Documenti] Restituisce il contratto minimo.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Documenti] Ricostruisce il DTO della risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Documenti] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.documenti_package.Documenti_Bean({ dati, documenti: dati.documenti || [] });
  }
};

```

## `funzionalita/documenti_package/Documenti_Bean.php`

```php
<?php
// [BEAN/DTO - Documenti] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Documenti] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\documenti_package;
// [BEAN/DTO - Documenti] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Documenti_Bean
{
    // [BEAN/DTO - Documenti] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Documenti] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Documenti] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Documenti] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Documenti] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Documenti] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}

```

## `funzionalita/documenti_package/Documenti_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Documenti] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Documenti] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\documenti_package;
// [CONTROLLER APPLICATIVO - Documenti] Importa il Bean server.
use ClinicaFlow\documenti_package\Documenti_Bean;
// [CONTROLLER APPLICATIVO - Documenti] Coordina Model e DAO senza SQL nel controller.
final class Documenti_ControlApp
{
    // [CONTROLLER APPLICATIVO - Documenti] Riceve il DAO.
    public function __construct(private Documenti_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Documenti] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Documenti_Bean $bean): array
    {
        // [MODEL - Documenti] Crea il Model della funzionalità.
        $modello = new Documenti_Model();
        // [MODEL - Documenti] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - Documenti] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - Documenti] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Documenti] Restituisce il risultato nel contratto della View.
        return ['documenti' => $dati];
    }
}

```

## `funzionalita/documenti_package/Documenti_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Documenti] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.documenti_package = window.ClinicaFlow.documenti_package || {};
// [CONTROLLER GRAFICO - Documenti] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.documenti_package.Documenti_ControlGrafico = class Documenti_ControlGrafico {
  // [CONTROLLER GRAFICO - Documenti] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Documenti] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('documents-root');
    // [CONTROLLER GRAFICO - Documenti] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.documenti_package.Documenti_View();
  }
  // [CONTROLLER GRAFICO - Documenti] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Documenti] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.documenti_package.Documenti_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Documenti] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('documents', bean);
    // [BEAN/DTO - Documenti] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.documenti_package.Documenti_Bean.daRisposta(risposta.data);
    // [VIEW - Documenti] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.documenti);
  }
};

```

## `funzionalita/documenti_package/Documenti_DAO.php`

```php
<?php
// [DAO - Documenti] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Documenti] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\documenti_package;
// [DAO - Documenti] Importa PDO per query preparate.
use PDO;
// [DAO - Documenti] Isola la query della funzionalità.
final class Documenti_DAO
{
    // [DAO - Documenti] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Documenti] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Documenti] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT file_name AS name, category, owner_display AS owner, DATE_FORMAT(document_date, "%d/%m/%Y") AS date, status_label AS status, status_class AS statusClass FROM documents_view ORDER BY id')->fetchAll();
    }
}

```

## `funzionalita/documenti_package/Documenti_Model.php`

```php
<?php
// [MODEL - Documenti] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Documenti] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\documenti_package;
// [MODEL - Documenti] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Documenti_Model
{
    // [MODEL - Documenti] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Documenti] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Documenti] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Documenti] Non accede a PDO e non conosce la View.
        return $dati;
    }
}

```

## `funzionalita/documenti_package/Documenti_View.js`

```javascript
window.ClinicaFlow.documenti_package = window.ClinicaFlow.documenti_package || {};

// [VIEW - Documenti] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.documenti_package.Documenti_View = class Documenti_View {

  // [VIEW - Documenti] Costruisce statistiche e tabella documentale.
  render(documents) {
    // [VIEW - Documenti > Tabella] Costruisce le righe del registro.
    const rows = documents.map((document) => `
            <!-- [VIEW - Documenti > Tabella] Riga ${document.name}. -->
            <tr>
              <!-- [VIEW - Documenti > Tabella] Nome. -->
              <td>${document.name}</td>
              <!-- [VIEW - Documenti > Tabella] Categoria. -->
              <td>${document.category}</td>
              <!-- [VIEW - Documenti > Tabella] Paziente o struttura. -->
              <td>${document.owner}</td>
              <!-- [VIEW - Documenti > Tabella] Data. -->
              <td>${document.date}</td>
              <!-- [VIEW - Documenti > Tabella] Stato. -->
              <td><span class="status ${document.statusClass}">${document.status}</span></td>
              <!-- [VIEW - Documenti > Tabella] Azioni demo. -->
              <td>•••</td>
            </tr>`).join("");
    // [VIEW - Documenti] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Documenti] Sezione archivio. -->
      <section class="page" id="documents">
        <!-- [VIEW - Documenti > Intestazione] Titolo e caricamento. -->
        <div class="page-heading"><div><p class="eyebrow">ARCHIVIO</p><h1>Documenti</h1><p class="muted">Gestisci documenti amministrativi e clinici con permessi dedicati.</p></div><button class="primary">↑ Carica documento</button></div>
        <!-- [VIEW - Documenti > Statistiche] Tre statistiche. -->
        <div class="document-cards"><div class="doc-stat"><span>Documenti totali</span><strong>486</strong></div><div class="doc-stat"><span>Da firmare</span><strong>7</strong></div><div class="doc-stat"><span>In scadenza</span><strong>3</strong></div></div>
        <!-- [VIEW - Documenti > Tabella] Registro documenti. -->
        <div class="card table-card"><table>
          <!-- [VIEW - Documenti > Tabella] Intestazione. -->
          <thead><tr><th>Documento</th><th>Categoria</th><th>Paziente / struttura</th><th>Data</th><th>Stato</th><th></th></tr></thead>
          <!-- [VIEW - Documenti > Tabella] Dati. -->
          <tbody>${rows}</tbody>
        </table></div>
      </section>`;
  }

};

```

## `funzionalita/fatturazione_package/Fatturazione_Bean.js`

```javascript
// [BEAN/DTO - Fatturazione] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.fatturazione_package = window.ClinicaFlow.fatturazione_package || {};
// [BEAN/DTO - Fatturazione] Incapsula il registro delle fatture.
window.ClinicaFlow.fatturazione_package.Fatturazione_Bean = class Fatturazione_Bean {
  // [BEAN/DTO - Fatturazione] Costruisce il DTO con le righe fattura.
  constructor({ operazione = 'carica', fatture = [] } = {}) {
    // [BEAN/DTO - Fatturazione] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Fatturazione] Memorizza le fatture ricevute.
    this.fatture = fatture;
  }
  // [BEAN/DTO - Fatturazione] Serializza il DTO verso il ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Fatturazione] Restituisce il contratto minimo.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Fatturazione] Ricostruisce il DTO risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Fatturazione] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.fatturazione_package.Fatturazione_Bean({ dati, fatture: dati.fatture || [] });
  }
};

```

## `funzionalita/fatturazione_package/Fatturazione_Bean.php`

```php
<?php
// [BEAN/DTO - Fatturazione] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Fatturazione] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\fatturazione_package;
// [BEAN/DTO - Fatturazione] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Fatturazione_Bean
{
    // [BEAN/DTO - Fatturazione] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Fatturazione] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Fatturazione] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Fatturazione] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Fatturazione] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Fatturazione] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}

```

## `funzionalita/fatturazione_package/Fatturazione_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Fatturazione] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Fatturazione] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\fatturazione_package;
// [CONTROLLER APPLICATIVO - Fatturazione] Importa il Bean server.
use ClinicaFlow\fatturazione_package\Fatturazione_Bean;
// [CONTROLLER APPLICATIVO - Fatturazione] Coordina Model e DAO senza SQL nel controller.
final class Fatturazione_ControlApp
{
    // [CONTROLLER APPLICATIVO - Fatturazione] Riceve il DAO.
    public function __construct(private Fatturazione_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Fatturazione] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Fatturazione_Bean $bean): array
    {
        // [MODEL - Fatturazione] Crea il Model della funzionalità.
        $modello = new Fatturazione_Model();
        // [MODEL - Fatturazione] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - Fatturazione] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - Fatturazione] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Fatturazione] Restituisce il risultato nel contratto della View.
        return ['fatture' => $dati];
    }
}

```

## `funzionalita/fatturazione_package/Fatturazione_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Fatturazione] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.fatturazione_package = window.ClinicaFlow.fatturazione_package || {};
// [CONTROLLER GRAFICO - Fatturazione] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.fatturazione_package.Fatturazione_ControlGrafico = class Fatturazione_ControlGrafico {
  // [CONTROLLER GRAFICO - Fatturazione] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Fatturazione] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('finance-root');
    // [CONTROLLER GRAFICO - Fatturazione] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.fatturazione_package.Fatturazione_View();
  }
  // [CONTROLLER GRAFICO - Fatturazione] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Fatturazione] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.fatturazione_package.Fatturazione_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Fatturazione] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('finance', bean);
    // [BEAN/DTO - Fatturazione] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.fatturazione_package.Fatturazione_Bean.daRisposta(risposta.data);
    // [VIEW - Fatturazione] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.fatture);
  }
};

```

## `funzionalita/fatturazione_package/Fatturazione_DAO.php`

```php
<?php
// [DAO - Fatturazione] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Fatturazione] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\fatturazione_package;
// [DAO - Fatturazione] Importa PDO per query preparate.
use PDO;
// [DAO - Fatturazione] Isola la query della funzionalità.
final class Fatturazione_DAO
{
    // [DAO - Fatturazione] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Fatturazione] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Fatturazione] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT invoice_number AS number, client_name AS client, service, amount_display AS amount, DATE_FORMAT(issue_date, "%d/%m/%y") AS date, status_label AS status, status_class AS statusClass FROM invoices_view ORDER BY id DESC')->fetchAll();
    }
}

```

## `funzionalita/fatturazione_package/Fatturazione_Model.php`

```php
<?php
// [MODEL - Fatturazione] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Fatturazione] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\fatturazione_package;
// [MODEL - Fatturazione] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Fatturazione_Model
{
    // [MODEL - Fatturazione] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Fatturazione] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Fatturazione] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Fatturazione] Non accede a PDO e non conosce la View.
        return $dati;
    }
}

```

## `funzionalita/fatturazione_package/Fatturazione_View.js`

```javascript
window.ClinicaFlow.fatturazione_package = window.ClinicaFlow.fatturazione_package || {};

// [VIEW - Finanze e fatture] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.fatturazione_package.Fatturazione_View = class Fatturazione_View {

  // [VIEW - Finanze e fatture] Costruisce indicatori finanziari e tabella fatture.
  render(invoices) {
    // [VIEW - Finanze e fatture > Tabella] Costruisce le righe delle fatture.
    const rows = invoices.map((invoice) => `
            <!-- [VIEW - Finanze e fatture > Tabella] Riga ${invoice.number}. -->
            <tr>
              <!-- [VIEW - Finanze e fatture > Tabella] Numero. -->
              <td>${invoice.number}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Cliente. -->
              <td>${invoice.client}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Prestazione. -->
              <td>${invoice.service}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Importo. -->
              <td>${invoice.amount}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Data. -->
              <td>${invoice.date}</td>
              <!-- [VIEW - Finanze e fatture > Tabella] Stato. -->
              <td><span class="status ${invoice.statusClass}">${invoice.status}</span></td>
            </tr>`).join("");
    // [VIEW - Finanze e fatture] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Finanze e fatture] Sezione finanziaria. -->
      <section class="page" id="finance">
        <!-- [VIEW - Finanze e fatture > Intestazione] Titolo e nuova fattura. -->
        <div class="page-heading"><div><p class="eyebrow">AMMINISTRAZIONE</p><h1>Finanze e fatture</h1><p class="muted">Entrate, fatture, pagamenti e riepiloghi per il commercialista.</p></div><button class="primary">+ Nuova fattura</button></div>
        <!-- [VIEW - Finanze e fatture > Statistiche] Quattro indicatori. -->
        <div class="finance-stats"><div class="finance-stat"><span>Fatturato settembre</span><strong>€ 9.460,00</strong><small>32 fatture emesse</small></div><div class="finance-stat"><span>Incassato</span><strong>€ 7.840,00</strong><small class="positive">82,9% del fatturato</small></div><div class="finance-stat"><span>Da incassare</span><strong>€ 1.620,00</strong><small class="warning-text">8 fatture aperte</small></div><div class="finance-stat"><span>Spese</span><strong>€ 2.140,00</strong><small>Questo mese</small></div></div>
        <!-- [VIEW - Finanze e fatture > Tabella] Card ultime fatture. -->
        <div class="card table-card">
          <!-- [VIEW - Finanze e fatture > Tabella] Header con periodo ed esportazione. -->
          <div class="card-header"><div><h2>Ultime fatture</h2><span class="muted">Settembre 2026</span></div><button class="secondary">Esporta CSV</button></div>
          <!-- [VIEW - Finanze e fatture > Tabella] Registro fatture. -->
          <table><thead><tr><th>Numero</th><th>Cliente</th><th>Prestazione</th><th>Importo</th><th>Data</th><th>Stato</th></tr></thead><tbody>${rows}</tbody></table>
        </div>
      </section>`;
  }

};

```

## `funzionalita/impostazioni_package/Impostazioni_Bean.js`

```javascript
// [BEAN/DTO - Impostazioni] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.impostazioni_package = window.ClinicaFlow.impostazioni_package || {};
// [BEAN/DTO - Impostazioni] Incapsula i dati della struttura.
window.ClinicaFlow.impostazioni_package.Impostazioni_Bean = class Impostazioni_Bean {
  // [BEAN/DTO - Impostazioni] Costruisce il DTO con i valori della struttura.
  constructor({ operazione = 'carica', name = '', vat = '', phone = '', email = '', address = '' } = {}) {
    // [BEAN/DTO - Impostazioni] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Impostazioni] Memorizza il nome della struttura.
    this.name = name;
    // [BEAN/DTO - Impostazioni] Memorizza la partita IVA.
    this.vat = vat;
    // [BEAN/DTO - Impostazioni] Memorizza il telefono.
    this.phone = phone;
    // [BEAN/DTO - Impostazioni] Memorizza l'email.
    this.email = email;
    // [BEAN/DTO - Impostazioni] Memorizza l'indirizzo.
    this.address = address;
  }
  // [BEAN/DTO - Impostazioni] Serializza il DTO.
  toJSON() {
    // [BEAN/DTO - Impostazioni] Restituisce i dati richiesti dal ControllerApplicativo.
    return { operazione: this.operazione, name: this.name, vat: this.vat, phone: this.phone, email: this.email, address: this.address };
  }
  // [BEAN/DTO - Impostazioni] Ricostruisce il DTO della risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Impostazioni] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.impostazioni_package.Impostazioni_Bean({ ...dati });
  }
};

```

## `funzionalita/impostazioni_package/Impostazioni_Bean.php`

```php
<?php
// [BEAN/DTO - Impostazioni] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Impostazioni] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\impostazioni_package;
// [BEAN/DTO - Impostazioni] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Impostazioni_Bean
{
    // [BEAN/DTO - Impostazioni] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Impostazioni] Dichiara il campo name del DTO server della funzionalità.
    public mixed $name;
    // [BEAN/DTO - Impostazioni] Dichiara il campo vat del DTO server della funzionalità.
    public mixed $vat;
    // [BEAN/DTO - Impostazioni] Dichiara il campo phone del DTO server della funzionalità.
    public mixed $phone;
    // [BEAN/DTO - Impostazioni] Dichiara il campo email del DTO server della funzionalità.
    public mixed $email;
    // [BEAN/DTO - Impostazioni] Dichiara il campo address del DTO server della funzionalità.
    public mixed $address;
    // [BEAN/DTO - Impostazioni] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null, mixed $name = null, mixed $vat = null, mixed $phone = null, mixed $email = null, mixed $address = null)
    {
        // [BEAN/DTO - Impostazioni] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
        // [BEAN/DTO - Impostazioni] Memorizza il campo name ricevuto dal ControllerGrafico.
        $this->name = $name;
        // [BEAN/DTO - Impostazioni] Memorizza il campo vat ricevuto dal ControllerGrafico.
        $this->vat = $vat;
        // [BEAN/DTO - Impostazioni] Memorizza il campo phone ricevuto dal ControllerGrafico.
        $this->phone = $phone;
        // [BEAN/DTO - Impostazioni] Memorizza il campo email ricevuto dal ControllerGrafico.
        $this->email = $email;
        // [BEAN/DTO - Impostazioni] Memorizza il campo address ricevuto dal ControllerGrafico.
        $this->address = $address;
    }
    // [BEAN/DTO - Impostazioni] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Impostazioni] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo name dal JSON del Browser.
        $name = $dati['name'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo vat dal JSON del Browser.
        $vat = $dati['vat'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo phone dal JSON del Browser.
        $phone = $dati['phone'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo email dal JSON del Browser.
        $email = $dati['email'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo address dal JSON del Browser.
        $address = $dati['address'] ?? null;
        // [BEAN/DTO - Impostazioni] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione, $name, $vat, $phone, $email, $address);
    }
}

```

## `funzionalita/impostazioni_package/Impostazioni_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Impostazioni] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Impostazioni] Colloca il controller nel package impostazioni.
namespace ClinicaFlow\impostazioni_package;
// [CONTROLLER APPLICATIVO - Impostazioni] Importa il Bean/DTO.
use ClinicaFlow\impostazioni_package\Impostazioni_Bean;
// [CONTROLLER APPLICATIVO - Impostazioni] Coordina Model e DAO.
final class Impostazioni_ControlApp
{
    // [CONTROLLER APPLICATIVO - Impostazioni] Riceve il DAO.
    public function __construct(private Impostazioni_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Impostazioni] Esegue la lettura della struttura.
    public function esegui(Impostazioni_Bean $bean): array
    {
        // [MODEL - Impostazioni] Crea il modello della funzionalità.
        $modello = new Impostazioni_Model();
        // [CONTROLLER APPLICATIVO - Impostazioni] Legge dal DAO dopo aver creato il Model.
        $dati = $modello->prepara($this->dao->leggi());
        // [CONTROLLER APPLICATIVO - Impostazioni] Restituisce un unico oggetto impostazioni alla View.
        return $dati;
    }
}

```

## `funzionalita/impostazioni_package/Impostazioni_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Impostazioni] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.impostazioni_package = window.ClinicaFlow.impostazioni_package || {};
// [CONTROLLER GRAFICO - Impostazioni] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.impostazioni_package.Impostazioni_ControlGrafico = class Impostazioni_ControlGrafico {
  // [CONTROLLER GRAFICO - Impostazioni] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Impostazioni] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('settings-root');
    // [CONTROLLER GRAFICO - Impostazioni] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.impostazioni_package.Impostazioni_View();
  }
  // [CONTROLLER GRAFICO - Impostazioni] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Impostazioni] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.impostazioni_package.Impostazioni_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Impostazioni] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('settings', bean);
    // [BEAN/DTO - Impostazioni] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.impostazioni_package.Impostazioni_Bean.daRisposta(risposta.data);
    // [VIEW - Impostazioni] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati);
  }
};

```

## `funzionalita/impostazioni_package/Impostazioni_DAO.php`

```php
<?php
// [DAO - Impostazioni] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Impostazioni] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\impostazioni_package;
// [DAO - Impostazioni] Importa PDO per query preparate.
use PDO;
// [DAO - Impostazioni] Isola la query della funzionalità.
final class Impostazioni_DAO
{
    // [DAO - Impostazioni] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Impostazioni] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Impostazioni] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT name, vat_number AS vat, phone, email, address FROM structure_settings WHERE id = 1')->fetchAll();
    }
}

```

## `funzionalita/impostazioni_package/Impostazioni_Model.php`

```php
<?php
// [MODEL - Impostazioni] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Impostazioni] Colloca il modello nel package impostazioni.
namespace ClinicaFlow\impostazioni_package;
// [MODEL - Impostazioni] Mantiene la validazione dei dati struttura senza accesso al database.
final class Impostazioni_Model
{
    // [MODEL - Impostazioni] Verifica il formato minimo dell'email quando un aggiornamento verrà attivato.
    public function valida(?string $email): void
    {
        // [MODEL - Impostazioni] Solleva errore solo per email valorizzate e non valide.
        if ($email !== null && $email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) === false) throw new \InvalidArgumentException('Email non valida.');
    }
    // [MODEL - Impostazioni] Mantiene la risposta DAO senza conoscere la View.
    public function prepara(array $dati): array
    {
        // [MODEL - Impostazioni] Restituisce i dati della struttura.
        return $dati;
    }
}

```

## `funzionalita/impostazioni_package/Impostazioni_View.js`

```javascript
window.ClinicaFlow.impostazioni_package = window.ClinicaFlow.impostazioni_package || {};

// [VIEW - Impostazioni] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.impostazioni_package.Impostazioni_View = class Impostazioni_View {

  // [VIEW - Impostazioni] Costruisce il pannello impostazioni e il form della struttura.
  render(settings) {
    // [VIEW - Impostazioni] Restituisce il markup con valori provenienti dal Model.
    return `
      <!-- [VIEW - Impostazioni] Sezione configurazione. -->
      <section class="page" id="settings">
        <!-- [VIEW - Impostazioni > Intestazione] Titolo e salvataggio. -->
        <div class="page-heading"><div><p class="eyebrow">STRUTTURA</p><h1>Impostazioni</h1><p class="muted">Configura struttura, profilo, notifiche e sicurezza.</p></div><button class="primary">Salva modifiche</button></div>
        <!-- [VIEW - Impostazioni] Layout della pagina. -->
        <div class="settings-layout">
          <!-- [VIEW - Impostazioni > Navigazione] Voci del pannello. -->
          <div class="card settings-nav"><button class="active">Profilo struttura</button><button>Notifiche</button><button>Permessi e ruoli</button><button>Fatturazione</button><button>Privacy e sicurezza</button></div>
          <!-- [VIEW - Impostazioni > Profilo struttura] Form. -->
          <div class="card settings-form">
            <!-- [VIEW - Impostazioni > Profilo struttura] Titolo. -->
            <h2>Profilo struttura</h2>
            <!-- [VIEW - Impostazioni > Profilo struttura] Descrizione. -->
            <p class="muted">Informazioni visualizzate nei documenti e nelle comunicazioni.</p>
            <!-- [VIEW - Impostazioni > Profilo struttura] Nome struttura. -->
            <label>Nome struttura<input value="${settings.name}"></label>
            <!-- [VIEW - Impostazioni > Profilo struttura] Partita IVA e telefono. -->
            <div class="two-col"><label>Partita IVA<input value="${settings.vat}"></label><label>Telefono<input value="${settings.phone}"></label></div>
            <!-- [VIEW - Impostazioni > Profilo struttura] Email. -->
            <label>Email<input value="${settings.email}"></label>
            <!-- [VIEW - Impostazioni > Profilo struttura] Indirizzo. -->
            <label>Indirizzo<input value="${settings.address}"></label>
          </div>
        </div>
      </section>`;
  }

};

```

## `funzionalita/notifiche_package/Notifiche_Bean.js`

```javascript
// [BEAN/DTO - Notifiche] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.notifiche_package = window.ClinicaFlow.notifiche_package || {};
// [BEAN/DTO - Notifiche] Incapsula la richiesta di visualizzazione delle notifiche.
window.ClinicaFlow.notifiche_package.Notifiche_Bean = class Notifiche_Bean {
  // [BEAN/DTO - Notifiche] Costruisce il DTO dell'interazione.
  constructor({ operazione = 'mostra' } = {}) {
    // [BEAN/DTO - Notifiche] Memorizza l'operazione.
    this.operazione = operazione;
  }
  // [BEAN/DTO - Notifiche] Serializza la richiesta verso il ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Notifiche] Restituisce il contratto JSON minimo.
    return { operazione: this.operazione };
  }
};

```

## `funzionalita/notifiche_package/Notifiche_Bean.php`

```php
<?php
// [BEAN/DTO - Notifiche] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Notifiche] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\notifiche_package;
// [BEAN/DTO - Notifiche] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Notifiche_Bean
{
    // [BEAN/DTO - Notifiche] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Notifiche] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Notifiche] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Notifiche] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Notifiche] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Notifiche] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}

```

## `funzionalita/notifiche_package/Notifiche_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Notifiche] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Notifiche] Colloca il ControllerApplicativo nel package notifiche.
namespace ClinicaFlow\notifiche_package;
// [CONTROLLER APPLICATIVO - Notifiche] Importa il Bean/DTO server.
use ClinicaFlow\notifiche_package\Notifiche_Bean;
// [CONTROLLER APPLICATIVO - Notifiche] Coordina Model e DAO.
final class Notifiche_ControlApp
{
    // [CONTROLLER APPLICATIVO - Notifiche] Riceve il DAO.
    public function __construct(private Notifiche_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Notifiche] Esegue la richiesta proveniente dal ControllerGrafico.
    public function esegui(Notifiche_Bean $bean): array
    {
        // [MODEL - Notifiche] Crea il Model per la costruzione del messaggio.
        $modello = new Notifiche_Model();
        // [DAO - Notifiche] Recupera il conteggio dal database.
        $conteggio = $this->dao->conta();
        // [CONTROLLER APPLICATIVO - Notifiche] Restituisce il messaggio applicativo al client.
        return ['messaggio' => $modello->costruisciMessaggio($conteggio)];
    }
}

```

## `funzionalita/notifiche_package/Notifiche_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Notifiche] Crea lo spazio della funzionalità notifiche.
window.ClinicaFlow.notifiche_package = window.ClinicaFlow.notifiche_package || {};
// [CONTROLLER GRAFICO - Notifiche] Gestisce il click grafico e il passaggio Bean -> ControllerApplicativo.
window.ClinicaFlow.notifiche_package.Notifiche_ControlGrafico = class Notifiche_ControlGrafico {
  // [CONTROLLER GRAFICO - Notifiche] Costruisce il controller con la View della funzionalità.
  constructor() {
    // [VIEW - Notifiche] Crea la View che conosce il controllo grafico notifiche.
    this.view = new window.ClinicaFlow.notifiche_package.Notifiche_View();
  }
  // [CONTROLLER GRAFICO - Notifiche] Collega l'icona notifiche della Topbar_View.
  collega() {
    // [CONTROLLER GRAFICO - Notifiche] Recupera il pulsante notifiche.
    const pulsante = document.querySelector(this.view.selettorePulsante());
    // [CONTROLLER GRAFICO - Notifiche] Collega il click alla richiesta applicativa.
    if (pulsante) pulsante.onclick = () => this.mostra();
  }
  // [CONTROLLER GRAFICO - Notifiche] Esegue il flusso completo della funzionalità.
  async mostra() {
    // [BEAN/DTO - Notifiche] Costruisce il DTO dell'azione mostra.
    const bean = new window.ClinicaFlow.notifiche_package.Notifiche_Bean({ operazione: 'mostra' });
    // [CONTROLLER GRAFICO - Notifiche] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('notifiche', bean);
    // [CONTROLLER GRAFICO - Notifiche] Mostra il messaggio identico a quello esistente usando il risultato server.
    window.ClinicaFlow.Infrastruttura.mostraToast(risposta.data.messaggio);
  }
};

```

## `funzionalita/notifiche_package/Notifiche_DAO.php`

```php
<?php
// [DAO - Notifiche] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Notifiche] Colloca il DAO nel package notifiche.
namespace ClinicaFlow\notifiche_package;
// [DAO - Notifiche] Importa PDO per leggere la tabella notifiche.
use PDO;
// [DAO - Notifiche] Isola la persistenza delle notifiche.
final class Notifiche_DAO
{
    // [DAO - Notifiche] Riceve PDO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Notifiche] Conta le notifiche attive per la topbar.
    public function conta(): int
    {
        // [DAO - Notifiche] Esegue la query parametrica prevista dal package.
        return (int)$this->connessione->query('SELECT COUNT(*) FROM notifications WHERE active = 1')->fetchColumn();
    }
}

```

## `funzionalita/notifiche_package/Notifiche_Model.php`

```php
<?php
// [MODEL - Notifiche] Abilita i tipi stretti.
declare(strict_types=1);
// [MODEL - Notifiche] Colloca il modello nel package notifiche.
namespace ClinicaFlow\notifiche_package;
// [MODEL - Notifiche] Compone il messaggio UI senza interrogare direttamente il database.
final class Notifiche_Model
{
    // [MODEL - Notifiche] Costruisce il messaggio usando il conteggio restituito dal DAO.
    public function costruisciMessaggio(int $conteggio): string
    {
        // [MODEL - Notifiche] Mantiene lo stesso testo del comportamento esistente.
        return $conteggio.' notifiche: 1 documento da firmare, 1 pagamento, 1 scadenza';
    }
}

```

## `funzionalita/notifiche_package/Notifiche_View.js`

```javascript
// [VIEW - Notifiche] Crea la View logica della funzionalità notifiche senza modificare l'interfaccia esistente.
window.ClinicaFlow.notifiche_package = window.ClinicaFlow.notifiche_package || {};
// [VIEW - Notifiche] Espone esclusivamente il selettore dell'elemento già presente nella Topbar_View.
window.ClinicaFlow.notifiche_package.Notifiche_View = class Notifiche_View {
  // [VIEW - Notifiche] Restituisce il controllo grafico già previsto dalla UI.
  selettorePulsante() {
    // [VIEW - Notifiche] Individua il pulsante notifiche esistente.
    return '#notificationBtn';
  }
};

```

## `funzionalita/pazienti_package/Pazienti_Bean.js`

```javascript
// [BEAN/DTO - Pazienti] Crea lo spazio globale della funzionalità Pazienti.
window.ClinicaFlow.pazienti_package = window.ClinicaFlow.pazienti_package || {};
// [BEAN/DTO - Pazienti] Incapsula richieste e risposte dell'anagrafica.
window.ClinicaFlow.pazienti_package.Pazienti_Bean = class Pazienti_Bean {
  // [BEAN/DTO - Pazienti] Costruisce il DTO della funzione Pazienti.
  constructor({ operazione = 'carica', nome = '', cognome = '', telefono = '', email = '', professionistaId = 1, pazienti = [] } = {}) {
    // [BEAN/DTO - Pazienti] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Pazienti] Memorizza il nome inserito nel form.
    this.nome = nome;
    // [BEAN/DTO - Pazienti] Memorizza il cognome inserito nel form.
    this.cognome = cognome;
    // [BEAN/DTO - Pazienti] Memorizza il telefono inserito.
    this.telefono = telefono;
    // [BEAN/DTO - Pazienti] Memorizza l'email inserita.
    this.email = email;
    // [BEAN/DTO - Pazienti] Memorizza il professionista associato.
    this.professionistaId = professionistaId;
    // [BEAN/DTO - Pazienti] Memorizza le righe paziente restituite dal database.
    this.pazienti = pazienti;
  }
  // [BEAN/DTO - Pazienti] Serializza il DTO per il ControllerApplicativo.
  toJSON() {
    // [BEAN/DTO - Pazienti] Restituisce solo dati di trasporto.
    return { operazione: this.operazione, nome: this.nome, cognome: this.cognome, telefono: this.telefono, email: this.email, professionistaId: this.professionistaId };
  }
  // [BEAN/DTO - Pazienti] Ricostruisce il DTO a partire dalla risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Pazienti] Restituisce il Bean completo per Pazienti_View.
    return new window.ClinicaFlow.pazienti_package.Pazienti_Bean({ dati, pazienti: dati.pazienti || [] });
  }
};

```

## `funzionalita/pazienti_package/Pazienti_Bean.php`

```php
<?php
// [BEAN/DTO - Pazienti] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Pazienti] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\pazienti_package;
// [BEAN/DTO - Pazienti] Incapsula i dati che attraversano il confine Browser/ControllerApplicativo.
final class Pazienti_Bean
{
    // [BEAN/DTO - Pazienti] Dichiara il campo operazione del DTO.
    public mixed $operazione;
// [BEAN/DTO - Pazienti] Dichiara il campo nome del DTO.
    public mixed $nome;
// [BEAN/DTO - Pazienti] Dichiara il campo cognome del DTO.
    public mixed $cognome;
// [BEAN/DTO - Pazienti] Dichiara il campo telefono del DTO.
    public mixed $telefono;
// [BEAN/DTO - Pazienti] Dichiara il campo email del DTO.
    public mixed $email;
// [BEAN/DTO - Pazienti] Dichiara il campo professionistaId del DTO.
    public mixed $professionistaId;
    // [BEAN/DTO - Pazienti] Costruisce il DTO server-side con i dati del browser.
    public function __construct(string|int|null $operazione = null, string|int|null $nome = null, string|int|null $cognome = null, string|int|null $telefono = null, string|int|null $email = null, string|int|null $professionistaId = null)
    {
        // [BEAN/DTO - Pazienti] Memorizza il campo operazione ricevuto dal browser.
        $this->operazione = $operazione;
        // [BEAN/DTO - Pazienti] Memorizza il campo nome ricevuto dal browser.
        $this->nome = $nome;
        // [BEAN/DTO - Pazienti] Memorizza il campo cognome ricevuto dal browser.
        $this->cognome = $cognome;
        // [BEAN/DTO - Pazienti] Memorizza il campo telefono ricevuto dal browser.
        $this->telefono = $telefono;
        // [BEAN/DTO - Pazienti] Memorizza il campo email ricevuto dal browser.
        $this->email = $email;
        // [BEAN/DTO - Pazienti] Memorizza il campo professionistaId ricevuto dal browser.
        $this->professionistaId = $professionistaId;
    }
    // [BEAN/DTO - Pazienti] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Pazienti] Legge il campo operazione dal payload del ControllerGrafico.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo nome dal payload del ControllerGrafico.
        $nome = $dati['nome'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo cognome dal payload del ControllerGrafico.
        $cognome = $dati['cognome'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo telefono dal payload del ControllerGrafico.
        $telefono = $dati['telefono'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo email dal payload del ControllerGrafico.
        $email = $dati['email'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo professionistaId dal payload del ControllerGrafico.
        $professionistaId = $dati['professionistaId'] ?? null;
        // [BEAN/DTO - Pazienti] Restituisce l'istanza DTO tipizzata.
        return new self($operazione, $nome, $cognome, $telefono, $email, $professionistaId);
    }
}

```

## `funzionalita/pazienti_package/Pazienti_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Pazienti] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Pazienti] Colloca il controller nel package Pazienti.
namespace ClinicaFlow\pazienti_package;
// [CONTROLLER APPLICATIVO - Pazienti] Importa il Bean server.
use ClinicaFlow\pazienti_package\Pazienti_Bean;
// [CONTROLLER APPLICATIVO - Pazienti] Coordina Model e DAO della funzionalità.
final class Pazienti_ControlApp
{
    // [CONTROLLER APPLICATIVO - Pazienti] Riceve il DAO.
    public function __construct(private Pazienti_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Pazienti] Esegue lettura o validazione della creazione demo.
    public function esegui(Pazienti_Bean $bean): array
    {
        // [MODEL - Pazienti] Crea il Model della funzionalità.
        $modello = new Pazienti_Model();
        // [CONTROLLER APPLICATIVO - Pazienti] Gestisce il caricamento della lista pazienti.
        if ($bean->operazione === 'carica') return ['pazienti' => $this->dao->leggi()];
        // [MODEL - Pazienti] Valida i campi del DTO prima del contatto con il DAO.
        $modello->validaCreazione($bean->nome, $bean->cognome);
        // [DAO - Pazienti] Mantiene una verifica DB ma non persiste, così il comportamento demo resta invariato.
        $this->dao->verificaConnessione();
        // [CONTROLLER APPLICATIVO - Pazienti] Restituisce esito neutro compatibile con la demo.
        return ['demo' => true];
    }
}

```

## `funzionalita/pazienti_package/Pazienti_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Pazienti] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.pazienti_package = window.ClinicaFlow.pazienti_package || {};
// [CONTROLLER GRAFICO - Pazienti] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.pazienti_package.Pazienti_ControlGrafico = class Pazienti_ControlGrafico {
  // [CONTROLLER GRAFICO - Pazienti] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Pazienti] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('patients-root');
    // [CONTROLLER GRAFICO - Pazienti] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.pazienti_package.Pazienti_View();
  }
  // [CONTROLLER GRAFICO - Pazienti] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Pazienti] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.pazienti_package.Pazienti_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Pazienti] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('patients', bean);
    // [BEAN/DTO - Pazienti] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.pazienti_package.Pazienti_Bean.daRisposta(risposta.data);
    // [VIEW - Pazienti] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.pazienti);
    // [CONTROLLER GRAFICO - Pazienti] Collega il pulsante Nuovo paziente dopo il rendering della View.
    this.collegaNuovoPaziente();
  }
  // [CONTROLLER GRAFICO - Pazienti] Apre il form grafico della funzione mantenendo il comportamento esistente.
  collegaNuovoPaziente() {
    // [CONTROLLER GRAFICO - Pazienti] Recupera il pulsante della View.
    const pulsante = document.getElementById('newPatient');
    // [CONTROLLER GRAFICO - Pazienti] Esce quando la View non contiene il pulsante.
    if (!pulsante) return;
    // [CONTROLLER GRAFICO - Pazienti] Collega il click al form della funzione.
    pulsante.addEventListener('click', () => this.apriModale());
  }
  // [VIEW - Pazienti] Monta la form View della feature nel contenitore modale comune.
  apriModale() {
    // [VIEW - Pazienti] Recupera il contenitore modale.
    const modal = document.getElementById('modal');
    // [VIEW - Pazienti] Recupera il contenitore del form.
    const contenuto = document.getElementById('modalContent');
    // [VIEW - Pazienti] Inserisce la View del form Pazienti.
    contenuto.innerHTML = new window.ClinicaFlow.pazienti_package.Pazienti_Form_View().render();
    // [CONTROLLER GRAFICO - Pazienti] Mostra la modale.
    modal.classList.add('open');
    // [CONTROLLER GRAFICO - Pazienti] Collega Annulla.
    document.getElementById('cancelModal').onclick = () => modal.classList.remove('open');
    // [CONTROLLER GRAFICO - Pazienti] Collega Crea al passaggio Bean -> ControllerApplicativo.
    document.getElementById('saveModal').onclick = () => this.creaPaziente(modal);
  }
  // [CONTROLLER GRAFICO - Pazienti] Invia il Bean di creazione senza modificare il messaggio grafico della demo.
  async creaPaziente(modal) {
    // [CONTROLLER GRAFICO - Pazienti] Recupera i campi grafici del form.
    const campi = modal.querySelectorAll('input');
    // [BEAN/DTO - Pazienti] Crea il DTO con i valori inseriti dall'utente.
    const bean = new window.ClinicaFlow.pazienti_package.Pazienti_Bean({ operazione: 'registra_demo', nome: campi[0]?.value || '', cognome: campi[1]?.value || '', telefono: campi[3]?.value || '', email: campi[4]?.value || '' });
    // [CONTROLLER GRAFICO - Pazienti] Passa il DTO al ControllerApplicativo.
    try { await window.ClinicaFlow.Infrastruttura.ApiClient.invia('pazienti', bean); } catch (_) {}
    // [VIEW - Pazienti] Chiude la modale come nella versione esistente.
    modal.classList.remove('open');
    // [INFRASTRUTTURA - Toast] Mantiene il messaggio demo esistente.
    window.ClinicaFlow.Infrastruttura.mostraToast('Operazione registrata (demo)');
  }
};

```

## `funzionalita/pazienti_package/Pazienti_DAO.php`

```php
<?php
// [DAO - Pazienti] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Pazienti] Colloca il DAO nel package Pazienti.
namespace ClinicaFlow\pazienti_package;
// [DAO - Pazienti] Importa PDO per MySQL.
use PDO;
// [DAO - Pazienti] Isola tutte le query pazienti.
final class Pazienti_DAO
{
    // [DAO - Pazienti] Riceve la connessione PDO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Pazienti] Legge le righe paziente usate dalla tabella della View.
    public function leggi(): array
    {
        // [DAO - Pazienti] Esegue la query con i dati demo necessari alla stessa UI.
        return $this->connessione->query('SELECT initials, name_display AS name, code, professional, specialty, last_visit AS lastVisit, next_appointment AS nextAppointment, status_label AS status FROM patients_view ORDER BY id')->fetchAll();
    }
    // [DAO - Pazienti] Verifica la connessione per la creazione demo senza salvare dati come nella versione precedente.
    public function verificaConnessione(): bool
    {
        // [DAO - Pazienti] Esegue una query innocua.
        return (int)$this->connessione->query('SELECT 1')->fetchColumn() === 1;
    }
}

```

## `funzionalita/pazienti_package/Pazienti_Form_View.js`

```javascript
window.ClinicaFlow.pazienti_package = window.ClinicaFlow.pazienti_package || {};

// [VIEW - Modale > Form Paziente] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.pazienti_package.Pazienti_Form_View = class Pazienti_Form_View {

  // [VIEW - Modale > Form Paziente] Costruisce esclusivamente il form demo per un nuovo paziente.
  render() {
    // [VIEW - Modale > Form Paziente] Restituisce i campi identici alla demo originale.
    return `
      <!-- [VIEW - Modale > Form Paziente] Titolo. -->
      <h2>Nuovo paziente</h2>
      <!-- [VIEW - Modale > Form Paziente] Nota sul backend futuro. -->
      <p>Demo UI: anagrafica e consenso saranno gestiti dal backend.</p>
      <!-- [VIEW - Modale > Form Paziente] Nome e cognome. -->
      <div class="two-col"><label>Nome<input placeholder="Nome"></label><label>Cognome<input placeholder="Cognome"></label></div>
      <!-- [VIEW - Modale > Form Paziente] Data di nascita e telefono. -->
      <div class="two-col"><label>Data di nascita<input type="date"></label><label>Telefono<input placeholder="+39 ..."></label></div>
      <!-- [VIEW - Modale > Form Paziente] Email. -->
      <label>Email<input type="email" placeholder="email@esempio.it"></label>
      <!-- [VIEW - Modale > Form Paziente] Professionista associato. -->
      <label>Professionista<select><option>Dott.ssa Maria Rossi — Psicologia</option><option>Dott. Luca Verdi — Logopedia</option><option>Dott.ssa Elena Neri — Dietologia</option></select></label>
      <!-- [VIEW - Modale > Form Paziente] Azioni. -->
      <div class="form-actions"><button class="secondary" id="cancelModal">Annulla</button><button class="primary" id="saveModal">Crea paziente</button></div>`;
  }

};

```

## `funzionalita/pazienti_package/Pazienti_Model.php`

```php
<?php
// [MODEL - Pazienti] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Pazienti] Colloca il modello nel package Pazienti.
namespace ClinicaFlow\pazienti_package;
// [MODEL - Pazienti] Contiene la validazione anagrafica senza accesso al database.
final class Pazienti_Model
{
    // [MODEL - Pazienti] Verifica i dati minimi del form demo.
    public function validaCreazione(?string $nome, ?string $cognome): void
    {
        // [MODEL - Pazienti] Rifiuta il nome mancante.
        if (trim((string)$nome) === '' || trim((string)$cognome) === '') throw new \InvalidArgumentException('Nome e cognome sono obbligatori.');
    }
}

```

## `funzionalita/pazienti_package/Pazienti_View.js`

```javascript
window.ClinicaFlow.pazienti_package = window.ClinicaFlow.pazienti_package || {};

// [VIEW - Pazienti] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.pazienti_package.Pazienti_View = class Pazienti_View {

  // [VIEW - Pazienti] Costruisce anagrafica, filtri e tabella pazienti.
  render(patients) {
    // [VIEW - Pazienti > Tabella] Trasforma ogni bean paziente nella riga originale.
    const rows = patients.map((patient) => `
            <!-- [VIEW - Pazienti > Tabella] Riga del paziente ${patient.name}. -->
            <tr>
              <!-- [VIEW - Pazienti > Tabella] Anagrafica con avatar e codice. -->
              <td><div class="person"><div class="avatar pastel">${patient.initials}</div><div><strong>${patient.name}</strong><span>${patient.code}</span></div></div></td>
              <!-- [VIEW - Pazienti > Tabella] Professionista e specialità. -->
              <td>${patient.professional}<br><small>${patient.specialty}</small></td>
              <!-- [VIEW - Pazienti > Tabella] Ultima visita. -->
              <td>${patient.lastVisit}</td>
              <!-- [VIEW - Pazienti > Tabella] Prossimo appuntamento. -->
              <td>${patient.nextAppointment}</td>
              <!-- [VIEW - Pazienti > Tabella] Stato. -->
              <td><span class="status ${patient.status === "Attivo" ? "confirmed" : "pending"}">${patient.status}</span></td>
              <!-- [VIEW - Pazienti > Tabella] Azioni demo. -->
              <td>•••</td>
            </tr>`).join("");
    // [VIEW - Pazienti] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Pazienti] Sezione anagrafica. -->
      <section class="page" id="patients">
        <!-- [VIEW - Pazienti > Intestazione] Titolo e pulsante nuovo paziente. -->
        <div class="page-heading"><div><p class="eyebrow">ASSISTITI</p><h1>Pazienti</h1><p class="muted">Anagrafica, contatti e percorso assistenziale.</p></div><button class="primary" id="newPatient">+ Nuovo paziente</button></div>
        <!-- [VIEW - Pazienti > Filtri] Ricerca e filtri invariati. -->
        <div class="filters"><div class="search"><span>⌕</span><input placeholder="Cerca per nome, codice o telefono..."></div><select><option>Tutti i professionisti</option><option>Psicologia</option><option>Logopedia</option><option>Dietologia</option></select><select><option>Stato: tutti</option><option>Attivo</option><option>In attesa</option></select></div>
        <!-- [VIEW - Pazienti > Tabella] Card tabella. -->
        <div class="card table-card"><table>
          <!-- [VIEW - Pazienti > Tabella] Intestazioni. -->
          <thead><tr><th>Paziente</th><th>Professionista</th><th>Ultima visita</th><th>Prossimo appuntamento</th><th>Stato</th><th></th></tr></thead>
          <!-- [VIEW - Pazienti > Tabella] Righe. -->
          <tbody>${rows}</tbody>
        </table></div>
      </section>`;
  }

};

```

## `funzionalita/report_package/Report_Bean.js`

```javascript
// [BEAN/DTO - Report] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.report_package = window.ClinicaFlow.report_package || {};
// [BEAN/DTO - Report] Incapsula le metriche restituite dal database.
window.ClinicaFlow.report_package.Report_Bean = class Report_Bean {
  // [BEAN/DTO - Report] Costruisce il DTO con le metriche.
  constructor({ operazione = 'carica', metriche = [] } = {}) {
    // [BEAN/DTO - Report] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Report] Memorizza le metriche.
    this.metriche = metriche;
  }
  // [BEAN/DTO - Report] Serializza il DTO.
  toJSON() {
    // [BEAN/DTO - Report] Restituisce il contratto minimo.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Report] Ricostruisce il DTO risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Report] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.report_package.Report_Bean({ dati, metriche: dati.metriche || [] });
  }
};

```

## `funzionalita/report_package/Report_Bean.php`

```php
<?php
// [BEAN/DTO - Report] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Report] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\report_package;
// [BEAN/DTO - Report] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Report_Bean
{
    // [BEAN/DTO - Report] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Report] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Report] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Report] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Report] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Report] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}

```

## `funzionalita/report_package/Report_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Report] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Report] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\report_package;
// [CONTROLLER APPLICATIVO - Report] Importa il Bean server.
use ClinicaFlow\report_package\Report_Bean;
// [CONTROLLER APPLICATIVO - Report] Coordina Model e DAO senza SQL nel controller.
final class Report_ControlApp
{
    // [CONTROLLER APPLICATIVO - Report] Riceve il DAO.
    public function __construct(private Report_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Report] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Report_Bean $bean): array
    {
        // [MODEL - Report] Crea il Model della funzionalità.
        $modello = new Report_Model();
        // [MODEL - Report] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - Report] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - Report] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Report] Restituisce il risultato nel contratto della View.
        return ['metriche' => $dati];
    }
}

```

## `funzionalita/report_package/Report_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Report] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.report_package = window.ClinicaFlow.report_package || {};
// [CONTROLLER GRAFICO - Report] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.report_package.Report_ControlGrafico = class Report_ControlGrafico {
  // [CONTROLLER GRAFICO - Report] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Report] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('reports-root');
    // [CONTROLLER GRAFICO - Report] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.report_package.Report_View();
  }
  // [CONTROLLER GRAFICO - Report] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Report] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.report_package.Report_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Report] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('reports', bean);
    // [BEAN/DTO - Report] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.report_package.Report_Bean.daRisposta(risposta.data);
    // [VIEW - Report] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.metriche);
  }
};

```

## `funzionalita/report_package/Report_DAO.php`

```php
<?php
// [DAO - Report] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Report] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\report_package;
// [DAO - Report] Importa PDO per query preparate.
use PDO;
// [DAO - Report] Isola la query della funzionalità.
final class Report_DAO
{
    // [DAO - Report] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Report] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Report] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT label, value_display AS value, width_value AS width, detail FROM report_metrics ORDER BY position_no')->fetchAll();
    }
}

```

## `funzionalita/report_package/Report_Model.php`

```php
<?php
// [MODEL - Report] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Report] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\report_package;
// [MODEL - Report] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Report_Model
{
    // [MODEL - Report] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Report] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Report] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Report] Non accede a PDO e non conosce la View.
        return $dati;
    }
}

```

## `funzionalita/report_package/Report_View.js`

```javascript
window.ClinicaFlow.report_package = window.ClinicaFlow.report_package || {};

// [VIEW - Report] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.report_package.Report_View = class Report_View {

  // [VIEW - Report] Costruisce le quattro metriche operative e amministrative.
  render(metrics) {
    // [VIEW - Report > Metriche] Trasforma ogni bean in una card con barra percentuale.
    const cards = metrics.map((metric) => `
            <!-- [VIEW - Report > Metriche] Card ${metric.label}. -->
            <div class="card report-card">
              <!-- [VIEW - Report > Metriche] Etichetta. -->
              <span>${metric.label}</span>
              <!-- [VIEW - Report > Metriche] Valore. -->
              <strong>${metric.value}</strong>
              <!-- [VIEW - Report > Metriche] Barra percentuale. -->
              <div class="mini-bar"><i style="width:${metric.width}%"></i></div>
              <!-- [VIEW - Report > Metriche] Dettaglio. -->
              <small>${metric.detail}</small>
            </div>`).join("");
    // [VIEW - Report] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Report] Sezione analisi. -->
      <section class="page" id="reports">
        <!-- [VIEW - Report > Intestazione] Titolo e download report. -->
        <div class="page-heading"><div><p class="eyebrow">ANALISI</p><h1>Report</h1><p class="muted">Indicatori operativi e amministrativi della struttura.</p></div><button class="secondary">↓ Scarica report</button></div>
        <!-- [VIEW - Report > Metriche] Griglia indicatori. -->
        <div class="report-grid">${cards}</div>
      </section>`;
  }

};

```

## `funzionalita/sessione_package/Sessione_Bean.js`

```javascript
// [BEAN/DTO - Sessione] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.sessione_package = window.ClinicaFlow.sessione_package || {};
// [BEAN/DTO - Sessione] Incapsula la richiesta di logout mantenendo il comportamento demo originale.
window.ClinicaFlow.sessione_package.Sessione_Bean = class Sessione_Bean {
  // [BEAN/DTO - Sessione] Costruisce il DTO dell'operazione logout.
  constructor({ operazione = 'logout' } = {}) {
    // [BEAN/DTO - Sessione] Memorizza il tipo di operazione.
    this.operazione = operazione;
  }
  // [BEAN/DTO - Sessione] Serializza la richiesta.
  toJSON() {
    // [BEAN/DTO - Sessione] Restituisce il contratto JSON minimo.
    return { operazione: this.operazione };
  }
};

```

## `funzionalita/sessione_package/Sessione_Bean.php`

```php
<?php
// [BEAN/DTO - Sessione] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Sessione] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\sessione_package;
// [BEAN/DTO - Sessione] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Sessione_Bean
{
    // [BEAN/DTO - Sessione] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Sessione] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Sessione] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Sessione] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Sessione] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Sessione] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}

```

## `funzionalita/sessione_package/Sessione_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Sessione] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Sessione] Colloca il ControllerApplicativo nel package sessione.
namespace ClinicaFlow\sessione_package;
// [CONTROLLER APPLICATIVO - Sessione] Importa il Bean/DTO server.
use ClinicaFlow\sessione_package\Sessione_Bean;
// [CONTROLLER APPLICATIVO - Sessione] Coordina Model e DAO mantenendo il logout in modalità demo.
final class Sessione_ControlApp
{
    // [CONTROLLER APPLICATIVO - Sessione] Riceve il DAO.
    public function __construct(private Sessione_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Sessione] Esegue il flusso della funzione logout.
    public function esegui(Sessione_Bean $bean): array
    {
        // [MODEL - Sessione] Crea il Model della funzionalità.
        $modello = new Sessione_Model();
        // [DAO - Sessione] Verifica lo stato della sessione demo nel database.
        $this->dao->sessioneDemoValida();
        // [CONTROLLER APPLICATIVO - Sessione] Non invalida la sessione perché la versione esistente è esplicitamente demo.
        return ['messaggio' => $modello->messaggioDemo()];
    }
}

```

## `funzionalita/sessione_package/Sessione_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Sessione] Crea lo spazio della funzionalità sessione.
window.ClinicaFlow.sessione_package = window.ClinicaFlow.sessione_package || {};
// [CONTROLLER GRAFICO - Sessione] Gestisce l'evento logout mantenendo invariato il comportamento demo.
window.ClinicaFlow.sessione_package.Sessione_ControlGrafico = class Sessione_ControlGrafico {
  // [CONTROLLER GRAFICO - Sessione] Costruisce il controller con la View della funzionalità.
  constructor() {
    // [VIEW - Sessione] Crea la View che conosce il controllo grafico logout.
    this.view = new window.ClinicaFlow.sessione_package.Sessione_View();
  }
  // [CONTROLLER GRAFICO - Sessione] Collega il pulsante di logout presente nella Sidebar_View.
  collega() {
    // [CONTROLLER GRAFICO - Sessione] Recupera il pulsante esci.
    const pulsante = document.querySelector(this.view.selettoreLogout());
    // [CONTROLLER GRAFICO - Sessione] Collega il click al flusso Bean -> ControllerApplicativo.
    if (pulsante) pulsante.onclick = () => this.eseguiLogoutDemo();
  }
  // [CONTROLLER GRAFICO - Sessione] Esegue il flusso applicativo senza effettuare il logout reale.
  async eseguiLogoutDemo() {
    // [BEAN/DTO - Sessione] Costruisce il DTO logout.
    const bean = new window.ClinicaFlow.sessione_package.Sessione_Bean({ operazione: 'logout' });
    // [CONTROLLER GRAFICO - Sessione] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('sessione', bean);
    // [INFRASTRUTTURA - Toast] Mantiene esattamente il messaggio demo mostrato prima.
    window.ClinicaFlow.Infrastruttura.mostraToast(risposta.data.messaggio);
  }
};

```

## `funzionalita/sessione_package/Sessione_DAO.php`

```php
<?php
// [DAO - Sessione] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Sessione] Colloca il DAO nel package sessione.
namespace ClinicaFlow\sessione_package;
// [DAO - Sessione] Importa PDO per verificare la sessione demo nel database.
use PDO;
// [DAO - Sessione] Isola la persistenza tecnica della sessione demo.
final class Sessione_DAO
{
    // [DAO - Sessione] Riceve PDO.
    public function __construct(private PDO $connessione) {}
    // [DAO - Sessione] Verifica che l'utente demo sia ancora disponibile.
    public function sessioneDemoValida(): bool
    {
        // [DAO - Sessione] Legge la riga della sessione senza effettuare il logout reale.
        return (int)$this->connessione->query('SELECT COUNT(*) FROM session_demo WHERE id = 1 AND active = 1')->fetchColumn() === 1;
    }
}

```

## `funzionalita/sessione_package/Sessione_Model.php`

```php
<?php
// [MODEL - Sessione] Abilita i tipi stretti.
declare(strict_types=1);
// [MODEL - Sessione] Colloca il modello nel package sessione.
namespace ClinicaFlow\sessione_package;
// [MODEL - Sessione] Mantiene invariato il comportamento demo di logout.
final class Sessione_Model
{
    // [MODEL - Sessione] Costruisce il messaggio demo restituito alla View.
    public function messaggioDemo(): string
    {
        // [MODEL - Sessione] Restituisce esattamente il testo già mostrato all'utente.
        return 'Demo: qui verrà eseguito il logout PHP';
    }
}

```

## `funzionalita/sessione_package/Sessione_View.js`

```javascript
// [VIEW - Sessione] Crea la View logica della funzionalità sessione senza modificare il layout.
window.ClinicaFlow.sessione_package = window.ClinicaFlow.sessione_package || {};
// [VIEW - Sessione] Espone esclusivamente il selettore del controllo logout già presente nella Sidebar_View.
window.ClinicaFlow.sessione_package.Sessione_View = class Sessione_View {
  // [VIEW - Sessione] Restituisce il controllo grafico esistente.
  selettoreLogout() {
    // [VIEW - Sessione] Individua il pulsante di uscita già presente nella UI.
    return '#logoutBtn';
  }
};

```

## `funzionalita/staff_package/Staff_Bean.js`

```javascript
// [BEAN/DTO - Staff] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.staff_package = window.ClinicaFlow.staff_package || {};
// [BEAN/DTO - Staff] Incapsula i professionisti.
window.ClinicaFlow.staff_package.Staff_Bean = class Staff_Bean {
  // [BEAN/DTO - Staff] Costruisce il DTO con la lista professionisti.
  constructor({ operazione = 'carica', professionisti = [] } = {}) {
    // [BEAN/DTO - Staff] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Staff] Memorizza i professionisti.
    this.professionisti = professionisti.map((riga) => ({ ...riga, getSubtitle: () => riga.role ? `${riga.specialty} · ${riga.role}` : riga.specialty }));
  }
  // [BEAN/DTO - Staff] Serializza il DTO.
  toJSON() {
    // [BEAN/DTO - Staff] Restituisce il contratto minimo.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Staff] Ricostruisce il DTO risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Staff] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.staff_package.Staff_Bean({ dati, professionisti: dati.professionisti || [] });
  }
};

```

## `funzionalita/staff_package/Staff_Bean.php`

```php
<?php
// [BEAN/DTO - Staff] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Staff] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\staff_package;
// [BEAN/DTO - Staff] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Staff_Bean
{
    // [BEAN/DTO - Staff] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Staff] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Staff] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Staff] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Staff] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Staff] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}

```

## `funzionalita/staff_package/Staff_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Staff] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Staff] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\staff_package;
// [CONTROLLER APPLICATIVO - Staff] Importa il Bean server.
use ClinicaFlow\staff_package\Staff_Bean;
// [CONTROLLER APPLICATIVO - Staff] Coordina Model e DAO senza SQL nel controller.
final class Staff_ControlApp
{
    // [CONTROLLER APPLICATIVO - Staff] Riceve il DAO.
    public function __construct(private Staff_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Staff] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Staff_Bean $bean): array
    {
        // [MODEL - Staff] Crea il Model della funzionalità.
        $modello = new Staff_Model();
        // [MODEL - Staff] Riceve il Bean prima dell'accesso al database.
        $modello->preparaRichiesta($bean);
        // [DAO - Staff] Recupera i dati della funzionalità dal database.
        $righeDao = $this->dao->leggi();
        // [MODEL - Staff] Trasforma le righe del DAO senza conoscere la View.
        $dati = $modello->prepara($righeDao);
        // [CONTROLLER APPLICATIVO - Staff] Restituisce il risultato nel contratto della View.
        return ['professionisti' => $dati];
    }
}

```

## `funzionalita/staff_package/Staff_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Staff] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.staff_package = window.ClinicaFlow.staff_package || {};
// [CONTROLLER GRAFICO - Staff] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.staff_package.Staff_ControlGrafico = class Staff_ControlGrafico {
  // [CONTROLLER GRAFICO - Staff] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Staff] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('team-root');
    // [CONTROLLER GRAFICO - Staff] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.staff_package.Staff_View();
  }
  // [CONTROLLER GRAFICO - Staff] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Staff] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.staff_package.Staff_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Staff] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('team', bean);
    // [BEAN/DTO - Staff] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.staff_package.Staff_Bean.daRisposta(risposta.data);
    // [VIEW - Staff] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.professionisti);
  }
};

```

## `funzionalita/staff_package/Staff_DAO.php`

```php
<?php
// [DAO - Staff] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Staff] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\staff_package;
// [DAO - Staff] Importa PDO per query preparate.
use PDO;
// [DAO - Staff] Isola la query della funzionalità.
final class Staff_DAO
{
    // [DAO - Staff] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Staff] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Staff] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT initials, name_display AS name, specialty, role, status_label AS status FROM professionals_view ORDER BY id')->fetchAll();
    }
}

```

## `funzionalita/staff_package/Staff_Model.php`

```php
<?php
// [MODEL - Staff] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Staff] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\staff_package;
// [MODEL - Staff] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Staff_Model
{
    // [MODEL - Staff] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Staff] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Staff] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Staff] Non accede a PDO e non conosce la View.
        return $dati;
    }
}

```

## `funzionalita/staff_package/Staff_View.js`

```javascript
window.ClinicaFlow.staff_package = window.ClinicaFlow.staff_package || {};

// [VIEW - Staff] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.staff_package.Staff_View = class Staff_View {

  // [VIEW - Staff] Costruisce le card dei professionisti.
  render(professionals) {
    // [VIEW - Staff] Trasforma ogni bean professionista in una card.
    const cards = professionals.map((professional) => `
          <!-- [VIEW - Staff > Membro] Card del professionista ${professional.name}. -->
          <div class="card team-member">
            <!-- [VIEW - Staff > Membro] Avatar. -->
            <div class="avatar large pastel">${professional.initials}</div>
            <!-- [VIEW - Staff > Membro] Nome. -->
            <h3>${professional.name}</h3>
            <!-- [VIEW - Staff > Membro] Specialità e ruolo. -->
            <span>${professional.getSubtitle()}</span>
            <!-- [VIEW - Staff > Membro] Stato e azioni. -->
            <div class="member-actions"><span class="status confirmed">${professional.status}</span><button>•••</button></div>
          </div>`).join("");
    // [VIEW - Staff] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Staff] Sezione professionisti. -->
      <section class="page" id="team">
        <!-- [VIEW - Staff > Intestazione] Titolo e invito. -->
        <div class="page-heading"><div><p class="eyebrow">STRUTTURA</p><h1>Staff</h1><p class="muted">Professionisti, ruoli e autorizzazioni.</p></div><button class="primary">+ Invita professionista</button></div>
        <!-- [VIEW - Staff > Griglia] Cards professionisti. -->
        <div class="team-grid">${cards}</div>
      </section>`;
  }

};

```

## `funzionalita/tasse_package/Tasse_Bean.js`

```javascript
// [BEAN/DTO - Tasse] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.tasse_package = window.ClinicaFlow.tasse_package || {};
// [BEAN/DTO - Tasse] Incapsula le scadenze fiscali.
window.ClinicaFlow.tasse_package.Tasse_Bean = class Tasse_Bean {
  // [BEAN/DTO - Tasse] Costruisce il DTO con le scadenze.
  constructor({ operazione = 'carica', scadenze = [] } = {}) {
    // [BEAN/DTO - Tasse] Memorizza l'operazione.
    this.operazione = operazione;
    // [BEAN/DTO - Tasse] Memorizza l'elenco delle scadenze.
    this.scadenze = scadenze;
  }
  // [BEAN/DTO - Tasse] Serializza il DTO.
  toJSON() {
    // [BEAN/DTO - Tasse] Restituisce il contratto minimo della funzione.
    return { operazione: this.operazione };
  }
  // [BEAN/DTO - Tasse] Ricostruisce la risposta.
  static daRisposta(dati) {
    // [BEAN/DTO - Tasse] Restituisce il Bean pronto alla View.
    return new window.ClinicaFlow.tasse_package.Tasse_Bean({ dati, scadenze: dati.scadenze || [] });
  }
};

```

## `funzionalita/tasse_package/Tasse_Bean.php`

```php
<?php
// [BEAN/DTO - Tasse] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Tasse] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\tasse_package;
// [BEAN/DTO - Tasse] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Tasse_Bean
{
    // [BEAN/DTO - Tasse] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Tasse] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Tasse] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Tasse] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Tasse] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Tasse] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}

```

## `funzionalita/tasse_package/Tasse_ControlApp.php`

```php
<?php
// [CONTROLLER APPLICATIVO - Tasse] Abilita i tipi stretti.
declare(strict_types=1);
// [CONTROLLER APPLICATIVO - Tasse] Colloca il controller nel package della funzionalità.
namespace ClinicaFlow\tasse_package;
// [CONTROLLER APPLICATIVO - Tasse] Importa il Bean server.
use ClinicaFlow\tasse_package\Tasse_Bean;
// [CONTROLLER APPLICATIVO - Tasse] Coordina Model e DAO senza SQL nel controller.
final class Tasse_ControlApp
{
    // [CONTROLLER APPLICATIVO - Tasse] Riceve il DAO.
    public function __construct(private Tasse_DAO $dao) {}
    // [CONTROLLER APPLICATIVO - Tasse] Esegue il caricamento dati richiesto dal Bean.
    public function esegui(Tasse_Bean $bean): array
    {
        // [MODEL - Tasse] Crea il Model della funzionalità.
        $modello = new Tasse_Model();
        // [CONTROLLER APPLICATIVO - Tasse] Recupera i dati tramite DAO dopo il passaggio nel Model.
        $dati = $modello->prepara($this->dao->leggi());
        // [CONTROLLER APPLICATIVO - Tasse] Restituisce il risultato nel contratto della View.
        return ['scadenze' => array_map(static fn(array $riga) => ['day' => (string)$riga['day'], 'month' => [9=>'SET',10=>'OTT',11=>'NOV'][(int)$riga['month_number']] ?? (string)$riga['month_number'], 'title' => $riga['title'], 'description' => $riga['description'], 'badge' => $riga['badge'], 'urgent' => (bool)$riga['urgent']], $dati)];
    }
}

```

## `funzionalita/tasse_package/Tasse_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Tasse] Crea lo spazio globale della funzionalità.
window.ClinicaFlow.tasse_package = window.ClinicaFlow.tasse_package || {};
// [CONTROLLER GRAFICO - Tasse] Gestisce il caricamento della View tramite Bean e ControllerApplicativo.
window.ClinicaFlow.tasse_package.Tasse_ControlGrafico = class Tasse_ControlGrafico {
  // [CONTROLLER GRAFICO - Tasse] Costruisce il controller grafico.
  constructor() {
    // [CONTROLLER GRAFICO - Tasse] Recupera il mountpoint della funzionalità.
    this.mount = document.getElementById('taxes-root');
    // [CONTROLLER GRAFICO - Tasse] Crea la View specifica della funzionalità.
    this.view = new window.ClinicaFlow.tasse_package.Tasse_View();
  }
  // [CONTROLLER GRAFICO - Tasse] Carica i dati della funzionalità dal ControllerApplicativo.
  async inizializza() {
    // [BEAN/DTO - Tasse] Crea il DTO di caricamento.
    const bean = new window.ClinicaFlow.tasse_package.Tasse_Bean({ operazione: 'carica' });
    // [CONTROLLER GRAFICO - Tasse] Invia il DTO al ControllerApplicativo.
    const risposta = await window.ClinicaFlow.Infrastruttura.ApiClient.invia('taxes', bean);
    // [BEAN/DTO - Tasse] Ricostruisce il DTO di risposta.
    const dati = window.ClinicaFlow.tasse_package.Tasse_Bean.daRisposta(risposta.data);
    // [VIEW - Tasse] Monta la View usando esclusivamente il Bean di risposta.
    this.mount.innerHTML = this.view.render(dati.scadenze);
  }
};

```

## `funzionalita/tasse_package/Tasse_DAO.php`

```php
<?php
// [DAO - Tasse] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - Tasse] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\tasse_package;
// [DAO - Tasse] Importa PDO per query preparate.
use PDO;
// [DAO - Tasse] Isola la query della funzionalità.
final class Tasse_DAO
{
    // [DAO - Tasse] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - Tasse] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - Tasse] Esegue la query specifica della funzionalità.
        return $this->connessione->query('SELECT DAY(due_date) AS day, MONTH(due_date) AS month_number, title, description, badge, urgent FROM deadlines_view ORDER BY due_date')->fetchAll();
    }
}

```

## `funzionalita/tasse_package/Tasse_Model.php`

```php
<?php
// [MODEL - Tasse] Abilita i tipi stretti del modello.
declare(strict_types=1);
// [MODEL - Tasse] Colloca il modello nel package della funzionalità.
namespace ClinicaFlow\tasse_package;
// [MODEL - Tasse] Mantiene pura la trasformazione dei dati ricevuti dal DAO.
final class Tasse_Model
{
    // [MODEL - Tasse] Riceve il Bean prima dell'accesso al database.
    public function preparaRichiesta(mixed $bean): void
    {
        // [MODEL - Tasse] Non modifica i dati perché la richiesta di lettura non richiede filtri server nella demo.
    }
    // [MODEL - Tasse] Restituisce i dati già pronti per il ControllerApplicativo.
    public function prepara(array $dati): array
    {
        // [MODEL - Tasse] Non accede a PDO e non conosce la View.
        return $dati;
    }
}

```

## `funzionalita/tasse_package/Tasse_View.js`

```javascript
window.ClinicaFlow.tasse_package = window.ClinicaFlow.tasse_package || {};

// [VIEW - Tasse e scadenze] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.tasse_package.Tasse_View = class Tasse_View {

  // [VIEW - Tasse e scadenze] Costruisce alert e calendario fiscale.
  render(deadlines) {
    // [VIEW - Tasse e scadenze > Calendario] Trasforma i bean in righe fiscali.
    const rows = deadlines.map((deadline, index) => `
            <!-- [VIEW - Tasse e scadenze > Calendario] Riga fiscale ${index + 1}. -->
            <div class="tax-row">
              <!-- [VIEW - Tasse e scadenze > Calendario] Data e stato urgente. -->
              <div class="tax-date${deadline.urgent ? " urgent" : ""}"><strong>${deadline.day}</strong><span>${deadline.month}</span></div>
              <!-- [VIEW - Tasse e scadenze > Calendario] Titolo e descrizione. -->
              <div><strong>${deadline.title}</strong><span>${deadline.description}</span></div>
              <!-- [VIEW - Tasse e scadenze > Calendario] Badge. -->
              <span class="pill ${deadline.urgent ? "orange" : "gray"}">${deadline.badge}</span>
              <!-- [VIEW - Tasse e scadenze > Calendario] Azione. -->
              <button class="text-btn">${index === 0 ? "Apri" : "Dettagli"} →</button>
            </div>`).join("");
    // [VIEW - Tasse e scadenze] Restituisce la pagina completa.
    return `
      <!-- [VIEW - Tasse e scadenze] Sezione fiscale. -->
      <section class="page" id="taxes">
        <!-- [VIEW - Tasse e scadenze > Intestazione] Titolo ed esportazione. -->
        <div class="page-heading"><div><p class="eyebrow">AMMINISTRAZIONE</p><h1>Tasse e scadenze</h1><p class="muted">Calendario fiscale e documenti per la gestione amministrativa.</p></div><button class="secondary">Esporta riepilogo</button></div>
        <!-- [VIEW - Tasse e scadenze > Alert] Avviso scadenze. -->
        <div class="tax-alert"><span>!</span><div><strong>4 scadenze richiedono attenzione</strong><p>Controlla gli importi e coordina i versamenti con il commercialista.</p></div></div>
        <!-- [VIEW - Tasse e scadenze > Calendario] Card calendario. -->
        <div class="card deadline-table">
          <!-- [VIEW - Tasse e scadenze > Calendario] Header con anno. -->
          <div class="card-header"><h2>Calendario fiscale</h2><select><option>2026</option><option>2027</option></select></div>
          <!-- [VIEW - Tasse e scadenze > Calendario] Righe delle scadenze. -->
          ${rows}
        </div>
      </section>`;
  }

};

```

## `funzione_package/Funzione_Avvio.js`

```javascript
// [CONTROLLER GRAFICO - Avvio] Crea lo spazio globale dell'applicazione.
window.ClinicaFlow = window.ClinicaFlow || {};
// [CONTROLLER GRAFICO - Avvio] Avvia tutte le funzionalità senza contenere logica di dominio.
window.ClinicaFlow.Funzione_Avvio = class Funzione_Avvio {
  // [CONTROLLER GRAFICO - Avvio] Avvia la dashboard quando il Browser ha caricato il DOM.
  static async avvia() {
    // [VIEW - Interfaccia] Monta Sidebar_View senza aggiungere logica applicativa.
    document.getElementById('sidebar-root').outerHTML = new window.ClinicaFlow.interfaccia_package.Sidebar_View().render({ initials: 'MR', name: 'Dott.ssa Giorgia Sgroi', specialty: 'Psicologa' });
    // [VIEW - Interfaccia] Monta Topbar_View senza aggiungere logica applicativa.
    document.getElementById('topbar-root').outerHTML = new window.ClinicaFlow.interfaccia_package.Topbar_View().render({ initials: 'MR', name: 'Dott.ssa Giorgia Sgroi', specialty: 'Psicologa' });
    // [VIEW - Interfaccia] Monta il contenitore Modale.
    document.getElementById('modal-root').outerHTML = new window.ClinicaFlow.interfaccia_package.Modal_View().render();
    // [VIEW - Interfaccia] Monta il Toast.
    document.getElementById('toast-root').outerHTML = new window.ClinicaFlow.interfaccia_package.Toast_View().render();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Dashboard.
    const dashboard = new window.ClinicaFlow.dashboard_package.Dashboard_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Appuntamenti.
    const appuntamenti = new window.ClinicaFlow.appuntamenti_package.Appuntamenti_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Pazienti.
    const pazienti = new window.ClinicaFlow.pazienti_package.Pazienti_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Cartelle cliniche.
    const cartelle = new window.ClinicaFlow.cartelle_cliniche_package.CartelleCliniche_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Documenti.
    const documenti = new window.ClinicaFlow.documenti_package.Documenti_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Fatturazione.
    const fatturazione = new window.ClinicaFlow.fatturazione_package.Fatturazione_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Tasse.
    const tasse = new window.ClinicaFlow.tasse_package.Tasse_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Report.
    const report = new window.ClinicaFlow.report_package.Report_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Staff.
    const staff = new window.ClinicaFlow.staff_package.Staff_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Crea il ControllerGrafico Impostazioni.
    const impostazioni = new window.ClinicaFlow.impostazioni_package.Impostazioni_ControlGrafico();
    // [CONTROLLER GRAFICO - Avvio] Avvia il caricamento iniziale di tutte le View tramite i rispettivi Bean.
    await Promise.all([dashboard.inizializza(), appuntamenti.inizializza(), pazienti.inizializza(), cartelle.inizializza(), documenti.inizializza(), fatturazione.inizializza(), tasse.inizializza(), report.inizializza(), staff.inizializza(), impostazioni.inizializza()]);
    // [CONTROLLER GRAFICO - Avvio] Collega la navigazione dopo che tutte le pagine sono state montate.
    window.ClinicaFlow.Navigazione_ControlGrafico.collega();
    // [CONTROLLER GRAFICO - Avvio] Collega il click delle notifiche tramite il suo ControllerGrafico.
    new window.ClinicaFlow.notifiche_package.Notifiche_ControlGrafico().collega();
    // [CONTROLLER GRAFICO - Avvio] Collega il logout demo tramite il suo ControllerGrafico.
    new window.ClinicaFlow.sessione_package.Sessione_ControlGrafico().collega();
  }
};
// [CONTROLLER GRAFICO - Avvio] Avvia l'applicazione solo dopo il caricamento del DOM.
document.addEventListener('DOMContentLoaded', () => window.ClinicaFlow.Funzione_Avvio.avvia().catch((errore) => console.error(errore)));

```

## `index.html`

```html
<!DOCTYPE html>
<!-- [VIEW - Shell] Dichiara lo standard HTML5 della dashboard ClinicaFlow. -->
<html lang="it">
<!-- [VIEW - Shell] Apre il documento in lingua italiana. -->
<head>
<!-- [VIEW - Shell] Imposta la codifica UTF-8. -->
<meta charset="UTF-8">
<!-- [VIEW - Shell] Mantiene il layout responsive originale. -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- [VIEW - Shell] Mantiene il colore tema originale. -->
<meta name="theme-color" content="#0f766e">
<!-- [VIEW - Shell] Mantiene il titolo originale della dashboard. -->
<title>ClinicaFlow — Area Professionisti</title>
<!-- [VIEW - Shell] Carica il CSS globale senza modificarne il contenuto. -->
<link rel="stylesheet" href="style.css">
</head>
<body>
<!-- [VIEW - Shell] Mantiene il contenitore generale previsto dal CSS. -->
<div class="app-shell">
<!-- [VIEW - Shell] Mountpoint per Sidebar_View. -->
<div id="sidebar-root"></div>
<!-- [VIEW - Shell] Mantiene l'area principale con la stessa classe del progetto esistente. -->
<main class="main">
<!-- [VIEW - Shell] Mountpoint per Topbar_View. -->
<div id="topbar-root"></div>
<!-- [VIEW - Shell] Mountpoint per tutte le View funzionali. -->
<div class="content" id="content-root">
<!-- [VIEW - Shell] I dieci page mountpoint permettono ai ControlGrafico di inserire le proprie View senza accorparle. -->
<div id="dashboard-root"></div><div id="agenda-root"></div><div id="patients-root"></div><div id="clinical-root"></div><div id="documents-root"></div><div id="finance-root"></div><div id="taxes-root"></div><div id="reports-root"></div><div id="team-root"></div><div id="settings-root"></div>
</div>
</main>
</div>
<!-- [VIEW - Shell] Mountpoint per la modale comune usata dalle feature appuntamenti e pazienti. -->
<div id="modal-root"></div>
<!-- [VIEW - Shell] Mountpoint per Toast_View. -->
<div id="toast-root"></div>

<!-- [CONTROLLER GRAFICO - Bootstrap] Carica la configurazione e il trasporto client. -->
<script src="infrastruttura/js/Configurazione.js"></script>
<!-- [CONTROLLER GRAFICO - Bootstrap] Carica ApiClient come semplice trasporto tra Bean e ControllerApplicativi. -->
<script src="infrastruttura/js/ApiClient.js"></script>
<!-- [CONTROLLER GRAFICO - Bootstrap] Carica la funzione comune per il toast. -->
<script src="infrastruttura/js/Toast.js"></script>
<!-- [VIEW - Bootstrap] Carica i componenti grafici comuni. -->
<script src="interfaccia_package/Sidebar_View.js"></script>
<script src="interfaccia_package/Topbar_View.js"></script>
<script src="interfaccia_package/Modal_View.js"></script>
<script src="interfaccia_package/Toast_View.js"></script>
<!-- [CONTROLLER GRAFICO - Bootstrap] Carica il ControllerGrafico di navigazione. -->
<script src="navigazione_package/Navigazione_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean della Dashboard. -->
<script src="funzionalita/dashboard_package/Dashboard_Bean.js"></script>
<!-- [VIEW - Bootstrap] Carica la View della Dashboard. -->
<script src="funzionalita/dashboard_package/Dashboard_View.js"></script>
<!-- [CONTROLLER GRAFICO - Bootstrap] Carica il ControllerGrafico della Dashboard. -->
<script src="funzionalita/dashboard_package/Dashboard_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean degli appuntamenti. -->
<script src="funzionalita/appuntamenti_package/Appuntamenti_Bean.js"></script>
<script src="funzionalita/appuntamenti_package/Appuntamenti_Form_View.js"></script>
<script src="funzionalita/appuntamenti_package/Appuntamenti_View.js"></script>
<script src="funzionalita/appuntamenti_package/Appuntamenti_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean dei pazienti. -->
<script src="funzionalita/pazienti_package/Pazienti_Bean.js"></script>
<script src="funzionalita/pazienti_package/Pazienti_Form_View.js"></script>
<script src="funzionalita/pazienti_package/Pazienti_View.js"></script>
<script src="funzionalita/pazienti_package/Pazienti_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean delle cartelle cliniche. -->
<script src="funzionalita/cartelle_cliniche_package/CartelleCliniche_Bean.js"></script>
<script src="funzionalita/cartelle_cliniche_package/CartelleCliniche_View.js"></script>
<script src="funzionalita/cartelle_cliniche_package/CartelleCliniche_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean dei documenti. -->
<script src="funzionalita/documenti_package/Documenti_Bean.js"></script>
<script src="funzionalita/documenti_package/Documenti_View.js"></script>
<script src="funzionalita/documenti_package/Documenti_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean di fatturazione. -->
<script src="funzionalita/fatturazione_package/Fatturazione_Bean.js"></script>
<script src="funzionalita/fatturazione_package/Fatturazione_View.js"></script>
<script src="funzionalita/fatturazione_package/Fatturazione_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean tasse. -->
<script src="funzionalita/tasse_package/Tasse_Bean.js"></script>
<script src="funzionalita/tasse_package/Tasse_View.js"></script>
<script src="funzionalita/tasse_package/Tasse_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean report. -->
<script src="funzionalita/report_package/Report_Bean.js"></script>
<script src="funzionalita/report_package/Report_View.js"></script>
<script src="funzionalita/report_package/Report_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean staff. -->
<script src="funzionalita/staff_package/Staff_Bean.js"></script>
<script src="funzionalita/staff_package/Staff_View.js"></script>
<script src="funzionalita/staff_package/Staff_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean impostazioni. -->
<script src="funzionalita/impostazioni_package/Impostazioni_Bean.js"></script>
<script src="funzionalita/impostazioni_package/Impostazioni_View.js"></script>
<script src="funzionalita/impostazioni_package/Impostazioni_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean notifiche. -->
<script src="funzionalita/notifiche_package/Notifiche_Bean.js"></script>
<script src="funzionalita/notifiche_package/Notifiche_View.js"></script>
<script src="funzionalita/notifiche_package/Notifiche_View.js"></script>
<script src="funzionalita/notifiche_package/Notifiche_ControlGrafico.js"></script>
<!-- [BEAN/DTO - Bootstrap] Carica il Bean sessione. -->
<script src="funzionalita/sessione_package/Sessione_Bean.js"></script>
<script src="funzionalita/sessione_package/Sessione_View.js"></script>
<script src="funzionalita/sessione_package/Sessione_View.js"></script>
<script src="funzionalita/sessione_package/Sessione_ControlGrafico.js"></script>
<!-- [CONTROLLER GRAFICO - Bootstrap] Avvia il caricamento delle funzionalità dopo il DOM ready. -->
<script src="funzione_package/Funzione_Avvio.js"></script>
</body>
</html>

```

## `infrastruttura/js/ApiClient.js`

```javascript
// [INFRASTRUTTURA] Recupera lo spazio globale dell'applicazione.
window.ClinicaFlow = window.ClinicaFlow || {};
// [INFRASTRUTTURA] Crea il contenitore del client HTTP.
window.ClinicaFlow.Infrastruttura = window.ClinicaFlow.Infrastruttura || {};
// [INFRASTRUTTURA] Incapsula esclusivamente il trasporto HTTP tra ControllerGrafico e ControllerApplicativo.
window.ClinicaFlow.Infrastruttura.ApiClient = class ApiClient {
  // [INFRASTRUTTURA] Invia un Bean/DTO al ControllerApplicativo della funzionalità indicata.
  static async invia(funzione, bean) {
    // [INFRASTRUTTURA] Costruisce l'URL dell'endpoint PHP della funzionalità.
    const url = `${window.ClinicaFlow.Configurazione.urlApi}?funzione=${encodeURIComponent(funzione)}`;
    // [INFRASTRUTTURA] Invia il Bean come JSON senza contenere logica applicativa.
    const risposta = await fetch(url, {
      // [INFRASTRUTTURA] Usa POST per mantenere uniforme il trasporto DTO verso ogni ControllerApplicativo.
      method: 'POST',
      // [INFRASTRUTTURA] Dichiara il formato JSON inviato dal ControllerGrafico.
      headers: { 'Content-Type': 'application/json' },
      // [INFRASTRUTTURA] Serializza il Bean/DTO nel body HTTP.
      body: JSON.stringify(bean.toJSON()),
    });
    // [INFRASTRUTTURA] Converte la risposta HTTP in JSON.
    const dati = await risposta.json();
    // [INFRASTRUTTURA] Propaga un errore tecnico quando il ControllerApplicativo risponde con HTTP non riuscito.
    if (!risposta.ok) throw new Error(dati.message || 'Errore di comunicazione con il server.');
    // [INFRASTRUTTURA] Restituisce i dati senza interpretarli in termini di dominio.
    return dati;
  }
};

```

## `infrastruttura/js/Configurazione.js`

```javascript
// [INFRASTRUTTURA] Crea lo spazio globale condiviso dalla dashboard senza contenere logica di dominio.
window.ClinicaFlow = window.ClinicaFlow || {};
// [INFRASTRUTTURA] Crea il contenitore della configurazione client.
window.ClinicaFlow.Configurazione = window.ClinicaFlow.Configurazione || {};
// [INFRASTRUTTURA] Definisce l'URL del front controller PHP usato come trasporto verso i ControllerApplicativi.
window.ClinicaFlow.Configurazione.urlApi = 'backend/public/index.php';

```

## `infrastruttura/js/Toast.js`

```javascript
// [INFRASTRUTTURA] Recupera lo spazio globale dell'applicazione.
window.ClinicaFlow = window.ClinicaFlow || {};
// [INFRASTRUTTURA] Crea il piccolo servizio grafico comune per i messaggi esistenti.
window.ClinicaFlow.Infrastruttura = window.ClinicaFlow.Infrastruttura || {};
// [INFRASTRUTTURA] Mostra il toast senza contenere logica di business.
window.ClinicaFlow.Infrastruttura.mostraToast = (messaggio) => {
  // [INFRASTRUTTURA] Recupera il componente Toast_View già montato nell'interfaccia.
  const toast = document.getElementById('toast');
  // [INFRASTRUTTURA] Esce silenziosamente se la View non è stata ancora montata.
  if (!toast) return;
  // [INFRASTRUTTURA] Scrive il messaggio richiesto dall'interazione grafica.
  toast.textContent = messaggio;
  // [INFRASTRUTTURA] Attiva la resa grafica del toast.
  toast.classList.add('show');
  // [INFRASTRUTTURA] Pianifica la scomparsa automatica identica al comportamento precedente.
  setTimeout(() => toast.classList.remove('show'), 2800);
};

```

## `interfaccia_package/Modal_View.js`

```javascript
window.ClinicaFlow.interfaccia_package = window.ClinicaFlow.interfaccia_package || {};

// [VIEW - Modale] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.interfaccia_package.Modal_View = class ModalView {

  // [VIEW - Modale] Restituisce il contenitore grafico usato dai Controller.
  render() {
    // [VIEW - Modale] Mantiene gli stessi ID e classi richiesti dal CSS e dal Controller.
    return `
    <!-- [VIEW - Modale] Backdrop della finestra. -->
    <div class="modal-backdrop" id="modal">
      <!-- [VIEW - Modale] Card della finestra. -->
      <div class="modal">
        <!-- [VIEW - Modale] Pulsante di chiusura. -->
        <button class="modal-close" id="modalClose">×</button>
        <!-- [VIEW - Modale] Punto di mount del contenuto dinamico. -->
        <div id="modalContent"></div>
      </div>
    </div>`;
  }

};

```

## `interfaccia_package/Sidebar_View.js`

```javascript
window.ClinicaFlow.interfaccia_package = window.ClinicaFlow.interfaccia_package || {};

// [VIEW - Layout > Sidebar] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.interfaccia_package.Sidebar_View = class SidebarView {

  // [VIEW - Layout > Sidebar] Costruisce la sidebar con brand, profilo, navigazione e logout.
  render(currentUser) {
    // [VIEW - Layout > Sidebar] Legge le iniziali del professionista dal Model.
    const initials = currentUser.initials;
    // [VIEW - Layout > Sidebar] Legge il nome visualizzato del professionista dal Model.
    const name = currentUser.name;
    // [VIEW - Layout > Sidebar] Legge la specialità mostrata sotto il nome.
    const specialty = currentUser.specialty;
    // [VIEW - Layout > Sidebar] Restituisce lo stesso markup grafico della sidebar originale.
    return `
      <!-- [VIEW - Layout > Sidebar] Contenitore grafico della navigazione principale. -->
      <aside class="sidebar" id="sidebar">
        <!-- [VIEW - Layout > Sidebar] Brand ClinicaFlow visibile nella parte alta. -->
        <div class="brand">
          <!-- [VIEW - Layout > Sidebar] Simbolo grafico del brand. -->
          <div class="brand-mark">+</div>
          <!-- [VIEW - Layout > Sidebar] Testo del brand e del contesto applicativo. -->
          <div>
            <!-- [VIEW - Layout > Sidebar] Nome dell'applicazione. -->
            <strong>ClinicaFlow</strong>
            <!-- [VIEW - Layout > Sidebar] Sottotitolo dell'applicazione. -->
            <span>Area professionisti</span>
          </div>
        </div>
        <!-- [VIEW - Layout > Sidebar] Profilo sintetico dell'utente corrente. -->
        <div class="profile-mini">
          <!-- [VIEW - Layout > Sidebar] Avatar dell'utente. -->
          <div class="avatar">${initials}</div>
          <!-- [VIEW - Layout > Sidebar] Dati testuali del profilo. -->
          <div>
            <!-- [VIEW - Layout > Sidebar] Nome completo del professionista. -->
            <strong>${name}</strong>
            <!-- [VIEW - Layout > Sidebar] Specialità professionale. -->
            <span>${specialty}</span>
          </div>
          <!-- [VIEW - Layout > Sidebar] Pulsante grafico delle impostazioni profilo. -->
          <button class="icon-btn" title="Impostazioni profilo">⚙</button>
        </div>
        <!-- [VIEW - Layout > Sidebar] Menu principale diviso nelle tre sezioni originali. -->
        <nav class="nav">
          <!-- [VIEW - Layout > Sidebar] Intestazione della sezione Gestione. -->
          <p class="nav-label">GESTIONE</p>
          <!-- [VIEW - Layout > Sidebar] Voce Dashboard. -->
          <button class="nav-item active" data-page="dashboard"><span>⌂</span> Dashboard</button>
          <!-- [VIEW - Layout > Sidebar] Voce Agenda. -->
          <button class="nav-item" data-page="agenda"><span>◷</span> Agenda</button>
          <!-- [VIEW - Layout > Sidebar] Voce Pazienti. -->
          <button class="nav-item" data-page="patients"><span>♙</span> Pazienti</button>
          <!-- [VIEW - Layout > Sidebar] Voce Cartelle cliniche. -->
          <button class="nav-item" data-page="clinical"><span>▤</span> Cartelle cliniche</button>
          <!-- [VIEW - Layout > Sidebar] Voce Documenti. -->
          <button class="nav-item" data-page="documents"><span>□</span> Documenti</button>
          <!-- [VIEW - Layout > Sidebar] Intestazione della sezione amministrativa. -->
          <p class="nav-label">AMMINISTRAZIONE</p>
          <!-- [VIEW - Layout > Sidebar] Voce Finanze e fatture. -->
          <button class="nav-item" data-page="finance"><span>€</span> Finanze e fatture</button>
          <!-- [VIEW - Layout > Sidebar] Voce Tasse e scadenze. -->
          <button class="nav-item" data-page="taxes"><span>▣</span> Tasse e scadenze</button>
          <!-- [VIEW - Layout > Sidebar] Voce Report. -->
          <button class="nav-item" data-page="reports"><span>◒</span> Report</button>
          <!-- [VIEW - Layout > Sidebar] Intestazione della sezione struttura. -->
          <p class="nav-label">STRUTTURA</p>
          <!-- [VIEW - Layout > Sidebar] Voce Staff. -->
          <button class="nav-item" data-page="team"><span>♧</span> Staff</button>
          <!-- [VIEW - Layout > Sidebar] Voce Impostazioni. -->
          <button class="nav-item" data-page="settings"><span>⚙</span> Impostazioni</button>
        </nav>
        <!-- [VIEW - Layout > Sidebar] Area inferiore con stato sicurezza e logout. -->
        <div class="sidebar-bottom">
          <!-- [VIEW - Layout > Sidebar] Card che comunica la sessione protetta. -->
          <div class="security-card">
            <!-- [VIEW - Layout > Sidebar] Icona di sicurezza. -->
            <div class="security-icon">✓</div>
            <!-- [VIEW - Layout > Sidebar] Testo dello stato di sessione. -->
            <div>
              <!-- [VIEW - Layout > Sidebar] Titolo della card sicurezza. -->
              <strong>Sessione protetta</strong>
              <!-- [VIEW - Layout > Sidebar] Data/ora dell'ultimo accesso demo. -->
              <span>Ultimo accesso: oggi, 14:42</span>
            </div>
          </div>
          <!-- [VIEW - Layout > Sidebar] Pulsante che il Controller collega al logout demo. -->
          <button class="logout-btn" id="logoutBtn">↪ Esci dall'account</button>
        </div>
      </aside>`;
  }

};

```

## `interfaccia_package/Toast_View.js`

```javascript
window.ClinicaFlow.interfaccia_package = window.ClinicaFlow.interfaccia_package || {};

// [VIEW - Toast] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.interfaccia_package.Toast_View = class ToastView {

  // [VIEW - Toast] Restituisce il contenitore per i messaggi temporanei.
  render() {
    // [VIEW - Toast] Mantiene la stessa struttura usata dal CSS e dal Controller.
    return `<!-- [VIEW - Toast] Messaggio temporaneo iniziale della dashboard. --><div class="toast" id="toast">Operazione completata</div>`;
  }

};

```

## `interfaccia_package/Topbar_View.js`

```javascript
window.ClinicaFlow.interfaccia_package = window.ClinicaFlow.interfaccia_package || {};

// [VIEW - Layout > Topbar] Definisce il componente grafico responsabile di una sola porzione della dashboard.
window.ClinicaFlow.interfaccia_package.Topbar_View = class TopbarView {

  // [VIEW - Layout > Topbar] Costruisce la barra superiore con breadcrumb, notifiche e profilo.
  render(currentUser) {
    // [VIEW - Layout > Topbar] Legge le iniziali dell'utente dal Model.
    const initials = currentUser.initials;
    // [VIEW - Layout > Topbar] Legge il nome mostrato nella chip utente.
    const displayName = currentUser.name.replace(/^Dott\.ssa\s+/, "");
    // [VIEW - Layout > Topbar] Restituisce il markup identico alla barra superiore originale.
    return `
      <!-- [VIEW - Layout > Topbar] Contenitore della barra superiore. -->
      <header class="topbar">
        <!-- [VIEW - Layout > Topbar] Pulsante menu mobile. -->
        <button class="mobile-menu" id="mobileMenu">☰</button>
        <!-- [VIEW - Layout > Topbar] Breadcrumb con titolo aggiornabile dal Controller. -->
        <div class="breadcrumb">Area professionisti <span>/</span> <strong id="pageTitle">Dashboard</strong></div>
        <!-- [VIEW - Layout > Topbar] Azioni disponibili nella barra superiore. -->
        <div class="top-actions">
          <!-- [VIEW - Layout > Topbar] Pulsante notifiche con badge invariato. -->
          <button class="icon-btn notification-btn" id="notificationBtn" title="Notifiche">♢<b>3</b></button>
          <!-- [VIEW - Layout > Topbar] Chip del professionista corrente. -->
          <button class="user-chip">
            <!-- [VIEW - Layout > Topbar] Avatar piccolo del professionista. -->
            <div class="avatar small">${initials}</div>
            <!-- [VIEW - Layout > Topbar] Nome mostrato nella chip. -->
            <span>${displayName}</span>
            <!-- [VIEW - Layout > Topbar] Indicatore di menu della chip. -->
            <span>⌄</span>
          </button>
        </div>
      </header>`;
  }

};

```

## `navigazione_package/Navigazione_ControlGrafico.js`

```javascript
// [CONTROLLER GRAFICO - Navigazione] Crea lo spazio del componente grafico di navigazione.
window.ClinicaFlow = window.ClinicaFlow || {};
// [CONTROLLER GRAFICO - Navigazione] Mantiene la sola logica grafica di cambio pagina.
window.ClinicaFlow.Navigazione_ControlGrafico = class Navigazione_ControlGrafico {
  // [CONTROLLER GRAFICO - Navigazione] Collega menu, pagine e menu mobile dopo il montaggio delle View.
  static collega() {
    // [CONTROLLER GRAFICO - Navigazione] Recupera tutte le pagine grafiche.
    this.pagine = document.querySelectorAll('.page');
    // [CONTROLLER GRAFICO - Navigazione] Recupera le voci del menu.
    this.voci = document.querySelectorAll('.nav-item');
    // [CONTROLLER GRAFICO - Navigazione] Recupera il titolo del breadcrumb.
    this.titolo = document.getElementById('pageTitle');
    // [CONTROLLER GRAFICO - Navigazione] Recupera la sidebar per la modalità mobile.
    this.sidebar = document.getElementById('sidebar');
    // [CONTROLLER GRAFICO - Navigazione] Recupera il pulsante del menu mobile.
    this.menuMobile = document.getElementById('mobileMenu');
    // [CONTROLLER GRAFICO - Navigazione] Collega ogni voce al relativo data-page.
    this.voci.forEach((voce) => voce.addEventListener('click', () => this.mostraPagina(voce.dataset.page)));
    // [CONTROLLER GRAFICO - Navigazione] Collega il toggle della sidebar mobile.
    if (this.menuMobile) this.menuMobile.addEventListener('click', () => this.sidebar.classList.toggle('open'));
  }
  // [CONTROLLER GRAFICO - Navigazione] Mostra la pagina richiesta senza coinvolgere dati di dominio.
  static mostraPagina(id) {
    // [CONTROLLER GRAFICO - Navigazione] Attiva una sola pagina per volta.
    this.pagine.forEach((pagina) => pagina.classList.toggle('active', pagina.id === id));
    // [CONTROLLER GRAFICO - Navigazione] Aggiorna lo stato attivo del menu.
    this.voci.forEach((voce) => voce.classList.toggle('active', voce.dataset.page === id));
    // [CONTROLLER GRAFICO - Navigazione] Aggiorna il titolo del breadcrumb.
    this.titolo.textContent = ({ dashboard: 'Dashboard', agenda: 'Agenda', patients: 'Pazienti', clinical: 'Cartelle cliniche', documents: 'Documenti', finance: 'Finanze e fatture', taxes: 'Tasse e scadenze', reports: 'Report', team: 'Staff', settings: 'Impostazioni' }[id] || 'Dashboard');
    // [CONTROLLER GRAFICO - Navigazione] Chiude la sidebar mobile dopo il cambio pagina.
    this.sidebar.classList.remove('open');
    // [CONTROLLER GRAFICO - Navigazione] Mantiene il comportamento di scroll della dashboard precedente.
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
};

```

## `style.css`

```css
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap'); /* Importa il font usato dall'interfaccia. */
:root { /* Contiene le variabili CSS globali del progetto. */
  --bg:#f5f7f8; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --surface:#fff; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --sidebar:#0b2022; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --sidebar-2:#102a2c; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --text:#162425; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --muted:#718083; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --line:#e6ebeb; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --teal:#0f766e; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --teal-light:#e4f4f1; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --blue:#2563eb; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --purple:#7c3aed; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --orange:#ea8a16; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --shadow:0 10px 30px rgba(18,39,40,.06); /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
  --radius:16px; /* Variabile globale: modificarla aggiorna tutti gli elementi che la usano. */
} /* Chiude il blocco CSS corrente. */
* { /* Selettore CSS: definisce lo stile di '*'. */
  box-sizing:border-box; /* Imposta la proprietà CSS 'box-sizing'. */
} /* Chiude il blocco CSS corrente. */
body { /* Selettore CSS: definisce lo stile di 'body'. */
  margin:0; /* Definisce lo spazio esterno. */
  background:var(--bg); /* Definisce lo sfondo. */
  color:var(--text); /* Definisce il colore del testo. */
  font-family:"DM Sans",Arial,sans-serif; /* Imposta la proprietà CSS 'font-family'. */
  font-size:14px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
button,input,select { /* Selettore CSS: definisce lo stile di 'button,input,select'. */
  font:inherit; /* Imposta la proprietà CSS 'font'. */
} /* Chiude il blocco CSS corrente. */
button { /* Selettore CSS: definisce lo stile di 'button'. */
  cursor:pointer; /* Definisce l'aspetto del cursore. */
} /* Chiude il blocco CSS corrente. */
.app-shell { /* Selettore CSS: definisce lo stile di '.app-shell'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  min-height:100vh; /* Imposta la proprietà CSS 'min-height'. */
} /* Chiude il blocco CSS corrente. */
.sidebar { /* Selettore CSS: definisce lo stile di '.sidebar'. */
  width:270px; /* Definisce la larghezza. */
  background:var(--sidebar); /* Definisce lo sfondo. */
  color:#dce8e8; /* Definisce il colore del testo. */
  padding:22px 16px; /* Definisce lo spazio interno. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  flex-direction:column; /* Imposta la proprietà CSS 'flex-direction'. */
  position:fixed; /* Definisce il metodo di posizionamento. */
  inset:0 auto 0 0; /* Imposta la proprietà CSS 'inset'. */
  z-index:20; /* Imposta la proprietà CSS 'z-index'. */
} /* Chiude il blocco CSS corrente. */
.brand { /* Selettore CSS: definisce lo stile di '.brand'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:11px; /* Definisce la distanza tra gli elementi figli. */
  padding:4px 10px 25px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.brand-mark { /* Selettore CSS: definisce lo stile di '.brand-mark'. */
  width:34px; /* Definisce la larghezza. */
  height:34px; /* Definisce l'altezza. */
  border-radius:10px; /* Arrotonda gli angoli. */
  background:#20a392; /* Definisce lo sfondo. */
  color:#fff; /* Definisce il colore del testo. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  place-items:center; /* Imposta la proprietà CSS 'place-items'. */
  font-size:23px; /* Definisce la dimensione del testo. */
  font-weight:700; /* Definisce lo spessore del testo. */
} /* Chiude il blocco CSS corrente. */
.brand strong { /* Selettore CSS: definisce lo stile di '.brand strong'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  font-size:16px; /* Definisce la dimensione del testo. */
  color:#fff; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.brand span,.profile-mini span { /* Selettore CSS: definisce lo stile di '.brand span,.profile-mini span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  color:#8da4a4; /* Definisce il colore del testo. */
  font-size:11px; /* Definisce la dimensione del testo. */
  margin-top:2px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.profile-mini { /* Selettore CSS: definisce lo stile di '.profile-mini'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:10px; /* Definisce la distanza tra gli elementi figli. */
  background:var(--sidebar-2); /* Definisce lo sfondo. */
  border:1px solid #1c393b; /* Definisce il bordo. */
  border-radius:12px; /* Arrotonda gli angoli. */
  padding:10px; /* Definisce lo spazio interno. */
  margin-bottom:18px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.profile-mini>div:nth-child(2) { /* Selettore CSS: definisce lo stile di '.profile-mini>div:nth-child(2)'. */
  flex:1; /* Imposta la proprietà CSS 'flex'. */
  min-width:0; /* Imposta la proprietà CSS 'min-width'. */
} /* Chiude il blocco CSS corrente. */
.profile-mini strong { /* Selettore CSS: definisce lo stile di '.profile-mini strong'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  color:#fff; /* Definisce il colore del testo. */
  font-size:12px; /* Definisce la dimensione del testo. */
  white-space:nowrap; /* Imposta la proprietà CSS 'white-space'. */
  overflow:hidden; /* Gestisce il contenuto che supera le dimensioni disponibili. */
  text-overflow:ellipsis; /* Imposta la proprietà CSS 'text-overflow'. */
} /* Chiude il blocco CSS corrente. */
.avatar { /* Selettore CSS: definisce lo stile di '.avatar'. */
  width:38px; /* Definisce la larghezza. */
  height:38px; /* Definisce l'altezza. */
  border-radius:50%; /* Arrotonda gli angoli. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  place-items:center; /* Imposta la proprietà CSS 'place-items'. */
  background:#276e69; /* Definisce lo sfondo. */
  color:#fff; /* Definisce il colore del testo. */
  font-weight:700; /* Definisce lo spessore del testo. */
  font-size:12px; /* Definisce la dimensione del testo. */
  flex:0 0 auto; /* Imposta la proprietà CSS 'flex'. */
} /* Chiude il blocco CSS corrente. */
.avatar.small { /* Selettore CSS: definisce lo stile di '.avatar.small'. */
  width:32px; /* Definisce la larghezza. */
  height:32px; /* Definisce l'altezza. */
  font-size:10px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.avatar.large { /* Selettore CSS: definisce lo stile di '.avatar.large'. */
  width:56px; /* Definisce la larghezza. */
  height:56px; /* Definisce l'altezza. */
} /* Chiude il blocco CSS corrente. */
.avatar.pastel { /* Selettore CSS: definisce lo stile di '.avatar.pastel'. */
  background:#dff1ee; /* Definisce lo sfondo. */
  color:#126c65; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.icon-btn { /* Selettore CSS: definisce lo stile di '.icon-btn'. */
  background:transparent; /* Definisce lo sfondo. */
  border:0; /* Definisce il bordo. */
  color:#9eb1b1; /* Definisce il colore del testo. */
  padding:5px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.nav { /* Selettore CSS: definisce lo stile di '.nav'. */
  flex:1; /* Imposta la proprietà CSS 'flex'. */
  overflow:auto; /* Gestisce il contenuto che supera le dimensioni disponibili. */
} /* Chiude il blocco CSS corrente. */
.nav-label { /* Selettore CSS: definisce lo stile di '.nav-label'. */
  font-size:9px; /* Definisce la dimensione del testo. */
  letter-spacing:1.2px; /* Imposta la proprietà CSS 'letter-spacing'. */
  color:#668080; /* Definisce il colore del testo. */
  font-weight:700; /* Definisce lo spessore del testo. */
  padding:14px 11px 7px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.nav-item { /* Selettore CSS: definisce lo stile di '.nav-item'. */
  width:100%; /* Definisce la larghezza. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  gap:12px; /* Definisce la distanza tra gli elementi figli. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  background:transparent; /* Definisce lo sfondo. */
  border:0; /* Definisce il bordo. */
  color:#a9bcbc; /* Definisce il colore del testo. */
  padding:11px 12px; /* Definisce lo spazio interno. */
  border-radius:10px; /* Arrotonda gli angoli. */
  text-align:left; /* Imposta la proprietà CSS 'text-align'. */
  margin:2px 0; /* Definisce lo spazio esterno. */
} /* Chiude il blocco CSS corrente. */
.nav-item span { /* Selettore CSS: definisce lo stile di '.nav-item span'. */
  width:18px; /* Definisce la larghezza. */
  text-align:center; /* Imposta la proprietà CSS 'text-align'. */
  font-size:16px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.nav-item:hover { /* Selettore CSS: definisce lo stile di '.nav-item:hover'. */
  background:#132f31; /* Definisce lo sfondo. */
  color:#fff; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.nav-item.active { /* Selettore CSS: definisce lo stile di '.nav-item.active'. */
  background:#1a4140; /* Definisce lo sfondo. */
  color:#fff; /* Definisce il colore del testo. */
  box-shadow:inset 3px 0 #36b5a5; /* Aggiunge un'ombra. */
} /* Chiude il blocco CSS corrente. */
.sidebar-bottom { /* Selettore CSS: definisce lo stile di '.sidebar-bottom'. */
  margin-top:12px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.security-card { /* Selettore CSS: definisce lo stile di '.security-card'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  gap:9px; /* Definisce la distanza tra gli elementi figli. */
  padding:10px; /* Definisce lo spazio interno. */
  border-radius:10px; /* Arrotonda gli angoli. */
  background:#102a2c; /* Definisce lo sfondo. */
  margin-bottom:9px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.security-icon { /* Selettore CSS: definisce lo stile di '.security-icon'. */
  width:28px; /* Definisce la larghezza. */
  height:28px; /* Definisce l'altezza. */
  border-radius:8px; /* Arrotonda gli angoli. */
  background:#184b45; /* Definisce lo sfondo. */
  color:#52c6b7; /* Definisce il colore del testo. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  place-items:center; /* Imposta la proprietà CSS 'place-items'. */
} /* Chiude il blocco CSS corrente. */
.security-card strong { /* Selettore CSS: definisce lo stile di '.security-card strong'. */
  font-size:10px; /* Definisce la dimensione del testo. */
  color:#d7e7e6; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.security-card span { /* Selettore CSS: definisce lo stile di '.security-card span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  font-size:9px; /* Definisce la dimensione del testo. */
  color:#789090; /* Definisce il colore del testo. */
  margin-top:2px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.logout-btn { /* Selettore CSS: definisce lo stile di '.logout-btn'. */
  width:100%; /* Definisce la larghezza. */
  background:transparent; /* Definisce lo sfondo. */
  border:0; /* Definisce il bordo. */
  color:#8da1a1; /* Definisce il colore del testo. */
  text-align:left; /* Imposta la proprietà CSS 'text-align'. */
  padding:9px 10px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.logout-btn:hover { /* Selettore CSS: definisce lo stile di '.logout-btn:hover'. */
  color:#fff; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.main { /* Selettore CSS: definisce lo stile di '.main'. */
  margin-left:270px; /* Imposta la proprietà CSS 'margin-left'. */
  width:calc(100% - 270px); /* Definisce la larghezza. */
  min-width:0; /* Imposta la proprietà CSS 'min-width'. */
} /* Chiude il blocco CSS corrente. */
.topbar { /* Selettore CSS: definisce lo stile di '.topbar'. */
  height:70px; /* Definisce l'altezza. */
  background:#fff; /* Definisce lo sfondo. */
  border-bottom:1px solid var(--line); /* Imposta la proprietà CSS 'border-bottom'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  justify-content:space-between; /* Distribuisce gli elementi sull'asse principale. */
  padding:0 32px; /* Definisce lo spazio interno. */
  position:sticky; /* Definisce il metodo di posizionamento. */
  top:0; /* Definisce la posizione verticale. */
  z-index:10; /* Imposta la proprietà CSS 'z-index'. */
} /* Chiude il blocco CSS corrente. */
.breadcrumb { /* Selettore CSS: definisce lo stile di '.breadcrumb'. */
  color:#7c898a; /* Definisce il colore del testo. */
  font-size:12px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.breadcrumb span { /* Selettore CSS: definisce lo stile di '.breadcrumb span'. */
  margin:0 8px; /* Definisce lo spazio esterno. */
  color:#c2caca; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.breadcrumb strong { /* Selettore CSS: definisce lo stile di '.breadcrumb strong'. */
  color:#273839; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.top-actions { /* Selettore CSS: definisce lo stile di '.top-actions'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:14px; /* Definisce la distanza tra gli elementi figli. */
} /* Chiude il blocco CSS corrente. */
.notification-btn { /* Selettore CSS: definisce lo stile di '.notification-btn'. */
  position:relative; /* Definisce il metodo di posizionamento. */
  font-size:20px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.notification-btn b { /* Selettore CSS: definisce lo stile di '.notification-btn b'. */
  position:absolute; /* Definisce il metodo di posizionamento. */
  right:0; /* Definisce la distanza dal lato destro. */
  top:0; /* Definisce la posizione verticale. */
  background:#e65d5d; /* Definisce lo sfondo. */
  color:#fff; /* Definisce il colore del testo. */
  border-radius:10px; /* Arrotonda gli angoli. */
  font-size:8px; /* Definisce la dimensione del testo. */
  padding:2px 5px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.user-chip { /* Selettore CSS: definisce lo stile di '.user-chip'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:8px; /* Definisce la distanza tra gli elementi figli. */
  background:#f5f7f7; /* Definisce lo sfondo. */
  border:1px solid var(--line); /* Definisce il bordo. */
  padding:5px 9px; /* Definisce lo spazio interno. */
  border-radius:30px; /* Arrotonda gli angoli. */
  color:#344344; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.mobile-menu { /* Selettore CSS: definisce lo stile di '.mobile-menu'. */
  display:none; /* Definisce il modello di layout dell'elemento. */
  border:0; /* Definisce il bordo. */
  background:none; /* Definisce lo sfondo. */
  font-size:20px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.content { /* Selettore CSS: definisce lo stile di '.content'. */
  padding:30px; /* Definisce lo spazio interno. */
  max-width:1600px; /* Imposta la proprietà CSS 'max-width'. */
  margin:auto; /* Definisce lo spazio esterno. */
} /* Chiude il blocco CSS corrente. */
.page { /* Selettore CSS: definisce lo stile di '.page'. */
  display:none; /* Definisce il modello di layout dell'elemento. */
} /* Chiude il blocco CSS corrente. */
.page.active { /* Selettore CSS: definisce lo stile di '.page.active'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
} /* Chiude il blocco CSS corrente. */
.welcome-row,.page-heading { /* Selettore CSS: definisce lo stile di '.welcome-row,.page-heading'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  justify-content:space-between; /* Distribuisce gli elementi sull'asse principale. */
  align-items:flex-end; /* Allinea gli elementi sull'asse trasversale. */
  gap:20px; /* Definisce la distanza tra gli elementi figli. */
  margin-bottom:25px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.eyebrow { /* Selettore CSS: definisce lo stile di '.eyebrow'. */
  font-size:10px; /* Definisce la dimensione del testo. */
  letter-spacing:1.5px; /* Imposta la proprietà CSS 'letter-spacing'. */
  font-weight:700; /* Definisce lo spessore del testo. */
  color:#7b8b8c; /* Definisce il colore del testo. */
  margin:0 0 7px; /* Definisce lo spazio esterno. */
} /* Chiude il blocco CSS corrente. */
.page-heading h1,.welcome-row h1 { /* Selettore CSS: definisce lo stile di '.page-heading h1,.welcome-row h1'. */
  margin:0; /* Definisce lo spazio esterno. */
  font-size:28px; /* Definisce la dimensione del testo. */
  letter-spacing:-.7px; /* Imposta la proprietà CSS 'letter-spacing'. */
} /* Chiude il blocco CSS corrente. */
.muted { /* Selettore CSS: definisce lo stile di '.muted'. */
  color:var(--muted); /* Definisce il colore del testo. */
  margin:6px 0 0; /* Definisce lo spazio esterno. */
} /* Chiude il blocco CSS corrente. */
.primary,.secondary,.text-btn { /* Selettore CSS: definisce lo stile di '.primary,.secondary,.text-btn'. */
  border-radius:10px; /* Arrotonda gli angoli. */
  padding:10px 15px; /* Definisce lo spazio interno. */
  font-weight:600; /* Definisce lo spessore del testo. */
  border:1px solid transparent; /* Definisce il bordo. */
} /* Chiude il blocco CSS corrente. */
.primary { /* Selettore CSS: definisce lo stile di '.primary'. */
  background:var(--teal); /* Definisce lo sfondo. */
  color:#fff; /* Definisce il colore del testo. */
  box-shadow:0 5px 14px rgba(15,118,110,.18); /* Aggiunge un'ombra. */
} /* Chiude il blocco CSS corrente. */
.primary:hover { /* Selettore CSS: definisce lo stile di '.primary:hover'. */
  background:#0b655f; /* Definisce lo sfondo. */
} /* Chiude il blocco CSS corrente. */
.secondary { /* Selettore CSS: definisce lo stile di '.secondary'. */
  background:#fff; /* Definisce lo sfondo. */
  border-color:var(--line); /* Imposta la proprietà CSS 'border-color'. */
  color:#425253; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.text-btn { /* Selettore CSS: definisce lo stile di '.text-btn'. */
  background:none; /* Definisce lo sfondo. */
  color:var(--teal); /* Definisce il colore del testo. */
  padding:4px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.stats-grid { /* Selettore CSS: definisce lo stile di '.stats-grid'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:repeat(4,1fr); /* Definisce colonne e larghezze della griglia. */
  gap:15px; /* Definisce la distanza tra gli elementi figli. */
  margin-bottom:20px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.stat-card,.finance-stat,.doc-stat { /* Selettore CSS: definisce lo stile di '.stat-card,.finance-stat,.doc-stat'. */
  background:#fff; /* Definisce lo sfondo. */
  border:1px solid var(--line); /* Definisce il bordo. */
  border-radius:var(--radius); /* Arrotonda gli angoli. */
  padding:19px; /* Definisce lo spazio interno. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:flex-start; /* Allinea gli elementi sull'asse trasversale. */
  gap:14px; /* Definisce la distanza tra gli elementi figli. */
  box-shadow:var(--shadow); /* Aggiunge un'ombra. */
} /* Chiude il blocco CSS corrente. */
.stat-icon { /* Selettore CSS: definisce lo stile di '.stat-icon'. */
  width:42px; /* Definisce la larghezza. */
  height:42px; /* Definisce l'altezza. */
  border-radius:12px; /* Arrotonda gli angoli. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  place-items:center; /* Imposta la proprietà CSS 'place-items'. */
  font-size:19px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.teal { /* Selettore CSS: definisce lo stile di '.teal'. */
  background:#e3f5f2; /* Definisce lo sfondo. */
  color:#0f766e; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.blue { /* Selettore CSS: definisce lo stile di '.blue'. */
  background:#e9efff; /* Definisce lo sfondo. */
  color:#2563eb; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.purple { /* Selettore CSS: definisce lo stile di '.purple'. */
  background:#f0eafd; /* Definisce lo sfondo. */
  color:#7c3aed; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.orange { /* Selettore CSS: definisce lo stile di '.orange'. */
  background:#fff1df; /* Definisce lo sfondo. */
  color:#df7a00; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.stat-card span,.finance-stat span,.doc-stat span { /* Selettore CSS: definisce lo stile di '.stat-card span,.finance-stat span,.doc-stat span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  color:#788687; /* Definisce il colore del testo. */
  font-size:11px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.stat-card strong { /* Selettore CSS: definisce lo stile di '.stat-card strong'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  font-size:23px; /* Definisce la dimensione del testo. */
  margin:5px 0 3px; /* Definisce lo spazio esterno. */
} /* Chiude il blocco CSS corrente. */
.stat-card small,.finance-stat small { /* Selettore CSS: definisce lo stile di '.stat-card small,.finance-stat small'. */
  font-size:10px; /* Definisce la dimensione del testo. */
  color:#899596; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.positive { /* Selettore CSS: definisce lo stile di '.positive'. */
  color:#15916f!important; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.warning-text { /* Selettore CSS: definisce lo stile di '.warning-text'. */
  color:#d47b08!important; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.dashboard-grid { /* Selettore CSS: definisce lo stile di '.dashboard-grid'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:1.55fr 1fr; /* Definisce colonne e larghezze della griglia. */
  gap:20px; /* Definisce la distanza tra gli elementi figli. */
  margin-bottom:20px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.card { /* Selettore CSS: definisce lo stile di '.card'. */
  background:#fff; /* Definisce lo sfondo. */
  border:1px solid var(--line); /* Definisce il bordo. */
  border-radius:var(--radius); /* Arrotonda gli angoli. */
  box-shadow:var(--shadow); /* Aggiunge un'ombra. */
} /* Chiude il blocco CSS corrente. */
.card-header { /* Selettore CSS: definisce lo stile di '.card-header'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  justify-content:space-between; /* Distribuisce gli elementi sull'asse principale. */
  gap:15px; /* Definisce la distanza tra gli elementi figli. */
  padding:19px 20px; /* Definisce lo spazio interno. */
  border-bottom:1px solid var(--line); /* Imposta la proprietà CSS 'border-bottom'. */
} /* Chiude il blocco CSS corrente. */
.card-header h2 { /* Selettore CSS: definisce lo stile di '.card-header h2'. */
  margin:0; /* Definisce lo spazio esterno. */
  font-size:15px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.card-header span { /* Selettore CSS: definisce lo stile di '.card-header span'. */
  font-size:11px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.card-header select { /* Selettore CSS: definisce lo stile di '.card-header select'. */
  border:1px solid var(--line); /* Definisce il bordo. */
  padding:7px; /* Definisce lo spazio interno. */
  border-radius:8px; /* Arrotonda gli angoli. */
} /* Chiude il blocco CSS corrente. */
.timeline { /* Selettore CSS: definisce lo stile di '.timeline'. */
  padding:9px 20px 12px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.timeline-item { /* Selettore CSS: definisce lo stile di '.timeline-item'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:45px 12px 1fr; /* Definisce colonne e larghezze della griglia. */
  gap:10px; /* Definisce la distanza tra gli elementi figli. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  min-height:64px; /* Imposta la proprietà CSS 'min-height'. */
  border-bottom:1px solid #f0f2f2; /* Imposta la proprietà CSS 'border-bottom'. */
} /* Chiude il blocco CSS corrente. */
.timeline-item:last-child { /* Selettore CSS: definisce lo stile di '.timeline-item:last-child'. */
  border-bottom:0; /* Imposta la proprietà CSS 'border-bottom'. */
} /* Chiude il blocco CSS corrente. */
.time { /* Selettore CSS: definisce lo stile di '.time'. */
  font-size:10px; /* Definisce la dimensione del testo. */
  color:#839091; /* Definisce il colore del testo. */
  text-align:right; /* Imposta la proprietà CSS 'text-align'. */
} /* Chiude il blocco CSS corrente. */
.dot { /* Selettore CSS: definisce lo stile di '.dot'. */
  width:9px; /* Definisce la larghezza. */
  height:9px; /* Definisce l'altezza. */
  border-radius:50%; /* Arrotonda gli angoli. */
  box-shadow:0 0 0 4px #fff; /* Aggiunge un'ombra. */
} /* Chiude il blocco CSS corrente. */
.teal-bg { /* Selettore CSS: definisce lo stile di '.teal-bg'. */
  background:#22a89a; /* Definisce lo sfondo. */
} /* Chiude il blocco CSS corrente. */
.blue-bg { /* Selettore CSS: definisce lo stile di '.blue-bg'. */
  background:#5683ee; /* Definisce lo sfondo. */
} /* Chiude il blocco CSS corrente. */
.purple-bg { /* Selettore CSS: definisce lo stile di '.purple-bg'. */
  background:#986ee7; /* Definisce lo sfondo. */
} /* Chiude il blocco CSS corrente. */
.orange-bg { /* Selettore CSS: definisce lo stile di '.orange-bg'. */
  background:#ee9a2d; /* Definisce lo sfondo. */
} /* Chiude il blocco CSS corrente. */
.appointment { /* Selettore CSS: definisce lo stile di '.appointment'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  justify-content:space-between; /* Distribuisce gli elementi sull'asse principale. */
  gap:10px; /* Definisce la distanza tra gli elementi figli. */
} /* Chiude il blocco CSS corrente. */
.appointment strong,.appointment span { /* Selettore CSS: definisce lo stile di '.appointment strong,.appointment span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
} /* Chiude il blocco CSS corrente. */
.appointment strong { /* Selettore CSS: definisce lo stile di '.appointment strong'. */
  font-size:12px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.appointment span { /* Selettore CSS: definisce lo stile di '.appointment span'. */
  font-size:10px; /* Definisce la dimensione del testo. */
  color:#8a9899; /* Definisce il colore del testo. */
  margin-top:3px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.status { /* Selettore CSS: definisce lo stile di '.status'. */
  display:inline-block; /* Definisce il modello di layout dell'elemento. */
  padding:5px 8px; /* Definisce lo spazio interno. */
  border-radius:20px; /* Arrotonda gli angoli. */
  font-size:9px; /* Definisce la dimensione del testo. */
  font-weight:700; /* Definisce lo spessore del testo. */
  white-space:nowrap; /* Imposta la proprietà CSS 'white-space'. */
} /* Chiude il blocco CSS corrente. */
.status.confirmed { /* Selettore CSS: definisce lo stile di '.status.confirmed'. */
  background:#e4f6f0; /* Definisce lo sfondo. */
  color:#16816d; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.status.pending { /* Selettore CSS: definisce lo stile di '.status.pending'. */
  background:#fff2df; /* Definisce lo sfondo. */
  color:#bd700b; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.status.current { /* Selettore CSS: definisce lo stile di '.status.current'. */
  background:#eee9ff; /* Definisce lo sfondo. */
  color:#7140bd; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.deadline-list { /* Selettore CSS: definisce lo stile di '.deadline-list'. */
  padding:8px 20px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.deadline { /* Selettore CSS: definisce lo stile di '.deadline'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:11px; /* Definisce la distanza tra gli elementi figli. */
  padding:13px 0; /* Definisce lo spazio interno. */
  border-bottom:1px solid #f0f2f2; /* Imposta la proprietà CSS 'border-bottom'. */
} /* Chiude il blocco CSS corrente. */
.deadline:last-child { /* Selettore CSS: definisce lo stile di '.deadline:last-child'. */
  border:0; /* Definisce il bordo. */
} /* Chiude il blocco CSS corrente. */
.deadline>div:nth-child(2) { /* Selettore CSS: definisce lo stile di '.deadline>div:nth-child(2)'. */
  flex:1; /* Imposta la proprietà CSS 'flex'. */
} /* Chiude il blocco CSS corrente. */
.deadline strong,.deadline span { /* Selettore CSS: definisce lo stile di '.deadline strong,.deadline span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
} /* Chiude il blocco CSS corrente. */
.deadline>div:nth-child(2) strong { /* Selettore CSS: definisce lo stile di '.deadline>div:nth-child(2) strong'. */
  font-size:11px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.deadline>div:nth-child(2) span { /* Selettore CSS: definisce lo stile di '.deadline>div:nth-child(2) span'. */
  font-size:9px; /* Definisce la dimensione del testo. */
  color:#899697; /* Definisce il colore del testo. */
  margin-top:3px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.date-box { /* Selettore CSS: definisce lo stile di '.date-box'. */
  width:40px; /* Definisce la larghezza. */
  text-align:center; /* Imposta la proprietà CSS 'text-align'. */
  border:1px solid var(--line); /* Definisce il bordo. */
  border-radius:9px; /* Arrotonda gli angoli. */
  padding:5px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.date-box strong { /* Selettore CSS: definisce lo stile di '.date-box strong'. */
  font-size:15px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.date-box span { /* Selettore CSS: definisce lo stile di '.date-box span'. */
  font-size:8px; /* Definisce la dimensione del testo. */
  color:#8b999a; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.pill { /* Selettore CSS: definisce lo stile di '.pill'. */
  padding:5px 7px; /* Definisce lo spazio interno. */
  border-radius:20px; /* Arrotonda gli angoli. */
  font-size:8px; /* Definisce la dimensione del testo. */
  font-weight:700; /* Definisce lo spessore del testo. */
} /* Chiude il blocco CSS corrente. */
.pill.orange { /* Selettore CSS: definisce lo stile di '.pill.orange'. */
  background:#fff0dc; /* Definisce lo sfondo. */
  color:#c2730a; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.pill.gray { /* Selettore CSS: definisce lo stile di '.pill.gray'. */
  background:#f1f3f3; /* Definisce lo sfondo. */
  color:#748182; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.chart-wrap { /* Selettore CSS: definisce lo stile di '.chart-wrap'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  padding:18px 20px 10px; /* Definisce lo spazio interno. */
  height:240px; /* Definisce l'altezza. */
} /* Chiude il blocco CSS corrente. */
.y-labels { /* Selettore CSS: definisce lo stile di '.y-labels'. */
  width:42px; /* Definisce la larghezza. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  flex-direction:column; /* Imposta la proprietà CSS 'flex-direction'. */
  justify-content:space-between; /* Distribuisce gli elementi sull'asse principale. */
  color:#a1acad; /* Definisce il colore del testo. */
  font-size:9px; /* Definisce la dimensione del testo. */
  padding-bottom:27px; /* Imposta la proprietà CSS 'padding-bottom'. */
} /* Chiude il blocco CSS corrente. */
.chart { /* Selettore CSS: definisce lo stile di '.chart'. */
  position:relative; /* Definisce il metodo di posizionamento. */
  flex:1; /* Imposta la proprietà CSS 'flex'. */
} /* Chiude il blocco CSS corrente. */
.gridline { /* Selettore CSS: definisce lo stile di '.gridline'. */
  height:1px; /* Definisce l'altezza. */
  background:#eef1f1; /* Definisce lo sfondo. */
  position:absolute; /* Definisce il metodo di posizionamento. */
  left:0; /* Definisce la posizione orizzontale. */
  right:0; /* Definisce la distanza dal lato destro. */
} /* Chiude il blocco CSS corrente. */
.g1 { /* Selettore CSS: definisce lo stile di '.g1'. */
  top:10%; /* Definisce la posizione verticale. */
} /* Chiude il blocco CSS corrente. */
.g2 { /* Selettore CSS: definisce lo stile di '.g2'. */
  top:30%; /* Definisce la posizione verticale. */
} /* Chiude il blocco CSS corrente. */
.g3 { /* Selettore CSS: definisce lo stile di '.g3'. */
  top:50%; /* Definisce la posizione verticale. */
} /* Chiude il blocco CSS corrente. */
.g4 { /* Selettore CSS: definisce lo stile di '.g4'. */
  top:70%; /* Definisce la posizione verticale. */
} /* Chiude il blocco CSS corrente. */
.chart svg { /* Selettore CSS: definisce lo stile di '.chart svg'. */
  position:absolute; /* Definisce il metodo di posizionamento. */
  inset:0 0 25px; /* Imposta la proprietà CSS 'inset'. */
  width:100%; /* Definisce la larghezza. */
  height:calc(100% - 25px); /* Definisce l'altezza. */
  overflow:visible; /* Gestisce il contenuto che supera le dimensioni disponibili. */
} /* Chiude il blocco CSS corrente. */
.x-labels { /* Selettore CSS: definisce lo stile di '.x-labels'. */
  position:absolute; /* Definisce il metodo di posizionamento. */
  bottom:0; /* Definisce la distanza dal lato inferiore. */
  left:0; /* Definisce la posizione orizzontale. */
  right:0; /* Definisce la distanza dal lato destro. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  justify-content:space-between; /* Distribuisce gli elementi sull'asse principale. */
  color:#9aa7a8; /* Definisce il colore del testo. */
  font-size:9px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.quick-grid { /* Selettore CSS: definisce lo stile di '.quick-grid'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:1fr 1fr; /* Definisce colonne e larghezze della griglia. */
  padding:15px; /* Definisce lo spazio interno. */
  gap:10px; /* Definisce la distanza tra gli elementi figli. */
} /* Chiude il blocco CSS corrente. */
.quick-grid button { /* Selettore CSS: definisce lo stile di '.quick-grid button'. */
  border:1px solid var(--line); /* Definisce il bordo. */
  background:#fbfcfc; /* Definisce lo sfondo. */
  border-radius:12px; /* Arrotonda gli angoli. */
  text-align:left; /* Imposta la proprietà CSS 'text-align'. */
  padding:13px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.quick-grid button:hover { /* Selettore CSS: definisce lo stile di '.quick-grid button:hover'. */
  border-color:#b7d9d5; /* Imposta la proprietà CSS 'border-color'. */
  background:#f5fbfa; /* Definisce lo sfondo. */
} /* Chiude il blocco CSS corrente. */
.quick-grid span { /* Selettore CSS: definisce lo stile di '.quick-grid span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  color:var(--teal); /* Definisce il colore del testo. */
  font-size:18px; /* Definisce la dimensione del testo. */
  margin-bottom:8px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.quick-grid strong,.quick-grid small { /* Selettore CSS: definisce lo stile di '.quick-grid strong,.quick-grid small'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
} /* Chiude il blocco CSS corrente. */
.quick-grid strong { /* Selettore CSS: definisce lo stile di '.quick-grid strong'. */
  font-size:11px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.quick-grid small { /* Selettore CSS: definisce lo stile di '.quick-grid small'. */
  font-size:9px; /* Definisce la dimensione del testo. */
  color:#899697; /* Definisce il colore del testo. */
  margin-top:3px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.toolbar,.filters { /* Selettore CSS: definisce lo stile di '.toolbar,.filters'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:10px; /* Definisce la distanza tra gli elementi figli. */
  margin-bottom:15px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.toolbar select,.filters select { /* Selettore CSS: definisce lo stile di '.toolbar select,.filters select'. */
  margin-left:auto; /* Imposta la proprietà CSS 'margin-left'. */
  border:1px solid var(--line); /* Definisce il bordo. */
  border-radius:9px; /* Arrotonda gli angoli. */
  padding:9px; /* Definisce lo spazio interno. */
  background:#fff; /* Definisce lo sfondo. */
  color:#526263; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.toolbar strong { /* Selettore CSS: definisce lo stile di '.toolbar strong'. */
  font-size:12px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.segmented { /* Selettore CSS: definisce lo stile di '.segmented'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  background:#eef2f2; /* Definisce lo sfondo. */
  padding:3px; /* Definisce lo spazio interno. */
  border-radius:9px; /* Arrotonda gli angoli. */
} /* Chiude il blocco CSS corrente. */
.segmented button { /* Selettore CSS: definisce lo stile di '.segmented button'. */
  border:0; /* Definisce il bordo. */
  background:transparent; /* Definisce lo sfondo. */
  padding:7px 12px; /* Definisce lo spazio interno. */
  border-radius:7px; /* Arrotonda gli angoli. */
  color:#6d7c7d; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.segmented button.active { /* Selettore CSS: definisce lo stile di '.segmented button.active'. */
  background:#fff; /* Definisce lo sfondo. */
  color:#223233; /* Definisce il colore del testo. */
  box-shadow:0 1px 4px #dfe4e4; /* Aggiunge un'ombra. */
} /* Chiude il blocco CSS corrente. */
.agenda-help { /* Contenitore informativo mostrato sopra la griglia. */
  display:flex; /* Dispone gli elementi informativi sulla stessa riga. */
  align-items:center; /* Allinea verticalmente gli elementi. */
  gap:8px; /* Crea uno spazio uniforme tra gli elementi. */
  margin-bottom:12px; /* Separa il messaggio dalla griglia. */
  padding:10px 12px; /* Aggiunge spazio interno. */
  border:1px solid var(--line); /* Disegna un bordo leggero. */
  border-radius:10px; /* Arrotonda gli angoli. */
  background:#f8fbfb; /* Definisce uno sfondo neutro. */
  color:#526364; /* Definisce il colore del testo. */
  font-size:11px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.agenda-help-rule { /* Evidenzia la regola di disponibilità. */
  margin-left:auto; /* Spinge la regola verso il lato destro. */
  font-weight:700; /* Rende la regola più evidente. */
  color:#b45309; /* Usa un colore di avviso leggibile. */
} /* Chiude il blocco CSS corrente. */
.agenda-full { /* Contenitore principale della nuova agenda settimanale. */
  height:760px; /* Definisce un'altezza sufficiente per la giornata. */
  overflow:auto; /* Permette lo scorrimento orizzontale e verticale quando necessario. */
} /* Chiude il blocco CSS corrente. */
.agenda-week { /* Contiene colonna orari e giorni. */
  min-width:1100px; /* Mantiene leggibili sette colonne anche su schermi stretti. */
  min-height:100%; /* Occupa almeno tutta l'altezza della card. */
  display:flex; /* Dispone la colonna degli orari accanto ai giorni. */
} /* Chiude il blocco CSS corrente. */
.agenda-time-column { /* Colonna laterale dedicata agli orari. */
  width:62px; /* Definisce la larghezza della colonna orari. */
  flex:0 0 62px; /* Impedisce alla colonna di restringersi. */
  background:#fff; /* Mantiene lo sfondo pulito. */
  z-index:3; /* Tiene gli orari sopra la griglia durante lo scroll orizzontale. */
} /* Chiude il blocco CSS corrente. */
.agenda-corner { /* Cella superiore sopra le etichette degli orari. */
  height:48px; /* Allinea la cella all'altezza delle intestazioni dei giorni. */
  display:flex; /* Attiva il layout flessibile. */
  align-items:center; /* Centra verticalmente il testo. */
  justify-content:flex-end; /* Allinea il testo verso destra. */
  padding-right:8px; /* Aggiunge spazio dal bordo destro. */
  border-bottom:1px solid var(--line); /* Separa intestazione e calendario. */
  color:#9aa7a8; /* Usa un colore secondario. */
  font-size:9px; /* Mantiene il testo compatto. */
  font-weight:700; /* Evidenzia la parola Ora. */
} /* Chiude il blocco CSS corrente. */
.agenda-time-labels { /* Contiene tutte le etichette orarie. */
  display:flex; /* Attiva il layout flessibile. */
  flex-direction:column; /* Dispone gli orari verticalmente. */
} /* Chiude il blocco CSS corrente. */
.agenda-time-labels span { /* Singola etichetta oraria. */
  height:60px; /* Ogni ora occupa 60 pixel. */
  box-sizing:border-box; /* Include eventuali bordi nelle dimensioni. */
  padding-top:4px; /* Posiziona l'orario vicino alla linea superiore. */
  padding-right:8px; /* Allontana il testo dal bordo della colonna. */
  text-align:right; /* Allinea gli orari a destra. */
  color:#9aa7a8; /* Definisce il colore secondario. */
  font-size:9px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.agenda-days { /* Contiene le sette colonne giornaliere. */
  flex:1; /* Occupa tutto lo spazio disponibile. */
  display:grid; /* Usa una griglia regolare per i giorni. */
  grid-template-columns:repeat(7,minmax(145px,1fr)); /* Crea sette colonne di dimensione simile. */
} /* Chiude il blocco CSS corrente. */
.agenda-day { /* Rappresenta una singola giornata. */
  min-width:145px; /* Garantisce una larghezza minima utile al drag and drop. */
  border-left:1px solid var(--line); /* Separa visivamente i giorni. */
} /* Chiude il blocco CSS corrente. */
.agenda-day-header { /* Intestazione di una giornata. */
  height:48px; /* Allinea l'intestazione alla cella Ora. */
  box-sizing:border-box; /* Include il bordo nelle dimensioni. */
  display:flex; /* Dispone giorno e data verticalmente. */
  flex-direction:column; /* Imposta la direzione verticale. */
  justify-content:center; /* Centra verticalmente i contenuti. */
  padding-left:10px; /* Aggiunge spazio dal bordo sinistro. */
  border-bottom:1px solid var(--line); /* Separa intestazione e corpo. */
  background:#f8fbfb; /* Evidenzia leggermente l'intestazione. */
} /* Chiude il blocco CSS corrente. */
.agenda-day-header strong { /* Nome abbreviato del giorno. */
  font-size:9px; /* Definisce la dimensione del testo. */
  color:#637273; /* Definisce il colore del giorno. */
} /* Chiude il blocco CSS corrente. */
.agenda-day-header span { /* Numero e mese del giorno. */
  margin-top:2px; /* Crea un piccolo spazio dal nome del giorno. */
  font-size:10px; /* Definisce la dimensione del testo. */
  font-weight:700; /* Evidenzia la data. */
  color:#223233; /* Definisce il colore principale del testo. */
} /* Chiude il blocco CSS corrente. */
.agenda-day-body { /* Area verticale che riceve gli appuntamenti. */
  position:relative; /* Permette di posizionare gli appuntamenti in base all'orario. */
  height:720px; /* 12 ore x 60 pixel, dalle 08:00 alle 20:00. */
  background:repeating-linear-gradient(to bottom,transparent 0,transparent 29px,#edf1f1 30px); /* Disegna linee ogni 30 minuti. */
} /* Chiude il blocco CSS corrente. */
.agenda-day-body.drag-over { /* Stato visivo mostrato durante un trascinamento valido. */
  background-color:#f0fbf8; /* Evidenzia la colonna di destinazione. */
} /* Chiude il blocco CSS corrente. */
.agenda-day-body.drag-invalid { /* Stato visivo mostrato quando il punto di rilascio non è valido. */
  background-color:#fff7ed; /* Evidenzia una destinazione non disponibile. */
} /* Chiude il blocco CSS corrente. */
.appointment-block { /* Rappresenta un appuntamento trascinabile. */
  position:absolute; /* Posiziona l'appuntamento in funzione dell'orario. */
  left:6px; /* Lascia spazio dal bordo sinistro. */
  right:6px; /* Lascia spazio dal bordo destro. */
  min-height:58px; /* Garantisce una superficie comoda da trascinare. */
  box-sizing:border-box; /* Include padding e bordo nelle dimensioni. */
  border-radius:10px; /* Arrotonda gli angoli. */
  padding:9px 10px; /* Definisce lo spazio interno. */
  border-left:4px solid; /* Evidenzia il tipo di appuntamento. */
  font-size:10px; /* Definisce la dimensione del testo. */
  cursor:grab; /* Indica visivamente che l'elemento può essere trascinato. */
  user-select:none; /* Evita di selezionare accidentalmente il testo durante il drag. */
  transition:box-shadow .15s ease,opacity .15s ease; /* Rende più morbidi gli stati interattivi. */
  z-index:2; /* Tiene l'appuntamento sopra le linee della griglia. */
} /* Chiude il blocco CSS corrente. */
.appointment-block:active { /* Stato dell'appuntamento mentre viene trascinato. */
  cursor:grabbing; /* Mostra il cursore coerente con il trascinamento. */
} /* Chiude il blocco CSS corrente. */
.appointment-block.dragging { /* Stato applicato durante il drag. */
  opacity:.45; /* Rende trasparente l'originale per mostrare che è in movimento. */
  box-shadow:0 8px 20px #cfd8d8; /* Evidenzia visivamente l'elemento trascinato. */
} /* Chiude il blocco CSS corrente. */
.appointment-block strong,.appointment-block span { /* Selettore comune per testo principale e secondario. */
  display:block; /* Mette ogni testo su una riga separata. */
} /* Chiude il blocco CSS corrente. */
.appointment-block span { /* Testo secondario dell'appuntamento. */
  margin-top:4px; /* Crea distanza dal nome del paziente. */
  opacity:.75; /* Riduce leggermente l'enfasi del testo secondario. */
  font-size:9px; /* Definisce la dimensione del testo secondario. */
} /* Chiude il blocco CSS corrente. */
.teal-block { /* Selettore CSS: definisce lo stile di '.teal-block'. */
  background:#e5f6f2; /* Definisce lo sfondo. */
  border-color:#159b8e; /* Imposta la proprietà CSS 'border-color'. */
} /* Chiude il blocco CSS corrente. */
.blue-block { /* Selettore CSS: definisce lo stile di '.blue-block'. */
  background:#eaf0ff; /* Definisce lo sfondo. */
  border-color:#4775e8; /* Imposta la proprietà CSS 'border-color'. */
} /* Chiude il blocco CSS corrente. */
.purple-block { /* Selettore CSS: definisce lo stile di '.purple-block'. */
  background:#f0ebff; /* Definisce lo sfondo. */
  border-color:#8c61d7; /* Imposta la proprietà CSS 'border-color'. */
} /* Chiude il blocco CSS corrente. */
.orange-block { /* Selettore CSS: definisce lo stile di '.orange-block'. */
  background:#fff1df; /* Definisce lo sfondo. */
  border-color:#df8b1c; /* Imposta la proprietà CSS 'border-color'. */
} /* Chiude il blocco CSS corrente. */
.search { /* Selettore CSS: definisce lo stile di '.search'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:8px; /* Definisce la distanza tra gli elementi figli. */
  background:#fff; /* Definisce lo sfondo. */
  border:1px solid var(--line); /* Definisce il bordo. */
  border-radius:9px; /* Arrotonda gli angoli. */
  padding:0 11px; /* Definisce lo spazio interno. */
  height:39px; /* Definisce l'altezza. */
  flex:1; /* Imposta la proprietà CSS 'flex'. */
  min-width:220px; /* Imposta la proprietà CSS 'min-width'. */
} /* Chiude il blocco CSS corrente. */
.search span { /* Selettore CSS: definisce lo stile di '.search span'. */
  font-size:18px; /* Definisce la dimensione del testo. */
  color:#899697; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.search input { /* Selettore CSS: definisce lo stile di '.search input'. */
  border:0; /* Definisce il bordo. */
  outline:0; /* Imposta la proprietà CSS 'outline'. */
  width:100%; /* Definisce la larghezza. */
  background:transparent; /* Definisce lo sfondo. */
  font-size:11px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.filters select { /* Selettore CSS: definisce lo stile di '.filters select'. */
  margin-left:0; /* Imposta la proprietà CSS 'margin-left'. */
} /* Chiude il blocco CSS corrente. */
.table-card { /* Selettore CSS: definisce lo stile di '.table-card'. */
  overflow:hidden; /* Gestisce il contenuto che supera le dimensioni disponibili. */
} /* Chiude il blocco CSS corrente. */
.table-card .card-header { /* Selettore CSS: definisce lo stile di '.table-card .card-header'. */
  border-bottom:1px solid var(--line); /* Imposta la proprietà CSS 'border-bottom'. */
} /* Chiude il blocco CSS corrente. */
table { /* Selettore CSS: definisce lo stile di 'table'. */
  width:100%; /* Definisce la larghezza. */
  border-collapse:collapse; /* Imposta la proprietà CSS 'border-collapse'. */
} /* Chiude il blocco CSS corrente. */
th { /* Selettore CSS: definisce lo stile di 'th'. */
  text-align:left; /* Imposta la proprietà CSS 'text-align'. */
  background:#fafbfb; /* Definisce lo sfondo. */
  color:#8a9899; /* Definisce il colore del testo. */
  font-size:9px; /* Definisce la dimensione del testo. */
  text-transform:uppercase; /* Imposta la proprietà CSS 'text-transform'. */
  letter-spacing:.5px; /* Imposta la proprietà CSS 'letter-spacing'. */
  padding:12px 18px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
td { /* Selettore CSS: definisce lo stile di 'td'. */
  padding:13px 18px; /* Definisce lo spazio interno. */
  border-top:1px solid #eef1f1; /* Imposta la proprietà CSS 'border-top'. */
  font-size:10px; /* Definisce la dimensione del testo. */
  color:#536162; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
td strong { /* Selettore CSS: definisce lo stile di 'td strong'. */
  font-size:11px; /* Definisce la dimensione del testo. */
  color:#253435; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
td small { /* Selettore CSS: definisce lo stile di 'td small'. */
  font-size:9px; /* Definisce la dimensione del testo. */
  color:#909c9d; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.person { /* Selettore CSS: definisce lo stile di '.person'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:10px; /* Definisce la distanza tra gli elementi figli. */
} /* Chiude il blocco CSS corrente. */
.person span { /* Selettore CSS: definisce lo stile di '.person span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  font-size:9px; /* Definisce la dimensione del testo. */
  color:#929e9f; /* Definisce il colore del testo. */
  margin-top:2px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.clinical-layout { /* Selettore CSS: definisce lo stile di '.clinical-layout'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:300px 1fr; /* Definisce colonne e larghezze della griglia. */
  gap:18px; /* Definisce la distanza tra gli elementi figli. */
} /* Chiude il blocco CSS corrente. */
.patient-selector { /* Selettore CSS: definisce lo stile di '.patient-selector'. */
  padding:13px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.patient-list { /* Selettore CSS: definisce lo stile di '.patient-list'. */
  margin-top:10px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.patient-list button { /* Selettore CSS: definisce lo stile di '.patient-list button'. */
  width:100%; /* Definisce la larghezza. */
  border:0; /* Definisce il bordo. */
  background:transparent; /* Definisce lo sfondo. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:9px; /* Definisce la distanza tra gli elementi figli. */
  text-align:left; /* Imposta la proprietà CSS 'text-align'. */
  padding:10px; /* Definisce lo spazio interno. */
  border-radius:10px; /* Arrotonda gli angoli. */
} /* Chiude il blocco CSS corrente. */
.patient-list button.selected,.patient-list button:hover { /* Selettore CSS: definisce lo stile di '.patient-list button.selected,.patient-list button:hover'. */
  background:#eef8f6; /* Definisce lo sfondo. */
} /* Chiude il blocco CSS corrente. */
.patient-list button>div:nth-child(2) { /* Selettore CSS: definisce lo stile di '.patient-list button>div:nth-child(2)'. */
  flex:1; /* Imposta la proprietà CSS 'flex'. */
} /* Chiude il blocco CSS corrente. */
.patient-list strong,.patient-list span { /* Selettore CSS: definisce lo stile di '.patient-list strong,.patient-list span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
} /* Chiude il blocco CSS corrente. */
.patient-list strong { /* Selettore CSS: definisce lo stile di '.patient-list strong'. */
  font-size:11px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.patient-list span { /* Selettore CSS: definisce lo stile di '.patient-list span'. */
  font-size:9px; /* Definisce la dimensione del testo. */
  color:#8b999a; /* Definisce il colore del testo. */
  margin-top:2px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.clinical-detail { /* Selettore CSS: definisce lo stile di '.clinical-detail'. */
  padding:0 20px 20px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.patient-header { /* Selettore CSS: definisce lo stile di '.patient-header'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:12px; /* Definisce la distanza tra gli elementi figli. */
  padding:20px 0; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.patient-header>div:nth-child(2) { /* Selettore CSS: definisce lo stile di '.patient-header>div:nth-child(2)'. */
  flex:1; /* Imposta la proprietà CSS 'flex'. */
} /* Chiude il blocco CSS corrente. */
.patient-header h2 { /* Selettore CSS: definisce lo stile di '.patient-header h2'. */
  margin:0; /* Definisce lo spazio esterno. */
  font-size:18px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.patient-header span { /* Selettore CSS: definisce lo stile di '.patient-header span'. */
  color:#7e8d8e; /* Definisce il colore del testo. */
  font-size:10px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.tabs { /* Selettore CSS: definisce lo stile di '.tabs'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  gap:22px; /* Definisce la distanza tra gli elementi figli. */
  border-bottom:1px solid var(--line); /* Imposta la proprietà CSS 'border-bottom'. */
} /* Chiude il blocco CSS corrente. */
.tabs button { /* Selettore CSS: definisce lo stile di '.tabs button'. */
  border:0; /* Definisce il bordo. */
  background:transparent; /* Definisce lo sfondo. */
  padding:11px 2px; /* Definisce lo spazio interno. */
  color:#899697; /* Definisce il colore del testo. */
  font-size:10px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.tabs button.active { /* Selettore CSS: definisce lo stile di '.tabs button.active'. */
  color:var(--teal); /* Definisce il colore del testo. */
  border-bottom:2px solid var(--teal); /* Imposta la proprietà CSS 'border-bottom'. */
  font-weight:700; /* Definisce lo spessore del testo. */
} /* Chiude il blocco CSS corrente. */
.note { /* Selettore CSS: definisce lo stile di '.note'. */
  margin-top:17px; /* Imposta la proprietà CSS 'margin-top'. */
  border:1px solid var(--line); /* Definisce il bordo. */
  border-radius:11px; /* Arrotonda gli angoli. */
  padding:15px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.note>div { /* Selettore CSS: definisce lo stile di '.note>div'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  justify-content:space-between; /* Distribuisce gli elementi sull'asse principale. */
} /* Chiude il blocco CSS corrente. */
.note strong { /* Selettore CSS: definisce lo stile di '.note strong'. */
  font-size:11px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.note>div span { /* Selettore CSS: definisce lo stile di '.note>div span'. */
  font-size:9px; /* Definisce la dimensione del testo. */
  color:#8d9a9b; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.note p { /* Selettore CSS: definisce lo stile di '.note p'. */
  font-size:10px; /* Definisce la dimensione del testo. */
  color:#677677; /* Definisce il colore del testo. */
  line-height:1.6; /* Imposta la proprietà CSS 'line-height'. */
} /* Chiude il blocco CSS corrente. */
.tag { /* Selettore CSS: definisce lo stile di '.tag'. */
  font-size:8px; /* Definisce la dimensione del testo. */
  padding:4px 7px; /* Definisce lo spazio interno. */
  background:#fff0dc; /* Definisce lo sfondo. */
  color:#bd710b; /* Definisce il colore del testo. */
  border-radius:20px; /* Arrotonda gli angoli. */
} /* Chiude il blocco CSS corrente. */
.tag.success { /* Selettore CSS: definisce lo stile di '.tag.success'. */
  background:#e5f5f0; /* Definisce lo sfondo. */
  color:#16816d; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.document-cards,.finance-stats { /* Selettore CSS: definisce lo stile di '.document-cards,.finance-stats'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:repeat(3,1fr); /* Definisce colonne e larghezze della griglia. */
  gap:15px; /* Definisce la distanza tra gli elementi figli. */
  margin-bottom:18px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.finance-stats { /* Selettore CSS: definisce lo stile di '.finance-stats'. */
  grid-template-columns:repeat(4,1fr); /* Definisce colonne e larghezze della griglia. */
} /* Chiude il blocco CSS corrente. */
.doc-stat,.finance-stat { /* Selettore CSS: definisce lo stile di '.doc-stat,.finance-stat'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
} /* Chiude il blocco CSS corrente. */
.doc-stat strong,.finance-stat strong { /* Selettore CSS: definisce lo stile di '.doc-stat strong,.finance-stat strong'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  font-size:24px; /* Definisce la dimensione del testo. */
  margin-top:7px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.finance-stat small { /* Selettore CSS: definisce lo stile di '.finance-stat small'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  margin-top:5px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.tax-alert { /* Selettore CSS: definisce lo stile di '.tax-alert'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  gap:13px; /* Definisce la distanza tra gli elementi figli. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  background:#fff8ec; /* Definisce lo sfondo. */
  border:1px solid #f7dfb8; /* Definisce il bordo. */
  border-radius:14px; /* Arrotonda gli angoli. */
  padding:15px; /* Definisce lo spazio interno. */
  margin-bottom:18px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.tax-alert>span { /* Selettore CSS: definisce lo stile di '.tax-alert>span'. */
  width:34px; /* Definisce la larghezza. */
  height:34px; /* Definisce l'altezza. */
  border-radius:50%; /* Arrotonda gli angoli. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  place-items:center; /* Imposta la proprietà CSS 'place-items'. */
  background:#ffe7bc; /* Definisce lo sfondo. */
  color:#b86d00; /* Definisce il colore del testo. */
  font-weight:700; /* Definisce lo spessore del testo. */
} /* Chiude il blocco CSS corrente. */
.tax-alert strong { /* Selettore CSS: definisce lo stile di '.tax-alert strong'. */
  font-size:12px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.tax-alert p { /* Selettore CSS: definisce lo stile di '.tax-alert p'. */
  margin:3px 0 0; /* Definisce lo spazio esterno. */
  color:#887968; /* Definisce il colore del testo. */
  font-size:10px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.deadline-table { /* Selettore CSS: definisce lo stile di '.deadline-table'. */
  overflow:hidden; /* Gestisce il contenuto che supera le dimensioni disponibili. */
} /* Chiude il blocco CSS corrente. */
.tax-row { /* Selettore CSS: definisce lo stile di '.tax-row'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:58px 1fr auto auto; /* Definisce colonne e larghezze della griglia. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  gap:15px; /* Definisce la distanza tra gli elementi figli. */
  padding:17px 20px; /* Definisce lo spazio interno. */
  border-top:1px solid #eef1f1; /* Imposta la proprietà CSS 'border-top'. */
} /* Chiude il blocco CSS corrente. */
.tax-date { /* Selettore CSS: definisce lo stile di '.tax-date'. */
  text-align:center; /* Imposta la proprietà CSS 'text-align'. */
  border:1px solid var(--line); /* Definisce il bordo. */
  border-radius:9px; /* Arrotonda gli angoli. */
  padding:6px; /* Definisce lo spazio interno. */
  width:45px; /* Definisce la larghezza. */
} /* Chiude il blocco CSS corrente. */
.tax-date.urgent { /* Selettore CSS: definisce lo stile di '.tax-date.urgent'. */
  border-color:#f1c47d; /* Imposta la proprietà CSS 'border-color'. */
  background:#fff8ec; /* Definisce lo sfondo. */
} /* Chiude il blocco CSS corrente. */
.tax-date strong,.tax-date span { /* Selettore CSS: definisce lo stile di '.tax-date strong,.tax-date span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
} /* Chiude il blocco CSS corrente. */
.tax-date strong { /* Selettore CSS: definisce lo stile di '.tax-date strong'. */
  font-size:15px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.tax-date span { /* Selettore CSS: definisce lo stile di '.tax-date span'. */
  font-size:8px; /* Definisce la dimensione del testo. */
  color:#899697; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.tax-row strong { /* Selettore CSS: definisce lo stile di '.tax-row strong'. */
  font-size:11px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.tax-row div:nth-child(2) span { /* Selettore CSS: definisce lo stile di '.tax-row div:nth-child(2) span'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  color:#899697; /* Definisce il colore del testo. */
  font-size:9px; /* Definisce la dimensione del testo. */
  margin-top:3px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.report-grid { /* Selettore CSS: definisce lo stile di '.report-grid'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:repeat(4,1fr); /* Definisce colonne e larghezze della griglia. */
  gap:16px; /* Definisce la distanza tra gli elementi figli. */
} /* Chiude il blocco CSS corrente. */
.report-card { /* Selettore CSS: definisce lo stile di '.report-card'. */
  padding:20px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.report-card span,.report-card small { /* Selettore CSS: definisce lo stile di '.report-card span,.report-card small'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  color:#839091; /* Definisce il colore del testo. */
  font-size:10px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.report-card strong { /* Selettore CSS: definisce lo stile di '.report-card strong'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  font-size:25px; /* Definisce la dimensione del testo. */
  margin:9px 0; /* Definisce lo spazio esterno. */
} /* Chiude il blocco CSS corrente. */
.mini-bar { /* Selettore CSS: definisce lo stile di '.mini-bar'. */
  height:6px; /* Definisce l'altezza. */
  background:#edf1f1; /* Definisce lo sfondo. */
  border-radius:10px; /* Arrotonda gli angoli. */
  overflow:hidden; /* Gestisce il contenuto che supera le dimensioni disponibili. */
  margin-bottom:8px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.mini-bar i { /* Selettore CSS: definisce lo stile di '.mini-bar i'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  height:100%; /* Definisce l'altezza. */
  background:#18a091; /* Definisce lo sfondo. */
  border-radius:10px; /* Arrotonda gli angoli. */
} /* Chiude il blocco CSS corrente. */
.team-grid { /* Selettore CSS: definisce lo stile di '.team-grid'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:repeat(3,1fr); /* Definisce colonne e larghezze della griglia. */
  gap:16px; /* Definisce la distanza tra gli elementi figli. */
} /* Chiude il blocco CSS corrente. */
.team-member { /* Selettore CSS: definisce lo stile di '.team-member'. */
  text-align:center; /* Imposta la proprietà CSS 'text-align'. */
  padding:28px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.team-member .avatar { /* Selettore CSS: definisce lo stile di '.team-member .avatar'. */
  margin:auto; /* Definisce lo spazio esterno. */
} /* Chiude il blocco CSS corrente. */
.team-member h3 { /* Selettore CSS: definisce lo stile di '.team-member h3'. */
  font-size:13px; /* Definisce la dimensione del testo. */
  margin:13px 0 4px; /* Definisce lo spazio esterno. */
} /* Chiude il blocco CSS corrente. */
.team-member>span { /* Selettore CSS: definisce lo stile di '.team-member>span'. */
  font-size:10px; /* Definisce la dimensione del testo. */
  color:#839091; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.member-actions { /* Selettore CSS: definisce lo stile di '.member-actions'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  justify-content:space-between; /* Distribuisce gli elementi sull'asse principale. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  margin-top:18px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.member-actions button { /* Selettore CSS: definisce lo stile di '.member-actions button'. */
  border:0; /* Definisce il bordo. */
  background:none; /* Definisce lo sfondo. */
} /* Chiude il blocco CSS corrente. */
.settings-layout { /* Selettore CSS: definisce lo stile di '.settings-layout'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:220px 1fr; /* Definisce colonne e larghezze della griglia. */
  gap:18px; /* Definisce la distanza tra gli elementi figli. */
} /* Chiude il blocco CSS corrente. */
.settings-nav { /* Selettore CSS: definisce lo stile di '.settings-nav'. */
  padding:10px; /* Definisce lo spazio interno. */
  height:max-content; /* Definisce l'altezza. */
} /* Chiude il blocco CSS corrente. */
.settings-nav button { /* Selettore CSS: definisce lo stile di '.settings-nav button'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  width:100%; /* Definisce la larghezza. */
  text-align:left; /* Imposta la proprietà CSS 'text-align'. */
  border:0; /* Definisce il bordo. */
  background:none; /* Definisce lo sfondo. */
  padding:11px; /* Definisce lo spazio interno. */
  border-radius:8px; /* Arrotonda gli angoli. */
  font-size:10px; /* Definisce la dimensione del testo. */
  color:#667576; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.settings-nav button.active { /* Selettore CSS: definisce lo stile di '.settings-nav button.active'. */
  background:#e9f5f3; /* Definisce lo sfondo. */
  color:#0d6f67; /* Definisce il colore del testo. */
  font-weight:700; /* Definisce lo spessore del testo. */
} /* Chiude il blocco CSS corrente. */
.settings-form { /* Selettore CSS: definisce lo stile di '.settings-form'. */
  padding:24px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.settings-form h2 { /* Selettore CSS: definisce lo stile di '.settings-form h2'. */
  margin:0; /* Definisce lo spazio esterno. */
  font-size:16px; /* Definisce la dimensione del testo. */
} /* Chiude il blocco CSS corrente. */
.settings-form>p { /* Selettore CSS: definisce lo stile di '.settings-form>p'. */
  font-size:10px; /* Definisce la dimensione del testo. */
  margin-bottom:22px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.settings-form label { /* Selettore CSS: definisce lo stile di '.settings-form label'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  font-size:10px; /* Definisce la dimensione del testo. */
  font-weight:700; /* Definisce lo spessore del testo. */
  color:#526263; /* Definisce il colore del testo. */
  margin-bottom:15px; /* Imposta la proprietà CSS 'margin-bottom'. */
} /* Chiude il blocco CSS corrente. */
.settings-form input { /* Selettore CSS: definisce lo stile di '.settings-form input'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  width:100%; /* Definisce la larghezza. */
  margin-top:6px; /* Imposta la proprietà CSS 'margin-top'. */
  border:1px solid var(--line); /* Definisce il bordo. */
  border-radius:9px; /* Arrotonda gli angoli. */
  padding:11px; /* Definisce lo spazio interno. */
  outline:0; /* Imposta la proprietà CSS 'outline'. */
} /* Chiude il blocco CSS corrente. */
.two-col { /* Selettore CSS: definisce lo stile di '.two-col'. */
  display:grid; /* Definisce il modello di layout dell'elemento. */
  grid-template-columns:1fr 1fr; /* Definisce colonne e larghezze della griglia. */
  gap:15px; /* Definisce la distanza tra gli elementi figli. */
} /* Chiude il blocco CSS corrente. */
.modal-backdrop { /* Selettore CSS: definisce lo stile di '.modal-backdrop'. */
  display:none; /* Definisce il modello di layout dell'elemento. */
  position:fixed; /* Definisce il metodo di posizionamento. */
  inset:0; /* Imposta la proprietà CSS 'inset'. */
  background:rgba(9,25,26,.45); /* Definisce lo sfondo. */
  z-index:50; /* Imposta la proprietà CSS 'z-index'. */
  align-items:center; /* Allinea gli elementi sull'asse trasversale. */
  justify-content:center; /* Distribuisce gli elementi sull'asse principale. */
  padding:20px; /* Definisce lo spazio interno. */
} /* Chiude il blocco CSS corrente. */
.modal-backdrop.open { /* Selettore CSS: definisce lo stile di '.modal-backdrop.open'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
} /* Chiude il blocco CSS corrente. */
.modal { /* Selettore CSS: definisce lo stile di '.modal'. */
  background:#fff; /* Definisce lo sfondo. */
  width:min(500px,100%); /* Definisce la larghezza. */
  border-radius:18px; /* Arrotonda gli angoli. */
  box-shadow:0 30px 70px rgba(0,0,0,.2); /* Aggiunge un'ombra. */
  padding:25px; /* Definisce lo spazio interno. */
  position:relative; /* Definisce il metodo di posizionamento. */
} /* Chiude il blocco CSS corrente. */
.modal-close { /* Selettore CSS: definisce lo stile di '.modal-close'. */
  position:absolute; /* Definisce il metodo di posizionamento. */
  right:16px; /* Definisce la distanza dal lato destro. */
  top:12px; /* Definisce la posizione verticale. */
  border:0; /* Definisce il bordo. */
  background:none; /* Definisce lo sfondo. */
  font-size:23px; /* Definisce la dimensione del testo. */
  color:#718083; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.modal h2 { /* Selettore CSS: definisce lo stile di '.modal h2'. */
  margin:0 0 6px; /* Definisce lo spazio esterno. */
} /* Chiude il blocco CSS corrente. */
.modal p { /* Selettore CSS: definisce lo stile di '.modal p'. */
  font-size:11px; /* Definisce la dimensione del testo. */
  color:#788687; /* Definisce il colore del testo. */
} /* Chiude il blocco CSS corrente. */
.modal label { /* Selettore CSS: definisce lo stile di '.modal label'. */
  display:block; /* Definisce il modello di layout dell'elemento. */
  font-size:10px; /* Definisce la dimensione del testo. */
  font-weight:700; /* Definisce lo spessore del testo. */
  margin-top:14px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.modal input,.modal select { /* Selettore CSS: definisce lo stile di '.modal input,.modal select'. */
  width:100%; /* Definisce la larghezza. */
  margin-top:6px; /* Imposta la proprietà CSS 'margin-top'. */
  padding:10px; /* Definisce lo spazio interno. */
  border:1px solid var(--line); /* Definisce il bordo. */
  border-radius:9px; /* Arrotonda gli angoli. */
} /* Chiude il blocco CSS corrente. */
.modal .form-actions { /* Selettore CSS: definisce lo stile di '.modal .form-actions'. */
  display:flex; /* Definisce il modello di layout dell'elemento. */
  justify-content:flex-end; /* Distribuisce gli elementi sull'asse principale. */
  gap:8px; /* Definisce la distanza tra gli elementi figli. */
  margin-top:20px; /* Imposta la proprietà CSS 'margin-top'. */
} /* Chiude il blocco CSS corrente. */
.toast { /* Selettore CSS: definisce lo stile di '.toast'. */
  position:fixed; /* Definisce il metodo di posizionamento. */
  right:25px; /* Definisce la distanza dal lato destro. */
  bottom:25px; /* Definisce la distanza dal lato inferiore. */
  background:#102a2c; /* Definisce lo sfondo. */
  color:#fff; /* Definisce il colore del testo. */
  padding:12px 16px; /* Definisce lo spazio interno. */
  border-radius:10px; /* Arrotonda gli angoli. */
  font-size:11px; /* Definisce la dimensione del testo. */
  opacity:0; /* Definisce la trasparenza. */
  transform:translateY(10px); /* Applica una trasformazione grafica. */
  transition:.25s; /* Definisce l'animazione tra stati diversi. */
  z-index:70; /* Imposta la proprietà CSS 'z-index'. */
} /* Chiude il blocco CSS corrente. */
.toast.show { /* Selettore CSS: definisce lo stile di '.toast.show'. */
  opacity:1; /* Definisce la trasparenza. */
  transform:none; /* Applica una trasformazione grafica. */
} /* Chiude il blocco CSS corrente. */
@media(max-width:1100px) { /* Media query: applica regole specifiche a determinate dimensioni dello schermo. */
  .stats-grid { /* Selettore CSS: definisce lo stile di '.stats-grid'. */
    grid-template-columns:1fr 1fr; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
  .dashboard-grid { /* Selettore CSS: definisce lo stile di '.dashboard-grid'. */
    grid-template-columns:1fr; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
  .finance-stats { /* Selettore CSS: definisce lo stile di '.finance-stats'. */
    grid-template-columns:1fr 1fr; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
  .report-grid { /* Selettore CSS: definisce lo stile di '.report-grid'. */
    grid-template-columns:1fr 1fr; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
} /* Chiude il blocco CSS corrente. */
@media(max-width:800px) { /* Media query: applica regole specifiche a determinate dimensioni dello schermo. */
  .sidebar { /* Selettore CSS: definisce lo stile di '.sidebar'. */
    transform:translateX(-100%); /* Applica una trasformazione grafica. */
    transition:.25s; /* Definisce l'animazione tra stati diversi. */
  } /* Chiude il blocco CSS corrente. */
  .sidebar.open { /* Selettore CSS: definisce lo stile di '.sidebar.open'. */
    transform:none; /* Applica una trasformazione grafica. */
  } /* Chiude il blocco CSS corrente. */
  .main { /* Selettore CSS: definisce lo stile di '.main'. */
    margin-left:0; /* Imposta la proprietà CSS 'margin-left'. */
    width:100%; /* Definisce la larghezza. */
  } /* Chiude il blocco CSS corrente. */
  .mobile-menu { /* Selettore CSS: definisce lo stile di '.mobile-menu'. */
    display:block; /* Definisce il modello di layout dell'elemento. */
  } /* Chiude il blocco CSS corrente. */
  .topbar { /* Selettore CSS: definisce lo stile di '.topbar'. */
    padding:0 15px; /* Definisce lo spazio interno. */
  } /* Chiude il blocco CSS corrente. */
  .user-chip span:not(.avatar) { /* Selettore CSS: definisce lo stile di '.user-chip span:not(.avatar)'. */
    display:none; /* Definisce il modello di layout dell'elemento. */
  } /* Chiude il blocco CSS corrente. */
  .content { /* Selettore CSS: definisce lo stile di '.content'. */
    padding:20px 15px; /* Definisce lo spazio interno. */
  } /* Chiude il blocco CSS corrente. */
  .page-heading,.welcome-row { /* Selettore CSS: definisce lo stile di '.page-heading,.welcome-row'. */
    align-items:flex-start; /* Allinea gli elementi sull'asse trasversale. */
    flex-direction:column; /* Imposta la proprietà CSS 'flex-direction'. */
  } /* Chiude il blocco CSS corrente. */
  .clinical-layout,.settings-layout { /* Selettore CSS: definisce lo stile di '.clinical-layout,.settings-layout'. */
    grid-template-columns:1fr; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
  .team-grid { /* Selettore CSS: definisce lo stile di '.team-grid'. */
    grid-template-columns:1fr; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
  .document-cards { /* Selettore CSS: definisce lo stile di '.document-cards'. */
    grid-template-columns:1fr 1fr; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
  .table-card { /* Selettore CSS: definisce lo stile di '.table-card'. */
    overflow-x:auto; /* Imposta la proprietà CSS 'overflow-x'. */
  } /* Chiude il blocco CSS corrente. */
  table { /* Selettore CSS: definisce lo stile di 'table'. */
    min-width:760px; /* Imposta la proprietà CSS 'min-width'. */
  } /* Chiude il blocco CSS corrente. */
  .toolbar,.filters { /* Selettore CSS: definisce lo stile di '.toolbar,.filters'. */
    flex-wrap:wrap; /* Imposta la proprietà CSS 'flex-wrap'. */
  } /* Chiude il blocco CSS corrente. */
  .toolbar select { /* Selettore CSS: definisce lo stile di '.toolbar select'. */
    margin-left:0; /* Imposta la proprietà CSS 'margin-left'. */
  } /* Chiude il blocco CSS corrente. */
  .agenda-full { /* Selettore CSS: definisce lo stile di '.agenda-full'. */
    height:700px; /* Definisce l'altezza. */
  } /* Chiude il blocco CSS corrente. */
  .agenda-hours { /* Selettore CSS: definisce lo stile di '.agenda-hours'. */
    width:55px; /* Definisce la larghezza. */
  } /* Chiude il blocco CSS corrente. */
  .appointment-block { /* Selettore CSS: definisce lo stile di '.appointment-block'. */
    left:8px; /* Definisce la posizione orizzontale. */
    right:8px; /* Definisce la distanza dal lato destro. */
  } /* Chiude il blocco CSS corrente. */
  .tax-row { /* Selettore CSS: definisce lo stile di '.tax-row'. */
    grid-template-columns:50px 1fr auto; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
  .tax-row .text-btn { /* Selettore CSS: definisce lo stile di '.tax-row .text-btn'. */
    display:none; /* Definisce il modello di layout dell'elemento. */
  } /* Chiude il blocco CSS corrente. */
} /* Chiude il blocco CSS corrente. */
@media(max-width:520px) { /* Media query: applica regole specifiche a determinate dimensioni dello schermo. */
  .stats-grid,.finance-stats,.report-grid,.document-cards { /* Selettore CSS: definisce lo stile di '.stats-grid,.finance-stats,.report-grid,.document-cards'. */
    grid-template-columns:1fr; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
  .quick-grid { /* Selettore CSS: definisce lo stile di '.quick-grid'. */
    grid-template-columns:1fr; /* Definisce colonne e larghezze della griglia. */
  } /* Chiude il blocco CSS corrente. */
  .content { /* Selettore CSS: definisce lo stile di '.content'. */
    padding:16px 12px; /* Definisce lo spazio interno. */
  } /* Chiude il blocco CSS corrente. */
  .page-heading h1,.welcome-row h1 { /* Selettore CSS: definisce lo stile di '.page-heading h1,.welcome-row h1'. */
    font-size:23px; /* Definisce la dimensione del testo. */
  } /* Chiude il blocco CSS corrente. */
  .topbar { /* Selettore CSS: definisce lo stile di '.topbar'. */
    height:60px; /* Definisce l'altezza. */
  } /* Chiude il blocco CSS corrente. */
  .chart-wrap { /* Selettore CSS: definisce lo stile di '.chart-wrap'. */
    padding-left:8px; /* Imposta la proprietà CSS 'padding-left'. */
  } /* Chiude il blocco CSS corrente. */
  .sidebar { /* Selettore CSS: definisce lo stile di '.sidebar'. */
    width:280px; /* Definisce la larghezza. */
  } /* Chiude il blocco CSS corrente. */
} /* Chiude il blocco CSS corrente. */

```
