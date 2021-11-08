<?php

//empty — Determina si una variable está vacía
//isset — Determina si una variable está definida y no es NULL

//-------------------------------------------------------------------------------

//conexion a base de datos
require_once("../conexiones/conexionBD.php");

class Proveedor extends conectarBase
{
 
  //---------------------------------------------------------------------------------------------------------------------------------
  public function RegistrarProveedor()
  {

    $conectar = parent::conexion();
    

    $sql = "INSERT into proveedor (dni,razonSocial,telefono,correo,direccion,fecha_alta,id_usuario) values (?,?,?,?,?,NOW(),?);";

    $sql = $conectar->prepare($sql);
    
    $sql->bindValue(1,$_POST["dni"]);
    $sql->bindValue(2,$_POST["razon_social"]);
    $sql->bindValue(3,$_POST["telefono"]);
    $sql->bindValue(4,$_POST["correo"]);
    $sql->bindValue(5,$_POST["direccion"]);
    $sql->bindValue(6,$_POST["idUsuario"]);

    $sql-> execute();
    
  }

  //---------------------------------------------------------------------------------------------------------------------------------

  //validar correo y dni del usuario
  public function get_datos_proveedor($dni,$razonSocial)
  {

    $conectar = parent::conexion();


    $sql = "SELECT * from proveedor where dni  =? or razon_social =?";

    $sql=$conectar->prepare($sql);

    $sql->bindValue(1,$dni);
    $sql->bindValue(2,$razonSocial);
    $sql->execute();

    return $resultado = $sql->fetchAll();

  }

  //---------------------------------------------------------------------------------------------------------------------------------

  //Modificar Usuario
  public function editar_usuario($nombre,$apellido,$direccion,$dni,$telefono,$cuil,$mail,$cargo,$usuario,$password1,$password2)
  {
      $conectar = parent::conexion();
  

      $sql="UPDATE into usuariopoo SET 
      
      nombrePOO = ?, 
      apellidoPOO = ?,
      dniPOO = ?,

      where id_usuarioPoo = ?
      
      ";

      $sql=$conectar->prepare($sql);
      $sql->bindValue(1,$_POST["nombre"]);
      $sql->bindValue(2,$_POST["apellido"]);
      $sql->bindValue(4,$_POST["dni"]);
      $sql->bindValue(6,$_POST["cuil"]);
      $sql->bindValue(5,$_POST["tel"]);
      $sql->bindValue(7,$_POST["email"]);
      $sql->bindValue(3,$_POST["direccion"]);
      $sql->bindValue(8,$_POST["cargo"]);
      $sql->bindValue(9,$_POST["usuario"]);
      $sql->bindValue(10,$_POST["contraseña1"]);
      $sql->bindValue(11,$_POST["contraseña2"]);
      $sql->bindValue(11,$_POST["fechaIngreso"]);
      $sql->bindValue(11,$_POST["estado"]);
      $sql-> execute();
  }

  //---------------------------------------------------------------------------------------------------------------------------------

  
}


?>
