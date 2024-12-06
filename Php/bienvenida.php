<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Proyecto XYZ</title>
    <link rel="stylesheet" href="bienvenida.css">
</head>
<body>
    <div class="main-container">
        <!-- Encabezado -->
        <header class="header">
            <h1>Bienvenido al Proyecto XYZ</h1>
            <p>Explora las historias únicas del grupo "Equemm" y comparte tus propias aventuras.</p>
        </header>

        <!-- Menú de navegación -->
        <nav class="menu">
            <button onclick="location.href='proyectoXYZ.php'">Iniciar Sesión</button>
            <?php
            session_start(); // Inicia o retoma la sesión

                // Comprueba si hay una acción definida en la URL
                if (isset($_GET['accion']) && $_GET['accion'] === 'explorar') {
                    // Verifica si el usuario tiene sesión activa
                     if (isset($_SESSION['usuario'])) {
                        // Redirige a la página principal
                        header("Location: paginaPrincipal.php");
                        exit();
                    } else {
                        // Redirige a acceso denegado si no hay sesión activa
                        header("Location: sesiones/accesoDenegado.php");
                        exit();
                    }
                }
            ?>
                          
            <button onclick="location.href='paginaPrincipal.php?accion=explorar'">Explorar Historias</button>


            <button onclick="location.href='miembros.php'">Miembros</button>
        </nav>

        <!-- Sección de noticias y contenido destacado -->
        <section class="content">
            <!-- Panel de información -->
            <div class="info-panel">
                <h2>¿Qué es el Proyecto XYZ?</h2>
                <p>El Proyecto XYZ es un espacio interactivo para compartir historias únicas, ya sean vivencias del grupo "Equemm" o narrativas paranormales, siempre con un estilo inmersivo en primera persona.</p>
                <button onclick="location.href='lore/organizaciones.php'">Lore Proyecto XYZ</button>
            </div>

            <!-- Contenido destacado -->
            <div class="highlighted-content">
                <h2>Historia Destacada</h2>
                <div class="highlight-box">
                    <h3>*El Misterio del Objeto Alfa CV-04*</h3>
                    <p><strong>Autor:</strong> Operador_A</p>
                    <p>En un día como ningún otro, el equipo Equemm se enfrentó a un fenómeno inexplicable. ¿Qué secretos oculta este objeto clasificado?</p>
                    <button onclick="location.href='paginaPrincipal.php'">CENSURADO VER MAS</button>
                </div>
            </div>
        </section>

        <!-- Sección de noticias o actualizaciones -->
        <section class="site-news">
            <h2>Novedades</h2>
            <div class="news-box">
                <h3>Última actualización: Noviembre 2024</h3>
                <p>¡Nueva historia destacada disponible! Además, mejoras en la interfaz y nuevas funciones para administrar tus historias.</p>
                <button onclick="location.href='novedades.php'">Ver Más</button>
            </div>
        </section>

        <!-- Pie de página -->
        <footer class="footer">
            <p>© 2024 Proyecto XYZ. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>
