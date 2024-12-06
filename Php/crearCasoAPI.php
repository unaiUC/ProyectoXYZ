<?php
    session_start();
    // Incluir el archivo de conexión a la base de datos
    include 'DBConnectionCaso.php';

    // Verificar si se han enviado los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $title = $_POST['titulo'];
        $text = $_POST['texto'];
        $organization = $_POST['organizacion'];
        $classification = $_POST['clasificacion'];
        $username = $_SESSION['username']; 
        $acutaldate = date("Y-m-d");
        // Preparar y vincular la declaración SQL
        echo $title, $text, $organization, $acutaldate, $username;
        $stmt = $conn->prepare("INSERT INTO proyectoXYZ.historias (titulo, texto, Organizacion, Classification, fecha, usuario) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $title, $text, $organization, $classification, $acutaldate, $username);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            echo "Historia guardada exitosamente";
            header("Location: ../paginaPrincipal.php");
        } else {
            echo "Error al guardar la historia: " . $stmt->error;
        }

        // Cerrar la declaración
            $stmt->close();
        }
        // Cerrar la conexión
        $conn->close();
?>