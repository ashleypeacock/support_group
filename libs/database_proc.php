<?php

$host = DB_HOST;
$username = DB_USER;
$db_pass = DB_PASS;
$db_name = DB_NAME;

	$conn = new mysqli($host, $username, $db_pass, $db_name);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM charity";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
   		// output data of each row
    	while($row = $result->fetch_assoc()) {
        	echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    	}
	} else {
    	echo "0 results";
	}

	

?>