<?php
// [BEAN/DTO - Documenti] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Documenti] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Documenti_Bean
{
    // [BEAN/DTO - Documenti] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Documenti] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Documenti] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
