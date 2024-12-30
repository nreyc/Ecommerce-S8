<?php
require 'conexion.php';

try {
    $conn->exec("CREATE DATABASE IF NOT EXISTS TIENDA;
    USE TIENDA;
    CREATE TABLE IF NOT EXISTS PRODUCTO (
        id_producto INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100),
        descripcion TEXT,
        precio DECIMAL(10, 2),
        stock INT
    );
    CREATE TABLE IF NOT EXISTS CLIENTE (
        id_cliente INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100),
        email VARCHAR(100),
        direccion VARCHAR(255)
    );
    CREATE TABLE IF NOT EXISTS COMPRA (
        id_compra INT AUTO_INCREMENT PRIMARY KEY,
        cantidad INT,
        total DECIMAL(10, 2),
        fecha DATE,
        id_producto INT,
        id_cliente INT,
        FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto),
        FOREIGN KEY (id_cliente) REFERENCES CLIENTE(id_cliente)
    );");
    echo "Base de datos y tablas creadas exitosamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
