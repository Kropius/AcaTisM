SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `collaborations` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `collaborations` (`id`, `id_teacher`, `id_student`) VALUES
(2, 3, 1),
(8, 3, 7);

CREATE TABLE `commits` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_deadline` int(11) NOT NULL,
  `description` text,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `concepts` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `concepts` (`id`, `id_teacher`, `id_project`) VALUES
(13, 3, 2),
(14, 3, 3),
(15, 3, 4),
(16, 3, 5);

CREATE TABLE `deadlines` (
  `id` int(11) NOT NULL,
  `mandatory_date` date NOT NULL,
  `extension` varchar(10) NOT NULL,
  `format` varchar(100) NOT NULL,
  `description` text,
  `id_project` int(11) NOT NULL,
  `last_edit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `deadlines` (`id`, `mandatory_date`, `extension`, `format`, `description`, `id_project`, `last_edit`) VALUES
(14, '2020-05-22', '.apk', 'Installer', 'The game must be in it\'s final form', 2, '2019-05-07'),
(15, '2020-05-22', '.pdf', 'LTNS', 'The documentation for the project must be also ready', 2, '2019-05-07'),
(16, '2020-05-25', '.pdf', 'LTNS', 'The architecture and his tasks for the first iteration.', 3, '2019-05-07'),
(17, '2020-06-15', '.*', 'Code', 'Half of the project functionalities implemented.', 3, '2019-05-07'),
(18, '2020-07-01', '.*', 'Code', 'The project must be in it\'s final form.', 3, '2019-05-07'),
(19, '2020-07-01', '.html', 'Scholarly HTML', 'The documentation of the project must be ready.', 3, '2019-05-07'),
(20, '2020-12-05', '.*', 'test', 'Just a test', 4, '2019-05-07');

CREATE TABLE `domains` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `domains` (`id`, `name`) VALUES
(1, 'Graph Theory'),
(2, 'Databases'),
(3, 'Web Technologies'),
(4, 'Data Structures'),
(5, 'Computer Networks'),
(6, 'Information Security'),
(7, 'Functional Programming'),
(8, 'Object Oriented Programming'),
(9, 'Natural Language Processing'),
(10, 'Compilers'),
(11, 'Optimisation Algorithms'),
(12, 'Game Development'),
(13, 'Multi-threading'),
(14, 'Operating Systems');

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `content` text NOT NULL,
  `id_sender` int(11) NOT NULL,
  `sent_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `projects` (`id`, `name`, `short_description`, `long_description`, `added_date`) VALUES
(2, 'Don\'t Fly Underground', 'A simple game in which you control a bird. You must avoid as many obstacles as you can in order to score as many points.', 'You have to program a game on Android. Your bird must avoid obstacles by flying: when you press a button, it has to reverse gravity. The game must have a beautiful graphical interface. The student can choose his textures. I recommend using Android Studio and LibGdx for this game. For the textures, I recomment using Photoshop.', '2019-05-07'),
(3, 'USA Travel Map for Tourists', 'Make a map for the tourists of USA, in order to help them find easy routes between cities.', 'Build a map using the next informations: each road has a length, and the tourist is travelling by car. The longer the road, the more fuel he is going to need, so he needs to pay more money. Help him find the shortest route between any given cities. The student can use any programming language he wants.', '2019-05-07'),
(4, 'This is a test', 'Write a test for this project.', 'Do not mind me I\'m just a test for this project!', '2019-05-07'),
(5, 'A project with no deadlines', 'An example of a project with no set deadlines.', 'A longer example of a project with no set deadlines.', '2019-05-07');

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `apply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(30, 'alex.martinas', 'Martinas2019Fii', 'Martinas Alexandru', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(31, 'vasile.voicu', 'Voicu2019Fii', 'Voicu Vasile', 'vasile.voicu@test.test', '123', '', NULL, NULL, NULL, NULL);

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `subjects` (`id`, `id_domain`, `id_project`) VALUES
(9, 12, 2),
(10, 8, 2),
(11, 11, 3),
(12, 1, 3),
(13, 2, 3),
(14, 3, 5),
(15, 2, 5);

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

CREATE TABLE `theses` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `project_link` varchar(255) DEFAULT NULL,
  `documentation_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `theses` (`id`, `id_project`, `id_student`, `project_link`, `documentation_link`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 7, NULL, NULL),
(4, 2, 7, NULL, NULL),
(5, 2, 7, NULL, NULL),
(6, 2, 7, NULL, NULL),
(7, 5, 7, NULL, NULL),
(8, 5, 7, NULL, NULL);

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `collaborations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`),
  ADD KEY `id_student` (`id_student`);

ALTER TABLE `commits`
  ADD KEY `id_deadline` (`id_deadline`),
  ADD KEY `id_student` (`id_student`);

ALTER TABLE `concepts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`),
  ADD KEY `id_project` (`id_project`);

ALTER TABLE `deadlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`);

ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_domain` (`id_domain`),
  ADD KEY `id_student` (`id_student`);

ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_teacher` (`id_teacher`);

ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `requests_ibfk_2` (`id_project`);

ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_domain` (`id_domain`),
  ADD KEY `id_project` (`id_project`);

ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `theses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_student` (`id_student`);

ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_domain` (`id_domain`),
  ADD KEY `id_teacher` (`id_teacher`);


ALTER TABLE `collaborations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `concepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `deadlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `theses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `collaborations`
  ADD CONSTRAINT `collaborations_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `collaborations_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `commits`
  ADD CONSTRAINT `commits_ibfk_1` FOREIGN KEY (`id_deadline`) REFERENCES `deadlines` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `commits_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `concepts`
  ADD CONSTRAINT `concepts_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `concepts_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `deadlines`
  ADD CONSTRAINT `deadlines_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `interests`
  ADD CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`id_domain`) REFERENCES `domains` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `interests_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`id_domain`) REFERENCES `domains` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `theses`
  ADD CONSTRAINT `theses_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `theses_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`id_domain`) REFERENCES `domains` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `work_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
