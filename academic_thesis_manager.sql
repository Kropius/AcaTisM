-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 01, 2019 la 11:27 PM
-- Versiune server: 10.1.38-MariaDB
-- Versiune PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `academic thesis manager`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `collaborations`
--

DROP TABLE IF EXISTS `collaborations`;
CREATE TABLE `collaborations` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `commits`
--

DROP TABLE IF EXISTS `commits`;
CREATE TABLE `commits` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_deadline` int(11) NOT NULL,
  `description` text,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `concepts`
--

DROP TABLE IF EXISTS `concepts`;
CREATE TABLE `concepts` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `deadlines`
--

DROP TABLE IF EXISTS `deadlines`;
CREATE TABLE `deadlines` (
  `id` int(11) NOT NULL,
  `mandatory_date` date NOT NULL,
  `extension` varchar(10) NOT NULL,
  `format` varchar(100) NOT NULL,
  `description` text,
  `id_project` int(11) NOT NULL,
  `last_edit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `domains`
--

DROP TABLE IF EXISTS `domains`;
CREATE TABLE `domains` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `interests`
--

DROP TABLE IF EXISTS `interests`;
CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `content` text NOT NULL,
  `id_sender` int(11) NOT NULL,
  `sent_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `tools` text NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `apply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `description` text,
  `lastgrade` varchar(10) DEFAULT NULL,
  `experience` text,
  `studies` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `students`
--

