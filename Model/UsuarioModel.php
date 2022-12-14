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

function ConsultaUsuarioIdModel($id)
{
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_usuario_id($id);";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ActualizarUsuarioModel($Id, $Nombre, $Apellidos, $Usuario, $Correo, $Contrasenna)
{
    $enlace = OpenBD();
    $resultado = false;

    $procedimiento = "call sp_actualiza_perfil($Id, '$Nombre', '$Apellidos', '$Usuario', '$Correo', '$Contrasenna');";
    if($enlace -> query($procedimiento))
    {
        $resultado = true;
    }
        
    CloseBD($enlace);
    return $resultado;
}

?>