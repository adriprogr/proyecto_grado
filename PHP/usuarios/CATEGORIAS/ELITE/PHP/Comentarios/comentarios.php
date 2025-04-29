<?php
session_start();
include '../../../../CONEXION/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titular = $_POST['titular'];
    $descripcion = $_POST['descripcion'];
    $id_usuario = $_SESSION['id_usuario']; // obtengo el id del usuario guardados en la sesion

    $insercion_comentario = "INSERT INTO comentarios (titular, descripcion, id_usuario) VALUES ('$titular', '$descripcion', '$id_usuario')";
    $resultado = mysqli_query($conexion, $insercion_comentario);

    if($resultado) {
        echo '<script>
        alert("La sugerencia se ha guardado correctamente. Gracias por confiar en nosotros");
        window.location.href="../Titulares/Titulares_Elite.php";
        </script>
        ';
    } else {
        echo '<script>
        alert("Hay datos erroneos. Por favor, intentelo de nuevo");
        window.location.href="../Titulares/Titulares_Elite.php";
        </script>
        ';
    }

}
?>
