-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 10:25 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personalityquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerID` int(11) NOT NULL,
  `answerText` varchar(255) NOT NULL,
  `answerCategory` varchar(50) NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answerID`, `answerText`, `answerCategory`, `QuestionID`) VALUES
(1, 'I go with the flow', 'cheese', 1),
(2, 'I tend, be hot headed ', 'chilly', 1),
(3, 'I try calmly resolve the situation', 'lime', 1),
(4, 'I yell in southern accent ', 'bbq', 1),
(5, 'Even if it''s just squiggly lines I see it''s inner beauty', 'cheese', 2),
(6, 'I tend think about it in critical way and criticise smudges made out to be birds. ', 'chilly', 2),
(7, 'I wonder and ponder it''s deeper meaning. ', 'lime', 2),
(8, 'I already purchased the item and if I can''t afford it I already left', 'bbq', 2),
(9, 'I want someone who able to flow but still be able to hold us together', 'cheese', 3),
(10, 'I want someone who''s passionate just like me', 'chilly', 3),
(11, 'I want someone who''s got tang to my ting. ', 'lime', 3),
(12, 'I want someone who''s sweet but some bite to them.', 'bbq', 3),
(13, 'Go mellow with everyone', 'cheese', 4),
(14, 'I might end up with argument with one my exes or my parters exes', 'chilly', 4),
(15, 'I try the drink and it leaves me bitter taste. ', 'lime', 4),
(16, 'Pass the Beer, Where''s the pong at! ', 'bbq', 4),
(17, 'Cheese Stuffed', 'cheese', 5),
(18, 'medium base', 'chilly', 5),
(19, 'thin base', 'lime', 5),
(20, 'Deep Pan base', 'bbq', 5),
(21, 'A burger', 'cheese', 6),
(22, 'Indian Food', 'chilly', 6),
(23, 'Coconut cake', 'lime', 6),
(24, 'A large Stake', 'bbq', 6),
(25, 'I am first to suggest we should stick together', 'cheese', 7),
(26, 'Whatever we find we kill it.', 'chilly', 7),
(27, 'We should leave guys?', 'lime', 7),
(28, 'I am one suggest we should go split up and head out!', 'bbq', 7),
(29, 'Their hair', 'cheese', 8),
(30, 'Their eyes', 'chilly', 8),
(31, 'Their lips', 'lime', 8),
(32, 'Their hot body', 'bbq', 8),
(33, 'Yellow', 'cheese', 9),
(34, 'Red', 'chilly', 9),
(35, 'Green', 'lime', 9),
(36, 'Brown', 'bbq', 9),
(37, 'Platformers', 'cheese', 10),
(38, 'First Person Shooters', 'chilly', 10),
(39, 'Rhythm games ', 'lime', 10),
(40, 'Horror games', 'bbq', 10),
(41, 'I want to go with what happens', 'cheese', 11),
(42, 'I want a hot partner', 'chilly', 11),
(43, 'I want to invest in the future', 'lime', 11),
(44, 'I''m gonna blow all my money at the casino', 'bbq', 11),
(45, 'Beach house with clear view of beautiful waves ', 'cheese', 12),
(46, 'I would like live dangerously & Travel the world', 'chilly', 12),
(47, 'In quite town somewhere away from all pollution', 'lime', 12),
(48, 'I am happy in the city. NIGHTLIFE!', 'bbq', 12),
(49, 'Surfing', 'cheese', 13),
(50, 'Chilly dog eating competitions ', 'chilly', 13),
(51, 'Cooking neat recipes', 'lime', 13),
(52, 'Nightlife', 'bbq', 13),
(53, 'Happy', 'cheese', 14),
(54, 'Angry', 'chilly', 14),
(55, 'Cool', 'lime', 14),
(56, 'Feisty ', 'bbq', 14),
(57, 'Infinite Cheese', 'cheese', 15),
(58, 'Infinite Chillies', 'chilly', 15),
(59, 'Infinite Limes', 'lime', 15),
(60, 'Infinite BBQ sauce', 'bbq', 15);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginID` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `username`, `password`) VALUES
(1, 'web', '123');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionID` int(11) NOT NULL,
  `QuestionTitle` varchar(100) NOT NULL,
  `QuestionType` varchar(15) NOT NULL,
  `QuizID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `QuestionTitle`, `QuestionType`, `QuizID`) VALUES
(1, 'When confronting a task which describes you best?', 'text', 1),
(2, 'When you look at Art what do you see? ', 'text', 1),
(3, 'What Is it you look for in a partner', 'text', 1),
(4, 'What person are you at a party? ', 'text', 1),
(5, 'Your preferred pizza base?', 'text', 1),
(6, 'Favourite food? ', 'text', 1),
(7, 'In haunted house you are first one to? ', 'text', 1),
(8, 'What is first thing you usually notice in a person?', 'text', 1),
(9, 'What is your favourite colour? ', 'text', 1),
(10, 'What is your favourite game genre ', 'text', 1),
(11, 'What are your plans for the future?', 'text', 1),
(12, 'Where would you prefer to live in?', 'text', 1),
(13, 'What is your favourite hobbies', 'text', 1),
(14, 'In one word describe your childhood', 'text', 1),
(15, 'if you had pick one wish from below which one would you pick?', 'text', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `QuizID` int(11) NOT NULL,
  `QuizName` varchar(33) NOT NULL,
  `QuizCategory` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`QuizID`, `QuizName`, `QuizCategory`) VALUES
(1, 'Which Food Topping are you?', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`QuizID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `QuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
