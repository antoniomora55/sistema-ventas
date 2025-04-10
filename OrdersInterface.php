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
        <a href="addOrder.php">Agregar Producto</a>
        <a href="principalBar.php">Atras</a>
        <table border="1">
            <tr>
                <th>ID Pedido</th>
                <th>ID Cliente</th>
                <th>ID Producto</th>
                <th>Costo del Pedido</th>
                <th>Fecha de Orden</th>
                <th>Estado del Pedido</th>
                <th>Direccion de Envio</th>
                <th>Fecha de Envio</th>
                <th>Acciones</th>

            </tr>
            <?php
            include 'db.php';

            // Definir la consulta SQL
            $sql = "SELECT * FROM pedidos";

            // Ejecutar la consulta
            $result = $connection->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['id_pedido']; ?></td>
                        <td><?php echo $row['id_cliente']; ?></td>
                        <td><?php echo $row['id_producto']; ?></td>
                        <td><?php echo $row['costo_pedido']; ?></td>
                        <td><?php echo $row['fecha_pedido']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['direccion_envio']; ?></td>
                        <td><?php echo $row['fecha_envio']; ?></td>

                        <td>
                            <a href="editOrder.php?id_pedido=<?php echo $row['id_pedido']; ?>">Editar</a> <br>
                            <a href="deleteOrder.php?id_pedido=<?php echo $row['id_pedido']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a><br>
                        </td>
                    </tr>
                <?php
                endwhile;
            } else {
                echo "<tr><td colspan='8'>No hay productos disponibles.</td></tr>";
            }
            ?>
        </table>
<?php $connection->close(); ?>
    </body>
</html>