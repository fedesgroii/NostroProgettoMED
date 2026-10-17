<?php
// [BEAN/DTO - Sessione] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Sessione] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Sessione_Bean
{
    // [BEAN/DTO - Sessione] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Sessione] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Sessione] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
