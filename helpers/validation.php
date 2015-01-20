
<?php 

	function validateRegistration($registerData) {
		$username = $registerData['username'];
      	$email = $registerData['email'];
      	$password = $registerData['password'];
      	$password2 = $registerData['password2'];
      	$city = $registerData['city'];
      	$country = $registerData['country'];
      	$blank = "";

      	if(empty($username)) {
      		return "Please enter a username";
      	}

      	if(empty($email)) {
      		return "Please enter an email";
      	}

      	if(empty($password)) {
      		return "Please enter a password";
      	}

      	if(empty($password2)) {
      		return "Please confirm your password";
      	}

      	if(empty($city)) {
      		return "Please enter you city";
      	}

      	if(empty($country)) {
      		return "Please enter your country";
      	}

      	if(strcmp($password,$password2) != 0) {
      		echo("unmatched pass");
      		return "Passwords do not match";
      	}

      	return true;
	}

?>