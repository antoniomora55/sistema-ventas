<?php

include 'db.php';
if(isset($_GET['id_cliente'])) {
   $id_producto = intval($_GET['id_cliente']);
  $result = mysqli_query($connection, "DELETE FROM mi_sistema.clientes WHERE id_cliente = $id_producto");

  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Client Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: ClientsInterface.php');
}

?>
