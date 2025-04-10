<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php';
$id_cliente = '';
$id_producto = '';
$costo_pedido = '';
$fecha_pedido = '';
$estado = '';
$direccion_envio = '';
$fecha_envio = '';

if (isset($_GET['id_pedido'])) {
    $idpedido = intval($_GET['id_pedido']);
    $result = mysqli_query($connection, "SELECT * FROM mi_sistema.pedidos WHERE id_pedido=$idpedido");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id_cliente = $row['id_cliente'];
        $id_producto = $row['id_producto'];
        $costo_pedido = $row['costo_pedido'];
        $fecha_pedido = $row['fecha_pedido'];
        $estado = $row['estado'];
        $direccion_envio = $row['direccion_envio'];
          $fecha_envio = $row['fecha_envio'];
    }
}

if (isset($_POST['update'])) {
  $id_cliente = $_POST['id_cliente'];
    $id_producto = $_POST['id_producto'];
    $costo_pedido = $_POST['costo_pedido'];
     $fecha_pedido = $_POST['fecha_pedido'];
    $estado = $_POST['estado'];
  $direccion_envio= $_POST['direccion_envio'];
  $fecha_envio = $_POST['fecha_envio'];
  
    $query = "UPDATE mi_sistema.pedidos SET id_cliente = '$id_cliente', id_producto = '$id_producto'"
            . ", costo_pedido = '$costo_pedido', fecha_pedido = '$fecha_pedido'"
            . ", estado = '$estado', direccion_envio = '$direccion_envio', fecha_envio = '$fecha_envio'"
            . "WHERE id_pedido=$idpedido";
    mysqli_query($connection, $query);
    $_SESSION['message'] = 'Pedido modificado correctamente';
    $_SESSION['message_type'] = 'Error!';
    header('Location: OrdersInterface.php');
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Pedido</title>
        <link rel="stylesheet" href="cssFiles/ActionsStyles.css">
    <link rel="icon" href="images/web-logo.png" type="image/x-icon">

    </head>
    <body>
        <form method="post" action="">
             <label for="id_cliente">ID Cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" class="form-control"value="<?php echo $id_cliente; ?>" ><br>
        <label for="id_producto">ID Producto:</label>
        <input type="number" id="id_producto" name="id_producto" class="form-control"  value="<?php echo $id_producto; ?>"><br>
        <label for="costo_pedido">Costo pedido:</label>
        <input type="number" id="costo_pedido" name="costo_pedido" step="0.01" class="form-control"  value="<?php echo $costo_pedido; ?>"><br>
         <label for="fecha_pedido">Fecha Orden:</label>
        <input type="date" id="fecha_pedido" name="fecha_pedido" class="form-control" value="<?php echo date ('Y-m-d', strtotime($fecha_pedido)); ?>" ><br>
           <label for="estado">Estado del Pedido:</label>
        <input type="text" id="estado" name="estado" class="form-control" value="<?php echo $estado; ?>"><br>
        <label for="direccion_envio">Direccion de Envio:</label>
        <input type="text" id="direccion_envio" name="direccion_envio" class="form-control" value="<?php echo $direccion_envio; ?>"><br>
          <label for="fecha_envio">Fecha de Envio:</label>
        <input type="date" id="fecha_envio" name="fecha_envio" class="form-control"value="<?php echo date ('Y-m-d', strtotime($fecha_pedido)); ?>"><br>
        <input type="submit" name="update" value="Editar Pedido">
        </form>
    </body>
</html>
