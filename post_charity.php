<?php 
	include('config/config.php'); 
	include('includes/Database.php'); 
?>

<?php

	$dataArray = array();
	// ----- General details

	if(isset($_POST['name'])) {
		$dataArray['name'] = $_POST['name'];
	}

	if(isset($_POST['email'])) {
		$dataArray['email'] = $_POST['email'];
	}

	if(isset($_POST['website'])) {
		$dataArray['website'] = $_POST['website'];
	}

	if(isset($_POST['tel'])) {
		$dataArray['tel'] = $_POST['tel'];
	}

	if(isset($_POST['streetname'])) {
		$dataArray['streetname'] = $_POST['streetname'];
	}

	if(isset($_POST['city'])) {
		$dataArray['city'] = $_POST['city'];
	}

	if(isset($_POST['postcode'])) {
		$dataArray['postcode'] = $_POST['postcode'];
	}

	// ----- Details of offerings
	if(isset($_POST['services'])) {
		$servicesArray = $_POST['services'];
	}

	if(isset($_POST['conditions'])) {
		$conditionsArray = $_POST['conditions'];
	}

	if(isset($_POST['lat'])) {
		$dataArray['lat'] = $_POST['lat'];
	}

	if(isset($_POST['lng'])) {
		$dataArray['lng'] = $_POST['lng'];
	}

	var_dump($dataArray);


?>