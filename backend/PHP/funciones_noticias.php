<?php
include_once 'conexion.php';

// FUNCIONES TITULARES
/*Verifico si los titulares que se insertar coinciden con la base de datos*/ 
function consultar_titular($conexion, $id_titular) {
    $consulta_titular = "SELECT * from titulares WHERE id_titular = '$id_titular'";
    $resultado_titular = mysqli_query($conexion, $consulta_titular);
    return mysqli_num_rows($resultado_titular) > 0;
}

/*Inserto el titular en la base de datos*/
function insertar_titular($conexion, $id_titular, $nombre_titular, $introduccion, $fecha, $rutas_imagenes, $id_categoria) {
    $insertar_titular = "INSERT INTO titulares(id_titular, nombre_titular, introduccion, fecha, imagen, id_categoria) VALUES ('$id_titular', '$nombre_titular', '$introduccion', '$fecha','{$rutas_imagenes[0]}', '$id_categoria')";
    $resultado_titular = mysqli_query($conexion, $insertar_titular);
    return ($resultado_titular) ;
}

//FUNCIONES NOTICIAS
/*Verifico si las noticias que se insertar coinciden con la base de datos*/ 

function consultar_noticia($conexion, $id_noticia){
    $consulta_noticia = "SELECT * from noticias WHERE id_noticia = '$id_noticia'";
    $resultado_noticias = mysqli_query($conexion, $consulta_noticia);
    return mysqli_num_rows($resultado_noticias) > 0;
}

/*Inserto la noticia en la base de datos*/

function insertar_noticia($conexion, $id_noticia, $titulo_1, $fecha, $contenido_1, $titulo_2, $contenido_2, $contenido_3, $titulo_3, $contenido_4, $contenido_5, $rutas_imagenes, $id_titular, $id_categoria){
    $insertar_noticias = "INSERT INTO noticias(id_noticia, titulo_1, fecha, contenido_1, imagen, titulo_2, contenido_2, contenido_3, imagen_2, titulo_3, contenido_4, contenido_5, id_titular, id_categoria) VALUES 
    ('$id_noticia', '$titulo_1', '$fecha', '$contenido_1', '{$rutas_imagenes[1]}','$titulo_2', '$contenido_2', '$contenido_3', '{$rutas_imagenes[2]}','$titulo_3', '$contenido_4', '$contenido_5', '$id_titular', '$id_categoria')";
    $resultado_noticias = mysqli_query($conexion, $insertar_noticias);
    return ($resultado_noticias);
}

// FUNCIONES IMAGENES
/*Funcion que guarda las imagenes en rutas para que la base de datos pueda interpretarlas*/
function guardar_rutas_imagenes($img){
    $rutas_imagenes = [];
    foreach ($img as $imagenes) {
        $nombre_archivo = $_FILES[$imagenes]['name'];
        $tmp_archivo = $_FILES[$imagenes]['tmp_name'];
        $ruta = "../../assets/img_noticias/" . $nombre_archivo;
        move_uploaded_file($tmp_archivo, $ruta);
        $rutas_imagenes[] = $ruta;
    }
    return $rutas_imagenes;
}

//FUNCIONES COMENTARIOS
/*Inserto los comentarios en la base de datos*/
function guardar_comentarios($conexion, $titular, $descripcion, $id_usuario){
    $insertar_comentarios = "INSERT INTO comentarios(titular, descripcion, id_usuario) VALUES ('$titular', '$descripcion', '$id_usuario')";
    $resultado_comentarios = mysqli_query($conexion, $insertar_comentarios);

    return $resultado_comentarios;
}
?>


