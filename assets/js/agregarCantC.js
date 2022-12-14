function AgregarCarritoCant2(idBtn)
{
    //let btnCarrito = document.getElementById(idBtn);
    console.log("inputCant"+idBtn);
    let comboBox = document.getElementById("inputCant"+idBtn);
    let cantidad = comboBox.options[comboBox.selectedIndex].value;

    
        console.log(cantidad);
        $.ajax({
            url: '../Model/ProductoModel.php',
            type: 'POST',
            dataType: 'json',
            data: {"Funcion":"Funcion", "IdProductoSP":idBtn, "Cant":cantidad},
            success: function(result)
            {
                console.log(result);
            }
        })

}