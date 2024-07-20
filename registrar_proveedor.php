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
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : '';
    $notas = isset($_POST['notas']) ? $_POST['notas'] : '';

    // Insertar los valores en la base de datos
    $sql = "INSERT INTO proveedores (nombre, direccion, telefono, email, contacto, notas) 
            VALUES ('$nombre', '$direccion', '$telefono', '$email', '$contacto', '$notas')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo proveedor registrado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>