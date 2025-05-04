<?php   
    include_once '../PHP/funciones_noticias.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Titulares
        $id_titular = $_POST['id_titular'];
        $nombre_titular = $_POST['nombre_titular'];
        $introduccion = $_POST['introduccion'];
        
        //Noticias
        $id_noticia = $_POST['id_noticia'];
        $titulo_1 = $_POST['titulo_1'];
        $contenido_1 = $_POST['contenido_1'];
        $titulo_2 = $_POST['titulo_2'];
        $contenido_2 = $_POST['contenido_2'];
        $contenido_3 = $_POST['contenido_3'];
        $titulo_3 = $_POST['titulo_3'];
        $contenido_4 = $_POST['contenido_4'];
        $contenido_5 = $_POST['contenido_5'];

        //Ambos
        $fecha = $_POST['fecha'];
        $id_categoria = $_POST['id_categoria'];
    
        // Establezco una variable llamada redireccion y con ella toma referencia de la pagina anterior para volver a ella una vez terminado el php
        $redireccion = $_SERVER['HTTP_REFERER']; 
        
        $imagenes = ['imagen_0', 'imagen_1', 'imagen_2'];
        $rutas_imagenes = guardar_rutas_imagenes($img); // Guardamos la funcion de guardar las imagenes

        if(consultar_titular($conexion, $id_titular)){ /*Verifico que el id de titular introducido no este introducido en la base de datos*/
            echo "
            <script>
                alert('El id del titular introducido ya esta en uso. Utilice otro')
                window.location.href='$redireccion';
            </script>";
        } else {
            if(consultar_noticia($conexion, $id_noticia)){
                echo "
                <script>
                    alert('El id de la noticia introducido ya esta en uso. Utilice otro')
                    window.location.href='$redireccion';
                </script>"; 
            } else {
                $titular_insertar = insertar_titular($conexion, $id_titular, $nombre_titular, $introduccion, $fecha, $rutas_imagenes, $id_categoria);
                if($titular_insertar){ /* Si el titular se inserta sin problemas insertaremos tambien la noticia*/
                    $noticia_insertar = insertar_noticia($conexion, $id_noticia, $titulo_1, $fecha, $contenido_1, $titulo_2, $contenido_2, $contenido_3, $titulo_3, $contenido_4, $contenido_5, $rutas_imagenes, $id_titular, $id_categoria);
                    if($noticia_insertar){ /* Si la noticia tambien se inserta me redirijira a la pagina correspondiente y saldra un mensaje diciendo que se implemento correctamente*/
                        echo "
                        <script> 
                            alert('El titular y la noticia se implementaron correctamente');
                            window.location.href='$redireccion';
                        </script>";
                    } else {
                        echo "
                        <script>
                            alert('Error al insertar la noticia. Intentelo de nuevo')
                            window.location.href='$redireccion';
                        </script>";
                    }
                } else {
                    echo "
                    <script>
                        alert('Error al insertar el titular. Intentelo de nuevo')
                        window.location.href='$redireccion';
                    </script>";
                }
            }
        }
    }
?>
