<?php
session_start();
include_once 'funciones_login.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    $usuario = verificar_nombre_usuario($conexion, $nombre_usuario);
    if($usuario){
        if(password_verify($contrasena, $usuario['contraseña'])){ /*Verifico si la contraseña que se ha introducido coincide con la encriptada almacenada en la base de datos*/
            guardar_datos($usuario);
            header('Location: ../HTML+PHP/Index.php');
        } else {
            echo '<script>
            alert("La contraseña no es correcta. Intentalo de nuevo");
            window.location.href="../HTML+PHP/sesion.php";
            </script>
            ';
        } 
    } else {
        echo '<script>
        alert("El usuario introducido no existe. Pruebe con otro");
        window.location.href="../HTML+PHP/sesion.php";
        </script>
        ';
        
    }
}
?>

