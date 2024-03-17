<?php
class PedidoModel
{
    private $pdo;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getPedidos()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pedidos ORDER BY id asc");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setPedido($fecha, $cantidad, $descripcion, $fechaEntrega, $formaDePago, $cliente)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pedidos VALUES(null, :fecha, :cantidad, :descripcion, :fechaEntrega, :formaDePago, :cliente)");
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":cantidad", $cantidad);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":fechaEntrega", $fechaEntrega);
        $stmt->bindParam(":formaDePago", $formaDePago);
        $stmt->bindParam(":cliente", $cliente);
        $stmt->execute();
    }

    public function updatePedido($id, $fecha, $cantidad, $descripcion, $fechaEntrega, $formaDePago, $cliente)
    {
        $stmt = $this->pdo->prepare("UPDATE pedidos SET fecha = :fecha, cantidad = :cantidad, descripcion = :descripcion, fecha_entrega = :fechaEntrega, forma_de_pago = :formaDePago, cliente = :cliente WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":cantidad", $cantidad);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":fechaEntrega", $fechaEntrega);
        $stmt->bindParam(":formaDePago", $formaDePago);
        $stmt->bindParam(":cliente", $cliente);
        $stmt->execute();
    }

    public function deletePedido($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pedidos WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}