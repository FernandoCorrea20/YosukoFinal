<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

 
    
</head>
<body id="cuerpo">

    <!-- -------------------------------------------------------------------------------------- -->

    <div class="container-lg pt-3">


        <header >
          <div class= "row" id="cabecera">
              <div class="col-xl "><h1 class="font-weight-bold">Yosuko Delivery</h1></div>
          </div>
          <div class= "row" id="cabecera2">
              <div class="col-xl ">Pizzas - empanadas - bebidas</div>
          </div>
        </header>


        <header>

          <div class= "row">
              <div class="col-xl ">
              
                  <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">

                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link" href="index.html#">Inicio</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">¿Quienes Somos?</a>
                        </li>
                    
                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Usuarios
                          </a>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Administrador</a>
                              <a class="dropdown-item" href="#">Login Empresa</a>
                              <a class="dropdown-item" href="#">Login Clientes</a>
                              <a class="dropdown-item" href="registroUsuario.html#">Registro</a>
                            
                          </div>
                        </li>
                      </ul>
                    </nav> 

              </div>
          </div>

        </header>





        <!-- ------------------Creo una columna que para el formulario----------------------------- -->
        <div class= "row "  >
            <div class="col-xl bg-info"> 
                <!-- -------------------------------------------------------------------------------------- -->

                 <h2 class="font-weight-bold"> Registro Usuario </h2>
                    <br>
                  

                <!-- -------------------------------------------------------------------------------------- -->   
                    
                <?php
                  $reg = " ";
                  $conexion = mysqli_connect("localhost", "root", "", "sistprocdatos2") or
                  die("Problemas con la conexión");

                  $nombre = $_REQUEST['usuario'];
                  $pass = $_REQUEST['contraseña'];

                  $query = mysqli_query($conexion, "SELECT* FROM registrousuario WHERE usuarioUs = '".$nombre."' AND contraseñaUs = '".$pass."'");
                  $nr = mysqli_num_rows($query);



                  if ($nr == 1)
                  {
                    
                    echo "Bienvenido".$nombre;

                    //header ("location: index.html");                    


                  }
                  else if ($nr == 0)
                  {

                    echo "Error al ingresar";


                  }

                  
                  $_SESSION["Usuario"] = $nombre ;
                  echo "Usuario = " . $_SESSION["Usuario"] . ".<br>";









                    mysqli_close($conexion);
                    


                  ?>

                    
                
                    
                    
                    
                    <br>
          
                    <!-- ---------------------------------------------------------- -->

                    <script src="js/jquery-3.5.1.min.js" ></script>
                    <script src="js/popper.min.js" ></script>
                    <script src="js/bootstrap.min.js" ></script>
            

                    <!-- ---------------------------------------------------------- -->
                    
                        

            </div>  
            

          </div>

          <footer> 

            <div class= "row" id="cabecera2">


              <div class="col-xl "><h4 class="font-weight-bold">Contactos</h4></div>
                
            </div>          




          </footer>

    </div>








</body>
</html>