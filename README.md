# Virtual Library System

Project: Virtual Library System
Code Version: 1.0
Author: Benjamin Sommer
GitHub: https://github.com/remmosnimajneb
Theme Design by: HTML5 UP (HTML5UP.NET) - Theme `Identity`
Licensing Information: CC BY-SA 4.0 (https://creativecommons.org/licenses/by-sa/4.0/)

## Table of Contents:
1. Overview
2. Requirements & Install Instructions
3. Code Explanation
4. Files Explanation
5. Updates to come

## SECTION 1 - OVERVIEW

Do you have a School or Oganazation that has a library, maybe it's a small one, maybe a bigger one. Every wanted a clean way of showing off the books you have so others can use it to find books? Here you are!

With this program you can add books you own in your library and add them by physical location so anyone can (virtually) search or browse your librabry and find exact locations of each book!

This program is 100% open source, feel free to do anything you want to it! Just make sure to remember to give me some credit and make sure to ShareAlike! (For the full licence and fine text stuff see creativecommons.org/licenses/by-sa/4.0/).

Also while speaking about giving credit, the HTML theme comes from html5up.net made by @ajlkn (twitter.com/ajlkn). This guy makes siiiiick stuff, make sure to check him out at html5up.net (Free HTML5 Stunning Mobile Friendly Website Templates (Free!)), carrd.co (An Incredible website builder that looks amazing and works even better!) and his Twitter page (@ajlkn).


## SECTION 2 - REQUIRMENTS & INSTALL INSTRUCTIONS
	
Requirments:

- A web server, that can be accessed over the internet for use out of Local Area Network
- MySQL with PDO type PHP Extention (!Important!)
- PHP
- That's it

Aight, let's go! Let's install this thing already!!

Install: 

Here's how to install this:
1. Create a new MySQL Database on your server
2. Import or run the SQL commands to setup the system on the server - (File: SQLInstall.sql)
3. Open the functions file (File: functions.php) in your favorite text editor (h/t to mine Sublime Text 3) and on the MySQL connection line, add your DB Host, DB Name, MySQL Name and MySQL Password, also make sure to change the Admin Username and Admin Password.
4. Move all the files to your public directory on the server (Can exclude this file and SQLInstall.sql, everything else required)
5. Now open your browser, upon install there are 7 defualt books added (The Harry Potter Series) so there's not much to search for...
6. Navigate to https://{INSTALL_PATH}/admin.php to log into the admin panel (Login set in the functions.php, default is virtuallib and virtuallibadmin)
	7. From here you can add your books into the system
8. To Edit or Delete you need to login and find the books and it will show a delete and edit button

## SECTION 3 - CODE EXPLANATION

So for all them programmers out here, how does it work?!

Here we go:
1. Books are added into the MySQL DB and the frontend searches through all the records and outputs any matches.
	-Note I tried it wil >5000 records and the search was pretty fast, though your results might be diffrent.
2. Upon logged in the system sets a session which if you then search for books it will show an Edit and Delete button.
3. The admin panel lets you add a new book to the system
4. That's about it. It's a small system

## SECTION 5 - FILES EXPLANATION

1. functions.php - Holds MySQL DB Connection info and Admin Login Credentials
2. index.php - Landing page with Search Bar
3. search.php - Main Search page
4. browse.php - Browse the Library
5. login.php - Login Page
6. admin.php - Landing page for Admin Panel, allows to add new Book
7. addNew.php - Add New Book
8. editRecord.php - Edit Book
9. showRecord.php - Shows more information about a book 
10. proccess.php - Scripts to Add new, Edit and Delete Book
11. logout.php - Logout Page
12. assets/css/main.css - main CSS file

## SECTION 6 - FUTURE UPDATES LIST
	
- WARNING SUBJECT TO CHANGE/I MIGHT NEVER GET TO THESE!

1. Add mysql_escape_string() to Add New and Edit to support books with Titles using '
2. Bulk book uploader