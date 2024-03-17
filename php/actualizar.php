<?php
session_start();
$arreglo = $_SESSION['carrito'];
for ($i = 0; $i< count($arreglo); $i++){
    if($arreglo[$i]['Id'] == $S_POST['Id']){
        $arreglo[$i]["cantidad"]=$_pos['cantidad'];
        $_SESSION['carrito']= $arreglo;
        break;
    }   
}
?>  