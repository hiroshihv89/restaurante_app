# GESTIÓN DE RESERVAS PARA UN RESTAURANTE VIRTUAL

Este proyecto es una aplicación de gestión de reservas para un restaurante. Permite a los administradores gestionar mesas y a los clientes hacer reservas.

## REQUISITOS:

Antes de comenzar, asegúrate de tener lo siguiente:

- PHP 7.4 o superior
- MySQL o MariaDB
- Un servidor web como Apache (XAMPP, WAMP, etc.)

## INSTALACIÓN:

### 1. CLONAR REPOSITORIO

Para clonar este repositorio, ejecuta el siguiente comando en tu terminal:

```bash
git clone https://github.com/hiroshihv89/restaurante_app.git
```
Esto descargará el proyecto en tu máquina local.


## 2. ESTRUCTURA DEL PROYECTO(RUTAS)

```bash
restaurante_app/
├── app/
│   ├── controllers/
│   │   └── AuthController.php
│   ├── models/
│   │   ├── Mesa.php
│   │   ├── Reserva.php
│   │   └── Usuario.php
│   └── views/
│       └── auth/
│           ├── login.php
│           └── register.php
├── config/
│   └── database.php
├── public/
│   ├── admin.php
│   ├── cliente.php
│   ├── create_admin.php
│   ├── index.php
│   ├── mesas.php
│   └── styles.css
└── database.sql
```


## 3. CREAR LA BASE DE DATOS:

El proyecto requiere una base de datos MySQL para funcionar correctamente. 
Puedes crear la base de datos utilizando el archivo SQL proporcionado en el repositorio.

Usando phpMyAdmin (recomendado para usuarios de GUI):

Accede a phpMyAdmin a través de tu navegador (generalmente http://localhost/phpmyadmin).
Crea una nueva base de datos llamada restaurante_app.
Selecciona la base de datos restaurante_app y haz clic en la pestaña Importar.
En el formulario de importación, selecciona el archivo database.sql ubicado en el directorio raíz del proyecto.
Haz clic en Continuar para importar la estructura de la base de datos.

Usando la consola de MySQL (para usuarios avanzados):
Si prefieres usar la consola de MySQL, sigue estos pasos:

Accede a la consola de MySQL. Si usas XAMPP, abre la terminal y escribe mysql -u root -p para conectarte.

Crea la base de datos ejecutando:

CREATE DATABASE restaurante_app;
Importa el archivo SQL para crear las tablas: mysql -u root -p restaurante_app < path/to/database.sql

Asegúrate de reemplazar path/to/database.sql con la ruta completa del archivo database.sql en tu máquina.



## 4. CONFIGURAR LA CONEXION A LA BASE DE DATOS:

El archivo config/database.php contiene la configuración de la conexión a la base de datos. 
Verifica que los detalles de la conexión sean correctos para tu entorno.

Edita el archivo config/database.php y asegúrate de que las credenciales de la base de datos sean correctas:

```bash
php
Copiar
Editar
<?php

class Database {
    private $host = 'localhost'; // Cambia esto si tu base de datos está en otro servidor
    private $db_name = 'restaurante_app'; // Nombre de la base de datos
    private $username = 'root'; // Usuario de la base de datos
    private $password = ''; // Contraseña del usuario de la base de datos
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
```
Si tu base de datos no está en localhost, cambia el valor de $host.
Si usas un nombre de usuario y una contraseña diferentes para MySQL, actualiza $username y $password.



## 5. EJECUTAR EL PROYECTO:

Una vez que hayas configurado la base de datos y la conexión, puedes iniciar tu servidor local de PHP para probar la aplicación.

Si usas XAMPP o WAMP:

Inicia el servidor Apache y MySQL desde el panel de control de XAMPP/WAMP.

Coloca el proyecto en la carpeta htdocs de XAMPP o en la carpeta raíz de tu servidor web en WAMP.

Accede al proyecto en tu navegador: http://localhost/restaurante_app/public/index.php



## 6. CREAR EL USUARIO ADMINISTRADOR:

Para facilitar las pruebas, puedes crear un usuario administrador en la base de datos utilizando el archivo create_admin.php. 
Esto agregará un usuario con credenciales predefinidas para que puedas iniciar sesión rápidamente.

Abre el archivo create_admin.php en tu navegador: http://localhost/restaurante_app/public/create_admin.php

Esto ejecutará el script para crear el usuario administrador con las siguientes credenciales:

Correo: admin@restaurante.com
Contraseña: L1m0k6ikk9$

Si la creación fue exitosa, podrás iniciar sesión con estas credenciales.


## 7. INICIAR SESION Y USAR LA APLICACIÓN:

Para acceder al sistema:

Ve a la página de login en: http://localhost/restaurante_app/public/index.php?action=login

Ingresa con las credenciales de admin para acceder al panel de administración:

Correo: admin@restaurante.com
Contraseña: L1m0k6ikk9$

Los administradores pueden gestionar las mesas, ver las reservas y crear nuevas.


## 8. CONTRIBUCIONES:

Si deseas contribuir al proyecto, puedes hacerlo a través de pull requests. 
Si encuentras algún error o tienes sugerencias para mejorar la aplicación, no dudes en abrir un issue.

MUCHAS GRACIAS :)


