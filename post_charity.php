<?php 
	include('libs/Database.php'); 
	$email = $_GET['email'];
	$password = $_GET['password'];

	$db = new Database;
  	$servicesList = $db->login();
?>