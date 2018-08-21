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
* Login to Admin Panel
*/

//Require Functions Page
require 'functions.php';
	
//Start Sessions()
session_start();

//Assume User is logging in for first time and set the Authentication Session False
$_SESSION['virtlibadmin'] = false;

//If it's a post request, he tried logging in
$error = '';
if(isset($_POST['username']) && isset($_POST['password'])){
		//If credentials match (credentials set in functions.php), set Session, Go to admin.php
	if($_POST['username'] == $adminUsername && $_POST['password'] == $adminPassword){
		$_SESSION['virtlibadmin'] = true;
		header('Location: admin.php');
	} else {
			//Else throw an error!
		$error = "Error! Authentication Failed. Please try again!";
	}
};

header('Content-type: text/html; charset=utf-8');

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Login | Virtual Library</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<section id="main">
				<header>
					<h1>Login | Virtual Library</h1>
					<hr />
				</header>
				<?php echo $error; ?>
				<form action="login.php" method="POST">
					<input type="text" name="username" placeholder="Username" required="required" style="margin: auto;"><br />
					<input type="password" name="password" placeholder="Password" required="required" style="margin: auto;"><br />
					<input type="submit" name="Submit" value="Login">
				</form>
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