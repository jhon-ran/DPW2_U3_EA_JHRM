<?php
include "conexion.php";
session_start();

$IdUsuario =$_SESSION['IdUsuario'];

if($dbh!=null)
    {
 

        
        //Query para usuario AD
        $sqlAD = "SELECT * FROM pagos";
        $resultadoAD = $dbh-> prepare($sqlAD);
        $resultadoAD->execute();

        //Recorrer registros y guardarlos en array
        while($registroAD=$resultadoAD->fetch(PDO::FETCH_ASSOC)){
            $pagosAD[]= $registroAD;
    }

        //Query para usuario CO
        $sql = "SELECT * FROM pagos WHERE IdUsuario = :IdUsuario";
        $resultado = $dbh-> prepare($sql);
        $resultado->bindParam(':IdUsuario',$IdUsuario );
        $resultado->execute();

            //Recorrer registros y guardarlos en array
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                $pagos[]= $registro;
        }


        //Se cierra la BD    
        $dbh=null;
    }

else 
    {
        echo "No se pudo establecer conexión con la base de datos";
    }

//return $resultado;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Consultar inscripción</title>
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


<?php if($_SESSION['tipoUsuario']=='AD'):?>
                <h4 class="text-center">
                    <?php echo "Nombre: ".$_SESSION['nombre']." ".$_SESSION['aPaterno']." ".$_SESSION['aMaterno']; ?>
                </h4>
                <h4 class="text-center">
                    <?php echo "Tipo de usuario: ".$_SESSION['tipoUsuario']; ?>                   
                </h4>
                    
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Folio</th>
                            <th scope="col">Concepto</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>

                        <?php foreach($pagosAD as $pagoAD):?>
                        <tbody>
                            <tr>
                            <td scope="row"> <?php echo $pagoAD['folioPago'];?> </td>
                            <td scope="row"> <?php echo $pagoAD['concepto'];?> </td>                            
                            <td scope="row"> <?php echo  $pagoAD['monto'];?> </td>
                            <td scope="row"> <?php echo $pagoAD['fechaPago'];?> </td>
                            <td scope="row">
                                <a class="btn btn-warning" href="modificar.php?folioPago=<?php echo $pagoAD['folioPago']; ?>">Modificar</a>
                            </td>
                            <td scope="row">
								<a class="btn btn-danger" href="eliminar.php?folioPago=<?php echo $pagoAD['folioPago']; ?>">Eliminar</a>
                            </td>
                            </tr>
                        </tbody>
                            <?php endforeach; ?>
                    </table>
       
            <?php else:?>
                    
                <h4 class="text-center">
                    <?php echo "Nombre: ".$_SESSION['nombre']." ".$_SESSION['aPaterno']." ".$_SESSION['aMaterno']; ?>
                </h4>
                <h4 class="text-center">
                    <?php echo "Tipo de usuario: ".$_SESSION['tipoUsuario']; ?>                   
                </h4>
                    
                    <?php if($pagos!=null):?>
                    
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Folio</th>
                                <th scope="col">Concepto</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>

                            <?php foreach($pagos as $pago):?>
                        <tbody>
                            <tr>
                                <td scope="row"> <?php echo $pago['folioPago'];?> </td>
                                <td scope="row"> <?php echo $pago['concepto'];?> </td>
                                <td scope="row"> <?php echo  $pago['monto'];?> </td>
                                <td scope="row"> <?php echo $pago['fechaPago'];?> </td>
                            </tr>
                        </tbody>
                            <?php endforeach; ?>
                        </table>
                    <?php else:?>
                        <?php echo "No hay pagos registrados para este usuario todavía" ?>  
                    <?php endif; ?>
            <?php endif; ?>


</body>
</html>