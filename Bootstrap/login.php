<?php

//conexion a base de datos
require_once("../conexiones/conexionBD.php");

if(isset($_POST["enviar"]) and $_POST["enviar"]=="si")
{

    require_once("../modulos/moduloUsuario.php");
    $usuario = new Usuarios();
    $usuario->login();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@800&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="container-fluid w-75 ">
        
        <div class="col-sm;w-75 mx-auto row">
            <div class="login-box">
                <div class="container-fluid w-75 ">
                    <div class="col-sm;w-50 mx-auto row"></div>
                       
                        <h1>Yosuko Delivery</h1>
                        <form action="" method="post">

                        <div class="form-group">
                                <input type="hidden" name="enviar" class="form-control" value="si">
                                <input type="hidden" name="cargo" class="form-control" value="administrador">
                                <input type="hidden" name="cargo2" class="form-control" value="vendedor">
                                <input type="hidden" name="cargo3" class="form-control" value="cocinero">
                            </div>
                            <label for="usuario">Usuario:</label>
                            <input type="text" name="usuario">
                            <label for="password">Password:</label>
                            <input type="password"  name="contraseña">
                                <input type="submit" value="Ingresar">
                            
                        </form>
                        <script src="js/jquery-3.5.1.min.js" ></script>
                        <script src="js/popper.min.js" ></script>
                        <script src="js/bootstrap.min.js" ></script>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="enviar" class="form-control" value="si">
                    </div>
        
                </div>
                <!--<button type="button" class="btn btn-info">Atras</button>-->
            </div>
            
        </div>
    </div>
</body>
</html>