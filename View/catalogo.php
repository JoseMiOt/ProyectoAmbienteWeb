<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}
	include_once __DIR__ . '\generales.php';
	include_once __DIR__ . '\..\Controller\UsuarioController.php';
	include_once __DIR__ . '\..\Controller\ProductoController.php';
?>

<!DOCTYPE html>

<head>
	<title>FarmaWeb</title>
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
		<?php
		if ($_SESSION != null) {
		?>
		<div class="container">
			<div class="btn-menu">
				<label for="btn-menu">☰</label>
			</div>

			<input type="checkbox" id="btn-menu">
			<div class="container-menu">
				<div class="cont-menu">
					<nav>
						<a href="perfil.php">
						<?php
							if ($_SESSION != null) {
								echo "Bienvenido ", $_SESSION["sesionNombre"];
								}
						?>
						</a>
						<br>
						<a>
							<?php
							if ($_SESSION != null) {?>
								<form action="" method="post">
									<input type="submit" class="submit" value="Cerrar Sesión" id="btn_Cerrar" name="btn_Cerrar">
								</form>
							
							<?php
								}
							?>
						</a>
					</nav>
					<label for="btn-menu">✖️</label>
				</div>
			</div>
		</div>	
		<?php
		}
		?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">	
						<?php //Mejorar color, forma de visualización
							if ($_SESSION == null) {
						?>
							<!-- logo -->
							<div class="site-logo">
								<div href="">
									<img src="../assets/img/logo.png" alt="">
								</div>
							</div>
						<?php
							}
						?>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<?php //Mejorar color, forma de visualización
									if ($_SESSION != null) {
	
										if ($_SESSION["sesionTipoRol"] == 1) {
											echo '<li><a href="../index.php">Inicio</a></li>
											<li><a href="acerca.php">Acerca De</a></li>
											<li class="current-list-item"><a href="">Catálogo</a></li>
											<li><a href="contact.php">Contacto</a></li>
											<li><a href="admin.php">Administración</a></li>';
										} else if ($_SESSION["sesionTipoRol"] == 2) {
											echo
											'<li><a href="../index.php">Inicio</a></li>
											<li><a href="acerca.php">Acerca De</a></li>
											<li class="current-list-item"><a href="">Catálogo</a></li>
											<li><a href="contact.php">Contacto</a></li>';
										}
									}
									else{
										echo '<li><a href="../index.php">Inicio</a></li>
										<li><a href="acerca.php">Acerca De</a></li>
										<li class="current-list-item"><a href="">Catálogo</a></li>
										<li><a href="contact.php">Contacto</a></li>';
									}
									?>
									
								<li>
									<div class="header-icons">
										<?php
											if ($_SESSION != null) {
										?>
												<a class="shopping-cart" href="../View/carrito.php"><i class="fas fa-shopping-cart"></i></a>
										<?php
											}else{
										?>
												<a class="shopping-cart" href="../View/login.php"><i class="fas fa-shopping-cart"></i></a>
										<?php
											}
										?>
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
							<input type="text" placeholder="Palabras Clave">
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
						<p>Nuestra capacidad a su disposición</p>
						<h1>Catálogo</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">


			<div class="row product-lists">
				<?php
				ConsultaProductos();
				?>
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a class="active" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->


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
	<script src="../assets/js/button.js"></script>

</body>

</html>