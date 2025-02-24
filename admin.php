<?php
session_start();

// Verifica si el usuario es administrador
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "karol", "sena");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// AGREGAR PRODUCTO
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $precio = floatval($_POST['precio']);

    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $imagen = str_replace(" ", "_", basename($_FILES['imagen']['name']));
    $target_file = $target_dir . $imagen;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowed_types) && move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $nombre, $descripcion, $precio, $target_file);
        $stmt->execute();
        $stmt->close();
    }
}

// ELIMINAR PRODUCTO
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    
    // Obtener la imagen antes de eliminar
    $stmt = $conn->prepare("SELECT imagen FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagen);
    $stmt->fetch();
    $stmt->close();

    if ($imagen && file_exists($imagen)) {
        unlink($imagen);
    }

    $stmt = $conn->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php");
    exit();
}

$result = $conn->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrador de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Panel de Administración</h2>
        
        <a href="logout.php" class="btn btn-danger mb-3">Cerrar Sesión</a>

        <!-- FORMULARIO PARA AGREGAR PRODUCTO -->
        <form action="admin.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción:</label>
                <textarea class="form-control" name="descripcion" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio:</label>
                <input type="number" class="form-control" name="precio" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" required>
            </div>
            <button type="submit" name="agregar" class="btn btn-primary">Agregar Producto</button>
        </form>

        <hr>

        <!-- LISTA DE PRODUCTOS -->
        <h3>Productos Disponibles</h3>
        <table class="table table-bordered">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><img src="<?= $row['imagen'] ?>" width="50"></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['descripcion']) ?></td>
                    <td>$<?= number_format($row['precio'], 2) ?> COP</td>
                    <td>
                        <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="?eliminar=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
