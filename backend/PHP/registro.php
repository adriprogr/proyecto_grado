<?php
session_start();
include_once 'funciones_login.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];
    $rol = $_SESSION['id_rol'];
    //Guardo la funcion de consultar_usuarios en una variable 
    $consultar_usuarios = consultar_usuarios($conexion, $email, $nombre_usuario);
    if($consultar_usuarios){
        echo '
        <script>
            alert("Este correo o Nombre de usuario ya esta en uso. Pruebe con otro");
            window.location.href="../HTML+PHP/registro.php";
        </script>
        '; 
    } else {   
        if($rol == 1){ // Condicion para los administradores    
            $introducir_usuarios_admin = insertar_usuario_admin($conexion, $email, $nombre_usuario, $contrasena); /*Guardo la funcion de insertar a los usuarios admin en variable*/
            if($introducir_usuarios_admin){
                echo '
                <script>
                    alert("Usuario registrado correctamente. Ahora eres parte del grupo de administradores. Para tener opciones de editar, inicia sesion en la siguiente pantalla ");
                    window.location.href="../HTML+PHP/sesion.php";
                </script>
                ';
            } else {
                echo '<script>
                alert("Ups, algo salio mal. Intentalo de nuevo");
                window.location.href="../HTML+PHP/registro";
                </script>
                ';   
            }
        } else {
            $introducir_usuarios_elite = insertar_usuario_elite($conexion, $email, $nombre_usuario, $contrasena); /*Guardo la funcion de insertar a los usuarios normales ("elite") en variable*/
            if($introducir_usuarios_elite){ // Condicion para los usuarios normales ("elite")
                echo '
                <script>
                    alert("Usuario registrado correctamente. Ahora eres parte de la elite noticiera.Ahora puedes iniciar sesion");
                    window.location.href="../HTML+PHP/sesion.php";
                </script>
                ';
            } else {
                echo '<script>
                alert("Ups, algo salio mal. Intentalo de nuevo");
                window.location.href="../HTML+PHP/registro";
                </script>
                ';   
            }
        }
    }
}


?>
