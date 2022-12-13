<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}
	include_once __DIR__ . '\generales.php';
	include_once __DIR__ . '\..\Controller\UsuarioController.php';
	include_once __DIR__ . '\..\Controller\ProductoController.php';

	$datos = MuestraTotal($_SESSION["sesionId"]);
?>

<!DOCTYPE html>
<head>

	<!-- title -->
	<title>Carrito</title>

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
								<?php
									if ($_SESSION != null) {
										echo "Bienvenido ", $_SESSION["sesionNombre"];
	
										if ($_SESSION["sesionTipoRol"] == 1) {
											echo '<li><a href="../index.php">Inicio</a></li>
											<li><a href="acerca.php">Acerca De</a></li>
											<li><a href="catalogo.php">Catálogo</a></li>
											<li><a href="contact.php">Contacto</a></li>
											<li><a href="admin.php">Administración</a></li>';
											
										} else if ($_SESSION["sesionTipoRol"] == 2) {
											echo '<li><a href="../index.php">Inicio</a></li>
											<li><a href="acerca.php">Acerca De</a></li>
											<li><a href="catalogo.php">Catálogo</a></li>
											<li><a href="contact.php">Contacto</a></li>';
										}
									}
									else{
										echo '<li><a href="../index.php">Inicio</a></li>
										<li><a href="acerca.php">Acerca De</a></li>
										<li><a href="catalogo.php">Catálogo</a></li>
										<li><a href="contact.php">Contacto</a></li>';
									}
									?>
                                <li>
									<div class="header-icons">
										<a class="shopping-cart" href="carrito.php"><i class="fas fa-shopping-cart"></i></a>
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
						<p>La Alegría De Comprar Medicamentos</p>
						<h1>Carrito</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Imagen Del Producto</th>
									<th class="product-name">Nombre</th>
									<th class="product-price">Precio</th>
									<th class="product-quantity">Cantidad</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
									ConsultaCarrito($_SESSION["sesionId"]);
								?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Precio</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>₡<?php echo $datos["Subtotal"] ?></td>
								</tr>
								<tr class="total-data">
									<td><strong>Envío: </strong></td>
									<td>₡1500</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>₡<?php echo $datos["Total"]?></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="" class="boxed-btn">Actualizar Carrito</a>
							<a href="" class="boxed-btn black">Verificar</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Aplicar Cupón</h3>
						<div class="coupon-form-wrap">
							<form action="">
								<p><input type="text" placeholder="Código"></p>
								<p><input type="submit" value="Aplicar"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	
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
	<script src="../assets/js/elimbutton.js"></script>

</body>
</html>