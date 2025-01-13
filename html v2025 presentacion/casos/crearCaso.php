<!DOCTYPE html>
<?php
session_start();

// Verificar si no hay sesión iniciada
if (!isset($_SESSION['username'])) {
    header("Location: ../sesiones/accesoDenegado.php"); // Redirigir a la página de contenido clasificado
    exit();
}
?>
<html lang="es">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Historia</title>
    <link rel="stylesheet" href="/casos/crearCaso.css">
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="logo">
                <img src="../EquemPrincipal.png" alt="Logo Equem">
            </div>
            <div class="titulo">
                <h1>Crear Nueva Historia</h1>
            </div>
            
        </header>

        <main>
            <form action="crearCasoAPI.php" method="post">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="texto">Texto:</label>
                <textarea id="texto" name="texto" required></textarea>

                <label for="organizacion">Organización:</label>
                <input type="text" id="organizacion" name="organizacion" required>

                <label for="clasificacion">Clasificación:</label>
                <input type="text" id="clasificacion" name="clasificacion" required>

                <button type="submit">Guardar Historia</button>
            </form>
        </main>

        <footer>
            <button onclick="location.href='../paginaPrincipal.php'">Volver al Menú Principal</button>
        </footer>
    </div>
</body>
</html>