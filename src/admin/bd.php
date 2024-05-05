<?php

$servidor="localhost";
$baseDeDatos="websites";
$usuario="root";
$contrasenia="example";

$dsn = 'mysql:dbname=websites;host=mysql_db';
$user = 'root';
$password = 'root';


try{
    
    $conexion = new PDO($dsn, $user, $password);

    // $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos","$usuario","$contrasenia");

    //echo "Conexion realizada...";



}catch(Exception $error){
    echo $error->getMessage();
}
?>