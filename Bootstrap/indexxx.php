<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        
        
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Listado de productos</h1>
        <table border='1'>
        <tr >
                    <th >ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Cantidad</th>
                </tr>


            <?php
            require_once "../conexiones/conexionBD2.php";
            require_once "../modulos/moduloCarrito.php";


            $d = new Data();

            $productos = $d->getProductos();

            foreach ($productos as $p) {
                echo "<tr>";
                    echo "<td>".$p->id."</td>";
                    echo "<td>".$p->nombre."</td>";
                    echo "<td>$".$p->precio."</td>";
                    echo "<td>";
                        if($p->categoria==1 && $p->stock<40  )
                        {

                            if($p->categoria==1 && $p->stock==0 )
                            {
                                ?>  <div id="parpadea" > No posee Stock</div><?php
                                echo $p->stock;

                            }else{
                                ?>  <div id="parpadea" > Poco Stock</div><?php
                                echo $p->stock;
                            
                            }
                        }

                        elseif($p->categoria==2 && $p->stock<50)
                        {

                            if($p->categoria==2 && $p->stock==0)
                            {
                                ?>  <div id="parpadea" > No posee Stock</div><?php
                                echo $p->stock;

                            }else{
                                ?>  <div id="parpadea" > Poco Stock</div><?php
                                echo $p->stock;
                            }

                        }    
                        elseif($p->categoria==3 && $p->stock<20)
                        {
    
                            if($p->categoria==3 && $p->stock==0)
                            {
                                ?>  <div id="parpadea" > No posee Stock</div><?php
                                echo $p->stock;
    
                            }else{
                                ?>  <div id="parpadea" > Poco Stock</div><?php
                                    echo $p->stock;
                            }
    
                                
    
                            
                        }else   
                        {
                            echo $p->stock;
                        }

                    echo " Us."."</td>";    
                    echo "<td>";
                        echo "<form action='../Ajax/agregarAjax.php' method='post'>";
                            echo "<input type='hidden' name='txtId' value='".$p->id."'>";
                            echo "<input type='hidden' name='txtNombre' value='".$p->nombre."'>";
                            echo "<input type='hidden' name='txtPrecio' value='".$p->precio."'>";
                            echo "<input type='hidden' name='txtStock' value='".$p->stock."'>";
                            echo "<input type='number' name='txtCantidad' required='required'>";
                            echo "<input type='submit' name='btnAnadir' value='Añadir'>";
                        echo "</form>";
                    echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>



        <?php
        if(isset($_GET["m"])){
            $m = $_GET["m"];

            switch($m){
                case "1":
                    echo "EL producto no tiene stock";
                    break;
                case "2":
                    echo "La cantidad debe ser un número positivo";
                    break;
            }
        }
        ?>

        <?php
            session_start();

            if(isset($_SESSION["carrito"])){
                $carrito = $_SESSION["carrito"];


                echo "<h1>Listado de compra</h1>";

                echo "<table border='1'>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Precio</th>";
                        echo "<th>Stock actual</th>";
                        echo "<th>Cantidad</th>";
                        echo "<th>SubTotal</th>";
                        echo "<th>Eliminar</th>";
                    echo "<tr>";

                    $total = 0;
                    $i = 0;
                    foreach ($carrito as $p) {
                        echo "<tr>";
                            echo "<td>".$p->id."</td>";
                            echo "<td>".$p->nombre."</td>";
                            echo "<td>$".$p->precio."</td>";
                            echo "<td>".$p->stock."</td>";
                            echo "<td>".$p->cantidad."</td>";
                            echo "<td>$".$p->subTotal."</td>";
                            echo "<td>";
                                echo "<a href='../Ajax/eliminarProCarAjax.php?in=$i'>Eliminar</a>";
                            echo "</td>";
                            $total += $p->subTotal;
                            $i++;
                        echo "</tr>";
                    }
                    echo "<tr>";
                        echo "<td colspan='5'><b>Total:</b></td>";
                        echo "<td colspan='2'><b>$$total</b></td>";
                        $_SESSION["total"] = $total;
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td colspan='7'>";

                    ?>       
                    <form action='../Ajax/generarVentaAjax.php' method='post'>
                            <br>
                            
                            <br>
                            <input type='number'  placeholder="Ingrese ID de Cliente" name='idCliente'  value="1">
                            <input type='hidden' name='usuario' value='2'>
                        
                            <input type='submit' class="btn btn-success" value='Comprar'>
                            <br>
                            <a href="busquedaCliente.php" style="color: blue;" role="button">Buscar un cliente?</a>
                            <br>
                            <a href="cargaCliente.php" style="color: blue;" role="button">Registrar un cliente</a>

                        </form>
                <?php
                    echo "</td>";
                    echo "</tr>";


            }

        ?>
    </body>
</html>
