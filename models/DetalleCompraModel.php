<?php

class DetalleCompraModel
{
    private $pdo;

    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getDetallesCompra()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM detalle_compra ORDER BY compra_id desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setDetalleCompra($compraId, $productoId, $cantidad, $precioUnitario)
    {
        $stmt = $this->pdo->prepare("INSERT INTO detalle_compra VALUES(null, :compraId, :productoId, :cantidad, :precioUnitario)");
        $stmt->bindParam(":compraId", $compraId);
        $stmt->bindParam(":productoId", $productoId);
        $stmt->bindParam(":cantidad", $cantidad);
        $stmt->bindParam(":precioUnitario", $precioUnitario);
        $stmt->execute();
    }

    public function updateDetalleCompra($compraId, $productoId, $cantidad, $precioUnitario)
    {
        $stmt = $this->pdo->prepare("UPDATE detalle_compra SET compra_id = :compraId, producto_id = :productoId, cantidad = :cantidad, precio_unitario = :precioUnitario WHERE compra_id = :compraId AND producto_id = :productoId");
        $stmt->bindParam(":compraId", $compraId);
        $stmt->bindParam(":productoId", $productoId);
        $stmt->bindParam(":cantidad", $cantidad);
        $stmt->bindParam(":precioUnitario", $precioUnitario);
        $stmt->execute();
    }

    public function deleteDetalleCompra($compraId, $productoId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM detalle_compra WHERE compra_id = :compraId AND producto_id = :productoId");
        $stmt->bindParam(":compraId", $compraId);
        $stmt->bindParam(":productoId", $productoId);
        $stmt->execute();
    }
}