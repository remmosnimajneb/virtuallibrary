<?php
/********************************
* Project: Virtual Library
* Code Version: 1.0
* Author: Benjamin Sommer
* GitHub: https://github.com/remmosnimajneb
* Theme Design by: HTML5 UP [HTML5UP.NET] - Theme `Identity`
* Licensing Information: CC BY-SA 4.0 (https://creativecommons.org/licenses/by-sa/4.0/)
***************************************************************************************/

/*
* Add New Record into System
*/

//Require Functions Page
require 'functions.php';

//Start Session and check authentication
session_start();
if($_SESSION['virtlibadmin'] != true){
	header('Location: login.php');
	die();
};
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Add New | Virtual Library</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<section id="main">
				<header>
					<h1>Add New | Virtual Library</h1>
					<hr />
				</header>
				<form action="proccess.php" method="POST" class="center">
					<input type="hidden" name="action" value="addNew">
					<input type="text" name="BookName" placeholder="Book Name"><br />
					<input type="text" name="ISBN" placeholder="ISBN Number"><br />
					<input type="text" name="Author" placeholder="Author"><br />
					<input type="text" name="Publisher" placeholder="Publisher"><br />
					<input type="text" name="Room" placeholder="Room"><br /> 
					<input type="text" name="Shelf" placeholder="Shelf"><br />
					<input type="text" name="BookNumber" placeholder="Book Number"><br />
					<input type="text" name="Category" placeholder="Category"><br />
					<input type="text" name="SubCategory" placeholder="Sub-Category"><br />							
					<input type="text" name="Keywords" placeholder="Keywords"><br />
					<input type="submit" name="submit" value="Add">
				</form>
					<hr />
				<a href="admin.php"><button>Cancel</button></a>
			</section>
		</div>
		<script>
			if ('addEventListener' in window) {
				window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
				document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
			}
		</script>
	</body>
</html>