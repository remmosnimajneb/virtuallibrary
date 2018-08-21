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
* Show more information on an individual record
* @param input `BookID` based on $_GET[''] in URL
* @return all information found in DB from that ID
*/

//Require Functions Page
require 'functions.php';

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Search | Virtual Library</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<section id="main">
				<header>
					<h1>Search | Virtual Library</h1>
					<hr />
				</header>
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
					<a href="index.php"><button>Home</button></a> | <a href="browse.php"><button>Browse the Library</button></a>
					<hr />
					<?php
							//Check we are searching for something!
						if($_GET['BookID'] == null || $_GET['BookID'] == ""){
							echo "Oops, please enter something to search.";
						} else {
							//Let's sanitize inputs
							$BookID = filter_var($_GET['BookID'],FILTER_SANITIZE_STRING);
							//SQL
							$sql = "SELECT * FROM `books` WHERE `BookID` LIKE '{$BookID}'";
							
							$stm = $con->prepare($sql);
							$stm->execute();
							$books = $stm->fetchAll();
							foreach ($books as $row) {
								echo "<p><u>Book Name</u>: " . $row['BookName'] . "</p>";
								echo "<p><u>ISBN</u>: " . $row['ISBN'] . "</p>";
								echo "<p><u>Author</u>: " . $row['Author'] . "</p>";
								echo "<p><u>Publisher</u>: " . $row['Publisher'] . "</p>";
								echo "<p><u>Room</u>: " . $row['Room'] . "</p>";
								echo "<p><u>Shelf</u>: " . $row['Shelf'] . "</p>";
								echo "<p><u>Book Number</u>: " . $row['BookNumber'] . "</p>";
								echo "<p><u>Category</u>: " . $row['Category'] . "</p>";
								echo "<p><u>Sub Category</u>: " . $row['SubCategory'] . "</p>";
								echo "<p><u>Keywords</u>: " . $row['Keywords'] . "</p>";
							};
						};
					?>
					<button onclick="window.history.back()">Back</button>
						<hr />
						<a href="index.php"><button>Home</button></a> | <a href="browse.php"><button>Browse the Library</button></a>
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