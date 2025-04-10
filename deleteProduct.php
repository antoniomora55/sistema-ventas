<?php

include 'db.php';
if(isset($_GET['id_producto'])) {
   $id_producto = intval($_GET['id_producto']);
  $result = mysqli_query($connection, "DELETE FROM mi_sistema.productos WHERE id_producto = $id_producto");

  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: ProductsInterface.php');
}

?>