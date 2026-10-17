# ClinicaFlow - migrazione da dati demo a dati reali

Questa versione parte dall'index HTML esistente e mantiene la stessa impostazione grafica, ma elimina i dati aziendali fittizi.

I valori reali non sono più scritti nell'HTML: la View contiene solo struttura e contenitori.

Il primo vertical slice implementato è:

View
-> ControllerGrafico
-> Bean/DTO
-> ControllerApplicativo
-> Model
-> DAO
-> MySQL.

## Avvio locale

Servire la cartella con PHP invece di aprire index.html con doppio click, perché il browser deve poter chiamare l'API PHP.

Esempio:

php -S localhost:8000 -t .

Poi aprire:

http://localhost:8000/

Senza una sessione autenticata l'applicazione reindirizza al Login_View.

## Database

Eseguire:

database/schema.sql

Poi creare la prima struttura e almeno un utente reale.

Per la password:

password_hash('la-password-scelta', PASSWORD_DEFAULT)

Non inserire password in chiaro nel database.

## Configurazione

Impostare:

DB_HOST
DB_NAME
DB_USER
DB_PASS

## Importante

Lo schema incluso è uno schema iniziale coerente con la dashboard attuale. Prima dell'uso reale bisogna adattarlo al database effettivamente scelto per l'azienda.

Non sono stati inseriti seed con pazienti o professionisti fittizi.
