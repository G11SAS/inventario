<?php

// Iniciar sesión
session_start();

// Verificar inicio de sesión y credenciales
if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Conectarse a la base de datos
    $db = new mysqli('localhost', 'usuario_db', 'contrasena_db', 'nombre_db');

    // Consultar usuario en la base de datos
    $sql = "SELECT id_usuario, foto_perfil FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $resultado = $db->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $idUsuario = $fila['id_usuario'];
        $fotoPerfil = $fila['foto_perfil'];

        // Iniciar sesión con ID de usuario
        $_SESSION['usuario_id'] = $idUsuario;

        // Redireccionar a página principal
        header('Location: pagina_principal.php');
        exit;
    } else {
        echo '<p>Usuario o contraseña incorrectos.</p>';
    }

    $db->close();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
</head>
<body>
    <h1>Inicio de sesión</h1>
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
