<?php
// [BEAN/DTO - CartelleCliniche] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - CartelleCliniche] Trasporta il risultato della funzionalità al ControllerGrafico.
final class CartelleCliniche_Bean
{
    // [BEAN/DTO - CartelleCliniche] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - CartelleCliniche] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - CartelleCliniche] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
