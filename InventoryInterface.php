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
        <a href="addProduct.php">Agregar Registro</a>
        <a href="principalBar.php">Atras</a>
        <table border="1">
            <tr>
                <th>ID Inventario</th>
                <th>ID Producto</th>
                <th>Cantidad</th>
                <th>Ultima Actualizacion</th>
                <th>Acciones</th>
            </tr>
            <?php
            include 'db.php';

            // Definir la consulta SQL
            $sql = "SELECT * FROM inventario";

            // Ejecutar la consulta
            $result = $connection->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['id_inventario']; ?></td>
                        <td><?php echo $row['id_producto']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['fecha_ultima_actualizacion']; ?></td>

                        <td>
                            <a href="editProduct.php?id_inventario=<?php echo $row['id_inventario']; ?>">Editar</a>
                            <a href="deleteProduct.php?id_inventario=<?php echo $row['id_inventario']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
                        </td>
                    </tr>
                <?php
                endwhile;
            } else {
                echo "<tr><td colspan='8'>No hay detalles disponibles.</td></tr>";
            }
            ?>
        </table>
<?php $connection->close(); ?>
    </body>
</html>