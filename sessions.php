<?php

session_start();

if(!isset($_SESSION['signed_in'])){
	$_SESSION['signed_in'] = false;
}

if(!isset($_SESSION['no_aside'])){
	$_SESSION['no_aside'] = false;
}else{
	$_SESSION['no_aside'] = false;
}

if(!isset($_SESSION['user_level'])){
	$_SESSION['user_level'] = false;
}

/*Declared on sign_in.php
	$_SESSION['user_id']
	$_SESSION['user_name']
	$_SESSION['user_level']
*/
?>