<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}
	include_once __DIR__ . '\generales.php';
	include_once __DIR__ . '\..\Controller\UsuarioController.php';
?> 

<!DOCTYPE html>
<head>
	<!-- title -->
	<title>Acerca De</title>

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
									}
									else{
										echo
											'<li><a href="../index.php">Inicio</a></li>
											<li class="current-list-item"><a href="acerca.php">Acerca De</a></li>
											<li><a href="catalogo.php">Catálogo</a></li>
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
						<p>Con nosotros como su apoyo su salud está garantizada</p>
						<h1>Sobre Nosotros</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- featured section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">Escoge <span class="orange-text">FarmaWeb</span></h2>
						<div class="row">
							<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-shipping-fast"></i>
									</div>
									<div class="content">
										<h3>Envío Gratis</h3>
										<p>Te ofrecemos envíos gratis a partir de cierta cantidad de compra para que estés seguro en casa.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-money-bill-alt"></i>
									</div>
									<div class="content">
										<h3>Excelentes Precios</h3>
										<p>Ofrecemos los mejores precios en nuestros productos para que no pierdas la oportunidad.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-briefcase"></i>
									</div>
									<div class="content">
										<h3>Calidad En Productos</h3>
										<p>No te preocupes por la calidad de nuestros productos, nosotros te aseguramos 100% que son lo mejor del mercado.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-sync-alt"></i>
									</div>
									<div class="content">
										<h3>Reembolso</h3>
										<p>¿Tuviste problemas con algún producto? Cuéntanos.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end featured section -->

	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>¡Se acerca Diciembre <br> con grandes <span class="orange-text">Descuentos...</span></h3>
            <div class="sale-percent"><span>Rebajas <br> hasta del</span>50% <span></span></div>
            <a href="shop.html" class="cart-btn btn-lg">Compra Ahora</a>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- team section -->
	<!--<div class="mt-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3>Nuestro <span class="orange-text">Equipo</span></h3>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"></div>
						<h4>José Miranda <span>Estudiante</span></h4>
						<ul class="social-link-team">
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"></div>
						<h4>Mario Molina <span>Estudiante</span></h4>
						<ul class="social-link-team">
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0">
					<div class="single-team-item">
						<div class="team-bg team-bg-3"></div>
						<h4>Zeneth Corella <span>Estudiante</span></h4>
						<ul class="social-link-team">
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!-- end team section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="../assets/img/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>José Miranda <span>Desarrollador</span></h3>
								<p class="testimonial-body">
									" Encargado de diseñar la arquitectura y desarrollo de nuestro sitio "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="../assets/img/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Mario Molina <span>Desarrollador</span></h3>
								<p class="testimonial-body">
									" Soluciona errores o problemas que puede presentarse en nuestra página "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="../assets/img/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Ricardo Villalobos <span>Desarrollador</span></h3>
								<p class="testimonial-body">
									" Diseña y desarrolla nuevas funciones para la comodidad de nuestros usuarios "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="../assets/img/avatar4.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Zeneth Corella <span>Desarrollador</span></h3>
								<p class="testimonial-body">
									" Ayuda a mantener nuestra página actualizadaAyuda a mantener nuestra página actualizada "	
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
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