<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "Las contraseñas no coinciden.";
    } else {
        // Hashear la nueva contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Actualizar la contraseña del usuario
        $stmt = $conn->prepare("UPDATE usuarios SET password = ? WHERE nombre = ?");
        $stmt->bind_param("ss", $hashed_password, $nombre);
        if ($stmt->execute()) {
            echo "Contraseña actualizada correctamente.";
        } else {
            echo "Error al actualizar la contraseña: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
