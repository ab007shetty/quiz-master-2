-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 08:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answeredquiz`
--

CREATE TABLE `answeredquiz` (
  `answeredQuizID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `quizID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answeredquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_address` varchar(500) NOT NULL,
  `c_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`c_id`, `c_name`, `c_mobile`, `c_email`, `c_address`, `c_message`) VALUES
(1, 'vaishnavid', '9878749887', 'vaishnavi.19cs109@sode-edu.in', 'udupi', 'its qworking');



-- --------------------------------------------------------


--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructorID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ipassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorID`, `name`, `username`, `ipassword`) VALUES
(1, 'Teacher', 'teacher', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizID` int(11) NOT NULL,
  `InstructorID` int(11) NOT NULL,
  `quizName` varchar(255) NOT NULL,
  `dateOpen` datetime NOT NULL,
  `dateClose` datetime NOT NULL,
  `quizDescription` varchar(255) NOT NULL,
  `quizCode` varchar(255) NOT NULL,
  `classAverage` float NOT NULL,
  `numStudents` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizID`, `InstructorID`, `quizName`, `dateOpen`, `dateClose`, `quizDescription`, `quizCode`, `classAverage`, `numStudents`) VALUES
(1, 1, 'Technical Exercise', '2022-10-25 23:08:00', '2023-11-25 23:08:00', 'To check your technical knowledge', 'SMV-ITM-UID', 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `quizquestion`
--

CREATE TABLE `quizquestion` (
  `quizQuestionID` int(11) NOT NULL,
  `questionName` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `asnwer3` varchar(255) NOT NULL,
  `quizID` int(11) NOT NULL,
  `correctAnswer` varchar(255) NOT NULL,
  `questionType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizquestion`
--

INSERT INTO `quizquestion` (`quizQuestionID`, `questionName`, `answer1`, `answer2`, `asnwer3`, `quizID`, `correctAnswer`, `questionType`) VALUES
(1, 'Among the following types, which one is not a database', 'Hierarchical', 'Network', 'Decentralised', 1, 'Decentralised', 'radio'),
(2, 'To uniquely identify the record, which among the following is a set of one or more attributes taken collectively', 'Primary key', 'Super key', 'Candidate key', 1, 'Super key', 'radio'),
(3, 'In which of the following layers encryption and decryption of the data takes place', 'Presentation layer', 'Data link layer', 'Session layer', 1, 'Presentation layer', 'radio'),
(4, 'Which of the following is not a SQL command', 'order by', 'delete', 'where', 1, 'delete', 'radio'),
(5, 'One of the below mentioned normal forms deals with multivalued dependency', '2NF', '3NF', '4NF', 1, '4NF', 'radio');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `spassword` varchar(255) NOT NULL,
  `matrixNum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentName`, `spassword`, `matrixNum`) VALUES
 (1, 'pooja', 'password', '4MW19CS064'),
 (2, 'prajna', 'password', '4MW19CS065'),
 (3, 'prajna', 'password', '4MW19CS066'),
 (4, 'prasannashree', 'password', '4MW19CS067'),
 (5, 'pratheeksha', 'password', '4MW19CS068'),
 (6, 'prathik', 'password', '4MW19CS069'),
 (7, 'preran', 'password', '4MW19CS070'),
 (8, 'purvash', 'password', '4MW19CS071'),
 (9, 'qais', 'password', '4MW19CS072'),
 (10, 'raksha', 'password', '4MW19CS073'),
 (11, 'rakshith', 'password', '4MW19CS074'),
 (12, 'ranjani', 'password', '4MW19CS075'),
 (13, 'reon', 'password', '4MW19CS076'),
 (14, 'sachitha', 'password', '4MW19CS077'),
 (15, 'sampath', 'password', '4MW19CS078'),
 (16, 'sanjana', 'password', '4MW19CS079'),
 (17, 'santhosh', 'password', '4MW19CS080'),
 (18, 'afifa', 'password', '4MW19CS081'),
 (19, 'shamitha', 'password', '4MW19CS082'),
 (20, 'shivani', 'password', '4MW19CS083'),
 (21, 'shraddha', 'password', '4MW19CS084'),
 (22, 'shraddha', 'password', '4MW19CS085'),
 (23, 'shraddha', 'password', '4MW19CS086'),
 (24, 'shravya', 'password', '4MW19CS087'),
 (25, 'shravya', 'password', '4MW19CS088'),
 (26, 'shravya', 'password', '4MW19CS089'),
 (27, 'shreekumar', 'password', '4MW19CS090'),
 (28, 'shreeraksha', 'password', '4MW19CS091'),
 (29, 'shreya', 'password', '4MW19CS092'),
 (30, 'shreya', 'password', '4MW19CS093'),
 (31, 'shrutha', 'password', '4MW19CS094'),
 (32, 'srushti', 'password', '4MW19CS095'),
 (33, 'sujith', 'password', '4MW19CS096'),
 (34, 'sukanya', 'password', '4MW19CS097'),
 (35, 'sukumara', 'password', '4MW19CS098'),
 (36, 'sumana', 'password', '4MW19CS099'),
 (37, 'suraksha', 'password', '4MW19CS100'),
 (38, 'swasthik', 'password', '4MW19CS101'),
 (39, 'swathi', 'password', '4MW19CS102'),
 (40, 'swathi', 'password', '4MW19CS103'),
 (41, 'sreesha', 'password', '4MW19CS104'),
 (42, 'tarun', 'password', '4MW19CS105'),
 (43, 'tejas', 'password', '4MW19CS106'),
 (44, 'deepta', 'password', '4MW19CS107'),
 (45, 'uttam', 'password', '4MW19CS108'),
 (46, 'vaishnavi D', 'password', '4MW19CS109'),
 (47, 'vaishnavi', 'password', '4MW19CS110'),
 (48, 'vaishnavi', 'password', '4MW19CS111'),
 (49, 'varshini', 'password', '4MW19CS112'),
 (50, 'varun', 'password', '4MW19CS113'),
 (51, 'vasuki', 'password', '4MW19CS114'),
 (52, 'vijayalakshmi', 'password', '4MW19CS115'),
 (53, 'vikram', 'password', '4MW19CS116'),
 (54, 'vishal', 'password', '4MW19CS117'),
 (55, 'vishwas', 'password', '4MW19CS118'),
 (56, 'wilton', 'password', '4MW19CS119'),
 (57, 'yajnesh', 'password', '4MW19CS120'),
 (58, 'rakshith', 'password', '4MW19CS121'),
 (59, 'sumantha', 'password', '4MW19CS122'),
 (60, 'deekshitha', 'password', '4MW20CS400'),
 (61, 'nikitha', 'password', '4MW20CS401'),
 (62, 'karthikeya', 'password', '4MW20CS402');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `answeredquiz`
--
ALTER TABLE `answeredquiz`
  ADD PRIMARY KEY (`answeredQuizID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`c_id`);



--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructorID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizID`),
  ADD KEY `quiz_ibfk_1` (`InstructorID`);

--
-- Indexes for table `quizquestion`
--
ALTER TABLE `quizquestion`
  ADD PRIMARY KEY (`quizQuestionID`),
  ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `matrixNum` (`matrixNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answeredquiz`
--
ALTER TABLE `answeredquiz`
  MODIFY `answeredQuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quizquestion`
--
ALTER TABLE `quizquestion`
  MODIFY `quizQuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answeredquiz`
--
ALTER TABLE `answeredquiz`
  ADD CONSTRAINT `answeredquiz_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answeredquiz_ibfk_3` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`quizID`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`InstructorID`) REFERENCES `instructor` (`instructorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quizquestion`
--
ALTER TABLE `quizquestion`
  ADD CONSTRAINT `quizquestion_ibfk_1` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`quizID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
