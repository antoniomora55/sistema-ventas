<?php

include 'db.php';
if(isset($_GET['id_pedido'])) {
   $id_pedido = intval($_GET['id_pedido']);
  $result = mysqli_query($connection, "DELETE FROM mi_sistema.pedidos WHERE id_pedido = $id_pedido");

  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Pedido removido exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: OrdersInterface.php');
}

?>