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
    <a href="addUser.php">Agregar Usuario</a>
    <a href="principalBar.php">Atras</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>id_nivel_acceso</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'db.php'; 

        // Definir la consulta SQL
        $sql = "SELECT * FROM usuarios";

        // Ejecutar la consulta
        $result = $connection->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_usuario']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['contrasena']; ?></td>
                <td><?php echo $row['id_nivel']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                  <a href="editUser.php?id_usuario=<?php echo $row['id_usuario']; ?>">Editar</a>
                  <a href="deleteUser.php?id_usuario=<?php echo $row['id_usuario']; ?>" onclick="return confirm('¿Estás seguro de eliminar a este usuario?');">Eliminar</a>
                </td>
            </tr>
            <?php endwhile;
        } else {
            echo "<tr><td colspan='8'>No hay usuarios registrados.</td></tr>";
        }
        ?>
    </table>
    <?php $connection->close(); ?>
</body>
</html>