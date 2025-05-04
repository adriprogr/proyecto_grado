<?php
session_start();
session_destroy();
header('Location: ../HTML+PHP/index.php');
exit();
?>
