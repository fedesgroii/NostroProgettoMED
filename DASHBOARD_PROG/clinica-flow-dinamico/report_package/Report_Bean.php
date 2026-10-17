<?php
// [BEAN/DTO - Report] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Report] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Report_Bean
{
    // [BEAN/DTO - Report] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Report] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Report] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
