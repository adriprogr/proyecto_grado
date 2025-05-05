<?php
    include_once '../PHP/conexion.php';
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/Noticias_delicias.css">
    <link rel="stylesheet" href="../../assets/css/Noticias_movil.css">
</head>
<body>
    <section class="cabecera" id="inicio"> <!--Contenedor que inclute el fondo del header y que contendra toda la estructura del header con sus elementos-->
        <!-- Barra de navegacion-->
        <nav class="navbar navbar-expand-md "> <!--Empiezo a definir el header diciendo que se va a expandir hasta los dispositivos medianos-->
            <div class="container-fluid d-flex justify-content-between align-items-center"> <!--Contenedor donde se ajojara todo el contenido. Estos tienen estilos de bootstrap aplicando un display flex donde el contenido estara separado entre ellos-->
                <!-- Logo -->
                <a href="Titulares_delicias.php">
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
                    <div class="offcanvas-body text-center">
                        <ul class="navbar-nav justify-content-end flex-grow-1 3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Incio</a>
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

    <section class="container titular mt-4">
        <?php
            if(isset($_GET['id_titular'])){
                $id_titular = $_GET['id_titular']; 
            } else {
                $id_titular = 0;
            }

            if($id_titular > 0) {
                $consulta = "SELECT * FROM noticias where id_titular = $id_titular";
                $resultado = mysqli_query($conexion, $consulta);

                if(mysqli_num_rows($resultado) > 0) {
                    while($row = mysqli_fetch_assoc($resultado)) {
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
    
    <section class="container">
        <h1 class="text-center">Mas noticias</h1>
        <div class="row">
            <div class="col-lg-4">
                <div class="carta">
                    <img class="clave rounded" src="../../assets/img/fondo_delicias.webp" alt="Imagen de artículo">
                    <img class="logito" src="../../assets/img/portal_delicias.webp"  alt="Logo del portafolio">
                    <div class="texto-carta">
                        <span class="categoria">DELICIAS</span>
                        <h2 class="titulo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, doloremque!</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="Noticias_delicias.php" class="btn">¡Quiero saber más!</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="carta">
                    <img class="clave rounded" src="../../assets/img/fondo_delicias.webp" alt="Imagen de artículo">
                    <img class="logito" src="../../assets/img/portal_delicias.webp"  alt="Logo del portafolio">
                    <div class="texto-carta">
                        <span class="categoria">DELICIAS</span>
                        <h2 class="titulo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, doloremque!</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="Noticias_delicias.php" class="btn">¡Quiero saber más!</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="carta">
                    <img class="clave rounded" src="../../assets/img/fondo_delicias.webp" alt="Imagen de artículo">
                    <img class="logito" src="../../assets/img/portal_delicias.webp"  alt="Logo del portafolio">
                    <div class="texto-carta">
                        <span class="categoria">DELICIAS</span>
                        <h2 class="titulo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, doloremque!</h2>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <a href="Noticias_delicias.php" class="btn">¡Quiero saber más!</a>
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
                    <img src="../../assets/img/noticias_delicias.webp" class="img-fluid mb-4" width="400px;">
                </div>
                
                <div class="col-lg-2 col-md-4 col-6 mb-4">
                    <h5 class="mb-3">Enlaces</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.php" class="text-white text-decoration-none"><i class="bi bi-house me-2"></i>INICIO</a></li>
                        <li class="mb-2"><a href="Titulares_delicias.php" class="text-white text-decoration-none"><i class="bi bi-newspaper me-2"></i>NOTICIAS</a></li>
                        <?php
                            if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['id_rol'])){
                                $rol = $_SESSION['id_rol'];
                                if ($rol == 1){
                                    echo ' 
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hola, ' . htmlspecialchars($_SESSION['nombre_usuario']) . '</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../PHP/cerrar_sesion.php">Cerrar Sesion</a></li>
                                            <li><a class="dropdown-item" href="../../REGISTRO/HTML/registro.php">Registro</a></li>
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
                                </li>
                                ';
                            }       
                        ?>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4 col-6 mb-4">
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

         
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>