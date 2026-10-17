# Backend PHP/MySQL

Il backend espone un front controller tecnico in `public/index.php` che instrada il parametro `funzione` verso il `*_ControlApp.php` dello stesso package.

Ogni package server segue:

```text
Bean PHP → ControlApp → Model → DAO → PDO/MySQL
```

Il `ControlApp` è il punto di coordinamento; non esiste un Service/Repository di business intermedio.

Il PDO viene creato una sola volta in `backend/bootstrap.php` e iniettato nei DAO.
