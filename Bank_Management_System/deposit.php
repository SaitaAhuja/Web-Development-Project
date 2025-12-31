<?php
include "db.php";
$success = "";
$error = "";

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['deposit'])) {
    $amount = $_POST['amount'];
    if($amount > 0){
        
        mysqli_query($conn, "UPDATE users SET balance = balance + $amount WHERE id = $user_id");
        
        mysqli_query($conn, "INSERT INTO transactions (user_id, type, amount) VALUES ($user_id, 'Deposit', $amount)");
        $success = "Deposit successful!";   // ← yahan store karo
    } else {
        $error = "Enter a valid amount!";   // ← yahan store karo
    }
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
$user = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="style.css">

</div>
<body class="dashboard-page transaction-page">
    <div class="container">
        <h2>Deposit Money</h2>
        
   <p>Current Balance: <?php echo $user['balance']; ?></p>
    <?php include "messages.php"; ?>
    <form method="post">
        <input type="number" name="amount" placeholder="Enter amount" required>
        <button type="submit" name="deposit">Deposit</button>
    </form>
<a href="dashboard.php" class="plain-link">⬅ Back to Dashboard</a>
</div>
</body>

