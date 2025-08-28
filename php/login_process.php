<?php 

session_start(); 

include("connection.php"); 

$username = $_POST['username']; 

$password = $_POST['password']; 

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'"; 

$result = $connection->query($sql); 

if ($result->num_rows > 0) { 

 $_SESSION['username'] = $username; 

 header("Location: index2.php"); 

} else { 

 echo "Login failed. <a href='login.php'>Try again</a>";

} 

$connection->close(); 

?>