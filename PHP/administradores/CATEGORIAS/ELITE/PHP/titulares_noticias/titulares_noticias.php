<?php   
    include '../../../../CONEXION/conexion.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Titulares
        $id_titular = $_POST['id_titular'];
        $nombre_titular = $_POST['nombre_titular'];
        $introduccion = $_POST['introduccion'];
        $fecha = $_POST['fecha'];
        $id_categoria = $_POST['id_categoria'];
        
        //Noticias
        $id_noticia = $_POST['id_noticia'];
        $titulo_1 = $_POST['titulo_1'];
        $fecha = $_POST['fecha'];
        $contenido_1 = $_POST['contenido_1'];
        $titulo_2 = $_POST['titulo_2'];
        $contenido_2 = $_POST['contenido_2'];
        $contenido_3 = $_POST['contenido_3'];
        $titulo_3 = $_POST['titulo_3'];
        $contenido_4 = $_POST['contenido_4'];
        $contenido_5 = $_POST['contenido_5'];
        
        $img = ['imagen_0', 'imagen_1' , 'imagen_2']; /*Hago uso de un array para guardar varias imagenes y guardarlas en una variable*/
        $rutas_imagenes = [];
        foreach($img as $imagenes){ /*Recorro cada valor del array*/
            $nombre_archivo = $_FILES[$imagenes]['name']; /*Primero obtengo el nombre del archivo*/
            $tmp_archivo = $_FILES[$imagenes]['tmp_name']; /*Posteriormente guardo la imagen en una carpeta temporal*/
            $ruta = "imagenes/" . $nombre_archivo;/*Por ultimo indico la ruta donde se guardara la imagen*/

            move_uploaded_file($tmp_archivo, $ruta); /*Ahora muevo la imagen desde la carpeta temporal a la ruta definitiva*/
            $rutas_imagenes[] = $ruta;

        }
            $insertar_titular = "INSERT INTO titulares(id_titular, nombre_titular, introduccion, fecha, imagen, id_categoria) VALUES ('$id_titular', '$nombre_titular', '$introduccion', '$fecha','{$rutas_imagenes[0]}', '$id_categoria')";
            $resultado_titular = mysqli_query($conexion, $insertar_titular);

            if($resultado_titular) {
                $insertar_noticias = "INSERT INTO noticias(id_noticia, titulo_1, fecha, contenido_1, imagen, titulo_2, contenido_2, contenido_3, imagen_2, titulo_3, contenido_4, contenido_5, id_titular, id_categoria) VALUES ('$id_noticia', '$titulo_1', '$fecha', '$contenido_1', '{$rutas_imagenes[1]}','$titulo_2', '$contenido_2', '$contenido_3', '{$rutas_imagenes[2]}','$titulo_3', '$contenido_4', '$contenido_5', '$id_titular', '$id_categoria')";
                $resultado_noticias = mysqli_query($conexion, $insertar_noticias);
                if($resultado_noticias) {
                    echo '<script>
                    alert("El titular y la noticia se crearon correctamente");
                    window.location.href="../Titulares/Titulares_Elite.php";
                    </script>
                    ';
            } else {
                echo '<script>
                alert("Hubo un fallo intentelo de nuevo");
                window.location.href="../Titulares/Titulares_Elite.php";
                </script>
                ';
            }     
    }
}
?>
