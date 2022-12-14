<?php
if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	include_once __DIR__ . '\View\generales.php';
	include_once __DIR__ . '\Controller\UsuarioController.php';
	include_once __DIR__ . '\Controller\ProductoController.php';

?>

<!DOCTYPE html>
<head>

<!-- title -->
<title>FarmaWeb</title>
	<?php
		index();
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
						<a href="View/perfil.php">
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
									<img src="assets/img/logo.png" alt="">
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
										echo '<li class="current-list-item"><a href="#">Inicio</a></li>
										<li><a href="View/acerca.php">Acerca De</a></li>
										<li><a href="View/catalogo.php">Catálogo</a></li>
										<li><a href="View/contact.php">Contacto</a></li>
										<li><a href="View/admin.php">Administración</a></li>';
									} else if ($_SESSION["sesionTipoRol"] == 2) {
										echo
										'<li class="current-list-item"><a href="#">Inicio</a></li>
										<li><a href="View/acerca.php">Acerca De</a></li>
										<li><a href="View/catalogo.php">Catálogo</a></li>
										<li><a href="View/contact.php">Contacto</a></li>';
									}}	
									else{
										echo
											'<li class="current-list-item"><a href="#">Inicio</a></li>
											<li><a href="View/acerca.php">Acerca De</a></li>
											<li><a href="View/catalogo.php">Catálogo</a></li>
											<li><a href="View/contact.php">Contacto</a></li>';
									}
									?>
									
								<li>
									<div class="header-icons">
										<?php
											if ($_SESSION != null) {
										?>
												<a class="shopping-cart" href="View/carrito.php"><i class="fas fa-shopping-cart"></i></a>
										<?php
											}else{
										?>
												<a class="shopping-cart" href="View/login.php"><i class="fas fa-shopping-cart"></i></a>
										<?php
											}
										?>
										<a class="mobile-hide search-bar-icon" href="View/busqueda.php"><i class="fas fa-search"></i></a>
										<a class="usuario" href="View/login.php"><i class="fas fa-user"></i></a>
										<!--<a class="usuario" href="login.php"><i class="fas fa-sign-out-alt"></i></a>-->
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

	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Tú medicina está aquí</p>
								<h1>Cuida La Salud Y Tu Bolsillo</h1>
								<div class="hero-btns">
									<a href="View/catalogo.php" class="boxed-btn">Visitar Tienda</a>
									<a href="View/contact.php" class="bordered-btn">Contáctanos</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Justo Lo Que Necesitas</p>
								<h1>Porque La Salud Importa</h1>
								<div class="hero-btns">
									<a href="View/catalogo.php" class="boxed-btn">Visitar Tienda</a>
									<a href="View/contact.php" class="bordered-btn">Contáctanos</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">El Servicio Que Mereces</p>
								<h1>Vive Sanamente Con FarmaWeb</h1>
								<div class="hero-btns">
									<a href="View/catalogo.php" class="boxed-btn">Visitar Tienda</a>
									<a href="View/contact.php" class="bordered-btn">Contáctanos</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Envío Gratis</h3>
							<p>En compras por arriba de los ₡35000</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>Soporte 24/7</h3>
							<p>Obtenga soporte todo el día</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Reembolso</h3>
							<p>¡Obtenga un reembolso dentro de los 3 días!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Nuestros</span> Productos</h3>
						<p>Lista de productos al mejor precio.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php
				ConsultaProductoInicio();
				?>
			</div>

		</div>
	</div>
	<!-- end product section -->

	<!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> <br> descuento
                                </span>
                            </div>
                        </div>
                    	<img src="assets/img/farm4.png" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">Oferta</span> del Mes</h3>
                    <h4>Cofal Fuerte</h4>
                    <div class="text">¡Aprovecha ahora! No lo encontrarás por mejor precio</div>
                    <!--Countdown Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2022/12/25"><div class="counter-column"><div class="inner"><span class="count">00</span>Días</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Horas</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Segs</div></div></div></div>
                	<a href="#" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avatar1.png" alt="">
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
								<img src="assets/img/avatar2.png" alt="">
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
								<img src="assets/img/avatar3.png" alt="">
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
								<img src="assets/img/avatar4.png" alt="">
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
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt2-bg">
						<img src="assets/img/farm10.jpg"></img>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Desde El Año 2022</p>
						<h2>Somos <span class="orange-text">FarmaWeb</span></h2>
						<p>Ofrecer una asistencia sanitaria de calidad, para alcanzar y mantener la salud, ofreciendo servicios farmacéuticos y productos, de forma profesional, servicial y cercana.</p>
						<p>Con respecto a nuestros usuarios: facilitar un rápido acceso a los productos que precisen, primando los servicios profesionales, para que saquen el máximo beneficio a sus medicamentos.</p>
						<a href="View/acerca.php" class="boxed-btn mt-4">Conócenos</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>¡Se acerca Diciembre <br> con grandes <span class="orange-text">Descuentos...</span></h3>
            <div class="sale-percent"><span>Rebajas <br> hasta del</span>50% <span></span></div>
            <a href="View/catalogo.php" class="cart-btn btn-lg">Compra Ahora</a>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span >Más </span> <span class="orange-text"> Farmacias</span></h3>
						<p>Sitios Web de Farmacias en Costa Rica</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href=""><div class="latest-news-bg news-bg-1"></div></a>
						<div class="news-text-box">
							
							<p class="blog-meta">
								<span class="author"><i class="fas fa-capsules"></i> Farmacia</span>
								<span class="date"><i class="fas fa-compass"></i> San José, Curridabat</span>
							</p>
							<p class="excerpt">Farmacias Fischel, unión familiar y visión empresarial.Ayudando a sus fondos de inversión, mientras cuidas tu cuerpo.</p>
							<a href="https://www.fischelenlinea.com/categorias/Bienestar-Natural-51?utm_source=google&utm_medium=paidsearch&utm_campaign=%5BCuestamoras%5D_%5BFischel%5D_SR_Always_On_Categorias_Conversiones_Diario&gclid=Cj0KCQiA4uCcBhDdARIsAH5jyUmo9RKv60UvSr9myQnmJAJ5dMIo80J3kqo2KrB4FYIvy-Z_BjSK9e0aAmB-EALw_wcB" class="read-more-btn">Leer Más <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href=""><div class="latest-news-bg news-bg-2"></div></a>
						<div class="news-text-box">
							
							<p class="blog-meta">
								<span class="author"><i class="fas fa-capsules"></i> Farmacia</span>
								<span class="date"><i class="fas fa-compass"></i> Cartago, Paraíso</span>
							</p>
							<p class="excerpt">Servicio y Distribución de productos farmacéuticos al mejor precio, brindando la mejor atención, con personal capacitado</p>
							<a href="https://farmavalue.biz/costarica/" class="read-more-btn">Leer Más <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
					<div class="single-latest-news">
						<a href=""><div class="latest-news-bg news-bg-3"></div></a>
						<div class="news-text-box">
							
							<p class="blog-meta">
								<span class="author"><i class="fas fa-capsules"></i> Farmacia</span>
								<span class="date"><i class="fas fa-compass"></i> San José, Sabanilla</span>
							</p>
							<p class="excerpt">Comprá en nuestras Farmacias y automáticamente acumulás puntos que luego podes canjear por increíbles descuentos.</p>
							<a href="https://farmacialabomba.com/" class="read-more-btn">Leer Más <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- end latest news -->
	
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
	footerIndex();
	?>
</body>
</html>