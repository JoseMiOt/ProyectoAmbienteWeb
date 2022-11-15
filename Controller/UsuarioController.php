<?php
if (session_status() == PHP_SESSION_NONE){
		session_start();
	}

include_once __DIR__ . '\..\Model\UsuarioModel.php';

if(isset($_POST["bt_inicio_sesion"])) { 
    $correo = $_POST["txt_correo"];
    $clave = $_POST["txt_pass"];

    $datos = ValidarUsuario($correo, $clave);
    
    if ($datos -> num_rows > 0){
        
        $datosUsuario = mysqli_fetch_array($datos);

        $_SESSION["sesionNombre"] = $datosUsuario["nombre"];
        $_SESSION["sesionTipoRol"] = $datosUsuario["id_rol"]; /*Limitar mas adelante los permisos de cada
                                                              rol en conjunto con la carpeta de generales*/
        header("Location: ..\index.php");
    }else {
        header("Location: ..\View\login.php");
    }
}

if(isset($_POST["bt_registrarse"]))
{
    $Nombre = $_POST["txtNombre"];
    $Apellidos = $_POST["txtApellidos"];
    $Usuario = $_POST["txtUsuario"];
    $Correo = $_POST["txtCorreo"];
    $Contrasenna = $_POST["txtContrasenna"];
    $ContrasennaDos = $_POST["txtConfirContrasenna"];
    $Rol = 2;
    AgregarUsuarioModel($Nombre, $Apellidos, $Usuario, $Correo, $Contrasenna, $ContrasennaDos, $Rol);
    header("Location: ..\index.php");
}


if(isset($_POST["btn_Cerrar"]))
{
    if (session_status() != PHP_SESSION_NONE)
        session_destroy();
        
    header("Location: ..\View\login.php");
}



?>