<?php
// [BEAN/DTO - Notifiche] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Notifiche] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\notifiche_package;
// [BEAN/DTO - Notifiche] Rappresenta il passaggio dati tra ControllerGrafico e ControllerApplicativo.
final class Notifiche_Bean
{
    // [BEAN/DTO - Notifiche] Dichiara il campo operazione del DTO server della funzionalità.
    public mixed $operazione;
    // [BEAN/DTO - Notifiche] Costruisce il DTO con i dati ricevuti.
    public function __construct(mixed $operazione = null)
    {
        // [BEAN/DTO - Notifiche] Memorizza il campo operazione ricevuto dal ControllerGrafico.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Notifiche] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Notifiche] Legge il campo operazione dal JSON del Browser.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Notifiche] Restituisce il DTO pronto per il ControllerApplicativo.
        return new self($operazione);
    }
}
