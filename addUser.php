<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contrasena'];
    $nivelAcceso = $_POST['id_nivel'];
    $imail = $_POST['email'];

    $sql = "INSERT INTO usuarios (nombre, contrasena, id_nivel,email) VALUES ('$nombre', '$contraseña', '$nivelAcceso', '$imail')";

    if ($connection->query($sql) === TRUE) {
        echo "Usuario agregado exitosamente";
         header('Location: UsersInterface.php');
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
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="text" id="contrasena" name="contrasena" required><br>

        <label for="id_nivel">id_nivel_acceso:</label>
        <input type="number" id="id_nivel" name="id_nivel" step="0.01" required><br>
          <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br>

        <input type="submit" value="Agregar Usuario">
    </form>
</body>
</html>