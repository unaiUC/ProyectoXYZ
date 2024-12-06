<?php
$servername = "ipddbb";
$username = "";
$password = "";
$dbname = "proyectoXYZ";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta a la base de datos
$sql = "SELECT loginname FROM loginsXYZ ORDER BY loginid ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miembros</title>
    <link rel="stylesheet" href="miembros.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Miembros</h1>
        <table>
            <thead>
                <tr>
                    <th>Miembros</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . htmlspecialchars($row['loginname']) . "</td></tr>";
                    }
                } else {
                    echo "<tr><td>No hay usuarios registrados.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="buttons">
            <button onclick="window.location.href='bienvenida.php'">Ir Atrás</button>
            <button onclick="window.location.href='proyectoXYZ.php'">Hazte Miembro</button>
        </div>
    </div>
</body>
</html>
