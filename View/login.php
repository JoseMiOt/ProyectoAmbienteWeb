<?php 

include_once 'generales.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php
        login(); 
?>

</head>
<body>
   <div class="container">
     <div class="login-container">
       <div class="register">
         <h2>Registrarse</h2>
         <form action="">
           <input type="text" placeholder="Nombre" class="nombre">
           <input type="text" placeholder="Correo" class="correo">
           <input type="password" placeholder="Contraseña" class="pass">
           <input type="password" placeholder="Confirma contraseña" class="repass">
           <input type="submit" class="submit" value="REGISTRARSE">
         </form>
       </div>
       <div class="login">
         <h2>Iniciar Sesión</h2>
         <div class="login-items">
           <button class="fb"><i class="fab fa-facebook-f"></i> Acceder con Facebook</button>
           <button class="tw"><i class="fab fa-twitter"></i> Acceder con Twitter</button>
           <button class="correo"><i class="fas fa-envelope"></i> Acceder con Correo</button>
         </div>
       </div>
     </div>
   </div>
</body>
</html>