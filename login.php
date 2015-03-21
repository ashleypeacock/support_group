<?php 
    include('config/config.php'); 
	include('libs/Database.php'); 

	if(isset($_POST['email'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$db = new Database;
  		$userId = $db->login($email, md5($password));
  		echo('User ID is '.$userId['id']);
  		session_start();

  		$_SESSION["userid"] = $userId['id'];
  		$_SESSION["username"] = $userId['username'];

  		header("Location: index.php?msg=Successfully logged in");

	}

?>