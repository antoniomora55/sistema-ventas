<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php';
$nombre = '';
$contraseña = '';
$nivel_acceso = '';
$imail = '';

if (isset($_GET['id_cliente'])) {
    $id_cliente = intval($_GET['id_cliente']);
    $result = mysqli_query($connection, "SELECT * FROM mi_sistema.clientes WHERE id_cliente=$id_cliente");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $direccion = $row['direccion'];
        $telefono = $row['telefono'];
        $imail = $row['email'];
        $fecha_registro = $row['fecha_registro'];
    }
}

if (isset($_POST['update'])) {
    $id_cliente = $_GET['id_cliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $imail = $_POST['email'];
    $fecha_registro = $_POST['fecha_registro'];

    $query = "UPDATE mi_sistema.clientes SET nombre = '$nombre', apellido = '$apellido'"
            . ", direccion = '$direccion', telefono = '$telefono', email = '$imail' "
            . ", fecha_registro = '$fecha_registro'WHERE id_cliente=$id_cliente";

    mysqli_query($connection, $query);
    $_SESSION['message'] = 'Cliente modificado correctamente';
    $_SESSION['message_type'] = 'Error!';
    header('Location: ClientsInterface.php');
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
      <link rel="stylesheet" href="cssFiles/ActionsStyles.css">
          <link rel="icon" href="images/web-logo.png" type="image/x-icon">

        <title>Editar Producto</title>
    </head>
    <body>
        <form method="post" action="">
            <label for="nombre">Nombre:</label>
            <input  id="nombre" name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title"><br>
            <label for="apellido">Apellido:</label>
            <input id="apellido" name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Update Title"><br>

            <label for="direccion">Direccion:</label>
            <input id="direccion" name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="Update Title"><br>
            <label for="telefono">Telefono:</label>
            <input  id="telefono" name="telefono" type="number" class="form-control" value="<?php echo $telefono; ?>" placeholder="Update Title"><br>
            <label for="email">email:</label>
            <input  id="email" name="email" type="text" class="form-control" value="<?php echo $imail; ?>" placeholder="Update Title"><br>
            <label for="fecha_registro">Fecha de Registro:</label>
            <input id="fecha_registro" name="fecha_registro" type="datetime-local" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($fecha_registro)); ?>" step="1"><br>
            <input type="submit" name="update" value="Editar Usuario">
        </form>
    </body>
</html>
