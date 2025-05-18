<?php

include_once('funciones_login.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $comprobar = verificar_correo_usuario($conexion, $correo);
    if($comprobar){
        $update = actualizar_contrasena($conexion, $correo, $contrasena);
        if($update){
            echo '
            <script>
                alert("Contraseña actualizada correctamente");
                window.location.href="../HTML+PHP/index.php";
            </script>
            ';   
        } else {
            echo '
            <script>
                alert("Ups, ha ocurrido un error. Intentelo de nuevo");
                window.location.href="../HTML+PHP/index.php";
            </script>
            ';   
        }
    } else {
        echo '
        <script>
            alert("El correo introducido no tiene una cuenta. Intentelo de nuevo con otro correo");
        </script>
        ';
    }
}

?>