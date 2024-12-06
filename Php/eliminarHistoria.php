<?php
session_start();

// Valida si el usuario está autenticado y si se recibió el ID de historia
if (!isset($_SESSION['username']) || !isset($_POST['idhistoria_eliminar'])) {
    header("Location: /sesiones/accesoDenegado.php");
    exit();
}

$usuarioActual = $_SESSION['username'];
$idhistoria = intval($_POST['idhistoria_eliminar']);

$servername = "ipddbb";
$username = "";
$password = '';
$dbname = "proyectoXYZ";

// Conecta a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica que la historia pertenece al usuario
$sql = "SELECT idhistoria FROM historias WHERE idhistoria = ? AND usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $idhistoria, $usuarioActual);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<p>No tienes permiso para eliminar esta historia.</p>";
    echo '<a href="listarHistorias.php">Volver a la lista de historias</a>';
    exit();
}

// Elimina la historia
$sql = "DELETE FROM historias WHERE idhistoria = ? AND usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $idhistoria, $usuarioActual);

if ($stmt->execute()) {
    header("Location: listarHistorias.php");
} else {
    echo "<p>Error al eliminar la historia: " . $conn->error . "</p>";
}

$conn->close();
?>
