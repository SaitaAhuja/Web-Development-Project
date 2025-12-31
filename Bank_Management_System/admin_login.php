<?php
session_start();
$success = "";
$error = "";

// Admin password
$admin_pass = "admin123";

// Check if already logged in
if(isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] === true){
    header("Location: admin_dashboard.php");
    exit;
}

$error = "";
if(isset($_POST['login'])){
    if($_POST['password'] === $admin_pass){
        $_SESSION['admin_logged'] = true; // session set
        header("Location: admin_dashboard.php"); // go to dashboard
        exit;
    } else {
        $error = "Wrong admin password!";
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="container admin-page">
    <h2>Admin Login</h2>
      <?php include "messages.php"; ?>
    <?php if($error) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        Password: <input type="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
</div>

