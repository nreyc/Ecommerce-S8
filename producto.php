<?php
require 'conexion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

try {
    $sql = "INSERT INTO PRODUCTO (nombre, descripcion, precio, stock) VALUES ('$nombre', '$descripcion', $precio, $stock)";
    $conn->exec($sql);
    echo "Producto agregado correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
