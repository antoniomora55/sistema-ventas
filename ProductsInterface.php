<?php
session_start();
$id_nivel = $_SESSION['id_nivel'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
        <link rel="stylesheet" href="cssFiles/TablesStyles.css">
    <link rel="icon" href="images/web-logo.png" type="image/x-icon">

</head>
<body>
    <h1>Sistema Operativo De Ventas</h1>
    <a href="addProduct.php">Agregar Producto</a>
    <a href="principalBar.php">Atras</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>ID proveedor</th>
            <th>stock</th>
            <th>Fecha de alta</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'db.php'; 

        // Definir la consulta SQL
        $sql = "SELECT * FROM productos";

        // Ejecutar la consulta
        $result = $connection->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_producto']; ?></td>
                <td><?php echo $row['nombre_p']; ?></td>
                <td><?php echo $row['descripcion_p']; ?></td>
                <td><?php echo $row['precio_p']; ?></td>
                <td><?php echo $row['id_proveedor_p']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['fecha_alta']; ?></td>
                <td>
                  <a href="editProduct.php?id_producto=<?php echo $row['id_producto']; ?>">Editar</a>
                  <a href="deleteProduct.php?id_producto=<?php echo $row['id_producto']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
                </td>
            </tr>
            <?php endwhile;
        } else {
            echo "<tr><td colspan='8'>No hay productos disponibles.</td></tr>";
        }
        ?>
    </table>
    <?php $connection->close(); ?>
</body>
</html>