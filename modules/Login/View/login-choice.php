<?php
/**
 * VIEW: login-choice (scelta del ruolo di accesso)
 *
 * Pattern MVC: questo è un file di sola View. Non contiene logica applicativa,
 * query SQL o accessi al DB. Al massimo legge variabili preparate dal
 * Controller (es. $csrfToken) e produce HTML.
 *
 * ESTENSIONE .php — perché:
 * 1. Il front controller (index.php) la include con require: il server DEVE
 *    interpretarla come PHP, altrimenti, con estensioni non eseguite (.html),
 *    in certi setup il contenuto verrebbe servito come testo grezzo.
 * 2. Anche una view "solo HTML" oggi può aver bisogno domani di un token CSRF,
 *    di output tags (eco del valore con helper e() per l'escaping), o di
 *    un layout: con .php sei pronto
 *    senza rinominare nulla.
 * 3. La coerenza: tutte le view del portale usano la stessa estensione e lo
 *    stesso renderer. Niente .html/.phtml/.tpl misti nella stessa cartella.
 */

// Fallback difensivo: se qualcuno apre questo file direttamente via URL
// (/modules/Login/View/login-choice.php), senza passare dal router, non deve
// vedere una pagina funzionante né errori che espongono path.
if (!defined('APP_BOOTSTRAPPED')) {
    http_response_code(403);
    exit('Accesso negato: le view sono raggiungibili solo tramite il front controller.');
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portale MindLab</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* DISABILITARE SELEZIONE*/
            -webkit-user-select: none; /* Per Safari */
            -moz-user-select: none;    /* Per Firefox */
            -ms-user-select: none;     /* Per IE/Edge */
            user-select: none;         /* Standard */
        }
        .container {
            text-align: center;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
        }
        h1 {
            font-size: 2em;
            color: #00796b;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 1.2em;
            color: #333333;
            margin-bottom: 30px;
        }
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .btn {
            padding: 12px 20px;
            font-size: 1em;
            font-weight: bold;
            color: #ffffff;
            background-color: #00796b;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-specialista {
            background-color: #0288d1;
        }
        .btn-paziente {
            background-color: #388e3c;
        }
        .btn:hover {
            background-color: #005f56;
        }
        .btn-specialista:hover {
            background-color: #0277bd;
        }
        .btn-paziente:hover {
            background-color: #2e7d32;
        }
        .btn:last-child {
            background-color: #ffffff;
            color: #00796b;
            border: 2px solid #00796b;
            font-size: 0.8em; /* dimensione del testo terzo bottone*/
        }
        .btn:last-child:hover {
            background-color: #e0f2f1;
        }
        .btn i {
            margin-right: 12px;
        }
        .btn span {
            display: flex;
            align-items: center;
            gap: 8px; /* Aggiunto gap per creare spazio tra icona e testo */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Portale MindLab</h1>
        <h2>Accedi come:</h2>
        <div class="btn-group">
            <!-- NOTA STUDIO: corretti gli href da "#link-..." (àncore morte)
                 ai valori della whitelist del router (?page=...). In questo
                 modo ogni click passa da index.php, dove agiscono controlli
                 di autenticazione, CSRF e rate limiting. -->
            <a href="?page=login-doctor" class="btn btn-specialista"><span><i class="fas fa-user-md"></i>Specialista</span></a>
            <a href="?page=login-patient" class="btn btn-paziente"><span><i class="fas fa-user"></i>Paziente</span></a>
            <a href="?page=prenotazione" class="btn"><span><i class="fas fa-calendar-alt"></i>Prenota un appuntamento senza registrarti</span></a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
