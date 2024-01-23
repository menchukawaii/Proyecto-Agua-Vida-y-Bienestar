
<?php

$dsn="mysql:host=localhost;port=3307";
$usuario="root";
$clave="";
try{
    $bd=new PDO($dsn,$usuario,$clave);
    $nombreBD="EcoHuerto";

    $sql="CREATE DATABASE $nombreBD CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if($bd->query($sql)){
        echo "<p>Base de datos $nombreBD creada correctamente</p>";
        $dsn="mysql:dbname=EcoHuerto;host=127.0.0.1;port=3307";
        $bd=null;
        $bd=new PDO($dsn,$usuario,$clave);
        $nombreTabla="Usuarios";
        $crearTabla="CREATE TABLE $nombreTabla(
             usuario VARCHAR(20),
            nombre VARCHAR(20),
            apellidos VARCHAR(50),
            correo VARCHAR(50),
            passw VARCHAR(50),
            rol  CHARACTER,
            PRIMARY KEY(usuario)
            )";
             if($bd->query($crearTabla)){
                echo "<p>Tabla $nombreTabla creada correctamente</p>";
            }
             $nombreTabla="Publicaciones";
              $crearTabla="CREATE TABLE $nombreTabla(
                id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
                autor VARCHAR(20),
                asunto VARCHAR(50),
                contenido VARCHAR(500),
                autorizado Boolean,
                PRIMARY KEY(id),
                FOREIGN KEY (autor) REFERENCES Usuarios(usuario)
                )";
             if($bd->query($crearTabla)){
                echo "<p>Tabla $nombreTabla creada correctamente</p>";
            }
            $nombreTabla="Multimedia";
            $crearTabla="CREATE TABLE $nombreTabla(
            id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            ruta VARCHAR(50),
            id_publicacion INTEGER UNSIGNED,
            PRIMARY KEY(id),
            FOREIGN KEY (id_publicacion) REFERENCES Publicaciones(id)
            )";
            if($bd->query($crearTabla)){
                echo "<p>Tabla $nombreTabla creada correctamente</p>";
            }
           
       
    
}else{
        echo "<p>Error al crear la base de datos. </p>";
    }
    $bd=null;
}catch(PDOException $e){
    echo "Falló la conexión: " . $e->getMessage();
}


?>


