<?php
include './includes/server.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = 'user'; // Par défaut, le rôle est défini sur "user"

  // Check if the username already exists in the database
  $check_query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($connection, $check_query);

  if (mysqli_num_rows($result) > 0) {
    echo "Username already exists. Please choose a different username.";
  } else {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the information into the database
    $insert_query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";
    if (mysqli_query($connection, $insert_query)) {
      echo "New user registered successfully.";
    } else {
      echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConnectMe | Registration</title>
</head>

<body>
    <h2>Register</h2>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" autocomplete="true" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>