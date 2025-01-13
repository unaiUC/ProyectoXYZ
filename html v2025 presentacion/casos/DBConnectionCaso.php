<?php
$servername = '#############################'; // o la dirección de tu servidor

$username = '#############################'; // tu usuario de MySQL

$password = '#############################'; // tu contraseña de MySQL

$dbname = '#############################'; // el nombre de tu base de datos


// Crear conexión

$conn = new mysqli($servername, $username, $password, $dbname);


// Comprobar conexión

if ($conn->connect_error) {

    die('ERROR 100- DDBB No responde' . $conn->connect_error);

}
?>