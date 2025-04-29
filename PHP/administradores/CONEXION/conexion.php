<?php
$server = 'localhost';
$username = 'root';
$password = '';
$base_datos = 'proyecto_grado';

$conexion = new mysqli($server, $username, $password, $base_datos);

/*Aqui especifico un control de errores para que, si a la hora de conectar la base de datos da fallos me saldra un error */ 

if(!$conexion) {
    echo ('No se puede conectarse:'. mysqli_connect_error());
}

?>