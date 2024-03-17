<?php
class ClienteModel
{
    private $pdo;

    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getClientes()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes ORDER BY id desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setCliente($nombre, $apellido, $direccion, $email, $usuario)
    {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (nombre, apellido, direccion, email, usuario) VALUES(:nombre, :apellido, :direccion, :email, :usuario)");
        $stmt->bindParam(":nombre", $nombre);  // Corregido: Utiliza la variable $nombre
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();   
    }


    public function updateCliente($id, $nombre, $apellido, $direccion, $email, $usuario)
    {
        $stmt = $this->pdo->prepare("UPDATE clientes SET nombre = :nombre, apellido = :apellido, direccion = :direccion, email = :email, usuario = :usuario WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();
    }

    public function deleteCliente($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}