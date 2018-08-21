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
* Browse through the Records in the Library
*/

//Require Functions Page
require 'functions.php';

//Start Session
session_start();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Browse | Virtual Library</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<section id="main">
				<header>
					<h1>Browse | Virtual Library</h1>
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
						<?php
							if(!isset($_GET['category']) || empty($_GET['category'])){
								//Base Case Show Defualt
								echo "<p>Select a Category to Browse:</p>";
								
								//Parse MySQL
								$sql = "SELECT DISTINCT `Category` FROM `books` ORDER BY `Category` ASC";
								$stm = $con->prepare($sql);
								$stm->execute();
								$books = $stm->fetchAll();								
    							
    							//Output Categories
								foreach ($books as $row) {
									//Don't show a button if a Category is not given
									if($row['Category'] != ""){
										echo "<a href='browse.php?category=" . $row['Category'] . "'><button>" . $row['Category'] . "</button></a>";
									}
								}
							} else if((isset($_GET['category']) && !empty($_GET['category'])) && (!isset($_GET['subcategory']) || empty($_GET['subcategory']))){
								//If Category is Selected but No Sub Category
								echo "<p>Select a Sub-Category to Browse:</p>";

								//Parse MySQL
								$sql = "SELECT DISTINCT `SubCategory` FROM `books` ORDER BY `SubCategory` ASC";
								$stm = $con->prepare($sql);
								$stm->execute();
								$books = $stm->fetchAll();
								
    							//Output Categories
								foreach ($books as $row) {
									if($row['SubCategory'] != ""){
										echo "<a href='browse.php?category=" . $_GET['category'] . "&subcategory=" . $row['SubCategory'] . "'><button>" . $row['SubCategory'] . "</button></a>";
									}
								}

								//Manually Add "All"
								echo "<br /><br /><a href='browse.php?category=" . $_GET['category'] . "&subcategory=all'><button>All Sub-Categories</button></a>";
							} else if((isset($_GET['category']) && !empty($_GET['category'])) && (isset($_GET['subcategory']) && !empty($_GET['subcategory']))){
								//Else show All Book in that Category and SubCategory


								//Let's Sanitize Inputs
								$category = filter_var($_GET['category'],FILTER_SANITIZE_STRING);
								$subcategory = filter_var($_GET['subcategory'],FILTER_SANITIZE_STRING);

								$sql = "";

								//Check if SubCat is "All"
								if($subcategory == "all"){
									$sql = "SELECT * FROM `books` WHERE `Category` LIKE '" . $category . "'";
								} else {
									$sql = "SELECT * FROM `books` WHERE `Category` LIKE '" . $category . "' AND `SubCategory` LIKE '" . $subcategory . "'";
								}

								$stm = $con->prepare($sql);
								$stm->execute();
								$books = $stm->fetchAll();
								$numRows = $stm->rowCount();
						?>

						<table>
						  <caption>Results:</caption>
						  <thead>
						    <tr>
						      <th scope="col">Book Title</th>
						      <th scope="col">Author</th>
						      <th scope="col">Room</th>
						      <th scope="col">Shelf</th>
						      <th scope="col">Book Number</th>
						      <th scope="col">Category</th>
						      <th scope="col">Sub-Category</th>
						      <th scope="col"></th>
						      <?php
						      	//Extra Row for Delete (If Admin Logged In)
						      	if($_SESSION['virtlibadmin']){ echo "<th scope='col'></th>"; };
						      ?>
						    </tr>
						  </thead>
							<?php
									//Check for Empty Results
								if($numRows > 0){
									echo "<p>" . $numRows . " Results found matching.</p>";
								} else {
									echo "Oops looks like we couldn't find anything with these Categories!";
								}

									//Output all Rows into Table Format
								foreach ($books as $row) {
									echo "<tr>";
									echo "<td data-label='Book Title'>" . $row['BookName'] . "</td>";
									echo "<td data-label='Author'>" . $row['Author'] . "</td>";
									echo "<td data-label='Room'>" . $row['Room'] . "</td>";
									echo "<td data-label='Shelf'>" . $row['Shelf'] . "</td>";
									echo "<td data-label='Book Number'>" . $row['BookNumber'] . "</td>";
									echo "<td data-label='Category'>" . $row['Category'] . "</td>";
									echo "<td data-label='Sub-Category'>" . $row['SubCategory'] . "</td>";

										//If Admin Logged in Show a Edit and Delete Option
									if($_SESSION['virtlibadmin']){ 
										echo "<td data-label=''><a href='editRecord.php?BookID=" . $row['BookID'] . "'>Edit</a></td>"; 
										echo "<td data-label='' onclick='confirmDelete(" . $row['BookID'] . ")'>Delete</td>";
									} else {
										//Otherwise show a More Info Button
										echo "<td data-label=''><a href='showRecord.php?BookID=" . $row['BookID'] . "'>More Info</a></td>";
									}
									echo "</tr>";
								}; //End ForEach();

								echo "</tbody></table>";
							}; //End Else();
					?>
					<hr />
					<a href="index.php"><button>Home</button></a> | <a href="index.php"><button>Search</button></a>
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