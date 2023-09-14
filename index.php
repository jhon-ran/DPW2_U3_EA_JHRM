<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Inicio</title>
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

<h2 class="text-center">Torres Tlalpan</h2>
<!--Carrusel-->
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <a href="areas.php">
            <img src="img/jardines.jpg" class="d-block w-100" alt="">
        </a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Áreas verdes</h5>
      </div>
    </div>

    <div class="carousel-item">
        <a href="salon.php">
            <img src="img/salon.jpg" class="d-block w-100" alt="...">
        </a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Salón de eventos</h5>
      </div>
    </div>

    <div class="carousel-item">
        <a href="gimnasio.php">
            <img src="img/gimnasio.jpg" class="d-block w-100" alt="...">
        </a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Gimnasio</h5>
      </div>
    </div>

      <div class="carousel-item">
        <a href="ludoteca.php">
            <img src="img/ludoteca.jpg" class="d-block w-100" alt="...">
        </a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Ludoteca</h5>
      </div>
    </div>

    <div class="carousel-item">
        <a href="negocios.php">
            <img src="img/centro.jpg" class="d-block w-100" alt="...">
        </a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Centro de negocios</h5>
      </div>
    </div>

    <div class="carousel-item">
        <a href="terraza.php">
            <img src="img/terraza.jpg" class="d-block w-100" alt="...">
        </a>
      <div class="carousel-caption d-none d-md-block">
        <h5>Terraza</h5>
      </div>
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!--Carrusel-->

<h2 class="text-center">Los modelos de departamentos</h2>
<!--Tabla 1-->
<div class="card-group">
  <div class="card">
    <img src="img/apt1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">$2,500,000</h5>
      <p class="card-text">Incluye muebles de línea blanca básica.</p>
      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="img/apt2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">$4,000,000</h5>
      <p class="card-text">Incluye muebles premium de línea blanca, espacio de estacionamiento y acceso VIP con elevavador propio.</p>
      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="img/apt3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">$3,500,000</h5>
      <p class="card-text">Incluye muebles premium de línea blanca y espacio de estacionamiento.</p>
      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
<!--Tabla 1-->

<h2 class="text-center">Testimonios</h2>
<!--Tabla 2-->
<div class="card-group">
  <div class="card">
    <img src="img/inquilino1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">No me cambiaría por nada del mundo. La mejor decisión</p>
    </div>
  </div>
  <div class="card">
    <img src="img/inquilino2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">El espacio y la comunidad son perfectos</p>

    </div>
  </div>
  <div class="card">
    <img src="img/inquilino3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">Me siento segura y cómoda siempre. El mejor lugar para vivir</p>
    </div>
  </div>
</div>
<!--Tabla 2-->

</body>
</html>