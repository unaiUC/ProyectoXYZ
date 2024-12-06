<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /sesiones/accesoDenegado.php");
    exit();
}

$usuarioActual = $_SESSION['username'];
$servername = "ipddbb";
$username = "";
$password = '';
$dbname = "proyectoXYZ";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT idhistoria, titulo FROM historias WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuarioActual);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listarHistorias.css">
    <title>Seleccionar Historia</title>
</head>
<body>
    <div class="container">
        <h1>Mis Historias</h1>

        <!-- Formulario para editar historia -->
        <form action="editarHistoria.php" method="get">
            <label for="historia_editar">Selecciona una historia para editar:</label>
            <select name="idhistoria_editar" id="historia_editar" required>
                <option value="">-- Selecciona --</option>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['idhistoria']; ?>">
                        <?php echo htmlspecialchars($row['titulo']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <button type="submit">Editar</button>
        </form>
        

        <!-- Formulario para eliminar historia -->
        <form action="eliminarHistoria.php" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta historia?')">
            <label for="historia_eliminar">Selecciona una historia para eliminar:</label>
            <select name="idhistoria_eliminar" id="historia_eliminar" required>
                <option value="">-- Selecciona --</option>
                <?php
                // Ejecuta nuevamente la consulta para cargar las opciones en el formulario de eliminación
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['idhistoria']; ?>">
                        <?php echo htmlspecialchars($row['titulo']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <button type="submit" style="background-color: #ff4d4d; color: white;">Eliminar</button>
        </form>

        <button onclick="location.href='paginaPrincipal.php'">Volver al Menú Principal</button>
    </div>
</body>
</html>
<?php $conn->close(); ?>

