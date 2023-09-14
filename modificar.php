<?php
include "conexion.php";
session_start();

$IdUsuario =$_SESSION['IdUsuario'];
$folioPago=$_GET['folioPago'] ?? null;

if($dbh!=null)
    {
		if($IdUsuario&& $folioPago){
        //Query
        $sql = "SELECT * FROM pagos WHERE folioPago = :folioPago";
        $resultado = $dbh-> prepare($sql);
        $resultado->bindParam(':folioPago',$folioPago );

        $resultado->execute();
		$datos= $resultado->fetch(PDO::FETCH_ASSOC);

        //Se cierra la BD    
        $dbh=null;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<title>Modificar registros</title>
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
  <h2>Formulario de modificación</h2>
  <p>Rellena todos los campos correctamente.</p>
  <form class="row g-4" id="registrarForm" method="POST" action="actualizar.php?folioPago=<?php echo $folioPago; ?>">
  <div class="col-md-4"> 
  <label>Folio pago:</label><input type="text" value="<?php echo $datos['folioPago']; ?>" name="folioPago">
	</div>
    <div class="col-md-4"> 
		<label>Id de usuario:</label><input type="text" value="<?php echo $datos['IdUsuario']; ?>" name="IdUsuario">
    </div>

    <div class="col-md-4"> 
		<label>Concepto:</label><input type="text" value="<?php echo $datos['concepto']; ?>" name="concepto">
    </div>
    <div class="col-md-4"> 
		<label>Monto:</label><input type="text" value="<?php echo $datos['monto']; ?>" name="monto">
    </div>

    <div class="col-md-4"> 
		<label>Fecha pago:</label><input type="text" value="<?php echo $datos['fechaPago']; ?>" name="fechaPago">
    </div>
    <div> <button type="submit" class="btn btn-warning">Modificar</button> </div>
	<div><a class="btn btn-info" href="index.php">Regresar a inicio</a> </div>
  </form>
</div>
<!--Formulario-->

</body>
</html>