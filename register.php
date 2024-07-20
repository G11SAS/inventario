<?php
// Conexión a la base de datos
$servername = "localhost"; // El servidor de la base de datos (generalmente localhost)
$username = "root"; // Nombre de usuario de la base de datos (generalmente root)
$password = ""; // Contraseña de la base de datos (generalmente vacía)
$dbname = "usuarios_db"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Verificar si las contraseñas coinciden
    if ($password != $confirm_password) {
        echo "Las contraseñas no coinciden.";
    } else {
        // Hashear la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Preparar la consulta SQL para insertar el usuario
        $sql = "INSERT INTO usuarios (nombre, password) VALUES ('$nombre', '$hashed_password')";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error al registrar el usuario: " . $conn->error;
        }
    }
}

// Cerrar conexión
$conn->close();
?>
