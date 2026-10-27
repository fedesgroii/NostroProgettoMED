<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icona per la scheda del browser -->
    <link rel="icon" href="logo.png?v=2" type="image/png">
    <!-- Icona per iPhone/iPad -->
    <link rel="apple-touch-icon" sizes="180x180" href="logo.png?v=2">

    <title>Portale MindLab - Accedi Come</title>

    <!-- Foglio di stile esterno (Separazione MVC View) -->
    <link rel="stylesheet" href="/STILI_CSS_VIEW/accedi_come.css">
</head>
<body>
    <div class="container">
        <h1>Portale MindLab</h1>
        <h2>Accedi come:</h2>
        <div class="btn-group">

            <!-- Accesso Specialista (SVG inline corretto con stetoscopio) -->
            <a href="/?page=login-doctor" class="btn btn-specialista">
              <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zM104 288c-31.6 0-58.7 20.3-68.3 48.4C26.7 349.5 0 381.1 0 416c0 53 43 96 96 96h256c53 0 96-43 96-96 0-34.9-26.7-66.5-35.7-79.6-9.6-28.1-36.7-48.4-68.3-48.4H104zm96 64h48v48c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-48zm-48-32h-48v-48c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v48zm96-48c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v48h-48v-48z"/>
              </svg>
                Specialista
            </a>

            <!-- Accesso Paziente (SVG inline fa-user) -->
            <a href="/?page=login-patient" class="btn btn-paziente">
                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
                </svg>
                Paziente
            </a>

            <!-- Prenotazione Ospite (SVG inline fa-calendar-alt) -->
            <a href="#DA FARE" class="btn btn-ospite">
                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v320c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-16 368c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V192h320v240z"/>
                </svg>
                Prenota senza registrarti
            </a>

            <!-- Separatore -->
            <div class="separator">oppure</div>

            <!-- Registrazione (SVG inline fa-user-plus) -->
            <a href="/?page=registration-choice" class="btn btn-registrati">
                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
                </svg>
                Crea un nuovo account
            </a>

        </div>
    </div>

    <!-- Script esterno (Separazione MVC View) -->
    <script src="/SCRIPT_JS_VIEW/accedi_come.js" defer></script>
</body>
</html>