INSERT INTO `students` (`id`, `username`, `password`, `name`, `email`, `phone`, `faculty`, `description`, `lastgrade`, `experience`, `studies`) VALUES
(1, 'matei.cioata', 'Cioata2019Fii', 'Cioata Matei-Alexandru', 'matei_alex1998@yahoo.ro', '123', 'Computer Science', NULL, NULL, NULL, NULL),
(2, 'mihnea.rezmerita', 'Rezmerita2019Fii', 'Rezmerita Mihnea-Ioan', 'mihnea.superbaiat@gmail.com', '124', 'Computer Science', NULL, NULL, NULL, NULL),
(3, 'andrei.halauca', 'Halauca2019Fii', 'Halauca Andrei', 'ahalauca@gmail.com', '125', 'Computer Science', NULL, NULL, NULL, NULL),
(4, 'irina.cercel', 'Cercel2019Fii', 'Cercel Irina-Elena', 'iriina17@yahoo.com', '126', 'Computer Science', NULL, NULL, NULL, NULL),
(5, 'andrei.damian', 'Damian2019Fii', 'Damian Andrei', 'mihnear.1997@gmail.com', '127', 'Computer Science', NULL, NULL, NULL, NULL),
(6, 'radu.lipan', 'Lipan2019Fii', 'Lipan Radu-Matei', 'mihnea.1997@yahoo.com', '128', 'Computer Science', NULL, NULL, NULL, NULL),
(7, 'sergiu.salceanu', 'Salceanu2019Fii', 'Salceanu Sergiu-Paul', 'splinter981@gmail.com', '129', 'Computer Science', NULL, NULL, NULL, NULL),
(8, 'lavinia.disca', 'Disca2019Fii', 'Disca Lavinia', 'irina.cercel1998@gmail.com', '120', 'Computer Science', NULL, NULL, NULL, NULL),
(9, 'octavian.cota', 'Cota2019Fii', 'Cota Stefan-Octavian', 'andreihalauca@yahoo.com', '130', 'Computer Science', NULL, NULL, NULL, NULL),
(10, 'andrei.chiperi', 'Chiperi2019Fii', 'Chiperi Andrei', 'agronaut02@gmail.com', '131', 'Computer Science', NULL, NULL, NULL, NULL),
(11, 'catalin.belu', 'Belu2019Fii', 'Belu Catalin-Cosmin', 'mihnea.rezmerita@romanvoda.ro', '132', 'Computer Science', NULL, NULL, NULL, NULL),
(12, 'bianca.bacaoanu', 'Bacaoanu2019Fii', 'Bacaoanu Adriana-Bianca', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(13, 'eugen.zaharia', 'Zaharia2019Fii', 'Zaharia Eugen', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(14, 'corina.garam', 'Garam2019Fii', 'Garam Corina', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(15, 'marian.mihai', 'Mihai2019Fii', 'Mihai Marian-Sebastian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(16, 'cosmin.iureanu', 'Iureanu2019Fii', 'Iureanu Cosmin-Marian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(17, 'remus.bulboaca', 'Bulboaca2019Fii', 'Bulboaca Remus', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(18, 'cotoc.sebastian', 'Cotoc2019Fii', 'Cotoc Sebastian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(19, 'petru.martincu', 'Martincu2019Fii', 'Martincu Petru', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(20, 'constantin.listar', 'Listar2019Fii', 'Listar Constantin', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(21, 'stefania.andries', 'Andries2019Fii', 'Andries Stefania', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(22, 'alin.vrabie', 'Vrabie2019Fii', 'Vrabie Alin-Stefan', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(23, 'cristian.adam', 'Adam2019Fii', 'Adam Cristian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(24, 'marius.blaj', 'Blaj2019Fii', 'Blaj Marius-Marian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(25, 'adrian.lupu', 'Lupu2019Fii', 'Lupu Adrian-Damian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(26, 'raluca.dascalu', 'Dascalu2019Fii', 'Dascalu Raluca', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(27, 'nadia.roman', 'Roman2019Fii', 'Roman Nadia-Georgiana', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(28, 'deny.patrascu', 'Patrascu2019Fii', 'Patrascu Deny-Constantin', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(29, 'daniel.iacob', 'Iacob2019Fii', 'Iacob Daniel-Constantin', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(30, 'alex.martinas', 'Martinas2019Fii', 'Martinas Alexandru', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `description` text,
  `research` text,
  `studies` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `password`, `name`, `profession`, `email`, `phone`, `description`, `research`, `studies`) VALUES
(1, 'cosmin.varlan', 'VarlanFii2019', 'Varlan Cosmin', 'Database Developer', 'cosmin.varlan@test.email.ro', '123', NULL, NULL, NULL),
(3, 'cristian.frasinaru', 'FrasinaruFii2019', 'Cristian Frasinaru', 'Java Back-end Developer', 'matei_alex1998@yahoo.ro', '234', NULL, NULL, NULL),
(4, 'cristian.vidrascu', 'VidrascuFii2019', 'Cristian Vidrascu', 'C++ developer', 'irina.cercel1998@gmail.com', '345', NULL, NULL, NULL),
(5, 'madalina.raschip', 'RaschipFii2019', 'Raschip Madalina', 'Data Structures Teacher', 'iriina17@yahoo.com', '456', NULL, NULL, NULL),
(6, 'Cristian Gatu', 'GatuFii2019', 'Gatu Cristian', 'Data Structures Teacher', 'mihnea.superbaiat@gmail.com', '678', NULL, NULL, NULL),
(7, 'vlad.radulescu', 'RadulescuFii2019', 'Radulescu Vlad', 'Computer Architecture Teacher', 'andreihalauca@yahoo.com', '789', NULL, NULL, NULL),
(8, 'adrian.iftene', 'IfteneFii2019', 'Iftene Adrian', 'Dean of the Faculty of Computer Science', 'ahalauca@gmail.com', '890', NULL, NULL, NULL),
(9, 'andrei.panu', 'PanuFii2019', 'Panu Andrei', 'Web Developer', 'mihnea.1997@yahoo.com', '901', NULL, NULL, NULL),
(10, 'sabin.buraga', 'BuragaFii2019', 'Buraga Sabin', 'Web Developer', 'mihnear.1997@gmail.com', '012', NULL, NULL, NULL),
(11, 'alex.moruz', 'MoruzFii2019', 'Moruz Alexandru', 'Back-end Developer', 'splinter981@gmail.com', '134', NULL, NULL, NULL),
(12, 'oana.captarencu', 'CaptarencuFii2019', 'Captarencu Oana', 'Petri Nets Researcher', 'mihnea.rezmerita@romanvoda.ro', '256', NULL, NULL, NULL),
(13, 'lenuta.alboaie', 'Alboaie2019Fii', 'Alboaie Lenuta', 'C++ Developer', 'agronaut02@gmail.com', '367', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `theses`
--

DROP TABLE IF EXISTS `theses`;
CREATE TABLE `theses` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `project_link` varchar(255) DEFAULT NULL,
  `documentation_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `work`
--

DROP TABLE IF EXISTS `work`;
CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `collaborations`
--
ALTER TABLE `collaborations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexuri pentru tabele `commits`
--
ALTER TABLE `commits`
  ADD KEY `id_deadline` (`id_deadline`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexuri pentru tabele `concepts`
--
ALTER TABLE `concepts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexuri pentru tabele `deadlines`
--
ALTER TABLE `deadlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexuri pentru tabele `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_domain` (`id_domain`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexuri pentru tabele `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexuri pentru tabele `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexuri pentru tabele `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_domain` (`id_domain`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexuri pentru tabele `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `theses`
--
ALTER TABLE `theses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexuri pentru tabele `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_domain` (`id_domain`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `collaborations`
--
ALTER TABLE `collaborations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `concepts`
--
ALTER TABLE `concepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `deadlines`
--
ALTER TABLE `deadlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pentru tabele `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `theses`
--
ALTER TABLE `theses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `collaborations`
--
ALTER TABLE `collaborations`
  ADD CONSTRAINT `collaborations_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `collaborations_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `commits`
--
ALTER TABLE `commits`
  ADD CONSTRAINT `commits_ibfk_1` FOREIGN KEY (`id_deadline`) REFERENCES `deadlines` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `commits_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `concepts`
--
ALTER TABLE `concepts`
  ADD CONSTRAINT `concepts_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `concepts_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `deadlines`
--
ALTER TABLE `deadlines`
  ADD CONSTRAINT `deadlines_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`id_domain`) REFERENCES `domains` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `interests_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`id_domain`) REFERENCES `domains` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `theses`
--
ALTER TABLE `theses`
  ADD CONSTRAINT `theses_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `theses_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`id_domain`) REFERENCES `domains` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `work_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
