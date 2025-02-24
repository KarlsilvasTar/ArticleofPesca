<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos Disponibles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 15px;
      margin: 10px;
      width: 250px;
      text-align: center;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }
    .product-image {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="mb-4 text-center">Productos Disponibles</h2>
    <div class="d-flex flex-wrap justify-content-center">
      <?php
      // Conexión a la base de datos
      $conn = new mysqli("localhost", "root", "karol", "sena");
      if ($conn->connect_error) {
          die("Conexión fallida: " . $conn->connect_error);
      }

      // Consulta para obtener los productos
      $sql = "SELECT nombre, descripcion, precio, imagen FROM productos";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo '<div class="product-card">';
              echo '<img src="' . htmlspecialchars($row["imagen"]) . '" alt="' . htmlspecialchars($row["nombre"]) . '" class="product-image">';
              echo '<h3>' . htmlspecialchars($row["nombre"]) . '</h3>';
              echo '<p>' . htmlspecialchars($row["descripcion"]) . '</p>';
              echo '<p><strong>Precio: $' . htmlspecialchars($row["precio"]) . ' COP</strong></p>';
              echo '</div>';
          }
      } else {
          echo "<p class='text-center'>No hay productos disponibles.</p>";
      }

      $conn->close();
      ?>
    </div>
  </div>
</body>
</html>
