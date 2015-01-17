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

}
/** Questions **/ 		


// Why does this not show a connection failed error?
/*
		$this->link = new mysqli($this->host, $this->username, $this->db_pass, $this->db_name);

		if(!$this->link) {
			$this->error = "Connection failed".$this->link->connect_error;
			return false;
		} else {
			echo "Success!";
		}
*/
?>