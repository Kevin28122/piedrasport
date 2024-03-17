<?php
class EmpleadoModel
{
    private $pdo;

    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getEmpleados()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM empleados ORDER BY id desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setEmpleado($nombre, $fechaIngreso, $email, $movil, $direccion, $usuario)
    {
        $stmt = $this->pdo->prepare("INSERT INTO empleados VALUES(null, :nombre, :fechaIngreso, :email, :movil, :direccion, :usuario)");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":fechaIngreso", $fechaIngreso);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":movil", $movil);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();
    }

    public function updateEmpleado($id, $nombre, $fechaIngreso, $email, $movil, $direccion, $usuario)
    {
        $stmt = $this->pdo->prepare("UPDATE empleados SET nombre = :nombre, fecha_ingreso = :fechaIngreso, email = :email, movil = :movil, direccion = :direccion, usuario = :usuario WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":fechaIngreso", $fechaIngreso);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":movil", $movil);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();
    }

    public function deleteEmpleado($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM empleados WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}