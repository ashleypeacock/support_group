<?php 
    include('config/config.php'); 
	include('libs/Database.php'); 

	if(isset($_POST['email'])) {
		  $email = $_POST['email'];
		  $password = $_POST['password'];

		  $db = new Database;
  		$userId = $db->login($email, md5($password));

      if($userId['id'] == null) {
        header("Location: index.php?alert=Incorrect login details");
      } else {

  		  //echo('User ID is '.$userId['id']);
  		  session_start();

        $isAdmin = $db->checkAdmin($userId['id']);

        if($isAdmin)
          $_SESSION['admin'] = 1;

  		  $_SESSION['userid'] = $userId['id'];
  		  $_SESSION['username'] = $userId['username'];

        //var_dump($userId['id']);
        //var_dump($userId['username']);

  		  header("Location: index.php?msg=Successfully logged in");
    }

	}

?>