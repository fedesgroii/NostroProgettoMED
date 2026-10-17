<?php
// [BEAN/DTO - Dashboard] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Dashboard] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\dashboard_package;
// [BEAN/DTO - Dashboard] Incapsula i dati che attraversano il confine Browser/ControllerApplicativo.
final class Dashboard_Bean
{
    // [BEAN/DTO - Dashboard] Dichiara il campo operazione del DTO.
    public mixed $operazione;
    // [BEAN/DTO - Dashboard] Costruisce il DTO server-side con i dati del browser.
    public function __construct(string|int|null $operazione = null)
    {
        // [BEAN/DTO - Dashboard] Memorizza il campo operazione ricevuto dal browser.
        $this->operazione = $operazione;
    }
    // [BEAN/DTO - Dashboard] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Dashboard] Legge il campo operazione dal payload del ControllerGrafico.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Dashboard] Restituisce l'istanza DTO tipizzata.
        return new self($operazione);
    }
}
