<?php

include 'db.php';
if(isset($_GET['id_usuario'])) {
   $id_producto = intval($_GET['id_usuario']);
  $result = mysqli_query($connection, "DELETE FROM mi_sistema.usuarios WHERE id_usuario = $id_producto");

  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: UsersInterface.php');
}

?>