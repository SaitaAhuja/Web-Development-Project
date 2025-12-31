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

if(isset($_POST['transfer'])){
    $receiver_acc = $_POST['receiver']; // fixed name
    $amount = $_POST['amount'];

    // Sender info
    $result = mysqli_query($conn, "SELECT balance FROM users WHERE id=$user_id");
    $sender = mysqli_fetch_assoc($result);

    // Receiver info
    $result2 = mysqli_query($conn, "SELECT id, balance FROM users WHERE acc_no='$receiver_acc'");
    $receiver = mysqli_fetch_assoc($result2);

    if(!$receiver){
        $error = "Receiver account not found!";
    } elseif($amount <= 0 || $sender['balance'] < $amount){
        $error = "Invalid amount or insufficient balance!";
    } else {
        // Subtract from sender
        mysqli_query($conn, "UPDATE users SET balance = balance - $amount WHERE id=$user_id");
        // Add to receiver
        mysqli_query($conn, "UPDATE users SET balance = balance + $amount WHERE id=".$receiver['id']);
        // Record transactions
        mysqli_query($conn, "INSERT INTO transactions (user_id, type, amount) VALUES ($user_id, 'Transfer Out', $amount)");
        mysqli_query($conn, "INSERT INTO transactions (user_id, type, amount) VALUES (".$receiver['id'].", 'Transfer In', $amount)");
        $success = "Transfer successful!";
    }
}

?>
<link rel="stylesheet" href="style.css">
<body class="dashboard-page transaction-page">
<div class="container">
    <h2>Transfer Money</h2>
  <?php include "messages.php"; ?>
    <form method="post">
        <input type="number" name="receiver" placeholder="Receiver Account No" required>
        <input type="number" name="amount" placeholder="Amount" required>
        <button type="submit" name="transfer">Transfer</button>
    </form>
    <a href="dashboard.php" class="plain-link">⬅ Back to Dashboard</a>
</div>
</body>
