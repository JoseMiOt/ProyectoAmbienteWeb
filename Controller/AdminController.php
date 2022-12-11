<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
</style>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>



<?php
include_once __DIR__ . '\..\Model\AdminModel.php';
include_once __DIR__ . '\..\Model\BaseDatos.php';


//1.Bitacora 
function ConsultarBitacora(){
    $datos = ConsultarBitacoraModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_bitacora']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['accion']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['descripcion']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['fecha']); ?>
    </td>


    <td><a href="BitacoraActualizar.php?id=<?php echo htmlentities($fila['id_bitacora']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="BitacoraConsulta.php? delbitacora=<?php echo htmlentities($fila['id_bitacora']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar la Bitacora?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>

<?php

        }
    }

}
function ConsultarBitacoraID($id_bitacora){
$datos = ConsultarBitacoraIDModel($id_bitacora);
    return $datos;

}
function ActualizarBitacora(){
     $id_bitacora = intval($_GET['id']);

    $accion = $_POST['Accion'];
    $descripcion = $_POST['Descripcion'];
    $fecha = $_POST['Fecha'];

    ActualizarBitacoraModel($id_bitacora, $accion, $descripcion, $fecha);

    echo "<script>alert(Actualizacion realizada);</script>";
    echo "<script>window.location.href='BitacoraConsulta.php'</script>";

    
}
if (isset($_POST['update-bitacora'])) {
    ActualizarBitacora();
}
function AgregarBitacora(){

    $accion = $_POST['Accion'];
    $descripcion = $_POST['Descripcion'];
    $fecha = $_POST['Fecha'];

    AgregarBitacoraModel($accion, $descripcion, $fecha);

        echo "<script>alert('Agregado con exito');</script>";
        echo "<script>window.location.href='BitacoraConsulta.php'</script>";

}
if (isset($_POST['insert-bitacora'])) {
    AgregarBitacora();
}
function EliminarBitacora()
{
    $id_bitacora = intval($_REQUEST['delbitacora']);

    EliminarBitacoraModel ($id_bitacora);

        echo "<script>alert(Eliminado');</script>";
        echo "<script>window.location.href='BitacoraConsulta.php'</script>";

}
if (isset($_REQUEST['delbitacora'])) {
    EliminarBitacora();
}
//----------------------------------------------------------------------------------------------------//

//2.Usuario
function ConsultarUsuarios(){
    $datos = ConsultarUsuarioModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_usuario']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['nombre']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['apellidos']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['usuario']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['correo']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['clave']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['id_rol']); ?>
    </td>

    <td><a href="UsuarioActualizar.php?id=<?php echo htmlentities($fila['id_usuario']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="../Controller/AdminController.php?del=<?php echo htmlentities($fila['id_usuario']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar el usuario?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>

<?php

        }
    }
}

function ConsultarUsuario($id_usuario) {
    $enlace = OpenBD();

    $sql = "SELECT * FROM tb_usuario WHERE id_usuario = $id_usuario LIMIT 1";
    return mysqli_fetch_assoc($enlace->query($sql));
}

function AgregarUsuario(){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $id_rol = $_POST['id_rol'];


    $enlace = OpenBD();

    $sql = "INSERT INTO tb_usuario (nombre, apellidos, usuario, correo, clave, id_rol)
        VALUES ('$nombre','$apellidos','$usuario','$correo','$clave',$id_rol)";

    if ($enlace->query($sql) == true) {
        // Message for successfull insertion
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='../View/UsuarioAdmin.php'</script>";
    } else {
        // Message for unsuccessfull insertion
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='../View/UsuarioAdmin.php'</script>";
    }
}
if (isset($_POST['insert-usuario'])) {
    AgregarUsuario();
}

function ActualizarUsuario(){
   
    $pid = intval($_POST['id']);
  
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $id_rol = $_POST['id_rol'];

    $enlace = OpenBD();

    $sql = "UPDATE tb_usuario
        SET nombre = '$nombre' , apellidos =' $apellidos',usuario = '$usuario' ,
         correo= '$correo', clave = '$clave', id_rol = $id_rol
        WHERE id_usuario = $pid;";
    echo $sql;

    if ($enlace->query($sql) == true) {
        // Message for successfull insertion
        echo "<script>alert(Actualizar realizada');</script>";
        echo "<script>window.location.href='../View/UsuarioAdmin.php'</script>";
    } else {
        // Message for unsuccessfull insertion
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='../View/UsuarioAdmin.php'</script>";
    }
}

