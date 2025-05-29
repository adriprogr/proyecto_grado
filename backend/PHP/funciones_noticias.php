<?php
include_once 'conexion.php';
include_once 'funcion_discord.php';

// FUNCIONES IMAGENES
/*Funcion que guarda las imagenes en rutas para que la base de datos pueda interpretarlas*/
function guardar_rutas_imagenes(){
    $img = ['imagen_0', 'imagen_1' , 'imagen_2']; /*Hago uso de un array para guardar varias imagenes y guardarlas en una variable*/
    $rutas_imagenes = [];
    foreach ($img as $imagenes) {
        $nombre_archivo = $_FILES[$imagenes]['name']; // obtengo el nombre del archivo original
        $tmp_archivo = $_FILES[$imagenes]['tmp_name']; // Averiguo la ruta temporal donde se guarda la imagen 
        $ruta = "../../assets/img_noticias/" . $nombre_archivo; // Al final especfifico donde quiero almacenar la imagen (La ruta)
        move_uploaded_file($tmp_archivo, $ruta); // Ahora muevo la imagen introducida en la ruta temporal a la ruta destino
        $rutas_imagenes[] = $ruta; //Al final guardo la imagen en el array rutas_imagenes
    }
    return $rutas_imagenes;
}

// FUNCIONES TITULARES
/*Verifico si los titulares que se insertar coinciden con la base de datos*/ 
function consultar_titular($conexion, $id_titular) {
    $consulta_titular = $conexion -> prepare("SELECT * from titulares WHERE id_titular = ?");
    $consulta_titular -> bind_param("i", $id_titular); 
    $consulta_titular -> execute();
    $select = $consulta_titular -> get_result();
    return $select -> num_rows > 0;
    
}

/*Inserto el titular en la base de datos*/
function insertar_titular($conexion, $id_titular, $nombre_titular, $introduccion, $fecha, $rutas_imagenes, $id_categoria) {
    $imagen_1 = $rutas_imagenes[0]; // Saco la primera imagen del array y la guardo en una variable puesto que no se puede recoger como tal por parametro
    $insertar_titular = $conexion -> prepare("INSERT INTO titulares(id_titular, nombre_titular, introduccion, fecha, imagen, id_categoria) VALUES (?, ?, ?, ?, ?, ?)");
    $insertar_titular -> bind_param("issssi", $id_titular, $nombre_titular, $introduccion, $fecha, $imagen_1, $id_categoria);
    $insertar_titular -> execute();

    switch($id_categoria){ // Realizo un switch para que,cuando se envie el titular a la base de datos, pueda diferenciar la categoria y cambiar los enlaces
        case 1: //Pertenece a la categoria de corazon
            $enlace = "http://127.0.0.1/proyecto_grado/backend/HTML+PHP/Titulares_corazon.php";
            break;

        case 2: //Pertenece a la categoria de informativos
            $enlace = "http://127.0.0.1/proyecto_grado/backend/HTML+PHP/Titulares_informativos.php";
            break;
        
        case 3: //Pertenece a la categoria de delicias
            $enlace = "http://127.0.0.1/proyecto_grado/backend/HTML+PHP/Titulares_delicias.php";
            break;

        case 4: //Pertenece a la categoria de gaming
            $enlace = "http://127.0.0.1/proyecto_grado/backend/HTML+PHP/Titulares_gaming.php";
            break;

        case 5: //Pertenece a la categoria de elite
            $enlace = "http://127.0.0.1/proyecto_grado/backend/HTML+PHP/Titulares_elite.php";
            break;
            
        
    }
    enviar_notificacion_discord_principal($nombre_titular, $introduccion, $enlace, $id_categoria);


    return $insertar_titular ;
}

//FUNCIONES NOTICIAS
/*Verifico si las noticias que se insertar coinciden con la base de datos*/ 

function consultar_noticia($conexion, $id_noticia){
    $consulta_noticia = $conexion -> prepare("SELECT * from noticias WHERE id_noticia = ?");
    $consulta_noticia -> bind_param("i", $id_noticia);
    $consulta_noticia -> execute();
    $select = $consulta_noticia -> get_result();
    return $select -> num_rows > 0;  
}

/*Inserto la noticia en la base de datos*/

