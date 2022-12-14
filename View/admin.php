<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '\..\View\generales.php';
include_once __DIR__ . '\..\Controller\UsuarioController.php';
include_once __DIR__ . '\..\Controller\AdminController.php';


// $datos = ConsultaCantidaTablas();
?>

<!DOCTYPE html>

<head>
    <!-- title -->
    <title>Administración</title>

    <?php
    pages();
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
                        <nav class="main-menu navbar-expand topbar">
                            <ul>
                                <li><a href="../index.php">Inicio</a></li>
                                <li><a href="acerca.php">Acerca De</a></li>
                                <li><a href="catalogo.php">Catálogo</a></li>
                                <li><a href="contact.php">Contacto</a></li>

                                <li class="current-list-item"><a href="admin.php">Administración</a></li>

                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="cart.html"><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>
                                        <a class="usuario" href="login.php"><i class="fas fa-user"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Buscar Por:</h3>
                            <input type="text" placeholder="Palabras Clave:">
                            <button type="submit">Buscar <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Vistazo y Administración de Tablas</p>
                        <h1>Administración</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <div class="mt-150 mb-150">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Content Row -->
                        <?php
                        if ($result = CantidadDeDatosEnTablas()) {
                        ?>
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <a class="col-xl-3 col-md-6 mb-4" href ="BitacoraConsulta.php">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Bitácoras</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Cantidad:
                                                    <?php echo htmlentities($result['pBitacora']); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- Earnings (Monthly) Card Example -->
                            <!--<div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Cantones</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Cantidad:
                                                    <?php echo htmlentities($result['pCanton']); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-location-arrow fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            <!-- Earnings (Monthly) Card Example -->
                            <a class="col-xl-3 col-md-6 mb-4" href="CategoriaConsulta.php">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Categorías del Producto
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        Cantidad:
                                                        <?php echo htmlentities($result['pCategorias']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-edit fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </a>

                            <!-- Pending Requests Card Example -->
                            <a class="col-xl-3 col-md-6 mb-4" href="DetalleConsulta.php">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Detalles de Facturas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Cantidad:
                                                    <?php echo htmlentities($result['pDetalles']); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>


                            <a class="col-xl-3 col-md-6 mb-4" href="DireccionConsulta.php">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Direcciones</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Cantidad:
                                                    <?php echo htmlentities($result['pDireccion']); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-globe fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </a>

                            <!--<div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Distritos</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Cantidad:
                                                    <?php echo htmlentities($result['pDistrtos']); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-map fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            
                            <a class="col-xl-3 col-md-6 mb-4" href="FacturaConsulta.php">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Facturas
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            Cantidad:
                                                            <?php echo htmlentities($result['pFacturas']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </a>
                            <!-- Pending Requests Card Example -->
                            <a class="col-xl-3 col-md-6 mb-4" href="FarmaciaConsulta.php">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Farmacias</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Cantidad:
                                                    <?php echo htmlentities($result['pFarmacia']); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hospital fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="col-xl-3 col-md-6 mb-4" href="PrecaucionConsulta.php">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Precauciones</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Cantidad:
                                                    <?php echo htmlentities($result['pPrecaucion']); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="col-xl-3 col-md-6 mb-4" href="ProductoConsulta.php">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Productos</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Cantidad:
                                                        <?php echo htmlentities($result['pProductos']); ?>
                                                    </div>
                                                </div>

                                                <div class="col-auto">
                                                    <i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </a>

                            <!--
                                <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Provincias
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        Cantidad:
                                                        <?php echo htmlentities($result['pProvincias']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-map-marker fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        -->

                            <!-- Pending Requests Card Example -->
                            <a class="col-xl-3 col-md-6 mb-4" href="RolConsulta.php">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Roles</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Cantidad:
                                                    <?php echo htmlentities($result['pRoles']); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-id-card fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="col-xl-3 col-md-6 mb-4" href="UsuarioAdmin.php">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Usuarios</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Cantidad:
                                                    <?php echo htmlentities($result['pUsuarios']); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </a>


                        </div>
                        <?php } ?>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </div>

    <div class="mb-150"></div>

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
                            <li><a href="https://es-la.facebook.com/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/?lang=es" target="_blank"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="https://cr.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </li>
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

</body>

</html>