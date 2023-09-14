<?php
include "conexion.php";
session_start();

$IdUsuario=$_GET['IdUsuario'];
//$IdUsuario=$_POST['IdUsuario']?? null;

$folioPago=$_POST['folioPago'];
$IdUsuario=$_POST['IdUsuario'];
$concepto=$_POST['concepto'];
$monto=$_POST['monto'];
$fechaPago=$_POST['fechaPago'];


if($dbh!=null)
    {
	        //$sql = "SELECT * FROM pagos WHERE folioPago = :folioPago";
        //$resultado = $dbh-> prepare($sql);
        //$resultado->bindParam(':folioPago',$folioPago );

        //$resultado->execute();
		//$datos= $resultado->fetch(PDO::FETCH_ASSOC);

        $stmt = $dbh-> prepare("INSERT INTO pagos(folioPago, IdUsuario,concepto,monto,fechaPago) 
        VALUES(:folioPago,:IdUsuario,:concepto,:monto,:fechaPago)");

        $stmt->bindParam(':folioPago',$folioPago);
        $stmt->bindParam(':IdUsuario',$IdUsuario);
        $stmt->bindParam(':concepto',$concepto);
        $stmt->bindParam(':monto',$monto);
        $stmt->bindParam(':fechaPago',$fechaPago);

        $stmt->execute();
        
        //$datos= $stmt->fetch(PDO::FETCH_ASSOC);

                  //Recorrer registros y guardarlos en array
                  while($registro=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $datos[]= $stmt;
            }
       
    
		
        //Se cierra la BD    
        $dbh=null;
   
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registro de pagos</title>
</head>
<body>
	<h2>Registrar pago</h2>
	<form method="POST" action="actualizar.php?IdUsuario=<?php echo $IdUsuario; ?>">
		<label>Folio pago:</label><input type="text" value="<?php echo $datos['folioPago']; ?>" name="folioPago">
		<label>Id de usuario:</label><input type="text" value="<?php echo $datos['IdUsuario']; ?>" name="IdUsuario">
		<label>Concepto:</label><input type="text" value="<?php echo $datos['concepto']; ?>" name="concepto">
		<label>Monto:</label><input type="text" value="<?php echo $datos['monto']; ?>" name="monto">
		<label>Fecha pago:</label><input type="text" value="<?php echo $datos['fechaPago']; ?>" name="fechaPago">
		<input type="submit" name="modificar">
		<a href="index.php">Regresar</a>
	</form>



    <form id="registrarForm" action="guardar.php" method="POST">
    <div> <label for="IdUsuario">Id usuario</label>
        <input name="IdUsuario" type="text" id="IdUsuario" value="" required>
    </div>
    <div> <label for="nombre">Nombre</label>
        <input name="nombre" type="text" id="nombre" value="" required>
    </div>

    <div> <label for="aPaterno">Apellido paterno</label>
        <input name="aPaterno" type="text" id="aPaterno" value="" required>
    </div>
    <div> <label for="aMaterno">Apellido materno</label>
        <input name="aMaterno" type="text" id="aMaterno" value="" required>
    </div>

    <div> <label for="departamento">Departamento</label>
         <input name="departamento" type="text" id="departamento" value="" required>
    </div>
    <div> <label for="password">Contraseña</label>
        <input name="password" type="password" id="password" required>
    </div>
    <div> <label for="confirma">Confirmar contraseña</label>
        <input name="confirma" type="password" id="confirma" required>
    </div>
    <div> <button type="submit">Enviar</button> </div>

</form>

</body>
</html>