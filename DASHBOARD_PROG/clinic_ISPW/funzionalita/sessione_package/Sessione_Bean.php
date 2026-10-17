<?php
// [BEAN/DTO - Sessione] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Sessione] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\sessione_package;
// [BEAN/DTO - Sessione] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Sessione_Bean
{
    // [BEAN/DTO - Sessione] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Sessione] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Sessione] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Sessione] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Sessione] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Sessione] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}
