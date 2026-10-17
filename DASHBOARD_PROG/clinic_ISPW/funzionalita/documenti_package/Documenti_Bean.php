<?php
// [BEAN/DTO - Documenti] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Documenti] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\documenti_package;
// [BEAN/DTO - Documenti] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Documenti_Bean
{
    // [BEAN/DTO - Documenti] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Documenti] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Documenti] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Documenti] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Documenti] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Documenti] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}
