<?php
// Conexion por localhost
    $servidor = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_datos = 'proyecto_grado';
    
    
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

    /*Aqui especifico un control de errores para que, si a la hora de conectar la base de datos da fallos me saldra un error */ 

    if ($conexion-> connect_error) {
        die ("Error en la conexion: " . $conexion->connect_error);
    }
    
 // Conexion mediante el dominio a traves de infinityfree.
    //$servidor = 'sql200.infinityfree.com';
    //$usuario = 'if0_39112688';
    //$contrasena = 'y8twAA6dCUy5H';
    //$base_datos = 'if0_39112688_proyecto_grado';
   

?>

