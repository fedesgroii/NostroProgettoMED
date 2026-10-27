/**
 * MindLab - Script di presentazione e validazione per la vista Login Credentials
 * Cartella: SCRIPT_JS_VIEW/login_credential.js
 * Responsabilità MVC: Gestione interazioni client-side (View Presentation)
 */

document.addEventListener('DOMContentLoaded', function () {
    // Focus automatico sul campo username
    const usernameInput = document.querySelector('input[name="username"]');
    if (usernameInput) {
        usernameInput.focus();
    }

    // Validazione del form
    const loginForm = document.querySelector('.login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            const username = document.querySelector('input[name="username"]').value;
            const password = document.querySelector('input[name="password"]').value;

            // Verifica se i campi sono vuoti
            if (username.trim() === '' || password.trim() === '') {
                event.preventDefault();
                showError('Tutti i campi sono obbligatori.');
                return;
            }

            // Verifica la lunghezza della password
            if (password.length < 6) {
                event.preventDefault();
                showError('La password deve essere lunga almeno 6 caratteri.');
                return;
            }
        });
    }

    // Funzione per mostrare un messaggio di errore con animazione
    function showError(message) {
        const errorMessage = document.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.textContent = message;
            errorMessage.classList.add('shake');
            setTimeout(() => {
                errorMessage.classList.remove('shake');
            }, 500);
        }
    }
});
