<?php
/********************************
* Project: YNA Virtual Library
* Code Version: 1.0
* Author: Benjamin Sommer
* GitHub: https://github.com/remmosnimajneb
* Theme Design by: HTML5 UP [HTML5UP.NET] - Theme `Identity`
* Licensing Information: CC BY-SA 4.0 (https://creativecommons.org/licenses/by-sa/4.0/)
***************************************************************************************/

/*
* Main Page
*/

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Virtual Library</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<section id="main">
				<header>
					<h1>Virtual Library</h1>
					<hr />
				</header>
				<p>Search for a Book</p>
				<form action="search.php" method="GET">
					<input type="text" name="s" placeholder="Search" style="width:100%"><br />
					Search By: <select name="searchBy" style="width: 100%">
						<option value="all">All Matches</option>
						<option value="ISBN">ISBN</option>
						<option value="BookName">Book Name</option>
						<option value="Author">Author Name</option>
						<option value="Publisher">Publisher Name</option>
						<option value="Sategory">Category</option>
						<option value="SubCategory">Sub Category</option>
						<option value="Keywords">Keywords</option>
					</select><br />
					<input type="submit" value="Search">
				</form>
					<hr />
					<a href="browse.php"><button>Browse the Library</button></a>
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