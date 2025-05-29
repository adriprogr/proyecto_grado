<?php
    include_once '../PHP/conexion.php';
    include_once '../PHP/funciones_noticias.php';

    session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulares Élite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/CSS/Titulares_elite.css">
    <link rel="stylesheet" href="../../assets/CSS/Titulares_movil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../../assets/icons/portal_elite.ico">

</head>

<body>
    <!-- Seccion perteneciente a la cabecera -->
    <section class="cabecera" id="inicio"> <!--Contenedor que incluye el fondo del header y que contendra toda la estructura del header con sus elementos-->
        <!-- Barra de navegacion-->
        <nav class="navbar navbar-expand-md "> <!--Empiezo a definir el header diciendo que se va a expandir hasta los dispositivos medianos-->
            <div class="container-fluid d-flex justify-content-between align-items-center"> <!--Contenedor donde se ajojara todo el contenido. Estos tienen estilos de bootstrap aplicando un display flex donde el contenido estara separado entre ellos-->
                <!-- Logo -->
                <a href="Titulares_Elite.php">
                    <img class="logo" data-aos="fade-up" data-aos-duration="1000" src="../../assets/img/noticias_elite.webp" width="320px">
                </a>
                
                <!-- Menu que se activa cuando llege a su limite. Aqui especifico el boton que sera de tipo offcanvas(diseño de bootstrap) para abrir el panel lateral -->
                <button class="navbar-toggler btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span> <!--Defino como va a ser el logo. En este caso sera un icono con tres rayas laterales(icono de bootstrap)-->
                </button>
                
                <!-- Aqui especifico donde se va a ubicar el menu lateral(El icono) que sera en el final de la pagina(es decir, derecha). A su vez detallare que cosas se alojara dentro del mismo-->
                <div class="offcanvas offcanvas-end" id="offcanvasNavbar">
                
                    <!--Aqui detallamos la cabecera del menu offcanvas. En la cabecera tendra una imagen con el logo de la pagina que corresponda(puesto que habra varios logos) y un boton para cerrar dicho menu-->
                    <div class="offcanvas-header">
                        <img class="img-fluid" src="../../assets/img/noticias_elite.webp" width="280px">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
            
                    <!--Al igual que detalle antes la cabeza del header hare lo mismo con el body. Este contendra 4 enlaces(De momento) y 1 boton que me redirigira automaticamente al apartado de mas infomacion sobre la web-->
                    <div class="offcanvas-body text-center" data-aos="fade-right" data-aos-duration="1000">
                        <ul class="navbar-nav justify-content-end flex-grow-1 3">
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../../index.php">Incio</a>
                            </li>
                                    
                            <li class="nav-item">
                                <a class="nav-link active" href="#titulares">Noticias</a>
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
                                                <li><a class="dropdown-item" href="contraseña.php">Nueva Clave</a></li>
                                            </ul>
                                    </li>
                                    ';
                                    } elseif($rol == 2) {
                                        echo ' 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="../PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                                <li><a class="dropdown-item" href="contraseña.php">Nueva Clave</a></li>
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
        
        <div class=" contenido-texto container-fluid">
            <h1 data-aos="fade-up" data-aos-duration="1000">¡Bienvenidos a Portal Élite donde tu podras ser el protegonista de "elite" </h1>
            <p data-aos="fade-up" data-aos-duration="1000">En este Portal cualquiera de vosotros podeis ser protagonistas y tener la oportunidad de tener un espacio dedicado para poder exponer el tema que mas te guste. Encontrareis curiosidades y noticias aportadas por vosotros</p>    
            <a href="#Titulares"><button type="button" data-aos="fade-up" data-aos-duration="1000" class="btn btn-lg mb-4">¡Echar un vistazo!</button></a>
            <?php
                if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_rol'])){
                    $rol = $_SESSION['id_rol'];
                    if ($rol == 1){           
                        // Formulario para implementar los titulares y noticias         
                        echo '
                        <button type="button" data-aos="fade-up" data-aos-duration="1000" class="btn btn-lg mb-4" data-bs-target="#modal1" data-bs-toggle="modal">Agregar Titular Y Noticia</button>
                        <!--Seccion de agregar titulares y noticias -->
                        <div class="modal fade" id="modal1"> <!--Abrimos la etiqueta modal-->
                            <div class="modal-dialog modal-dialog-centered"> <!--Especificamos el entorno de la modal-->
                                <div class="modal-content"> <!--Contenido de la modal-->

                                    <div class="modal-header"> <!--Cabecera de la modal-->
                                        <img src="../../assets/img/portal_elite.webp" class="img-fluid" width="120px" alt="">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body d-flex justify-content-center align-items-center"><!--Cuerpo de la modal-->
                                        <form action="../PHP/titulares_noticias.php" method="POST" enctype="multipart/form-data">
                                            <!--Titulares-->
                                            <h1 class="text-center mb-4">Titular</h1>
                                            <!--El id del titular vale tanto para noticias como para titulares -->
                                            
                                            <div class="mb-3">
                                                <label for="id_titular" class="form-label" style="color: black; ">Introduzca el id que tendra el titular</label>
                                                <input type="number" class="form-control"  name="id_titular" placeholder="id del Titular" required>
                                            </div>

                                           <div class="mb-3">
                                                <label for="Titulo" class="form-label">Introduzca el nombre que tendra el titular</label>
                                                <input type="text" class="form-control"  name="nombre_titular" placeholder="Nombre del Titular(Caracteres minimo 30 y maximo 70)"  minlength="30" maxlength="70" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="Introduccion" class="form-label">Introduzca una breve Introduccion a la noticia</label>
                                                <input type="text" class="form-control"  name="introduccion"  placeholder="Breve Introduccion(Caracteres minimo 60 y maximo 100)"  minlength="60" maxlength="100"required>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="Fecha" class="form-label">Introduzca la fecha de la noticia</label>
                                                <input type="datetime-local" class="form-control"  name="fecha"  placeholder="Breve Introduccion"required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="imagen_0" class="form-label">Introduzca una imagen</label>
                                                <input type="file" class="form-control"  name="imagen_0" required>
                                            </div>
                                            
                                            
                                            <!--Noticias-->
                                            <h1 class="text-center mb-4">Noticia</h1>
                                            
                                            <div class="mb-3">
                                                <label for="id_noticia" class="form-label">Introduzca el numero de la noticia (Recomendable coincidir con el id del titular)</label>
                                                <input type="number" class="form-control"  name="id_noticia" placeholder="id del Noticia" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="Titulo" class="form-label">Introduzca el titulo principal de la noticia</label>
                                                <input type="text" class="form-control"  name="titulo_1" placeholder="Titulo Principal" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="Contenido_1" class="form-label">Introduzca el primer contenido</label>
                                                <input type="text" class="form-control"  name="contenido_1"  placeholder="Contenido_1" required>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="Imagen_1" class="form-label">Introduzca una imagen</label>
                                                <input type="file" class="form-control"  name="imagen_1" required>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="Titulo" class="form-label">Introduzca el segundo titulo de la noticia</label>
                                                <input type="text" class="form-control"  name="titulo_2" placeholder="Segundo Titulo" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="Contenido_2" class="form-label">Introduzca el segundo contenido</label>
                                                <input type="text" class="form-control"  name="contenido_2"  placeholder="Contenido_2" required>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="Contenido_3" class="form-label">Introduzca el tercer contenido</label>
                                                <input type="text" class="form-control"  name="contenido_3"  placeholder="Contenido_3" required>
                                            </div>

                                        
                                            <div class="mb-3">
                                                <label for="Imagen_2" class="form-label">Introduzca una imagen</label>
                                                <input type="file" class="form-control"  name="imagen_2" required>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="Titulo" class="form-label">Introduzca el tercer titulo de la noticia</label>
                                                <input type="text" class="form-control"  name="titulo_3" placeholder="Tercer titulo" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="Contenido_2" class="form-label">Introduzca el segundo contenido</label>
                                                <input type="text" class="form-control"  name="contenido_4"  placeholder="Contenido_4" required>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="Contenido_3" class="form-label">Introduzca el tercer contenido</label>
                                                <input type="text" class="form-control"  name="contenido_5"  placeholder="Contenido_5" required>
                                            </div>
                                        
                                            <!-- Vale tanto para noticias como titulares -->
                                            <input type="hidden" name="id_categoria" value="5"> <!-- El valor 2 hace referencia a la categoria élite de la base de datos -->
                                            
                                            <input type="submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
            ?>
            <!--Seccion de sugerencias (Exclusiva de este portal) -->
            <button type="button" data-aos="fade-up" data-aos-duration="1000" class="btn btn-lg mb-4" data-bs-target="#modal2" data-bs-toggle="modal" >Crea tu propia noticia</button>
            <div class="modal fade" id="modal2"> <!--Abrimos la etiqueta modal-->
                <div class="modal-dialog modal-dialog-centered"> <!--Especificamos el entorno de la modal-->
                    <div class="modal-content"> <!--Contenido de la modal-->

                        <div class="modal-header"> <!--Cabecera de la modal-->
                            <img src="../../assets/img/portal_elite.webp" class="img-fluid" width="120px" alt="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="../PHP/comentarios.php" method="POST" enctype="multipart/form-data">
                                <h1 class="text-center mb-4">Crea tu propia noticia </h1>
                                <p class="mb-4" style="color:black">En este apartado puedes hacer que tu noticia sea realidad. Rellena este formulario con la noticia que te gustaria que se detallara en este portal. Ser parte de la elite noticiera tiene sus ventajas</p> 
                            
                                <div class="mb-3">
                                    <label for="Titular" class="form-label">Introduzca el titular de la noticia</label>
                                    <input type="text" class="form-control"  name="titular" placeholder="Titular de la noticia" required>
                                </div>

                                <div class="mb-3">
                                    <label for="Descripcion" class="form-label">Dinos de que quieres que se trate</label>
                                    <input type="text" class="form-control"  name="descripcion" placeholder="Descripcion de la noticia" required>
                                </div>
                                
                                <input type="submit">                      
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Carousel y primera parte del body-->
    <div id="carouselExampleAutoplaying" class="container carousel slide" data-aos="zoom-in-up" data-aos-duration="1000" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <h1 class="text-center">Noticias Destacadas</h1>
        <div class="carousel-inner" data-bs-interval="5000" id="Titulares">
        <?php
            $id_categoria = 5;
            $primer_carousel = primer_titular_carousel($conexion, $id_categoria);
            $carousel_restante = carousel_faltante($conexion, $id_categoria);
            
            if(mysqli_num_rows($primer_carousel) > 0 && mysqli_num_rows($carousel_restante) > 0){

                while ($row = mysqli_fetch_assoc($primer_carousel)) { // Bucle para la primera posicion del carousel
                    echo ' 
                    <div class="carousel-item active">
                        <img src="../titulares_noticias/'. $row['Imagen'] . '" class="d-block w-100">
                            <div class="carousel-caption">
                                <h5>' . $row['nombre_titular']. '</h5>
                                <p> ' .$row['introduccion'] . '</p>
                                <div class="botones_carrusel">
                                    <a href="Noticias_elite.php?id_titular=' . $row['id_titular'] . '" class="btn">Me interesa</a>';
                                    if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_rol'])){ // Si el usuario es administrador tendra la opcion de eliminar la noticia
                                        $rol = $_SESSION['id_rol'];
                                        
                                        if ($rol == 1){
                                            echo '
                                            <form method = "POST" class="" action="../PHP/borrar_titulares_noticias.php" onsubmit="return confirm(\'¿Estas seguro de eliminar este titular y noticia?\')">
                                                <input type = "hidden" name="id_titular" value="' . $row['id_titular'] .'">
                                                <button type = "submit" class="btn"> Eliminar</button>
                                            </form>
                                            ';
                                        }
                                    }
                    echo '</div> </div> </div>';
                }
                while ($row = mysqli_fetch_assoc($carousel_restante)) { // Bucle para la segunda y tercera posicion del carousel
                    echo ' 
                    <div class="carousel-item">
                        <img src="../titulares_noticias/'. $row['Imagen'] . '" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <h5>' . $row['nombre_titular']. '</h5>
                            <p> ' .$row['introduccion'] . '</p>
                            <div class="botones_carrusel">
                                <a href="Noticias_elite.php?id_titular=' . $row['id_titular'] . '" class="btn">Me interesa</a>';                               
                                if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_rol'])){
                                    $rol = $_SESSION['id_rol'];
                                    
                                    if ($rol == 1){
                                        echo '
                                        <form method = "POST" class="" action="../PHP/borrar_titulares_noticias.php" onsubmit="return confirm(\'¿Estas seguro de eliminar este titular y noticia?\')">
                                            <input type = "hidden" name="id_titular" value="' . $row['id_titular'] .'">
                                            <button type = "submit" class="btn"> Eliminar</button>
                                        </form>
                                        ';
                                    }
                                }
                    echo '</div> </div> </div>';
                }
            } else {
                echo '
                <p class="text-center"> No hay noticias para mostrar </p>
                ';
            }
        ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
    
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--Mas noticias y segunda parte del body-->
    <section class="container ">
        <h1 class="text-center" data-aos="zoom-in-up" data-aos-duration="1000">Mas noticias</h1>
        <div class="row">
           <?php
                $id_categoria = 5;
                $noticias = mas_noticias($conexion, $id_categoria);
                if(mysqli_num_rows($noticias) > 0){

                    while ($row = mysqli_fetch_assoc($noticias)) { // Bucle para mostrar las noticias que no esten en el carousel
                        echo '
                        <div class="container col-lg-6 col-md-6 mb-4 ">
                            <div class="carta" data-aos="zoom-in-up" data-aos-duration="1000"> 
                                <img class="clave" src="../titulares_noticias/'. $row['Imagen'] . '" class="d-block w-100" alt="...">
                                <img class="logito" src="../../assets/img/portal_elite.webp"  alt="Logo del portafolio">
                                <div class="texto-carta">
                                    <span class="categoria">Élite</span>
                                    <h2 class="titulo">'  . $row['nombre_titular']. ' </h2>
                                    <p>' .$row['introduccion'] . '</p>
                                    <div class="botones">
                                        <a href="Noticias_elite.php?id_titular=' . $row['id_titular'] . '" class="btn">Me interesa</a>';  
                                        if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_rol'])){
                                            $rol = $_SESSION['id_rol'];
                                        
                                            if ($rol == 1){
                                                echo '
                                                <form method = "POST" class="" action="../PHP/borrar_titulares_noticias.php" onsubmit="return confirm(\'¿Estas seguro de eliminar este titular y noticia?\')">
                                                    <input type = "hidden" name="id_titular" value="' . $row['id_titular'] .'">
                                                    <button type = "submit" class="btn"> Eliminar</button>
                                                </form>
                                                ';
                                            }
                                        }
                        echo '</div> </div> </div> </div>';
                    }
                } else {
                    echo '<p class="text-center"> No hay noticias para mostrar</p>';
                }
        ?>
        </div>
    </section>
    <!--Pie de pagina-->
    <footer class="footer" data-aos="fade-up" data-aos-duration="600">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 text-center">
                    <img src="../../assets/img/noticias_elite.webp" class=" img-fluid mb-4" width="420px">
                </div>
                
                <div class="col-lg-2 col-md-4 col-6 mb-4 text-center" data-aos="fade-up" data-aos-duration="600">
                    <h5 class="mb-3">Enlaces</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="../../index.php" class="text-white text-decoration-none"><i class="bi bi-house me-2"></i>INICIO</a></li>
                        <li class="mb-2"><a href="#Titulares" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>NOTICIAS</a></li>
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
                        <li class="mb-2"><a href="Titulares_corazon.php" class="text-white text-decoration-none"><i class="bi bi-heart me-2"></i>CORAZON</a></li>
                        <li class="mb-2"><a href="Titulares_informativos.php" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>INFORMATIVOS</a></li>
                        <li class="mb-2"><a href="Titulares_delicias.php" class="text-white text-decoration-none"><i class="bi bi-egg-fried me-2"></i>DELICIAS</a></li>
                        <li class="mb-2"><a href="Titulares_gamer.php" class="text-white text-decoration-none"><i class="bi bi-controller me-2"></i>GAMING</a></li>
                        <li class="mb-2"><a href="#inicio" class="text-white text-decoration-none"><i class="bi bi-people me-2"></i>ÉLITE</a></li>
                    </ul>
                </div>
          
                <div class="col-lg-2 col-md-4 mb-4 text-center" data-aos="fade-up" data-aos-duration="600">
                    <h5 class="mb-3">¡Visita nuestro canal oficial!</h5>
                    <a href="https://discord.gg/By3qXUgV5P" target="_blank" class="text-white btn élite "> <i class="fab fa-discord "></i></a>                  
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
  
</body>
</html>