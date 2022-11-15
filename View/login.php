<?php
include_once __DIR__ . '\generales.php';
include_once __DIR__ . '\..\Controller\UsuarioController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php
    login();
    ?>
</head>

<body>
    <form action="" method="post" onsubmit="return validacionRegistrar()">
        <div class="back">
            <a href="../index.php">
                <button type="button" class="btn btn-dark" data-toggle="button" aria-pressed="false" autocomplete="off">
                    HOME
                </button>
            </a>        
        </div>

        <div class="container">
            <div class="login-container">
                <div class="register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre" class="nombre" id="txtNombre" name="txtNombre" autocomplete="Off">
                    <input type="text" placeholder="Apellidos" class="apellido" id="txtApellidos" name="txtApellidos" autocomplete="Off">
                    <input type="text" placeholder="Usuario" class="usuario" id="txtUsuario" name="txtUsuario" autocomplete="Off">
                    <input type="text" placeholder="Correo" class="correo" id="txtCorreo" name="txtCorreo" autocomplete="Off">
                    <input type="password" placeholder="Contraseña" class="pass" id="txtContrasenna" name="txtContrasenna" autocomplete="Off">
                    <input type="password" placeholder="Confirma contraseña" class="repass" id="txtConfirContrasenna" name="txtConfirContrasenna" autocomplete="Off">
                    <input type="submit" class="submit" value="REGISTRARSE" id="bt_registrarse" name="bt_registrarse">
                </div>
            </div>
                </form>
                <form action="" method="post" onsubmit="return validacionInicioSesion()">
            <div class="login-container">
                <div class="login">
                
                    <h2>Iniciar Sesión</h2>
                    <br><br><br><br>
                    <input type="text" placeholder="Correo" class="correo" id="txt_correo" name="txt_correo" autocomplete="Off">
                    <input type="password" placeholder="Contraseña" class="pass" id="txt_pass" name="txt_pass" autocomplete="Off">
                    <br><br><br><br><br><br>
                    <input type="submit" class="submit" value="INICIAR SESIÓN" id="bt_inicio_sesion" name="bt_inicio_sesion">
                </div>
            </div>
        </div>
    </form>

    <!--*******************************************************************
        El diseño se ve mejor pero solo se trabaja con un form
        Ver la posibilidad de mantener el diseño pero con la funcionalidad
        de registrarse e iniciar sesión trabajandolas por separado 
        *******************************************************************-->
    
    <!--<form action="" method="post" onsubmit="return validacionInicioSesion()">
        <div class="back">
            <a href="../index.php">
                HOME--> <!--MEJORAR ESTE ENLACE, VER QUE BOTON SE LE PONE-->
        <!--    </a>                
        </div>

        <div class="container">
            <div class="login-container">
                <div class="register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre" class="nombre" id="txtNombre" name="txtNombre">
                    <input type="text" placeholder="Apellidos" class="apellido" id="txtApellidos" name="txtApellidos">
                    <input type="text" placeholder="Usuario" class="usuario" id="txtUsuario" name="txtUsuario">
                    <input type="text" placeholder="Correo" class="correo" id="txtCorreo" name="txtCorreo">
                    <input type="password" placeholder="Contraseña" class="pass" id="txtContrasenna" name="txtContrasenna">
                    <input type="password" placeholder="Confirma contraseña" class="repass" id="txtConfirContrasenna" name="txtConfirContrasenna">
                    <input type="submit" class="submit" value="REGISTRARSE" id="bt_registrarse" name="bt_registrarse">
                </div>
                <div class="login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo" class="correo" id="txt_correo" name="txt_correo">
                    <input type="password" placeholder="Contraseña" class="pass" id="txt_pass" name="txt_pass">
                    <br>
                    <input type="submit" class="submit" value="INICIAR SESIÓN" id="bt_inicio_sesion" name="bt_inicio_sesion">
                </div>
            </div>
        </div>
    </form>-->
    <?php
	    footerIndex();
    ?>
    <script src="../assets/js/login.js"></script>;
</body>

</html>