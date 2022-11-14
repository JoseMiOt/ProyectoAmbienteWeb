<?php
	include_once __DIR__ . '\generales.php';
	include_once __DIR__ . '\..\Controller\ProductoController.php';

	$datos = ConsultaProductoId($_GET["q"]);
?> 

<!DOCTYPE html>
<head>
	
	<!-- title -->
	<title>Producto</title>

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
								<li><a href="#">Administración</a></li>

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
							<input type="text" placeholder="Keywords">
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
						<p>Detalles</p>
						<h1>Producto</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="<?php echo "../".$datos["url"] ?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo $datos["nombre_prod"] ?></h3>
						<p class="single-product-pricing"><span><?php echo $datos["marca"] ?></span> ₡<?php echo $datos["precio"] ?></p>
						<p><?php echo $datos["descrip_prod"] ?></p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>
							<p><strong>Categorias: </strong><?php echo $datos["categoria"] ?></p>
						</div>
						<h4>Compartir:</h4>
						<ul class="product-share">
							<li><a href="https://es-la.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://twitter.com/?lang=es"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
							<li><a href="https://cr.linkedin.com/"><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Productos</span> Relacionados</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
            
			<div class="row">
				<?php
				ConsultaProductoCat($datos["id_tipo_med"], $datos["id_producto"]);
				?>
			</div>

		</div>
	</div>
	<!-- end more products -->
	
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