<?php
// [BEAN/DTO - Impostazioni] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Impostazioni] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\impostazioni_package;
// [BEAN/DTO - Impostazioni] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Impostazioni_Bean
{
    // [BEAN/DTO - Impostazioni] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Impostazioni] Dichiara il campo name del DTO server della funzionalità.
    public mixed $name;
    // [BEAN/DTO - Impostazioni] Dichiara il campo vat del DTO server della funzionalità.
    public mixed $vat;
    // [BEAN/DTO - Impostazioni] Dichiara il campo phone del DTO server della funzionalità.
    public mixed $phone;
    // [BEAN/DTO - Impostazioni] Dichiara il campo email del DTO server della funzionalità.
    public mixed $email;
    // [BEAN/DTO - Impostazioni] Dichiara il campo address del DTO server della funzionalità.
    public mixed $address;
    // [BEAN/DTO - Impostazioni] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null, mixed $name = null, mixed $vat = null, mixed $phone = null, mixed $email = null, mixed $address = null)
    {
        // [BEAN/DTO - Impostazioni] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
        // [BEAN/DTO - Impostazioni] Memorizza il campo name ricevuto dal ControllerGrafico.
        $this->name = $name;
        // [BEAN/DTO - Impostazioni] Memorizza il campo vat ricevuto dal ControllerGrafico.
        $this->vat = $vat;
        // [BEAN/DTO - Impostazioni] Memorizza il campo phone ricevuto dal ControllerGrafico.
        $this->phone = $phone;
        // [BEAN/DTO - Impostazioni] Memorizza il campo email ricevuto dal ControllerGrafico.
        $this->email = $email;
        // [BEAN/DTO - Impostazioni] Memorizza il campo address ricevuto dal ControllerGrafico.
        $this->address = $address;
    }
    // [BEAN/DTO - Impostazioni] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Impostazioni] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo name dal JSON del Browser.
        $name = $dati['name'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo vat dal JSON del Browser.
        $vat = $dati['vat'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo phone dal JSON del Browser.
        $phone = $dati['phone'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo email dal JSON del Browser.
        $email = $dati['email'] ?? null;
        // [BEAN/DTO - Impostazioni] Legge il campo address dal JSON del Browser.
        $address = $dati['address'] ?? null;
        // [BEAN/DTO - Impostazioni] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione, $name, $vat, $phone, $email, $address);
    }
}
