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
* Search for Records Page
* @param input Search Query and Category to search given via $_GET[''] in URL
* @return list of Records matching that Query in Selected Category
*/

//Require Functions Page
require 'functions.php';

//Start Session
session_start();

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
					<input class="LInputStyle" type="text" name="s" value="<?php echo $_GET['s'] ?>">
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
					if($_GET['s'] == null || $_GET['s'] == ""){
						echo "Oops, looks like you didn't type anything in!";
					} else {
						//Let's Sanitize Inputs
						$s = filter_var($_GET['s'],FILTER_SANITIZE_STRING);
						$cat = filter_var($_GET['searchBy'],FILTER_SANITIZE_STRING);
						
						$sql = "";
						if($cat == "all"){
							$sql = "SELECT * FROM `books` WHERE `BookName` LIKE '%{$s}%' OR `Author` LIKE '%{$s}%' OR `Publisher` LIKE '%{$s}%' OR `Category` LIKE '%{$s}%' OR `SubCategory` LIKE '%{$s}%' OR `Keywords` LIKE '%{$s}%'";
						} else {
							$sql = "SELECT * FROM `books` WHERE `" . $cat . "` LIKE '%{$s}%'";
						}	
						
						$stm = $con->prepare($sql);
						$stm->execute();
						$books = $stm->fetchAll();
						$numRows = $stm->rowCount();
						
						echo "<p>" . $numRows . " Results found for '" . $s . "' </p>";
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
				      	if(isset($_SESSION['virtlibadmin'])){ echo "<th scope='col'></th>"; };
				      ?>
				    </tr>
				  </thead>
					<?php
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
						<a href="index.php"><button>Home</button></a> | <a href="browse.php"><button>Browse the Library</button></a>
				</section>
			</div>
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>
			<script type="text/javascript">
				/*Delete Record Script*/
				/*
				* If your trying to hack...it won't work it authenticates on the other page also :(
				* But Props for trying!
				*/

				function confirmDelete(BookID){
					var check = confirm("Are you sure you want to delete this record?");
					if(check == true){
						window.location = "proccess.php?action=delete&BookID=" + BookID;
					}
				}
			</script>
	</body>
</html>