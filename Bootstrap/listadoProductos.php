<!--<?php

//conexion a base de datos
require_once("../conexiones/conexionBD.php");

if(isset($_SESSION["usuario"])&& $_SESSION["cargo"] == 'administrador')
{
    
    
?>-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <script> 
        function calculo(cantidad,precio,inputtext,totaltext){ 
        gndtotal= totaltext.value - inputtext.value ; 
        // Calculo subtotal / 
        subtotal = (precio*cantidad); 
        inputtext.value= subtotal; 
        total = eval(gndtotal); 
        totaltext.value= total + subtotal; 
        }
    </script> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/styleCargaPedidos.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    
</head>
<body  id="cuerpo">

    <head>

        <div class="w-75 pt-3 mx-auto row" id="cabecera">
            <div class="col"></div>
            <div class="col">
                
                <img src="img/logoPizzeria.png" class=" img-fluid mx-auto d-block" alt="Cinque Terre"  width="400" height="345"> 

            </div>
            <div class="col"></div>
        </div> 

    </head>
    <!-- -------------------------------------------------------------------------------------- -->

    <!-- 
        
        Alinear al centro: mx-auto
        Anchura: W- * ( .w-25, .w-75 pt-6, .w-75, .w-100, .mw-100)
        Altura: h- * ( .h-25, .h-75 pt-6, .h-75, .h-100, .mh-100)
        Alinear Texto: text-center
     -->

    <!-- -------------------------------------------------------------------------------------- -->

    <header class="w-75 pt-6 mx-auto">
        <div class= "row">
            <div class="col-sm ">
            

                <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-to">

                    <a class="navbar-brand" >
                        <img src="../Bootstrap/img/imgNavBar.png" alt="Logo" style="width:40px;">
                      </a>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="menuAdmin.php#">Home</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" >Cerrar Sesi??n</a>
                        </li>

                    </ul>
                </nav> 
            </div>
        </div>
    </header>

    <!-- -------------------------------------------------------------------------------------- -->

    <center><div class="container-fluid  w-75 ">

        <div class="row">
            <div class="col-2" id="rellenoGrid" >

                <br>
                <form action="buscarCategoria.php" method="post">
                <h6><b>Filtrar por Categoria</b> </h6>
                <select id="input" class="form-control form-control-sm" id="cargo" name="categoria" placeholder="Cargo" required>
                    <option value="1">Comidas</option>
                    <option value="2">Bebidas</option>
                    <option value="3">Postres</option>
                </select>

                <center><button id="btnIngresar"type="submit" class="btn btn-primary btn-sm btn-dark">Buscar</button></center>

                </form>

            </div> <!-- primer columna del body -->
            <div class="col-8 " id="rellenoGrid" > <!-- segunda columna del body -->
                <!-- -------------------------------------------------------------------------------------- -->

                <center><h4 class="font-weight-bold" id="rellenoTitulo" > Listado de Productos </h4></center>
                <table class="table-secondary table-bordered table-sm" border="2" style="border-color: black; box-shadow: 2px 2px 10px rgb(73, 35, 3); text-align: center;">

                <br>
                <tr >
                    <th >ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Accion</th>
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

                        elseif($p->categoria==2 && $p->stock<15)
                        {

                            if($p->categoria==2 && $p->stock==0)
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
                            echo "<a href='../Ajax/eliminarProductoAjax.php?id=".$p->id."'  type='button' 
                            style='background-color: #ef4331;color:white;text-decoration:none;padding-top:3px;padding-bottom:3px;padding-left:8px;padding-right:8px;' 
                            name='btnAnadir'>Eliminar</a>";
                    echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>

                    <br>
  
                </table>   

           
            
                    
                <!-- ----------------------------------------------------------------------------------------------- -->
            
                        

                       
            </div>


            
            <div class="col-2" id="rellenoGrid"></div> <!-- tercer columna del body -->
        </div> 

        

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

<?php

}else
{
    header("Location:http://localhost/SistemaPizzeria/Bootstrap/login.php");
}

?>