<?php

function dbconnection()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pcm";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection Failed due to ->" . $conn->connect_error);
	}
	return $conn;
}
