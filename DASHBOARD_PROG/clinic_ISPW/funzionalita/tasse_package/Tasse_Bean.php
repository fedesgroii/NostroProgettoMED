<?php
// [BEAN/DTO - Tasse] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Tasse] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\tasse_package;
// [BEAN/DTO - Tasse] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Tasse_Bean
{
    // [BEAN/DTO - Tasse] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Tasse] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Tasse] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Tasse] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Tasse] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Tasse] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}
