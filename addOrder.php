<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_producto = $_POST['id_producto'];
    $costo_pedido = $_POST['costo_pedido'];
     $fecha_pedido = $_POST['fecha_pedido'];
    $estado = $_POST['estado'];
  $direccion_envio= $_POST['direccion_envio'];
  $fecha_envio = $_POST['fecha_envio'];
  
    $sql = "INSERT INTO pedidos (id_cliente, id_producto, costo_pedido,fecha_pedido"
            . ",estado, direccion_envio,fecha_envio) "
            . "VALUES ('$id_cliente', '$id_producto', '$costo_pedido', '$fecha_pedido', '$estado','$direccion_envio','$fecha_envio')";

    if ($connection->query($sql) === TRUE) {
        echo "Producto agregado exitosamente";
         header('Location: OrdersInterface.php');
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cssFiles/ActionsStyles.css">
    <link rel="icon" href="images/web-logo.png" type="image/x-icon">

</head>
<body>
    <h1>Agregar Pedido</h1>
    <form method="post" action="">
        <label for="id_cliente">ID Cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" required><br>
        <label for="id_producto">ID Producto:</label>
        <input type="number" id="id_producto" name="id_producto" required><br>
        <label for="costo_pedido">Costo pedido:</label>
        <input type="number" id="costo_pedido" name="costo_pedido" step="0.01" required><br>
         <label for="fecha_pedido">Fecha Orden:</label>
        <input type="datetime-local" id="fecha_pedido" name="fecha_pedido" required><br>
           <label for="estado">Estado del Pedido:</label>
        <input type="text" id="estado" name="estado" required><br>
        <label for="direccion_envio">Direccion de Envio:</label>
        <input type="text" id="direccion_envio" name="direccion_envio" required><br>
          <label for="fecha_envio">Fecha de Envio:</label>
        <input type="datetime-local" id="fecha_envio" name="fecha_envio" required><br>
        <input type="submit" value="Agregar Pedido">
    </form>
</body>
</html>