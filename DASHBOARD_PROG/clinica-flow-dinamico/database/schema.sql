-- [MODEL/DATABASE - Struttura] Crea il database applicativo.
CREATE DATABASE IF NOT EXISTS clinicaflow CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- [MODEL/DATABASE - Struttura] Seleziona il database.
USE clinicaflow;

-- [MODEL/DATABASE - Struttura] Contiene i dati della struttura/azienda.
CREATE TABLE strutture(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(160) NOT NULL,
    partita_iva VARCHAR(32),
    telefono VARCHAR(40),
    email VARCHAR(190),
    indirizzo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- [MODEL/DATABASE - Utenti] Contiene gli utenti autenticati.
CREATE TABLE utenti(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    struttura_id INT UNSIGNED NOT NULL,
    nome VARCHAR(80) NOT NULL,
    cognome VARCHAR(80) NOT NULL,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    ruolo VARCHAR(100) NOT NULL,
    avatar VARCHAR(20),
    ultimo_accesso DATETIME NULL,
    attivo TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY(struttura_id) REFERENCES strutture(id)
);

-- [MODEL/DATABASE - Pazienti] Contiene le anagrafiche pazienti.
CREATE TABLE pazienti(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    struttura_id INT UNSIGNED NOT NULL,
    nome VARCHAR(80) NOT NULL,
    cognome VARCHAR(80) NOT NULL,
    codice_paziente VARCHAR(50) NOT NULL,
    telefono VARCHAR(40),
    email VARCHAR(190),
    data_nascita DATE,
    stato ENUM('attivo','in_attesa','archiviato') NOT NULL DEFAULT 'attivo',
    data_creazione DATE NOT NULL,
    FOREIGN KEY(struttura_id) REFERENCES strutture(id),
    UNIQUE KEY uq_paziente_struttura(struttura_id,codice_paziente)
);

-- [MODEL/DATABASE - Appuntamenti] Contiene gli appuntamenti.
CREATE TABLE appuntamenti(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    struttura_id INT UNSIGNED NOT NULL,
    paziente_id INT UNSIGNED NOT NULL,
    professionista_id INT UNSIGNED NOT NULL,
    data_ora_inizio DATETIME NOT NULL,
    durata_minuti INT UNSIGNED NOT NULL DEFAULT 60,
    tipologia VARCHAR(120) NOT NULL,
    stato ENUM('confermato','in_corso','da_confermare','annullato') NOT NULL DEFAULT 'da_confermare',
    FOREIGN KEY(struttura_id) REFERENCES strutture(id),
    FOREIGN KEY(paziente_id) REFERENCES pazienti(id),
    FOREIGN KEY(professionista_id) REFERENCES utenti(id),
    INDEX idx_agenda(struttura_id,data_ora_inizio)
);

-- [MODEL/DATABASE - Incassi] Contiene gli incassi reali.
CREATE TABLE incassi(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    struttura_id INT UNSIGNED NOT NULL,
    importo DECIMAL(12,2) NOT NULL,
    data_incasso DATE NOT NULL,
    riferimento VARCHAR(100),
    FOREIGN KEY(struttura_id) REFERENCES strutture(id),
    INDEX idx_incassi(struttura_id,data_incasso)
);

-- [MODEL/DATABASE - Scadenze] Contiene le scadenze reali.
CREATE TABLE scadenze(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    struttura_id INT UNSIGNED NOT NULL,
    data_scadenza DATE NOT NULL,
    titolo VARCHAR(190) NOT NULL,
    descrizione TEXT,
    stato ENUM('programmata','urgente','completata') NOT NULL DEFAULT 'programmata',
    FOREIGN KEY(struttura_id) REFERENCES strutture(id),
    INDEX idx_scadenze(struttura_id,data_scadenza)
);

-- [MODEL/DATABASE - Notifiche] Contiene le notifiche utente.
CREATE TABLE notifiche(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    struttura_id INT UNSIGNED NOT NULL,
    utente_id INT UNSIGNED NOT NULL,
    titolo VARCHAR(190) NOT NULL,
    messaggio TEXT,
    letta TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(struttura_id) REFERENCES strutture(id),
    FOREIGN KEY(utente_id) REFERENCES utenti(id)
);
