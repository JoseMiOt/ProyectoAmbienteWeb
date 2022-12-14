function ValidarContrasenna()
{
    let contrasenna = document.getElementById("txtContrasenna").value;
    let confirmacion = document.getElementById("txtConfirmarContrasenna").value;

    if(contrasenna == confirmacion)
    {
        return true;
    }
    else
    {
        alert("Valide la contraseña ingresada.");
        return false;
    }
        
}