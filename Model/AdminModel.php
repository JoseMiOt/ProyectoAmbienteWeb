<?php
include_once 'BaseDatos.php';
include_once __DIR__ . '\..\Controller\UsuarioController.php';

//1.Bitacora 

function ConsultarBitacoraModel(){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_bitacora();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultarBitacoraIDModel($idBitacora){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_bitacora_id($idBitacora);";
     $datos  = mysqli_fetch_assoc ($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ActualizarBitacoraModel($id_bitacora, $accion, $descripcion, $fecha){
    $enlace = OpenBD();

    $procedimiento = "call sp_actualizar_bitacora($id_bitacora, '$accion', '$descripcion', '$fecha');";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}

function AgregarBitacoraModel($accion, $descripcion, $fecha){
    $enlace = OpenBD();

    $procedimiento = "call sp_agregar_bitacora('$accion', '$descripcion', '$fecha');";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
    
}

function EliminarBitacoraModel ($id_bitacora){
    $enlace = OpenBD();

    $procedimiento = "call sp_eliminar_bitacora($id_bitacora);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}
//--------------------------------------------------------------

//2.Usuario
function ConsultarDatosTablas()
{
    $enlace = OpenBD();

    $procedimiento = "call sp_cantidad_datos_tablas(@a,@b,@c,@d,@e,@f,@g,@h,@i,@j,@k,@o,@aa);";
    $datos = mysqli_fetch_assoc($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ConsultarUsuarioModel()
{
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_usuarioVista();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function AgregarUsuarioIModel($nombre,$apellidos,$usuario,$correo,$clave,$id_rol)
{
    $conn = OpenBD();

    $procedimiento = "call sp_agregar_usuario('$nombre', '$apellidos', '$usuario', '$correo', '$clave', '$id_rol');";
    $conn -> query($procedimiento);

    if($conn  -> query($procedimiento))
    $resultado = true; 
    CloseBD($conn);
    return $resultado;
}


function ActualizarUsuarioModel($id_usuario,$nombre,$apellidos,$usuario,$correo,$clave,$id_rol)
{
    $enlace = OpenBD();
    $resultado = false;

    $procedimiento = "call sp_actualizar_usuario($id_usuario,'$nombre','$apellidos','$usuario','$correo','$clave','$id_rol');";
    
    if($enlace -> query($procedimiento))
        $resultado = true; 

    CloseBD($enlace);
    return $resultado;
}
//---------------------------------------------------

//3.Roles

function ConsultarRolesModel()
{
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_rol();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultarRolIDModel($idRol){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_rol_id($idRol);";
     $datos  = mysqli_fetch_assoc ($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ActualizarRolModel($id_rol , $rol_descripcion){
    $enlace = OpenBD();

    $procedimiento = "call sp_actualizar_rol($id_rol, '$rol_descripcion');";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}


function AgregarRolModel($rol_descripcion)

{
    $enlace = OpenBD();

    $procedimiento = "call sp_agregar_rol('$rol_descripcion');";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
    
}

function EliminarRolModel ($id_rol){
    $enlace = OpenBD();

    $procedimiento = "call sp_eliminar_rol($id_rol);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}
//------------------------------------------

//4.Direccion
function ConsultarDireccionModel(){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_direccion();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultarDireccionIDModel($idDireccion){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_direccion_id($idDireccion);";
     $datos  = mysqli_fetch_assoc ($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ActualizarDireccionModel($id_direccion , $direccion, $id_distrito){
    $enlace = OpenBD();

    $procedimiento = "call sp_actualizar_direccion($id_direccion , '$direccion', $id_distrito);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}


function AgregarDireccionModel($direccion, $id_distrito){
    $enlace = OpenBD();

    $procedimiento = "call sp_agregar_direccion('$direccion', $id_distrito);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
    
}

function EliminarDireccionModel ($id_direccion){
    $enlace = OpenBD();

    $procedimiento = "call sp_eliminar_direccion($id_direccion);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}
//----------------------------------------------------

//8.Farmacia
function ConsultarFarmaciaModel(){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_farmacia();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultarFarmaciaIDModel($idFarmacia){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_farmacia_id($idFarmacia);";
     $datos  = mysqli_fetch_assoc ($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ActualizarFarmaciaModel($id_farmacia , $nombre_far, $telefono, $horario, $id_direccion){
    $enlace = OpenBD();

    $procedimiento = "call sp_actualizar_farmacia($id_farmacia , '$nombre_far', '$telefono', '$horario', $id_direccion);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}

function AgregarFarmaciaModel($nombre_far, $telefono, $horario, $id_direccion){
    $enlace = OpenBD();

    $procedimiento = "call sp_agregar_farmacia('$nombre_far', '$telefono', '$horario', $id_direccion);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
    
}

function EliminarFarmaciaModel ($id_farmacia){
    $enlace = OpenBD();

    $procedimiento = "call sp_eliminar_farmacia($id_farmacia);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}
//----------------------------------------------------------------------

//9.Producto
function ConsultarProductoModel(){
    $enlace = OpenBD();

    $procedimiento = "call sp_consulta_productos();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultarProductoIDModel($idProducto){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_productos_id($idProducto);";
     $datos  = mysqli_fetch_assoc ($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ActualizarProductoModel($id_producto , $marca, $nombre_prod, $descrip_prod, $cant_almacen, $precio,$url, $id_tipo_med, $id_farmacia){
    $enlace = OpenBD();

    $procedimiento = "call sp_actualiza_producto($id_producto , '$marca', '$nombre_prod', '$descrip_prod', $cant_almacen, $precio, '$url', $id_tipo_med, $id_farmacia);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}

function AgregarProductoModel($marca, $nombre_prod, $descrip_prod, $cant_almacen, $precio,$url, $id_tipo_med, $id_farmacia){
    $enlace = OpenBD();

    $procedimiento = "call sp_agrega_producto('$marca', '$nombre_prod', '$descrip_prod', $cant_almacen, $precio, '$url', $id_tipo_med, $id_farmacia);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
    
}

function EliminarProductoModel ($id_producto){
    $enlace = OpenBD();

    $procedimiento = "call sp_elimina_producto($id_producto);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}
//------------------------------------------------------------------

//10.Precaucion
function ConsultarPrecaucionModel(){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_precaucion();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultarPrecaucionIDModel($idPrecaucion){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_precaucion_id($idPrecaucion);";
     $datos  = mysqli_fetch_assoc ($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ActualizarPrecaucionModel($id_precaucion , $efectos_secundarios, $fecha_expiracion, $id_producto){
    $enlace = OpenBD();

    $procedimiento = "call sp_actualizar_precaucion($id_precaucion , '$efectos_secundarios', '$fecha_expiracion', $id_producto);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}


function AgregarPrecaucionModel($efectos_secundarios, $fecha_expiracion, $id_producto){
    $enlace = OpenBD();

    $procedimiento = "call sp_agregar_precaucion('$efectos_secundarios', '$fecha_expiracion', $id_producto);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
    
}

function EliminarPrecaucionModel ($id_precaucion){
    $enlace = OpenBD();

    $procedimiento = "call sp_eliminar_precaucion($id_precaucion);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}
//----------------------------------------------------

//11. Categoria
function ConsultarCategoriaModel(){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_categoria();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultarCategoriaIDModel($idCategoria){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_categoria_id($idCategoria);";
     $datos  = mysqli_fetch_assoc ($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ActualizarCategoriaModel($id_tipo_med , $categoria_med, $descripcion_categoria_med){
    $enlace = OpenBD();

    $procedimiento = "call sp_actualizar_categoria($id_tipo_med , '$categoria_med', '$descripcion_categoria_med');";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}


function AgregarCategoriaModel($categoria_med, $descripcion_categoria_med){
    $enlace = OpenBD();

    $procedimiento = "call sp_agregar_catergoria('$categoria_med', '$descripcion_categoria_med');";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
    
}

function EliminarCategoriaModel ($id_tipo_med){
    $enlace = OpenBD();

    $procedimiento = "call sp_eliminar_categoria($id_tipo_med);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}
//-----------------------------------------------------------------------

//12.Factura
function ConsultarFacturaModel(){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_factura();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultarFacturaIDModel($idFactura){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_factura_id($idFactura);";
     $datos  = mysqli_fetch_assoc ($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ActualizarFacturaModel($id_factura , $fecha, $id_usuario){
    $enlace = OpenBD();

    $procedimiento = "call sp_actualizar_factura($id_factura , '$fecha', $id_usuario);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}


function AgregarFacturaModel($fecha, $id_usuario){
    $enlace = OpenBD();

    $procedimiento = "call sp_agregar_factura('$fecha', $id_usuario);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
    
}

function EliminarFacturaModel ($id_factura){
    $enlace = OpenBD();

    $procedimiento = "call sp_eliminar_factura($id_factura);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}
//-----------------------------------------------------------------------


//13 Detalle

function ConsultarDetalleModel(){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_detalle();";
    $datos = $enlace -> query($procedimiento);

    CloseBD($enlace);
    return $datos;
}

function ConsultarDetalleIDModel($idDetalle){
    $enlace = OpenBD();

    $procedimiento = "call sp_consultar_detalle_id($idDetalle);";
     $datos  = mysqli_fetch_assoc ($enlace -> query($procedimiento));

    CloseBD($enlace);
    return $datos;
}

function ActualizarDetalleModel($id_detalle_factura , $id_factura, $id_producto, $total){
    $enlace = OpenBD();

    $procedimiento = "call sp_actualizar_detalle($id_detalle_factura , $id_factura, $id_producto, '$total');";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}

function AgregarDetalleModel($id_factura, $id_producto, $total){
    $enlace = OpenBD();

    $procedimiento = "call sp_agregar_detalle($id_factura, $id_producto, '$total');";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
    
}

function EliminarDetalleModel ($id_detalle_factura){
    $enlace = OpenBD();

    $procedimiento = "call sp_eliminar_detalle($id_detalle_factura);";
    $enlace -> query($procedimiento);

    CloseBD($enlace);
}
//-----------------------------------------------------------------------

?>