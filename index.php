<?php
session_start();

try {
    $conn = new PDO("mysql:host=localhost;dbname=mi_sistema", "root", "NewPassword");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    // Consulta preparada para evitar errores y mejorar la seguridad
    $stmt = $conn->prepare("SELECT * FROM mi_sistema.usuarios WHERE email = :email AND contrasena = :contrasena");

    // Asignar valores a los parámetros
    $stmt->bindParam(':email', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Asignar el id_nivel del usuario autenticado
        $_SESSION['id_nivel'] = $usuario['id_nivel']; // Guardar en la sesión

        // Redirigir a principalBar.php
        header("Location: principalBar.php");
        exit;
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Operativo De Ventas</title>
    <link rel="stylesheet" href="cssFiles/LoginStyle.css">
    <link rel="icon" href="images/web-logo.png" type="image/x-icon">
</head>
<body>

<div class="login-container">
    <h2>Welcome</h2><br>

    <?php if (isset($error)): ?>
        <p style="color:red; text-align:center;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Iniciar Sesión</button>
    </form>

   
</div>

</body>
</html>
