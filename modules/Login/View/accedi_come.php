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
            <a href="/modules/Login/View/login_credential.php" class="btn btn-specialista"><span><i class="fas fa-user-md"></i>Specialista</span></a>
            <a href="/modules/Login/View/login_credential.php" class="btn btn-paziente"><span><i class="fas fa-user"></i>Paziente</span></a>
            <a href="#DA FARE" class="btn last-child"><span><i class="fas fa-calendar-alt"></i>Prenota un appuntamento senza registrarti</span></a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
