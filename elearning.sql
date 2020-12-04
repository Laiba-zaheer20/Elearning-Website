-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 08:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminId` int(11) NOT NULL,
  `AdminName` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CityId` int(11) NOT NULL,
  `CityName` varchar(20) DEFAULT NULL,
  `CountryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CityId`, `CityName`, `CountryId`) VALUES
(1, 'Karachi', 1),
(2, 'Lahore', 1),
(3, 'Islamabad', 1),
(5, 'Mumbai', 2),
(10, 'Chennai', 2),
(11, 'Jaipur', 2),
(12, 'Wuhan', 3),
(13, 'Beijing', 3),
(14, 'Shanghai', 3),
(15, 'London', 4),
(16, 'Manchester', 4),
(17, 'Birmingham', 4);

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `ComplainId` int(11) NOT NULL,
  `Complain` varchar(250) DEFAULT NULL,
  `RegId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryId` int(11) NOT NULL,
  `CountryName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryId`, `CountryName`) VALUES
(1, 'Pakistan'),
(2, 'India'),
(3, 'China'),
(4, 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `courseoffereds`
--

CREATE TABLE `courseoffereds` (
  `Covid` int(11) NOT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Fees` int(11) DEFAULT NULL,
  `Demo` varchar(50) DEFAULT NULL,
  `CourseId` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseId` int(11) NOT NULL,
  `CourseName` varchar(50) DEFAULT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseId`, `CourseName`, `StatusId`) VALUES
(1, 'Mathematics', 1),
(2, 'Physics', 1),
(3, 'Chemistry', 1),
(4, 'English', 1),
(5, 'Urdu', 1),
(6, 'Islamiyat', 1),
(7, 'Pakistan Studies', 1),
(8, 'Biology', 1),
(9, 'Science', 1),
(10, 'Computer Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `datas`
--

CREATE TABLE `datas` (
  `QId` int(11) NOT NULL,
  `FieldId` int(11) NOT NULL,
  `InstituteId` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `DayId` int(11) NOT NULL,
  `Days` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`DayId`, `Days`) VALUES
(1, 'Work Days'),
(2, 'Weekend'),
(3, 'Mon/Tues/Wed'),
(4, 'Thurs/Fri/Sat'),
(5, 'Mon/Wed/Fri'),
(6, 'Tues/Thurs/Sat'),
(7, 'Monday'),
(8, 'Tuesday'),
(9, 'Wednesday'),
(10, 'Thursday'),
(11, 'Friday'),
(12, 'Saturday'),
(13, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `FeedbackId` int(11) NOT NULL,
  `Feedback` varchar(250) DEFAULT NULL,
  `RegId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fieldss`
--

CREATE TABLE `fieldss` (
  `FieldId` int(11) NOT NULL,
  `Field` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fieldss`
--

INSERT INTO `fieldss` (`FieldId`, `Field`) VALUES
(1, 'Science'),
(2, 'Arts'),
(3, 'Engineering'),
(4, 'Medical'),
(5, 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `InstituteId` int(11) NOT NULL,
  `Institute` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`InstituteId`, `Institute`) VALUES
(1, 'NUCES FAST '),
(2, 'NUST'),
(3, 'NED'),
(4, 'Karachi University');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `MarksId` int(11) NOT NULL,
  `Marks` int(11) DEFAULT NULL,
  `RegId` int(11) NOT NULL,
  `QuizId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `QId` int(11) NOT NULL,
  `Qualification` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`QId`, `Qualification`) VALUES
(1, 'Matriculation'),
(2, 'Intermediate'),
(3, 'Undergraduate'),
(4, 'Graduate'),
(5, 'Master'),
(6, 'Master'),
(7, 'PhD'),
(8, 'Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `QuizId` int(11) NOT NULL,
  `QuizName` varchar(100) DEFAULT NULL,
  `Covid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `RegId` int(11) NOT NULL,
  `TIME` date DEFAULT NULL,
  `StudentId` int(11) NOT NULL,
  `Covid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `statuss`
--

CREATE TABLE `statuss` (
  `StatusId` int(11) NOT NULL,
  `Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statuss`
--

INSERT INTO `statuss` (`StatusId`, `Status`) VALUES
(1, 'Pending'),
(2, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentId` int(11) NOT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `PhoneNo` int(11) DEFAULT NULL,
  `AlternativeNo` int(11) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `CityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentId`, `FirstName`, `LastName`, `Email`, `PhoneNo`, `AlternativeNo`, `Address`, `CityId`) VALUES
(0, 'Osbaldo', 'Green', 'aufderhar.charity@example.org', 0, 1147917097, '0298 Zoie Centers Suite 113\nRaheemside, DC 97710', 1),
(2, 'Vince', 'Bins', 'reyna.bednar@example.org', 346789, 243, '54404 Lacy Garden\nWest Taya, NE 42287', 14),
(3, 'Lisa', 'Mitchell', 'mo\'reilly@example.net', 1, 0, '30523 Webster Mountain Suite 745\nNew Arlo, DE 9170', 11),
(4, 'Electa', 'Stehr', 'dietrich.donnie@example.net', 91443, 0, '46011 Raina Ports Suite 554\nJaleelburgh, MA 72235', 10),
(5, 'Zaria', 'Walsh', 'zcorwin@example.net', 513546, 607, '52912 Crona Springs\nRozellaberg, NM 73033-6432', 5),
(6, 'Norris', 'Roob', 'o\'connell.peter@example.com', 1, 0, '61525 Elmo Crescent\nDaughertychester, CO 79939', 3),
(7, 'Joanne', 'Weimann', 'percy33@example.org', 4, 0, '13214 Moses Corners\nNorth Guido, CO 76456', 2),
(8, 'Joany', 'Ankunding', 'vgreenholt@example.org', 191399, 0, '444 Yundt Course\nCarmelaborough, TX 95807-4832', 1),
(9, 'Lukas', 'Weber', 'wiza.noble@example.org', 72, 0, '6086 Cummerata Junctions Suite 967\nLitteltown, RI ', 17),
(10, 'Penelope', 'Pollich', 'patricia70@example.org', 311, 894, '1809 Eldora Parkway\nCarrollburgh, MD 18576', 16),
(11, 'Sheridan', 'Casper', 'alayna06@example.org', 1, 0, '206 Gibson Manor\nNew Antoinettechester, CA 11215-8', 15),
(12, 'Brennon', 'Hegmann', 'harmon97@example.net', 663, 0, '836 Herman Street\nPort Lancefurt, FL 91610-1050', 14),
(13, 'Thaddeus', 'Swaniawski', 'justina89@example.org', 39, 209386, '547 Harber Square\nEast Christina, CA 28646-9836', 13),
(14, 'Colton', 'Collier', 'meichmann@example.org', 2147483647, 1, '40808 Price Viaduct Suite 181\nPort Antonia, TX 204', 12),
(15, 'Wendy', 'Collins', 'arvid.dubuque@example.net', 165, 1, '1953 Schaden Place Suite 599\nWest Lulatown, DC 272', 11),
(16, 'Davion', 'Glover', 'kaleb.toy@example.com', 2147483647, 0, '9012 Eichmann Cove\nNorth Tad, CO 72583-9159', 10),
(17, 'Eliseo', 'Nitzsche', 'qhaley@example.org', 0, 1, '2116 Phyllis Branch Suite 271\nCrooksville, WA 3845', 5),
(18, 'Jermey', 'Hahn', 'king.muhammad@example.com', 74, 0, '4179 Howell Mountains Suite 089\nMartinaberg, KS 92', 3),
(19, 'Casey', 'Wyman', 'kunde.hertha@example.net', 83814, 238, '1289 Kaycee Vista Apt. 875\nWolffborough, DE 00442-', 2),
(20, 'Isabelle', 'Beier', 'mariam96@example.com', 0, 0, '83231 Obie Center Apt. 409\nBreannaview, DC 49852-6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherId` int(11) NOT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `PhoneNo` int(11) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `About` varchar(250) DEFAULT NULL,
  `StartTime` date DEFAULT NULL,
  `EndTime` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Method` int(11) DEFAULT NULL,
  `CityId` int(11) NOT NULL,
  `DayId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TeacherId`, `FirstName`, `LastName`, `Email`, `PhoneNo`, `Address`, `About`, `StartTime`, `EndTime`, `Gender`, `Method`, `CityId`, `DayId`) VALUES
(1, 'Kallie', 'Medhurst', 'aylin.zulauf@example.com', 1, '12347 Carolanne Well\nPort Dameonberg, NM 60586-753', 'Mozilla/5.0 (X11; Linuxi686; rv:6.0) Gecko/20120714 Firefox/3.8', '0000-00-00', '0000-00-00', 'male', 2, 2, 4),
(2, 'Estell', 'Beahan', 'sbraun@example.net', 322, '321 Yadira Fords Apt. 790\nWest Carolina, WV 50817-', 'Mozilla/5.0 (X11; Linuxi686; rv:5.0) Gecko/20200922 Firefox/11.0', '0000-00-00', '0000-00-00', 'female', 2, 13, 12),
(3, 'Karina', 'Swaniawski', 'jeramie.hayes@example.com', 0, '0428 Chloe Vista\nRohanstad, OK 93437', 'Mozilla/5.0 (Windows NT 6.1; en-US; rv:1.9.1.20) Gecko/20171103 Firefox/12.0', '0000-00-00', '0000-00-00', 'male', 2, 11, 10),
(4, 'Julia', 'Stamm', 'anabelle.lynch@example.org', 1, '5312 Bruen Shore Suite 030\nLake Tyrel, IL 30278-18', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_9 rv:5.0) Gecko/20160903 Firefox/11.0', '0000-00-00', '0000-00-00', 'female', 1, 5, 2),
(5, 'Ahmed', 'Mante', 'juliana.feest@example.org', 2147483647, '492 Muller Stream\nDexterborough, RI 39827', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_0 rv:3.0) Gecko/20160114 Firefox/3.6.4', '0000-00-00', '0000-00-00', 'male', 2, 2, 9),
(6, 'Myra', 'Boyer', 'mikayla.brakus@example.org', 0, '432 Marvin Ports Apt. 945\nShanahanview, OK 35782-2', 'Mozilla/5.0 (Windows NT 5.2; sl-SI; rv:1.9.1.20) Gecko/20200801 Firefox/9.0', '0000-00-00', '0000-00-00', 'female', 1, 12, 13),
(7, 'Eda', 'Schinner', 'wolf.margarita@example.net', 1, '737 Murazik Village Apt. 224\nRobynmouth, AK 86294-', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_1 rv:3.0) Gecko/20131011 Firefox/7.0', '0000-00-00', '0000-00-00', 'male', 2, 11, 5),
(8, 'Lorna', 'Kovacek', 'terry88@example.net', 66, '46024 Aliza Ways Apt. 158\nPredovicton, OR 55432-66', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3 rv:4.0) Gecko/20160716 Firefox/3.8', '0000-00-00', '0000-00-00', 'female', 2, 12, 10),
(9, 'Mathilde', 'Larkin', 'edward82@example.org', 0, '8636 Lacy Avenue\nWest Gina, NM 23888-0748', 'Mozilla/5.0 (X11; Linuxx86_64; rv:5.0) Gecko/20180316 Firefox/5.0', '0000-00-00', '0000-00-00', 'male', 2, 2, 11),
(10, 'Adriana', 'Conn', 'hjerde@example.com', 0, '45068 Strosin Walks\nLake Kody, SD 10966-6451', 'Mozilla/5.0 (Windows NT 6.0; en-US; rv:1.9.2.20) Gecko/20110212 Firefox/4.0', '0000-00-00', '0000-00-00', 'female', 1, 5, 9),
(11, 'Annabelle', 'Kessler', 'jayce38@example.org', 2147483647, '793 Jordon Square Suite 417\nWest Maurice, UT 19880', 'Mozilla/5.0 (Windows NT 5.0; sl-SI; rv:1.9.2.20) Gecko/20200615 Firefox/3.8', '0000-00-00', '0000-00-00', 'male', 1, 2, 5),
(12, 'Brock', 'Feeney', 'eryn.marvin@example.org', 212, '465 Destin Stream Apt. 843\nEast Nataliestad, WY 07', 'Mozilla/5.0 (Windows 98; Win 9x 4.90; en-US; rv:1.9.0.20) Gecko/20190316 Firefox/3.6.13', '0000-00-00', '0000-00-00', 'female', 2, 3, 12),
(13, 'Sydni', 'Barrows', 'ortiz.max@example.net', 0, '1724 Smith Glen\nMurazikfurt, OH 57964-6236', 'Mozilla/5.0 (Windows NT 6.2; sl-SI; rv:1.9.2.20) Gecko/20120329 Firefox/3.8', '0000-00-00', '0000-00-00', 'male', 2, 15, 10),
(14, 'Durward', 'Champlin', 'nova.heller@example.com', 1, '20944 Verda Ridge Suite 762\nAlphonsoberg, AL 26398', 'Mozilla/5.0 (Windows NT 5.01; en-US; rv:1.9.0.20) Gecko/20111225 Firefox/9.0', '0000-00-00', '0000-00-00', 'female', 2, 14, 10),
(15, 'Milford', 'Botsford', 'frolfson@example.net', 1, '4950 Rosalinda Ports Apt. 872\nNorth Meagan, OR 866', 'Mozilla/5.0 (Windows NT 4.0; en-US; rv:1.9.0.20) Gecko/20130829 Firefox/3.6.17', '0000-00-00', '0000-00-00', 'male', 2, 12, 9),
(16, 'Edwardo', 'Nicolas', 'sawayn.dolly@example.net', 1, '2131 Gislason Circle\nNorth Al, NM 33013-0864', 'Mozilla/5.0 (X11; Linuxi686; rv:5.0) Gecko/20151004 Firefox/3.6.19', '0000-00-00', '0000-00-00', 'male', 2, 2, 1),
(17, 'Vance', 'Klein', 'barton17@example.net', 0, '167 Bosco Mission Suite 678\nStehrhaven, NM 56236', 'Mozilla/5.0 (X11; Linuxx86_64; rv:7.0) Gecko/20110105 Firefox/3.8', '0000-00-00', '0000-00-00', 'male', 2, 5, 9),
(18, 'Zoie', 'Parker', 'torp.lynn@example.net', 79714, '1426 Bennett Square\nNew Chelseyhaven, MO 17851-080', 'Mozilla/5.0 (X11; Linuxx86_64; rv:6.0) Gecko/20110411 Firefox/8.0', '0000-00-00', '0000-00-00', 'female', 2, 5, 3),
(19, 'Cicero', 'Zemlak', 'bruce.turner@example.com', 1, '5063 Lang Grove\nRutherfordfurt, VA 39700-4468', 'Mozilla/5.0 (X11; Linuxi686; rv:7.0) Gecko/20180209 Firefox/3.6.13', '0000-00-00', '0000-00-00', 'female', 2, 5, 13),
(20, 'Miracle', 'Jenkins', 'destin.reichel@example.com', 1, '929 Satterfield Road\nSwiftville, PA 61791-8821', 'Mozilla/5.0 (X11; Linuxi686; rv:5.0) Gecko/20190130 Firefox/3.6.5', '0000-00-00', '0000-00-00', 'female', 1, 2, 6),
(21, 'Jaquan', 'Fadel', 'mraz.jake@example.org', 1, '1762 Sandrine Lock\nEast Mae, PA 73772', 'Mozilla/5.0 (X11; Linuxi686; rv:5.0) Gecko/20201203 Firefox/14.0', '0000-00-00', '0000-00-00', 'male', 1, 3, 4),
(22, 'Ramon', 'Oberbrunner', 'cristina15@example.net', 721995, '88481 Carter Vista Apt. 711\nNarcisoport, OK 91553', 'Mozilla/5.0 (X11; Linuxi686; rv:5.0) Gecko/20130612 Firefox/3.8', '0000-00-00', '0000-00-00', 'male', 2, 5, 4),
(23, 'Hosea', 'Macejkovic', 'jraynor@example.org', 155859, '33794 Bogan Rest Apt. 844\nCartershire, OR 60727', 'Mozilla/5.0 (Windows NT 5.2; en-US; rv:1.9.1.20) Gecko/20120908 Firefox/3.6.1', '0000-00-00', '0000-00-00', 'male', 2, 12, 2),
(24, 'Rico', 'Jerde', 'alice.stiedemann@example.net', 0, '498 Porter Burg\nCydneyfort, WA 17288-6501', 'Mozilla/5.0 (X11; Linuxi686; rv:5.0) Gecko/20200926 Firefox/3.6.4', '0000-00-00', '0000-00-00', 'male', 2, 17, 7),
(25, 'Elenor', 'McClure', 'schiller.reyna@example.net', 305445, '0863 Mariano Shore\nLake Kayleigh, CO 57865-5815', 'Mozilla/5.0 (X11; Linuxi686; rv:7.0) Gecko/20130811 Firefox/3.6.7', '0000-00-00', '0000-00-00', 'male', 2, 13, 12),
(26, 'Agustina', 'Hettinger', 'norwood45@example.net', 879597, '853 Darrick Squares Suite 016\nElwynton, OH 39254-8', 'Mozilla/5.0 (X11; Linuxi686; rv:5.0) Gecko/20100103 Firefox/3.8', '0000-00-00', '0000-00-00', 'female', 2, 5, 2),
(27, 'Cyrus', 'Okuneva', 'yemmerich@example.com', 0, '576 Mosciski Drive Suite 201\nEast Annamarie, SC 16', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_8_8 rv:6.0) Gecko/20201109 Firefox/15.0', '0000-00-00', '0000-00-00', 'female', 2, 11, 4),
(28, 'Reina', 'Balistreri', 'pfay@example.org', 839357, '4576 Kerluke Turnpike Apt. 865\nQuinnville, AR 1692', 'Mozilla/5.0 (Windows NT 4.0; sl-SI; rv:1.9.2.20) Gecko/20161129 Firefox/3.6.17', '0000-00-00', '0000-00-00', 'male', 1, 15, 4),
(29, 'Wilson', 'Corkery', 'rosalinda.raynor@example.org', 1, '4757 Madelynn Union Suite 550\nProsaccoborough, ID ', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_6 rv:5.0) Gecko/20200617 Firefox/3.8', '0000-00-00', '0000-00-00', 'male', 1, 12, 5),
(30, 'Ned', 'Mayert', 'amari.morar@example.com', 871, '5028 McClure Trace Suite 346\nEast Elmore, OH 50567', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_8_7 rv:2.0) Gecko/20101211 Firefox/3.8', '0000-00-00', '0000-00-00', 'male', 2, 2, 5),
(31, 'Lessie', 'Price', 'wilfredo99@example.net', 374, '244 Cleve Rest Suite 769\nNorth Dannie, MO 00568', 'Mozilla/5.0 (Windows NT 4.0; en-US; rv:1.9.0.20) Gecko/20181230 Firefox/3.6.18', '0000-00-00', '0000-00-00', 'male', 2, 3, 12),
(32, 'Uriel', 'Ebert', 'eveline63@example.net', 0, '3888 Gaetano Islands\nNorth Lavern, NJ 62953', 'Mozilla/5.0 (Windows NT 5.01; en-US; rv:1.9.2.20) Gecko/20170619 Firefox/3.8', '0000-00-00', '0000-00-00', 'female', 2, 3, 2),
(33, 'Carley', 'Stoltenberg', 'lacy58@example.org', 81, '4308 Adeline Place\nPort Lera, ME 17433', 'Mozilla/5.0 (X11; Linuxx86_64; rv:6.0) Gecko/20131228 Firefox/3.8', '0000-00-00', '0000-00-00', 'female', 2, 12, 1),
(34, 'Leatha', 'Feeney', 'moore.crystel@example.net', 423596, '740 Crona Fords Apt. 203\nSouth Marieshire, OH 0442', 'Mozilla/5.0 (Windows 98; Win 9x 4.90; sl-SI; rv:1.9.1.20) Gecko/20110316 Firefox/14.0', '0000-00-00', '0000-00-00', 'female', 2, 17, 2),
(35, 'Mitchell', 'Greenholt', 'kuvalis.gabe@example.org', 0, '779 Wiza Pines\nEast Claude, ND 21258', 'Mozilla/5.0 (Windows 98; Win 9x 4.90; en-US; rv:1.9.1.20) Gecko/20101222 Firefox/3.6.5', '0000-00-00', '0000-00-00', 'femlae', 2, 15, 3),
(36, 'Silas', 'Rolfson', 'michael36@example.org', 26, '8885 Valerie River\nNew Wyman, IL 04358-8818', 'Mozilla/5.0 (Windows NT 5.0; en-US; rv:1.9.0.20) Gecko/20151121 Firefox/3.8', '0000-00-00', '0000-00-00', 'female', 1, 12, 3),
(37, 'Kristopher', 'Lakin', 'rolfson.hailie@example.org', 0, '819 Lamont Corner\nNew Kip, SD 66523-7458', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_5_1 rv:4.0) Gecko/20200719 Firefox/3.8', '0000-00-00', '0000-00-00', 'female', 1, 5, 5),
(38, 'Serenity', 'Barrows', 'coby05@example.com', 1, '3065 Perry Springs\nBrodyville, NV 17044-6202', 'Mozilla/5.0 (Windows 95; en-US; rv:1.9.0.20) Gecko/20120520 Firefox/3.8', '0000-00-00', '0000-00-00', 'male', 2, 13, 1),
(39, 'Benny', 'Hagenes', 'quigley.elvera@example.org', 424, '70045 Terry Rapid\nNew Darlene, CA 75270-0146', 'Mozilla/5.0 (Windows NT 5.01; sl-SI; rv:1.9.2.20) Gecko/20170823 Firefox/9.0', '0000-00-00', '0000-00-00', 'male', 1, 12, 12),
(40, 'Loy', 'Crist', 'wiza.brice@example.net', 0, '20094 Thiel Causeway Apt. 763\nEast Nathanielfurt, ', 'Mozilla/5.0 (Windows NT 4.0; sl-SI; rv:1.9.2.20) Gecko/20111214 Firefox/3.8', '0000-00-00', '0000-00-00', 'female', 2, 11, 10),
(41, 'Kobe', 'Kuhic', 'vkerluke@example.net', 0, '7077 Grimes Throughway\nElizabethside, DC 88834-137', 'Mozilla/5.0 (X11; Linuxx86_64; rv:5.0) Gecko/20140128 Firefox/3.8', '0000-00-00', '0000-00-00', 'female', 2, 11, 11),
(42, 'Adelia', 'Klocko', 'destinee43@example.net', 612504, '86853 Russel Vista\nBinstown, PA 01633', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_8 rv:5.0) Gecko/20200722 Firefox/3.6.8', '0000-00-00', '0000-00-00', 'femlae', 2, 1, 4),
(43, 'Adrain', 'Grady', 'myles.mayer@example.org', 0, '7886 Ben Courts\nAlvertatown, AZ 50598', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_1 rv:3.0) Gecko/20140902 Firefox/3.6.9', '0000-00-00', '0000-00-00', 'female', 2, 1, 13),
(44, 'Caleigh', 'Boyer', 'alfreda43@example.com', 885802, '9377 Runte Pass\nNorth Ward, NM 96987', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_7_6 rv:5.0) Gecko/20191114 Firefox/3.8', '0000-00-00', '0000-00-00', 'female', 1, 13, 8),
(45, 'Tremaine', 'Kilback', 'durgan.garrett@example.com', 586, '886 Lorena Center\nJimmyside, KY 66174', 'Mozilla/5.0 (X11; Linuxx86_64; rv:6.0) Gecko/20200423 Firefox/3.6.1', '0000-00-00', '0000-00-00', 'female', 1, 14, 6),
(46, 'Vidal', 'Stracke', 'delta.considine@example.net', 300205, '73956 Kianna Roads Suite 229\nLake Earnestineport, ', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_0 rv:6.0) Gecko/20161014 Firefox/3.6.13', '0000-00-00', '0000-00-00', 'female', 1, 14, 1),
(47, 'Dino', 'Stamm', 'kunde.jacklyn@example.net', 1, '5668 Christopher Hills\nPort Dusty, GA 68621-9612', 'Mozilla/5.0 (Windows 98; Win 9x 4.90; en-US; rv:1.9.2.20) Gecko/20161015 Firefox/3.6.18', '0000-00-00', '0000-00-00', 'male', 1, 17, 7),
(48, 'Adrianna', 'Stroman', 'jayde01@example.com', 496110, '785 Fidel Alley Apt. 093\nVonton, CO 65899', 'Mozilla/5.0 (Windows NT 6.2; sl-SI; rv:1.9.1.20) Gecko/20110301 Firefox/3.6.7', '0000-00-00', '0000-00-00', 'male', 2, 14, 11),
(49, 'Lisandro', 'Hand', 'erika93@example.com', 1, '4478 Gerhold Radial\nWest Aurore, NC 78276-3521', 'Mozilla/5.0 (Windows NT 5.2; sl-SI; rv:1.9.0.20) Gecko/20120915 Firefox/7.0', '0000-00-00', '0000-00-00', 'male', 2, 17, 1),
(50, 'Virgie', 'Watsica', 'slemke@example.org', 159631, '34822 Peyton Estate Suite 386\nBuckridgefort, HI 86', 'Mozilla/5.0 (X11; Linuxi686; rv:6.0) Gecko/20170617 Firefox/3.8', '0000-00-00', '0000-00-00', 'male', 1, 10, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CityId`),
  ADD KEY `Cities_Country_FK` (`CountryId`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`ComplainId`),
  ADD KEY `Complains_Registration_FK` (`RegId`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `courseoffereds`
--
ALTER TABLE `courseoffereds`
  ADD PRIMARY KEY (`Covid`),
  ADD KEY `CourseOffereds_Course_FK` (`CourseId`),
  ADD KEY `CourseOffereds_Status_FK` (`StatusId`),
  ADD KEY `CourseOffereds_Teacher_FK` (`TeacherId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseId`),
  ADD KEY `Courses_Status_FK` (`StatusId`);

--
-- Indexes for table `datas`
--
ALTER TABLE `datas`
  ADD KEY `Datas_Field_FK` (`FieldId`),
  ADD KEY `Datas_Institute_FK` (`InstituteId`),
  ADD KEY `Datas_Qualification_FK` (`QId`),
  ADD KEY `Datas_Teacher_FK` (`TeacherId`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`DayId`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`FeedbackId`),
  ADD KEY `Feedbacks_Registration_FK` (`RegId`);

--
-- Indexes for table `fieldss`
--
ALTER TABLE `fieldss`
  ADD PRIMARY KEY (`FieldId`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`InstituteId`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`MarksId`),
  ADD KEY `Marks_Quiz_FK` (`QuizId`),
  ADD KEY `Marks_Registration_FK` (`RegId`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`QId`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`QuizId`),
  ADD KEY `Quizes_CourseOffered_FK` (`Covid`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`RegId`),
  ADD KEY `Registrations_CourseOffered_FK` (`Covid`),
  ADD KEY `Registrations_Student_FK` (`StudentId`);

--
-- Indexes for table `statuss`
--
ALTER TABLE `statuss`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentId`),
  ADD KEY `Students_City_FK` (`CityId`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeacherId`),
  ADD KEY `Teachers_City_FK` (`CityId`),
  ADD KEY `Teachers_Days_FK` (`DayId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `ComplainId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CountryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courseoffereds`
--
ALTER TABLE `courseoffereds`
  MODIFY `Covid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `DayId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `FeedbackId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fieldss`
--
ALTER TABLE `fieldss`
  MODIFY `FieldId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `InstituteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `MarksId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `QId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `QuizId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `RegId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuss`
--
ALTER TABLE `statuss`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `Cities_Country_FK` FOREIGN KEY (`CountryId`) REFERENCES `countries` (`CountryId`);

--
-- Constraints for table `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `Complains_Registration_FK` FOREIGN KEY (`RegId`) REFERENCES `registrations` (`RegId`);

--
-- Constraints for table `courseoffereds`
--
ALTER TABLE `courseoffereds`
  ADD CONSTRAINT `CourseOffereds_Course_FK` FOREIGN KEY (`CourseId`) REFERENCES `courses` (`CourseId`),
  ADD CONSTRAINT `CourseOffereds_Status_FK` FOREIGN KEY (`StatusId`) REFERENCES `statuss` (`StatusId`),
  ADD CONSTRAINT `CourseOffereds_Teacher_FK` FOREIGN KEY (`TeacherId`) REFERENCES `teachers` (`TeacherId`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `Courses_Status_FK` FOREIGN KEY (`StatusId`) REFERENCES `statuss` (`StatusId`);

--
-- Constraints for table `datas`
--
ALTER TABLE `datas`
  ADD CONSTRAINT `Datas_Field_FK` FOREIGN KEY (`FieldId`) REFERENCES `fieldss` (`FieldId`),
  ADD CONSTRAINT `Datas_Institute_FK` FOREIGN KEY (`InstituteId`) REFERENCES `institutes` (`InstituteId`),
  ADD CONSTRAINT `Datas_Qualification_FK` FOREIGN KEY (`QId`) REFERENCES `qualifications` (`QId`),
  ADD CONSTRAINT `Datas_Teacher_FK` FOREIGN KEY (`TeacherId`) REFERENCES `teachers` (`TeacherId`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `Feedbacks_Registration_FK` FOREIGN KEY (`RegId`) REFERENCES `registrations` (`RegId`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `Marks_Quiz_FK` FOREIGN KEY (`QuizId`) REFERENCES `quizes` (`QuizId`),
  ADD CONSTRAINT `Marks_Registration_FK` FOREIGN KEY (`RegId`) REFERENCES `registrations` (`RegId`);

--
-- Constraints for table `quizes`
--
ALTER TABLE `quizes`
  ADD CONSTRAINT `Quizes_CourseOffered_FK` FOREIGN KEY (`Covid`) REFERENCES `courseoffereds` (`Covid`);

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `Registrations_CourseOffered_FK` FOREIGN KEY (`Covid`) REFERENCES `courseoffereds` (`Covid`),
  ADD CONSTRAINT `Registrations_Student_FK` FOREIGN KEY (`StudentId`) REFERENCES `students` (`StudentId`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `Students_City_FK` FOREIGN KEY (`CityId`) REFERENCES `cities` (`CityId`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `Teachers_City_FK` FOREIGN KEY (`CityId`) REFERENCES `cities` (`CityId`),
  ADD CONSTRAINT `Teachers_Days_FK` FOREIGN KEY (`DayId`) REFERENCES `days` (`DayId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
