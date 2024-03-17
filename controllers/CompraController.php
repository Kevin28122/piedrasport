<?php
class CompraController
{
    private $model;

    public function __construct()
    {
        require_once  "../models/CompraModel.php";
        $this->model = new CompraModel();
    }

    public function setCompra($precio, $fecha, $estado, $proveedor)
    {
        if($precio == null || $fecha == null || $estado == null || $proveedor == null) {
            echo'
            <script>alert("Completa los campos para poder registrar la compra");
            window.location = "../views/static/Compra.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setCompra($precio, $fecha, $estado, $proveedor);
            echo'
            <script>alert("Compra registrado Correctamente");
            window.location = "../views/static/Compra.php";
            </script>
            ';
        }
    }

    public function getCompra()
    {
        return $this->model->getCompras();
    }

    public function deleteCompra($id)
    {
        if ($id == null) {
            echo '
            <script>alert("Ingresa el ID de la compra que desea eliminar");
            window.location = "../views/static/Compra.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteCompra($id);
            echo '
            <script>alert("Compra eliminada correctamente");
            window.location = "../views/static/Compra.php";
            </script>
            ';
        }
    }
    public function updateCompra($id, $precio, $fecha, $estado, $proveedor)
    {
        if ($id == null || $precio == null || $fecha == null || $estado == null || $proveedor == null) {
            echo '
            <script>alert("Completa todos los campos para actualizar la compra");
            </script>
            ';
            exit;
        } else {
            $this->model->updateCompra($id, $precio, $fecha, $estado, $proveedor);
            echo '
            <script>alert("Compra Actualizada correctamente");
            window.location = "../views/static/Compra.php";
            </script>
            ';
        }
    }
}

$CompraController = new CompraController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getCompras'])) {
        $CompraController->getCompra();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setCompra'])) {
        $CompraController->setCompra($_POST['precio'], $_POST['fecha'], $_POST['estado'], $_POST['proveedor']);
        exit;
    }
    if (isset($_POST['deleteCompra'])) {
        $CompraController->deleteCompra($_POST['id']);
        exit;
    }
    if (isset($_POST['updateCompra'])) {
        $CompraController->updateCompra($_POST['id'], $_POST['precio'], $_POST['fecha'], $_POST['estado'], $_POST['proveedor']);
        exit;
    }
}