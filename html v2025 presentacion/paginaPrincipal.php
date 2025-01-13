<?php
session_start();

// Verificar si no hay sesión iniciada
if (!isset($_SESSION['username'])) {
    header("Location: sesiones/accesoDenegado.php"); // Redirigir a la página de contenido clasificado
   exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto XYZ</title>
    <link rel="stylesheet" href="paginaPrincipal.css">
</head>
<body>
    <header>
        <div class="menu-container">    
            <div class="logo-container">
                <img src="EquemPrincipal.png" alt="Logo Proyecto XYZ">
            </div>
            <div class="title-container">
                <h1 class='titulo'>Proyecto XYZ</h1>
                <h2 class='titulo'>Bienvenido Operador, Recuerda estás accediendo a contenido clasificado del Equemm</h2>
            </div>
            <div class="logo-container">
                <img src="Oficina de Objetos Anomalos del EQUEM.png" alt="Logo Proyecto XYZ">
            </div>
        </div>
        <!-- Caja del usuario en la esquina superior izquierda -->
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<div class='user-display'>";
            echo "<p>Usuario: " . htmlspecialchars($_SESSION['username']) . "</p>";
            echo "<button class='botonEstandar' onclick=\"location.href='/administrar/listarHistorias.php'\">EDITAR CASO</button>";
            echo "<button class='botonEstandar' id='bienvenida' onclick=\"location.href='bienvenida.php'\">BIENVENIDA</button>";
            echo "<button class='botonEstandar' id='crear-historia' onclick=\"location.href='casos/crearCaso.php'\">ABRIR CASO</button>";
            echo "<button class='botonEstandar' id='logout' onclick=\"location.href='sesiones/logout.php'\">CERRAR SESIÓN</button>";
            echo "<button class='botonEstandar' id='logout' onclick=\"location.href='casos/caca.php'\">caca SESIÓN</button>";
            echo "</div>";
        }
        ?>  
    </header>
    <main>
    <body>
    <h1 class="h1Tit">Proyecto XYZ</h1>
    <h2 class="h2Tit">Casos Existentes</h2>
    <?php
// Incluir el archivo de conexión a la base de datos
include 'casos/DBConnectionCaso.php';
session_start();

// Modificar la consulta para ordenar correctamente
$sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY idhistoria ASC) as sequential_id,
    idhistoria, 
    titulo, 
    texto 
FROM historias 
ORDER BY idhistoria DESC 
LIMIT 30";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sequential_id = $row["sequential_id"];
        $id = $row["idhistoria"];
        $titulo = $row["titulo"];
        $texto = substr($row["texto"], 0, 80) . "..."; // Cortar el texto a X caracteres
        echo "
        <table class='tablecaso'>
            <td class='columnacaso'>
                <div class='caso'>
                <h3 class='titulocaso'>Caso " . $sequential_id . ": " . $titulo . "</h3>
                <p class='textocaso'>" . $texto . "</p>
                </div>
            </td>
            <td>
                <button class='botonEstandar' onclick=location.href='/casos/caso.php?id=" . $id . "'>Acceder</a>
            </td>
            <td>
                <button class='botonEstandar' onclick=location.href='/casos/descargarCasoAPI.php?id=" . $id . "'>Descargar</a>
            </td>
        </table>
        <p></p>
        ";
    }
} else {
    echo "No hay casos disponibles.";
}
$conn->close();
?>
    </body>
</body>
    </main>
</html>
