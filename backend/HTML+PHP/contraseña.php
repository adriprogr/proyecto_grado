<?php
    include_once '../PHP/conexion.php';
    session_start();


?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <link rel="stylesheet" href="../../assets/CSS/login_movil.css">
    <link rel="icon" type="image/x-icon" href="../../assets/icons/portal_noticias.ico">



</head>
<body>
    
    <div class="row">
        <!--Columna de logos con un espacio de 5 columnas de las 12-->
        <div class="fondo col-lg-5 d-flex justify-content-center p-4"> <!--Animaciones cuadrado con el color de cada logo-->
            <div class="cuadrado uno"></div>
            <div class="cuadrado dos"></div>
            <div class="cuadrado tres"></div>
            <div class="cuadrado cuatro"></div>
            <div class="cuadrado cinco"></div>
            <div class="cuadrado seis"></div>
           
            <div class="container-fluid d-flex flex-column align-items-center">
                <!--Logo Principal-->
                <div class="caja-logo">
                    <img src="../../assets/img/portal_noticias.webp" class="img-fluid" width="200px" alt="">
                </div>

                <!--Logos Secundarios-->

                <div class="categorias">
                    <div class="caja-logo">
                        <img src="../../assets/img/portal_corazon.webp" alt="" class="img-fluid" width="200px">
                    </div>

                    <div class="caja-logo">
                        <img src="../../assets/img/portal_informativos.webp" alt="" class="img-fluid" width="200px">
                    </div>

                    <div class="caja-logo">
                        <img src="../../assets/img/portal_delicias.webp" alt="" class="img-fluid" width="200px">
                    </div>

                    <div class="caja-logo">
                        <img src="../../assets/img/portal_gaming.webp" alt="" class="img-fluid" width="200px">
                    </div>
                </div>

                <!--Animacion del signo +-->

                <div class="signo" >
                    <i class="bi bi-plus-lg"></i>
                </div>

                <div class="caja-logo" >
                    <img src="../../assets/img/portal_elite.webp" alt="Logo Principal" class="img-fluid" width="200px">
                </div>  
            </div>
        </div>

        <div class="formulario2 col-lg-7 d-flex align-items-center justify-content-center p-4">
            <div class="sesion">                 
                <div class="card-body p-4">
                    <h2 class="text-center fw-bold">Cambiar la contraseña</h2>
                    <p class="text-center">¿Te has olvidado la contraseña? No te preocupes. Introduce el correo vinculado a tu cuenta para establecer una nueva</p>
                    <form method="post" action="../PHP/recuperar_contrasena.php">
                        <div class="mb-4 input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <?php
                                if(isset($_SESSION['id_rol'])){
                                    echo '<input type="text" name="correo" class="form-control" value="'. htmlspecialchars($_SESSION['email']) .'" readonly>'; 
                                } else {
                                    echo '<input type="text" name="correo" class="form-control" placeholder="Introduce tu correo electronico vinculado a la cuenta que no tengas acceso" required>';
                                }
                            ?>
                        </div>
                        
                        

                        <div class="mb-4 input-group">
                            <span class="input-group-text bg-white">
                                    <i class="bi bi-box-arrow-in-right"></i>
                            </span>
                            <input type="password" name="contrasena" class="form-control" placeholder="Introduce la nueva contraseña" required>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn login-btn btn-lg text-white shadow-sm">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Cambiar contraseña</span>
                            </button>
                        </div>
                            
                    </form>

                    <div class="divider">
                        <span>O si ya te acuerdas</span>
                    </div>

                    
                    <div class="d-grid mb-4">
                        <a type="submit" class="btn login-btn btn-lg text-white shadow-sm" href="../HTML+PHP/sesion.php">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Inicia Sesion</span>
                        </a>
                    </div>

                   

                    <div class="text-center mt-4">
                        <p class="text-muted mb-3 fw-bold">Visita nuestro canal oficial</p>
                        <!-- Botones de redes sociales que antes estaban arriba -->
                        <div class="social-buttons">
                            <a class="social-btn facebook" href="https://discord.gg/By3qXUgV5P">
                                <i class="bi bi-discord fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>