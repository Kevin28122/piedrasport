<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="apple-touch-icon" href="views/static/img/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="views/static/img/logo.png">
</head>
<body>
    <div class="formulario">
        <form action="registrar.php" method="post" onsubmit="return validarContraseña()"> <!-- Agregado el evento onsubmit para llamar a la función de validación -->
            <h1 class="animate__animated animate__backInLeft">Registro de Usuario</h1>
            <div class="usuario">
                    <input type="text" name="nombre" required> <!-- Cambiado el name a "nombre" -->
                    <label>Nombre de usuario</label>
            </div>
            <div class="usuario">
                    <input type="email" name="email" required> <!-- Agregado un campo para el correo electrónico -->
                    <label>Correo electrónico</label>
            </div>
            <div class="usuario">
                    <input type="password" id="password" name="contrasena" required> <!-- Cambiado el name a "contrasena" -->
                    <label>Contraseña</label>
            </div>
            <div class="usuario">
                    <input type="password" id="confirm_password" required> <!-- Nuevo campo para confirmar contraseña -->
                    <label>Confirmar Contraseña</label>
            </div>
            <input type="submit" value="Registrarse"> <!-- Cambiado el valor del botón -->
            <div class="additional-options">
                    <a href="login.php">¿Ya tienes una cuenta? Inicia sesión aquí</a> <!-- Cambiado el enlace a la página de inicio de sesión -->
            </div>
        </form> 
   </div>

   <script>
       function validarContraseña() {
           var password = document.getElementById("password").value;
           var confirm_password = document.getElementById("confirm_password").value;

           if (password != confirm_password) {
               alert("Las contraseñas no coinciden.");
               return false;
           }
           return true;
       }
   </script>
</body>
</html>
