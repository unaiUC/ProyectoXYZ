<?php
$servername = 'ipddbb'; // o la dirección de tu servidor

$username = ''; // tu usuario de MySQL

$password = 'hZF$86@#7Phk.fTITz]yuGx<0?#8£.b)$vfz8RVXKm/eF3E9'; // tu contraseña de MySQL

$dbname = ''; // el nombre de tu base de datos


// Crear conexión

$conn = new mysqli($servername, $username, $password, $dbname);


// Comprobar conexión

if ($conn->connect_error) {

    die('ERROR 100- DDBB No responde' . $conn->connect_error);

}
?>