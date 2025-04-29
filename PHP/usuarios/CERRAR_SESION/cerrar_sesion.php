<?php
session_start();
session_destroy();
header('Location: ../INICIO/PHP/Inicio.php');
exit();
?>
