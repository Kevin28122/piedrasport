<?php 
//seguridad de sessiones paginacion
session_start();
error_reporting(0);
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
    header("location:../index.php");
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
    <title>Producto</title>
    <link rel="shortcut icon" href="../static/img/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../static/css/Producto.css">
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
                                <img src="../static/img/usuar.png" class="avatar img-fluid rounded enlarge-image" alt="">
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
                    <a href="">PiedraSport</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Administrador
                    </li>
                    <li class="sidebar-item">
                        <a href="cliente.php" class="sidebar-link ">
                            <i class="fa-solid fa-user-tag fa-lg"></i>
                            &nbsp;Cliente
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="compra.php" class="sidebar-link">
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
                        <a href="proveedor.php" class="sidebar-link">
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
                        <a href="usuario.php" class="sidebar-link" >
                            <i class="fa-solid fa-user fa-lg"></i>                            
                            &nbsp;&nbsp;&nbsp;Usuario
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="venta.php" class="sidebar-link ">
                        <i class="fa-solid fa-hand-holding-dollar fa-lg"></i>
                            &nbsp;venta
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
                        <h1>Producto</h1>
                </div>                                
                    <ul class="navbar-nav">
                        <button class="btn" id="sidebar-toggle" type="button"  onclick="window.location.href = '../../cerrar_sesion.php';">
                            <span class="fa-solid fa-right-from-bracket fa-2xl"></span>
                        </button>
                    </ul>
            </nav>
            <main class="content px-3 py-2">
                <div class="card-body">
                    <div class="card-body">          
                    <!-- Tabla -->
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <form id="insertForm" action="../../controllers/ProductoController.php" method="post">
                                        <div class="mb-3">
                                            <input type="hidden" name="setProducto" value="1">
                                            <label for="Nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="Nombre" name="nombre" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Descripcion</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Precio</label>
                                            <input type="number" min="0" class="form-control" id="precio" name="precio" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Imagen</label>
                                            <input type="file" class="form-control" id="imagen" name="imagen" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Inventario</label>
                                            <input type="number" min="0" class="form-control" id="inventario" name="inventario" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Color</label>
                                            <input type="text" class="form-control" id="color" name="color" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Insertar</button>
                                        <button class="btn btn-primary" onclick="window.location.href = 'Reporte_prod.php';">Reporte</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-controls">
                                        <div class="search-box">
                                            <input type="text" id="searchInput" placeholder="Buscar...">
                                        </div>
                                        <div class="filter-box">
                                            <select id="perPageSelect">
                                                <option value="5">Mostrar 5 registros</option>
                                                <option value="10">Mostrar 10 registros</option>
                                                <option value="15" selected>Mostrar 15 registros</option>
                                            </select>
                                        </div>
                                    </div>
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th>nombre</th>
                                                <th>Descripcion</th>
                                                <th>Precio</th>
                                                <th>Inventario</th>
                                                <th>Color</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $co = mysqli_connect('localhost','root','','piedrasportsdb');
                                            $sql="SELECT * FROM productos";
                                            $result =mysqli_query($co,$sql);

                                            while($f=mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $f ['id']?></td>
                                                <td>
                                                <?php echo $f['nombre'];?>
                                                </td>
                                                <td><?php echo $f['descripcion'];?></td>
                                                <td><?php echo $f['precio'];?></td>
                                                <td><?php echo $f['inventario'];?></td>
                                                <td><?php echo $f['color'];?></td> 
                                                <td>
                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal">Actualizar</button>
                                                <button type="button" class="btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar</button>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="pagination-buttons mt-3">
                                        <button id="prevPageButton">Anterior</button>
                                        <button id="nextPageButton">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm" action="../../controllers/ProductoController.php" method="post">
                    <input type="hidden" name="updateProducto" value="1">
                    <div class="mb-3">
                        <label for="updateId" class="form-label">ID</label>
                        <input type="text" class="form-control" name="id" id="updateId" required>
                    </div>
                    <div class="mb-3">
                        <label for="updatePrecio" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="updateNombres" required>
                    </div>
                        <label for="Precio" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="form-control" required>
                    </div>
                    <div class="mb-3">
                         <label for="" class="form-label">Precio</label>
                        <input type="number" min="0" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Inventario</label>
                        <input type="number" min="0" class="form-control" id="inventario" name="inventario" required>
                    </div>
                    <div class="mb-3">
                        <label for="Descripcion" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmación de Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="deleteForm" action="../../controllers/ProductoController.php" method="post">
                <input type="hidden" name="deleteProducto" value="1">
                        <div class="mb-3">
                            <p>¿Estás seguro de que deseas eliminar este registro?</p>
                            <label for="deleteid" class="form-label">Id</label>
                            <input type="text" class="form-control" name="id" id="deleteId" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../static/js/Producto.js"></script>
</body>

</html>