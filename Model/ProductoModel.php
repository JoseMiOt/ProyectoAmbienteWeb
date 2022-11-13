<?php
include_once 'BaseDatos.php';

function ConsultaProductosModel()
{
    //se guarda la conexion de la base en una variable
    $enlace = OpenDB();

    $procedimiento = "call ConsultaProductos();";
    $datos = $enlace -> query($procedimiento);

    CloseDB($enlace);
    return $datos;
}

?>