<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
  // Retrieve the username from the session
  $username = $_SESSION['username'];

  // Check if the user is an admin
  if ($_SESSION['role'] === 'admin') {
    $dashboardLink = '<p><a href="dashboard.php">Go to Dashboard</a></p>';
  } else {
    $dashboardLink = '';
  }
} else {
  // Redirect the user to the login page if not logged in
  header("Location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Welcome to ConnectMe</title>
</head>

<body>
    <h1>Welcome to ConnectMe</h1>
    <p>Hello, <?php echo $username; ?>! You have successfully logged in.</p>
    <p>Here, you can explore the features available to you.</p>
    <p>If you need any assistance, feel free to reach out to our support team.</p>
    <?php echo $dashboardLink; ?>
    <p><a href='logout.php'>Logout</a></p>
</body>

</html>