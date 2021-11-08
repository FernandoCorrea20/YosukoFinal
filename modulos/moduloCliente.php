<?php

//empty — Determina si una variable está vacía
//isset — Determina si una variable está definida y no es NULL

//-------------------------------------------------------------------------------

//conexion a base de datos
require_once("../conexiones/conexionBD.php");

class Cliente extends conectarBase
{
 
  //---------------------------------------------------------------------------------------------------------------------------------
  public function RegistrarCliente()
  {

    $conectar = parent::conexion();
    parent :: set_names();

    $sql = "INSERT into clientes (nombres,apellidos,dni,telefono,email,direccion,fechaRegistro,compras,id_usuario) values (?,?,?,?,?,?,NOW(),?,?);";

    $sql = $conectar->prepare($sql);
  

    $sql->bindValue(1,$_POST["nombre"]);
    $sql->bindValue(2,$_POST["apellido"]);
    $sql->bindValue(3,$_POST["dni"]);
    $sql->bindValue(4,$_POST["telefono"]);
    $sql->bindValue(5,$_POST["email"]);
    $sql->bindValue(6,$_POST["direccion"]);
    $sql->bindValue(7,$_POST["compras"]);
    $sql->bindValue(8,$_POST["idUsuario"]);

    $sql-> execute();
    
    
   


  }

  //---------------------------------------------------------------------------------------------------------------------------------
  
  public function get_datos_clientes($dni)
  {

      $conectar = parent::conexion();


      $sql = "SELECT * from clientes where dni  =?";

      $sql=$conectar->prepare($sql);

      $sql->bindValue(1,$dni);
      $sql->execute();

      return $resultado = $sql->fetchAll();

  }


}



?>