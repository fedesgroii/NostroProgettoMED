<?php
/**
 * VIEW: login_credential (form credenziali, paziente e specialista)
 * Modulo: Login — Pattern MVC (V del triangolo)
 *
 * VISTA DI SOLA PRESENTAZIONE: non contiene query SQL né decisioni di
 * business. Legge SOLO variabili preparate dal Controller:
 *   - $csrfToken     : token anti-CSRF da inserire nel campo hidden;
 *   - $titoloPagina  : titolo dinamico ("Accedo come paziente/specialista");
 *   - $errore        : messaggio di errore (solo dopo POST fallito);
 *   - $ruoloAttuale  : 'paziente' o 'specialista', per il badge nel form.
 *
 * REGOLE DI SICUREZZA APPLICATE QUI:
 *   1. OGNI dato stampato che arriva "da fuori" passa da e() (wrapper su
 *      htmlspecialchars): questo è l'escaping XSS. Anche se oggi stampiamo
 *      solo valori controllati, la buona abitudine va presa subito.
 *   2. method="POST": le credenziali NON devono mai finire nell'URL
 *      (che browser, proxy e log si ricordano).
 *   3. action="" invia allo STESSO URL: il Controller gestisce sia GET
 *      (mostra il form) sia POST (elabora), come già fa LoginController.
 */

if (!defined('APP_BOOTSTRAPPED')) {
    http_response_code(403);
    exit('Accesso negato: le view sono raggiungibili solo tramite il front controller.');
}

// Helper locale di escaping. In un progetto più grande finirà in una
// libreria condivisa (es. /lib/helpers.php), ma per ora vive qui.
if (!function_exists('e')) {
    function e(?string $valore): string {
        return htmlspecialchars((string) $valore, ENT_QUOTES, 'UTF-8');
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titoloPagina ?? 'Accedi') ?> — Portale MindLab</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            font-size: 1.6em;
            color: #00796b;
            margin-bottom: 8px;
        }
        .badge-ruolo {
            display: inline-block;
            margin-bottom: 20px;
            padding: 4px 14px;
            border-radius: 999px;
            font-size: 0.85em;
            font-weight: bold;
            color: #ffffff;
            background-color: <?= ($ruoloAttuale ?? 'paziente') === 'specialista' ? '#0288d1' : '#388e3c' ?>;
        }
        form { display: flex; flex-direction: column; gap: 14px; }
        label { text-align: left; font-size: 0.9em; color: #333; font-weight: bold; }
        input[type="email"], input[type="password"] {
            padding: 12px;
            border: 1px solid #cfd8dc;
            border-radius: 6px;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="email"]:focus, input[type="password"]:focus {
            outline: 2px solid #00796b;
            border-color: transparent;
        }
        .btn-accedi {
            padding: 12px 20px;
            font-size: 1em;
            font-weight: bold;
            color: #ffffff;
            background-color: #00796b;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-accedi:hover { background-color: #005f56; }
        .errore {
            background-color: #fdecea;
            color: #b71c1c;
            border: 1px solid #f5c6cb;
            border-radius: 6px;
            padding: 10px;
            font-size: 0.9em;
        }
        .torna-indietro {
            display: inline-block;
            margin-top: 18px;
            font-size: 0.85em;
            color: #00796b;
            text-decoration: none;
        }
        .torna-indietro:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Portale MindLab</h1>
        <span class="badge-ruolo"><?= e($ruoloAttuale ?? 'paziente') ?></span>

        <?php if (!empty($errore)): ?>
            <div class="errore" role="alert"><?= e($errore) ?></div>
        <?php endif; ?>

        <!-- method POST + campo hidden CSRF: due difese fondamentali.
             Senza POST le password finirebbero nell'URL; senza token
             un sito malevolo potrebbe far inviare login a nome utente. -->
        <form method="post" action="">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken ?? '') ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required
                   autocomplete="username"
                   value="<?= e($_POST['email'] ?? '') /* rimpieghi l'email dopo errore */ ?>">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required
                   autocomplete="current-password">

            <button type="submit" class="btn-accedi">Accedi</button>
        </form>

        <a class="torna-indietro" href="index.php?page=login-choice">← Cambia tipo di accesso</a>
    </div>
</body>
</html>
