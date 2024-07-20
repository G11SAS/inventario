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
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $producto_nombre = $_POST['producto_nombre'];
    $producto_cantidad = $_POST['producto_cantidad'];
    $origen_nombre = $_POST['origen_nombre'];
    $destino_nombre = $_POST['destino_nombre'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO traslados (producto_nombre, producto_cantidad, origen_nombre, destino_nombre) 
            VALUES (?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siss", $producto_nombre, $producto_cantidad, $origen_nombre, $destino_nombre);

    // Ejecutar la declaración
    if ($stmt->execute()) {
        echo "Traslado registrado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
