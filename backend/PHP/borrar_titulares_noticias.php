<?php
include_once '../PHP/funciones_noticias.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $id_titular = $_POST['id_titular'];

    // Establezco una variable llamada redireccion y con ella toma referencia de la pagina anterior para volver a ella una vez terminado el php
    $redireccion = $_SERVER['HTTP_REFERER']; 

    $funcion_borrado =  borrado_titulares_noticias($conexion, $id_titular);
    if($funcion_borrado){
        echo "
        <script>
            alert('Se han borrado exitosamente los datos del titular y noticias');
            window.location.href='$redireccion';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Algo ha fallado. Intentelo de nuevo');
            window.location.href='$redireccion';
        </script>
        ";
    }
}


?>