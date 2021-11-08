<?php
require_once "../conexiones/conexionBD2.php";



class ProductoCarrito{
    public $id;
    public $nombre;
    public $precio;
    public $stock;
    public $categoria;
    public $subTotal;/*precio * cantidad*/

    public function __toString(){
        return $this->id."-".$this->nombre."-".$this->precio.
        "-".$this->stock."-".$this->subTotal;
    }
}



class ProductoVenta{
    public $id;
    public $fecha;
    public $estado;
    public $total;
}

class DetalleVenta{
    public $id;
    public $nomProducto;
    public $cantidad;
    public $subTotal;
    public $precio;
}

class usuario{
    public $id;
    public $nombre;
    public $apellido;
    public $dni;
    public $cuit;
    public $telefono;
    public $email;
    public $direccion;
    public $cargo;
    public $fechaIngreso;
    public $estado;
}

class proveedor{
    public $id;
    public $dni;
    public $razonSocial;
    public $telefono;
    public $email;
    public $direccion;
    public $fechaIngreso;

}



class Data{
    private $con;

    public function __construct(){
        $this->con = new Conexion();
    }

    //------------------------------------------------------
    public function getProductos(){
        $productos = array();

        $query = "SELECT * FROM producto";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);

        while($reg = $rs->fetch_array()){
            $p = new ProductoCarrito();

            $p->id = $reg[0];
            $p->nombre = $reg[1];
            $p->precio = $reg[2];
            $p->stock = $reg[6];
            $p->categoria = $reg[7];

            array_push($productos, $p);
        }

        $this->con->desconectar();

