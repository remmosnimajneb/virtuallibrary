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
* Edit a Record in System
* @param input `BookID` based on $_GET[''] in URL
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
		<title>Edit Record | Virtual Library</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<section id="main">
				<header>
					<h1>Edit Record | Virtual Library</h1>
					<hr />
				</header>
				<form action="proccess.php" method="POST" class="center">
					<?php
						//Pull all info from DB based on that BookID
						$sql = "SELECT * FROM `books` WHERE `BookID` = " . filter_var($_GET['BookID'],FILTER_SANITIZE_STRING);
						$stm = $con->prepare($sql);
						$stm->execute();
						$books = $stm->fetchAll();
						foreach ($books as $row) {
					?>
					<input type="hidden" name="action" value="editRecord">
					<input type="hidden" name="BookID" value="<?php echo filter_var($_GET['BookID'],FILTER_SANITIZE_STRING); ?>">
					<input type="text" name="BookName" placeholder="Book Name" value="<?php echo $row['BookName']; ?>"><br />
					<input type="text" name="ISBN" placeholder="ISBN Number" value="<?php echo $row['ISBN']; ?>"><br />
					<input type="text" name="Author" placeholder="Author" value="<?php echo $row['Author']; ?>"><br />
					<input type="text" name="Publisher" placeholder="Publisher" value="<?php echo $row['Publisher']; ?>"><br />
					<input type="text" name="Room" placeholder="Room" value="<?php echo $row['Room']; ?>"><br /> 
					<input type="text" name="Shelf" placeholder="Shelf" value="<?php echo $row['Shelf']; ?>"><br />
					<input type="text" name="BookNumber" placeholder="Book Number" value="<?php echo $row['BookNumber']; ?>"><br />
					<input type="text" name="Category" placeholder="Category" value="<?php echo $row['Category']; ?>"><br />
					<input type="text" name="SubCategory" placeholder="Sub-Category" value="<?php echo $row['SubCategory']; ?>"><br />	
					<input type="text" name="Keywords" placeholder="Keywords" value="<?php echo $row['Keywords']; ?>"><br />
					<input type="submit" name="submit" value="Edit">
					<?php
						}//End ForEach();
					?>
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