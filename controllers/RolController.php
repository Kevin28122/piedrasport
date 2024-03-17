<?php
class RolController
{
    private $model;
    
    public function __construct()
    {
        require_once ("../models/RolModel.php");
        $this->model = new RolModel();
    }

    public function setRol($nombre)
    {
        if ($nombre == null){
            echo'
            <scrip>alert("completa todos los campos para registrar el rol");
            window.location = "../views/static/Rol.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setRol($nombre);
            echo'
            <script>alert("Rol insertado correctamente");
            window.location = "../views/static/Rol.php";
            </script>
            ';
        }
    }

    public function getRol()
    {
        return $this->model->getRoles();
    }

    public function deleteRol($id)
    {
        if ($id == null) {
            echo '
            <script>alert("Ingresa el ID del rol a eliminar");
            window.location = "../views/static/Rol.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteRol($id);
            echo '
            <script>alert("Rol eliminado correctamente");
            window.location = "../views/static/Rol.php";
            </script>
            ';
        }
    }
    public function updateRol($id, $nombre)
    {
        if ($id == null || $nombre == null) {
            echo '
            <script>alert("Completa todos los campos para actualizar el Rol");
            window.location = "../views/static/Rol.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateRol($id, $nombre);
            echo '
            <script>alert("Rol Actualizado correctamente");
            window.location = "../views/static/Rol.php";
            </script>
            ';
        }
    }
}

$controller = new RolController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getRol'])) {
        $controller->getRol();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setRol'])) {
        $controller->setRol($_POST['nombre']);
        exit;
    }
    if (isset($_POST['deleteRol'])) {
        $controller->deleteRol($_POST['id']);
        exit;
    }
    if (isset($_POST['updateRol'])) {
        $controller->updateRol($_POST['id'], $_POST['nombre']);
        exit;
    }
}