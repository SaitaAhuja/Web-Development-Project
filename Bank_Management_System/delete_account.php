<?php
session_start();
include "db.php";
$success = "";
$error = "";

if(!isset($_SESSION['admin_logged'])){ header("Location: admin_login.php"); exit; }

$msg = "";
if(isset($_POST['delete'])){
    $acc_no = $_POST['acc_no'];
    $query = "DELETE FROM users WHERE acc_no=$acc_no";
    if(mysqli_query($conn,$query)){
        $msg = "Account deleted successfully!";
    } else {
        $msg = "Error: ".mysqli_error($conn);
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="container admin-page">
    <h2>Delete Account</h2>
      <?php include "messages.php"; ?>
     <?php if($msg) echo "<p style='color:green;'>$msg</p>"; ?>
    <form method="post">
        Account No: <input type="number" name="acc_no" required><br>
        <button type="submit" name="delete">Delete Account</button>
    </form>
    <br>
    <div class="back-link">
    <a href="admin_dashboard.php">⬅ Back to Admin Dashboard</a>
</div>

</div>
