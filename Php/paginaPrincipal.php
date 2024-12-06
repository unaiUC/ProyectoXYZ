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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto XYZ</title>
    <link rel="stylesheet" href="paginaPrincipal.css">
</head>
<body>
    <header>    
        <div class="logo-container">
            <img src="EquemPrincipal.png" alt="Logo Proyecto XYZ">
        </div>
        <div class="title-container">
            <h1 class='titulo'>Proyecto XYZ</h1>
            <h2 class='titulo'>Bienvenido Operador, estás accediendo a contenido clasificado de rango CV-04</h2>
        </div>

        <!-- Caja del usuario en la esquina superior izquierda -->
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<div class='user-display'>";
            echo "<p>Usuario: " . htmlspecialchars($_SESSION['username']) . "</p>";
            echo "</div>";
        }
        ?>
        <button class="botonEditar" onclick="location.href='listarHistorias.php'">Editar Caso</button>
    </header>
    <aside class="right-panel">
        <button id="bienvenida" onclick="location.href='bienvenida.php'">BIENVENIDA</button>
        <button id="crear-historia" onclick="location.href='casos/crearCaso.php'">ABRIR CASO</button>
<!--        <button id="login" onclick="location.href='proyectoXYZ.php'">LOGIN</button> -->
        <button id="logout" onclick="location.href='sesiones/logout.php'">CERRAR SESIÓN</button>
    </aside>
    <main>
    <body>
    <h1 class="h1Tit">Proyecto XYZ</h1>
    <h2 class="h2Tit">Casos Existentes</h2>
    <?php
    // Incluir el archivo de conexión a la base de datos
    include 'casos/DBConnectionCaso.php';
    session_start();
    // Consulta a la base de datos para obtener los 30 primeros casos
    $sql = "SELECT idhistoria, titulo, texto FROM historias ORDER BY idhistoria DESC LIMIT 30";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row["idhistoria"];
            $titulo = $row["titulo"];
            $texto = substr($row["texto"], 0, 80) . "..................."; // Cortar el texto a 30 caracteres
            echo "
            
            <table class='tablecaso'>
                <td class='columnacaso'>
                    <div class='caso'>
                    <h3 class='titulocaso'>Caso " . $id . ": " . $titulo . "</h3>
                    <p class='textocaso'>" . $texto . "</p>
                    </div>
                </td>
                <td>
                    <button class='casoboton' onclick=location.href='/casos/caso.php?id=" . $id . "'>Ver más</a>
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
    </main>
    <footer>
        <button>PÁGINA 1</button>
    </footer>
</body>
</html>
