<?php
$servername = "localhost";
$username = "root";
$password = "karol";
$dbname = "sena";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Usar una consulta preparada para evitar inyección SQL
    $stmt = $conn->prepare("INSERT INTO persons (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);

    if ($stmt->execute()) {
        echo "Nuevo registro creado con éxito";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