if (isset($_POST['update-usuario'])) {
    ActualizarUsuario();
}

function BorrarUsuario()
{
    $pid = intval($_REQUEST['del']);
    $enlace = OpenBD();

    $sql = "DELETE FROM tb_usuario WHERE id_usuario = $pid";
    if ($enlace->query($sql) == true) {
        // Message for successfull insertion
        echo "<script>alert(Actualizar realizada');</script>";
        echo "<script>window.location.href='../View/UsuarioAdmin.php'</script>";
    }
    else {
        // Message for unsuccessfull insertion
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='../View/UsuarioAdmin.php'</script>";
    }
}
if (isset($_REQUEST['del'])) {
    BorrarUsuario();
}
//----------------------------------------------------------------------------------------------//
//3.Roles

function ConsultarRoles(){
    $datos = ConsultarRolesModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_rol']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['rol_descripcion']); ?>
    </td>


    <td><a href="RolActualizar.php?id=<?php echo htmlentities($fila['id_rol']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="RolConsulta.php? delrol=<?php echo htmlentities($fila['id_rol']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar el Rol?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>

<?php

        }
    }

}
function ConsultarRolID($id_rol){
$datos = ConsultarRolIDModel($id_rol);
    return $datos;

}
function ActualizarRol(){
     $id_rol = intval($_GET['id']);

    $rol_descripcion = $_POST['descripcion'];


    ActualizarRolModel($id_rol, $rol_descripcion);


    echo "<script>alert(Actualizacion realizada);</script>";
    echo "<script>window.location.href='RolConsulta.php'</script>";

    
}
if (isset($_POST['update-rol'])) {
    ActualizarRol();
}
function AgregarRol(){


    $rol_descripcion = $_POST['rol_descripcion'];


    AgregarRolModel($rol_descripcion);

      
        echo "<script>alert('Agregado con exito');</script>";
        echo "<script>window.location.href='RolConsulta.php'</script>";

}
if (isset($_POST['insert-rol'])) {
    AgregarRol();
}

function EliminarRol()
{
    $id_rol = intval($_REQUEST['delrol']);

    EliminarRolModel ($id_rol);

        echo "<script>alert(Eliminado');</script>";
        echo "<script>window.location.href='RolConsulta.php'</script>";

}
if (isset($_REQUEST['delrol'])) {
    EliminarRol();
}

//---------------------------------------------------------------------------------

//4.Direccion

function ConsultarDireccion(){
    $datos = ConsultarDireccionModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_direccion']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['direccion']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['id_distrito']); ?>
    </td>


    <td><a href="DireccionActualizar.php?id=<?php 
                echo htmlentities($fila['id_direccion']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="DireccionConsulta.php? deldireccion=<?php 
                echo htmlentities($fila['id_direccion']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar la Direccion?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>

<?php

        }
    }

}

function ConsultarDireccionID($id_direccion){

$datos = ConsultarDireccionIDModel($id_direccion);
    return $datos;

}

function ActualizarDireccion(){
     $id_direccion = intval($_GET['id']);

    $direccion = $_POST['Direccion'];
    $id_distrito = $_POST['Distrito'];
   


    ActualizarDireccionModel($id_direccion, $direccion, $id_distrito);


    echo "<script>alert(Actualizacion realizada);</script>";
    echo "<script>window.location.href='DireccionConsulta.php'</script>";

    
}
if (isset($_POST['update-direccion'])) {
    ActualizarDireccion();
}

function AgregarDireccion(){


    $direccion = $_POST['Direccion'];
    $id_distrito = $_POST['Distrito'];

    AgregarDireccionModel($direccion, $id_distrito);

      
        echo "<script>alert('Agregado con exito');</script>";
        echo "<script>window.location.href='DireccionConsulta.php'</script>";

}
if (isset($_POST['insert-direccion'])) {
    AgregarDireccion();
}

function EliminarDireccion()
{
    $id_direccion = intval($_REQUEST['deldireccion']);

    EliminarDireccionModel ($id_direccion);

        echo "<script>alert(Eliminado');</script>";
        echo "<script>window.location.href='DireccionConsulta.php'</script>";

}
if (isset($_REQUEST['deldireccion'])) {
    EliminarDireccion();
}
//-------------------------------------------------------------------

