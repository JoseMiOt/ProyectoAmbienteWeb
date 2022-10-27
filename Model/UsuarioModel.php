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

?>