<?php 
require('function/conection.php');
$sql = "SELECT p.titulo, p.contenido, p.imagen, p.fecha, u.usuario, u.contrasena FROM publicaciones p INNER JOIN user u ON p.usuario_id = u.id";
$request = $con->prepare($sql);
$request->execute();
$request->store_result();
if ($request->num_rows > 0) {
    $request->bind_result($titulo,$contenido,$imagen,$fecha,$usuario,$contrasena);
    while ($request->fetch()) {
        echo "<h4> Datos publicados</h4>";
        echo $titulo."<br>";
        echo $contenido."<br>";
        echo $imagen."<br>";
        echo $fecha."<br>";
        echo "<h4> Datos del usuario</h4>";
        echo $usuario."<br>";
        echo $contrasena."<br>";
    }
}

 