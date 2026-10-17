<?php
// [BEAN/DTO - CartelleCliniche] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - CartelleCliniche] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\cartelle_cliniche_package;
// [BEAN/DTO - CartelleCliniche] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class CartelleCliniche_Bean
{
    // [BEAN/DTO - CartelleCliniche] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - CartelleCliniche] Dichiara il campo pazienteId del DTO server della funzionalità.
    public mixed $pazienteId;
    // [BEAN/DTO - CartelleCliniche] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null, mixed $pazienteId = null)
    {
        // [BEAN/DTO - CartelleCliniche] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
        // [BEAN/DTO - CartelleCliniche] Memorizza il campo pazienteId ricevuto dal ControllerGrafico.
        $this->pazienteId = $pazienteId;
    }
    // [BEAN/DTO - CartelleCliniche] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - CartelleCliniche] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - CartelleCliniche] Legge il campo pazienteId dal JSON del Browser.
        $pazienteId = $dati['pazienteId'] ?? null;
        // [BEAN/DTO - CartelleCliniche] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione, $pazienteId);
    }
}
