<?php
include "db.php";
$success = "";
$error = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $acc_no = $_POST['acc_no'];
    $password = $_POST['password'];
    $balance = $_POST['balance'];

    // Attempt to insert into database
    $query = "INSERT INTO users (name, acc_no, password, balance) VALUES ('$name', $acc_no, '$password', $balance)";
    if(mysqli_query($conn, $query)){
        $success = "Account created successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Register New Account</h2>

    <!-- Success / Error Messages -->
    <?php if($success) echo "<div class='msg success'>$success</div>"; ?>
    <?php if($error) echo "<div class='msg error'>$error</div>"; ?>

    <form method="post">
        Name: <input type="text" name="name" required><br>
        Account No: <input type="number" name="acc_no" required><br>
        Password: <input type="password" name="password" required><br>
        Initial Balance: <input type="number" name="balance" value="0" required><br>
        <button type="submit" name="register">Register</button>
    </form>

    <p>Already have an account? <a href="index.php">Login Here</a></p>
</div>
