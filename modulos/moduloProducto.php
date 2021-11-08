<?php

require_once("../conexiones/conexionBD.php");



class Producto extends conectarBase
{
    public $id;
    public $nombre;
    public $precioVenta;
    public $stock;
    public $cantidad;
    public $subtotal;



    public function RegistrarProducto()
    {
        $conectar = parent::conexion();

        $sql="INSERT into producto (nombre, precio_venta, fecha_alta, imagen, descripcion, stock,id_categoria, id_usuario) values (?,?,NOW(),?,?,?,?,?);";

        $sql= $conectar->prepare($sql);

        $sql->bindValue(1,$_POST["nombre"]);
        $sql->bindValue(2,$_POST["precioVenta"]);
        $sql->bindValue(3,$_POST["imagen"]);
        $sql->bindValue(4,$_POST["descripcion"]);
        $sql->bindValue(5,$_POST["stock"]);
        $sql->bindValue(6,$_POST["categoria"]);
        $sql->bindValue(7,$_POST["usuario"]);

        $sql->execute();
    }


      //validar correo y dni del usuario
    public function get_datos_producto($nombre)
    {

        $conectar = parent::conexion();


        $sql = "SELECT * from producto where nombre  =?";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$nombre);
        $sql->execute();

        return $resultado = $sql->fetchAll();

    }

    


}

?>