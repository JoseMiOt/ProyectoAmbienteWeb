<?php
include_once 'BaseDatos.php';

function ValidarUsuario($correo, $clave)
{
    $conn = OpenBD();

    $procedimiento = "call sp_consultar_usuario('$correo', '$clave');";
    $datos = $conn -> query($procedimiento);

    CloseBD($conn);
    return $datos;
}

function AgregarUsuarioModel($Nombre,$Apellidos,$Usuario,$Correo,$Contrasenna,$ContrasennaDos,$Rol)
{
    $conn = OpenBD();

    $procedimiento = "call sp_agregar_usuario('$Nombre', '$Apellidos', '$Usuario', '$Correo', '$Contrasenna', $Rol);";
    $conn -> query($procedimiento);

    OpenBD($conn);
}

?>