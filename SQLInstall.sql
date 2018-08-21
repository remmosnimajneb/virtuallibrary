/********************************
* Project: Virtual Library
* Code Version: 1.0
* Author: Benjamin Sommer
* GitHub: https://github.com/remmosnimajneb
* Theme Design by: HTML5 UP [HTML5UP.NET] - Theme `Identity`
* Licensing Information: CC BY-SA 4.0 (https://creativecommons.org/licenses/by-sa/4.0/)
***************************************************************************************/

-- Create DB first!

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `BookID` int(9) NOT NULL AUTO_INCREMENT,
  `BookName` varchar(200) DEFAULT NULL,
  `ISBN` varchar(30) DEFAULT NULL,
  `Author` varchar(120) DEFAULT NULL,
  `Publisher` varchar(200) DEFAULT NULL,
  `Room` varchar(100) DEFAULT NULL,
  `Shelf` varchar(100) DEFAULT NULL,
  `BookNumber` varchar(100) DEFAULT NULL,
  `Category` varchar(120) CHARACTER SET utf8mb4 DEFAULT NULL,
  `SubCategory` varchar(120) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Keywords` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`BookID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookID`, `BookName`, `ISBN`, `Author`, `Publisher`, `Room`, `Shelf`, `BookNumber`, `Category`, `SubCategory`, `Keywords`) VALUES
(1, 'Harry Potter and the Philosophers Stone', '0-7475-3269-9', 'J. K. Rowling', 'Scholastic', '1', '1', '1', 'Fanatasy', 'Magic', 'Harry, Potter, Philosopher, Stone, Magic, Hogwarts, Rowling'),
(2, 'Harry Potter and the Chamber of Secrets', '0-7475-3849-2', 'J. K. Rowling', 'Scholastic', '1', '1', '2', 'Fanatasy', 'Magic', 'Harry, Potter, Chamber, Secrets, Magic, Hogwarts, Rowling'),
(3, 'Harry Potter and the Prisoner of Azkaban', '0-7475-4215-5', 'J. K. Rowling', 'Scholastic', '1', '1', '3', 'Fanatasy', 'Magic', 'Harry, Potter, Chamber, Azkaban, Magic, Hogwarts, Rowling'),
(4, 'Harry Potter and the Goblet of Fire', '0-7475-4624-X', 'J. K. Rowling', 'Scholastic', '1', '1', '4', 'Fanatasy', 'Magic', 'Harry, Potter, Goblet, Fire, Cedric, Magic, Hogwarts, Rowling'),
(5, 'Harry Potter and the Order of the Phoenix', '0-7475-5100-6', 'J. K. Rowling', 'Scholastic', '1', '1', '5', 'Fanatasy', 'Magic', 'Harry, Potter, Order, Phoenix, Magic, Hogwarts, Rowling'),
(6, 'Harry Potter and the Half-Blood Prince', '0-7475-8108-8', 'J. K. Rowling', 'Scholastic', '1', '1', '6', 'Fanatasy', 'Magic', 'Harry, Potter, Half, Blood, Prince, Magic, Hogwarts, Rowling'),
(7, 'Harry Potter and the Deathly Hallows', '0-545-01022-5', 'J. K. Rowling', 'Scholastic', '1', '1', '7', 'Fanatasy', 'Magic', 'Harry, Potter, Deathly, Hollows, Magic, Hogwarts, Rowling');
COMMIT;