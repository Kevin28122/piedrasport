<?php
class ClienteController
{
    private $model;

    public function __construct()
    {
        require_once  "../models/ClienteModel.php";
        $this->model = new ClienteModel();
    }

    public function setCliente($nombre, $apellido, $direccion, $email, $usuario)
    {
        if ($nombre == null || $apellido == null || $direccion == null || $email == null || $usuario == null) {
            echo'
            <script>alert("Completa los campos para poder registrar al cliente");
            window.location = "../views/static/Cliente.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setCliente($nombre, $apellido, $direccion, $email, $usuario);
            echo'
            <script>alert("Cliente registrado Correctamente");
            window.location = "../views/static/Cliente.php";
            </script>
            ';
        }
    }

    public function getClientes()
    {
        return $this->model->getClientes();
    }

    public function deleteCliente($id)
    {
        if ($id == null) {
            echo'
            <script>alert("Ingresa el ID del cliente que desea eliminar");
            window.location = "../views/static/Cliente.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteCliente($id);
            echo'
            <script>alert("Cliente eliminado correctamente");
            window.location = "../views/static/Cliente.php";
            </script>
            ';
        }
    }
    public function updateCliente($id, $nombre, $apellido, $direccion, $email, $usuario)
    {
        if ($id == null || $nombre == null || $apellido == null || $direccion == null || $email == null || $usuario == null) {
            echo'
            <script>alert("Completa todos los campos para actualizar el cliente");
            </script>
            ';
            exit;
        } else {
            $this->model->updateCliente($id, $nombre, $apellido, $direccion, $email, $usuario);
            echo'
            <script>alert("Cliente Actualizado correctamente");
            window.location = "../views/static/Cliente.php";
            </script>
            ';
        }
    }
}

$ClienteController = new ClienteController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getClientes'])) {
        $ClienteController->getClientes();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setCliente'])) {
        $ClienteController->setCliente($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['email'], $_POST['usuario']);
        exit;
    }
    if (isset($_POST['deleteCliente'])) {
        $ClienteController->deleteCliente($_POST['id']);
        exit;
    }
    if (isset($_POST['updateCliente'])) {
        $ClienteController->updateCliente($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['email'], $_POST['usuario']);
        exit;
    }
}

