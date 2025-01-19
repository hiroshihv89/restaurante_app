<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] != 'cliente') {
    header('Location: /restaurante_app/public/index.php');
    exit();
}

require_once __DIR__ . '/../app/models/Reserva.php';
require_once __DIR__ . '/../app/models/Mesa.php';

$reservaModel = new Reserva();
$mesaModel = new Mesa();

// Obtener mesas disponibles
$mesas = $mesaModel->listar();

// Verificar si hay mesas disponibles
if (empty($mesas)) {
    $noMesas = true;
} else {
    $noMesas = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$noMesas) {
    $id_usuario = $_SESSION['usuario']['id_usuario'];
    $id_mesa = $_POST['id_mesa'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $reservaModel->crear($id_usuario, $id_mesa, $fecha, $hora);
}

$reservas = $reservaModel->listar($_SESSION['usuario']['id_usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Mesas</title>
    <link rel="stylesheet" href="/restaurante_app/public/styles.css">
</head>


<body>
    <h1>Bienvenido, Cliente</h1>

    <?php if ($noMesas): ?>
        <p>No hay mesas disponibles en este momento. Por favor, intente más tarde.</p>
    <?php else: ?>
        <!-- Formulario de reserva -->
        <h2>Realiza tu reserva</h2>
        <form method="POST">
            <label for="id_mesa">Selecciona una Mesa:</label>
            <select name="id_mesa" id="id_mesa" required>
                <option value="">Selecciona una Mesa</option>
                <?php foreach ($mesas as $mesa): ?>
                    <option value="<?= $mesa['id_mesa'] ?>">Mesa <?= $mesa['numero'] ?> (Capacidad: <?= $mesa['capacidad'] ?>)</option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" required>
            <br>
            <label for="hora">Hora:</label>
            <input type="time" name="hora" required>
            <br>
            <button type="submit">Reservar</button>
        </form>
    <?php endif; ?>

    <!-- Mis reservas -->
    <h2>Mis Reservas</h2>
    <?php if (!empty($reservas)): ?>
        <table>
            <tr>
                <th>Mesa</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
            <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td>Mesa <?= $reserva['numero'] ?></td>
                    <td><?= $reserva['fecha'] ?></td>
                    <td><?= $reserva['hora'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No tienes reservas actuales.</p>
    <?php endif; ?>

    <a href="/restaurante_app/public/index.php?action=login">Cerrar Sesión</a>
</body>
</html>
