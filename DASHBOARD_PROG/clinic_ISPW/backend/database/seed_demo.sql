USE clinicaflow;
INSERT INTO professionals (id,first_name,last_name,specialty,role,active) VALUES
(1,'Giorgia','Sgroi','Psicologa','Amministratrice',1),(2,'Luca','Verdi','Logopedista',NULL,1),(3,'Elena','Neri','Dietista',NULL,1)
ON DUPLICATE KEY UPDATE first_name=VALUES(first_name),last_name=VALUES(last_name),specialty=VALUES(specialty),role=VALUES(role),active=VALUES(active);
INSERT INTO patients (id,first_name,last_name,code,phone,email,status,last_visit,next_appointment) VALUES
(1,'Laura','Bianchi','PT-00124',NULL,NULL,'active','22/09/2026','29/09/2026 · 09:00'),
(2,'Marco','Esposito','PT-00118',NULL,NULL,'active','22/09/2026','06/10/2026 · 10:30'),
(3,'Giulia','Romano','PT-00107',NULL,NULL,'active','15/09/2026','22/09/2026 · 12:00'),
(4,'Sofia','Costa','PT-00098',NULL,NULL,'active','18/09/2026','25/09/2026 · 16:00'),
(5,'Andrea','Ferri','PT-00086',NULL,NULL,'waiting','10/09/2026','01/10/2026 · 14:30'),(6,'Sara','Moretti','PT-00087',NULL,NULL,'active',NULL,'')
ON DUPLICATE KEY UPDATE first_name=VALUES(first_name),last_name=VALUES(last_name),status=VALUES(status),last_visit=VALUES(last_visit),next_appointment=VALUES(next_appointment);
INSERT INTO appointments (id,patient_id,professional_id,appointment_date,start_time,duration_minutes,type,status,color_class) VALUES
(1,1,1,'2026-09-22','09:00:00',60,'Psicologia','confirmed','teal-block'),
(2,2,1,'2026-09-22','10:30:00',60,'Primo colloquio','confirmed','blue-block'),
(3,3,1,'2026-09-22','12:00:00',60,'Follow-up','current','purple-block'),
(4,4,1,'2026-09-22','15:00:00',60,'Seduta','pending','orange-block'),
(5,6,1,'2026-09-22','17:30:00',60,'Seduta','confirmed','teal-block')
ON DUPLICATE KEY UPDATE appointment_date=VALUES(appointment_date),start_time=VALUES(start_time),status=VALUES(status),color_class=VALUES(color_class);
INSERT INTO clinical_notes (id,patient_id,professional_id,note_date,session_type,note_text,status) VALUES
(1,1,1,'2026-09-22 12:00:00','Seduta individuale','Area dedicata alla nota clinica. In produzione questa sezione sarà collegata al backend e ai permessi professionali.','draft'),
(2,1,1,'2026-09-15 12:00:00','Follow-up','Spazio per annotazioni della seduta e obiettivi concordati.','signed')
ON DUPLICATE KEY UPDATE note_text=VALUES(note_text),status=VALUES(status);
INSERT INTO documents (id,patient_id,file_name,category,owner_display,document_date,status_label,status_class) VALUES
(1,1,'Consenso informato.pdf','Clinico','Laura Bianchi','2026-09-22','Da firmare','pending'),
(2,1,'Fattura 2026-089.pdf','Amministrativo','Laura Bianchi','2026-09-22','Archiviato','confirmed'),
(3,2,'Documento identità.pdf','Anagrafica','Marco Esposito','2026-09-20','Verificato','confirmed')
ON DUPLICATE KEY UPDATE status_label=VALUES(status_label),status_class=VALUES(status_class);
INSERT INTO invoices (id,invoice_number,patient_id,client_name,service,amount_display,issue_date,status_label,status_class) VALUES
(1,'#2026-089',1,'Laura Bianchi','Seduta psicologica','€ 70,00','2026-09-22','Pagata','confirmed'),
(2,'#2026-088',2,'Marco Esposito','Primo colloquio','€ 80,00','2026-09-22','Da pagare','pending'),
(3,'#2026-087',4,'Sofia Costa','Logopedia','€ 55,00','2026-09-21','Pagata','confirmed')
ON DUPLICATE KEY UPDATE status_label=VALUES(status_label),status_class=VALUES(status_class);
INSERT INTO deadlines (id,due_date,title,description,badge,urgent) VALUES
(1,'2026-09-30','Fatture da emettere','8 prestazioni ancora da fatturare','Da completare',1),
(2,'2026-10-16','Versamento IVA','Importo da confermare','In programma',0),
(3,'2026-10-30','Contributi previdenziali','Promemoria per il professionista','In programma',0),
(4,'2026-11-15','Invio documentazione al commercialista','Estratto contabile e fatture','In programma',0)
ON DUPLICATE KEY UPDATE title=VALUES(title),description=VALUES(description),badge=VALUES(badge),urgent=VALUES(urgent);
INSERT INTO dashboard_statistics (id,position_no,label,value,detail,detail_class,icon,icon_class) VALUES
(1,1,'Appuntamenti oggi','8','+2 rispetto a ieri','positive','◷','teal'),
(2,2,'Pazienti attivi','124','6 nuovi questo mese',NULL,'♙','blue'),
(3,3,'Incassi del mese','€ 7.840','+8,4% vs mese scorso','positive','€','purple'),
(4,4,'Scadenze vicine','4','Entro 30 giorni','warning-text','!','orange')
ON DUPLICATE KEY UPDATE label=VALUES(label),value=VALUES(value),detail=VALUES(detail),detail_class=VALUES(detail_class),icon=VALUES(icon),icon_class=VALUES(icon_class);
DELETE FROM dashboard_chart; INSERT INTO dashboard_chart (position_no,month_label,amount_value) VALUES (1,'Apr',175),(2,'Mag',150),(3,'Giu',160),(4,'Lug',105),(5,'Ago',125),(6,'Set',70);
INSERT INTO report_metrics (position_no,label,value_display,width_value,detail) VALUES (1,'Prestazioni erogate','186',72,'+12% rispetto ad agosto'),(2,'Tasso di presenza','91,4%',91,'Su 204 appuntamenti'),(3,'Nuovi pazienti','18',46,'Ultimi 30 giorni'),(4,'Incasso medio','€ 50,22',63,'Per prestazione') ON DUPLICATE KEY UPDATE label=VALUES(label),value_display=VALUES(value_display),width_value=VALUES(width_value),detail=VALUES(detail);
INSERT INTO notifications (id,active,title) VALUES (1,1,'Documento da firmare'),(2,1,'Pagamento'),(3,1,'Scadenza') ON DUPLICATE KEY UPDATE active=VALUES(active);
INSERT INTO session_demo (id,active) VALUES (1,1) ON DUPLICATE KEY UPDATE active=VALUES(active);
INSERT INTO structure_settings (id,name,vat_number,phone,email,address) VALUES (1,'Centro Salute & Benessere','IT 01234567890','+39 06 1234 5678','segreteria@centrosalute.it','Via Roma 25, Roma') ON DUPLICATE KEY UPDATE name=VALUES(name),vat_number=VALUES(vat_number),phone=VALUES(phone),email=VALUES(email),address=VALUES(address);
