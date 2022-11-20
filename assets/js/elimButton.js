function EliminarCarrito(idBtn)
{
    let trAtribute = document.getElementById("trProducto");
    
    $.ajax({
        url: '../Model/ProductoModel.php',
        type: 'POST',
        dataType: 'json',
        data: {IdProductoElim:idBtn},
        success: function(data)
        {
            console.log(result);
        }
    })
    
    trAtribute.style.visibility = "hidden";
    //location.reload();
}