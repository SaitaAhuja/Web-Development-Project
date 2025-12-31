<?php
session_start();
include "db.php"; // database connection
$success = "";
$error = "";

if(!isset($_SESSION['admin_logged'])){ header("Location: admin_login.php"); exit; }

$msg = "";
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $acc_no = $_POST['acc_no'];
    $password = $_POST['password'];
    $balance = $_POST['balance'];

    $query = "INSERT INTO users (name, acc_no, password, balance) VALUES ('$name',$acc_no,'$password',$balance)";
    if(mysqli_query($conn,$query)){
        $msg = "Account added successfully!";
    } else {
        $msg = "Error: ".mysqli_error($conn);
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="container admin-page">
    <h2>Add New Account</h2>
      <?php include "messages.php"; ?>
    <?php if($msg) echo "<p style='color:green;'>$msg</p>"; ?>
    <form method="post">
        Name: <input type="text" name="name" required><br>
        Account No: <input type="number" name="acc_no" required><br>
        Password: <input type="password" name="password" required><br>
        Initial Balance: <input type="number" name="balance" value="0" required><br>
        <button type="submit" name="add">Add Account</button>
    </form>
    <br>
    <div class="back-link">
    <a href="admin_dashboard.php">⬅ Back to Admin Dashboard</a>
</div>

</div>

