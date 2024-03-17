<?php
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

<header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="./busqueda.php" class="site-block-top-search" method="$GET">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Buscador" name="texto">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">Piedra Sports</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
          <div class="site-top-icons">
            <ul class="list-unstyled mb-0">
              <?php if($usuario_en_sesion): ?>
                <li class="mr-3">Bienvenido, <strong><?php echo $usuario_en_sesion; ?></strong></li>
                <li><a href="?logout=true" class="btn btn-sm btn-danger">Cerrar sesión</a></li>
              <?php else: ?>
                <li><a href="login.php"><span class="icon icon-person"></span> Iniciar sesión</a></li>
              <?php endif; ?>
              <li class="ml-md-3"><a href="cart.php" class="site-cart"><span class="icon icon-shopping_cart"></span><span class="count"><?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?></span></a></li>
              <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
            </ul>
          </div> 
        </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="index.php">Incio</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Incio</a> <span class="mx-2 mb-0">/</span>
           <strong class="text-black">Tienda</strong></div>
        </div>
      </div>
    </div>
