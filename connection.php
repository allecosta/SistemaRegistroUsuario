<?php

$server = "localhost";
$user = "";
$password = "";
$database = "systemUser";
$port = "3306";

$conn = mysqli_connect($server, $user, $password, $database, $port);

	if (!$conn) {

		die("Connection failed: " . mysql_connect_error());

	} else {

		echo "Connected Sucessfuly" . "<br><br>";
	} 