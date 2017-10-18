<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include $_SERVER['DOCUMENT_ROOT'].'/wtt/db/database.php';

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($db, $username);
$password = mysqli_real_escape_string($db, $password);
// SQL query to fetch information of registerd users and finds user match.
$login = $db->query("select * from login where username='".$username."';");
$row = mysqli_fetch_assoc($login);

if ($row['username']==$username && password_verify($password, $row['password'])) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: ".$_POST['cur'].""); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
$db->close(); // Closing Connection
}
}
?>