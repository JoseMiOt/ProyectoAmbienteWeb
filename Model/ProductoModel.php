<?php
include_once 'BaseDatos.php';
include_once __DIR__ . '\..\Controller\UsuarioController.php';

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

function AgregaCarritoModel($IdProducto,$IdUsuario)
{
    $conn = OpenBD();

    $procedimiento = "call sp_agrega_carrito($IdProducto,$IdUsuario);";
    $conn -> query($procedimiento);

    CloseBD($conn);
}

if (isset($_POST['IdProducto'])) {
    AgregaCarritoModel($_POST['IdProducto'], $_SESSION["sesionId"]);
}


function EliminaCarritoModel($IdProducto,$IdUsuario)
{
    $conn = OpenBD();

    $procedimiento = "call sp_eliminar_carrito($IdUsuario,$IdProducto);";
    $conn -> query($procedimiento);

    CloseBD($conn);
}

if (isset($_POST['IdProductoElim'])) {
    EliminaCarritoModel($_POST['IdProductoElim'], $_SESSION["sesionId"]);
}

function ConsultaCarritoModel($IdUsuario)
{
    $enlace = OpenBD();

    $procedimiento = "call sp_consulta_carrito($IdUsuario);";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function AgregaCarritoCantModel($IdProducto,$IdUsuario,$Cantidad)
{
    $conn = OpenBD();

    $procedimiento = "call sp_agrega_carrito_cant($IdProducto,$IdUsuario,$Cantidad);";
    $conn -> query($procedimiento);

    CloseBD($conn);
}

if (isset($_POST['IdProductoAC'],$_POST['Cantidad'])) {
    AgregaCarritoCantModel($_POST['IdProductoAC'], $_SESSION["sesionId"],$_POST['Cantidad']);
}

function MuestraTotalModel($IdUsuario)
{
    $enlace = OpenBD();

    $procedimiento = "call sp_calcular_total($IdUsuario);";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ListarProductosModel(){
    $enlace = OpenBD();
    $procedimiento = "call sp_consulta_productos();";
    $datos = $enlace -> query($procedimiento);
    CloseBD($enlace);
    return $datos;

}

?>