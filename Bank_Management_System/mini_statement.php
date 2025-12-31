<?php
include "db.php";
session_start();

// User login check
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user info
$user_result = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
$user = mysqli_fetch_assoc($user_result);

// Fetch last 10 transactions
$trans_result = mysqli_query($conn, "SELECT * FROM transactions WHERE user_id=$user_id ORDER BY date DESC LIMIT 10");
?>

<link rel="stylesheet" href="style.css">

<body class="dashboard-page transaction-page">

<div class="container mini-statement-container">
    <h2>Mini Statement</h2>
    <?php include "messages.php"; ?>
    
    <p>Account No: <?php echo $user['acc_no']; ?></p>
    <p>Current Balance: <?php echo number_format($user['balance'],2); ?></p>

    <table>
        <tr>
            <th>Type</th>
            <th>Amount</th>
            <th>Date & Time</th>
        </tr>
        <?php
        if(mysqli_num_rows($trans_result) > 0){
            while($row = mysqli_fetch_assoc($trans_result)){
                echo "<tr>";
                echo "<td>".$row['type']."</td>";
                echo "<td>".number_format($row['amount'],2)."</td>";
                echo "<td>".$row['date']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No transactions yet!</td></tr>";
        }
        ?>
    </table>

    <br>
    <div class="back-link">
        <a href="dashboard.php" class="plain-link">⬅ Back to Dashboard</a>
    </div>
</div>

</body>
