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
  <title>Actualizar precauciones</title>

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
            <p>Actualiza la información de las precauciones de los medicamentos</p>
            <h1>Precauciones</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end breadcrumb section -->

  <br />
    <div class="container">
    <?php

      $id_precaucion= intval($_GET['id']);
      if ($result = ConsultarPrecaucionID($id_precaucion)) {
    ?>

    <form action = "" method="post">

    <div class="row">
      <div class="col-md-4"><b>ID</b>
        <input type="text" name="id" value="<?php echo htmlentities($result['id_precaucion']); ?>"class="form-control" required readonly>
      </div>

      <div class="col-md-4"><b>Efectos Secundarios</b>
        <input type="text" name="Efectos" value="<?php echo htmlentities($result['efectos_secundarios']); ?>"class="form-control" required autocomplete="Off">
      </div>
                    
      <div class="col-md-4"><b>Fecha de Expiración</b>
          <input type="text" name="Fecha" value="<?php echo htmlentities($result['fecha_expiracion']); ?>"class="form-control" required autocomplete="Off">
      </div>
    </div>

    <div class="row">
      <div class="col-md-4"><b>Producto</b>
        <input type="text" name="Producto" value="<?php echo htmlentities($result['id_producto']); ?>"class="form-control" required autocomplete="Off">
      </div> 
    </div> 

    <?php } ?>
    </br>  
    <div style="margin-top:1%; text-align:center">
            <input type="submit" name="update-precaucion" value="Actualizar">
    </div>
                  
    </div>
    </form>
      </div>
    </div> 

  <!-- copyright -->
  <div class="mb-150"></div>
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
