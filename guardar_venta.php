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
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$producto = $_POST['producto'];

// Preparar y bind
$stmt = $conn->prepare("INSERT INTO ventas_productos (origen, destino, producto) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $origen, $destino, $producto);

// Ejecutar la declaración
if ($stmt->execute()) {
    echo "Venta guardada exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
