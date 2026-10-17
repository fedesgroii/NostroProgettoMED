<?php
// [BEAN/DTO - Tasse] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Tasse] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Tasse_Bean
{
    // [BEAN/DTO - Tasse] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Tasse] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Tasse] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
