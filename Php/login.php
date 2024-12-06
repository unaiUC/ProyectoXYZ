<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT loginpass FROM loginsXYZ WHERE loginname = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($stored_password_hash);
    $stmt->fetch();

    if (password_verify($password, $stored_password_hash)) {
        $_SESSION['username'] = $username;
        header("Location: ../paginaPrincipal.php");
        exit();
    } else {
        header("Location: errorLogin.php");
      exit();
    }

    $stmt->close();
}

$conn->close();
?>
