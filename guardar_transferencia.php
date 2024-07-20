<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventarios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$producto = $_POST['producto'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$cantidad = $_POST['cantidad'];

// Preparar y bind
$stmt = $conn->prepare("INSERT INTO transferencias_productos (producto, origen, destino, cantidad) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $producto, $origen, $destino, $cantidad);

// Ejecutar la declaración
if ($stmt->execute()) {
    echo "Transferencia registrada exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
