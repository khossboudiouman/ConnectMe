<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConnectMe | Dashboard</title>
</head>

<body>
    <?php
  // Start the session
  session_start();

  // Check if the user is logged in
  if (isset($_SESSION['user_id'])) {
    // Check if logout is requested
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
      // Destroy the session
      session_destroy();

      // Redirect to the login page
      header("Location: login.php");
      exit;
    }

    // Retrieve the username and role from the session
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];

    // Check if the user has the required role to access the dashboard
    if ($role == 'admin') {
      // User has admin role, display welcome message
      echo "<h1>Hello, $username! Welcome to your dashboard.</h1>";
    } else {
      // User does not have admin role, redirect to index page
      header("Location: index.php");
      exit;
    }
  } else {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit;
  }
  ?>
    <!-- Your HTML content for the dashboard goes here -->
</body>

</html>