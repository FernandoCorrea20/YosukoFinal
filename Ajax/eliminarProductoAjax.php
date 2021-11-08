<?php

require_once "../modulos/moduloCarrito.php";

$idProducto = $_GET["id"];
$d = new Data();


$d->eliminarProducto($idProducto);


header("location: ../Bootstrap/listadoProductos.php");



?>