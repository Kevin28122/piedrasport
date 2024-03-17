<?php 
//seguridad de sessiones paginacion
session_start();
error_reporting(0);
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
    header("location:../../index.php");
    die();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  // Verificar si el usuario está autenticado
  $usuario_en_sesion = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
  
  // Cerrar sesión
  if (isset($_GET['logout'])) {
      unset($_SESSION['usuario']);
      // Redirigir a la página de inicio o a donde prefieras después de cerrar sesión
      header("Location: index.php");
      exit();
  }

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="apple-touch-icon" href="img/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">

</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="img/usuar.png" class="avatar img-fluid rounded enlarge-image" alt="">
                            </a>                            
                            <div class="dropdown-menu dropdown-menu-end">
                                <?php if($usuario_en_sesion): ?>
                                    <p class="mr-3">Bienvenido, <strong><?php echo $usuario_en_sesion; ?></strong></p>
                                <?php endif; ?>                                                              
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-logo">
                    <a href="#">PiedraSport</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Administrador
                    </li>
                    <li class="sidebar-item">
                        <a href="Cliente.php" class="sidebar-link ">
                            <i class="fa-solid fa-user-tag fa-lg"></i>
                            &nbsp;Cliente
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Compra.php" class="sidebar-link">
                            <i class="fa-solid fa-bag-shopping fa-lg"></i>
                            &nbsp;&nbsp;Compra
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="empleado.php" class="sidebar-link">
                            <i class="fa-solid fa-person fa-xl"></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;Empleado
                        </a>
                    </li>
                    <li class="sidebar-item"> 
                        <a href="Producto.php" class="sidebar-link">
                            <i class="fa-solid fa-basketball fa-lg"></i>
                            &nbsp;&nbsp;Producto
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Proveedor.php" class="sidebar-link">
                            <i class="fa-solid fa-address-book fa-lg"></i> 
                            &nbsp;&nbsp;&nbsp;Proveedor
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="Rol.php" class="sidebar-link">
                            <i class="fa-solid fa-users fa-lg"></i>
                            &nbsp;&nbsp;Roles
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Usuario.php" class="sidebar-link" >
                            <i class="fa-solid fa-user fa-lg"></i>                            
                            &nbsp;&nbsp;&nbsp;Usuario
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="title">
                        <h1>Venta</h1>
                </div>                                
                    <ul class="navbar-nav">
                    <button class="btn" id="sidebar-toggle" type="button"  onclick="window.location.href = '../../cerrar_sesion.php';">
                            <span class="fa-solid fa-right-from-bracket fa-2xl"></span>
                        </button>
                    </ul>
            </nav>
            <?php
                // Establecer la conexión a la base de datos
                $conexion = new mysqli("localhost", "root", "", "piedrasportsdb");

                // Verificar la conexión
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                // Consulta SQL
                $resultado = $conexion->query("
                    SELECT ventas.*, usuario.nombre, usuario.telefono, usuario.email
                    FROM ventas 
                    inner join usuario on ventas.id_usuario = usuario.id
                ") or die($conexion->error);

                // Recorrer los resultados, etc.

                // Cerrar la conexión
                $conexion->close();
                ?>

            <main class="content px-3 py-2">
                
                <div class="card-body">
                    
                    <div class="card-body">          
                    <!-- Tabla -->
                    <div class="accordion"  id="accordionExample">
                        <?php
                        while($f=mysqli_fetch_array($resultado)){
                        ?>
                        
                        <div class="card">
                            <div class="card-header" id="heading<?php echo $f['id']; ?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $f['id']; ?>" aria-expanded="true" aria-controls="collapseOne">
                                <?php echo $f['nombre'].'-'. $f['status'].'-'. $f['fecha']; ?>
                                </button>
                            </h5>
                            </div>
                            <div id="collapse<?php echo $f['id']; ?>" class="collapse show" aria-labelledby="heading<?php echo $f['id']; ?>" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Nombre cliente:<?php echo $f['nombre']; ?></p>
                                <p>Email cliente:<?php echo $f['email']; ?></p>
                                <p>Telefono :<?php echo $f['telefono']; ?></p>
                                <p class="h6">Datos envio</p>
                                <?php
                                    // Establecer la conexión a la base de datos
                                    $conexion = new mysqli("localhost", "root", "", "piedrasportsdb");

                                    // Verificar la conexión
                                    if ($conexion->connect_error) {
                                        die("Error de conexión: " . $conexion->connect_error);
                                    }
                                    $re=$conexion->query("select * from envios where id_venta=".$f['id'])or die ($conexion->error);
                                    $fila=mysqli_fetch_row($re);
                                ?>
                                <p>Direccion :<?php echo $fila[2]; ?></p>
                                <p>Estado :<?php echo $fila[3]; ?></p>
                                <p>c.p :<?php echo $fila[4]; ?></p>

                            </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>PiedraSport</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Booking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>