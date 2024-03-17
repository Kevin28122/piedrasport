<?php
class VentaController
{
    private $model;

    public function __construct()
    {
        require_once  "../models/ventaModel.php";
        $this->model = new VentaModel();
    }

    public function setVenta($id_usuario, $total, $fecha)
    {
        if($id_usuario == null || $total == null || $fecha = null) {
            echo'
            <script>alert("Completa los campos para poder registrar la venta");
            window.location = "../views/static/venta.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setVenta($id_usuario, $total, $fecha);
            echo'
            <script>alert("Venta registrada Correctamente");
            window.location = "../views/static/venta.php";
            </script>
            ';
        }
    }

    public function getVenta()
    {
        return $this->model->getVentas();
    }

    public function deleteVenta($id)
    {
        if ($id == null) {
            echo '
            <script>alert("Ingresa el ID de la venta a eliminar");
            window.location = "../views/static/Venta.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteVenta($id);
            echo '
            <script>alert("Venta eliminada correctamente");
            window.location = "../views/static/Venta.php";
            </script>
            ';
        }
    }
    public function updateVenta($id, $precioTotal, $precioUnitario, $cantidadProducto, $formaDePago, $fecha, $pedido, $empleado)
    {
        if ($id == null || $precioTotal == null || $precioUnitario == null || $cantidadProducto == null || $formaDePago == null || $fecha = null || $pedido ==null || $empleado == null) {
            echo '
            <script>alert("Completa todos los campos para actualizar la venta");
            </script>
            ';
            exit;
        } else {
            $this->model->updateVenta($id, $precioTotal, $precioUnitario, $cantidadProducto, $formaDePago, $fecha, $pedido, $empleado);
            echo '
            <script>alert("Venta Actualizada correctamente");
            window.location = "../views/static/Venta.php";
            </script>
            ';
        }
    }
}

$Ventacontroller = new VentaController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getVenta'])) {
        $Ventacontroller->getVenta();
        exit;
    }
}

    if (isset($_POST['setVenta'])) {
        $Ventacontroller->setVenta($_POST['precioTotal'], $_POST['precioUnitario'], $_POST['cantidadProducto'], $_POST['formaDePago'], $_POST['fecha'], $_POST['pedido'], $_POST['empleado']);
        exit;
    }
    if (isset($_POST['deleteVenta'])) {
        $Ventacontroller->deleteVenta($_POST['id']);
        exit;
    }
    if (isset($_POST['updateVenta'])) {
        $Ventacontroller->updateVenta($_POST['id'], $_POST['precioTotal'], $_POST['precioUnitario'], $_POST['cantidadProducto'], $_POST['formaDePago'], $_POST['fecha'], $_POST['pedido'], $_POST['empleado']);
        exit;
    }

