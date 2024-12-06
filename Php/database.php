<?php
$servername = "ipddbb";
$username = "";
$password = "";
$dbname = "proyectoXYZ";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>