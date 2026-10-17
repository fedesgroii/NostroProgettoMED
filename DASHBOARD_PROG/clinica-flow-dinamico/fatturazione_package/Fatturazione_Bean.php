<?php
// [BEAN/DTO - Fatturazione] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Fatturazione] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Fatturazione_Bean
{
    // [BEAN/DTO - Fatturazione] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Fatturazione] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Fatturazione] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
