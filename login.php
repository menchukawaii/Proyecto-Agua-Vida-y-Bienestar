<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["usuario"];
    $password = $_POST["passwd"];


    $dsn = "mysql:dbname=ecohuerto;host=127.0.0.1;port=3307";
    $usuario = "root";
    $clave = "";
    try {
        $bd = new PDO($dsn, $usuario, $clave);
        $sql = "SELECT * from usuarios u where u.usuario=\"$user\" and u.passw=\"$password\"; ";
        $resultado = $bd->query($sql);
        $count = $resultado->rowCount();
        if ($count == 1) {
            echo "Usuario conectado";
        } else {
            echo "Error de búsqueda";
        }
        $bd = null;
    } catch (PDOException $e) {
        echo "Falló la conexión: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
</head>

<body>
    <h1>Iniciar Sesión</h1>
    <form action="login.php" method="post">
        <p><label>Usuario:<input type="text" name="usuario"></label></p>
        <p><label>Contraseña:<input type="password" name="passwd"></label></p>
        <p><input type="submit" value="Enviar" name="enviar"></p>
    </form>

</body>

</html>