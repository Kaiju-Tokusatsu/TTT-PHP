-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 03:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttt`
--

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL DEFAULT 'temporaryName',
  `last_access` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `topic_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `creator_id`, `team_id`, `created`, `status`, `topic_text`) VALUES
(1, 1, 0, '2024-06-03 12:16:20', 1, 'PLO1. Critically analyse and evaluate the concept of sustainability as it is constructed and represented within multiple disciplines and by extra-academic actors.'),
(2, 1, 0, '2024-06-03 12:17:06', 1, 'PLO2. In collaboration with extra-academic actors, investigate and evaluate complex societal challenges from a variety of stakeholder and intercultural perspectives to creatively identify, select and devise robust, adaptable, ethical solutions using a range of methodologies, theoretical frameworks and data analysis tools.'),
(3, 1, 0, '2024-06-03 12:17:06', 1, 'PLO3. Rigorously assess and integrate different disciplinary and transdisciplinary knowledge and research methodologies to connect research questions, data and findings to their challenges.'),
(4, 1, 0, '2024-06-03 12:17:06', 1, 'PLO4. Demonstrate expertise in the identification and application of the latest technological tools to source, analyse, handle, use and communicate complex bodies of data ethically.'),
(5, 1, 0, '2024-06-03 12:17:06', 1, 'PLO5. Formulate an advanced understanding of transdisciplinarity and demonstrate expertise in the facilitative, communicative and collaborative skills to support its practice, ensure a reflexive outlook and interpret and connect different disciplinary languages and intercultural perspectives to complex challenges.'),
(6, 1, 0, '2024-06-03 12:17:06', 1, 'PLO6. Acquire advanced competency within a range of transversal skills such as communication, teamwork, problem solving, creative thinking, entrepreneurialism, innovation, digital skills and a life-long learning disposition.'),
(7, 1, 0, '2024-06-03 12:17:06', 1, 'PLO7. Communicate effectively on complex issues that aim for behavioural change, interpreting and connecting complex challenges to diverse stakeholder, disciplinary and intercultural perspectives that encompass global and European citizenship.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `last_access` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `firstname` varchar(255) NOT NULL,
  `discipline` varchar(255) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `interaction_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `sentiment_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`interaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `interaction_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
