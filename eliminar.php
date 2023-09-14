<?php
	include "conexion.php";
	$folioPago=$_GET['folioPago'] ?? null;

	$stmt = $dbh-> prepare("DELETE from pagos WHERE folioPago=:folioPago");

    $stmt->bindParam(':folioPago',$folioPago);
    $stmt->execute();

	header('location:index.php');
?>