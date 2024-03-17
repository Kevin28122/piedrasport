<?php
$usuario = $_POST['NOMBRE'];
$contraseña = $_POST['CONTRASENA'];
session_start();

$conexion = mysqli_connect("localhost", "root", "", "piedrasportsdb");

$consulta = "SELECT * FROM usuarios WHERE NOMBRE='$usuario' AND CONTRASENA='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $filas = mysqli_fetch_array($resultado);
    $_SESSION['usuario'] = $usuario; // Establecer la sesión solo si el usuario y la contraseña son correctos
    if ($filas['ROL'] == 1) {
        header("location:views/static/producto.php");
    } else if ($filas['ROL'] == 6) {
        header("location:index.php");
    }
} else {
    ?>
    <script>
        alert("Usuario o contraseña incorrectos. Por favor, inténtelo nuevamente.");
        window.location = "login.php";
    </script>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
