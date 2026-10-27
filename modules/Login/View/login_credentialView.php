<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MindLab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Foglio di stile esterno (Separazione MVC View) -->
    <link rel="stylesheet" href="/STILI_CSS_VIEW/login_credential.css">
</head>
<body>
    <div class="container">
        <!-- Header con icona di login e nome azienda -->
        <div class="header">
            <i class="fas fa-sign-in-alt"></i>
            <h1>MindLab</h1> <!-- Nome azienda -->
        </div>

        <!-- Sezione di benvenuto -->
        <div class="welcome">
            Benvenuto, accedi al tuo account
        </div>

        <!-- Form di login -->
        <form class="login-form" action="/path/to/your-login-endpoint" method="POST">
            <input type="text" name="username" placeholder="Nome utente" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Accedi</button>
        </form>

        <div class="error-message"></div>
    </div>

    <!-- Script esterno (Separazione MVC View) -->
    <script src="/SCRIPT_JS_VIEW/login_credential.js" defer></script>
</body>
</html>
