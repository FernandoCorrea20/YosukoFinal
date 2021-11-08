<?php

require_once "../modulos/moduloCarrito.php";

$idVenta = $_GET["id"];
$d = new Data();



$d->anularFactura($idVenta);


header("location: ../Bootstrap/listadoVenta.php");



?>