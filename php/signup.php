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
        <form action="signup.php" method="post">
            <label>Nombre:
                <input type="text" name="nombre">
            </label>
            <label>Apellidos:
                <input type="text" name="apellidos">
            </label>
            <label>Correo:
                <input type="email" name="correo">
            </label>
            <label>Usuario:
                <input type="text" name="usuario">
            </label>
            <label>Contraseña:
                <input type="password" name="passwd">
            </label>
            <label>Confirmar contraseña:
                <input name="confirmpasswd" type="password">
            </label>
            <button>Registrarse</button>
        </form>
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