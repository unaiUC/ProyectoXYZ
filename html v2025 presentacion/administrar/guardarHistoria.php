<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /sesiones/accesoDenegado.php");
    exit();
}

$usuarioActual = $_SESSION['username'];
$idhistoria = intval($_POST['idhistoria']);
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$organizacion = $_POST['organizacion'];
$clasificacion = $_POST['clasificacion'];

$servername = '#############################';
$username = '#############################';
$password = '#############################';
$dbname = '#############################';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "UPDATE historias SET titulo = ?, texto = ?, Organizacion = ?, Classification = ? WHERE idhistoria = ? AND usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssis", $titulo, $texto, $organizacion, $clasificacion, $idhistoria, $usuarioActual);

if ($stmt->execute()) {
    // Redirigir a listarHistorias.php después de guardar exitosamente
    header("Location: listarHistorias.php");
    exit();
} else {
    echo "<p>Error al actualizar la historia.</p>";
}

$conn->close();
?>