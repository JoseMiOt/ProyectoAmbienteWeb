<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once __DIR__ . '\..\View\generales.php';
include_once __DIR__ . '\..\Controller\UsuarioController.php';
include_once __DIR__ . '\..\Controller\AdminController.php';


?>

<!DOCTYPE html>

<head>
  <!-- title -->
  <title>Actualizar farmacia</title>

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
            <nav class="main-menu">
              <ul>
                <?php //Mejorar color, forma de visualización
                if ($_SESSION != null) {
                  echo "Bienvenido ", $_SESSION["sesionNombre"];
                }
                ?>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="acerca.php">Acerca De</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="contact.php">Contacto</a></li>
                <li><a href="admin.php">Administración</a></li>
                

                <li>
                  <div class="header-icons">
                    <a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <a class="usuario" href="login.php"><i class="fas fa-user"></i></a>
                    <a class="usuario" href="login.php"><i class="fas fa-sign-out-alt"></i></a>
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
            <p>Actualiza la información de la farmacia</p>
            <h1>Farmacia</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end breadcrumb section -->

  <br />

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <?php
        $id_farmacia= intval($_GET['id']);
        if ($result = ConsultarFarmaciaID($id_farmacia)) {
        ?>


                <form action = "" method="post">

                    <div class="row">
                        <div class="col-md-4"><b>ID</b>
                            <input type="text" name="id" value="
                            <?php echo htmlentities($result['id_farmacia']); ?>"
                             class="form-control" required readonly>
                        </div>

                        <div class="col-md-4"><b>Nombre</b>
                            <input type="text" name="Nombre" value=
                            "<?php echo htmlentities($result['nombre_far']); ?>"
                             class="form-control" required >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>Telefono</b>
                            <input type="text" name="Telefono" value="
                            <?php echo htmlentities($result['telefono']); ?>"
                             class="form-control" required >
                        </div>
                        
                        <div class="col-md-4"><b>Horario</b>
                            <input type="text" name="Horario" value=
                            "<?php echo htmlentities($result['horario']); ?>"
                             class="form-control" required >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>ID Direccion</b>
                            <input type="text" name="Direccion" value="
                            <?php echo htmlentities($result['id_direccion']); ?>"
                             class="form-control" required >
                        </div>
                        </div>
                <?php } ?>
                
                <div class="row" style="margin-top:1%">
                    <div class="col-md-8">
                        <input type="submit" name="update-farmacia" value="Actualizar">
                    </div>
                </div>
                </form>
            </div>
    </div>

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

</body>

</html>