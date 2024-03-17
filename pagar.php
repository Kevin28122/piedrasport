<?php
include "./php/conexion.php";
if(!isset($_GET['id_venta'])){
    header("location: ./");
}
$datos = $conexion->query("select 
        ventas.*, 
        usuario.nombre,usuario.telefono,usuario.email
        from ventas 
        inner join usuario on ventas.id_usuario = usuario.id
        where ventas.id=".$_GET['id_venta'])or die($conexion->error);
$datosUsuario = mysqli_fetch_row($datos);
$datos2 = $conexion->query("select * from envios where id_venta=".$_GET['id_venta'])or die($conexion->error);
$datosEnvio = mysqli_fetch_row($datos2);                  

$datos3=$conexion->query("select productos_venta.*,
            productos.nombre as  nombre_producto, productos.imagen
            from productos_venta inner join productos on productos_venta.id_producto =  productos.id
            where  id_venta =".$_GET['id_venta'])or die($conexion->error);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
    <link rel="apple-touch-icon" href="views/static/img/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="views/static/img/logo.png">
  </head>
  <body>
  <script src="https://www.paypal.com/sdk/js?client-id=Abw5CV8QGgGhuQVGfd6oU9TJjmrE7RNdmKeX5xgabGvWPijqvPQUP56gvY1kQMqKgPldtS5UFIIKkQd3&currency=USD"></script>
  
  <div class="site-wrap">
  <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Pedido</h2>
          </div>
          <div class="col-md-7">

            <form action="#" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Venta #: <?php echo $_GET['id_venta'];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Nombre: <?php echo $datosUsuario[6];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Email: <?php echo $datosUsuario[8];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Telefono: <?php echo $datosUsuario[7];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Direccion: <?php echo $datosEnvio[2];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Ciudad: <?php echo $datosEnvio[3];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Codigo postal: <?php echo $datosEnvio[4];?></label>
                  </div>
                </div>

              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
          <?php    
               while($f = mysqli_fetch_array($datos3)){

               
            
          ?>
            <div class="p-4 border mb-3">
            <img src="./images/<?php echo $f['imagen'];?>" width="50px"/>
              <span class="d-block text-primary h6 text-uppercase"><?php echo $f['nombre_producto'];?></span> <br>
              <span class="d-block text-primary h6 text-uppercase">Cantidad:<?php echo $f['cantidad'];?></span>
              <span class="d-block text-primary h6 text-uppercase">Precio:<?php echo $f['precio'];?></span>
              <span class="d-block text-primary h6 text-uppercase">Subtotal:<?php echo $f['subtotal'];?></span>
            </div>
            <?php } ?>
            <h4>Total: <?php echo $datosUsuario[2];?></h4>
            <div id="paypal-button-container" style="max-width:1000px;"></div>
          </div>
        </div>
      </div>
    </div>

    <?php include("./layouts/footer.php"); ?> 
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  <script> 
    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '<?php echo $datosUsuario[2];?>'
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          if(details.status == 'COMPLETED'){
            location.href="./thankyou.php?id_venta=<?php echo $_GET['id_venta'];?>&metodo=paypal";
          }
        });
      }
    }).render('#paypal-button-container');
        
  </script>
    
  </body>
</html>