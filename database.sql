-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS restaurante_app;

-- Usar la base de datos creada
USE restaurante_app;

-- Crear tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol ENUM('admin', 'cliente') NOT NULL
);

-- Crear tabla de mesas
CREATE TABLE IF NOT EXISTS mesas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    capacidad INT NOT NULL
);

-- Crear tabla de reservas
CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    mesa_id INT NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (mesa_id) REFERENCES mesas(id)
);
