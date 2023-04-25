<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';//default
	$dbname = 'pt';//database name
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	//if the connection fails excecution will be stopped
	if (!$conn) {
		//capture the system defined error message and merge in with the user defined error message
	 die('Could not connect: ' . mysqli_error($conn));
	}
	//select the database
	//when the connection is successful 
	//'pt' will be selected as the current database
	mysqli_select_db($conn, $dbname);
?>