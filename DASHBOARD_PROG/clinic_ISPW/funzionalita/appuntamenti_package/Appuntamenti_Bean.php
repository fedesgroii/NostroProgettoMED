<?php
// [BEAN/DTO - Appuntamenti] Abilita i tipi stretti del DTO server.
declare(strict_types=1);
// [BEAN/DTO - Appuntamenti] Colloca il DTO nel package della funzionalità.
namespace ClinicaFlow\appuntamenti_package;
// [BEAN/DTO - Appuntamenti] Incapsula i dati che attraversano il confine Browser/ControllerApplicativo.
final class Appuntamenti_Bean
{
    // [BEAN/DTO - Appuntamenti] Dichiara il campo operazione del DTO.
    public mixed $operazione;
// [BEAN/DTO - Appuntamenti] Dichiara il campo id del DTO.
    public mixed $id;
// [BEAN/DTO - Appuntamenti] Dichiara il campo data del DTO.
    public mixed $data;
// [BEAN/DTO - Appuntamenti] Dichiara il campo orario del DTO.
    public mixed $orario;
// [BEAN/DTO - Appuntamenti] Dichiara il campo durata del DTO.
    public mixed $durata;
// [BEAN/DTO - Appuntamenti] Dichiara il campo pazienteId del DTO.
    public mixed $pazienteId;
// [BEAN/DTO - Appuntamenti] Dichiara il campo professionistaId del DTO.
    public mixed $professionistaId;
// [BEAN/DTO - Appuntamenti] Dichiara il campo tipo del DTO.
    public mixed $tipo;
    // [BEAN/DTO - Appuntamenti] Costruisce il DTO server-side con i dati del browser.
    public function __construct(string|int|null $operazione = null, string|int|null $id = null, string|int|null $data = null, string|int|null $orario = null, string|int|null $durata = null, string|int|null $pazienteId = null, string|int|null $professionistaId = null, string|int|null $tipo = null)
    {
        // [BEAN/DTO - Appuntamenti] Memorizza il campo operazione ricevuto dal browser.
        $this->operazione = $operazione;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo id ricevuto dal browser.
        $this->id = $id;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo data ricevuto dal browser.
        $this->data = $data;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo orario ricevuto dal browser.
        $this->orario = $orario;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo durata ricevuto dal browser.
        $this->durata = $durata;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo pazienteId ricevuto dal browser.
        $this->pazienteId = $pazienteId;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo professionistaId ricevuto dal browser.
        $this->professionistaId = $professionistaId;
        // [BEAN/DTO - Appuntamenti] Memorizza il campo tipo ricevuto dal browser.
        $this->tipo = $tipo;
    }
    // [BEAN/DTO - Appuntamenti] Ricostruisce il DTO dal payload JSON.
    public static function daArray(array $dati): self
    {
        // [BEAN/DTO - Appuntamenti] Legge il campo operazione dal payload del ControllerGrafico.
        $operazione = $dati['operazione'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo id dal payload del ControllerGrafico.
        $id = $dati['id'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo data dal payload del ControllerGrafico.
        $data = $dati['data'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo orario dal payload del ControllerGrafico.
        $orario = $dati['orario'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo durata dal payload del ControllerGrafico.
        $durata = $dati['durata'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo pazienteId dal payload del ControllerGrafico.
        $pazienteId = $dati['pazienteId'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo professionistaId dal payload del ControllerGrafico.
        $professionistaId = $dati['professionistaId'] ?? null;
        // [BEAN/DTO - Appuntamenti] Legge il campo tipo dal payload del ControllerGrafico.
        $tipo = $dati['tipo'] ?? null;
        // [BEAN/DTO - Appuntamenti] Restituisce l'istanza DTO tipizzata.
        return new self($operazione, $id, $data, $orario, $durata, $pazienteId, $professionistaId, $tipo);
    }
}
