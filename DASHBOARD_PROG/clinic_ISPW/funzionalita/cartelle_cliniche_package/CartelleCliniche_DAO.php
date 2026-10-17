<?php
// [DAO - CartelleCliniche] Abilita i tipi stretti.
declare(strict_types=1);
// [DAO - CartelleCliniche] Colloca il DAO nel package della funzionalità.
namespace ClinicaFlow\cartelle_cliniche_package;
// [DAO - CartelleCliniche] Importa PDO per query preparate.
use PDO;
// [DAO - CartelleCliniche] Isola la query della funzionalità.
final class CartelleCliniche_DAO
{
    // [DAO - CartelleCliniche] Riceve PDO dal ControllerApplicativo tramite il bootstrap.
    public function __construct(private PDO $connessione) {}
    // [DAO - CartelleCliniche] Legge i dati dal database.
    public function leggi(): array
    {
        // [DAO - CartelleCliniche] Legge le note del paziente selezionato.
        return $this->connessione->query('SELECT p.initials, p.name_display AS name, p.code, n.note_date AS date_raw, n.session_type AS session, pr.first_name AS professional_first, pr.last_name AS professional_last, n.note_text AS text, n.status FROM clinical_notes n JOIN patients_view p ON p.id = n.patient_id LEFT JOIN professionals pr ON pr.id = n.professional_id WHERE n.patient_id = 1 ORDER BY n.note_date DESC')->fetchAll();
    }
    // [DAO - CartelleCliniche] Legge i pazienti necessari al selettore della View.
    public function leggiPazienti(): array { return $this->connessione->query('SELECT initials, name_display AS name, code, professional, specialty, last_visit AS lastVisit, next_appointment AS nextAppointment, status_label AS status FROM patients_view ORDER BY id')->fetchAll(); }
    // [DAO - CartelleCliniche] Legge il paziente attivo mostrato nella testata della cartella.
    public function leggiPazienteSelezionato(): array { return $this->connessione->query('SELECT initials, name_display AS name, code, professional, specialty, last_visit AS lastVisit, next_appointment AS nextAppointment, status_label AS status FROM patients_view WHERE id = 1')->fetch() ?: []; }
}
