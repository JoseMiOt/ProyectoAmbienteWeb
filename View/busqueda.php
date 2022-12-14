<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include_once __DIR__ . '\generales.php';
include_once __DIR__ . '\..\Controller\ProductoController.php';
?>

<!DOCTYPE html>

<head>
	<!-- title -->
	<title>Búsqueda</title>

	<?php
	pages();
	?>
</head>

<body>
	<!--<iframe class="navbar" src="navbar.php"></iframe>-->
	<!--PROBAR DESPLAZAR TODOS LOS MENUS A UN SOLO HTML-->

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
										<li class="current-list-item"><a href="acerca.php">Acerca De</a></li>
										<li><a href="catalogo.php">Catálogo</a></li>
										<li><a href="contact.php">Contacto</a></li>
										<li><a href="admin.php">Administración</a></li>';
									} else if ($_SESSION["sesionTipoRol"] == 2) {
										echo
										'<li><a href="../index.php">Inicio</a></li>
										<li class="current-list-item"><a href="acerca.php">Acerca De</a></li>
										<li><a href="catalogo.php">Catálogo</a></li>
										<li><a href="contact.php">Contacto</a></li>';
									}
								} else {
									echo
									'<li><a href="../index.php">Inicio</a></li>
										<li class="current-list-item"><a href="acerca.php">Acerca De</a></li>
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
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
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
						<h1>Busqueda de artículos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<table id="tablaProductos" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Marca</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Cantidad disponible</th>
				<th>Precio</th>
				<th>Imagen</th>
				<th>Tipo</th>
				<th>Farmacia</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			ListarProductos();
			?>
		</tbody>
	</table>

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

	<script>
		$(document).ready(function() {
			$('#tablaProductos').DataTable({
				language: {
					url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
				}
			});
		});
	</script>
	<script src="../assets/js/button.js"></script>

</body>

</html>