//8.Farmacia
function ConsultarFarmacia(){
    $datos = ConsultarFarmaciaModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_farmacia']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['nombre_far']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['telefono']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['horario']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['id_direccion']); ?>
    </td>


    <td><a href="FarmaciaActualizar.php?id=<?php 
                echo htmlentities($fila['id_farmacia']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="FarmaciaConsulta.php? delfarmacia=<?php 
                echo htmlentities($fila['id_farmacia']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar Farmacia?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>

<?php

        }
    }

}

function ConsultarFarmaciaID($id_farmacia){

$datos = ConsultarFarmaciaIDModel($id_farmacia);
    return $datos;

}
function ActualizarFarmacia(){
     $id_farmacia = intval($_GET['id']);

    $nombre_far = $_POST['Nombre'];
    $telefono = $_POST['Telefono'];
    $horario = $_POST['Horario'];
    $id_direccion = $_POST['Direccion'];


    ActualizarFarmaciaModel($id_farmacia , $nombre_far, $telefono, $horario, $id_direccion);


    echo "<script>alert(Actualizacion realizada);</script>";
    echo "<script>window.location.href='FarmaciaConsulta.php'</script>";

    
}
if (isset($_POST['update-farmacia'])) {
    ActualizarFarmacia();
}

function AgregarFarmacia(){

    $nombre_far = $_POST['Nombre'];
    $telefono = $_POST['Telefono'];
    $horario = $_POST['Horario'];
    $id_direccion = $_POST['Direccion'];

    AgregarFarmaciaModel($nombre_far, $telefono, $horario, $id_direccion);

      
        echo "<script>alert('Agregado con exito');</script>";
        echo "<script>window.location.href='FarmaciaConsulta.php'</script>";

}
if (isset($_POST['insert-farmacia'])) {
    AgregarFarmacia();
}

function EliminarFarmacia()
{
    $id_farmacia = intval($_REQUEST['delfarmacia']);

    EliminarFarmaciaModel ($id_farmacia);

        echo "<script>alert(Eliminado');</script>";
        echo "<script>window.location.href='FarmaciaConsulta.php'</script>";

}
if (isset($_REQUEST['delfarmacia'])) {
    EliminarFarmacia();
}
//---------------------------------------------------------------------------

//9.Producto
function ConsultarProducto(){
    $datos = ConsultarProductoModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_producto']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['marca']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['nombre_prod']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['descrip_prod']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['cant_almacen']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['precio']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['url']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['id_tipo_med']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['id_farmacia']); ?>
    </td>


    <td><a href="ProductoActualizar.php?id=<?php 
                echo htmlentities($fila['id_producto']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="ProductoConsulta.php? delproducto=<?php 
                echo htmlentities($fila['id_producto']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar el producto?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>

<?php

        }
    }

}

function ConsultarProductoID($id_producto){

$datos = ConsultarProductoIDModel($id_producto);
    return $datos;

}
function ActualizarProducto(){
     $id_producto = intval($_GET['id']);

    $marca = $_POST['Marca'];
    $nombre_prod = $_POST['Nombre'];
    $descrip_prod = $_POST['Descripcion'];
    $cant_almacen = $_POST['Cantidad'];
    $precio = $_POST['Precio'];
    $url = $_POST['URL'];
    $id_tipo_med = $_POST['Tipo'];
    $id_farmacia = $_POST['Farmacia'];


    ActualizarProductoModel($id_producto , $marca, $nombre_prod, $descrip_prod, $cant_almacen, $precio,$url, $id_tipo_med, $id_farmacia);


    echo "<script>alert(Actualizacion realizada);</script>";
    echo "<script>window.location.href='ProductoConsulta.php'</script>";

    
}
if (isset($_POST['update-producto'])) {
    ActualizarProducto();
}

function AgregarProducto(){

    $marca = $_POST['Marca'];
    $nombre_prod = $_POST['Nombre'];
    $descrip_prod = $_POST['Descripcion'];
    $cant_almacen = $_POST['Cantidad'];
    $precio = $_POST['Precio'];
    $url = $_POST['URL'];
    $id_tipo_med = $_POST['Tipo'];
    $id_farmacia = $_POST['Farmacia'];


    AgregarProductoModel($marca, $nombre_prod, $descrip_prod, $cant_almacen, $precio,$url, $id_tipo_med, $id_farmacia);

      
        echo "<script>alert('Agregado con exito');</script>";
        echo "<script>window.location.href='ProductoConsulta.php'</script>";

}
if (isset($_POST['insert-producto'])) {
    AgregarProducto();
}

