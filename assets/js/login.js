onload = errorLogin();

function errorLogin(){
    //document.getElementById("bt_registrarse").disabled = true;
    //document.getElementById("bt_inicio_sesion").disabled = true;
}

function validacionInicioSesion(){
    var formvalido = true;
    var correo = document.getElementById("txt_correo").value;
    var pass = document.getElementById("txt_pass").value;

    if (correo.length == 0 || pass.length == 0){
        Swal.fire({
            title: "Error al iniciar sesión",
            text: "Faltan campos por rellenar",
            icon: 'info',
            //*************VER POSIBILIDAD DE AGREGAR UNA IMAGEN*************/
            //imageUrl: 'View/images/coche.png',
            //imageWidth:'150px',
            //imageAlt: 'Foto coche'
        });

        formvalido = false;
    }
    return formvalido;
}

function validacionRegistrar(){
    var formvalido = true;
    var nombre = document.getElementById("txtNombre").value;
    var apellidos = document.getElementById("txtApellidos").value;
    var usuario = document.getElementById("txtUsuario").value;
    var correo = document.getElementById("txtCorreo").value;
    var contrasenna = document.getElementById("txtContrasenna").value;
    var contrasennaDos = document.getElementById("txtConfirContrasenna").value;


    if (nombre.length == 0 || apellidos.length == 0 || usuario.length == 0 || correo.length == 0 || contrasenna.length == 0 || contrasennaDos.length == 0){
        Swal.fire({
            title: "Error al registrarse",
            text: "Faltan campos por rellenar",
            icon: 'info',
            //*************VER POSIBILIDAD DE AGREGAR UNA IMAGEN*************/
            //imageUrl: 'View/images/coche.png',
            //imageWidth:'150px',
            //imageAlt: 'Foto coche'
        });
        formvalido = false;
    }
    if (contrasenna != contrasennaDos){
        Swal.fire({
            title: "Error al registrarse",
            text: "Las contraseñas no coinciden",
            icon: 'info',
            //*************VER POSIBILIDAD DE AGREGAR UNA IMAGEN*************/
            //imageUrl: 'View/images/coche.png',
            //imageWidth:'150px',
            //imageAlt: 'Foto coche'
        });
        formvalido = false;
    }
    return formvalido;
}