<?php
class ProveedorModel
{
    private $pdo;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getProveedores()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM proveedores ORDER BY id asc");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setProveedor($nombre, $email, $movil)
    {
        $stmt = $this->pdo->prepare("INSERT INTO proveedores VALUES(null, :nombre, :email, :movil)");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":movil", $movil);
        $stmt->execute();
    }

    public function updateProveedor($id, $nombre, $email, $movil)
    {
        $stmt = $this->pdo->prepare("UPDATE proveedores SET nombre = :nombre, email = :email, movil = :movil WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":movil", $movil);
        $stmt->execute();
    }

    public function deleteProveedor($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM proveedores WHERE id = :id");
        $stmt->bindParam(":idProveedor", $id);
        $stmt->execute();
    }
}