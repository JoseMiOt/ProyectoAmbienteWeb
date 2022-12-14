<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
</style>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once __DIR__ . '\..\View\generales.php';
include_once __DIR__ . '\..\Controller\UsuarioController.php';
include_once __DIR__ . '\..\Controller\AdminController.php';


?>


<head>
  <!-- title -->
  <title>Usuarios</title>

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
                    <a class="shopping-cart" href="carrito.php"><i class="fas fa-shopping-cart"></i></a>
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
            <p>Visualiza, actualiza, agrega o elimina la información de los usuarios</p>
            <h1>Usuarios</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end breadcrumb section -->
  
<!----------------------------------------------------- Tabla -------------------------------------- -->
  <br />
  <div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="btn-group pull-left">
        <a href="UsuarioAgregar.php"><button type="button" class="btn btn-primary">Agregar Usuario</button></a>
      </div>
      <br/> <br />
 

<div class="table-responsive"> 
      <table id="tablaUsuarios" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Usuario</th>
            <th>Coreo </th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
          </tr>

        </thead>
        <tbody>
          <?php
          ConsultarUsuarios();
          ?>
        </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>
 <!-------------------------------------- Fin tabla ------------------------------------------->

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