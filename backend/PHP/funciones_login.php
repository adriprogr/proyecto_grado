<?php

include_once 'conexion.php';

// FUNCIONES REGISTRAR

// Esta funcion comprueba si hay un nombre de usuario o un correo que este repetido en la base de datos
function consultar_usuarios ($conexion, $email, $nombre_usuario){

    $consulta_usuarios = "SELECT * FROM usuarios where nombre_usuario = '$nombre_usuario' or email = '$email'";
    $resultado_usuarios = mysqli_query($conexion, $consulta_usuarios);
    
    return mysqli_num_rows($resultado_usuarios) > 0;
}

// Esta funcion insertara al usuario con un rol de administrador con la contraseña encriptada en la base de datos
function insertar_usuario_admin ($conexion, $email, $nombre_usuario, $contrasena) {
    // Encripto la contraseña para que no se envie en texto plano a la base de datos por el protocolo de mysql por defecto que pertenece al bycript. 
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    $insercion_usuario = "INSERT INTO usuarios (email, nombre_usuario, contraseña, id_rol) VALUES ('$email', '$nombre_usuario', '$contrasena_encriptada', 1)";
    $resultado_usuarios = mysqli_query($conexion, $insercion_usuario);

    return $resultado_usuarios;
}

// Esta funcion insertara al usuario con un rol de usuario normal(Lo llamo de "elite")con la contraseña encriptada en la base de datos
function insertar_usuario_elite ($conexion, $email, $nombre_usuario, $contrasena) {
    // Encripto la contraseña para que no se envie en texto plano a la base de datos por el protocolo de mysql por defecto que pertenece al bycript. 
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    $insercion_usuario = "INSERT INTO usuarios (email, nombre_usuario, contraseña, id_rol) VALUES ('$email', '$nombre_usuario', '$contrasena_encriptada', 2)";
    $resultado_usuarios = mysqli_query($conexion, $insercion_usuario);

    return $resultado_usuarios;
}

// FUNCIONES INICIAR SESION

// Esta funcion verifica si el usuario existe en la base de datos para que pueda iniciar sesion y despues devolvemos en un array los datos del usuarios
function verificar_nombre_usuario($conexion, $nombre_usuario){
    $consulta = "SELECT * FROM usuarios where nombre_usuario = '$nombre_usuario'";
    $resultado = mysqli_query($conexion, $consulta);
    
    if (mysqli_num_rows($resultado) > 0){
        return mysqli_fetch_assoc($resultado);
    }
}

// FUNCION PARA GUARDAR DATOS EN VARIABLES
// A traves del array anterior guardaremos los datos del usuario para poder personalizar mas la experiencia del mismo 
// Como por ejemplo poner el nombre por pantalla del usuario) o el rol (Por si un usuario es administrador tener unas acciones o si es un usuario normal tener otras

function guardar_datos($usuario){
    $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['id_rol'] = $usuario['id_rol'];

}
?>