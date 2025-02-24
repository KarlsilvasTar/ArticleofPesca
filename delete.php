<?php
$servername = "localhost";
$username = "root";
$password = "karol";
$dbname = "sena";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO persons (name, email, phone) VALUES ('$name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } elseif (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM persons WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}
?>

<form action="delete.php" method="POST">
    <label>ID:</label>
    <input type="text" name="id" required>
    <br>
    <button type="submit">Eliminar</button>
</form>

