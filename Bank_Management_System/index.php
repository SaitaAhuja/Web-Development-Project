<?php
include "db.php";
session_start();
$success = "";
$error = "";


if (isset($_POST['login'])) {
    $acc_no = $_POST['acc_no'];
    $password = $_POST['password'];

    // FIXED QUERY
    $query = "SELECT * FROM users WHERE acc_no='$acc_no' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid account number or password!";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Login</h2>
   <?php include "messages.php"; ?>
    <?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        Account No: <input type="number" name="acc_no" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register Here</a></p>
     <p>Are you an admin? <a href="admin_login.php">Login as Admin</a></p>
</div>

