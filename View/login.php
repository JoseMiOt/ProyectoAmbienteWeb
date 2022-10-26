<?php

include_once '../View/generales.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    login();
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


    <div class="back">
        <a href="../index.php">
            HOME
        </a>
    </div>

    <div class="container">
        <div class="login-container">
            <div class="register">
                <h2>Registrarse</h2>
                <form action="">
                    <input type="text" placeholder="Nombre" class="nombre">
                    <input type="text" placeholder="Apellidos" class="apellido">
                    <input type="text" placeholder="Usuario" class="usuario">
                    <input type="text" placeholder="Correo" class="correo">
                    <input type="password" placeholder="Contraseña" class="pass">
                    <input type="password" placeholder="Confirma contraseña" class="repass">
                    <input type="submit" class="submit" value="REGISTRARSE">
                </form>
            </div>
            <div class="login">
                <h2>Iniciar Sesión</h2>
                <form action="">
                    <input type="text" placeholder="Correo" class="correo">
                    <input type="password" placeholder="Contraseña" class="pass">
                    <br>
                    <input type="submit" class="submit" value="INICIAR SESIÓN">
                </form>
            </div>
        </div>
    </div>
</body>

</html>