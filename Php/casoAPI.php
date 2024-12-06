<?php
$idcaso = $_GET['id'];
include 'DBConnectionCaso.php';
// Consulta SQL para obtener los datos
$sql = "SELECT titulo, texto, Organizacion, Classification, fecha, usuario FROM proyectoXYZ.historias WHERE idhistoria = $idcaso;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $organizacion = $row["Organizacion"];
        $clasificacion = $row["Classification"];
        $resumen = $row["texto"];
        $titulo = $row["titulo"];
        $fecha = $row["fecha"];
        $username = $row["usuario"];
    }
} else {
    echo "0 results";
}

$conn->close();
?>