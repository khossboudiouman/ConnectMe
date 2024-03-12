<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "ConnectMe_db";

// Connect to MySQL
$connection = mysqli_connect($server, $user, $password, $database);

// Check connection
if (!$connection) {
  die("Database connection failed: " . mysqli_connect_error());
}