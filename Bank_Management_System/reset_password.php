<?php
session_start();
include "db.php";
$success = "";
$error = "";

if(!isset($_SESSION['admin_logged'])){ header("Location: admin_login.php"); exit; }

$msg = "";
if(isset($_POST['reset'])){
    $acc_no = $_POST['acc_no'];
    $new_pass = $_POST['new_password'];
    $query = "UPDATE users SET password='$new_pass' WHERE acc_no=$acc_no";
    if(mysqli_query($conn,$query)){
        $msg = "Password reset successfully!";
    } else {
        $msg = "Error: ".mysqli_error($conn);
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="container admin-page">
    <h2>Reset Password</h2>
      <?php include "messages.php"; ?>
    <?php if($msg) echo "<p style='color:green;'>$msg</p>"; ?>
    <form method="post">
        Account No: <input type="number" name="acc_no" required><br>
        New Password: <input type="password" name="new_password" required><br>
        <button type="submit" name="reset">Reset Password</button>
    </form>
    <br>
    <div class="back-link">
    <a href="admin_dashboard.php">⬅ Back to Admin Dashboard</a>
</div>

</div>

