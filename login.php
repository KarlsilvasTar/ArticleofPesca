<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    if ($password === "karol") { // Contraseña del admin
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Contraseña incorrecta";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Administrador</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST">
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <button type="submit">Ingresar</button>
    </form>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
</body>
</html>

