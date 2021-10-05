-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 04:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarties_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `admin_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_id`, `admin_type`) VALUES
(1, 613, 'Manager'),
(2, 614, 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_text` varchar(255) NOT NULL,
  `createdby_user_id` int(11) NOT NULL,
  `announcement_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `announcement_title`, `announcement_text`, `createdby_user_id`, `announcement_date`) VALUES
(3, 'you have test on 13/4/2021', 'please attend the test early , don\'t be late , answer all the question , good luck!', 613, '2021-04-12 04:35:15'),
(23, 'sdfds', 'fsdfsdf', 616, '2021-04-14 06:33:05'),
(24, 'try to send announcement ', 'just try to send laaa', 616, '2021-04-14 06:33:28'),
(25, 'fsdfsd', 'fsdfs', 616, '2021-04-14 06:41:51'),
(26, 'fsdfsd', 'fsdfs', 616, '2021-04-14 06:42:18'),
(27, 'sdfdsf', 'sdfsdf', 616, '2021-04-14 06:45:57'),
(28, 'dsfdsf', 'fsdfdsfdsf', 616, '2021-04-14 06:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_record`
--

CREATE TABLE `announcement_record` (
  `Announcement_record_id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_readed` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement_record`
--

INSERT INTO `announcement_record` (`Announcement_record_id`, `announcement_id`, `user_id`, `is_readed`) VALUES
(1, 3, 614, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(30) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `teacher_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `faculty_id`, `teacher_id`) VALUES
(18, 'Introduction to History', 5, 1),
(19, 'Introduction to Faculty of Arts', 6, 2),
(20, 'Introduction to Faculty of Classics', 7, 3),
(21, 'Introduction to Faculty of Commerce', 8, 4),
(22, 'Introduction to Faculty of Economics', 9, 5),
(23, 'Introduction to Faculty of Education', 10, 6),
(24, 'Introduction to Faculty of Engineering', 11, 7),
(25, 'Introduction to Faculty of Graduate Studies', 12, 8),
(26, 'Introduction to Faculty of Humanities', 13, 9),
(27, 'Introduction to Faculty of Information Technology', 14, 10),
(28, 'Introduction to Faculty of Law', 15, 11),
(29, 'Introduction to Faculty of Management Studies', 16, 12),
(30, 'Introduction to Faculty of Music', 17, 13),
(31, 'Introduction to Faculty of Natural Sciences', 18, 14),
(32, 'Introduction to Faculty of Philosophy', 19, 15),
(33, 'Introduction to Faculty of Political Science', 20, 16);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(30) NOT NULL,
  `exam_title` varchar(100) NOT NULL,
  `exam_datetime` datetime(6) NOT NULL,
  `exam_duration` varchar(100) NOT NULL,
  `total_question` int(100) NOT NULL,
  `created_on` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `status` int(50) NOT NULL,
  `course_id` int(30) NOT NULL,
  `teacher_id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `exam_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_title`, `exam_datetime`, `exam_duration`, `total_question`, `created_on`, `status`, `course_id`, `teacher_id`, `faculty_id`, `exam_code`) VALUES
(10, 'try', '2021-04-15 01:46:00.000000', '10', 2, '2021-04-14 01:58:11.399469', 0, 18, 1, 5, 'try'),
(11, 'try1', '2021-04-15 02:36:00.000000', '20', 2, '2021-04-14 02:36:53.391203', 1, 19, 2, 6, 'try1');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(30) NOT NULL,
  `faculty_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_title`) VALUES
(5, 'History'),
(6, 'Faculty of Arts'),
(7, 'Faculty of Classics'),
(8, 'Faculty of Commerce'),
(9, 'Faculty of Economics'),
(10, 'Faculty of Education'),
(11, 'Faculty of Engineering'),
(12, 'Faculty of Graduate Studies'),
(13, 'Faculty of Humanities'),
(14, 'Faculty of Information Technology'),
(15, 'Faculty of Law'),
(16, 'Faculty of Management Studies'),
(17, 'Faculty of Music'),
(18, 'Faculty of Natural Sciences'),
(19, 'Faculty of Philosophy'),
(20, 'Faculty of Political Science'),
(21, 'Notes and References');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(30) NOT NULL,
  `question_title` varchar(200) NOT NULL,
  `answer_option` int(200) NOT NULL,
  `mark` varchar(20) NOT NULL,
  `exam_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_title`, `answer_option`, `mark`, `exam_id`) VALUES
(15, 'whats your name ', 1, '10', 10),
(16, 'whats your age', 4, '20', 10),
(17, 'name', 2, '6', 11),
(18, 'age', 3, '70', 11);

-- --------------------------------------------------------

--
-- Table structure for table `question_opetions`
--

CREATE TABLE `question_opetions` (
  `opetion_id` int(30) NOT NULL,
  `question_id` int(30) NOT NULL,
  `opetion_title` varchar(100) NOT NULL,
  `opetion_number` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_opetions`
--

INSERT INTO `question_opetions` (`opetion_id`, `question_id`, `opetion_title`, `opetion_number`) VALUES
(41, 15, 'mohammed', 1),
(42, 15, 'ahmed', 2),
(43, 15, 'abduljalil', 3),
(44, 15, 'radman', 4),
(45, 16, '3', 1),
(46, 16, '4', 2),
(47, 16, '5', 3),
(48, 16, '22', 4),
(49, 17, 'mom', 1),
(50, 17, 'mohammed', 2),
(51, 17, 'r', 3),
(52, 17, 'dsd', 4),
(53, 18, '20', 1),
(54, 18, '24', 2),
(55, 18, '22', 3),
(56, 18, '26', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `major` varchar(100) NOT NULL,
  `faculty_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `major`, `faculty_id`) VALUES
(1, 631, 'History', 5),
(2, 632, 'Faculty of Arts', 6),
(3, 633, 'Faculty of Classics', 7),
(4, 634, 'Faculty of Commerce', 8),
(5, 635, 'Faculty of Economics', 9),
(6, 636, 'Faculty of Education', 10),
(7, 637, 'Faculty of Engineering', 11),
(8, 638, 'Faculty of Graduate Studies', 12),
(9, 639, 'Faculty of Humanities', 13),
(10, 640, 'Faculty of Information Technology', 14),
(11, 641, 'Faculty of Law', 15),
(12, 642, 'Faculty of Management Studies', 16),
(13, 643, 'Faculty of Music', 17),
(14, 644, 'Faculty of Natural Sciences', 18),
(15, 645, 'Faculty of Philosophy', 19),
(16, 646, 'Faculty of Political Science', 20),
(17, 647, 'Notes and References', 21),
(18, 648, 'History', 5),
(19, 649, 'Faculty of Arts', 6),
(20, 650, 'Faculty of Classics', 7),
(21, 651, 'Faculty of Commerce', 8),
(22, 652, 'Faculty of Economics', 9),
(23, 653, 'Faculty of Education', 10),
(24, 654, 'Faculty of Engineering', 11),
(25, 655, 'Faculty of Graduate Studies', 12),
(26, 656, 'Faculty of Humanities', 13),
(27, 657, 'Faculty of Information Technology', 14),
(28, 658, 'Faculty of Law', 15),
(29, 659, 'Faculty of Management Studies', 16),
(30, 660, 'Faculty of Music', 17),
(31, 661, 'Faculty of Natural Sciences', 18),
(32, 662, 'Faculty of Philosophy', 19),
(33, 663, 'Faculty of Political Science', 20),
(34, 664, 'Notes and References', 21),
(35, 665, 'Faculty of Commerce', 8),
(36, 666, 'Faculty of Economics', 9),
(37, 667, 'Faculty of Education', 10),
(38, 668, 'Faculty of Engineering', 11),
(39, 669, 'Faculty of Graduate Studies', 12),
(40, 670, 'Faculty of Humanities', 13),
(41, 671, 'Faculty of Law', 15),
(42, 672, 'Faculty of Management Studies', 16),
(43, 673, 'Faculty of Music', 17),
(44, 674, 'Faculty of Natural Sciences', 18),
(45, 675, 'Faculty of Philosophy', 19),
(46, 676, 'History', 5),
(47, 677, 'Faculty of Arts', 6),
(48, 678, 'Faculty of Classics', 7),
(49, 679, 'Faculty of Commerce', 8),
(50, 680, 'Faculty of Economics', 9),
(51, 681, 'Faculty of Education', 10),
(52, 682, 'Faculty of Engineering', 11),
(53, 683, 'Faculty of Graduate Studies', 12),
(54, 684, 'Faculty of Humanities', 13),
(55, 685, 'Faculty of Information Technology', 14),
(56, 686, 'Faculty of Law', 15),
(57, 687, 'Faculty of Management Studies', 16),
(58, 688, 'Faculty of Music', 17),
(59, 689, 'Faculty of Natural Sciences', 18),
(60, 690, 'Faculty of Philosophy', 19),
(61, 691, 'Faculty of Political Science', 20),
(62, 692, 'Notes and References', 21),
(63, 693, 'History', 5),
(64, 694, 'Faculty of Arts', 6),
(65, 695, 'Faculty of Classics', 7),
(66, 696, 'Faculty of Commerce', 8),
(67, 697, 'Faculty of Economics', 9),
(68, 698, 'Faculty of Education', 10),
(69, 699, 'Faculty of Engineering', 11),
(70, 700, 'Faculty of Graduate Studies', 12),
(71, 701, 'Faculty of Humanities', 13),
(72, 702, 'Faculty of Information Technology', 14),
(73, 703, 'Faculty of Law', 15),
(74, 704, 'Faculty of Management Studies', 16),
(75, 705, 'Faculty of Music', 17),
(76, 706, 'Faculty of Natural Sciences', 18),
(77, 707, 'Faculty of Philosophy', 19),
(78, 708, 'Faculty of Political Science', 20),
(79, 709, 'Notes and References', 21),
(80, 710, 'Faculty of Commerce', 8),
(81, 711, 'Faculty of Engineering', 11),
(82, 712, 'Faculty of Graduate Studies', 12),
(83, 713, 'Faculty of Humanities', 13),
(84, 714, 'Faculty of Law', 15);

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

CREATE TABLE `student_record` (
  `student_record_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `exam_id` int(30) NOT NULL,
  `question_id` int(30) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `mark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`student_record_id`, `user_id`, `exam_id`, `question_id`, `answer`, `mark`) VALUES
(9, 615, 10, 15, '1', '10'),
(10, 615, 10, 16, '4', '10'),
(11, 615, 10, 15, '2', '0'),
(12, 615, 10, 16, '3', '0'),
(13, 614, 10, 15, '1', '10'),
(14, 614, 10, 16, '4', '20'),
(15, 616, 10, 15, '2', '0'),
(16, 616, 10, 16, '4', '20'),
(17, 615, 10, 15, '3', '0'),
(18, 615, 10, 16, '3', '0'),
(29, 616, 11, 17, '1', '0'),
(30, 616, 11, 18, '3', '70'),
(31, 616, 11, 17, '2', '6'),
(32, 616, 11, 18, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `teacher_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `user_id`, `faculty_id`, `teacher_type`) VALUES
(1, 615, 5, 'Lecturer'),
(2, 616, 6, 'Lecturer'),
(3, 617, 7, 'Lecturer'),
(4, 618, 8, 'Lecturer'),
(5, 619, 9, 'Lecturer'),
(6, 620, 10, 'Lecturer'),
(7, 621, 11, 'Lecturer'),
(8, 622, 12, 'Lecturer'),
(9, 623, 13, 'Lecturer'),
(10, 624, 14, 'Lecturer'),
(11, 625, 15, 'Lecturer'),
(12, 626, 16, 'Lecturer'),
(13, 627, 17, 'Lecturer'),
(14, 628, 18, 'Lecturer'),
(15, 629, 19, 'Lecturer'),
(16, 630, 20, 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(30) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile_No` varchar(30) NOT NULL,
  `user_image` varchar(30) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `username`, `password`, `gender`, `address`, `mobile_No`, `user_image`, `role`) VALUES
(613, 'Mohammed', 'Radman', 'Mohammed_Radman@gmail.com', 'rdmn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'nilai', '18018018', '8006-1835-blackboard.jpg', 0),
(614, 'salam', 'salam', 'salam222_salam2333@gmail.com', 'salam', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'nilai', '123', 'guy1.png', 0),
(615, 'Brynn', 'Isaac', 'Brynn_Isaac@gmail.com', 'Brynn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 436, 3161 Parturient Ave', '(595) 896-3012', 'guy1.png', 1),
(616, 'Tanner', 'Jason', 'Tanner_Jason@gmail.com', 'Tanner', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #688-6518 Hendrerit Rd.', '(181) 186-9780', 'avatar2.jpeg', 1),
(617, 'Donna', 'Branden', 'Donna_Branden@gmail.com', 'Donna', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '4348 Aliquam, Av.', '(108) 884-5621', 'guy1.png', 1),
(618, 'Fritz', 'Brian', 'Fritz_Brian@gmail.com', 'Fritz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 783, 7023 Parturient Street', '(994) 664-3841', 'avatar2.jpeg', 1),
(619, 'Hasad', 'Cyrus', 'Hasad_Cyrus@gmail.com', 'Hasad', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #375-898 Non Rd.', '(435) 831-7781', 'guy1.png', 1),
(620, 'Ignatius', 'Zachary', 'Ignatius_Zachary@gmail.com', 'Ignatius', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '2364 Id, Rd.', '(803) 622-4886', 'avatar2.jpeg', 1),
(621, 'Kay', 'Keith', 'Kay_Keith@gmail.com', 'Kay', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '621-5231 Lobortis Road', '(918) 139-5025', 'guy1.png', 1),
(622, 'Malachi', 'Daquan', 'Malachi_Daquan@gmail.com', 'Malachiii', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '2217 Eu, St.', '(255) 508-2557', 'avatar2.jpeg', 1),
(623, 'Blaine', 'Luke', 'Blaine_Luke@gmail.com', 'Blaine', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '981-2917 Commodo Ave', '(729) 675-7727', 'guy1.png', 1),
(624, 'Chelsea', 'Alexander', 'Chelsea_Alexander@gmail.com', 'Chelsea', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '494-2006 Duis Rd.', '(689) 462-2355', 'avatar2.jpeg', 1),
(625, 'Kibo', 'Marshall', 'Kibo_Marshall@gmail.com', 'Kiboo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 260, 955 Elit St.', '(131) 850-2461', 'guy1.png', 1),
(626, 'Noah', 'Tanek', 'Noah_Tanek@gmail.com', 'Noah', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '529-4973 Mi Road', '(119) 967-1236', 'avatar2.jpeg', 1),
(627, 'Christopher', 'Beck', 'Christopher_Beck@gmail.com', 'Christopher', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #851-9406 Id, Road', '(422) 592-6695', 'guy1.png', 1),
(628, 'Cade', 'Ivan', 'Cade_Ivan@gmail.com', 'Cade', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 974, 2771 Ac Road', '(256) 931-4752', 'avatar2.jpeg', 1),
(629, 'Imelda', 'Kenneth', 'Imelda_Kenneth@gmail.com', 'Imelda', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #242-7305 Dictum St.', '(324) 696-2142', 'guy1.png', 1),
(630, 'Porter', 'Graiden', 'Porter_Graiden@gmail.com', 'Porter', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 518, 1990 Pretium Av.', '(915) 316-9500', 'avatar2.jpeg', 1),
(631, 'Grady', 'Kato', 'Grady_Kato@gmail.com', 'Grady', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '903-704 Quisque Street', '(213) 332-6964', 'guy2.png', 2),
(632, 'Beverly', 'Neville', 'Beverly_Neville@gmail.com', 'Beverlyy', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #382-2794 Risus. Rd.', '(502) 695-3916', 'avatar2.jpeg', 2),
(633, 'Charles', 'Richard', 'Charles_Richard@gmail.com', 'Charles', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #156-7449 Eros. Av.', '(582) 539-3486', 'guy2.png', 2),
(634, 'Serena', 'Amal', 'Serena_Amal@gmail.com', 'Serena', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '2552 Dolor St.', '(509) 630-3774', 'avatar2.jpeg', 2),
(635, 'Lenore', 'Joel', 'Lenore_Joel@gmail.com', 'Lenore', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '798-5606 Nunc St.', '(242) 425-1886', 'guy2.png', 2),
(636, 'Aladdin', 'Jermaine', 'Aladdin_Jermaine@gmail.com', 'Aladdin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '472-6130 Consectetuer Rd.', '(210) 533-5263', 'avatar2.jpeg', 2),
(637, 'Jelani', 'Trevor', 'Jelani_Trevor@gmail.com', 'Jelani', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 796, 1072 Est, Rd.', '(298) 731-9838', 'guy2.png', 2),
(638, 'Garrett', 'Logan', 'Garrett_Logan@gmail.com', 'Garrett', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '918-720 Accumsan Avenue', '(456) 157-3137', 'avatar2.jpeg', 2),
(639, 'Ashely', 'Quinlan', 'Ashely_Quinlan@gmail.com', 'Ashely', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 413, 8410 Curabitur Rd.', '(349) 649-0096', 'guy2.png', 2),
(640, 'Zeus', 'Connor', 'Zeus_Connor@gmail.com', 'Zeus', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #669-2567 Aenean Street', '(492) 245-1877', 'avatar2.jpeg', 2),
(641, 'Garth', 'Aristotle', 'Garth_Aristotle@gmail.com', 'Garth', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #934-8150 Neque. St.', '(456) 124-0448', 'guy2.png', 2),
(642, 'Dexter', 'Carlos', 'Dexter_Carlos@gmail.com', 'Dexter', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 347, 4910 Donec Avenue', '(383) 862-3725', 'avatar2.jpeg', 2),
(643, 'Steven', 'Ulysses', 'Steven_Ulysses@gmail.com', 'Steven', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #274-4645 Dictum St.', '(551) 382-4812', 'guy2.png', 2),
(644, 'Herman', 'Basil', 'Herman_Basil@gmail.com', 'Herman', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #297-3170 Nisl. St.', '(725) 270-1249', 'avatar2.jpeg', 2),
(645, 'Quamar', 'Gavin', 'Quamar_Gavin@gmail.com', 'Quamar', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '621 Et, Ave', '(236) 251-9835', 'guy2.png', 2),
(646, 'Davis', 'Ahmed', 'Davis_Ahmed@gmail.com', 'Davis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '535-2049 Donec Rd.', '(912) 896-4601', 'avatar2.jpeg', 2),
(647, 'Orla', 'Patrick', 'Orla_Patrick@gmail.com', 'Orla', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 140, 7056 Metus. Ave', '(167) 806-8188', 'guy2.png', 2),
(648, 'Kerry', 'Edward', 'Kerry_Edward@gmail.com', 'Kerry', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 122, 5965 Magna Rd.', '(834) 493-7511', 'avatar2.jpeg', 2),
(649, 'Abdul', 'Levi', 'Abdul_Levi@gmail.com', 'Abdul', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '300-2591 Quam. St.', '(211) 578-4283', 'guy2.png', 2),
(650, 'Sean', 'Wayne', 'Sean_Wayne@gmail.com', 'Sean', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #344-3351 Orci Rd.', '(567) 675-0080', 'avatar2.jpeg', 2),
(651, 'Blythe', 'Talon', 'Blythe_Talon@gmail.com', 'Blythe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '423-9926 Vel Rd.', '(334) 179-3640', 'guy2.png', 2),
(652, 'Alec', 'Jeremy', 'Alec_Jeremy@gmail.com', 'Alec', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #143-3444 Sagittis St.', '(950) 902-3574', 'avatar1.jpeg', 2),
(653, 'Quinlan', 'Perry', 'Quinlan_Perry@gmail.com', 'Quinlan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '176-3114 Cursus. Ave', '(557) 807-9699', 'guy2.png', 2),
(654, 'Inez', 'Carlos', 'Inez_Carlos@gmail.com', 'Inez', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '4421 Curabitur Av.', '(586) 937-9107', 'avatar1.jpeg', 2),
(655, 'Alma', 'Stuart', 'Alma_Stuart@gmail.com', 'Alma', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #189-7047 Cras Road', '(519) 466-3846', 'guy2.png', 2),
(656, 'Charlotte', 'Ezra', 'Charlotte_Ezra@gmail.com', 'Charlotte', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 227, 3340 Est. St.', '(356) 783-2095', 'avatar1.jpeg', 2),
(657, 'Curran', 'Felix', 'Curran_Felix@gmail.com', 'Curran', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '2173 Luctus Ave', '(615) 605-6509', 'guy2.png', 2),
(658, 'Andrew', 'Cameron', 'Andrew_Cameron@gmail.com', 'Andrew', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #558-8758 Quisque Av.', '(913) 815-0624', 'avatar1.jpeg', 2),
(659, 'Fuller', 'Otto', 'Fuller_Otto@gmail.com', 'Fuller', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '2663 Eget Street', '(706) 755-1022', 'guy2.png', 2),
(660, 'Stewart', 'Wylie', 'Stewart_Wylie@gmail.com', 'Stewart', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '765-8100 Tincidunt Rd.', '(187) 693-4365', 'avatar1.jpeg', 2),
(661, 'Amos', 'Isaiah', 'Amos_Isaiah@gmail.com', 'Amos', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 974, 1928 Morbi St.', '(265) 348-3734', 'guy3.png', 2),
(662, 'Kimberley', 'Phelan', 'Kimberley_Phelan@gmail.com', 'Kimberley', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #967-4326 Nisi Road', '(817) 220-0049', 'avatar1.jpeg', 2),
(663, 'Summer', 'Harrison', 'Summer_Harrison@gmail.com', 'Summer', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '336-7422 Tincidunt, Street', '(930) 449-2174', 'guy3.png', 2),
(664, 'Edan', 'Porter', 'Edan_Porter@gmail.com', 'Edan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '7526 Phasellus Street', '(900) 359-2593', 'avatar1.jpeg', 2),
(665, 'Ciara', 'August', 'Ciara_August@gmail.com', 'Ciara', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #181-2271 Amet, Avenue', '(566) 305-2384', 'guy3.png', 2),
(666, 'Steel', 'Warren', 'Steel_Warren@gmail.com', 'Steel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #124-2994 Nonummy Avenue', '(749) 317-4681', 'avatar1.jpeg', 2),
(667, 'Sophia', 'Berk', 'Sophia_Berk@gmail.com', 'Sophia', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 126, 5073 Quisque Road', '(331) 177-1312', 'guy3.png', 2),
(668, 'Chaim', 'Odysseus', 'Chaim_Odysseus@gmail.com', 'Chaim', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #740-8069 Pede Street', '(417) 972-3165', 'avatar1.jpeg', 2),
(669, 'Jin', 'Graham', 'Jin_Graham@gmail.com', 'Jin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 583, 5776 Odio. Rd.', '(492) 356-4010', 'guy3.png', 2),
(670, 'Yuli', 'Sylvester', 'Yuli_Sylvester@gmail.com', 'Yuli', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '345-9584 Aenean Rd.', '(927) 125-6354', 'avatar1.jpeg', 2),
(671, 'Jameson', 'Quentin', 'Jameson_Quentin@gmail.com', 'Jameson', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #461-4451 Turpis. Street', '(222) 404-1983', 'guy3.png', 2),
(672, 'Ezekiel', 'Allistair', 'Ezekiel_Allistair@gmail.com', 'Ezekiel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '420-9871 Sed Rd.', '(994) 727-2391', 'avatar1.jpeg', 2),
(673, 'Zeph', 'Aidan', 'Zeph_Aidan@gmail.com', 'Zeph', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 805, 9057 Nisl. Av.', '(827) 239-0539', 'guy3.png', 2),
(674, 'Olympia', 'Malachi', 'Olympia_Malachi@gmail.com', 'Olympia', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '7139 Eget, Road', '(299) 397-0248', 'avatar1.jpeg', 2),
(675, 'Megan', 'Ferdinand', 'Megan_Ferdinand@gmail.com', 'Megan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #312-2749 Nec Rd.', '(321) 583-8365', 'guy3.png', 2),
(676, 'Lacey', 'Kennedy', 'Lacey_Kennedy@gmail.com', 'Lacey', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 288, 7402 Elit, Avenue', '(164) 890-9419', 'avatar1.jpeg', 2),
(677, 'Giselle', 'Micah', 'Giselle_Micah@gmail.com', 'Giselle', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 346, 6420 Eget St.', '(865) 335-6208', 'guy3.png', 2),
(678, 'Conan', 'Thomas', 'Conan_Thomas@gmail.com', 'Conan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 561, 2090 Morbi St.', '(821) 445-2951', 'avatar1.jpeg', 2),
(679, 'Odette', 'Todd', 'Odette_Todd@gmail.com', 'Odette', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 836, 3914 Cursus Rd.', '(925) 554-8700', 'guy3.png', 2),
(680, 'Jescie', 'Lionel', 'Jescie_Lionel@gmail.com', 'Jescie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 267, 2450 Sem Road', '(584) 557-7001', 'avatar1.jpeg', 2),
(681, 'Burke', 'Reese', 'Burke_Reese@gmail.com', 'Burke', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '8336 Non, St.', '(594) 326-3317', 'guy3.png', 2),
(682, 'Berk', 'Carl', 'Berk_Carl@gmail.com', 'Berk', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #651-6218 Ultrices Road', '(958) 724-3571', 'avatar1.jpeg', 2),
(683, 'Alexandra', 'Graiden', 'Alexandra_Graiden@gmail.com', 'Alexandra', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 730, 9763 Erat St.', '(569) 395-3465', 'guy3.png', 2),
(684, 'Avye', 'Dieter', 'Avye_Dieter@gmail.com', 'Avye', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 942, 5733 Vel, Rd.', '(469) 907-6404', 'avatar1.jpeg', 2),
(685, 'Edward', 'Nero', 'Edward_Nero@gmail.com', 'Edward', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 820, 2057 Mauris Road', '(321) 695-9418', 'guy3.png', 2),
(686, 'Yasir', 'Ivan', 'Yasir_Ivan@gmail.com', 'Yasir', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 279, 5038 Dolor. St.', '(228) 773-5618', 'avatar1.jpeg', 2),
(687, 'Velma', 'Driscoll', 'Velma_Driscoll@gmail.com', 'Velma', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '110-8859 Mollis St.', '(582) 402-9517', 'guy3.png', 2),
(688, 'Louis', 'Bevis', 'Louis_Bevis@gmail.com', 'Louis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #841-3392 Ultrices. Rd.', '(616) 242-4185', 'avatar1.jpeg', 2),
(689, 'Orson', 'Benjamin', 'Orson_Benjamin@gmail.com', 'Orson', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #448-9040 Nascetur Road', '(907) 125-1870', 'guy3.png', 2),
(690, 'Malachi', 'Gil', 'Malachi_Gil@gmail.com', 'Malachi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #765-9770 Facilisis St.', '(462) 678-7897', 'avatar1.jpeg', 2),
(691, 'Vielka', 'Eric', 'Vielka_Eric@gmail.com', 'Vielka', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '171-6580 Litora Street', '(483) 631-9020', 'guy4.png', 2),
(692, 'Abel', 'Dillon', 'Abel_Dillon@gmail.com', 'Abel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '960-9469 Ullamcorper, Street', '(500) 738-9979', 'avatar4.jpeg', 2),
(693, 'Yeo', 'Daniel', 'Yeo_Daniel@gmail.com', 'Yeo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #239-6422 Sed Rd.', '(352) 488-2564', 'guy4.png', 2),
(694, 'Daphne', 'Omar', 'Daphne_Omar@gmail.com', 'Daphne', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '4733 Dolor Avenue', '(501) 387-8404', 'avatar4.jpeg', 2),
(695, 'Blaze', 'Abel', 'Blaze_Abel@gmail.com', 'Blaze', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #422-1394 Amet Rd.', '(119) 865-9280', 'guy4.png', 2),
(696, 'Damon', 'Kane', 'Damon_Kane@gmail.com', 'Damon', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '842 Sed Road', '(871) 856-2301', 'avatar4.jpeg', 2),
(697, 'Florence', 'Deacon', 'Florence_Deacon@gmail.com', 'Florence', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #981-617 Et Street', '(424) 398-9005', 'guy4.png', 2),
(698, 'Cally', 'Nathan', 'Cally_Nathan@gmail.com', 'Cally', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '7404 Augue Ave', '(648) 267-2968', 'avatar4.jpeg', 2),
(699, 'Leila', 'Malik', 'Leila_Malik@gmail.com', 'Leila', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #339-2548 Vehicula. Av.', '(967) 343-5353', 'guy4.png', 2),
(700, 'Dominic', 'Rahim', 'Dominic_Rahim@gmail.com', 'Dominic', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 730, 829 Iaculis, St.', '(388) 643-2626', 'avatar4.jpeg', 2),
(701, 'Fletcher', 'Samuel', 'Fletcher_Samuel@gmail.com', 'Fletcher', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 177, 4507 Lorem. Street', '(684) 872-2694', 'guy4.png', 2),
(702, 'Kibo', 'Maxwell', 'Kibo_Maxwell@gmail.com', 'Kibo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'Ap #449-2726 Rutrum Ave', '(842) 787-6100', 'avatar4.jpeg', 2),
(703, 'Darrel', 'Gregory', 'Darrel_Gregory@gmail.com', 'Darrel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 391, 8384 Sit St.', '(422) 951-4133', 'guy4.png', 2),
(704, 'Octavius', 'Ezra', 'Octavius_Ezra@gmail.com', 'Octavius', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '567 Turpis Street', '(515) 839-4238', 'avatar4.jpeg', 2),
(705, 'Freya', 'Grady', 'Freya_Grady@gmail.com', 'Freya', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 645, 4342 Ut St.', '(557) 793-4371', 'guy4.png', 2),
(706, 'Kato', 'Rahim', 'Kato_Rahim@gmail.com', 'Kato', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 975, 9707 Lobortis Av.', '(177) 385-8410', 'avatar4.jpeg', 2),
(707, 'Echo', 'Tucker', 'Echo_Tucker@gmail.com', 'Echo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #489-5035 Enim. Av.', '(279) 981-1343', 'guy4.png', 2),
(708, 'Joy', 'Beau', 'Joy_Beau@gmail.com', 'Joy', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 592, 2125 Lorem Road', '(163) 904-9300', 'avatar4.jpeg', 2),
(709, 'Fitzgerald', 'Victor', 'Fitzgerald_Victor@gmail.com', 'Fitzgerald', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'P.O. Box 590, 6954 Donec Ave', '(465) 521-2150', 'guy4.png', 2),
(710, 'Lara', 'Aristotle', 'Lara_Aristotle@gmail.com', 'Lara', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '626-6993 Commodo St.', '(860) 565-0519', 'avatar4.jpeg', 2),
(711, 'Kim', 'Sawyer', 'Kim_Sawyer@gmail.com', 'Kim', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', '933-2259 Congue Av.', '(738) 562-8556', 'guy4.png', 2),
(712, 'Beverly', 'Chaim', 'Beverly_Chaim@gmail.com', 'Beverly', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', 'P.O. Box 187, 5324 Convallis Rd.', '(175) 221-0586', 'avatar4.jpeg', 2),
(713, 'Mira', 'Perry', 'Mira_Perry@gmail.com', 'Mira', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'Ap #286-1655 Diam Avenue', '(299) 757-4334', 'guy4.png', 2),
(714, 'Jessamine', 'Isaac', 'Jessamine_Isaac@gmail.com', 'Jessamine', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Female', '520-301 Ipsum. Road', '(528) 647-2430', 'avatar4.jpeg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `FK_Announcement_user_user_id` (`createdby_user_id`);

--
-- Indexes for table `announcement_record`
--
ALTER TABLE `announcement_record`
  ADD PRIMARY KEY (`Announcement_record_id`),
  ADD KEY `FK_Announcement_record_announcement_announcement_id` (`announcement_id`),
  ADD KEY `FK_Announcement_record_user_user_id` (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD KEY `UK_faculty_faculty_id` (`faculty_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `question_opetions`
--
ALTER TABLE `question_opetions`
  ADD PRIMARY KEY (`opetion_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `student_record`
--
ALTER TABLE `student_record`
  ADD PRIMARY KEY (`student_record_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `announcement_record`
--
ALTER TABLE `announcement_record`
  MODIFY `Announcement_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `question_opetions`
--
ALTER TABLE `question_opetions`
  MODIFY `opetion_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `student_record_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_admin_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `FK_Announcement_user_user_id` FOREIGN KEY (`createdby_user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `announcement_record`
--
ALTER TABLE `announcement_record`
  ADD CONSTRAINT `FK_Announcement_record_announcement_announcement_id` FOREIGN KEY (`announcement_id`) REFERENCES `announcement` (`announcement_id`),
  ADD CONSTRAINT `FK_Announcement_record_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_course_faculty_faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `FK_course_teacher_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `FK_exam_course_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `FK_exam_faculty_faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `FK_exam_teacher_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_question_exam_exam_id` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`);

--
-- Constraints for table `question_opetions`
--
ALTER TABLE `question_opetions`
  ADD CONSTRAINT `FK_question_opetions_question_question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_student_faculty_faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `FK_student_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `student_record`
--
ALTER TABLE `student_record`
  ADD CONSTRAINT `FK_student_record_exam_exam_id` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`),
  ADD CONSTRAINT `FK_student_record_question_question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`),
  ADD CONSTRAINT `FK_student_record_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `FK_teacher_faculty_faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `FK_teacher_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
