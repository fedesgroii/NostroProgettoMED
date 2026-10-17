<?php
// [BEAN/DTO - Staff] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Staff] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Staff_Bean
{
    // [BEAN/DTO - Staff] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Staff] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Staff] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
