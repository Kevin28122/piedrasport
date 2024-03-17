<?php
class ProveedorController
{
    private $model;

    public function __construct()
    {
        require_once  "../models/ProveedorModel.php";
        $this->model = new ProveedorModel();
    }

    public function setProveedor($nombre, $email, $movil)
    {
        if($nombre == null || $email == null || $movil == null) {
            echo'
            <script>alert("Completa los campos para poder registrar el proveedor");
            window.location = "../views/static/Proveedor.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setProveedor($nombre, $email, $movil);
            echo'
            <script>alert("Proveedor registrado Correctamente");
            window.location = "../views/static/Proveedor.php";
            </script>
            ';
        }
    }

    public function getProveedores()
    {
        return $this->model->getProveedores();
    }

    public function deleteProveedor($id)
    {
        if ($id == null) {
            echo '
            <script>alert("Ingresa el ID del proveedor que desea eliminar");
            window.location = "../views/static/Proveedor.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteProveedor($id);
            echo '
            <script>alert("Proveedor eliminado correctamente");
            window.location = "../views/static/Proveedor.php";
            </script>
            ';
        }
    }
    public function updateProveedor($id,$nombre, $email, $movil)
    {
        if ($id == null || $nombre == null || $email == null || $movil == null) {
            echo '
            <script>alert("Completa todos los campos para actualizar el proveedor");
            </script>
            ';
            exit;
        } else {
            $this->model->updateProveedor($id, $nombre, $email, $movil);
            echo '
            <script>alert("Proveedor Actualizado correctamente");
            window.location = "../views/static/Proveedor.php";
            </script>
            ';
        }
    }
}

$ProveedorController = new ProveedorController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getProveedores'])) {
        $ProveedorController->getProveedores();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setProveedor'])) {
        $ProveedorController->setProveedor($_POST['nombre'], $_POST['email'], $_POST['movil']);
        exit;
    }
    if (isset($_POST['deleteProveedor'])) {
        $ProveedorController->deleteProveedor($_POST['id']);
        exit;
    }
    if (isset($_POST['updateProveedor'])) {
        $ProveedorController->updateProveedor($_POST['id'],$_POST['nombre'],$_POST['email'],$_POST['movil']);
        exit;
    }
}