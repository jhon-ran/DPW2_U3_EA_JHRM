<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Registro</title>
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

<!--Formulario-->
<div class="container">
  <h2>Formulario de registro</h2>
  <p>Rellena todos los campos correctamente.</p>
  <form class="row g-4" id="registrarForm" action="guardar.php" method="POST">
  <div class="col-12"> 
        <label for="IdUsuario">Id usuario</label>
        <input name="IdUsuario" type="text" id="IdUsuario" value="" required>
    </div>
    <div class="col-md-4"> 
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text" id="nombre" value="" required>
    </div>

    <div class="col-md-4"> 
        <label for="aPaterno">Apellido paterno</label>
        <input name="aPaterno" type="text" id="aPaterno" value="" required>
    </div>
    <div class="col-md-4"> 
        <label for="aMaterno">Apellido materno</label>
        <input name="aMaterno" type="text" id="aMaterno" value="" required>
    </div>

    <div class="col-md-4"> 
        <label for="departamento">Departamento</label>
        <input name="departamento" type="text" id="departamento" value="" required>
    </div>
    <div class="col-md-4"> 
        <label for="password">Contraseña</label>
        <input name="password" type="password" id="password" required>
    </div>
    <div class="col-md-4"> 
        <label for="confirma">Confirmar contraseña</label>
        <input name="confirma" type="password" id="confirma" required>
    </div>
    <div> <button type="submit" class="btn btn-success">Enviar</button> </div>
  </form>
</div>
<!--Formulario-->

    
</body>
</html>