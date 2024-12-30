<?php
require 'conexion.php';

try {
    $sql = "
        SELECT 
            c.id_cliente,
            c.nombre AS cliente_nombre,
            COUNT(co.id_compra) AS total_compras,
            GROUP_CONCAT(
                CONCAT('Compra ID: ', co.id_compra, ', Producto ID: ', co.id_producto, 
                ', Cantidad: ', co.cantidad, ', Total: ', co.total, ', Fecha: ', co.fecha)
                SEPARATOR ' | '
            ) AS detalle_compras
        FROM CLIENTE c
        JOIN COMPRA co ON c.id_cliente = co.id_cliente
        GROUP BY c.id_cliente
        HAVING total_compras > 2
    ";

    $stmt = $conn->query($sql);

    echo "<h1>Resultados de la Consulta Avanzada</h1>";
    if ($stmt->rowCount() > 0) {
        foreach ($stmt as $row) {
            echo "<h2>Cliente: " . $row['cliente_nombre'] . " (ID: " . $row['id_cliente'] . ")</h2>";
            echo "<p>Total de Compras: " . $row['total_compras'] . "</p>";
            echo "<p>Detalle de Compras: " . $row['detalle_compras'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>No hay clientes con más de dos compras registradas.</p>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
