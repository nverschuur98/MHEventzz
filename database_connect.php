<?php

//create connection
$connection = new mysqli($db_servername, $db_username, $db_password, $db_name);

//Check if succeed
if($connection->connect_error){
	die("Connection failed: " . $connection->connect_error);
}
?>