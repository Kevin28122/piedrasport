<?php
class CompraModel
{
    private $pdo;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getCompras()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM compras ORDER BY id asc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setCompra($precio, $fecha, $estado, $proveedor)
    {
        $stmt = $this->pdo->prepare("INSERT INTO compras (precio, fecha, estado, proveedor) VALUES(:precio, :fecha, :estado, :proveedor)");
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":proveedor", $proveedor);
        $stmt->execute();
    }
    
    public function updateCompra($id, $precio, $fecha, $estado, $proveedor)
    {
        $stmt = $this->pdo->prepare("UPDATE compras SET precio = :precio, fecha = :fecha, estado = :estado, proveedor = :proveedor WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":proveedor", $proveedor);
        $stmt->execute();
    }


    public function deleteCompra($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM compras WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}