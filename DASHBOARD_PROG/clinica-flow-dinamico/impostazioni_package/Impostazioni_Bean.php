<?php
// [BEAN/DTO - Impostazioni] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Impostazioni] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Impostazioni_Bean
{
    // [BEAN/DTO - Impostazioni] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Impostazioni] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Impostazioni] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
