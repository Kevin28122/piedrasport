<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="apple-touch-icon" href="views/static/img/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="views/static/img/logo.png">
</head>
<body>
    <div class="formulario">
        <form action="validar.php" method="post">
            <h1 class="animate__animated animate__backInLeft">Incio de sesion</h1>
            <div class="usuario">
                    <input type="text" name="NOMBRE" require>
                    <label>Nombre de usuario</label>
            </div>
            <div class="usuario">
                    <input type="password" name="CONTRASENA" require> 
                    <label>contraseña</label>
            </div>
            <input type="submit" value="Ingresar">
            <div class="additional-options">
                    <a href="registro.php">No tienes una cuenta Regístrate aquí</a>
            </div>
            <div class="additional-options">
                <a href="index.php">Seguir navegando</a>
            </div>
        </form> 
   </div>
</body>
</html>