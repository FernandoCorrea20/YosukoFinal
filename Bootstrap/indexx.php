<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleCargaPedidos.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body  id="cuerpo">



    <div class="w-75 pt-3 mx-auto row" id="cabecera">
        <div class="col"></div>
        <div class="col">
                
            <img src="img/logoPizzeria.png" class=" img-fluid mx-auto d-block" alt="Cinque Terre"  width="400" height="345"> 

        </div>
        <div class="col"></div>
    </div> 



    <div class="w-75 pt-6 mx-auto">
        <div class= "row">
            <div class="col-sm ">
            

                <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-to">

                    <a class="navbar-brand" >
                        <img src="../Bootstrap/img/imgNavBar.png" alt="Logo" style="width:40px;">
                      </a>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="menuVendedor.php#">Home</a>
                        </li>
                        <li class="nav-item">
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" >Cerrar Sesión</a>
                        </li>
                    </ul>
                </nav> 
            </div>
        </div>
    </div>

    

        <center><div class="container-fluid  w-75 ">

        <div class="row">
        <div class="col-0" id="rellenoGrid" >

        </div> <!-- primer columna del body -->
        <div class="col-12 " id="rellenoGrid" > <!-- segunda columna del body -->




        <table class="table-secondary table-bordered table-sm" border="2" style="border-color: black; box-shadow: 2px 2px 10px rgb(73, 35, 3); text-align: center;">

                <br>
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
                            echo "<input type='submit' style='background-color: #0eae24;color:white' name='btnAnadir' value='Añadir'>";
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



            @session_start();
            if(isset($_SESSION["carrito"]))
            {
                $carrito = $_SESSION["carrito"];
                echo "<strong><h3>Listado de compra</h3></strong>";
                
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
                            echo "<a href='../Ajax/eliminarProCarAjax.php?in=$i'  type='button' 
                            style='background-color: #ef4331;color:white;text-decoration:none;padding-top:3px;padding-bottom:3px;padding-left:8px;padding-right:8px;' 
                            name='btnAnadir'>Eliminar</a>";
                        echo "</td>";
                        $total += $p->subTotal;
                        $i++;
                    echo "</tr>";
                }
                echo "<br>";
                echo "<tr>";
                    echo "<td colspan='1'><b>Total:</b></td>";
                    echo "<td colspan='1'><b>$$total</b></td>";
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

        <br>

             
</div>



<div class="col-0" id="rellenoGrid"></div> <!-- tercer columna del body --></div> 



        <!-- ---------------------------------------------------------- -->
        <script src="js/jquery-3.5.1.min.js" ></script>
        <script src="js/popper.min.js" ></script>
        <script src="js/bootstrap.min.js" ></script>

        <!-- ---------------------------------------------------------- -->
       

    




        <!-- ---------------------------------------------------------- -->

<footer> 

<div class= "row" id="footer">


    <div class="col-xl "><h6 class="font-weight-bold">Yosuko Delivery</h6></div>
    
            

</div>


</footer>


</div></center>


</body>
</html>