<?php

//conexion a base de datos
require_once("../conexiones/conexionBD.php");

session_destroy();

header("Location:http://localhost/SistemaPizzeria/Bootstrap/login.php");
exit();

?>