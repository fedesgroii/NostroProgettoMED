<?php
// [BEAN/DTO - Staff] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Staff] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\staff_package;
// [BEAN/DTO - Staff] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Staff_Bean
{
    // [BEAN/DTO - Staff] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Staff] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Staff] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Staff] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Staff] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Staff] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}
