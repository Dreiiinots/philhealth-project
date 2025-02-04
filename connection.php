<?php
//connection to database
$conn = mysqli_connect("localhost: ", "root", "", "gsuinventory");
if($conn) {



}
if(isset($_POST['submit'])) {

	$user = $_POST['username'];
	$password = $_POST['password'];

if (empty($user) || empty($pass)) {


?>