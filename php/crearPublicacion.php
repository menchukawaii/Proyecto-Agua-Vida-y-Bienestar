
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear publicacion</title>
</head>
<body>
<?php
 $dsn = "mysql:dbname=ecohuerto;host=127.0.0.1;port=3307";
$usuario = "root";
$clave = "";

function agregarPublicacion($titulo, $asunto, $contenido)
{
    global $dsn, $usuario, $clave;
    try {
        $bd = new PDO($dsn, $usuario, $clave);
        $sql = "INSERT INTO publicaciones(titulo, asunto, contenido, autorizado) VALUES (:titulo, :asunto, :contenido, :autorizado)";
        $preparada = $bd->prepare($sql);

     
        $resultado = $preparada->execute(array(':titulo' => $titulo, ':asunto' => $asunto, ':contenido' => $contenido, ':autorizado' => false));

        return $resultado ? true : false;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['titulo']) && isset($_POST['asunto'])) {
        $titulo = $_POST['titulo'];
        $asunto = $_POST['asunto'];
        $contenido = $_POST['contenido'];

        $resultado = agregarPublicacion($titulo, $asunto, $contenido);

        if ($resultado === true) {
            echo "<p>Publicacion añadida correctamente a la base de datos.</p>";
        } else {
            echo "<p>Error al añadir publicacion.<p>";
        }
    } else {
        echo "<p>Rellena el formulario.</p>";
    }
}
?>
<h1>crea tu publicacion</h1>
    <form action="crearPublicacion.php" method="post">
        <p>
            <label for="titulo">Título:</label>
            <input type="text" name="titulo">
        </p>
        <p>
            <label for="asunto">Asunto:</label>
            <input type="text" name="asunto">
        </p>
        <p><label for="contenido">Contenido:</label></p>
        <textarea name="contenido" cols="30" rows="10"></textarea>
        <br>
        <button type="submit">Crear</button>
        <button type="reset">reiniciar</button>
    </form>
    <p><a href="Principal.html">Volver a la página principal</a></p>
</body>
</html>
