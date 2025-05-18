<?php

include_once 'conexion.php';

// FUNCIONES REGISTRAR

// Esta funcion comprueba si hay un nombre de usuario o un correo que este repetido en la base de datos
function consultar_usuarios($conexion, $email, $nombre_usuario){

    $consulta_usuarios = $conexion ->prepare("SELECT * FROM usuarios where nombre_usuario = ? or email = ?"); // Realizo una consulta preparada 
    $consulta_usuarios -> bind_param("ss", $nombre_usuario, $email); // Ahora especifico que seran de tipo string(cadena de texto)
    $consulta_usuarios -> execute(); // La ejecuto
    $resultado_usuarios = $consulta_usuarios->get_result(); //Obtengo los resultados
    
    return $resultado_usuarios->num_rows > 0; // Verifico si coincide con algun dato de la base de datos
}

// Esta funcion insertara al usuario con un rol de administrador con la contraseña encriptada en la base de datos
function insertar_usuario_admin ($conexion, $email, $nombre_usuario, $contrasena) {
    // Encripto la contraseña para que no se envie en texto plano a la base de datos por el protocolo de mysql por defecto que pertenece al bycript. 
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    $insercion_usuario = $conexion -> prepare("INSERT INTO usuarios (email, nombre_usuario, contraseña, id_rol) VALUES (?, ?, ?, 1)");
    $insercion_usuario -> bind_param("sss", $email, $nombre_usuario, $contrasena_encriptada);
    $insercion_usuario -> execute();

    return $insercion_usuario;
}

// Esta funcion insertara al usuario con un rol de usuario normal(Lo llamo de "elite")con la contraseña encriptada en la base de datos
function insertar_usuario_elite ($conexion, $email, $nombre_usuario, $contrasena) {
    // Encripto la contraseña para que no se envie en texto plano a la base de datos por el protocolo de mysql por defecto que pertenece al bycript. 
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    $insercion_usuario = $conexion -> prepare("INSERT INTO usuarios (email, nombre_usuario, contraseña, id_rol) VALUES (?,?,?,2)");
    $insercion_usuario -> bind_param("sss", $email, $nombre_usuario, $contrasena_encriptada);
    $insercion_usuario -> execute();

    return $insercion_usuario;
}

// FUNCIONES INICIAR SESION

// Esta funcion verifica si el usuario existe en la base de datos para que pueda iniciar sesion y despues devolvemos en un array los datos del usuarios
function verificar_nombre_usuario($conexion, $nombre_usuario){
    $verificar_usuarios = $conexion -> prepare("SELECT * FROM usuarios where nombre_usuario = ?");
    $verificar_usuarios -> bind_param("s", $nombre_usuario);
    $verificar_usuarios -> execute();
    $consulta_terminada = $verificar_usuarios -> get_result();
    if ($consulta_terminada -> num_rows > 0){
        return $consulta_terminada -> fetch_assoc(); //Recupero los datos en forma de array para personalizar la experiencia del usuario
    }

}

// FUNCION PARA GUARDAR DATOS EN VARIABLES
// A traves del array anterior guardare los datos del usuario para poder personalizar mas la experiencia del mismo 
// Como por ejemplo poner el nombre por pantalla del usuario) o el rol (Por si un usuario es administrador tener unas acciones o si es un usuario normal tener otras


function guardar_datos($usuario){
    // Guardo los datos del usuario en sesiones
    $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['id_rol'] = $usuario['id_rol'];
    $_SESSION['email'] = $usuario['email'];

}
//FUNCIONES PARA EL CAMBIO DE CONTRASEÑAS
//Funcion para verificar solamente el email del usuario(Utilizado unicamente para el cambio de contraseña)
function verificar_correo_usuario($conexion, $correo){
    $verificar_usuarios = $conexion -> prepare("SELECT * FROM usuarios where email = ?");
    $verificar_usuarios -> bind_param("s", $correo);
    $verificar_usuarios -> execute();
    $consulta_terminada = $verificar_usuarios -> get_result();
    return $consulta_terminada -> num_rows > 0;
    
    
}

//Funcion para cambiar la contraseña del usuario a traves del correo(Va de la mano con la funcion anterior)
function actualizar_contrasena($conexion, $correo, $contrasena){
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    $actualizar_contraseña = $conexion -> prepare("UPDATE usuarios SET contraseña = ? where email = ?");
    $actualizar_contraseña -> bind_param("ss", $contrasena_encriptada, $correo,);
    $actualizar_contraseña -> execute();

    return $actualizar_contraseña; 
}

?>