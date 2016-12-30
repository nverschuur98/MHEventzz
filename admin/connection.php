<?php
//the vars
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "mhadmin";

//establish the connection to the database
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

//Check if succeed
if($conn->connect_error){
	die("Connection to database failed: " . $conn->connect_error);
}

?>