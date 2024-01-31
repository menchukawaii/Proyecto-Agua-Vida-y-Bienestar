<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/signup.css">
    <title>Registro</title>
</head>

<body>
    <section class="form-container">
    <!-- <h1>Registro Usuario</h1> -->
        <form action="signup.php" method="post" class="form-signup">
            <!-- <label>Nombre: -->
                <input type="text" name="nombre" placeholder="Nombre">
            <!-- </label> -->
            <!-- <label>Apellidos: -->
                <input type="text" name="apellidos" placeholder="Apellidos">
            <!-- </label> -->
            <!-- <label>Correo: -->
                <input type="email" name="correo" placeholder="Correo electrónico">
            <!-- </label> -->
            <!-- <label>Usuario: -->
                <input type="text" name="usuario" placeholder="Nombre de usuario">
            <!-- </label> -->
            <!-- <label>Contraseña: -->
                <input type="password" name="passwd" placeholder="Contraseña">
            <!-- </label> -->
            <!-- <label>Confirmar contraseña: -->
                <input name="confirmpasswd" type="password" placeholder="Confirmar Contraseña">
            <!-- </label> -->
            <button>Registrarse</button>
            <article id="go-to-login">
                <p>Ya estás registrado?</p>
                <a href="login.php">Inicia Sesión</a>
            </article>
        </form>
        
        <article class="aside-form-signup">
            <h1>Únete a nuestro proyecto</h1>
            <h2>Agrupacion de centros escolares</h2>
            <h2>Agua Vida y Bienestar</h2>
        </article>
    </section>

</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dsn = "mysql:dbname=ecohuerto;host=127.0.0.1;port=3307";
    $usuario = "root";
    $clave = "";
    $camposValidos = true;
    $nombre = $_POST["nombre"];
    $patron = "/^[a-z]{3,n}$/";
    if (preg_match($patron, $nombre)) {
        echo "La cadena $nombre es valida";
    } else {
        echo "La cadena $nombre no es valida";
    }
    $apellidos = $_POST["apellidos"];

    $patron = "/^[a-z]{3,n}$/";
    if (preg_match($patron, $apellidos)) {
        echo "La cadena $apellidos es valida";
    } else {
        echo "La cadena $apellidos no es valida";
    }
    $correo = $_POST["correo"];
    $cadena = "e_rne456sto2@educastur.org";
    $patron = "/^[a-z]{1}([a-z]|[0-9]|_)+@educastur+\.(com|org)$/";

    if (preg_match($patron, $cadena)) {
        echo "La cadena $cadena es valida";
    } else {
        echo "La cadena $cadena no es valida";
    }
    $password = $_POST["confirmpasswd"];
    $passwordcon = $_POST["passwd"];
    $patron = "/^.{8,n}$/";
    if (preg_match($patron, $password) && $password == $passwordcon) {
        echo "La cadena $password es valida";
    } else {
        echo "La cadena $password no es valida";
    }
    $user = $_POST["usuario"];
    try {
        $bd = new PDO($dsn, $usuario, $clave);
        $sql = "INSERT INTO usuarios(usuario,nombre,apellidos,correo,passw,rol) values (\"$user\",\"$nombre\",\"$apellidos\",\"$correo\",\"$password\",\"1\"); ";
        if ($bd->query($sql)) {
            echo "Fila insertada correctamente";
        } else {
            echo "La fila no ha podido ser insertada";
        }
    } catch (PDOException $e) {
        echo "Falló la conexión: " . $e->getMessage();
    }
}
?>

</html>