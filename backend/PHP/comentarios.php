<?php
session_start();
include_once '../PHP/funciones_noticias.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titular = $_POST['titular'];
    $descripcion = $_POST['descripcion'];
    $id_usuario = $_SESSION['id_usuario']; // obtengo el id del usuario guardados en la sesion
    
    $comentarios = guardar_comentarios($conexion, $titular, $descripcion, $id_usuario);
    if($comentarios) {
        echo '
        <script>
            alert("La sugerencia se ha guardado correctamente. Gracias por confiar en nosotros");
            window.location.href="../HTML+PHP/Titulares_Elite.php";
        </script>
        ';
    } else {
        echo '<script>
            alert("Hay datos erroneos. Por favor, intentelo de nuevo");
            window.location.href="../HTML+PHPTitulares_Elite.php";
        </script>
        ';
    }

}
?>
