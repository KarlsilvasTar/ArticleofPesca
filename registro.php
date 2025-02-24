<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            text-align: left;
            color: #333;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 2px solid #ddd;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #ff7eb3;
            outline: none;
            box-shadow: 0px 0px 8px rgba(255, 126, 179, 0.5);
        }
        .btn-primary {
            background-color: #ff7eb3;
            border: none;
            padding: 12px;
            font-size: 18px;
            border-radius: 8px;
            transition: 0.3s;
            width: 100%;
            cursor: pointer;
            color: white;
        }
        .btn-primary:hover {
            background-color: #ff4f98;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4" style="color: #333;">Registro</h2>
        <form action="registro.php" method="POST">
            <div class="mb-3 text-start">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 text-start">
                <label for="phone" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "karol";
    $dbname = "sena";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Verificar si el email ya existe
    $check_sql = "SELECT id FROM persons WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "❌ Error: El correo electrónico ya está registrado.";
    } else {
        // Insertar el nuevo usuario si el email no existe
        $insert_sql = "INSERT INTO persons (name, email, phone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("sss", $nombre, $email, $phone);

        if ($stmt->execute()) {
            echo "✅ Registro exitoso.";
        } else {
            echo "❌ Error al registrar: " . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