function EliminarProducto()
{
    $id_producto = intval($_REQUEST['delproducto']);

    EliminarProductoModel ($id_producto);

        echo "<script>alert(Eliminado');</script>";
        echo "<script>window.location.href='ProductoConsulta.php'</script>";

}
if (isset($_REQUEST['delproducto'])) {
    EliminarProducto();
}
//-----------------------------------------------------------

//10.Precaucion
function ConsultarPrecaucion(){
    $datos = ConsultarPrecaucionModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_precaucion']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['efectos_secundarios']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['fecha_expiracion']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['id_producto']); ?>
    </td>


    <td><a href="PrecaucionActualizar.php?id=<?php 
                echo htmlentities($fila['id_precaucion']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="PrecaucionConsulta.php? delprecaucion=<?php 
                echo htmlentities($fila['id_precaucion']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar la Precaucion?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>
<?php
        }
    }

}

function ConsultarPrecaucionID($id_precaucion){

$datos = ConsultarPrecaucionIDModel($id_precaucion);
    return $datos;

}

function ActualizarPrecaucion(){
     $id_precaucion = intval($_GET['id']);

    $efectos_secundarios = $_POST['Efectos'];
    $fecha_expiracion = $_POST['Fecha'];
    $id_producto = $_POST['Producto'];

    ActualizarPrecaucionModel($id_precaucion , $efectos_secundarios, $fecha_expiracion, $id_producto);


    echo "<script>alert(Actualizacion realizada);</script>";
    echo "<script>window.location.href='PrecaucionConsulta.php'</script>";

    
}
if (isset($_POST['update-precaucion'])) {
    ActualizarPrecaucion();
}

function AgregarPrecaucion(){

    $efectos_secundarios = $_POST['Efectos'];
    $fecha_expiracion = $_POST['Fecha'];
    $id_producto = $_POST['Producto'];

    AgregarPrecaucionModel($efectos_secundarios, $fecha_expiracion, $id_producto);

        echo "<script>alert('Agregado con exito');</script>";
        echo "<script>window.location.href='PrecaucionConsulta.php'</script>";

}
if (isset($_POST['insert-precaucion'])) {
    AgregarPrecaucion();
}

function EliminarPrecaucion()
{
    $id_precaucion = intval($_REQUEST['delprecaucion']);

    EliminarPrecaucionModel ($id_precaucion);

        echo "<script>alert(Eliminado');</script>";
        echo "<script>window.location.href='PrecaucionConsulta.php'</script>";

}
if (isset($_REQUEST['delprecaucion'])) {
    EliminarPrecaucion();
}
//-------------------------------------------------------------------

//11. Categoria
function ConsultarCategoria(){
    $datos = ConsultarCategoriaModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_tipo_med']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['categoria_med']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['descripcion_categoria_med']); ?>
    </td>


    <td><a href="CategoriaActualizar.php?id=<?php 
                echo htmlentities($fila['id_tipo_med']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="CategoriaConsulta.php? delcategoria=<?php 
                echo htmlentities($fila['id_tipo_med']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar la Categoria?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>
<?php
        }
    }

}

function ConsultarCategoriaID($id_tipo_med){

$datos = ConsultarCategoriaIDModel($id_tipo_med);
    return $datos;

}

function ActualizarCategoria(){
     $id_tipo_med = intval($_GET['id']);

    $categoria_med = $_POST['Categoria'];
    $descripcion_categoria_med = $_POST['Descripcion'];


    ActualizarCategoriaModel($id_tipo_med , $categoria_med, $descripcion_categoria_med);


    echo "<script>alert(Actualizacion realizada);</script>";
    echo "<script>window.location.href='CategoriaConsulta.php'</script>";

    
}
if (isset($_POST['update-categoria'])) {
    ActualizarCategoria();
}

function AgregarCategoria(){

    $categoria_med = $_POST['Categoria'];
    $descripcion_categoria_med = $_POST['Descripcion'];

    AgregarCategoriaModel($categoria_med, $descripcion_categoria_med);

        echo "<script>alert('Agregado con exito');</script>";
        echo "<script>window.location.href='CategoriaConsulta.php'</script>";

}
if (isset($_POST['insert-categoria'])) {
    AgregarCategoria();
}

function EliminarCategoria(){
    $id_tipo_med = intval($_REQUEST['delcategoria']);

    EliminarCategoriaModel ($id_tipo_med);

        echo "<script>alert(Eliminado');</script>";
        echo "<script>window.location.href='CategoriaConsulta.php'</script>";

}
if (isset($_REQUEST['delcategoria'])) {
    EliminarCategoria();
}
//-------------------------------------------------------------------

