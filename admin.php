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
* Main Admin Panel
* Shows Links to Add New Record
* To Edit and Delete a Record got to the Individual Record page (Search.php) and it will automatically show Edit and Delete if logged in
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
		<title>Admin Panel | Virtual Library</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<section id="main">
				<header>
					<h1>Admin Panel | Virtual Library</h1>
					<hr />
				</header>
				<?php if(isset($_GET['success']) && !empty($_GET['success'])){ echo "Update Success"; }?>
				<form action="search.php" method="GET">
					<input class="LInputStyle" type="text" name="s" value="">							
					<select class="LInputStyle" name="searchBy">
						<option value="all">All Matches</option>
						<option value="ISBN">ISBN</option>
						<option value="BookName">Book Name</option>
						<option value="Author">Author Name</option>
						<option value="Publisher">Publisher Name</option>
						<option value="Sategory">Category</option>
						<option value="SubCategory">Sub Category</option>
						<option value="Keywords">Keywords</option>
					</select>
					<input class="RInputStyle" type="submit" value="Search">
				</form>
					<br />
					<hr />
				<p>To Edit or Delete, Search for the Book using the Search Bar above.</p>
				<a href="addNew.php"><button>Add New</button></a> | <a href="logout.php"><button>Logout</button></a> 
					<hr />
					<a href="index.php"><button>Home</button></a> | <a href="search.php"><button>Search</button></a>
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