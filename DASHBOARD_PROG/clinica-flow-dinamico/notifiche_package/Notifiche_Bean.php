<?php
// [BEAN/DTO - Notifiche] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Notifiche] Trasporta il risultato della funzionalità al ControllerGrafico.
final class Notifiche_Bean
{
    // [BEAN/DTO - Notifiche] Costruisce il DTO server.
    public function __construct(public readonly array $dati) {}

    // [BEAN/DTO - Notifiche] Converte il DTO in un array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Notifiche] Restituisce il payload senza modificarlo.
        return $this->dati;
    }
}
