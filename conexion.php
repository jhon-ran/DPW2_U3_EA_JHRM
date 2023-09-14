<?php
//Variables de conexion local
//$dbname="condominio";
//$user="root";
//$password="";


//Variables de conexion en línea
$dbname="id19804469_condo_edificio";
$user="id19804469_clase";
$password="Vaciar1*";

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);

    try {
        //For local host with port 3308
        //$dsn="mysql:host=localhost;port=3308;dbname=$dbname";
        //For local port and web deployment on regular port 3306
        $dsn="mysql:host=localhost;dbname=$dbname";
        $dbh=new PDO($dsn,$user,$password,$options);
        //echo "Conexión exitosa a la BD";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>
