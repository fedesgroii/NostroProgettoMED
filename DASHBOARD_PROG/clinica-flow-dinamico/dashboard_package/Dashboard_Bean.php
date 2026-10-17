<?php
// [BEAN/DTO - Dashboard] Dichiara tipizzazione stretta.
declare(strict_types=1);

// [BEAN/DTO - Dashboard] Trasporta la risposta della Dashboard al ControllerGrafico.
final class Dashboard_Bean
{
    // [BEAN/DTO - Dashboard] Costruisce il DTO.
    public function __construct(
        // [BEAN/DTO - Dashboard] Trasporta il profilo utente.
        public readonly array $utente,
        // [BEAN/DTO - Dashboard] Trasporta le statistiche.
        public readonly array $statistiche,
        // [BEAN/DTO - Dashboard] Trasporta gli appuntamenti.
        public readonly array $appuntamenti,
        // [BEAN/DTO - Dashboard] Trasporta le scadenze.
        public readonly array $scadenze,
        // [BEAN/DTO - Dashboard] Trasporta il grafico incassi.
        public readonly array $andamentoIncassi
    ) {}

    // [BEAN/DTO - Dashboard] Converte il DTO in array JSON.
    public function toArray(): array
    {
        // [BEAN/DTO - Dashboard] Restituisce il payload completo.
        return get_object_vars($this);
    }
}
