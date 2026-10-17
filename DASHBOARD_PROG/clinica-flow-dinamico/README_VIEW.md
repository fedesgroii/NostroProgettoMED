# ClinicaFlow - View separate per funzionalità

Questa variante aggiunge una View separata per ogni voce della sidebar.

## Flusso attuale del frontend

```text
Browser
  -> Navigazione_ControlGrafico
  -> Feature_ControlGrafico
  -> Feature_View
```

Il `Feature_ControlGrafico` monta la propria View nel contenitore `#contenitorePagine`.

## View presenti

- `dashboard_package/Dashboard_View.js`
- `appuntamenti_package/Appuntamenti_View.js`
- `pazienti_package/Pazienti_View.js`
- `cartelle_cliniche_package/CartelleCliniche_View.js`
- `documenti_package/Documenti_View.js`
- `fatturazione_package/Fatturazione_View.js`
- `tasse_package/Tasse_View.js`
- `report_package/Report_View.js`
- `staff_package/Staff_View.js`
- `impostazioni_package/Impostazioni_View.js`

## Come studiarle

Per ogni funzionalità aprire prima `*_View.js`, poi `*_ControlGrafico.js`, quindi il `*_Bean.js`, il `*_ControlApp.php`, il `*_Model.php` e infine il `*_DAO.php`.

Le View mantengono la struttura grafica originale. I dati business delle schermate diverse dalla Dashboard sono ancora interfacce di lavoro: il passo successivo consiste nel sostituire progressivamente i valori demo con renderizzazione da Bean/DTO.

## Avvio locale

Usare un server HTTP locale, ad esempio:

```bash
php -S localhost:8000
```

Poi aprire `http://localhost:8000/`.

I moduli JavaScript ES sono caricati con `type="module"`, quindi non è consigliato aprire il file con `file://`.
