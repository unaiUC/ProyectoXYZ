<?php
session_start();

// Validar que el usuario está autenticado y que se recibe un ID de historia
if (!isset($_SESSION['username']) || !isset($_GET['idhistoria'])) {
    header("Location: /sesiones/accesoDenegado.php");
    exit();
}

$usuarioActual = $_SESSION['username'];
$idhistoria = intval($_GET['idhistoria']);

$servername = '#############################';
$username = '#############################';
$password = '#############################';
$dbname = '#############################';

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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Historia</title>
    <link rel="stylesheet" href="editarHistoria.css">
</head>
<body>
    <div class="form-card">
        <h1>Editar Historia</h1>
        
        <form action="guardarHistoria.php" method="post">
            <!-- Campo oculto para el ID de la historia -->
            <input type="hidden" name="idhistoria" value="<?php echo htmlspecialchars($row['idhistoria']); ?>">
            
            <!-- Título de la historia -->
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($row['titulo']); ?>" required>
            
            <!-- Texto de la historia -->
            <label for="texto">Texto:</label>
            <textarea id="texto" name="texto" rows="10" required><?php echo htmlspecialchars($row['texto']); ?></textarea>
            
            <!-- Organización -->
            <label for="organizacion">Organización:</label>
            <input type="text" id="organizacion" name="organizacion" value="<?php echo htmlspecialchars($row['Organizacion']); ?>" required>
            
            <!-- Clasificación -->
            <label for="clasificacion">Clasificación:</label>
            <input type="text" id="clasificacion" name="clasificacion" value="<?php echo htmlspecialchars($row['Classification']); ?>" required>
            
            <!-- Botones de acción -->
            <button type="submit">Guardar Cambios</button>
            <button type="button" onclick="location.href='listarHistorias.php'">Volver</button>
        </form>
    </div>
</body>
</html>
<?php $conn->close(); ?>