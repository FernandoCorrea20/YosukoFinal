<!--<?php

//conexion a base de datos
require_once("../conexiones/conexionBD.php");



if(isset($_SESSION["usuario"]) and $_SESSION["cargo"] == 'administrador')
{
    
    
?>-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/styleProducto.css">
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
        <script>
            function exito() {
            alert("Se ha registrado con éxito");
            }
        </script>

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
                            <a class="nav-link" href="logout.php" >Cerrar Sesión</a>
                        </li>
                        <li<div><?php
                        
                                /*$nom= $_SESSION["nombres"];
                                $ape=$_SESSION["apellidos"];

                                
                                $users2= "<div class='user2'>".$nom." ".$ape."</div>";
                                $result= $users2;
                                echo $result;*/
            

                            ?></div></li>
                    </ul>
                </nav> 
            </div>
        </div>
    </header>

    <!-- -------------------------------------------------------------------------------------- -->

    <div class="container-fluid  w-75 ">

        <div class="row">
            <div class="col-2" id="rellenoGrid" >
            </div> <!-- primer columna del body -->
            <div class="col-8 " id="rellenoGrid" > <!-- segunda columna del body -->
            <!-- -------------------------------------------------------------------------------------- -->

           
               
                        
                

                    <form id="form" action="../Ajax/productoAjax.php" class="needs-validation" method="post">
                        <center><h4 class="font-weight-bold" id="rellenoTitulo" >Carga de Producto</h4></center>

                        <div  id="formGroup">   
                            <div class="input-group mb-3 input-group-sm" >
                                <input class="form-control" id="input" type="hidden" class="form-control" value="1" name="usuario">
                                
                            </div>  
                        </div>

                        <!-- -------------------------------------------------------------------------------------- --> 

                        <div  id="formGroup">
                            <div class="input-group mb-3 input-group-sm"  >      
                            <input class="form-control" id="input" type="text" class="form-control" placeholder="Nombre" name="nombre" required>                           
                               
                            </div>  
                        </div>
                        <!-- -------------------------------------------------------------------------------------- -->
                        <div  id="formGroup">
                            <div class="input-group mb-3 input-group-sm"  >                          
                                <input id="input" name="precioVenta" type="number" class="form-control" placeholder="Precio Venta" required>
                            </div>  
                        </div>
                        <!-- -------------------------------------------------------------------------------------- -->
                        <div  id="formGroup">
                            <div class="input-group mb-3 input-group-sm"  >                          
                                <input id="input" name="stock" type="number" class="form-control" placeholder="Stock" required>
                            </div>  
                        </div>
                        <!-- -------------------------------------------------------------------------------------- -->
                        <div  id="formGroup">
                            <div class="input-group mb-3 input-group-sm">                                                     
                                <input id="input" name="imagen" type="file"  required>
                            </div>  
                        </div>
                        <!-- -------------------------------------------------------------------------------------- -->
                        <div  id="formGroup">
                            <div class="input-group mb-3 input-group-sm"  >

                            <select id="input" class="form-control form-control-sm" id="cargo" name="categoria" placeholder="Cargo" required>
                                    <option value="1">Comidas</option>
                                    <option value="2r">Bebidas</option>
                                    <option value="3">Postres</option>
                                </select>
                                
                            </div>  
                        </div>
                        <!-- -------------------------------------------------------------------------------------- -->
                        <div  id="formGroup">
                        <center><b>Descripcion:</b></center> 
                            <div class="input-group mb-3 input-group-sm"  >
                            <textarea  name="descripcion" id="textarea"rows="10" cols="30"class="form-control"></textarea>
                            </div>  
                        </div>

                        
                        <div  id="formGroup">
                            <div class="input-group mb-3 input-group-sm"  >
                            </div>  
                        </div>
                        
                        <center><button onclick="exito()" id="btnIngresar" type="submit" class="btn btn-primary btn-sm btn-dark">Registrar</button></center>



                    </form>
  
                    <br>

           
            
                    
                        <!-- ----------------------------------------------------------------------------------------------- -->
            
                        

                        <br>
                        <br>
                    </div>


            
            <div class="col-2" id="rellenoGrid"></div> <!-- tercer columna del body -->
        </div> 

        

                    <!-- ---------------------------------------------------------- -->
                    <script src="js/jquery-3.5.1.min.js" ></script>
                    <script src="js/popper.min.js" ></script>
                    <script src="js/bootstrap.min.js" ></script>

                    <!-- ---------------------------------------------------------- -->
            
        <footer> 

            <div class= "row" id="footer">
            

                <div class="col-xl "><h6 class="font-weight-bold">Yosuko Delivery</h6></div>
                
                        

            </div>


        </footer>

        
    </div>


</body>
</html>

<?php

}else
{
    header("Location:http://localhost/SistemaPizzeria/Bootstrap/login.php");
}

?>