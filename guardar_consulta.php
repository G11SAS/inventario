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

// Preparar y ejecutar la consulta
$stmt = $conn->prepare("SELECT saldo, ubicaciones FROM saldo_stock WHERE producto = ?");
$stmt->bind_param("s", $producto);
$stmt->execute();
$stmt->bind_result($saldo, $ubicaciones);
$stmt->fetch();

// Mostrar los resultados
if ($stmt->num_rows > 0) {
    echo "Saldo disponible: " . $saldo . "<br>";
    echo "Ubicaciones: " . $ubicaciones;
} else {
    echo "Producto no encontrado.";
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
