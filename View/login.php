<?php
include_once __DIR__ . '\generales.php';
include_once __DIR__ . '\..\Controller\UsuarioController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    login();
    ?>
</head>

<body>
    <form action="" method="post">
        <div class="back">
            <a href="../index.php">
                HOME <!-- MEJORAR ESTE ENLACE, VER QUE BOTON SE LE PONE-->
            </a>                
        </div>

        <div class="container">
            <div class="login-container">
                <div class="register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre" class="nombre">
                    <input type="text" placeholder="Apellidos" class="apellido">
                    <input type="text" placeholder="Usuario" class="usuario">
                    <input type="text" placeholder="Correo" class="correo">
                    <input type="password" placeholder="Contraseña" class="pass">
                    <input type="password" placeholder="Confirma contraseña" class="repass">
                    <input type="submit" class="submit" value="REGISTRARSE" id="bt_registrarse" name="bt_registrarse">
                </div>
                <div class="login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo" class="correo" id="txt_correo" name="txt_correo">
                    <input type="password" placeholder="Contraseña" class="pass" id="txt_pass" name="txt_pass">
                    <br>
                    <input type="submit" class="submit" value="INICIAR SESIÓN" id="bt_inicio_sesion"
                        name="bt_inicio_sesion">
                </div>
            </div>
        </div>
    </form>
</body>

</html>