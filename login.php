<?php
include 'includes/server.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Retrieve the hashed password and role from the database
  $query = "SELECT password, role FROM users WHERE username='$username'";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    $role = $row['role'];

    // Verify if the password matches
    if (password_verify($password, $hashed_password)) {
      // Start the session
      session_start();

      // Set session variables
      $_SESSION['user_id'] = $username; // You can set any user identifier here
      $_SESSION['username'] = $username;
      $_SESSION['role'] = $role; // Store the user's role in the session

      // Redirect to dashboard upon successful login
      header("Location: dashboard.php");
      exit;
    } else {
      //echo "Incorrect password.";
      echo "Incorrect identifier &#129300 !";
    }
  } else {
    //echo "Incorrect username.";
    echo "Incorrect identifier &#129300 !";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConnectMe | Login</title>
</head>

<body>
    <main>
        <h1>Login</h1>
        <form method="post" action="">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" autocomplete="true" required><br><br>
            <input type="submit" value="Login">
        </form>
    </main>
</body>

</html>