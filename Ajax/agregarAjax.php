<?php
require_once("../conexiones/conexionBD2.php");
require_once("../modulos/moduloCarrito.php");

$p = new ProductoCarrito();

$p->cantidad = $_POST["txtCantidad"];

if($p->cantidad > 0){
    $p->id = $_POST["txtId"];
    $p->nombre = $_POST["txtNombre"];
    $p->precio = $_POST["txtPrecio"];
    $p->stock = $_POST["txtStock"];
    $p->subTotal = $p->precio * $p->cantidad;

    $d = new Data();
    
    session_start();
    if(isset($_SESSION["carrito"])){
        $carrito = $_SESSION["carrito"];
    }else{
        $carrito = array();
    }

    $sumaCantidades = 0;
    foreach ($carrito as $pro) {
        if($pro->id == $p->id){
            $sumaCantidades += $pro->cantidad;
        }
    }

    $sumaCantidades += $p->cantidad;

    if($p->stock >= $sumaCantidades){
        // tengo stock
        array_push($carrito, $p);
        $_SESSION["carrito"] = $carrito;
        header("location: ../Bootstrap/indexxx.php");
    }else{
        // no tiene stock
        header("location: ../Bootstrap/indexxx.php?m=1");
    }
}else{
    header("location: ../Bootstrap/indexxx.php?m=2");
}

?>
