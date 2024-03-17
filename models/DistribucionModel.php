<?php

class DistribucionModel
{
    private $pdo;

    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getDistribuciones()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM distribuciones ORDER BY id desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setDistribucion($fechaInicio, $fechaFin, $pedido)
    {
        $stmt = $this->pdo->prepare("INSERT INTO distribuciones VALUES(null, :fechaInicio, :fechaFin, :pedido)");
        $stmt->bindParam(":fechaInicio", $fechaInicio);
        $stmt->bindParam(":fechaFin", $fechaFin);
        $stmt->bindParam(":pedido", $pedido);
        $stmt->execute();
    }

    public function updateDistribucion($id, $fechaInicio, $fechaFin, $pedido)
    {
        $stmt = $this->pdo->prepare("UPDATE distribuciones SET fecha_inicio = :fechaInicio, fecha_fin = :fechaFin, pedido = :pedido WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":fechaInicio", $fechaInicio);
        $stmt->bindParam(":fechaFin", $fechaFin);
        $stmt->bindParam(":pedido", $pedido);
        $stmt->execute();
    }

    public function deleteDistribucion($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM distribuciones WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}