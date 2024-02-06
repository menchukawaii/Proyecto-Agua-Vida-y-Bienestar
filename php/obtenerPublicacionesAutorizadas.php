<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Publicaciones</h1>

    <?php
   $dsn="mysql:dbname=EcoHuerto;host=127.0.0.1;";
    $usuario="root";
    $clave="";
    try{
    $bd=new PDO($dsn,$usuario,$clave);
    $sql="SELECT * FROM Publicaciones";
    $resultado=$bd->query($sql);
    while($publicacion=$resultado->fetch()){
       if( $publicacion["autorizado"]){
       $idPublicacion= $publicacion["id"];
       $tituloPublicacion= $publicacion["titulo"];
       $asuntoPublicacion= $publicacion["asunto"];
       $autorPublicacion= $publicacion["autor"];
       $contenidoPublicacion=$publicacion["contenido"];
       $rutaImagen="";
       $sql="SELECT * FROM Multimedia m where m.id_publicacion=".$idPublicacion;
       $resultadoMultimedia=$bd->query($sql);
       while($multimedia=$resultadoMultimedia->fetch()){
        $rutaImagen = $multimedia['ruta'];
    }
  echo "<section id=\"publicacion".$idPublicacion."\" class=\"publicacion\">";
    echo "<p>Título:  ".$tituloPublicacion." </p>"; 
    echo "<p>Asunto:    ".$asuntoPublicacion." </p>"; 
    echo "<p>Contenido: ".nl2br($contenidoPublicacion)." </p>"; 
    echo "<img src=\"" .$rutaImagen. "\" alt=\"imagen de la publicacion\"/>";
    echo "<p>Autor: ".$autorPublicacion." </p>\n";
    echo "</section>";
}
}
    $bd=null;
    }
    catch(PDOException $e){
        echo "Falló la conexión: " . $e->getMessage();
    }
 
    ?>
</body>
</html>