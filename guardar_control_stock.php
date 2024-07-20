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
$cantidad = (int)$_POST['cantidad'];
$tipo = $_POST['tipo'];

// Preparar y ejecutar la consulta para actualizar el stock
if ($tipo === 'entrada') {
    $stmt = $conn->prepare("UPDATE saldo_stock SET saldo = saldo + ? WHERE producto = ?");
    $stmt->bind_param("is", $cantidad, $producto);
} elseif ($tipo === 'salida') {
    $stmt = $conn->prepare("UPDATE saldo_stock SET saldo = saldo - ? WHERE producto = ?");
    $stmt->bind_param("is", $cantidad, $producto);
} elseif ($tipo === 'ajuste') {
    $stmt = $conn->prepare("UPDATE saldo_stock SET saldo = ? WHERE producto = ?");
    $stmt->bind_param("is", $cantidad, $producto);
} else {
    echo "Tipo de operación no válido.";
    exit();
}

if ($stmt->execute()) {
    // Registrar en la tabla de control_stock
    $stmt = $conn->prepare("INSERT INTO control_stock (producto, cantidad, tipo) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $producto, $cantidad, $tipo);
    $stmt->execute();
    echo "Operación registrada exitosamente.";
} else {
    echo "Error al registrar la operación: " . $conn->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
