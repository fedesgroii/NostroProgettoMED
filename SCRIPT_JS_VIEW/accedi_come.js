/**
 * MindLab - Script di presentazione per la vista Accedi Come
 * Cartella: SCRIPT_JS_VIEW/accedi_come.js
 * Responsabilità MVC: Gestione interazioni client-side (View Presentation)
 */

document.addEventListener('DOMContentLoaded', function () {
    // Gestione interattiva dei pulsanti di selezione accesso
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function () {
            this.style.transition = 'all 0.2s ease';
        });
    });
});
