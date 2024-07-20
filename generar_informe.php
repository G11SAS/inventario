<?php
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "root"; // Cambia esto por tu nombre de usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$dbname = "sistema_inventarios"; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Verificar si los datos del formulario han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario y validar que no estén vacíos
    $fecha_inicio = isset($_POST['fecha_inicio']) ? $conn->real_escape_string($_POST['fecha_inicio']) : '';
    $fecha_fin = isset($_POST['fecha_fin']) ? $conn->real_escape_string($_POST['fecha_fin']) : '';

    // Insertar los valores en la base de datos
    $sql = "INSERT INTO informes (fecha_inicio, fecha_fin) VALUES ('$fecha_inicio', '$fecha_fin')";

    if ($conn->query($sql) === TRUE) {
        echo "Informe guardado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>