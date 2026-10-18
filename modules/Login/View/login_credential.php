<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MindLab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Stili di base */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Header con icona e nome azienda */
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 20px;
            flex-direction: column;
        }

        .header i {
            font-size: 2.5em;
            color: #28a745;
        }

        .header h1 {
            font-size: 1.8em;
            color: #333;
            margin-top: 10px;
            font-weight: 600;
        }

        /* Sezione di benvenuto */
        .welcome {
            font-size: 2em;
            margin: 20px 0;
            color: #333;
            text-align: center;
        }

        /* Form */
        .login-form {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-form input {
            width: 80%;  /* Impostato al 80% della larghezza del form */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .login-form button {
            width: 80%;  /* Impostato al 80% della larghezza del form */
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .login-form button:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        /* Animazione di errore (shake) */
        .error-message {
            display: block;
            text-align: center;
            color: red;
            font-size: 1.2em;
            margin-top: 15px;
        }

        .error-message.shake {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
    </style>
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

    <script>
        // Focus automatico sul campo username
        document.querySelector('input[name="username"]').focus();

        // Validazione del form
        document.querySelector('.login-form').addEventListener('submit', function(event) {
            const username = document.querySelector('input[name="username"]').value;
            const password = document.querySelector('input[name="password"]').value;

            // Verifica se i campi sono vuoti
            if (username.trim() === '' || password.trim() === '') {
                event.preventDefault();
                showError('Tutti i campi sono obbligatori.');
            }

            // Verifica la lunghezza della password
            if (password.length < 6) {
                event.preventDefault();
                showError('La password deve essere lunga almeno 6 caratteri.');
            }
        });

        // Funzione per mostrare un messaggio di errore con animazione
        function showError(message) {
            const errorMessage = document.querySelector('.error-message');
            errorMessage.textContent = message;
            errorMessage.classList.add('shake');
            setTimeout(() => {
                errorMessage.classList.remove('shake');
            }, 500);
        }
    </script>
</body>
</html>
