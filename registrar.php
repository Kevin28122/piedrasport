<?php
// Configuración de la conexión a la base de datos (modifica según tu configuración)
$dsn = 'mysql:host=localhost;dbname=piedrasportsdb';
$usuario_bd = 'root';
$contrasena_bd = '';

// Intenta conectar a la base de datos
try {
    $conexion = new PDO($dsn, $usuario_bd, $contrasena_bd);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error al conectarse a la base de datos: ' . $e->getMessage();
    exit;
}

// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    // Expresión regular para validar la contraseña
    $patron = '/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_+=])[A-Za-z0-9!@#$%^&*()-_+=]{8,}$/';

    // Verifica si la contraseña cumple con los criterios de seguridad
    if (!preg_match($patron, $contrasena)) {
        // Si la contraseña no cumple los criterios, muestra un mensaje y redirige al usuario de nuevo al formulario de registro
        echo '<script>alert("La contraseña debe tener al menos una mayúscula, un número, un carácter especial y ser mayor a 8 caracteres"); window.location = "registro.php";</script>';
        exit; // Detiene la ejecución del script
    }
    

    // Consulta para verificar si el nombre de usuario ya existe en la base de datos
    $consulta = "SELECT COUNT(*) AS num_usuarios FROM usuarios WHERE nombre = :nombre";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    // Comprueba el resultado de la consulta
    if ($resultado['num_usuarios'] > 0) {
        // Si el nombre de usuario ya existe, muestra un mensaje y pide al usuario que elija otro nombre de usuario
        echo '
        <script>alert("Nombre de usuario ya existe");
        window.location = "registro.php";
        </script>
        ';

    } else {
        // Si el nombre de usuario no existe, procede con el proceso de registro en la base de datos



        // Consulta para insertar el nuevo usuario en la base de datos
        $consulta_insertar = "INSERT INTO usuarios (nombre, email, contrasena, ROL) VALUES (:nombre, :email, :contrasena, 6)";
        $stmt_insertar = $conexion->prepare($consulta_insertar);
        $stmt_insertar->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt_insertar->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt_insertar->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

    // Ejecutar la consulta para insertar el nuevo usuario
        if ($stmt_insertar->execute()) {
            echo '     
            <script>alert("Registro exitoso! El usuario ha sido registrado correctamente");
            window.location = "registro.php";
            </script>
            ';
        } else {
            echo '     
            <script>alert("Ocurrió un error al registrar el usuario. Por favor, inténtalo de nuevo más tarde");
            window.location = "registro.php";
            </script>
            ';
        }
    }
}
?>
