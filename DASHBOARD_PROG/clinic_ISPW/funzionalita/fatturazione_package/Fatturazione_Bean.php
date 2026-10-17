<?php
// [BEAN/DTO - Fatturazione] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Fatturazione] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\fatturazione_package;
// [BEAN/DTO - Fatturazione] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Fatturazione_Bean
{
    // [BEAN/DTO - Fatturazione] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Fatturazione] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Fatturazione] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Fatturazione] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Fatturazione] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Fatturazione] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}
