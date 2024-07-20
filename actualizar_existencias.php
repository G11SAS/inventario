<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Reemplaza con tu nombre de usuario de MySQL
$password = ""; // Reemplaza con tu contraseña de MySQL
$database = "sistema_inventarios"; // Nombre de tu base de datos

// Verifica si se enviaron datos mediante el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si los datos requeridos están presentes
    if (isset($_POST["fecha"]) && isset($_POST["producto"]) && isset($_POST["codigo_producto"]) && isset($_POST["cantidad_actual"]) && isset($_POST["nueva_cantidad"]) && isset($_POST["motivo_de_la_actualizacion"]) && isset($_POST["responsable_de_la_actualizacion"])) {
        // Obtén los datos del formulario
        $fecha = $_POST["fecha"];
        $producto = $_POST["producto"];
        $codigo_producto = $_POST["codigo_producto"];
        $cantidad_actual = $_POST["cantidad_actual"];
        $nueva_cantidad = $_POST["nueva_cantidad"];
        $motivo_de_la_actualizacion = $_POST["motivo_de_la_actualizacion"];
        $responsable_de_la_actualizacion = $_POST["responsable_de_la_actualizacion"];

        // Realiza la conexión a la base de datos
        $conexion = new mysqli($servername, $username, $password, $database);

        // Verifica si hay errores de conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Prepara la consulta SQL
        $stmt = $conexion->prepare("INSERT INTO actualizar_existencias (fecha, producto, codigo_producto, cantidad_actual, nueva_cantidad, motivo_de_la_actualizacion, responsable_de_la_actualizacion) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $fecha, $producto, $codigo_producto, $cantidad_actual, $nueva_cantidad, $motivo_de_la_actualizacion, $responsable_de_la_actualizacion);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            echo "Existencia Actualizada correctamente";
        } else {
            echo "Error al Actualizar Existencias: " . $stmt->error;
        }

        // Cierra la conexión
        $stmt->close();
        $conexion->close();
    } else {
        echo "Error: Todos los campos son requeridos";
    }
}
?>
