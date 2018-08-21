<?php
/********************************
* Project: Virtual Library
* Code Version: 1.0
* Author: Benjamin Sommer
* GitHub: https://github.com/remmosnimajneb
* Theme Design by: HTML5 UP [HTML5UP.NET] - Theme `Identity`
* Licensing Information: CC BY-SA 4.0 (https://creativecommons.org/licenses/by-sa/4.0/)
***************************************************************************************/

/**
* Logout Page
*/
	session_start();

	$_SESSION['virtlibadmin'] = false;

	session_unset();
	session_destroy(); 

	header('Location: index.php');
?>