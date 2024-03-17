<?php
class UsuarioModel
{
    private $pdo;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }
    public function getUsuario()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios ORDER BY nombre asc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setUsuarios($nombre,$email, $contrasena, $rol)
    {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios VALUES(:nombre, :email, :contrasena, :rol)");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":contrasena", $contrasena);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":rol", $rol);
        $stmt->execute();
    }

    public function updateUsuario($nombre, $email, $contrasena)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET email = :email, contrasena = :contrasena WHERE nombre = :nombre");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":contrasena", $contrasena);
        $stmt->execute();
    }

    public function deleteUsuario($nombre)
    {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE nombre = :nombre");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();
    }

    public function obtenerPorNombre($nombre)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE nombre = :nombre");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();

        return $stmt->fetch();
    }
}