/**
 * MindLab - Script di presentazione per la vista Scelta Registrazione
 * Cartella: SCRIPT_JS_VIEW/registratiComeView.js
 * Responsabilità MVC: Gestione interazioni client-side (View Presentation)
 */

document.addEventListener('DOMContentLoaded', function () {
    // Gestione interattiva ed animazioni per i pulsanti di scelta registrazione
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function () {
            this.style.transition = 'background-color 0.3s ease, transform 0.2s ease';
        });
    });
});
