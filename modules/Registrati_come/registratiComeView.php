<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione - MindLab</title>
    <!-- Foglio di stile esterno (Separazione MVC View) -->
    <link rel="stylesheet" href="/STILI_CSS_VIEW/registratiComeView.css">
</head>
<body>
    <main class="container">
        <h1>Portale MindLab</h1>
        <h2>Registrati come:</h2>

        <nav class="btn-group" aria-label="Scegli il tipo di registrazione">
            <a class="btn btn-adulto" href="/?page=registrazione-adulto">
                <span class="btn-title">Adulto</span>
                <span class="btn-description">Per registrare i tuoi dati personali.</span>
            </a>
            <a class="btn btn-minorenne" href="/?page=registration-minor">
                <span class="btn-title">Minorenne</span>
                <span class="btn-description">Per registrare un minore con i dati del genitore o tutore.</span>
            </a>
        </nav>

        <a class="back-link" href="/?page=login-choice">Torna alla pagina iniziale</a>
    </main>

    <!-- Script esterno (Separazione MVC View) -->
    <script src="/SCRIPT_JS_VIEW/registratiComeView.js" defer></script>
</body>
</html>
