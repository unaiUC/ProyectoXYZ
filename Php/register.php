<?php
session_start();

// Aqui nos conectaremos a la base de datos
include 'databaseRegister.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Esto nos ayudara a evitar conflictos de nombre de usuario, contara si nuestro usuario ya existe en la 
    // base de datos utilizando un count si da 0 es que no hay ninguno, si da 1 es que ya existe, tambien podriamos 
    // comparar nombres pero es mas "complejo" y "pesado" 
    $stmt = $conn->prepare("SELECT COUNT(*) FROM proyectoXYZ.loginsXYZ WHERE loginname = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 0) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        echo $hashed_password;
        $stmt = $conn->prepare("INSERT INTO proyectoXYZ.loginsXYZ (loginname, loginpass) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            header("Location: ../paginaPrincipal.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Username already exists.";
    }

    $stmt->close();
}

$conn->close();
?>