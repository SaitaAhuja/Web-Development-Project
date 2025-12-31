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

if (isset($_POST['withdraw'])) {
    $amount = $_POST['amount'];

    $result = mysqli_query($conn, "SELECT balance FROM users WHERE id=$user_id");
    $user = mysqli_fetch_assoc($result);

    if($amount > 0 && $user['balance'] >= $amount){
        mysqli_query($conn, "UPDATE users SET balance = balance - $amount WHERE id = $user_id");
        mysqli_query($conn, "INSERT INTO transactions (user_id, type, amount) VALUES ($user_id, 'Withdraw', $amount)");
        $success = "Withdraw successful!";   // ← yahan store karo
    } else {
        $error = "Insufficient balance or invalid amount!";  // ← yahan store karo
    }
}
$result = mysqli_query($conn, "SELECT balance FROM users WHERE id=$user_id");
$user = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="style.css">
<body class="dashboard-page transaction-page">
<div class="container">
    <h2>Withdraw Money</h2>
     <?php include "messages.php"; ?>
    <p>Current Balance: <?php echo $user['balance']; ?></p>
    <form method="post">
        <input type="number" name="amount" placeholder="Enter withdraw amount" required>
        <button type="submit" name="withdraw">Withdraw</button>
    </form>
<a href="dashboard.php" class="plain-link">⬅ Back to Dashboard</a>
</div>
</body>



