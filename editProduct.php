<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php';
$nombre = '';
$descripcion = '';
$precio = '';
$provee = '';
$alta = '';
$stock = '';

if (isset($_GET['id_producto'])) {
    $id_producto = intval($_GET['id_producto']);
    $result = mysqli_query($connection, "SELECT * FROM mi_sistema.productos WHERE id_producto=$id_producto");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre_p'];
        $descripcion = $row['descripcion_p'];
        $precio = $row['precio_p'];
        $provee = $row['id_proveedor_p'];
        $alta = $row['fecha_alta'];
        $stock = $row['stock'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id_producto'];
    $nombre = $_POST['nombre_p'];
    $descripcion = $_POST['descripcion_p'];
    $precio = $_POST['precio_p'];
    $provee = $_POST['id_proveedor_p'];
    $alta = $_POST['fecha_alta'];
    $stock = $_POST['stock'];

    $query = "UPDATE mi_sistema.productos SET nombre_p = '$nombre', descripcion_p = '$descripcion'"
            . ", precio_p = '$precio', id_proveedor_p = '$provee'"
            . ", fecha_alta = '$alta', stock = '$stock' WHERE id_producto=$id";
    mysqli_query($connection, $query);
    $_SESSION['message'] = 'Producto modificado correctamente';
    $_SESSION['message_type'] = 'Error!';
    header('Location: ProductsInterface.php');
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
            <label for="nombre_p">Nombre:</label>
            <input  id="nombre_p" name="nombre_p" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title"><br>
            <label for="descripcion">Descripción:</label>
            <input id="descripcion_p" name="descripcion_p" type="text" class="form-control" value="<?php echo $descripcion; ?>" placeholder="Update Title"><br>

            <label for="precio">Precio:</label>
            <input id="precio_p" name="precio_p" type="number" class="form-control" value="<?php echo $precio; ?>" placeholder="Update Title"><br>

            <label for="Proveedor">Proveedor:</label>
            <input id="id_proveedor_p" name="id_proveedor_p" type="number" class="form-control" value="<?php echo $provee; ?>" placeholder="Update Title"><br>

            <label for="fechaAlta">Alta:</label>
            <input id="fecha_alta" name="fecha_alta" type="datetime-local" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($alta)); ?>" step="1"><br>
            <label for="stock">Stock:</label>
            <input id="stock" name="stock"type="number" class="form-control" value="<?php echo $stock; ?>" placeholder="Update Title"><br>
            <input type="submit" name="update" value="Editar Producto">
        </form>
    </body>
</html>
