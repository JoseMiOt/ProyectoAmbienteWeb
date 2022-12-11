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
	<title>Menu</title>

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
								<li class="current-list-item"><a href="acerca.php">Acerca De</a></li>
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
							<a href="busqueda.php"> <button type="button">Buscar <i class="fas fa-search"></i></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->
    
</body>
</html>