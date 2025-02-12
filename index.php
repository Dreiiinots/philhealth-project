<?php
require 'connection.php'; // contains the data base connection
require 'fetch.php'; // for fetching data

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize inputs to prevent SQL injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Checking if the username and password from the database
    $sql = "SELECT * FROM login WHERE employee_username = '$username' AND employee_password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // The user is already found and login successfully
        $row = $result->fetch_assoc();
        echo "Login Successfully!";
        echo "<script> window.location.href ='indexone.html';</script>";
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>
<body style="margin: 0; background-color: #EFF1ED; display: flex; justify-content: center; align-items: center; height: 100vh;">

  <div class="container" style="height: 60%; width: 50%; background: #EFF1ED; box-sizing: border-box; box-shadow: 3px 3px 10px; border-radius: 15px; display: flex; padding: 0.5em;">

    <div class="title" style="width: 50%; background-color: #46B47F; box-sizing: border-box; border-radius: 0px 100px 100px 0px; display: flex; justify-content: center; align-items: center;">
      <div id="img">
        <img src="images/philhealthlogo.png" alt="PhilHealth logo" height="80px">
        <h1 style="font-size: 15px; font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; text-align: center;">GSU</h1>
      </div>
    </div>

    <div class="LoginForm" style="width: 50%; background-color: transparent; margin-left: 1em; padding: 10px; display: flex; justify-content: center; margin-top: 25px;">
      <form id="loginForm" method="POST">
        <div class="title" style="justify-content: center; align-items: center;">
          <h2 style="font-size: 15px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: bold; color:#36454F;">PHILHEALTH REGION 1</h2>
          <h2 style="font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: center; font-weight: bold; color:#36454F;">Enter your Credentials</h2>
        </div>

        <div class="form-container" style="margin-bottom: 0.5rem;">
          <label for="username" style="display: block; margin-bottom: 0.5rem; font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #36454F; margin-top: 2.5rem;">Username</label>
          <input type="text" id="username" name="username" style="display: block; padding: 10px; box-sizing: border-box; border-radius: 5px; font-weight: 600; margin-bottom: 0.5rem;">
          <span id="username-error" class="error-message" style="display: inline-block; color: red; font-size: 12px; margin-left: 10px; margin-top: 5px;"></span>

          <label for="password" style="display: block; margin-bottom: 0.5rem; font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #36454F;">Password</label>
          <input type="password" id="password" name="password" style="display: block; padding: 10px; box-sizing: border-box; border-radius: 5px; font-weight: 600; margin-bottom: 1.5rem;">
          <span id="password-error" class="error-message" style="display: inline-block; color: red; font-size: 12px; margin-left: 10px; margin-top: 5px;"></span>

          <button type="submit" style="width: 100%; height: 2.5rem; background-color: #6DD19C; box-sizing: border-box; border-radius: 5px; font-family: Arial, Helvetica, sans-serif; font-weight: bold;">Login</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal -->
  <div id="loginModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div class="modal-content" style="background-color: #fff; padding: 20px; border-radius: 8px; text-align: center; width: 300px;">
      <div class="message" id="modalMessage" style="margin-bottom: 20px; font-family: Arial, Helvetica, sans-serif;"></div>
      <button id="closeModalBtn" style="padding: 10px; background-color: #46B47F; color: white; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">Close</button>
    </div>
  </div>

  <script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent form from submitting the default way

      // Reset error messages
      document.getElementById("username-error").textContent = '';
      document.getElementById("password-error").textContent = '';
      document.getElementById("modalMessage").textContent = '';

      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;

      let valid = true;

      // Validate username
      if (username.trim() === "") {
        document.getElementById("username-error").textContent = 'Username is required.';
        valid = false;
      }

      // Validate password
      if (password.trim() === "") {
        document.getElementById("password-error").textContent = 'Password is required.';
        valid = false;
      } else if (password.length < 5) {
        document.getElementById("password-error").textContent = 'Password must be at least 5 characters.';
        valid = false;
      }

      if (valid) {
        // If valid, proceed with the form submission via AJAX (optional if needed)
        document.getElementById("loginForm").submit();
      } else {
        // Show error in modal if validation fails
        document.getElementById("modalMessage").textContent = 'Invalid credentials, please try again! ';
        document.getElementById("loginModal").style.display = "flex";
      }
    });

    // Close modal when button is clicked
    document.getElementById("closeModalBtn").addEventListener("click", function() {
      document.getElementById("loginModal").style.display = "none"; // Hide modal
    });
  </script>

</body>
</html>
