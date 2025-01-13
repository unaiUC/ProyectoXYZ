<?php
// Incluimos el archivo de conexión a la base de datos
require_once 'DBConnectionCaso.php';

// Obtenemos el id del caso desde la URL
$idcaso = $_GET['id'];

// Preparamos la consulta SQL
$sql = "SELECT idhistoria, titulo, texto, Organizacion, Classification, fecha, usuario FROM proyectoXYZ.historias WHERE idhistoria = ?";

// Creamos una conexión a la base de datos (suponiendo que DBConnectionCaso.php establece la conexión)
$conn = new mysqli($servername, $username, $password, $dbname);

// Preparamos la sentencia para evitar inyecciones SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idcaso); // "i" indica que el parámetro es un entero

// Ejecutamos la consulta
$stmt->execute();

// Obtenemos los resultados
$result = $stmt->get_result();

// Creamos un array para almacenar los datos
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Cerramos la conexión y la sentencia
$stmt->close();
$conn->close();



// Convertimos los datos a formato JSON y forzamos la descarga
header('Content-Type: application/json; charset=utf-8');
header('Content-Disposition: attachment; filename=data.json'); // Nombre del archivo a descargar

echo json_encode($data, JSON_PRETTY_PRINT); // Formateamos el JSON para mejor legibilidad

// Redirigimos al usuario después de 5 segundos
header("refresh:5;url=../paginaPrincipal.php");
exit();