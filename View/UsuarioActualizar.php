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
  <title>Actualizar Usuario</title>

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
            <p>Actualiza la información del usuario</p>
            <h1>Usuarios</h1>
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
// Get the userid
$userid = intval($_GET['id']);
if ($result = ConsultarUsuario($userid)) {
?>
        <form action="../Controller/AdminController.php" method="post">
            <input type="hidden" name=id value="<?php echo $userid; ?>">

            <div class="row">
                <div class="col-md-4"><b>Nombre</b>
                    <input type="text" name="nombre" value="<?php echo htmlentities($result['nombre']); ?>"
                        class="form-control" required>
                </div>

                <div class="col-md-4"><b>apellidos</b>
                    <input type="text" name="apellidos" value="<?php echo htmlentities($result['apellidos']); ?>"
                        class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"><b>usuario</b>
                    <input type="text" name="usuario" value="<?php echo htmlentities($result['usuario']); ?>"
                        class="form-control" required>
                </div>

                <div class="col-md-4"><b>correo</b>
                    <input type="email" name="correo" value="<?php echo htmlentities($result['correo']); ?>"
                        class="form-control" maxlength="10" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"><b>Clave</b>
                    <input type="text" name="clave" value="<?php echo htmlentities($result['clave']); ?>"
                        class="form-control" required>
                </div>

                <div class="col-md-4"><b>rol</b>
                    <input type="text" name="id_rol" value="<?php echo htmlentities($result['id_rol']); ?>"
                        class="form-control" maxlength="10" required>
                </div>
            </div>
            <?php } ?>

            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input type="submit" name="update-usuario" value="Actualizar">
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