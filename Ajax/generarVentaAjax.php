<?php
require_once "../modulos/moduloCarrito.php";
require_once "../conexiones/conexionBD2.php";
session_start();

$usuario = $_POST['usuario'];
$cliente = $_POST['idCliente'];

$carrito = $_SESSION["carrito"];
$total = $_SESSION["total"];

echo $usuario;
echo $cliente;

echo json_encode($carrito);
echo $total;


$d = new Data();


$d->crearVenta($carrito,$total,$usuario,$cliente);

$d2 = new Data();
$ventas = $d->getVentas();


foreach ($ventas as $v) {
     
    $v->id;
 
}
 
$d2 ->ActualizarCompraClie();



// remover el carrito de compra
unset($_SESSION["carrito"]);
// remover el total
unset($_SESSION["total"]);
// redirigir hacia index
header("location: ../Bootstrap/factura.php?id=".$v->id."");


?>
