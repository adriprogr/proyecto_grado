<?php
    include_once '../PHP/conexion.php';
    include_once '../PHP/funciones_noticias.php';
    session_start();

    // Funcion para obtener el id_titular y poder poner el nombre de la noticia como el titulo de la pagina
    $id_titular = $_GET['id_titular'];
    $noticias = titulares($conexion, $id_titular);

    if(mysqli_num_rows($noticias) > 0){
        while($row = mysqli_fetch_assoc($noticias)) {
            $titulo_pagina = $row['titulo_1'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo_pagina); ?> </title>
    <!-- Libreria de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="../../assets/css/Noticias_delicias.css">
    <link rel="stylesheet" href="../../assets/css/Noticias_movil.css">
    <!-- Libreria AOS -->    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Libreria de fuentes e iconos -->    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../../assets/icons/portal_delicias.ico">

</head>
<body>
    <!-- Seccion perteneciente a la cabecera -->
    <section class="cabecera" id="inicio"> <!--Contenedor que incluye el fondo del header y que contendra toda la estructura del header con sus elementos-->
        <!-- Barra de navegacion-->
        <nav class="navbar navbar-expand-md "> <!--Empiezo a definir el header diciendo que se va a expandir hasta los dispositivos medianos-->
            <div class="container-fluid d-flex justify-content-between align-items-center"> <!--Contenedor donde se ajojara todo el contenido. Estos tienen estilos de bootstrap aplicando un display flex donde el contenido estara separado entre ellos-->
                <!-- Logo -->
                <a href="Titulares_delicias.php"  data-aos="fade-down" data-aos-duration="1000" >
                    <img class="logo" src="../../assets/img/noticias_delicias.webp" width="320px">
                </a>
                <!-- Menu que se activa cuando llege a su limite. Aqui especifico el boton que sera de tipo offcanvas(diseño de bootstrap) para abrir el panel lateral -->
                <button class="navbar-toggler btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span> <!--Defino como va a ser el logo. En este caso sera un icono con tres rayas laterales(icono de bootstrap)-->
                </button>
                <!-- Aqui especifico donde se va a ubicar el menu lateral(El icono) que sera en el final de la pagina(es decir, derecha). A su vez detallare que cosas se alojara dentro del mismo-->
                <div class="offcanvas offcanvas-end" id="offcanvasNavbar">
                <!--Aqui detallamos la cabecera del menu offcanvas. En la cabecera tendra una imagen con el logo de la pagina que corresponda(puesto que habra varios logos) y un boton para cerrar dicho menu-->
                    <div class="offcanvas-header">
                        <img class="img-fluid" src="../../assets/img/noticias_delicias.webp" width="280px">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <!--Al igual que detalle antes la cabeza del header hare lo mismo con el body. Este contendra 4 enlaces(De momento) y 1 boton que me redirigira automaticamente al apartado de mas informacion sobre la web-->
                    <div class="offcanvas-body text-center" data-aos="fade-right" data-aos-duration="1000">
                        <ul class="navbar-nav justify-content-end flex-grow-1 3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="../../index.php">Incio</a>
                            </li>
                                            
                            <li class="nav-item">
                                <a class="nav-link active" href="Titulares_delicias.php">Noticias</a>
                            </li>
                                        
                            <?php
                                if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_rol'])){
                                    $rol = $_SESSION['id_rol'];
                                    if ($rol == 1){
                                        echo ' 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="../PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                                <li><a class="dropdown-item" href="registro.php">Registro</a></li>
                                            </ul>
                                        </li>
                                        ';
                                    } elseif($rol == 2) {
                                        echo ' 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="../PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                            </ul>
                                        </li>
                                        ';
                                    }
                                } else {
                                    echo '
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="registro.php">Iniciar Sesion/Registrarse</a>
                                    </li>';
                                }          
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <!-- Seccion perteneciente a la segunda parte del body -->

    <section class="container titular mt-4">
        <?php
            if(isset($_GET['id_titular'])){
                $id_titular = $_GET['id_titular']; 
            } else {
                $id_titular = 0;
            }

            if($id_titular > 0) {
                $noticias = titulares($conexion, $id_titular);

                if(mysqli_num_rows($noticias) > 0) {
                    while($row = mysqli_fetch_assoc($noticias)) {
                       echo ' 
                       <article>
                            <h1 class="titulo-articulo"> ' . $row['titulo_1'] . '</h1>
                            <div class="mb-3">
                                <span> ' . $row['fecha'] . '</span>
                            </div>
                            <p class="parrafo-articulo"> ' . $row['contenido_1'] . '</p>
                            <img src="'. $row['imagen'] . '" class="img-fluid mb-4 rounded imagen-articulo">

                            <h1 class="titulo-articulo"> ' . $row['titulo_2'] . '</h1>
                            <p class="parrafo-articulo"> ' . $row['contenido_2'] . '</p>
                            <p class="parrafo-articulo"> ' . $row['contenido_3'] . '</p>
                            <img src="'. $row['imagen_2'] . '" class="img-fluid mb-4 rounded imagen-articulo">
                        
                            <h1 class="titulo-articulo"> ' . $row['titulo_3'] . '</h1>
                            <p class="parrafo-articulo"> ' . $row['contenido_4'] . '</p>
                            <p class="parrafo-articulo"> ' . $row['contenido_5'] . '</p>
                        </article>';
                    }
                } else {
                    echo "<p>No hay noticias para mostrar</p>";
                }
            } else {
                echo "<p>ID de noticia no valido</p>";
            }
        ?>  
    </section>
    <!-- Seccion perteneciente a la segunda parte del body -->

      <section class="container">
        <h1 class="text-center">Mas noticias</h1>
        <div class="row">
            <?php
                $id_categoria = 3;
                $random = noticias_random($conexion, $id_titular, $id_categoria);

                while ($row = mysqli_fetch_assoc($random)) { // Bucle para mostrar las noticias que no esten en el carousel
                    echo '
                    <div class="col-lg-4">
                        <div class="carta" data-aos="zoom-in-up" data-aos-duration="800"> 
                            <img class="clave" src="'. $row['Imagen'] . '" class="d-block w-100" alt="...">
                            <img class="logito" src="../../assets/img/portal_corazon.webp"  alt="Logo del portafolio">
                            <div class="texto-carta ">
                                <span class="categoria">DELICIAS</span>
                                <h2 class="titulo">'  . $row['nombre_titular']. ' </h2>
                                <p>' .$row['introduccion'] . '</p>
                                <div class="botones">
                                    <a href="Noticias_delicias.php?id_titular=' . $row['id_titular'] . '" class="btn">Me interesa</a>  
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
            ?>
        </div>
    </section>

           
    <!--Pie de pagina-->
    <footer class="footer mt-4 " data-aos="fade-up" data-aos-duration="600">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 text-center">
                    <img src="../../assets/img/noticias_delicias.webp" class="img-fluid mb-4" width="400px;">
                </div>
                
                <div class="col-lg-2 col-md-4 col-6 mb-4 text-center" data-aos="fade-up" data-aos-duration="600" >
                    <h5 class="mb-3">Enlaces</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="../../index.php" class="text-white text-decoration-none"><i class="bi bi-house me-2"></i>INICIO</a></li>
                        <li class="mb-2"><a href="Titulares_delicias.php" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>NOTICIAS</a></li>
                        <?php
                            if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_rol'])){
                                $rol = $_SESSION['id_rol'];
                                if ($rol == 1){
                                    echo ' 
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                            <li><a class="dropdown-item" href="registro.php">Registro</a></li>
                                            <li><a class="dropdown-item" href="contraseña.php">Nueva Clave</a></li>
                                        </ul>
                                    </div>
                                    
                          
                                ';
                                } elseif($rol == 2) {
                                    echo '
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                            <li><a class="dropdown-item" href="contraseña.php">Nueva Clave</a></li>
                                        </ul>
                                    </li>
                                ';
                                }
                            } else {
                                echo '
                                <li class="mb-2">
                                    <a class="text-white text-decoration-none" href="registro.php"><i class="bi bi-box-arrow-in-right me-2"></i>INICIAR SESION / REGISTRO</a>
                                </li>
                                ';
                            }
                        ?>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6 mb-4 text-center" data-aos="fade-up" data-aos-duration="600" >
                    <h5 class="mb-3">Categorias</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="Titulares_corazon.php" class="text-white text-decoration-none"><i class="bi bi-heart me-2"></i>CORAZÓN</a></li>
                        <li class="mb-2"><a href="Titulares_informativos.php" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>INFORMATIVOS</a></li>
                        <li class="mb-2"><a href="Titulares_delicias.php" class="text-white text-decoration-none"><i class="bi bi-egg-fried me-2"></i>DELICIAS</a></li>
                        <li class="mb-2"><a href="Titulares_gamer.php" class="text-white text-decoration-none"><i class="bi bi-controller me-2"></i>GAMING</a></li>
                        <?php
                        if(isset($_SESSION['nombre_usuario'])) {
                            ?>
                                <li class="mb-2"><a href="Titulares_Elite.php" class="text-white text-decoration-none"><i class="bi bi-people me-2"></i>ÉLITE</a></li>
                            <?php
                        } else {
                            ?>
                                <li class="mb-2"><a href="" class="text-white text-decoration-none"  onclick="alert('Debes iniciar sesion para acceder a este portal')"><i class="bi bi-people me-2"></i>ÉLITE</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            
            
                <div class="col-lg-2 col-md-4 mb-4 text-center" data-aos="fade-up" data-aos-duration="600">
                    <h5 class="mb-3">¡Visita nuestro canal oficial!</h5>
                    <a href="https://discord.gg/By3qXUgV5P" target="_blank" class="text-white btn "> <i class="fab fa-discord "></i></a>                  
                </div>
            </div>
        </div>
    </footer>

         
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   
    <script>
        AOS.init();
    </script>
</body>
</html>