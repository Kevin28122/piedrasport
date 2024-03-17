<?php
class ProductoModel
{
    private $pdo;
    public function __construct()
    {
        require_once("C:/xampp/htdocs/PiedraSports/config/db.php");
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getProductos()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM productos ORDER BY id asc");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setProducto($nombre, $descripcion, $precio, $imagen, $inventario, $color )
    {
        $stmt = $this->pdo->prepare("INSERT INTO productos VALUES(null, :nombre, :descripcion, :precio, :imagen, :inventario,  :color)");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":imagen", $imagen);
        $stmt->bindParam(":inventario", $inventario);
        $stmt->bindParam(":color", $color);
        $stmt->execute();
    }
    public function updateProducto($id, $nombre, $descripcion, $precio, $imagen, $inventario, $color )
    {
        $stmt = $this->pdo->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, imagen = :imagen, inventario = :inventario, color = :color WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":imagen", $imagen);
        $stmt->bindParam(":inventario", $inventario);
        $stmt->bindParam(":color", $color);
        $stmt->execute();
    }

    public function deleteProducto($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}