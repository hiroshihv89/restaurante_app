<?php
// Incluir el archivo de configuración y el archivo de base de datos
require_once __DIR__ . '/../config/database.php';

// Crear la clase para interactuar con la base de datos
class AuthController {

    public function createAdmin() {
        // Datos del administrador
        $nombre = 'Administrador';
        $correo = 'admin@restaurante.com';
        $password = 'L1m0k6ikk9$';  // Contraseña sin encriptar

        // Encriptar la contraseña antes de insertarla
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Conexión a la base de datos y preparación de la consulta
        $database = new Database();
        $conn = $database->connect();
        $query = "INSERT INTO usuarios (nombre, correo, password, rol) VALUES (:nombre, :correo, :password, :rol)";
        $stmt = $conn->prepare($query);
        $rol = 'admin'; // Rol de administrador
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':rol', $rol);

        // Ejecutar la consulta para insertar el administrador
        if ($stmt->execute()) {
            echo "Usuario administrador creado correctamente.";
        } else {
            echo "Error al crear el usuario administrador.";
        }
    }
}

// Crear una instancia del controlador
$authController = new AuthController();

// Llamar al método para crear el administrador
$authController->createAdmin();
?>
