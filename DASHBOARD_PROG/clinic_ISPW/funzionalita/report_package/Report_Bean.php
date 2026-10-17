<?php
// [BEAN/DTO - Report] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Report] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\report_package;
// [BEAN/DTO - Report] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Report_Bean
{
    // [BEAN/DTO - Report] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Report] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Report] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Report] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Report] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Report] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}
