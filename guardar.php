<?php
include "conexion.php";

$IdUsuario=$_POST['IdUsuario'];
$nombre=$_POST['nombre'];
$aPaterno=$_POST['aPaterno'];
$aMaterno=$_POST['aMaterno'];
$departamento=$_POST['departamento'];
$tipoUsuario='CO';
$password=$_POST['password'];
$confirma=$_POST['confirma'];


//Variables para validar password
$mayus    = preg_match('@[A-Z]@', $password);
$minus    = preg_match('@[a-z]@', $password);
$num       = preg_match('@[0-9]@', $password);
$cEspecial = preg_match('@[^\w]@', $password);

//query para buscar el ide de usuario en bd
$validar = "SELECT * FROM usuarios WHERE IdUsuario=$IdUsuario";
$validando = $dbh->query($validar);

if($dbh!=null)
{
    //VALIDACIONES:
    //Que no hay inputs vacios
    if($IdUsuario =='' || $nombre =='' || $aPaterno =='' || $aMaterno =='' || $departamento =='' || $password =='' || $confirma =='')
    {
        echo "<script> alert('Ningún campo puede estar vacio')</script>";
    //Contraseña y confirmación son iguales
    }elseif ($password != $confirma){
        echo "<script> alert('La contraseña y la confirmación deben ser iguales')</script>";
    //formato de password que contenga una mayuscula, una minuscula, un numero, un caracter especial y que tenga 8 caracteres
    }elseif (!$mayus || !$minus || !$num || !$cEspecial || strlen($password) < 8){
        echo "<script> alert('La contraseña debe tener una longitud mínima de 8 posiciones, con una combinación de letras y números y por lo menos un carácter especial')</script>";
        
    //usuario no existe en BD
    }elseif ($validando->rowCount() > 0)
    {
        echo "<script> alert('El id $IdUsuario ya existe en el sistema')</script>";
        echo '<META HTTP-EQUIV="Refresh" CONTENT="1;URL=index.php">';
    }else{

    //echo "<script> alert('No hay query a la base de datos')</script>";
    //Si todas las validaciones pasan, se inserta el registro en la BD
    $stmt = $dbh-> prepare("INSERT INTO usuarios(IdUsuario,nombre,aPaterno,aMaterno,departamento,tipoUsuario,password) 
    VALUES(?,?,?,?,?,?,?)");

    $stmt->bindParam(1,$IdUsuario);
    $stmt->bindParam(2,$nombre);
    $stmt->bindParam(3,$aPaterno);
    $stmt->bindParam(4,$aMaterno);
    $stmt->bindParam(5,$departamento);
    $stmt->bindParam(6,$tipoUsuario);
    $stmt->bindParam(7,$password);

    $stmt->execute();
    echo "Se registro correctamente el usuario $nombre $aPaterno $aMaterno";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="1;URL=index.php">';
    $dbh=null;

}


}else {
    echo "No se pudo establecer conexión con la base de datos";
}

?>