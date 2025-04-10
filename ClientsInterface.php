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
        <a href="addClient.php">Agregar Cliente</a>
        <a href="principalBar.php">Atras</a>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Registro</th>
                <th>Acciones</th>
            </tr>
            <?php
            include 'db.php';

            // Definir la consulta SQL
            $sql = "SELECT * FROM clientes";

            // Ejecutar la consulta
            $result = $connection->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['id_cliente']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['fecha_registro']; ?></td>
                        <td>
                            <a href="editClient.php?id_cliente=<?php echo $row['id_cliente']; ?>">Editar</a>
                            <a href="deleteClient.php?id_cliente=<?php echo $row['id_cliente']; ?>" onclick="return confirm('¿Estás seguro de eliminar a este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php
                endwhile;
            } else {
                echo "<tr><td colspan='8'>No hay Clientes registrados.</td></tr>";
            }
            ?>
        </table>
<?php $connection->close(); ?>
    </body>
</html>