        return $productos;
    }

    //------------------------------------------------------
    public function getVentas(){
        $ventas = array();

        $query = "SELECT * FROM pedidos";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);


        while($reg = $rs->fetch_array()){
            $v = new ProductoVenta();

            $v->id = $reg[0];
            $v->fecha = $reg[2];
            $v->estado = $reg[3];
            $v->total = $reg[5];

            array_push($ventas, $v);
        }

        $this->con->desconectar();


        return $ventas;
    }

    //------------------------------------------------------
    public function getDetalles($idVenta){
        $query = "SELECT d.id_detalle, p.nombre, d.cantidad, d.subtotal, p.precio_venta
        FROM detalleventas d
        INNER JOIN producto p ON d.id_producto = p.id_producto
        WHERE 
        d.id_pedidos = $idVenta";

        $detalles = array();
        
        $this->con->conectar();
        $rs = $this->con->ejecutar($query);
        while($reg = $rs->fetch_array()){
            $d = new DetalleVenta();

            $d->id = $reg[0];
            $d->nomProducto = $reg[1];
            $d->cantidad = $reg[2];
            $d->subTotal = $reg[3];
            $d->precio = $reg[4];

            array_push($detalles, $d);
        }

        $this->con->desconectar();

        return $detalles;
    }

    //------------------------------------------------------------------------------
    public function crearVenta($listaProductos, $total, $usuario,$cliente)
    {
        $query = "INSERT into pedidos values(null,$usuario,Now(),'pagado',$cliente,$total)";
        //$query = "INSERT into pedidos values(1,Now(),'pagado',2,200)";
        $this->con->conectar();

        $this->con->ejecutar($query);

        $query = "SELECT max(id_pedidos) from pedidos";

        $res = $this->con->ejecutar($query);

        
        $idUltimaVenta = 0;

        if($reg= mysqli_fetch_array($res))
        {
            $idUltimaVenta=$reg[0];
        }


        foreach ($listaProductos as $p) {

            $query = "INSERT into detalleventas values(null,$p->id, $idUltimaVenta, $p->cantidad, $p->subTotal)";


            $this->con->ejecutar($query);
            $this->actualizarStock($p->id,$p->cantidad);
        }
        $this->con->desconectar();
    }

    //------------------------------------------------------------------------------

    public function actualizarStock($id,$stockADescontar)
    {

        $query="SELECT stock from producto where id_producto=$id";

        $this->con->conectar();

        $res=$this->con->ejecutar($query);

        $stockActual=0;

        if($reg = mysqli_fetch_array($res))
        {
            $stockActual = $reg[0];

        }

        $resultado=$stockActual-$stockADescontar ;

        $query="UPDATE producto set stock = $resultado where id_producto=$id";

       

        $this->con->ejecutar($query);

        

    }

     //------------------------------------------------------------------------------


    public function ActualizarCompraClie()
  {

    $bd = mysqli_connect("localhost", "root", "", "dbproyecto");
    if (mysqli_connect_errno()){
    die("No se pudo conectar a la base de datos");
    }

    

    $promocion = mysqli_query($bd,"UPDATE clientes SET compras= compras + 1 WHERE id_cliente='$_REQUEST[idCliente]'");
    $busqueda = mysqli_query($bd, "SELECT compras FROM clientes ");

    while ($row = mysqli_fetch_array($busqueda)){

      if($row['compras']>10){
        $promocion = mysqli_query($bd,"UPDATE clientes SET compras= compras -10 WHERE id_cliente='$_REQUEST[idCliente]'");
      }

    }
    
  }


   //------------------------------------------------------------------------------

    public function anularFactura($id)
    {
        $query="UPDATE pedidos set estado='anulado' where id_pedidos=$id";

        $this->con->conectar();

        $this->con->ejecutar($query);

    }

    //------------------------------------------------------------------------------


    public function eliminarProducto($id)
    {
        $query="DELETE from producto where id_producto=$id";

        $this->con->conectar();

        $this->con->ejecutar($query);

    }

    //------------------------------------------------------------------------------


    public function getUsuarios(){
        $usuario = array();

        $query = "SELECT * FROM usuarios";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);


        while($reg = $rs->fetch_array()){
            $u = new usuario();

            $u->id = $reg[0];
            $u->nombre = $reg[1];
            $u->apellido = $reg[2];
            $u->dni = $reg[3];
            $u->cuit = $reg[4];
            $u->telefono = $reg[5];
            $u->email = $reg[6];
            $u->direccion = $reg[7];
            $u->cargo = $reg[8];
            $u->fechaIngreso = $reg[11];
            $u->estado = $reg[12];


        

            array_push($usuario, $u);
        }

        $this->con->desconectar();


        return $usuario;
    }

    //------------------------------------------------------------------------------


    public function eliminarUsuario($id)
    {
        $query="DELETE from usuarios where id_usuario=$id";

        $this->con->conectar();

        $this->con->ejecutar($query);

    }


    public function cambioEstado($id)
    {
        $bd = mysqli_connect("localhost", "root", "", "dbproyecto");
        if (mysqli_connect_errno()){
        die("No se pudo conectar a la base de datos");
        }
    
        $query=mysqli_query($bd,"SELECT estado from usuarios");
        $this->con->conectar();

        $this->con->ejecutar($query);

        while ($row = mysqli_fetch_array($query)){

            if($row['estado']=="activo"){
                $query="UPDATE usuarios set estado='inactivo' where id_usuario=$id";
                $this->con->conectar();

                $this->con->ejecutar($query);
            }
            elseif($row['estado']=="inactivo")
            {
                $query="UPDATE usuarios set estado='activo' where id_usuario=$id";
                $this->con->conectar();

                $this->con->ejecutar($query);
            }
       
    }

      
    }

    public function getProveedores(){
        $proveedor = array();

        $query = "SELECT * FROM proveedor";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);


        while($reg = $rs->fetch_array()){
            $p = new Proveedor();

            $p->id = $reg[0];
            $p->dni = $reg[1];
            $p->razonSocial = $reg[2];
            $p->telefono = $reg[3];
            $p->email = $reg[4];
            $p->direccion = $reg[5];
            $p->fechaIngreso = $reg[6];

            array_push($proveedor, $p);
        }

        $this->con->desconectar();


        return $proveedor;
    }

    public function eliminarProveedor($id)
    {
        $query="DELETE from proveedor where idProveedor=$id";

        $this->con->conectar();

        $this->con->ejecutar($query);

    }




}

?>

