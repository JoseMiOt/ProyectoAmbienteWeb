<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '\generales.php';
include_once __DIR__ . '\..\Controller\UsuarioController.php';
include_once __DIR__ . '\..\Controller\ProductoController.php';

$datos = DatosProductosCarrito($_SESSION["sesionId"]);
$datosUser = DatosUsuarioCarrito($_SESSION["sesionId"]);
?>

<!DOCTYPE html>

<head>

    <!-- title -->
    <title>Compra</title>

    <?php
    pagesCompra();
    ?>

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="../index.php">
                                <img src="../assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <?php
                                if ($_SESSION != null) {
                                    echo "Bienvenido ", $_SESSION["sesionNombre"];

                                    if ($_SESSION["sesionTipoRol"] == 1) {
                                        echo '<li><a href="../index.php">Inicio</a></li>
											<li><a href="acerca.php">Acerca De</a></li>
											<li><a href="catalogo.php">Catálogo</a></li>
											<li><a href="contact.php">Contacto</a></li>
											<li><a href="admin.php">Administración</a></li>';
                                    } else if ($_SESSION["sesionTipoRol"] == 2) {
                                        echo '<li><a href="../index.php">Inicio</a></li>
											<li><a href="acerca.php">Acerca De</a></li>
											<li><a href="catalogo.php">Catálogo</a></li>
											<li><a href="contact.php">Contacto</a></li>';
                                    }
                                } else {
                                    echo '<li><a href="../index.php">Inicio</a></li>
										<li><a href="acerca.php">Acerca De</a></li>
										<li><a href="catalogo.php">Catálogo</a></li>
										<li><a href="contact.php">Contacto</a></li>';
                                }
                                ?>
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="carrito.php"><i class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="busqueda.php"><i class="fas fa-search"></i></a>
                                        <a class="usuario" href="login.php"><i class="fas fa-user"></i></a>
                                        <a class="usuario" href="login.php"><i class="fas fa-sign-out-alt"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->


    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>La Alegría De Comprar Medicamentos</p>
                        <h1>Compra</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- compra -->

    <div class="row">
        <div class="col-75">
            <div class="container-compra">
                <form action="/action_page.php">

                    <div class="row-compra">
                        <div class="col-50">
                            <h3>Detalles de facturación</h3>
                            <label for="fname"><i class="fa fa-user"></i> Nombre Completo</label>
                            <input type="text" id="fname" name="firstname" value=<?php echo $datosUser["Nombre"] ?>>
                            <label for="email"><i class="fa fa-envelope"></i> Correo</label>
                            <input type="text" id="email" name="email" value=<?php echo $datosUser["Correo"] ?> >
                            <label for="adr"><i class="fa fa-address-card-o"></i> Dirección</label>
                            <input type="text" id="adr" name="address" placeholder="Dirección">
                            <label for="city"><i class="fa fa-institution"></i> Provincia</label>
                            <input type="text" id="city" name="city" placeholder="Provincia">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">Cantón</label>
                                    <input type="text" id="state" name="state" placeholder="Cantón">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Codigo Postal</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Pago</h3>
                            <label for="fname">Tarjetas aceptadas</label>
                            <div class="icon-container-compra">
                                <i class="fab fa-cc-visa" style="color:navy;"></i>
                                <i class="fab fa-cc-amex" style="color:blue;"></i>
                                <i class="fab fa-cc-mastercard" style="color:red;"></i>
                                <i class="fab fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Nombre del titular</label>
                            <input type="text" id="cname" name="cardname" placeholder="Nombre del titular">
                            <label for="ccnum">Número de tarjeta</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Mes de expiración</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="01">

                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Año de expiración</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="22">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="123">
                                </div>
                            </div>
                        </div>

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Envío a la misma dirección de la factura
                    </label>
                    <form $_POST></form>
                        <form action="" method="post">
                        <input type="submit" class="submit" value="Realizar compra" id="btn_Comprar" name="btn_Comprar">
                        <b><?php $datos["cantidad"] ?></b>
                        </form>
                </form>
            </div>
        </div>

        <div class="col-25">
            <div class="container-compra">
                <h4>Total
                    <span class="price" style="color:black">
                        <i class="fa fa-shopping-cart"></i>
                        <b><?php echo $datos["cantidad"] ?></b>
                    </span>
                </h4>
                <hr>
                <p>Total <span class="price" style="color:black"><b>₡<?php echo $datos["Total"] ?></b></span></p>
            </div>
        </div>
    </div>

    <!-- end compra -->


    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2022, All Rights Reserved.<br>
                        Distribuido Por - Equipo de Desarrollo #3
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="https://es-la.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/?lang=es" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://cr.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <?php
    pagesFooter();
    ?>
    <script src="../assets/js/elimbutton.js"></script>

</body>

</html>