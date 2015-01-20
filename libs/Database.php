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

}
?>
