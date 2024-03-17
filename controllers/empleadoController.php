<?php
class EmpleadoController
{
    private $model;

    public function __construct()
    {
        require_once "../models/empleadoModel.php";
        $this->model = new EmpleadoModel();
    }

    public function setEmpleado($nombre, $fechaIngreso, $email, $movil, $direccion, $usuario )
    {
        if (empty($nombre) || empty($fechaIngreso) || empty($email) || empty($movil) || empty($direccion) || empty($usuario)) {
            echo '
            <script>alert("Completa todos los campos para poder registrar el empleado");
            window.location = "../views/static/empleado.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setEmpleado($nombre, $fechaIngreso, $email, $movil, $direccion, $usuario);
            echo '
            <script>alert("Empleado registrado correctamente");
            window.location = "../views/static/empleado.php";
            </script>
            ';
        }
    }

    public function getEmpleado()
    {
        return $this->model->getEmpleados();
    }

    public function deleteEmpleado($id)
    {
        if ($id == null) {
            echo '
            <script>alert("Ingresa el ID del empleado a eliminar");
            window.location = "../views/static/empleado.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteEmpleado($id);
            echo '
            <script>alert("Empleado eliminado correctamente");
            window.location = "../views/static/empleado.php";
            </script>
            ';
        }
    }

    public function updateEmpleado($id, $nombre, $fechaIngreso, $email, $movil, $direccion, $usuario)
    {
        if ($id == null || empty($nombre) || empty($fechaIngreso) || empty($email) || empty($movil) || empty($direccion) || empty($usuario)) {
            echo '
            <script>alert("Completa todos los campos para actualizar el empleado");
            window.location = "../views/static/empleado.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateEmpleado($id, $nombre, $fechaIngreso, $email, $movil, $direccion, $usuario);
            echo '
            <script>alert("Empleado actualizado correctamente");
            window.location = "../views/static/empleado.php";
            </script>
            ';
        }
    }
}

$empleadoController = new EmpleadoController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getEmpleado'])) {
        $empleadoController->getEmpleado();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setEmpleado'])) {
        $empleadoController->setEmpleado($_POST['nombre'], $_POST['fechaIngreso'], $_POST['email'], $_POST['movil'], $_POST['direccion'], $_POST['usuario']);
        exit;
    }
    if (isset($_POST['deleteEmpleado'])) {
        $empleadoController->deleteEmpleado($_POST['id']);
        exit;
    }
    if (isset($_POST['updateEmpleado'])) {
        $empleadoController->updateEmpleado($_POST['id'], $_POST['nombre'], $_POST['fechaIngreso'], $_POST['email'], $_POST['movil'], $_POST['direccion'], $_POST['usuario']);
        exit;
    }
}