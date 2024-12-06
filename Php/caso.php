<?php
session_start();

// Verificar si no hay sesión iniciada
if (!isset($_SESSION['username'])) {
    header("Location: ../sesiones/accesoDenegado.php"); // Redirigir a la página de contenido clasificado
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivo Clasificado</title>
    <link rel="stylesheet" href="caso.css">
    <?php include 'casoAPI.php'; ?> 
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="logo">
                <img src="EquemmClassicV2B.png" alt="Logo Equem">
            </div>
            <div class="titulo">
                <h1>Archivo Clasificado: <?php echo $titulo; ?> </h1>
                <p class="detalles">[FECHA: <?php echo $fecha; ?>]</p>
                <p class="detalles">[CREADOR: <?php echo $username; ?>]</p>
                <p class="detalles">[ORGANIZACIÓN: <?php echo $organizacion; ?>]</p>
                <p class="detalles">[CLASIFICACIÓN: SECRETO ABSOLUTO]</p>
            </div>
        </header>

        <main>
            <div class="texto">
                <h2>Resumen del Caso</h2>
                <p><?php echo $resumen; ?></p>    
            </div>
            <div class="mensaje-extra">
                <h3>Nota de Advertencia</h3>
                <p>
                    Acceder a esta información sin permiso puede resultar en sanciones severas. 
                    Toda actividad está siendo monitoreada.
                </p>
                <button class="boton-volver" onclick="location.href='../paginaPrincipal.php'">Volver al Menú Principal</button>
            </div>
        </main>

        <footer>
            <p>Última revisión: 22/11/2024</p>
        </footer>
    </div>
</body>
</html>