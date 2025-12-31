<?php
include "db.php";
session_start();
$success = "";
$error = "";

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
$user = mysqli_fetch_assoc($result);
?>
<body class="dashboard-page">
<link rel="stylesheet" href="style.css">
<div class="container">
    <h1><?php echo $user['name']; ?></h1>
    <p>Balance: <?php echo $user['balance']; ?></p>
    <a href="deposit.php">Deposit</a> 
    <a href="withdraw.php">Withdraw</a> 
    <a href="transfer.php">Transfer</a> 
    <a href="mini_statement.php">Mini Statement</a>
    <a href="help_desk.php">Help Desk</a>
    <a href="logout.php">Logout</a>
</div>
