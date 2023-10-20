<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Host de la base de datos
$usuario = "root"; // Usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$db = "news"; // Nombre de la base de datos


$connection  = new mysqli($host, $usuario, $password, $db);


if ($connection ->connect_error) {
    die("Error de conexión: " . $connection ->connect_error);
}

?>
