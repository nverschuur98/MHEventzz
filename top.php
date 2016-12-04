<?php
include "vars.php";
include "sessions.php";
include "functions.php";
include "database_connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page_title; ?> | MHEventzz</title>
		<link href="https://fonts.googleapis.com/css?family=Advent+Pro:100,200,400,600,700" rel="stylesheet">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Custom Style -->
		<link href="CSS/style.css" rel="stylesheet" type="text/CSS"/>
		<!-- Lightbox Style -->
		<link href="CSS/lightbox.min.css" rel="stylesheet" type="text/CSS"/>
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<link rel="apple-touch-icon" sizes="180x180" href="IMG/ICON/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="IMG/ICON/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="IMG/ICON/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="IMG/ICON/manifest.json">
		<link rel="mask-icon" href="IMG/ICON/safari-pinned-tab.svg" color="#2e2e2e">
		<link rel="shortcut icon" href="IMG/ICON/favicon.ico">
		<meta name="msapplication-TileColor" content="#1a1a1c">
		<meta name="msapplication-TileImage" content="IMG/ICON/mstile-144x144.png">
		<meta name="msapplication-config" content="IMG/ICON/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
	</head>
	<body>
		<div id="body_wrapper" class="container-fluid">
			<header class="body-item">
				<div class="logo_wrapper">
					<div class="logo"></div>
					<div class="text hidden-xs">MHEventzz</div>
				</div>
			</header>
			<nav class="body-item hidden-xs">
				<ul>
					<?php
						$full_name = $_SERVER['PHP_SELF'];
						$name_array = explode('/',$full_name);
						$count = count($name_array);
						$page_name_menu = $name_array[$count-1];
					?>
					<li class="<?php echo ($page_name_menu=='index.php')?'active':'';?>">
						<a href="index.php">Home</a>
					</li>
					<li class="<?php echo ($page_name_menu=='gallerij.php')?'active':'';?><?php echo ($page_name_menu=='gallerij_page.php')?'active':'';?>">
						<a href="gallerij.php">Galerij</a>
					</li>
					<li class="dropdown <?php echo ($page_name_menu=='nieuws.php')?'active':'';?><?php echo ($page_name_menu=='over_ons.php')?'active':'';?>">
						<a href="#"> Over ons</a>
						<div class="dropdown-content">
						  <a href="nieuws.php">Nieuws</a>
						  <a href="over_ons.php">Over ons</a>
						</div>
					</li>
					<li class="<?php echo ($page_name_menu=='contact.php')?'active':'';?>">
						<a href="contact.php">Contact</a>
					</li>
				</ul>
				<div class="search-bar">
					<form method="GET" action="search.php">
						<input type="text" name="query" placeholder="Search"></input>
						<input type="Submit" value="Search"></input>
					</form>
				</div>
			</nav>