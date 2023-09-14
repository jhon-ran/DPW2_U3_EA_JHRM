<?php
	include "conexion.php";
	$folioPago=$_GET['folioPago'];
	
	$folioPago=$_POST['folioPago'];
    $IdUsuario=$_POST['IdUsuario'];
    $concepto=$_POST['concepto'];
	$monto=$_POST['monto'];
    $fechaPago=$_POST['fechaPago'];
	
	
    $stmt = $dbh-> prepare("UPDATE pagos SET folioPago=:folioPago, IdUsuario=:IdUsuario, concepto=:concepto, monto=:monto, fechaPago=:fechaPago WHERE folioPago=:folioPago");

    $stmt->bindParam(':folioPago',$folioPago);
    $stmt->bindParam(':IdUsuario',$IdUsuario);
    $stmt->bindParam(':concepto',$concepto);
    $stmt->bindParam(':monto',$monto);
    $stmt->bindParam(':fechaPago',$fechaPago);

    $stmt->execute();
    header('location:consulta.php');
    echo '<script>alert("Se modificaron correctamento los campos")</script>';
    
    //header( "refresh:3;URL=location:consulta.php" );
?>