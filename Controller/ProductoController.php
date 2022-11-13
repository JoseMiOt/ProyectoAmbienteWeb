<?php
include_once __DIR__ . '\..\Model\ProductoModel.php';

function ConsultaProductos()
    {
        $datos = ConsultaProductosModel();

        if($datos -> num_rows > 0)
        {
            while($fila = mysqli_fetch_array($datos))
            {
                echo '<div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="producto.php"><img src="' . $fila["URL"] . '" alt=""></a>
                            </div>
                        <h3>' . $fila["NOMBRE_MED"] . '</h3>
                        <p class="product-price"><span>' . $fila["MARCA"] . '</span> ' . $fila["PRECIO"] . ' </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</a>
                        </div>
                    </div>';
                
            }
        }
    }

?>

