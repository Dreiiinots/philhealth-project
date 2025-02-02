<?php

include 'connection.php';

if(isset($POST['Login'])) {
  $username=$_POST['username'];
  $password=$POST['password'];

  $checkUsername="SELECT * From users where username='$username'";
  $result=$conn->query($checkUsername);
  if($result->num_rows>0){
    echo "Invalid credentials, please try again. ";
  }
  else{
    $insertQuery="INSERT INTO users(employee_id, employee_status, employee_username, employee_password)
                  VALUES ('$employee_id', '$employee_status', '$employee_username', '$employee_password')";

    if($conn->query($insertQuery)==TRUE) {
      header("location: index.php)");
    }
    else{
      echo "Error:".$conn->error;
    }

  }

}

if(isset($_POST['login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql="SELECT * FROM users WHERE employee_id='$employee_id", employee_status='$employee_status', 
}
?>