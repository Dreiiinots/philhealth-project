<?php
//connection to database ---- palagay localhost tnx
$conn = mysqli_connect("localhost: ", "root", "", "gsuinventory");
if($conn) {



}
if(isset($_POST['submit'])) {
//declaring variables
	$username = $_POST['employee_username'];
	$password = $_POST['employee_password'];

// to check if the user exists
$sql = "SELECT 'employee_id' FROM users WHERE username = 'employee_username'";
$result = $conn->query($sql);

// if the user exists
if($result->num_rows > 0) {
  // fetch user's data
  $row = $result->fetch_assoc();

  if ($row['password'] === "") {
    echo "Login Successfull!";
  } else {
    echo "Invalid credentials, please try again.";
  }
} else {
  // if no user match with the username
  echo "Invalid credentials, please try again.";
}
}

//close the connection
$conn->close();


?>