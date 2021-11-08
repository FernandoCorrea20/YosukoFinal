<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="master.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body style="background-color:darkorchid;">
    <div class="login-box">
       <img class="avatar" src="pizza2.jpeg" alt="logo pizza"> 
       <h1>Ingrese Usuario</h1>
       <form action="conexion.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" placeholder="Ingrese usuario" name="usuario">
        <label for="password">Password:</label>
        <input type="password" placeholder="Ingrese contraseña" name="password">
        <input type="submit" value="Ingresar">
        <a href="http://">Olvidaste tu contraseña?</a>

       </form>
    </div>
    
</body>
</html>