<?php
    include_once '../../../../CONEXION/conexion.php';
    session_start();

    if(!isset($_SESSION['nombre_usuario']) || $_SESSION['id_rol'] != 1) {
        header("Location: ../../../../../usuarios/INICIO/PHP/Inicio.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../CSS/Titulares/Titulares_gamer.css">
    <link rel="stylesheet" href="../../CSS/Titulares/Titulares_movil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <section class="cabecera" id="inicio">
        <!--Contenedor que inclute el fondo del header y que contendra toda la estructura del header con sus elementos-->
        <!-- Barra de navegacion-->
        <nav class="navbar navbar-expand-md "> <!--Empiezo a definir el header diciendo que se va a expandir hasta los dispositivos medianos-->
            <div class="container-fluid d-flex justify-content-between align-items-center"> <!--Contenedor donde se ajojara todo el contenido. Estos tienen estilos de bootstrap aplicando un display flex donde el contenido estara separado entre ellos-->
                <!-- Logo -->
                <a href="Titulares_gamer.php">
                    <img class="logo" src="../../imagenes/image-removebg-preview (40).png" width="320px">
                </a>
                <!-- Menu que se activa cuando llege a su limite. Aqui especifico el boton que sera de tipo offcanvas(diseño de bootstrap) para abrir el panel lateral -->
                <button class="navbar-toggler btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span> <!--Defino como va a ser el logo. En este caso sera un icono con tres rayas laterales(icono de bootstrap)-->
                </button>
                <!-- Aqui especifico donde se va a ubicar el menu lateral(El icono) que sera en el final de la pagina(es decir, derecha). A su vez detallare que cosas se alojara dentro del mismo-->
                <div class="offcanvas offcanvas-end" id="offcanvasNavbar">
                    <!--Aqui detallamos la cabecera del menu offcanvas. En la cabecera tendra una imagen con el logo de la pagina que corresponda(puesto que habra varios logos) y un boton para cerrar dicho menu-->
                    <div class="offcanvas-header">
                        <img class="img-fluid" src="../../imagenes/image-removebg-preview (40).png" width="280px">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <!--Al igual que detalle antes la cabeza del header hare lo mismo con el body. Este contendra 4 enlaces(De momento) y 1 boton que me redirigira automaticamente al apartado de mas infomacion sobre la web-->
                    <div class="offcanvas-body text-center">
                        <ul class="navbar-nav justify-content-end flex-grow-1 3">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#inicio">Incio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#Titulares">Noticias</a>
                            </li>
                            <?php
                            if(isset($_SESSION['nombre_usuario'])){
                                echo '  
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../../../../CERRAR_SESION/cerrar_sesion.php">Cerrar Sesion</a></li>
                                            <li><a class="dropdown-item" href="../../../../REGISTRO/HTML/registro.php">Registro</a></li>
                                        </ul>
                                    </li>
                                ';
                            } else {      
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="../../../../REGISTRO/HTML/registro.html">Iniciar Sesion/Registrarse</a>
                                </li>
                                <?php
                            }
                            ?>    
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class=" contenido-texto container-fluid">
            <h1>¡Bienvenidos a Portal Informativo donde estaras actualizado sobre las ultimas novedades que pasan en el mindo </h1>
            <p>En este Portal encontraras noticias de muchos temas diversos que pasan en el mundo como politica, deportes, actualidad, economia entre otros.</p>    
            <a href="#Titulares"><button type="button" class="btn btn-lg">¡Echar un vistazo!</button></a>
            <button class="btn btn-primary disposicion"  data-bs-target="#modal1" data-bs-toggle="modal" >Agregar Titular Y Noticia</button>
            <!--Seccion de agregar titulares y noticias -->
            <div class="modal fade" id="modal1"> <!--Abrimos la etiqueta modal-->
                <div class="modal-dialog modal-dialog-centered"> <!--Especificamos el entorno de la modal-->
                    <div class="modal-content"> <!--Contenido de la modal-->

                        <div class="modal-header"> <!--Cabecera de la modal-->
                            <img src="../../imagenes/logo5.png" class="img-fluid" width="120px" alt="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body d-flex justify-content-center align-items-center"><!--Cuerpo de la modal-->
                            <form action="../titulares_noticias/titulares_noticias.php" method="POST" enctype="multipart/form-data">
                                <!--Titulares-->
                                <h1 class="text-center mb-4">Titular</h1>                             0  
                                <!-- El id de titulares vale tanto para noticias como titulares -->

                                <div class="mb-3">
                                    <label for="id_titular" class="form-label">Introduzca el id que tendra el titular</label>
                                    <input type="number" class="form-control"  name="id_titular" placeholder="id del Titular" required>
                                </div>

                                <div class="mb-3">
                                    <label for="Titulo" class="form-label">Introduzca el nombre que tendra el titular</label>
                                    <input type="text" class="form-control"  name="nombre_titular" placeholder="Nombre del Titular" required>
                                </div>

                                <div class="mb-3">
                                    <label for="Introduccion" class="form-label">Introduzca una breve Introduccion a la noticia</label>
                                    <input type="text" class="form-control"  name="introduccion"  placeholder="Breve Introduccion"required>
                                </div>
                              
                                <div class="mb-3">
                                    <label for="Fecha" class="form-label">Introduzca la fecha de la noticia</label>
                                    <input type="date" class="form-control"  name="fecha"  placeholder="Breve Introduccion"required>
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
                                    <input type="text" class="form-control"  name="titulo_1" placeholder="Titulo Princiapl" required>
                                </div>

                                <div class="mb-3">
                                    <label for="Fecha" class="form-label">Introduzca la fecha de la noticia</label>
                                    <input type="date" class="form-control"  name="fecha"  placeholder="Breve Introduccion" required>
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
                                <input type="hidden" name="id_categoria" value="4"> <!-- El valor 4 hace referencia a la categoria gamer de la base de datos -->


                                <input type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Carrusel-->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
  
        <div class="carousel-inner" id="Titulares" data-bs-interval="5000">
            <h1 class="text-center">Noticias Destacadas</h1>
            <div class="carousel-item active">
                <img src="../../imagenes/delicias.png" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptas?</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam, dicta?</p>
                    <a href="../Noticias/Noticias_gamer.php" class="btn">¡Quiero saber más!</a>
                </div>
            </div>
        
            <div class="carousel-item" data-bs-interval="5000">
                <img src="../../imagenes/DELICIAS.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptas?</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam, dicta?</p>
                    <a href="../Noticias/Noticias_gamer.php" class="btn">¡Quiero saber más!</a>
                </div>
            </div>

      
            <div class="carousel-item" data-bs-interval="5000">
                <img src="../../imagenes/Header.png" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, voluptas?</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam, dicta?</p>
                    <a href="../Noticias/Noticias_gamer.php" class="btn">¡Quiero saber más!</a>
                </div>
            </div>
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

    <!--Mas noticias-->
    <section class="container ">

        <h1 class="text-center">Mas noticias</h1>
        <div class="row">
            <div class="col-lg-4">
                <div class="carta">
                    <img class="clave" src="../../imagenes/DELICIAS.jpg" alt="Imagen de artículo">
                    <img class="logito" src="../../imagenes/logo5.png"  alt="Logo del portafolio">
                    <div class="texto-carta">
                        <span class="categoria">GAMER</span>
                        <h2 class="titulo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, doloremque!</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="../Noticias/Noticias_gamer.php" class="btn">¡Quiero saber más!</a>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-4 col-md-6">
                <div class="carta">
                    <img class="clave" src="../../imagenes/DELICIAS.jpg" alt="Imagen de artículo">
                    <img class="logito" src="../../imagenes/logo5.png"  alt="Logo del portafolio">
                    <div class="texto-carta">
                        <span class="categoria">GAMER</span>
                        <h2 class="titulo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, doloremque!</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="../Noticias/Noticias_gamer.php" class="btn">¡Quiero saber más!</a>
                  </div>
                </div>
            </div>
        
            <div class="col-lg-4 col-md-6">
                <div class="carta">
                    <img class="clave" src="../../imagenes/DELICIAS.jpg" alt="Imagen de artículo">
                    <img class="logito" src="../../imagenes/logo5.png"  alt="Logo del portafolio">
                    <div class="texto-carta">
                        <span class="categoria">GAMER</span>
                        <h2 class="titulo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, doloremque!</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="../Noticias/Noticias_gamer.php" class="btn">¡Quiero saber más!</a>
                  </div>
                </div>
            </div>


        
            <div class="col-lg-4">
                <div class="carta">
                    <img class="clave" src="../../imagenes/DELICIAS.jpg" alt="Imagen de artículo">
                    <img class="logito" src="../../imagenes/logo5.png"  alt="Logo del portafolio">
                    <div class="texto-carta">
                        <span class="categoria">GAMER</span>
                        <h2 class="titulo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, doloremque!</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="../Noticias/Noticias_gamer.php" class="btn">¡Quiero saber más!</a>
                  </div>
                </div>
            </div>
        
            <div class="col-lg-4 col-md-6">
                <div class="carta">
                    <img class="clave" src="../../imagenes/DELICIAS.jpg" alt="Imagen de artículo">
                    <img class="logito" src="../../imagenes/logo5.png"  alt="Logo del portafolio">
                    <div class="texto-carta">
                        <span class="categoria">GAMER</span>
                        <h2 class="titulo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, doloremque!</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="../Noticias/Noticias_gamer.php" class="btn">¡Quiero saber más!</a>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-4 col-md-6">
                <div class="carta">
                    <img class="clave" src="../../imagenes/DELICIAS.jpg" alt="Imagen de artículo">
                    <img class="logito" src="../../imagenes/logo5.png"  alt="Logo del portafolio">
                    <div class="texto-carta">
                        <span class="categoria">GAMER</span>
                        <h2 class="titulo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, doloremque!</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="../Noticias/Noticias_gamer.php" class="btn">¡Quiero saber más!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Pie de pagina-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <img src="../../imagenes/image-removebg-preview (40).png" class="img-fluid mb-4" width="400px;">
                </div>

                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <h5 class="mb-3">Enlaces</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="../../../../INICIO/PHP/Inicio.php" class="text-white text-decoration-none"><i class="bi bi-house me-2"></i>INICIO</a></li>
                        <li class="mb-2"><a href="#Titulares" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>NOTICIAS</a></li>
                        <?php
                        if(isset($_SESSION['nombre_usuario'])){
                            echo '  
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../../../CERRAR_SESION/cerrar_sesion.php">Cerrar Sesion</a></li>
                                        <li><a class="dropdown-item" href="../../../../REGISTRO/HTML/registro.php">Registro</a></li>
                                        
                                    </ul>
                                </li>
                            ';
                        } else {      
                            ?>
                                <li class="mb-2"><a href="../../../../REGISTRO/HTML/registro.html" class="text-white text-decoration-none"><i class="bi bi-box-arrow-in-right me-2"></i>INICIAR SESION / REGISTRARSE</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
          
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <h5 class="mb-3">Categorias</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="../../../CORAZON/PHP/Titulares/Titulares_corazon.php" class="text-white text-decoration-none"><i class="bi bi-heart me-2"></i>CORAZÓN</a></li>
                        <li class="mb-2"><a href="../../../INFORMATIVOS/PHP/Titulares/Titulares_informativos.php" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>INFORMATIVOS</a></li>
                        <li class="mb-2"><a href="../../../DELICIAS/PHP/Titulares/Titulares_delicias.php" class="text-white text-decoration-none"><i class="bi bi-egg-fried me-2"></i>DELICIAS</a></li>
                        <li class="mb-2"><a href="#inicio" class="text-white text-decoration-none"><i class="bi bi-controller me-2"></i>GAMING</a></li>
                        <?php
                        if(isset($_SESSION['nombre_usuario'])) {
                            ?>
                                <li class="mb-2"><a href="../../../ELITE/PHP/Titulares/Titulares_Elite.php" class="text-white text-decoration-none"><i class="bi bi-people me-2"></i>ÉLITE</a></li>
                            <?php
                        } else {
                            ?>
                                <li class="mb-2"><a href="" class="text-white text-decoration-none"  onclick="alert('Debes iniciar sesion para acceder a este portal')"><i class="bi bi-people me-2"></i>ÉLITE</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
          
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3">¡Visita nuestras redes sociales!</h5>
                    <div class="d-flex gap-3 mb-3">
                        <div class="social-buttons">
                            <button class="social-btn facebook">
                                <a href="https://facebook.com" target="_blank" class="text-white"> <i class="bi bi-facebook fs-5"></i></a>
                            </button>
                            
                            <button class="social-btn twitter">
                                <a href="https://x.com" target="_blank" class="text-white"><i class="bi bi-twitter fs-5"></i></a>
                            </button>
                
                            <button class="social-btn instagram">
                                <a href="https://instagram.com" target="_blank" class="text-white"><i class="bi bi-instagram fs-5"></i></a>  
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  
</body>
</html>