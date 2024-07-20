<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventarios";
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$stock = $_POST['stock'];
$ubicacion = $_POST['location'];
$cantidad_preparar = $_POST['cantidadPreparar'];

// Preparar y enlazar
$stmt = $conn->prepare("INSERT INTO preparacion (nombre, stock, ubicacion, cantidad_preparar) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sisi", $nombre, $stock, $ubicacion, $cantidad_preparar);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>