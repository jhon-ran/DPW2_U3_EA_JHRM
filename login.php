<?php
include "conexion.php";
session_start();


$IdUsuario =$_POST['IdUsuario'];
$password=$_POST['password'];

if($dbh!=null)
    {
        $stmt = $dbh-> prepare("SELECT IdUsuario, nombre, aPaterno, aMaterno, departamento, tipoUsuario FROM usuarios
        WHERE IdUsuario =:IdUsuario  AND password=:password");

        $stmt->bindParam(':IdUsuario',$IdUsuario  );
        $stmt->bindParam(':password',$password);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        $datos=$stmt->fetch();

            //Condición para evitar error cuando no haya registro en la bd y regrese un false
            if(is_array($datos)){

                if($datos['IdUsuario']==!NULL)
                {
                    $_SESSION['IdUsuario']=$datos['IdUsuario'];
                    $_SESSION['nombre']=$datos['nombre'];
                    $_SESSION['aPaterno']=$datos['aPaterno'];
                    $_SESSION['aMaterno']=$datos['aMaterno'];
                    $_SESSION['departamento']=$datos['departamento'];
                    $_SESSION['tipoUsuario']=$datos['tipoUsuario'];

                    if($_SESSION['tipoUsuario']=='AD')
                        {
                            $_SESSION['usuario']='administrador';
                        }    
                    else
                        {
                            $_SESSION['usuario']='condomino';
                        }
                    
                    echo "¡Bienvenido ".$_SESSION['nombre']." ".$_SESSION['aPaterno']." ".$_SESSION['aMaterno']." ¡Has ingresado como ".$_SESSION['usuario']."!";

                    echo '<META HTTP-EQUIV="Refresh" CONTENT="1;URL=ingresar.php">';
                    
                }
        }
    else {
        echo "Usuario no encontrado";
        echo '<META HTTP-EQUIV="Refresh" CONTENT="1;URL=ingresar.php">';
      }
        $dbh=null;
    }

else 
    {
        echo "No se pudo establecer conexión con la base de datos";
    }

?>