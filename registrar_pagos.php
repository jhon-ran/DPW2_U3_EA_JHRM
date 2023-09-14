<?php
include "conexion.php";
session_start();

$IdUsuario =$_SESSION['IdUsuario'];

if($dbh!=null)
    {
        
        //Query para usuario AD
        $sql = "SELECT * FROM usuarios";
        $resultado = $dbh-> prepare($sql);
        $resultado->execute();

        //Recorrer registros y guardarlos en array
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            $usuarios[]= $registro;
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
    <link rel="stylesheet" href="style.css">
    <title>Registrar pagos</title>
</head>
<body>
    
<nav>
    <ul>
        <li>
            <a href="index.php">Inicio</a>
        </li>
        <?php if(!isset($_SESSION["tipoUsuario"])):?>
                 <li>
                    <a href="registro.php">Registrarse</a>
                </li>
                <li>
                    <a href="ingresar.php">Iniciar sesión</a>
                </li>
    
        <?php else:?>
                <li>
                    <a href="logout.php">Salir</a>
                </li>
        <?php endif; ?>
</nav>



<?php if($_SESSION['tipoUsuario']=='AD'):?>
                    <p>
                    <?php echo "Nombre: ".$_SESSION['nombre']; ?>
                    </p>
                    <p>
                    <?php echo "Apellido paterno: ".$_SESSION['aPaterno']; ?>
                    </p>
                    <p>
                    <?php echo "Apellido materno: ".$_SESSION['aMaterno']; ?>
                    </p>
                    <?php echo "Ingresaste como: ".$_SESSION['tipoUsuario']; ?>                   
                    
                    </p>
                    
                    <table>
                        <tr>
                            <th>Id usuario</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Departamento</th>
                            <th>Registro</th>
                        </tr>

                        <?php foreach($usuarios as $usuario):?>
                            <tr>
                            <td> <?php echo $usuario['IdUsuario'];?> </td>
                            <td> <?php echo $usuario['nombre'];?> </td>                            
                            <td> <?php echo  $usuario['aPaterno'];?> </td>
                            <td> <?php echo $usuario['aMaterno'];?> </td>
                            <td> <?php echo $usuario['departamento'];?> </td>
                            <td>
                                <a href="guardar_pago.php?IdUsuario=<?php echo $usuario['IdUsuario']; ?>">Registrar pago</a>
                            </td>
                        </tr>
                            <?php endforeach; ?>
                    </table>
       
            <?php else:?>
                    
                <p>
                    <?php echo "Nombre: ".$_SESSION['nombre']; ?>
                    </p>
                    <p>
                    <?php echo "Apellido paterno: ".$_SESSION['aPaterno']; ?>
                    </p>
                    <p>
                    <?php echo "Apellido materno: ".$_SESSION['aMaterno']; ?>
                    </p>
                    <?php echo "Ingresaste como: ".$_SESSION['tipoUsuario']; ?>                   
                    
                    </p>
                    
                    <?php if($pagos!=null):?>
                    
                        <table>
                            <tr>
                                <th>Folio</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>

                            <?php foreach($pagos as $pago):?>
                                <tr>
                                <td> <?php echo $pago['folioPago'];?> </td>
                                <td> <?php echo $pago['concepto'];?> </td>
                                <td> <?php echo  $pago['monto'];?> </td>
                                <td> <?php echo $pago['fechaPago'];?> </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else:?>
                        <?php echo "No hay pagos registrados para este usuario todavía" ?>  
                    <?php endif; ?>
            <?php endif; ?>


</body>
</html>