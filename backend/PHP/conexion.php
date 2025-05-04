<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_datos = 'proyecto_grado';

    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

    /*Aqui especifico un control de errores para que, si a la hora de conectar la base de datos da fallos me saldra un error */ 

    if ($conexion-> connect_error) {
        die ("Error en la conexion: " . $conexion->connect_error);
    }

 
?>