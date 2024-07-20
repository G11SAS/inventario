<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Reemplaza con tu nombre de usuario de MySQL
$password = ""; // Reemplaza con tu contraseña de MySQL
$database = "sistema_inventarios"; // Nombre de tu base de datos

// Verifica si se enviaron datos mediante el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si los datos requeridos están presentes
    if (isset($_POST["nombre"]) && isset($_POST["cantidad"])) {
        // Obtén los datos del formulario y sanitízalos
        $nombre = $_POST["nombre"];
        $cantidad = $_POST["cantidad"];

        // Realiza la conexión a la base de datos
        $conexion = new mysqli($servername, $username, $password, $database);

        // Verifica si hay errores de conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Sanitiza los datos para evitar inyecciones SQL
        $nombre = $conexion->real_escape_string($nombre);
        $cantidad = (int)$cantidad; // Asegura que la cantidad sea un entero

        // Prepara la consulta SQL
        $sql = "INSERT INTO productos (Nombre, Cantidad) VALUES ('$nombre', $cantidad)";

        // Ejecuta la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Producto agregado correctamente";
        } else {
            echo "Error al agregar el producto: " . $conexion->error;
        }

        // Cierra la conexión
        $conexion->close();
    } else {
        echo "Error: Todos los campos son requeridos";
    }
}
?>
