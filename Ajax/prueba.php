<?php
require_once "../modulos/moduloCarrito.php";
require_once "../conexiones/conexionBD2.php";
session_start();

$usuario = $_POST['usuario'];
$cliente = $_POST['idCliente'];

$carrito = $_SESSION["carrito"];
$total = $_SESSION["total"];

echo $usuario;
//echo $usuario;
echo $cliente;
//echo $usuario;


$d = new Data();


$d->crearVenta($carrito, $total,$usuario,$cliente);




// remover el carrito de compra
unset($_SESSION["carrito"]);
// remover el total
unset($_SESSION["total"]);
// redirigir hacia index
header("location: ../Bootstrap/index.php");

?>
