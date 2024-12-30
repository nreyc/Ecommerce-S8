<?php
require 'conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];

try {
    $sql = "INSERT INTO CLIENTE (nombre, email, direccion) VALUES ('$nombre', '$email', '$direccion')";
    $conn->exec($sql);
    echo "Cliente agregado correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
