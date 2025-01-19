<?php
require_once __DIR__ . '/../app/controllers/AuthController.php';

// Manejar la acción desde la URL
$action = $_GET['action'] ?? 'login';

$authController = new AuthController();

if ($action === 'login') {
    $authController->login();
} elseif ($action === 'logout') {
    $authController->logout();
} elseif ($action === 'register') {
    $authController->register();
} else {
    echo "Acción no válida.";
}
?>

