-- Crear base de datos
CREATE DATABASE IF NOT EXISTS biblioteca_digital;
USE biblioteca_digital;

-- Tabla de archivos
CREATE TABLE archivos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    nombre_original VARCHAR(255) NOT NULL,
    nombre_guardado VARCHAR(255) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    tamano BIGINT NOT NULL,
    fecha_subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Usuario de prueba
INSERT INTO usuarios (usuario, password)
VALUES ('Gabriela', 'GabrielaUTPL');
