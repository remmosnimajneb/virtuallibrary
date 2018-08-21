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
* Proccess commands for manipulating Records
* Add a New Record, Edit a Record and Delete Record
*/

//Require Functions Page
require 'functions.php';

//Start Session and check authentication
session_start();
if($_SESSION['virtlibadmin'] != true){
	header('Location: login.php');
	die();
};

//Get what we're doing based on  $_GET['action'] or $_POST['action']
$action = $_REQUEST['action'] ?: NULL;

$sql = "";

switch ($action) {
	case 'addNew':
		$sql = "INSERT INTO `books` (BookName, ISBN, Author, Publisher, Room, Shelf, BookNumber, Category, SubCategory, Keywords) VALUES ('" . $_POST['BookName'] . "', '" . $_POST['ISBN'] . "', '" . $_POST['Author'] . "', '" . $_POST['Publisher'] . "', '" . $_POST['Room'] . "', '" . $_POST['Shelf'] . "', '" . $_POST['BookNumber'] . "', '" . $_POST['Category'] . "', '" . $_POST['SubCategory'] . "', '" . $_POST['Keywords'] . "')";
		echo $sql;
		break;

	case 'delete':
		//Delete Record From MySQL
		$sql = "DELETE FROM `books` WHERE `BookID` = " . filter_var($_GET['BookID'],FILTER_SANITIZE_STRING);
		break;

	case 'editRecord':
		$sql = "UPDATE `books` SET `BookName` = '" . $_POST['BookName'] . "', `ISBN` = '" . $_POST['ISBN'] . "', `Author` = '" . $_POST['Author'] . "', `Publisher` = '" . $_POST['Publisher'] . "', `Room` = '" . $_POST['Room'] . "', `Shelf` = '" . $_POST['Shelf'] . "', `BookNumber` = '" . $_POST['BookNumber'] . "', `Category` = '" . $_POST['Category'] . "', `SubCategory` = '" . $_POST['SubCategory'] . "', `Keywords` = '" . $_POST['Keywords'] . "' WHERE `BookID` = " . $_POST['BookID'];
	break;
}

$stm = $con->prepare($sql);
$stm->execute();
if($stm){
	header('Location: admin.php?success=true');
}
?>