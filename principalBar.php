<?php
session_start();
$id_nivel = $_SESSION['id_nivel'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
        <link rel="icon" href="images/web-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="cssFiles/principalBarStyle.css">
    <body>
        <?php if (isset($id_nivel)): ?>
            <?php if ($id_nivel === 1): ?>
                <!-- Barra principal si el usuario es administrador -->

                <nav>
                    <ul>
                        <li><a href="ProductsInterface.php">Productos</a></li>
                        <li><a href="UsersInterface.php">Usuarios</a></li>
                        <li><a href="ClientsInterface.php">Clientes</a></li>
                        <li><a href="SalesInterface.php">Ventas</a></li>
                        <li><a href="InventoryInterface.php">Inventario</a></li>
                        <li><a href="OrdersInterface.php">Pedidos</a></li>
                    </ul>
                </nav>
            <?php elseif ($id_nivel === 2): ?>
                <!-- Barra principal si el usuario es Gerente -->
                <nav>
                    <ul>
                        <li><a href="reportes.php">Reportes</a></li>
                        <li><a href="SalesInterface.php">Ventas</a></li>

                    </ul>
                </nav>
            <?php elseif ($id_nivel === 3): ?>
                <!-- Barra principal si el usuario es Vendedor -->
                <nav>
                    <ul>
                         <li><a href="SalesInterface.php">Ventas</a></li>
                        <li><a href="ClientsInterface.php">Clientes</a></li>
                    </ul>
                </nav>
            <?php elseif ($id_nivel === 4): ?>
                <!-- Barra principal si el usuario es Administrador de inventario -->
                <nav>
                    <ul>
                         <li><a href="InventoryInterface.php">Inventario</a></li>
                        <li><a href="ProductsInterface.php">Productos</a></li>
                    </ul>
                </nav>
            <?php else: ?>
                <p>No tienes acceso a esta sección.</p>
            <?php endif; ?>
        <?php else: ?>
            <p>No se ha definido el nivel de usuario.</p>
        <?php endif; ?>
    </body>
</html>