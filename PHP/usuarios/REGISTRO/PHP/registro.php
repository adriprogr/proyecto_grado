<?php

include_once '../../CONEXION/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Ahora encripto la contraseña para que no se envie en texto plano a la base de datos. 
    //Tendra el protocolo que tiene por defecto Mysql que pertenece al BCRYPT 

    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    $consulta = "SELECT * FROM usuarios where nombre_usuario = '$nombre_usuario' or email = '$email'";
    $resultado = mysqli_query($conexion, $consulta);

    if(mysqli_num_rows($resultado) > 0){
        echo '<script>
        alert("Este correo o Nombre de usuario ya esta en uso. Pruebe con otro");
            window.location.href="../HTML/registro.html";
        </script>
        '; 
    } else {
        $insercion = "INSERT INTO usuarios (email, nombre_usuario, contraseña, id_rol) VALUES ('$email', '$nombre_usuario', '$contrasena_encriptada', 2)";
        $resultado = mysqli_query($conexion, $insercion);

        if($resultado){
            echo '<script>
            alert("Usuario registrado correctamente. Ahora eres parte de nuestra Elite noticiera");
            window.location.href="../../../universal/INICIO_SESION/HTML/sesion.html";
            </script>
            ';
        } else {
            echo '<script>
            alert("Ups, algo salio mal. Intentalo de nuevo");
            window.location.href="../HTML/registro.html";
            </script>
            '; 
        }
    }


}

?>