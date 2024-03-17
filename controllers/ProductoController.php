<?php
class ProductoController
{
    private $model;

    public function __construct()
    {
        require_once  "../models/ProductoModel.php";
        $this->model = new ProductoModel();
    }

    public function setProducto($nombre, $descripcion, $precio, $imagen, $inventario, $color )
    {
        if($nombre == null || $descripcion == null || $precio == null || $imagen == null || $inventario == null|| $color == null) {
            echo'
            <script>alert("Completa los campos para poder registrar el Producto");
            window.location = "../views/static/Producto.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setProducto($nombre, $descripcion, $precio, $imagen, $inventario, $color );
            echo'
            <script>alert("Producto registrado Correctamente");
            window.location = "../views/static/Producto.php";
            </script>
            ';
        }
    }

    public function getProducto()
    {
        return $this->model->getProductos();
    }

    public function deleteProducto($id)
    {
        if ($id == null) {
            echo '
            <script>alert("Ingresa el ID del Producto a eliminar");
            window.location = "../views/static/Producto.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteProducto($id);
            echo '
            <script>alert("Producto eliminado correctamente");
            window.location = "../views/static/Producto.php";
            </script>
            ';
        }
    }
    public function updateProducto($id, $nombre, $descripcion, $precio, $imagen, $inventario, $color)
    {
        if($id== null || $nombre == null || $descripcion == null || $precio == null || $imagen == null || $inventario == null|| $color == null) {
            echo '
            <script>alert("Completa todos los campos para actualizar el Producto");
            window.location = "../views/static/Producto.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateProducto($id, $nombre, $descripcion, $precio, $imagen, $inventario, $color);
            echo '
            <script>alert("Producto Actualizado correctamente");
            window.location = "../views/static/Producto.php";
            </script>
            ';
        }
    }
}

$Productocontroller = new ProductoController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getProducto'])) {
        $Productocontroller->getProducto();
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setProducto'])) {
        $Productocontroller->setProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['imagen'], $_POST['inventario'], $_POST['color']);
        exit;
    }
    if (isset($_POST['deleteProducto'])) {
        $Productocontroller->deleteProducto($_POST['id']);
        exit;
    }
    if (isset($_POST['updateProducto'])) {
        $Productocontroller->updateProducto($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['imagen'], $_POST['inventario'], $_POST['color']);
        exit;
    }
}