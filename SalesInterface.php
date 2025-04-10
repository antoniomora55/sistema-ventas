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
        <a href="addUser.php">Agregar Venta</a>
        <a href="principalBar.php">Atras</a>
        <table border="1">
            <tr>
                <th>ID Venta</th>
                <th>ID Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Precio Total</th>
                <th>ID Cliente</th>
                <th>Fecha De Venta</th>
                <th>Acciones</th>

            </tr>
            <?php
            include 'db.php';

            // Definir la consulta SQL
            $sql = "SELECT * FROM ventas";

            // Ejecutar la consulta
            $result = $connection->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['id_venta']; ?></td>
                        <td><?php echo $row['id_producto']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['precio_unitario']; ?></td>
                        <td><?php echo $row['precio_total']; ?></td>
                        <td><?php echo $row['id_cliente']; ?></td>
                        <td><?php echo $row['fecha_venta']; ?></td>

                        <td>
                            <a href="editUser.php?id_venta=<?php echo $row['id_venta']; ?>">Editar</a>
                            <a href="deleteUser.php?id_venta=<?php echo $row['id_venta']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?');">Eliminar</a>
                        </td>
                    </tr>
                <?php
                endwhile;
            } else {
                echo "<tr><td colspan='8'>No hay ventas registradas.</td></tr>";
            }
            ?>
        </table>
<?php $connection->close(); ?>
    </body>
</html>