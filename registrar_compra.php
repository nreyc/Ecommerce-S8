<?php
require 'conexion.php';

try {
    for ($i = 1; $i <= 10; $i++) {
        $id_producto = rand(1, 3);
        $id_cliente = rand(1, 3);
        $cantidad = rand(1, 5);
        $fecha = date('Y-m-d');

        $stmt = $conn->prepare("SELECT precio FROM PRODUCTO WHERE id_producto = :id_producto");
        $stmt->execute(['id_producto' => $id_producto]);
        $precio = $stmt->fetchColumn();
        $total = $cantidad * $precio;

        $sql = "INSERT INTO COMPRA (cantidad, total, fecha, id_producto, id_cliente) 
                VALUES (:cantidad, :total, :fecha, :id_producto, :id_cliente)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'cantidad' => $cantidad,
            'total' => $total,
            'fecha' => $fecha,
            'id_producto' => $id_producto,
            'id_cliente' => $id_cliente
        ]);
    }
    echo "10 registros de compra insertados correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
