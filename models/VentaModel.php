<?php
class VentaModel
{
    private $pdo;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getVentas()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ventas ORDER BY id asc");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setVenta($id_usuario, $total, $fecha)
    {
        $stmt = $this->pdo->prepare("INSERT INTO ventas VALUES(null, :id_usuario, :total, :fecha)");
        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->bindParam(":total", $total);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->execute();
    }

    public function updateVenta($id, $precioTotal, $precioUnitario, $cantidadProducto, $formaDePago, $fecha, $pedido, $empleado)
    {
        $stmt = $this->pdo->prepare("UPDATE ventas SET precio_total = :precioTotal, precio_unitario = :precioUnitario, cantidad_producto = :cantidadProducto, forma_de_pago = :formaDePago, fecha = :fecha, pedido = :pedido, empleado = :empleado WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->bindParam(":total", $total);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->execute();
    }
    

    public function deleteVenta($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM ventas WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}