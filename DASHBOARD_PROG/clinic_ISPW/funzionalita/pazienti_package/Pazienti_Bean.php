<?php
// [BEAN/DTO - Pazienti] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Pazienti] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\pazienti_package;
// [BEAN/DTO - Pazienti] Incapsula i dati che attraversano il confine Browser/ControllerApplicativo.
final class Pazienti_Bean
{
    // [BEAN/DTO - Pazienti] Dichiara il campo operazione del DTO.
    public mixed $operazione;
// [BEAN/DTO - Pazienti] Dichiara il campo nome del DTO.
    public mixed $nome;
// [BEAN/DTO - Pazienti] Dichiara il campo cognome del DTO.
    public mixed $cognome;
// [BEAN/DTO - Pazienti] Dichiara il campo telefono del DTO.
    public mixed $telefono;
// [BEAN/DTO - Pazienti] Dichiara il campo email del DTO.
    public mixed $email;
// [BEAN/DTO - Pazienti] Dichiara il campo professionistaId del DTO.
    public mixed $professionistaId;
    // [BEAN/DTO - Pazienti] Costruisce il DTO server-side con i dati del browser.
    public function __construct(string|int|null $operazione = null, string|int|null $nome = null, string|int|null $cognome = null, string|int|null $telefono = null, string|int|null $email = null, string|int|null $professionistaId = null)
    {
        // [BEAN/DTO - Pazienti] Memorizza il campo operazione ricevuto dal browser.
        $this->operazione = $operazione;
        // [BEAN/DTO - Pazienti] Memorizza il campo nome ricevuto dal browser.
        $this->nome = $nome;
        // [BEAN/DTO - Pazienti] Memorizza il campo cognome ricevuto dal browser.
        $this->cognome = $cognome;
        // [BEAN/DTO - Pazienti] Memorizza il campo telefono ricevuto dal browser.
        $this->telefono = $telefono;
        // [BEAN/DTO - Pazienti] Memorizza il campo email ricevuto dal browser.
        $this->email = $email;
        // [BEAN/DTO - Pazienti] Memorizza il campo professionistaId ricevuto dal browser.
        $this->professionistaId = $professionistaId;
    }
    // [BEAN/DTO - Pazienti] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Pazienti] Legge il campo operazione dal payload del ControllerGrafico.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo nome dal payload del ControllerGrafico.
        $nome = $dati['nome'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo cognome dal payload del ControllerGrafico.
        $cognome = $dati['cognome'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo telefono dal payload del ControllerGrafico.
        $telefono = $dati['telefono'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo email dal payload del ControllerGrafico.
        $email = $dati['email'] ?? null;
        // [BEAN/DTO - Pazienti] Legge il campo professionistaId dal payload del ControllerGrafico.
        $professionistaId = $dati['professionistaId'] ?? null;
        // [BEAN/DTO - Pazienti] Restituisce l'istanza DTO tipizzata.
        return new self($operazione, $nome, $cognome, $telefono, $email, $professionistaId);
    }
}
