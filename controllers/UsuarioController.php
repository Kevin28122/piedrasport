<?php
class UsuarioController
{
    private $model;
    
    public function __construct()
    {
        require_once ("../models/UsuarioModel.php");
        $this->model = new UsuarioModel();
    }

    public function setUsuario($nombre, $email, $contraseña, $rol)
    {
        if ($nombre == null || $contraseña == null || $email ==null || $rol == null){
            echo'
            <scrip>alert("completa todos los campos para registrar el Usuario");</scrip
            window.location = "../views/static/Usuario.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setUsuarios($nombre, $email, $contraseña, $rol);
            echo'
            <script>alert("Usuario insertado correctamente");
            window.location = "../views/static/Usuario.php";
            </script>
            ';
        }
    }

    public function getUsuario()
    {
        return $this->model->getUsuario();
    }

    public function deleteUsuario($nombre)
    {
        if ($nombre == null) {
            echo '
            <script>alert("Ingresa el Nombre del usuario a eliminar");
            </script>
            ';
            exit;
        } else {
            $this->model->deleteUsuario($nombre);
            echo '
            <script>alert("Usuario eliminado correctamente");
            window.location = "../views/static/Usuario.php";
            </script>
            ';
        }
    }
    public function updateUsuario($nombre, $email, $contraseña)
    {
        if ($nombre == null || $email == null || $contraseña == null) {
            echo '
            <script>alert("Completa todos los campos para actualizar el usuaruo");
            window.location = "../views/static/Usuario.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateUsuario($nombre, $email, $contraseña);
            echo '
            <script>alert("usuario Actualizado correctamente");
            window.location = "../views/static/Usuario.php";
            </script>
            ';
        }
    }
}

$Usuariocontroller = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getUsuario'])) {
        $Usuariocontroller->getUsuario();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setUsuario'])) {
        $Usuariocontroller->setUsuario($_POST['nombre'], $_POST['email'], $_POST['contraseña'], $_POST['rol']);
        exit;
    }
    if (isset($_POST['deleteUsuario'])) {
        $Usuariocontroller->deleteUsuario($_POST['Nombre']);
        exit;
    }
    if (isset($_POST['updateUsuario'])) {
        $Usuariocontroller->updateUsuario($_POST['usuario'], $_POST['Email'], $_POST['Contraseña']);
        exit;
    }
}