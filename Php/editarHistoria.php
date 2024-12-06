<?php
session_start();

// Validar que el usuario está autenticado y que se recibe un ID de historia
if (!isset($_SESSION['username']) || !isset($_GET['idhistoria'])) {
    header("Location: /sesiones/accesoDenegado.php");
    exit();
}

$usuarioActual = $_SESSION['username'];
$idhistoria = intval($_GET['idhistoria']);

$servername = "ipddbb";
$username = "";
$password = '';
$dbname = "proyectoXYZ";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el usuario propietario de la historia
$sql = "SELECT usuario FROM historias WHERE idhistoria = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idhistoria);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p>La historia no existe.</p>";
    exit();
}

$row = $result->fetch_assoc();
$usuarioHistoria = $row['usuario'];

// Verificar si el usuario actual es propietario de la historia
if ($usuarioHistoria !== $usuarioActual) {
    echo "<p>No tienes permiso para editar esta historia.</p>";
    exit();
}

// Obtener los detalles completos de la historia
$sql = "SELECT * FROM historias WHERE idhistoria = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idhistoria);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
