<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "karol", "sena");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM productos WHERE id = $id");
$producto = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $precio = floatval($_POST['precio']);

    if ($_FILES['imagen']['name']) {
        $imagen = "uploads/" . str_replace(" ", "_", basename($_FILES['imagen']['name']));
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
        $conn->query("UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen' WHERE id=$id");
    } else {
        $conn->query("UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id=$id");
    }

    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Editar Producto</h2>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Descripción:</label>
                    <textarea class="form-control" name="descripcion" rows="3" required><?= htmlspecialchars($producto['descripcion']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Precio:</label>
                    <input type="number" class="form-control" name="precio" value="<?= $producto['precio'] ?>" step="0.01" required>
                </div>

                <div class="mb-3 text-center">
                    <label class="form-label fw-bold">Imagen Actual:</label><br>
                    <img src="<?= $producto['imagen'] ?>" class="img-thumbnail" width="200">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nueva Imagen (opcional):</label>
                    <input type="file" class="form-control" name="imagen">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="admin.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
