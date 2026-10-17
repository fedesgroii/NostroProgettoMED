<?php
// [BEAN/DTO - Pazienti] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Pazienti] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Pazienti_Bean
{
    // [BEAN/DTO - Pazienti] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Pazienti] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Pazienti] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
