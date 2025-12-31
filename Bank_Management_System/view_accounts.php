<?php
session_start();
include "db.php";
$success = "";
$error = "";

if(!isset($_SESSION['admin_logged'])){ header("Location: admin_login.php"); exit; }

$result = mysqli_query($conn,"SELECT * FROM users");
?>

<link rel="stylesheet" href="style.css">
<div class="container admin-page">
    <h2>All Accounts</h2>
      <?php include "messages.php"; ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Account No</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['acc_no']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <div class="back-link">
    <a href="admin_dashboard.php" class="plain-link">⬅ Back to Dashboard</a>
</div>

</div>
