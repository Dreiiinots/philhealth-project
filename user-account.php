<?php

include 'connection.php';

if(isset($_POST['Login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if username exists
  $checkUsername = "SELECT * FROM users WHERE username='$username'";
  $result = $conn->query($checkUsername);
  if($result->num_rows > 0) {
    echo "Invalid credentials, please try again.";
  } else {
    // Define or fetch employee details here
    // Example (this part depends on how you want to get employee data):
    $employee_id = 'some_value';  // Replace with actual value
    $employee_status = 'some_status';  // Replace with actual value
    $employee_username = $username;  // You can assign the username to employee_username
    $employee_password = password_hash($password, PASSWORD_DEFAULT);  // Hash the password for security

    // Insert new user into the database
    $insertQuery = "INSERT INTO users (employee_id, employee_status, employee_username, employee_password) 
                    VALUES ('$employee_id', '$employee_status', '$employee_username', '$employee_password')";

    if($conn->query($insertQuery) === TRUE) {
      header("Location: index.php");
      exit();  // Don't forget to call exit() after header redirect
    } else {
      echo "Error: " . $conn->error;
    }
  }
}

if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Fix your query and include a proper WHERE condition
  $sql = "SELECT * FROM users WHERE employee_username='$username' AND employee_password='$password'";
  $result = $conn->query($sql);

  if($result->num_rows > 0) {
    // User found, proceed with login
    // You can set sessions or whatever logic you need here
  } else {
    echo "Invalid login credentials.";
  }
}
?>