function insertar_noticia($conexion, $id_noticia, $titulo_1, $fecha, $contenido_1, $titulo_2, $contenido_2, $contenido_3, $titulo_3, $contenido_4, $contenido_5,$rutas_imagenes, $id_titular, $id_categoria ){
    // Saco las imagenes del array y la guardo en variables puesto que no se puede recoger como tal por parametro
    $imagen_1 = $rutas_imagenes[1];
    $imagen_2 = $rutas_imagenes[2];


    $insertar_noticias = $conexion -> prepare("INSERT INTO noticias(id_noticia, titulo_1, fecha, contenido_1, imagen, titulo_2, contenido_2, contenido_3, imagen_2, titulo_3, contenido_4, contenido_5, id_titular, id_categoria) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $insertar_noticias -> bind_param("isssssssssssii", $id_noticia, $titulo_1, $fecha, $contenido_1, $imagen_1, $titulo_2, $contenido_2, $contenido_3, $imagen_2, $titulo_3, $contenido_4, $contenido_5, $id_titular, $id_categoria );
    $insertar_noticias -> execute();
    return $insertar_noticias;
}

//FUNCION PARA BORRADO DE TITULARES Y NOTICIAS
function borrado_titulares_noticias($conexion, $id_titular){
    // Consulta para borrar noticias
    $borrar_noticias = $conexion ->prepare("DELETE FROM noticias WHERE id_titular = ?");
    $borrar_noticias -> bind_param("i", $id_titular);

    // Consulta para borrar titulares
    $borrar_titular = $conexion -> prepare("DELETE FROM titulares WHERE id_titular = ?");
    $borrar_titular -> bind_param("i", $id_titular);

    $borrar_noticias -> execute();
    $borrar_titular -> execute();

    return $borrar_noticias && $borrar_titular;
}


//FUNCIONES COMENTARIOS
/*Inserto los comentarios en la base de datos*/
function guardar_comentarios($conexion, $titular, $descripcion, $id_usuario){
    $insertar_comentarios = $conexion -> prepare("INSERT INTO comentarios(titular, descripcion, id_usuario) VALUES (?,?,?)");
    $insertar_comentarios -> bind_param("ssi", $titular, $descripcion, $id_usuario);
    $insertar_comentarios -> execute();
    return $insertar_comentarios;
}



// FUNCIONES PARA EL CAROUSEL Y MOSTRAR TITULARES
// Mostrar el primer titular para el carousel
function primer_titular_carousel($conexion, $id_categoria){
    // Consulta para seleccionar el titular mas reciente y colocarla en la primera posicion del carousel active de bootstrap
    $consulta_activa = $conexion -> prepare("SELECT * FROM titulares WHERE id_categoria = ? ORDER BY fecha DESC LIMIT 1"); 
    $consulta_activa -> bind_param('i', $id_categoria);
    $consulta_activa -> execute();
    $primer_carousel = $consulta_activa -> get_result();
    return $primer_carousel;
}

// Mostrar el segundo y tercer titular para el carousel
function carousel_faltante($conexion, $id_categoria){

    $consulta_restante = $conexion -> prepare("SELECT * FROM titulares WHERE id_categoria = ? ORDER BY fecha DESC LIMIT 2 OFFSET 1"); 
    $consulta_restante -> bind_param('i', $id_categoria);
    $consulta_restante -> execute();
    $carousel_restante = $consulta_restante -> get_result();
    return $carousel_restante;

}

// Funcion para mostrar loa titulares restantes
function mas_noticias($conexion, $id_categoria){
    $consulta_noticias = $conexion -> prepare("SELECT * FROM titulares WHERE id_categoria = ? ORDER BY fecha DESC LIMIT 100 OFFSET 3");
    $consulta_noticias -> bind_param('i', $id_categoria);
    $consulta_noticias -> execute();
    $mas_noticias = $consulta_noticias -> get_result();
    return $mas_noticias;
}

// FUNCIONES PARA LAS NOTICIAS
// Funcion para mostrar noticias y mostrar el titulo de la noticia en la ventana del navegador
function titulares($conexion, $id_titular){
    $consulta = $conexion -> prepare("SELECT * FROM noticias where id_titular = ?");
    $consulta -> bind_param('i', $id_titular);
    $consulta -> execute();
    $consulta_noticias = $consulta -> get_result();
    return $consulta_noticias;
}

// Funcion para mostrar noticias aleatorias
function noticias_random($conexion, $id_titular, $id_categoria){
    $consulta_aleatoria = $conexion -> prepare("SELECT * FROM titulares WHERE id_categoria = ? and id_titular != ? ORDER BY RAND() LIMIT 3 ");
    $consulta_aleatoria -> bind_param('ii', $id_categoria, $id_titular);
    $consulta_aleatoria -> execute();
    $noticias_aleatorias = $consulta_aleatoria -> get_result();
    return $noticias_aleatorias;
}

?>
