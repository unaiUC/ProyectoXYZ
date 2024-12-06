<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: paginaPrincipal.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="proyectoXYZ.css">
</head>
<body>
    <div class="main-container">
        <div class="logo-container">
            <img src="EquemFoundation2GOLD.png" alt="Logo del Proyecto Arka" class="logo">
        </div>
        <div class="login-container">
            <h2>Registrarse / Iniciar Sesión</h2>
            <form action="sesiones/login.php" method="post">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                
                <button class="login-login" name="login" type="submit">Entrar</button>
                <button class="boton-paginaPrin" formaction="sesiones/register.php" name="register" type="submit">Registrarse</button>
                <button class="atras" onclick="location.href='bienvenida.php'">Atras</button>
            </form>
        </div>
    </div>
</body>
</html>
