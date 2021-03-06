<?php include('helpers/validation.php'); ?> 

<?php

class Database {

	public $host = DB_HOST;
	public $username = DB_USER;
	public $db_pass = DB_PASS;
	public $db_name = DB_NAME;

	public $link;
	public $error;

	public function __construct() {
		$this->connect();
	}

	private function connect() {
		$this->link = new mysqli($this->host, $this->username, $this->db_pass, $this->db_name);

		if ($this->link->connect_error) {
    			die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    			return false;
		}

	}

	/**
	 * Gets a list of services a user can select.
	 */
	public function getServicesList() {
		$query = "SELECT * FROM services";
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows > 0) {
    		return $results;
		} else {
			return false;
		}
	}

    /**
     * Gets rows of services for charities
     */
	public function getServicesOffered($charityid) {
		$query = "SELECT services.service FROM services LEFT JOIN organisation_services ON organisation_services.servicesid=services.id WHERE organisation_services.organisationid=$charityid";
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows > 0) {
    		return $results;
		} else {
			return false;
		}
	}

	/**
     * Gets rows of services for an array of given charity ids
     */
	public function getServicesOfferedForCharities($charityids) {
		$query = "SELECT * FROM conditions";
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows > 0) {
    		return $results;
		} else {
			echo "No result found";
			return false;
		}

	}

	public function accountUnique() {
		
	}

	public function register($registerData) {
		/*if(!accountUnique($registerData)) {
			return false;
		}*/
		$username = $registerData['username'];
      	$email = $registerData['email'];
      	$password = $registerData['password'];
      	$password2 = $registerData['password2'];
      	$city = $registerData['city'];
      	$country = $registerData['country'];
      	$blank = "";

      	if($password != $password2) {
      		return false;
      	} else {
      		$password = md5($password);
      	}
      	
      	$validateData = validateRegistration($registerData);
      	if($validateData === true) {
			$query = "INSERT INTO `users` (`username`, `email`, `password`, `city`, `country`, `about`) VALUES ('$username', '$email', '$password', '$city', '$country', '$blank')";
      		$result = $this->link->query($query) or die($this->link->error.__LINE__);
      		if($result) {
      			return true;
      		} else {
      			return "Error registering.";
      		}
      	} else {
      		return $validateData;
      	}

	}

	public function login($email, $password) {
		$query = "SELECT `id`, `username` FROM `users` WHERE email='$email' AND password='$password'";
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
    		return $row;
		}
	}

	/**
	 * Gets a list of conditions a user can select.
	 */
	public function getConditionsList() {
		$query = "SELECT * FROM conditions";
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows > 0) {
    		return $results;
		} else {
			echo "No result found";
			return false;
		}
	}

	public function getCharity($id) {
		$query = "SELECT * FROM charity WHERE id=$id";
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows > 0) {
			$row = $results->fetch_assoc();
    		return $row;
		} else {
			echo "No result found";
			return false;
		}
	}

	public function getAllCharities() {
		$query = "SELECT * FROM charity";
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows > 0) {
    		return $results;
		} else {
			return false;
		}
	}

	public function getPendingCharities() {
		$query = "SELECT * FROM Applications LEFT JOIN charity ON Applications.charity_id=charity.id";
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows > 0) {
    		return $results;
		} else {
			return false;
		}
	}

	public function getUsersPendingCharities($userId) {
		$query = "SELECT * FROM Applications LEFT JOIN charity ON Applications.charity_id=charity.id WHERE charity.userid = $userId";
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows > 0) {
    		return $results;
		} else {
			return false;
		}
	}

	public function checkAdmin($userId) {
		$query = "SELECT * FROM admins WHERE admins.userid=$userId";
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows > 0) {
    		return true;
		} else {
			return false;
		}
	}

	public function acceptApplication($charityid) {

	}

}
?>
