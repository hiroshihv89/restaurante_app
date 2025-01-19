<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] != 'admin') {
    header('Location: /public/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Mesas</title>
    <link rel="stylesheet" href="/restaurante_app/public/styles.css">
</head>

<body>
    <h1>Bienvenido al Panel de Administrador</h1>
    <ul>
        <li><a href="/restaurante_app/public/mesas.php">Gestionar Mesas</a></li>
        <li><a href="/restaurante_app/public/index.php?action=logout">Cerrar Sesión</a></li>
    </ul>
</body>
</html>
