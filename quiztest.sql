-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2025 at 03:13 PM
-- Server version: 8.4.3
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiztest`
--

-- --------------------------------------------------------

--
-- Table structure for table `highscore`
--

CREATE TABLE `highscore` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `rightanswer` int DEFAULT NULL,
  `wronganswer` int DEFAULT NULL,
  `countquestion` int DEFAULT NULL,
  `countpercent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `highscore`
--

INSERT INTO `highscore` (`id`, `username`, `rightanswer`, `wronganswer`, `countquestion`, `countpercent`) VALUES
(1, 'Marvels', 3, 2, 200, 42.86),
(2, 'DCs', 2, 4, 750, 28.57);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_data`
--

CREATE TABLE `quiz_data` (
  `id` int NOT NULL,
  `categoryNr` int NOT NULL,
  `points` int NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `choice_a` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `choice_b` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `choice_c` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `quiz_data`
--

INSERT INTO `quiz_data` (`id`, `categoryNr`, `points`, `question`, `answer`, `choice_a`, `choice_b`, `choice_c`) VALUES
(1, 0, 50, 'Wer spielt die Hauptrolle als Jack in \"Titanic\"?', 'Leonardo DiCaprio', 'Brad Pitt', 'Tom Cruise', 'Johnny Depp'),
(2, 0, 100, 'Wie heißt die Filmreihe, in der ein Ring zerstört werden muss, um Mittelerde zu retten?', 'Herr der Ringe', 'Harry Potter', 'Chroniken von Narnia', 'Twilight'),
(3, 0, 250, 'Welcher Regisseur führte Regie bei dem Film „Inception“?', 'Christopher Nolan', 'James Cameron', 'Steven Spielberg', 'Ridley Scott'),
(4, 0, 500, 'Welcher dieser Filme gewann nicht den Oscar für „Bester Film“?', 'Inception', 'Schindlers Liste', 'No Country For Old Men', 'The Kings Speech'),
(5, 1, 50, 'Wie heißt der Klempner, der in vielen Nintendo-Spielen die Hauptrolle spielt?', 'Mario', 'Luigi', 'Sonic', 'Donkey Kong'),
(6, 1, 100, 'In welchem Spiel sammelt man Rupees als Währung?', 'Legend of Zelda', 'Final Fantasy', 'Skyrim', 'Pokemon'),
(7, 1, 250, 'Welches dieser Spiele wurde von CD Projekt Red entwickelt?', 'The Witcher 3', 'Elden Ring', 'Assassins Creed Odyssey', 'Cyberpunk 2077'),
(8, 1, 500, 'Wie heißt der Endboss im Original-„Dark Souls“ von 2011?', 'Gwyn, Lord of Cinder', 'Artorias the Abysswalker', 'Ornstein and Smough', 'Seath the Scaleless');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `categoryNr` int NOT NULL,
  `topic` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `categoryNr`, `topic`) VALUES
(1, 0, 'Filme'),
(2, 1, 'Spiele');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `highscore`
--
ALTER TABLE `highscore`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `quiz_data`
--
ALTER TABLE `quiz_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`question`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoryNr` (`categoryNr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `highscore`
--
ALTER TABLE `highscore`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_data`
--
ALTER TABLE `quiz_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
