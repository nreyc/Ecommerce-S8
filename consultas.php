<?php
require 'conexion.php';

echo "<h2>Productos disponibles</h2>";
$sql = "SELECT nombre, stock FROM PRODUCTO WHERE stock > 0";
foreach ($conn->query($sql) as $row) {
    echo "Producto: " . $row['nombre'] . " - Stock: " . $row['stock'] . "<br>";
}

echo "<h2>Clientes con más de dos compras</h2>";
$sql = "SELECT c.nombre, COUNT(co.id_compra) AS total_compras
        FROM CLIENTE c
        JOIN COMPRA co ON c.id_cliente = co.id_cliente
        GROUP BY c.id_cliente
        HAVING total_compras > 2";
foreach ($conn->query($sql) as $row) {
    echo "Cliente: " . $row['nombre'] . " - Compras: " . $row['total_compras'] . "<br>";
}
?>
