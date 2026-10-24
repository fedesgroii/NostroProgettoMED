<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione - MindLab</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 24px;
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333333;
        }

        .container {
            width: 100%;
            max-width: 480px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin: 0 0 12px;
            color: #00796b;
            font-size: 2em;
        }

        h2 {
            margin: 0 0 24px;
            color: #333333;
            font-size: 1.2em;
            font-weight: 500;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            padding: 16px 20px;
            border-radius: 8px;
            color: #ffffff;
            text-align: left;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn:focus-visible,
        .back-link:focus-visible {
            outline: 3px solid #111827;
            outline-offset: 3px;
        }

        .btn-adulto {
            background-color: #0288d1;
        }

        .btn-adulto:hover {
            background-color: #0277bd;
        }

        .btn-minorenne {
            background-color: #388e3c;
        }

        .btn-minorenne:hover {
            background-color: #2e7d32;
        }

        .btn-title {
            font-size: 1.1em;
            font-weight: 600;
        }

        .btn-description {
            margin-top: 5px;
            font-size: 0.9em;
            line-height: 1.4;
        }

        .back-link {
            display: inline-block;
            margin-top: 22px;
            color: #00796b;
            font-size: 0.9em;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 24px 20px;
            }

            h1 {
                font-size: 1.7em;
            }
        }
    </style>
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
</body>
</html>
