<?php

//empty — Determina si una variable está vacía
//isset — Determina si una variable está definida y no es NULL

//-------------------------------------------------------------------------------

//conexion a base de datos
require_once("../conexiones/conexionBD.php");

class Usuarios extends conectarBase
{
  //---------------------------------------------------------------------------------------------------------------------------------
  public function login()
  {
    $conectar = parent::conexion();
    parent :: set_names();

    if(isset($_POST["enviar"]))
    {

      //validacion

      $password = $_POST["contraseña"];
      $usuario = $_POST["usuario"];
      $cargo = $_POST["cargo"];
      $cargo2 = $_POST["cargo2"];
      $cargo3 = $_POST["cargo3"];
      
      

        if(empty($usuario) and empty($password))
        {

          header("Location:http://localhost/SistemaPizzeriav2/Bootstrap/login.php");
          exit();

            /*
          }
          else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){12,15}$/", $password))
          {
            header("Location:".conectarBase::ruta()."Bootstrap/login.php");
            exit();*/
        }else
        {
          $sql = "SELECT* from usuarios where usuario =? and contraseña =? and cargo=?";
          
          $sql = $conectar->prepare($sql);

          $sql->bindValue(1,$usuario);
          $sql->bindValue(2,$password);
          $sql->bindValue(3,$cargo);
          $sql->execute();
          $resultado = $sql->fetch();
          //si existe el registro entonces se conecta la session
          
          if(is_array($resultado)  and count($resultado)>0)
          {

            /* IMPORTANTE: la sesion guarda los valores de los campos 
            de la tabla de la base de datos*/

            $_SESSION["id_usuario"] = $resultado["id_usuario"];
            $_SESSION["usuario"] = $resultado["usuario"];
            $_SESSION["nombres"] = $resultado["nombres"];
            $_SESSION["apellidos"] = $resultado["apellidos"];
            $_SESSION["cargo"] = $resultado["cargo"];
            $_SESSION["dni"] = $resultado["dni"];

            header("Location:http://localhost/SistemaPizzeriav2/Bootstrap/menuAdmin.php");
            exit();
          }
          

        }  

        //-----------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------

        if(empty($usuario) and empty($password))
        {

          header("Location:http://localhost/SistemaPizzeriav2/Bootstrap/login.php");
          exit();

            /*
          }
          else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){12,15}$/", $password))
          {
            header("Location:".conectarBase::ruta()."Bootstrap/login.php");
            exit();*/
        }else
        {
          $sql = "SELECT* from usuarios where usuario =? and contraseña =? and cargo=?";
          
          $sql = $conectar->prepare($sql);

          $sql->bindValue(1,$usuario);
          $sql->bindValue(2,$password);
          $sql->bindValue(3,$cargo2);
          $sql->execute();
          $resultado = $sql->fetch();
          //si existe el registro entonces se conecta la session
          
          if(is_array($resultado)  and count($resultado)>0)
          {

            /* IMPORTANTE: la sesion guarda los valores de los campos 
            de la tabla de la base de datos*/

            $_SESSION["id_usuario"] = $resultado["id_usuario"];
            $_SESSION["usuario"] = $resultado["usuario"];
            $_SESSION["nombres"] = $resultado["nombres"];
            $_SESSION["apellidos"] = $resultado["apellidos"];
            $_SESSION["cargo"] = $resultado["cargo"];
            $_SESSION["dni"] = $resultado["dni"];
            

            header("Location:http://localhost/SistemaPizzeriav2/Bootstrap/menuVendedor.php");
            exit();
          }
          

        }  

        //-----------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------

        if(empty($usuario) and empty($password))
        {

          header("Location:http://localhost/SistemaPizzeriav2/Bootstrap/login.php");
          exit();

            /*
          }
          else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){12,15}$/", $password))
          {
            header("Location:".conectarBase::ruta()."Bootstrap/login.php");
            exit();*/
        }else
        {
          $sql = "SELECT* from usuarios where usuario =? and contraseña =? and cargo=?";
          
          $sql = $conectar->prepare($sql);

          $sql->bindValue(1,$usuario);
          $sql->bindValue(2,$password);
          $sql->bindValue(3,$cargo3);
          $sql->execute();
          $resultado = $sql->fetch();
          //si existe el registro entonces se conecta la session
          
          if(is_array($resultado)  and count($resultado)>0)
          {

            /* IMPORTANTE: la sesion guarda los valores de los campos 
            de la tabla de la base de datos*/

            $_SESSION["id_usuario"] = $resultado["id_usuario"];
            $_SESSION["usuario"] = $resultado["usuario"];
            $_SESSION["nombres"] = $resultado["nombres"];
            $_SESSION["apellidos"] = $resultado["apellidos"];
            $_SESSION["cargo"] = $resultado["cargo"];
            $_SESSION["dni"] = $resultado["dni"];

            header("Location:http://localhost/SistemaPizzeriav2/Bootstrap/menuCocinero.php");
            exit();
          }
          

        }  

    }


  }

  //---------------------------------------------------------------------------------------------------------------------------------
  public function RegistrarUsuario()
  {

    $conectar = parent::conexion();
    parent :: set_names();

    $sql = "INSERT into usuarios (nombres,apellidos,dni,cuit,telefono,email,direccion,cargo,usuario,contraseña,fecha_ingreso,estado) values (?,?,?,?,?,?,?,?,?,?,NOW(),?);";


    $sql = $conectar->prepare($sql);
    
    $sql->bindValue(1,$_POST["nombres"]);
    $sql->bindValue(2,$_POST["apellidos"]);
    $sql->bindValue(3,$_POST["dni"]);
    $sql->bindValue(4,$_POST["cuil"]);
    $sql->bindValue(5,$_POST["tel"]);
    $sql->bindValue(6,$_POST["email"]);
    $sql->bindValue(7,$_POST["direccion"]);
    $sql->bindValue(8,$_POST["cargo"]);
    $sql->bindValue(9,$_POST["usuario"]);
    $sql->bindValue(10,$_POST["contraseña1"]);
    $sql->bindValue(11,$_POST["estado"]);
    $sql-> execute();


  }
  //---------------------------------------------------------------------------------------------------------------------------------

  //validar correo y dni del usuario
  public function get_dni_correo_usuario($dni,$mail)
  {

    $conectar = parent::conexion();
    parent::set_names();

    $sql = "SELECT * from usuarios where dni  =? or email =?";

    $sql=$conectar->prepare($sql);

    $sql->bindValue(1,$dni);
    $sql->bindValue(2,$mail);
    $sql->execute();

    return $resultado = $sql->fetchAll();

  }


  //---------------------------------------------------------------------------------------------------------------------------------

  
}


?>


            
                
                    
                    
                    
                  