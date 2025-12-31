<?php
session_start();
$success = "";
$error = "";

if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true){
    header("Location: admin_login.php");
    exit;
}
?>

<link rel="stylesheet" href="style.css">

<div class="container admin-page">
    <h2>Admin Dashboard</h2>
    <div class="admin-buttons">
        <a href="add_account.php">Add Account</a>
        <a href="delete_account.php">Delete Account</a>
        <a href="reset_password.php">Reset Password</a>
        <a href="view_accounts.php">View All Accounts</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

