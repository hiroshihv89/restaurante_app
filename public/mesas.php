<?php
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    header('Location: /restaurante_app/public/index.php?action=login');
    exit;
}

require_once __DIR__ . '/../app/models/Mesa.php';

$mesaModel = new Mesa();

// Manejar el formulario para agregar una nueva mesa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $capacidad = $_POST['capacidad'];

    // Validar los datos antes de insertarlos
    if (!empty($numero) && !empty($capacidad) && is_numeric($capacidad)) {
        $mesaModel->crear($numero, $capacidad);
    } else {
        echo "<p>Por favor, ingresa datos válidos para la mesa.</p>";
    }
}

// Obtener todas las mesas para listar
$mesas = $mesaModel->listar();
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
    <h1>Gestionar Mesas</h1>
    <form method="POST">
        <input type="text" name="numero" placeholder="Número de Mesa" required>
        <input type="number" name="capacidad" placeholder="Capacidad" required>
        <button type="submit">Agregar Mesa</button>
    </form>
    <h2>Mesas Existentes</h2>
    <ul>
        <?php if (!empty($mesas)): ?>
            <?php foreach ($mesas as $mesa): ?>
                <li>Mesa <?= htmlspecialchars($mesa['numero']) ?> - Capacidad: <?= htmlspecialchars($mesa['capacidad']) ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No hay mesas registradas.</li>
        <?php endif; ?>
    </ul>
    <a href="/restaurante_app/public/admin.php">Volver al Panel</a>
</body>
</html>
