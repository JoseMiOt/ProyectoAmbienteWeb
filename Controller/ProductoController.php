<?php
include_once __DIR__ . '\..\Model\ProductoModel.php';


function ConsultaProductos()
{
    $datos = ConsultaProductosModel();

    if($datos -> num_rows > 0)
    {
        while($fila = mysqli_fetch_array($datos))
        {
            echo '<div class="col-lg-4 col-md-6 text-center strawberry">';
                    echo '<div class="single-product-item">';
                    echo '<div class="product-image">';
                    echo '<a href="producto.php?q=' . $fila["id_producto"] .'"><img src="../' . $fila["url"] . '" alt=""></a>';
                    echo '</div>';
                    echo '<h3>' . $fila["nombre_prod"] . '</h3>';
                    echo '<p class="product-price"><span>' . $fila["marca"] . '</span>₡' . $fila["precio"] . ' </p>';
                    echo '<a class="cart-btn" id="'.$fila["id_producto"].'" onclick="AgregarCarrito('.$fila["id_producto"].')"><i class="fas fa-shopping-cart"></i>Añadir al Carrito</a>';
                    echo '</div>';
                    echo '</div>';
        }
    }

}

function ConsultaProductoId($id)
{
    $datos = ConsultaProductoIdModel($id);
    return mysqli_fetch_array($datos);
}

function ConsultaProductoCat($idCat, $id)
{
    $datos = ConsultaProductoCatModel($idCat, $id);

    if($datos -> num_rows > 0)
    {
        while($fila = mysqli_fetch_array($datos))
        {
                echo '<div class="col-lg-4 col-md-6 text-center">';
                        echo '<div class="single-product-item">';
                            echo '<div class="product-image">';
                                echo '<a href="producto.php?q=' . $fila["id_producto"] .'"><img src="../' . $fila["url"] . '" alt=""></a>';
                            echo '</div>';
                            echo '<h3>' . $fila["nombre_prod"] . '</h3>';
                            echo '<p class="product-price"><span>' . $fila["marca"] . '</span> ₡' . $fila["precio"] . ' </p>';
                            echo '<a class="cart-btn" id="'.$fila["id_producto"].'" onclick="AgregarCarrito('.$fila["id_producto"].')"><i class="fas fa-shopping-cart"></i>Añadir al Carrito</a>';
                        echo '</div>';
				echo '</div>';
        }
    }
}


function ConsultaProductoInicio()
{
    $datos = ConsultaProductoInicioModel();

    if($datos -> num_rows > 0)
    {
        while($fila = mysqli_fetch_array($datos))
        {
            echo '<div class="col-lg-4 col-md-6 text-center">';
                echo '<div class="single-product-item">';
                    echo '<div class="product-image">';
                        echo '<a href="View/producto.php?q=' . $fila["id_producto"] .'"><img src="' . $fila["url"] . '" alt=""></a>';
                    echo '</div>';
                    echo '<h3>' . $fila["nombre_prod"] . '</h3>';
                    echo '<p class="product-price"><span>' . $fila["marca"] . '</span> ₡' . $fila["precio"] . ' </p>';
                    echo '<a class="cart-btn" id="'.$fila["id_producto"].'" onclick="AgregarCarritoInicio('.$fila["id_producto"].')"><i class="fas fa-shopping-cart"></i>Añadir al Carrito</a>';
                echo '</div>';
			echo '</div>';
        }
    }
}

function ConsultaCarrito($IdUsuario)
{
    $datos = ConsultaCarritoModel($IdUsuario);

    if($datos -> num_rows > 0)
    {
        while($fila = mysqli_fetch_array($datos))
        {
            echo '<tr class="table-body-row" id="trProducto">';
			echo '<td class="product-remove"><a id="'.$fila["id_producto"].'" onclick="EliminarCarrito('.$fila["id_producto"].')"><i class="far fa-window-close"></i></a></td>';
			echo '<td class="product-image"><img src="../' . $fila["url"] . '" alt=""></td>';
			echo '<td class="product-name">' . $fila["nombre_prod"] . '</td>';
			echo '<td class="product-price">₡' . $fila["precio"] . '</td>';
			echo '<td class="product-quantity"><select onchange="AgregarCarritoCant2('.$fila["id_producto"].')" class="form-control" id="inputCant'.$fila["id_producto"].'" name="inputCant">';
            echo '<option value="Select" selected>Seleccionar</option>';
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '<option value="4">4</option>';
            echo '<option value="5">5</option>';
            echo '<option value="6">6</option></select></td>';
			echo '<td class="product-total">' . $fila["cant_comprar"] . '</td>';
			echo '</tr>';
        }
    }
}

function MuestraTotal($IdUsuario)
{
    $datos = MuestraTotalModel($IdUsuario);
    return mysqli_fetch_array($datos);
}


?>

<script src="../assets/js/agregarCantC.js"></script>

