<link rel="stylesheet" href="style.css">
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "bank_system");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
