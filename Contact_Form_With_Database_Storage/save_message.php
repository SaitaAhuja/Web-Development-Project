<?php
include 'db_config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Message Sent Successfully!'); window.location='index.html';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
