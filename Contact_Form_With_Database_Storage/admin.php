<?php
include 'db_config.php';
$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - View Messages</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Received Messages</h2>
    <table border="1" width="100%" cellpadding="8">
      <tr style="background-color:#007BFF; color:white;">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['ID'] ?></td>
        <td><?= $row['Name'] ?></td>
        <td><?= $row['Email'] ?></td>
        <td><?= $row['Message'] ?></td>
        <td><?= $row['created_at'] ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>
