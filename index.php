<?php
if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	include_once __DIR__ . '\View\generales.php';
	include_once __DIR__ . '\Controller\UsuarioController.php';

?>

<!DOCTYPE html>

<head>
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
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<img src="assets/img/logo.png" alt="">
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Inicio</a></li>
								<li><a href="about.html">Acerca De</a></li>
								<li><a href="shop.html">Catálogo</a></li>
								<li><a href="contact.html">Contacto</a></li>
								<li><a href="shop.html">Farmacias</a></li>
								<li><a href="news.html">Noticias</a></li>
								<li> <?php if ($_SESSION != null) {
									echo "Bienvenido ", $_SESSION["sesionNombre"];} ?></li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										<a class="usuario" href="View/login.php"></i><img src="assets/img/usuario.png" alt=""></a>										
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
	<!-- end search arewa -->

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
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/producto-img-1.png" alt=""></a>
						</div>
						<h3>Alcohol 250ml</h3>
						<p class="product-price"><span>Malick</span> ₡607 </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center berry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/producto-img-2.jpg" alt=""></a>
						</div>
						<h3>Algodón Migasa 50g</h3>
						<p class="product-price"><span>Migasa</span> ₡201 </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center lemon">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/producto-img-3.png" alt=""></a>
						</div>
						<h3>Cepillo Slim Soft 2x1</h3>
						<p class="product-price"><span>Colgate</span> ₡2923 </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/producto-img-4.jpg" alt=""></a>
						</div>
						<h3>Chapstick Yerbabuena Blister</h3>
						<p class="product-price"><span>Chapstick</span> ₡2126 </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/producto-img-5.png" alt=""></a>
						</div>
						<h3>Crema Pañalito 235g</h3>
						<p class="product-price"><span>Pañalito</span> ₡2477 </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/producto-img-6.jpg" alt=""></a>
						</div>
						<h3>Jabón Neutro 100g</h3>
						<p class="product-price"><span>Asepxia</span> ₡2585 </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>
					</div>
				</div>
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
	footerIndex();
	?>

</body>

</html>