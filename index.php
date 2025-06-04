<?php
    include_once 'backend/PHP/conexion.php';
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Noticias | Inicio</title>
    <!-- Libreria de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="assets/css/inicio.css">
    <link rel="stylesheet" href="assets/css/inicio_movil.css">
    <!-- Libreria AOS -->    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Libreria de fuentes e iconos -->    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <!-- Icono de la web -->
    <link rel="icon" type="image/x-icon" href="assets/icons/portal_noticias.ico">

</head>
<body>
    <!-- Seccion perteneciente a la cabecera -->
    <section class="cabecera" id="inicio">
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a href="index.php" data-aos="fade-up" data-aos-duration="1000">
                    <img src="assets/img/portal_noticias.webp" alt="" class="logo" width="160px">
                </a>

                <button class="navbar-toggler btn btn success" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="offcanvas offcanvas-end" id="offcanvasNavbar">
                    <div class="offcanvas-header">
                        <img class="img-fluid" src="assets/img/portal_noticias.webp" width="200px">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>

                    <div class="offcanvas-body text-center">
                        <ul class="navbar-nav justify-content-end flex-grow-1 3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#inicio">Incio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#categorias">Noticias</a>
                            </li>

                            <?php
                            
                            if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_rol'])){
                                $rol = $_SESSION['id_rol'];
                                if ($rol == 1){
                                    echo ' 
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="backend/PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                            <li><a class="dropdown-item" href="backend/HTML+PHP/registro.php">Registro</a></li>
                                            <li><a class="dropdown-item" href="contraseña.php">Nueva clave</a></li>        
                                        </ul>
                                    </li>
                                ';
                                } elseif($rol == 2) {
                                    echo ' 
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="backend/PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                            <li><a class="dropdown-item" href="backend/HTML+PHP/contraseña.php">Nueva clave</a></li>
                                        </ul>
                                    </li>
                                ';
                                }
                            } else {
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="backend/HTML+PHP/registro.php">Iniciar Sesion/Registrarse</a>
                                </li>';
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="contenido-texto container-fluid" data-aos="fade-up" data-aos-duration="1000">
            <h1>¡Bienvenidos al Portal De noticias, el portal donde la informacion nunca duerme!</h1>
            <p>Preparate para enterarte de las ultimas, emociantes y frescas novedades que te mantendran al borde del asiento. Ademas, tambies puedes llegar a conseguir tu propio espacio para informar de algo que te apasione. ¿Quieres descubrir como?</p>
            <a href="#dedicacion"><button type="button" class="btn btn-lg mb-4">¡Que interesante!</button></a>
        </div>
    </section>

    <!-- Seccion perteneciente a la primera parte del body -->
    <section class="contenedor container-fluid text-center" id="dedicacion">
        <div class="row">
            <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="1000">
                <h1> ¿A que nos dedicamos?</h1>
                <div class="texto-body">
                    <p>Nuestra pagina se dedica a traer toda la informacion que vaya ocurriendo en el dia a dia de una forma directa, original y con un toque fresco para todo el público.</p>
                    <p>Nuestro objetivo es mantener a la audiencia no solo informada, sino también entretenida, haciendo que cada visita sea una experiencia única y divertida. Aunque también mantendremos la seriedad y el profesionalismo en las noticias más duras e importantes.</p>
                    <p>Os estaréis preguntando ¿Y qué tipos de noticias trataremos? Pues dale click al botón y descubre en qué te puedes sumergir.</p>
                   <a href="#categorias"><button type="button" class="btn btn-lg">¡Cuenteme mas!</button></a> 
                </div>
            </div>

            <div class="imagenes d-flex flex-column col-lg-6" data-aos="zoom-out-down" data-aos-duration="1000" >
                <img class="img-fluid" src="assets/img/papa.webp" width="400x" alt="">
                <img class="imagen_clave img-fluid" src="assets/img/dragon.webp" width="370px" height="200px" alt="" >
            </div>
            
        </div>
    </section>

    <!-- Seccion perteneciente a la segunda parte del body -->
    <section class="contenedor container-fluid text-center" id="categorias">        
        <div class="texto-body-2" data-aos="zoom-out" data-aos-duration="1000">
            <h1>Noticias</h1>
            <p>Si has llegado hasta aqui es por que la intriga te puede. A continuacion, presentamos las categorias de noticias en las que podras navegar en nuestro portal.</p>
            <p>Haz click en cada boton para saber que temas se trataran en cada portal</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="carta">
                    <img class="clave" src="assets/img/fondo_corazon.webp" alt="Imagen de artículo">
                    <img class="logito" src="assets/img/portal_corazon.webp"  alt="Logo del portafolio">
                    <button class="btn btn-primary disposicion corazon"  data-bs-target="#modal1" data-bs-toggle="modal" >PORTAL CORAZÓN</button>
                </div>
            </div>
            <div class="modal fade" id="modal1"> <!--Abro la etiqueta modal-->
                <div class="modal-dialog modal-dialog-centered"> <!--Especifico el entorno de la modal-->
                    <div class="modal-content"> <!--Contenido de la modal-->
                        <div class="modal-header"> <!--Cabecera de la modal-->
                            <img src="assets/img/portal_corazon.webp" class="img-fluid" width="120px" alt="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body"><!--Cuerpo de la modal-->
                            </h3>Este es el portal del Corazon, donde publicaremos las noticias mas salseantes y picantes sobre tus famosos favoritos. Los temas que encontraras son los siguientes:  </h3>
                            <br><br>
                            <ul class="d-flex align-items-center flex-column">
                                <li>Actualidad</li>
                                <li>Vida Social</li>
                                <li>Eventos</li>
                            </ul>
                        </div>
                        <div class="modal-footer d-flex justify-content-between"><!--Pie de pagina de la modal-->
                            <a href="backend\HTML+PHP\Titulares_corazon.php" class="boton_categorias corazon text-decoration-none">Visitar Portal</a>
                            <button type="button" class="cerrar" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="carta">
                    <img class="clave" src="assets/img/fondo_Informativos.webp" alt="Imagen de artículo">
                    <img class="logito" src="assets/img/portal_informativos.webp"  alt="Logo del portafolio">
                    <button class="btn btn-primary disposicion informativos"  data-bs-target="#modal2" data-bs-toggle="modal" >PORTAL INFORMATIVO</button>
                </div>
            </div>

            <div class="modal fade" id="modal2">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="assets/img/portal_informativos.webp" class="img-fluid" width="120px" alt="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            </h3>Este es el portal de informativos, donde publicaremos las noticias mas importantes contadas con seriedad y toda la informacion necesaria. Los temas que encontraras son los siguientes:  </h3>
                            <br><br>
                            <ul class="d-flex align-items-center flex-column">
                                <li>Politica</li>
                                <li>Actualidad</li>
                                <li>Economia</li>
                                <li>Deportes</li>
                            </ul>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <a href="backend\HTML+PHP\Titulares_informativos.php" class="boton_categorias informativos text-decoration-none">Visitar Portal</a>
                            <button type="button" class="cerrar" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="carta">
                    <img class="clave" src="assets/img/fondo_delicias.webp" alt="Imagen de artículo">
                    <img class="logito" src="assets/img/portal_delicias.webp"  alt="Logo del portafolio">
                    <button class="btn btn-primary disposicion delicias"  data-bs-target="#modal3" data-bs-toggle="modal" >PORTAL DELICIAS</button>
                </div>
            </div>

                
            <div class="modal fade" id="modal3">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="assets/img/portal_delicias.webp" class="img-fluid" width="120px" alt="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            </h3>Este es el portal de Delicias, donde publicaremos las noticias sobre la comida mas exquisita perteneciente a cualquier parte del mundo. Los temas que encontraras son los siguientes:</h3>
                            <br><br>
                            <ul class="d-flex align-items-center flex-column">
                                <li>Recetas</li>
                                <li>Comidas Saludables</li>
                                <li>Consejos de cocina</li>
                            </ul>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <a href="backend\HTML+PHP\Titulares_delicias.php" class="boton_categorias delicias text-decoration-none">Visitar Portal</a>
                            <button type="button" class="cerrar" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>        
        </div>

        <div class="row">
            <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="carta">
                    <img class="clave" src="assets/img/fondo_gamer.webp" alt="Imagen de artículo">
                    <img class="logito" src="assets/img/portal_gaming.webp"  alt="Logo del portafolio">
                    <button class="btn btn-primary disposicion gamer"  data-bs-target="#modal4" data-bs-toggle="modal" >PORTAL GAMING</button>
                </div>
            </div>
            
            <div class="modal fade" id="modal4">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="assets/img/portal_gaming.webp" class="img-fluid" width="120px" alt="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            </h3>Este es el portal Gaming, donde publicaremos las noticias que giran en torno al mundo de los videojuegos. Los temas que encontraras son los siguientes:  </h3>
                            <br><br>
                            <ul class="d-flex align-items-center flex-column">
                                <li>Videojuegos</li>
                                <li>Consolas</li>
                                <li>Curiosidades</li>
                                <li>Analisis de videojuegos</li>
                            </ul>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <a href="backend\HTML+PHP\Titulares_gamer.php" class="boton_categorias gamer text-decoration-none">Visitar Portal</a>
                            <button type="button" class="cerrar" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-6" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="carta">
                    <img class="clave" src="assets/img/fondo_comunidad.webp" alt="Imagen de artículo">
                    <img class="logito" src="assets/img/portal_elite.webp"  alt="Logo del portafolio">
                    <button class="btn btn-primary disposicion élite"  data-bs-target="#modal5" data-bs-toggle="modal" >PORTAL ÉLITE</button>
                </div>
            </div>
        
            <div class="modal fade" id="modal5">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="assets/img/portal_elite.webp" class="img-fluid" width="120px" alt="">
                            <button type="button " class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            </h3>Este es el portal de Élite, en el que cualquiera de vosotros podeis ser protagonistas y tener la oportunidad de tener un espacio dedicado para poder exponer el tema que mas te guste. Para ello deberas de formar parte de la Élite de Noticias. ¿A que esperas? </h3> 
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <?php
                            if(isset($_SESSION['nombre_usuario'])) {
                                ?>
                                    <a href="backend\HTML+PHP\Titulares_Elite.php" class="boton_categorias élite text-decoration-none">Visitar Portal</a>
                                <?php
                            } else {
                                ?>
                                    <a href="" class="boton_categorias élite text-decoration-none" onclick="alert('Debes iniciar sesion para acceder a este portal')">Visitar Portal</a>
                                <?php
                            }
                            ?>
                            <button type="button" class="cerrar" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pie de página -->
    <footer class="footer" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <div class="row"> <!-- Fila que separara el footer en cuatro columnas -->
                <div class="col-lg-4 text-center" data-aos="fade-down" data-aos-duration="1200">  <!-- Primera columna -->
                    <img src="assets/img/portal_noticias.webp"class="img-fluid mb-4" width="200px;">
                </div>
                
                <div class=" col-lg-2 col-md-4 col-6 text-center "> <!-- Segunda columna -->
                    <h5 class="mb-3" data-aos="fade-down" data-aos-duration="1200">Enlaces</h5>
                    <ul class="list-unstyled" data-aos="fade-down" data-aos-duration="1200">
                        <li class="mb-2"><a href="#inicio" class="text-white text-decoration-none"><i class="bi bi-house me-2"></i>INICIO</a></li>
                        <li class="mb-2"><a href="#categorias" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>NOTICIAS</a></li>
                         <?php
                            if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_rol'])){
                                $rol = $_SESSION['id_rol'];
                                if ($rol == 1){
                                    echo ' 
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="backend/PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                            <li><a class="dropdown-item" href="backend/HTML+PHP/registro.php">Registro</a></li>
                                            <li><a class="dropdown-item" href="backend/HTML+PHP/contraseña.php">Nueva Clave</a></li>
                                        </ul>
                                    </div>
                                    ';
                                } elseif($rol == 2) {
                                    echo '
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="backend/PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                            <li><a class="dropdown-item" href="backend/HTML+PHP/contraseña.php">Nueva Clave</a></li>
                                        </ul>
                                    </div>
                                    ';
                                }
                            } else {
                                echo '
                                <li class="mb-2">
                                    <a class="text-white text-decoration-none" href="backend/HTML+PHP/registro.php"><i class="bi bi-box-arrow-in-right me-2"></i>INICIAR SESION / REGISTRO</a>
                                </li>
                                ';
                            }
                        ?>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-4 col-6 text-center" > <!-- Tercera columna -->
                    <h5 class="mb-3" data-aos="fade-down" data-aos-duration="1200">Categorias</h5>
                    <ul class="list-unstyled" data-aos="fade-down" data-aos-duration="1200">
                        <li class="mb-2"><a href="backend/HTML+PHP/Titulares_corazon.php" class="text-white text-decoration-none"><i class="bi bi-heart me-2"></i>CORAZON</a></li>
                        <li class="mb-2"><a href="backend/HTML+PHP/Titulares_informativos.php" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>INFORMATIVOS</a></li>
                        <li class="mb-2"><a href="backend/HTML+PHP/Titulares_delicias.php" class="text-white text-decoration-none"><i class="bi bi-egg-fried me-2"></i>DELICIAS</a></li>
                        <li class="mb-2"><a href="backend/HTML+PHP/Titulares_gamer.php" class="text-white text-decoration-none"><i class="bi bi-controller me-2"></i>GAMING</a></li>
                        <?php
                        if(isset($_SESSION['nombre_usuario'])) {
                            ?>
                                <li class="mb-2"><a href="backend/HTML+PHP/Titulares_Elite.php" class="text-white text-decoration-none"><i class="bi bi-people me-2"></i>ÉLITE</a></li>
                            <?php
                        } else {
                            ?>
                                <li class="mb-2"><a href="" class="text-white text-decoration-none"  onclick="alert('Debes iniciar sesion para acceder a este portal')"><i class="bi bi-people me-2"></i>ÉLITE</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-4 mb-4 text-center" data-aos="fade-down" data-aos-duration="1200"> <!-- Cuarta columna -->
                    <h5 class="mb-3">¡Visita nuestro canal oficial!</h5>
                    <a href="https://discord.gg/By3qXUgV5P" target="_blank" class="text-white btn  "> 
                        <i class="fab fa-discord "></i>
                    </a>                  
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init(); // Este script activa las animaciones de la libreria AOS css
    </script>

</body>
</html>