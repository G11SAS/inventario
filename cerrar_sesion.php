<?php
session_start();

// Eliminar las variables de sesión
unset($_SESSION['usuario']);
unset($_SESSION['id_usuario']);

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión
header("Location: login.html");
?>