//12.Factura
function ConsultarFactura(){
    $datos = ConsultarFacturaModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_factura']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['fecha']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['id_usuario']); ?>
    </td>


    <td><a href="FacturaActualizar.php?id=<?php 
                echo htmlentities($fila['id_factura']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="FacturaConsulta.php? delfactura=<?php 
                echo htmlentities($fila['id_factura']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar la Factura?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>
<?php
        }
    }

}

function ConsultarFacturaID($id_factura){

$datos = ConsultarFacturaIDModel($id_factura);
    return $datos;

}

function ActualizarFactura(){
     $id_factura = intval($_GET['id']);

    $fecha = $_POST['Fecha'];
    $id_usuario = $_POST['Usuario'];


    ActualizarFacturaModel($id_factura , $fecha, $id_usuario);


    echo "<script>alert(Actualizacion realizada);</script>";
    echo "<script>window.location.href='FacturaConsulta.php'</script>";

    
}
if (isset($_POST['update-factura'])) {
    ActualizarFactura();
}

function AgregarFactura(){

    $fecha = $_POST['Fecha'];
    $id_usuario = $_POST['Usuario'];

    AgregarFacturaModel($fecha, $id_usuario);

        echo "<script>alert('Agregado con exito');</script>";
        echo "<script>window.location.href='FacturaConsulta.php'</script>";

}
if (isset($_POST['insert-factura'])) {
    AgregarFactura();
}

function EliminarFactura(){
    $id_factura = intval($_REQUEST['delfactura']);

    EliminarFacturaModel ($id_factura);

        echo "<script>alert(Eliminado');</script>";
        echo "<script>window.location.href='FacturaConsulta.php'</script>";

}
if (isset($_REQUEST['delfactura'])) {
    EliminarFactura();
}
//-------------------------------------------------------------------

//13 Detalle
function ConsultarDetalle(){
    $datos = ConsultarDetalleModel();

    if ($datos->num_rows > 0) {
        while ($fila = mysqli_fetch_array($datos)) {
?>
<tr>
    <td>
        <?php echo htmlentities($fila['id_detalle_factura']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['id_factura']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['id_producto']); ?>
    </td>
    <td>
        <?php echo htmlentities($fila['total']); ?>
    </td>

    <td><a href="DetalleActualizar.php?id=<?php 
                echo htmlentities($fila['id_detalle_factura']); ?>"><button
                class="btn btn-primary ">
                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
   
                <td><a href="DetalleConsulta.php? deldetalle=<?php 
                echo htmlentities($fila['id_detalle_factura']); ?>"><button
                class="btn btn-danger" onClick="return confirm('¿Desea eliminar el detalle?');">
                <span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>
<?php
        }
    }

}

function ConsultarDetalleID($id_detalle_factura){

$datos = ConsultarDetalleIDModel($id_detalle_factura);
    return $datos;

}

function ActualizarDetalle(){
     $id_detalle_factura = intval($_GET['id']);

    $id_factura = $_POST['Factura'];
    $id_producto = $_POST['Producto'];
    $total = $_POST['Total'];

    ActualizarDetalleModel($id_detalle_factura , $id_factura, $id_producto, $total);


    echo "<script>alert(Actualizacion realizada);</script>";
    echo "<script>window.location.href='DetalleConsulta.php'</script>";

    
}
if (isset($_POST['update-detalle'])) {
    ActualizarDetalle();
}

function AgregarDetalle(){

    $id_factura = $_POST['Factura'];
    $id_producto = $_POST['Producto'];
    $total = $_POST['Total'];

    AgregarDetalleModel($id_factura, $id_producto, $total);

        echo "<script>alert('Agregado con exito');</script>";
        echo "<script>window.location.href='DetalleConsulta.php'</script>";

}
if (isset($_POST['insert-detalle'])) {
    AgregarDetalle();
}

function EliminarDetalle(){
    $id_detalle_factura = intval($_REQUEST['deldetalle']);

    EliminarDetalleModel ($id_detalle_factura);

        echo "<script>alert(Eliminado');</script>";
        echo "<script>window.location.href='DetalleConsulta.php'</script>";

}
if (isset($_REQUEST['deldetalle'])) {
    EliminarDetalle();
}
//-------------------------------------------------------------------


//Consultar la cantiidad de datos en las tablas 

function CantidadDeDatosEnTablas()
{
    $datos = ConsultarDatosTablas();

    return $datos;
}