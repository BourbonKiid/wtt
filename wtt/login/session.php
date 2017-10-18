<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include $_SERVER['DOCUMENT_ROOT'].'/wtt/db/database.php';
if(!isset($_SESSION)) 
    { 
        session_start();// Starting Session
    } 
// Storing Session
if (isset($_SESSION['login_user'])) {
	$user_check=$_SESSION['login_user'];
	$login_session;
	// SQL Query To Fetch Complete Information Of User
	$result = $db->query('SELECT idlogin FROM login WHERE username="'. $user_check . '";');
	while( $row = $result->fetch_assoc()){
		$login_session=$row['idlogin'];
	}
	if(!isset($login_session)){
		$db->close(); // Closing Connection
	}
}
?>