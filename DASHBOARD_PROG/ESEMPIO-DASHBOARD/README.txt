# ClinicaFlow — Area Professionisti — Versione commentata

Questa è la versione didattica del frontend.

## Regola architetturale principale

Il progetto segue una separazione semplice:

- `index.html` → struttura e contenuti.
- `style.css` → grafica, layout e responsive.
- `script.js` → comportamento e interazioni.
- `README.txt` → documentazione.

In altre parole:

**HTML = cosa esiste.**  
**CSS = come appare.**  
**JavaScript = come si comporta.**

Questa separazione è importante perché in futuro potremo collegare PHP/MySQL senza trasformare il frontend in un unico file difficile da mantenere.

## Come studiare il progetto

### 1. HTML

Parti da `index.html`.

Cerca:

- `.app-shell` → contenitore generale.
- `.sidebar` → menu.
- `.topbar` → barra superiore.
- `.page` → pagine dell'app.
- `data-page` → collegamento tra menu e JavaScript.
- `data-page-action` → azioni rapide.

### 2. CSS

Passa a `style.css`.

Parti da:

- `:root` → variabili globali.
- `.card` → componente grafico riutilizzabile.
- `.page` → gestione visibilità.
- `@media` → responsive design.

Il CSS è stato riscritto con una proprietà per riga per rendere più facile lo studio.

### 3. JavaScript

Infine studia `script.js`.

Le funzioni principali sono:

- `showPage()` → navigazione.
- `openModal()` → apertura dei moduli.
- `closeModal()` → chiusura dei moduli.
- `showToast()` → messaggi temporanei.

## Principio della singola responsabilità

Ogni parte deve avere un compito preciso.

Esempio:

```text
HTML
  ↓
struttura

CSS
  ↓
presentazione

JavaScript
  ↓
interazione

PHP
  ↓
logica server

MySQL
  ↓
persistenza dati
```

Evita di mettere SQL dentro HTML, CSS dentro JavaScript o grandi quantità di HTML dentro funzioni JavaScript quando il progetto crescerà.

## Evoluzione consigliata

Quando passeremo al backend, suggerisco:

```text
clinica/
├── public/
│   ├── index.php
│   ├── css/
│   ├── js/
│   └── assets/
├── app/
│   ├── Controllers/
│   ├── Services/
│   ├── Repositories/
│   ├── Models/
│   └── Validators/
├── config/
├── database/
│   ├── migrations/
│   └── seeds/
└── storage/
```

Una possibile catena sarà:

```text
Browser
   ↓
JavaScript
   ↓
PHP Controller
   ↓
Service
   ↓
Repository
   ↓
MySQL
```

In questo modo possiamo applicare in maniera ordinata principi di separazione delle responsabilità, testabilità e manutenzione.

## Importante per i dati sanitari

I dati presenti nella demo sono fittizi.

Prima di usare dati reali di pazienti sarà necessario progettare autenticazione, autorizzazioni per ruolo, gestione delle sessioni, audit log, protezione dei documenti, backup, sicurezza delle API, gestione degli errori e conformità alle normative applicabili.

## Regola pratica per le future modifiche

Quando vuoi aggiungere una funzione:

1. aggiungi la struttura in HTML;
2. aggiungi lo stile in CSS;
3. aggiungi il comportamento in JavaScript;
4. collega successivamente il backend PHP;
5. aggiungi il database solo quando il modello dati è definito;
6. mantieni ogni responsabilità nel suo livello.

Il codice è volutamente semplice: l'obiettivo è che tu possa leggerlo, modificarlo e poi evolverlo verso un'architettura professionale senza dover imparare contemporaneamente un framework frontend.

NUOVA FUNZIONALITÀ — DRAG AND DROP AGENDA
------------------------------------------
La versione corrente aggiunge lo spostamento rapido degli appuntamenti tramite drag and drop.

Comportamento:
1. Ogni appuntamento ha draggable="true".
2. Ogni giorno della settimana è una destinazione valida per il trascinamento.
3. Il punto di rilascio viene arrotondato allo slot più vicino di 30 minuti.
4. La data e l'orario vengono aggiornati nell'interfaccia.
5. Lo slot viene considerato disponibile solo se non si sovrappone a un altro appuntamento.
6. Lo spostamento viene inoltre bloccato fuori dalla disponibilità demo 08:30–19:00.
7. Se lo slot è occupato o non disponibile, l'appuntamento rimane nella posizione originale e viene mostrato un messaggio di errore tramite toast.

ARCHITETTURA DEL DRAG AND DROP
------------------------------
La logica è mantenuta principalmente in script.js per rispettare la separazione delle responsabilità:
- index.html definisce giorni, appuntamenti e attributi data-*.
- style.css definisce griglia, stati visivi e cursori.
- script.js gestisce calcolo dello slot, controllo sovrapposizioni, aggiornamento di data/orario e messaggi.

ATTRIBUTI IMPORTANTI
--------------------
data-id       = identificativo demo dell'appuntamento.
data-date     = data corrente dell'appuntamento.
data-time     = orario di inizio nel formato HH:MM.
data-duration = durata in minuti.

NOTA PER IL FUTURO BACKEND
--------------------------
Al momento lo spostamento modifica soltanto il DOM e quindi i dati restano in memoria nel browser.
Quando verrà aggiunto PHP, il punto corretto per la persistenza sarà una richiesta API, per esempio:

Browser / JavaScript
        ↓
POST /api/appointments/{id}/move
        ↓
Controller PHP
        ↓
Service
        ↓
Repository
        ↓
MySQL

Il backend dovrà ripetere il controllo di disponibilità lato server. Il controllo JavaScript serve per una buona esperienza utente, ma non deve essere considerato una misura di sicurezza o di consistenza definitiva.
