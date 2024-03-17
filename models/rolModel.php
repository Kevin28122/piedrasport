<?php
class RolModel
{
    private $pdo;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getRoles()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM roles ORDER BY id asc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setRol($nombre)
    {
        $stmt = $this->pdo->prepare("INSERT INTO roles VALUES(null, :nombre)");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();
    }

    public function updateRol($id, $nombre)
    {
        $stmt = $this->pdo->prepare("UPDATE roles SET nombre = :nombre WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();
    }

    public function deleteRol($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM roles WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function getRol($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM roles WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch();
    }
}