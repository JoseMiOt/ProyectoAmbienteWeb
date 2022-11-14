<?php
include_once 'BaseDatos.php';

function ConsultaProductosModel()
{
    $enlace = OpenBD();

    $procedimiento = "call sp_consulta_productos();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultaProductoIdModel($id)
{
    $enlace = OpenBD();

    $procedimiento = "call sp_consulta_producto_id($id);";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultaProductoCatModel($idCat, $id)
{
    $enlace = OpenBD();

    $procedimiento = "call sp_consulta_producto_cat($idCat, $id);";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultaProductoInicioModel()
{
    $enlace = OpenBD();

    $procedimiento = "call sp_consulta_producto_inicio();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

?>