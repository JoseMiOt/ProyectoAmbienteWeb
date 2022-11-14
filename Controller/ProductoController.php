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
                    echo '<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>';
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
                            echo '<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>';
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
                    echo '<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>';
                echo '</div>';
			echo '</div>';
        }
    }
}

?>

