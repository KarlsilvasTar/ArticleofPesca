<?php
$servername = "localhost";
$username = "root";
$password = "karol";
$dbname = "sena"; // Nombre correcto de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Verificar que los campos no estén vacíos
    if (!empty($id) && !empty($name) && !empty($email) && !empty($phone)) {
        // Consulta preparada para actualizar los datos
        $sql = "UPDATE persons SET name=?, email=?, phone=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $email, $phone, $id);

        // Ejecutar la actualización
        if ($stmt->execute()) {
            echo "Registro actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }

        // Cerrar la consulta
        $stmt->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
}

// Cerrar conexión
$conn->close();
?>
