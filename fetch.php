<?php
$sql = "SELECT employee_id, employee_status, employee_username, employee_password FROM users";
$result = $conn->query($sql);

if($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "ID: ", $row["employee_id"] . " - Status: " . $row["employee_status"] . " - Username: " . $row["employee_username"] . " - Password: " . $row["employee_password"] . "<br>";
                                                                                                                                                                  
  }

} else {
  echo "0 results";
}
?>