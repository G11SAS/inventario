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

// Recuperar los productos de la base de datos
$sql = "SELECT * FROM proveedores"; // Asegúrate de que la tabla se llama 'productos'
$result = $conn->query($sql);

echo '<!DOCTYPE html>';
echo '<html lang="es">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<style>';
echo 'body {';
echo '    margin: 0;';
echo '    padding: 0;';
echo '    font-family: Arial, sans-serif;';
echo '}';
echo '.container {';
echo '    display: flex;';
echo '    justify-content: center;';
echo '    align-items: flex-start;';
echo '    height: 1px;';
echo '    padding-top: 20px;';
echo '}';
echo 'table {';
echo '    border-collapse: collapse;';
echo '    width: 40%;';
echo '}';
echo 'th, td {';
echo '    padding: 10px;';
echo '    text-align: left;';
echo '}';
echo 'th {';
echo '    background-color: #f2f2f2;';
echo '}';
echo '</style>';
echo '<title></title>';
echo '</head>';
echo '<body>';
echo '<div class="container">';

if ($result->num_rows > 0) {
    // Generar el HTML para mostrar los productos
    echo '<table border="2">';
    echo "<tr><th>id</th><th>nombre</th><th>direccion</th><th>telefono</th><th>email</th><th>contacto</th><th>notas</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["direccion"] . "</td>";
        echo "<td>" . $row["telefono"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["contacto"] . "</td>";
        echo "<td>" . $row["notas"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay productos registrados.";
}

echo '</div>';
echo '</body>';
echo '</html>';

// Cerrar la conexión
$conn->close();
?>
