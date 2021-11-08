<?php

//empty — Determina si una variable está vacía
//isset — Determina si una variable está definida y no es NULL

//-------------------------------------------------------------------------------

//conexion a base de datos
require_once("../conexiones/conexionBD.php");

class Pedido extends conectarBase
{
 
  //---------------------------------------------------------------------------------------------------------------------------------
  public function RegistrarPedido()
  {

    $conectar = parent::conexion();
    parent :: set_names();

    $sql = "INSERT into pedidos (id_usuario,fecha_venta,id_cliente,id_producto,cantidad,precio,subtotal,total)values (?,NOW(),?,?,?,?,?,?);";

    $sql = $conectar->prepare($sql);

    $sql->bindValue(1,$_POST["usuario"]);
    $sql->bindValue(2,$_POST["idcliente"]);
    $sql->bindValue(3,$_POST["idproducto"]);
    $sql->bindValue(4,$_POST["cantidad"]);
    $sql->bindValue(5,$_POST["precio"]);
    $sql->bindValue(6,$_POST["subtotal"]);
    $sql->bindValue(7,$_POST["total"]);

    $sql-> execute();
    
  }

  //--------------------------------------------------------------------------------------------------------------------------------- 

  

  public function restarCompraClie()
  {

    $bd = mysqli_connect("localhost", "root", "", "dbproyecto");
    if (mysqli_connect_errno()){
    die("No se pudo conectar a la base de datos");
    }

    $promocion = mysqli_query($bd,"UPDATE clientes SET compras= compras + 1 WHERE id_cliente='$_REQUEST[idcliente]'");

    
  }


  public function MostrarPedido()
  {
    $conectar = mysqli_connect("localhost", "root", "", "dbproyecto");

    $busqueda = mysqli_query($conectar, "SELECT pedidos.id_pedidos, clientes.nombres, clientes.apellidos, pedidos.fecha_venta
    FROM pedidos
    INNER JOIN clientes ON pedidos.id_cliente = clientes.id_cliente");


    while ($row = mysqli_fetch_array($busqueda)){


      echo  "<center><option>" ."<br>". "Numero de Pedido: " .$row['id_pedidos'] ."<br>"."Cliente: ".$row['nombres']." ".$row['apellidos'] ."<br>"."Fecha: " .$row['fecha_venta']."<br>"."Cantidad: " ."</option></center>". "<br>" ;
      echo "\n -------------------------------------------";

  } 


  }
}



?>
