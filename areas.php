<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/condominio/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Áreas verdes</title>
</head>
<body>

<!--Navbar-->
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <?php if(!isset($_SESSION["tipoUsuario"])):?>
            <li class="nav-item">
            <a class="nav-link" href="registro.php">Registrarse</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="ingresar.php">Iniciar sesión</a>
        </li>

        <?php else:?>
            <li class="nav-item">
                <a class="nav-link" href="consulta.php">Consultar pagos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Salir</a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!--Navbar-->


    <h2>Áreas verdes</h2>
<!--Card-->
<div class="card mb-3">
  <img src="img\jardines.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Áreas verdes cuidadas y seguras para toda la familia.</p>
  </div>
</div>
<!--Card-->
</body>
</html>