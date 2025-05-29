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
   // $servidor = 'sql201.infinityfree.com';
   // $usuario = 'if0_39069094';
    //$contrasena = 'xd1Cn9rToOH';
    //$base_datos = 'if0_39069094_proyecto_grado';
   

?>

