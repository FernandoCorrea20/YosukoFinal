<?php

require_once "../modulos/moduloCarrito.php";

$idUsuario = $_GET["id"];
$d = new Data();



$d->cambioEstado($idUsuario);


header("location: ../Bootstrap/listadoUsuarios.php");



?>