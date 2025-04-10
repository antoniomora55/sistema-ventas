<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $imail = $_POST['email'];
    $fecha_registro = $_POST['fecha_registro'];

    $sql = "INSERT INTO clientes (nombre, apellido, direccion,telefono,email,fecha_registro) VALUES "
            . "('$nombre', '$apellido', '$direccion', '$telefono', '$imail', '$fecha_registro')";

    if ($connection->query($sql) === TRUE) {
        echo "Cliente agregado exitosamente";
        header('Location: ClientsInterface.php');
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
        <form method="post" action="">
            <label for="nombre">Nombre:</label>
            <input  id="nombre" name="nombre" type="text" class="form-control"  ><br>
            <label for="apellido">Apellido:</label>
            <input id="apellido" name="apellido" type="text" class="form-control" ><br>

            <label for="direccion">Direccion:</label>
            <input id="direccion" name="direccion" type="text" class="form-control"  ><br>
            <label for="telefono">Telefono:</label>
            <input  id="telefono" name="telefono" type="number" class="form-control" ><br>
            <label for="email">email:</label>
            <input  id="email" name="email" type="text" class="form-control" ><br>
            <label for="fecha_registro">Fecha de Registro:</label>
            <input id="fecha_registro" name="fecha_registro" type="datetime-local" class="form-control"  step="1"><br>
            <input type="submit" name="update" value="Agregar Cliente">
        </form>
    </body>
</html>