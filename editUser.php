<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php';
$nombre = '';
$contraseña = '';
$nivel_acceso = '';
$imail = '';

if (isset($_GET['id_usuario'])) {
    $id_producto = intval($_GET['id_usuario']);
    $result = mysqli_query($connection, "SELECT * FROM mi_sistema.usuarios WHERE id_usuario=$id_producto");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $contraseña = $row['contrasena'];
        $nivel_acceso = $row['id_nivel'];
        $imail = $row['email'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id_usuario'];
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contrasena'];
    $nivel_acceso = $_POST['id_nivel'];
    $imail = $_POST['email'];

    $query = "UPDATE mi_sistema.usuarios SET nombre = '$nombre', contrasena = '$contraseña'"
            . ", id_nivel = '$nivel_acceso', email = '$imail' WHERE id_usuario=$id";

    mysqli_query($connection, $query);
    $_SESSION['message'] = 'Usuario modificado correctamente';
    $_SESSION['message_type'] = 'Error!';
    header('Location: UsersInterface.php');
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Producto</title>
        <link rel="stylesheet" href="cssFiles/ActionsStyles.css">
    <link rel="icon" href="images/web-logo.png" type="image/x-icon">

    </head>
    <body>
        <form method="post" action="">
            <label for="nombre">Nombre:</label>
            <input  id="nombre" name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title"><br>
            <label for="contrasena">Contrasena:</label>
            <input id="contrasena" name="contrasena" type="text" class="form-control" value="<?php echo $contraseña; ?>" placeholder="Update Title"><br>

            <label for="id_nivel">Nivel de Acceso:</label>
            <input id="id_nivel" name="id_nivel" type="number" class="form-control" value="<?php echo $nivel_acceso; ?>" placeholder="Update Title"><br>
            <label for="email">Correo:</label>
            <input  id="email" name="email" type="text" class="form-control" value="<?php echo $imail; ?>" placeholder="Update Title"><br>
            <input type="submit" name="update" value="Editar Usuario">
        </form>
    </body>
</html>
