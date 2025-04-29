<?php

session_start();

include_once '../../../Administradores/CONEXION/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    $consulta = "SELECT * FROM usuarios where nombre_usuario = '$nombre_usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if(mysqli_num_rows($resultado) > 0){
        $usuario = mysqli_fetch_assoc($resultado); /*Obtengo los datos del usuario y los guardo en la variable usuario*/ 

        if(password_verify($contrasena, $usuario['contraseña'])){ /*Verifico si la contraseña que se ha introducido coincide con la encriptada almacenada en la base de datos*/
            /*Guardo tanto el nombre como el rol del usuario para poder personalizar mas la experiencia del usuario (Como por ejemplo poner el nombre por pantalla del usuario) o el rol (Por si un rol es administrador tener unas acciones o si es un usuario normal tener otras)*/ 
            $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['id_rol'] = $usuario['id_rol'];

            /*Si el usuario es un administrador lo redirijire a una pagina en la que solo ellos tendran acceso*/
            if($usuario['id_rol'] == '1'){
                header('Location: ../../../administradores/INICIO/PHP/Inicio.php');
            } else {
                header('Location: ../../../usuarios/INICIO/PHP/Inicio.php');
            }
        } else {
            echo '<script>
            alert("La contraseña no es correcta. Intentalo de nuevo");
            window.location.href="../HTML/sesion.html";
            </script>
            ';
        } 
    } else {
        echo '<script>
        alert("El usuario introducido no existe. Pruebe con otro");
        window.location.href="../HTML/sesion.html";
        </script>
        ';
     
    }
}

?>

