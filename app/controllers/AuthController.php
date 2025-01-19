<?php
require_once __DIR__ . '/../models/Usuario.php';

class AuthController {

    // Función para el login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario();
            $auth = $usuario->autenticar($_POST['correo'], $_POST['password']);
            if ($auth) {
                session_start();
                $_SESSION['usuario'] = $auth;
                if ($auth['rol'] == 'admin') {
                    header('Location: /restaurante_app/public/admin.php');
                } else {
                    header('Location: /restaurante_app/public/cliente.php');
                }
                exit; // Asegúrate de detener el script
            } else {
                echo "Credenciales inválidas.";
            }
        } else {
            require __DIR__ . '/../views/auth/login.php';
        }
    }
    
    
    

    // Función para el registro de nuevos usuarios
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['password'])) {
                $usuario = new Usuario();
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $password = $_POST['password'];

                // Llamamos al método registrar de la clase Usuario para registrar al nuevo usuario
                $usuario->registrar($nombre, $correo, $password);
                header('Location: /restaurante_app/public/index.php?action=login');
            } else {
                echo "Todos los campos son obligatorios.";
            }
        } else {
            require __DIR__ . '/../views/auth/register.php';  // Mostrar el formulario de registro
        }
    }

    // Función para logout
    public function logout() {
        session_start();
        session_unset();  // Destruir las variables de sesión
        session_destroy(); // Destruir la sesión
        header('Location: /restaurante_app/public/index.php?action=login');  // Redirige al login
    }

    // Función para crear un usuario administrador manualmente
    public function createAdmin() {
        // Credenciales del administrador por defecto
        $nombre = 'Administrador';
        $correo = 'admin@restaurante.com';
        $password = 'L1m0k6ikk9$';  // Contraseña sin encriptar

        // Encriptar la contraseña antes de insertarla
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Crear el usuario administrador en la base de datos
        $usuario = new Usuario();
        $usuario->registrar($nombre, $correo, $passwordHash, 'admin');  // Asignamos el rol 'admin'
        echo "Administrador creado correctamente.";
    }
}
?>
