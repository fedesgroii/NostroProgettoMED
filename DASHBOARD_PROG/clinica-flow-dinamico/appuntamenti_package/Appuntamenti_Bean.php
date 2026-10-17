<?php
// [BEAN/DTO - Appuntamenti] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Appuntamenti] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Appuntamenti_Bean
{
    // [BEAN/DTO - Appuntamenti] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Appuntamenti] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Appuntamenti] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
