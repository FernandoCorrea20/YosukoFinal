<?php

require_once "../modulos/moduloCarrito.php";

$idUsuario = $_GET["id"];
$d = new Data();


$d->eliminarProveedor($idUsuario);


header("location: ../Bootstrap/listadoProveedor.php");



?>