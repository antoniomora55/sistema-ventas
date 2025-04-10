<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_p'];
    $descripcion = $_POST['descripcion_p'];
    $precio = $_POST['precio_p'];
    $provee = $_POST['id_proveedor_p'];
     $alta = $_POST['fecha_alta'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO productos (nombre_p, descripcion_p, precio_p,id_proveedor_p,fecha_alta, stock) VALUES ('$nombre', '$descripcion', '$precio', '$provee', '$alta','$stock')";

    if ($connection->query($sql) === TRUE) {
        echo "Producto agregado exitosamente";
         header('Location: ProductsInterface.php');
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
    <h1>Agregar Producto</h1>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre_p" name="nombre_p" required><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion_p" name="descripcion_p" required><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio_p" name="precio_p" step="0.01" required><br>
         <label for="id_proveedor">Proveedor:</label>
        <input type="number" id="id_proveedor_p" name="id_proveedor_p" required><br>
           <label for="fechaAlta">Alta:</label>
        <input type="datetime-local" id="fecha_alta" name="fecha_alta" required><br>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required><br>
        <input type="submit" value="Agregar Producto">
    </form>
</body>
</html>