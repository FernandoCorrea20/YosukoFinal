<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Bootstrap/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   

 
    
</head>
<body  id="cuerpo">

    <head>

        <div class="w-75 pt-3 mx-auto row" id="cabecera">
            <div class="col"></div>
            <div class="col">
                
                <img src="../Bootstrap/img/logoPizzeria.png" class=" img-fluid mx-auto d-block" alt="Cinque Terre"  width="400" height="345"> 

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
                            <a class="nav-link" href="../bootstrap/menuAdmin.php#">Home</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="../Bootstrap/logout.php" >Cerrar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../bootstrap/cargaProveedor.php#">Volver</a>
                        </li>

                    </ul>
                </nav> 
            </div>
        </div>
    </header>

    <!-- -------------------------------------------------------------------------------------- -->

    <div class="container-fluid  w-75 ">

        <div class="row">
            <div class="col-2" id="rellenoGrid" ></div> <!-- primer columna del body -->
            <div class="col-8" id="rellenoGrid" >
            
            <!-- -------------------------------------------------------------------------------------- -->
            
            <?php

                    //llamar a la conexión de la base de datos
                    require_once("../conexiones/conexionBD.php");
                    //llamar a producto.php
                    require_once("../modulos/moduloProducto.php");

                    $producto = new Producto();



                            $datos = $producto ->get_datos_producto($_POST["nombre"]);

   



                                if(is_array($datos) == true and  count($datos)==0)
                                {


                                    $producto -> RegistrarProducto();
                                    $messages[]="El producto se registró correctamente";



                                }else
                                {
                                    $errors[]="El producto ya existe.";

                                }

                                header("location: ../Bootstrap/cargaProducto.php");
                
                         

                            //Mensaje de alerta
                            if(isset($messages)){
                                ?>
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                    >&times;</button>
                                    <strong>¡BIEN HECHO!</strong>
                                    <?php
                                        foreach ($messages as $message){
                                            echo $message;
                                        }
                                        ?>


                                </div>
                                <?php
                            }

                            //Mensaje de error
                            if(isset($errors)){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                    >&times;</button>
                                    <strong>¡ERROR!</strong>
                                    <?php
                                        foreach ($errors as $error){
                                            echo $error;
                                        }
                                        ?>


                                </div>
                                <?php
                            }
                           

                    ?>

            </div> <!-- segunda columna del body -->


            
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
