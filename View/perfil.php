<?php
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}
	include_once __DIR__ . '\generales.php';
	include_once __DIR__ . '\..\Controller\UsuarioController.php';


	$datos = ConsultaUsuarioId($_SESSION["sesionId"]);
?> 

<!DOCTYPE html>
<head>
	<!-- title -->
	<title>Perfil</title>

	<?php
		perfil();
	?>
</head>
<body onsubmit="return ValidarContrasenna();">
<form role="form" action="" method="post">
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
				<h5 class="user-name"><?php echo $datos["nombre"]?> <?php echo $datos["apellidos"]?></h5>
				<h6 class="user-email"><?php echo $datos["correo"] ?></h6>
			</div>
			<div class="about">
				<!--<button class="btn btn-primary" type="button">Editar foto</button>-->
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Detalles Personales </h6>
			</div>
			<input type="hidden" value="<?php echo $datos["id_usuario"] ?>" id="txtId" name="txtId">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Nombre</label>
					<input type="text" class="form-control" id="txtNombre" name="txtNombre" required autocomplete="Off" value="<?php echo $datos["nombre"] ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="apellidos">Apellidos</label>
					<input type="text" class="form-control" id="txtApellidos" name="txtApellidos" required autocomplete="Off" value="<?php echo $datos["apellidos"] ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="correo">Correo</label>
					<input type="email" class="form-control" id="txtCorreo" name="txtCorreo" required autocomplete="Off" value="<?php echo $datos["correo"] ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="usuario">Usuario</label>
					<input type="text" class="form-control" id="txtUsuario" name="txtUsuario" required autocomplete="Off" value="<?php echo $datos["usuario"] ?>">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Ajustes</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Contraseña</label>
					<input type="password" class="form-control" id="txtContrasenna" name="txtContrasenna" required autocomplete="Off" value="<?php echo $datos["clave"] ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">Confirmar Contraseña</label>
					<input type="password" class="form-control" id="txtConfirmarContrasenna" name="txtConfirmarContrasenna" required autocomplete="Off" value="<?php echo $datos["clave"] ?>">
				</div>
			</div>
			
		</div>
</br>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<a type="button" id="submit" name="submit" class="btn btn-secondary" href="../index.php">Cancelar</a>
					<input type="submit" id="btnActualizar" name="btnActualizar" class="btn btn-primary" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<script src="../assets/js/usuarios.js"></script>';
</form>
</body>