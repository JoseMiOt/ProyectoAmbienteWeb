function AgregarCarrito(idBtn)
{
    let btnCarrito = document.getElementById(idBtn);
    
    if(btnCarrito.style.color == 'rgb(255, 255, 255)' || btnCarrito.style.color == "")
    {
        $.ajax({
            url: '../Model/ProductoModel.php',
            type: 'POST',
            dataType: 'json',
            data: {IdProducto:idBtn},
            success: function(result)
            {
                console.log(result);
            }
        })

        btnCarrito.innerHTML = '<i class="fas fa-shopping-cart"></i>Añadido';
        btnCarrito.style.color = "#F28123";
        btnCarrito.style.backgroundColor = "#051922";
        
    }
    else 
    {
        $.ajax({
            url: '../Model/ProductoModel.php',
            type: 'POST',
            dataType: 'json',
            data: {IdProductoElim:idBtn},
            success: function(result)
            {
                console.log(result);
            }
        })

        btnCarrito.innerHTML = '<i class="fas fa-shopping-cart"></i>Añadir al Carrito';
        btnCarrito.style.color = "#fff";
        btnCarrito.style.backgroundColor = "#F28123";
    }
}





