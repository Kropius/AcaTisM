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
(2, 1, 7),
(3, 9, 3),
(4, 9, 1),
(5, 3, 11),
(6, 1, 9);

CREATE TABLE `commits` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_deadline` int(11) NOT NULL,
  `description` text,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `commits` (`id`, `id_student`, `id_deadline`, `description`, `add_date`) VALUES
(1, 11, 25, 'ceva', '2019-06-09'),
(2, 11, 27, '', '2019-06-09'),
(3, 11, 26, '', '2019-06-09');

CREATE TABLE `concepts` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `concepts` (`id`, `id_teacher`, `id_project`) VALUES
(16, 3, 5),
(17, 3, 6),
(18, 3, 9),
(19, 3, 10),
(21, 1, 11),
(22, 9, 12),
(23, 1, 13),
(24, 1, 14);

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
(21, '2020-03-26', '.born', 'birth', 'Be born', 5, '2019-05-20'),
(25, '2020-03-22', '.c', 'code', 'asd', 6, '2019-05-20'),
(26, '2020-06-22', '.pdf', 'LTNS', 'documentation', 6, '2019-05-20'),
(27, '2020-04-22', '.html', 'Scholarly HTML', 'The project\'s Architecture', 6, '2019-05-20'),
(32, '2020-10-12', '.*', 'LTN', 'DECV', 13, '2019-06-09'),
(33, '2020-12-12', '.cpp', 'LTN', 'DEC', 13, '2019-06-09'),
(34, '2020-01-01', '.html', 'LTN', 'FEDFS', 13, '2019-06-09'),
(35, '2020-06-05', '.cs', 'LTN', 'DDD', 13, '2019-06-09');

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

INSERT INTO `interests` (`id`, `id_student`, `id_domain`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 11),
(4, 3, 8),
(5, 3, 7),
(6, 3, 3),
(7, 11, 12),
(8, 11, 8),
(9, 9, 1),
(10, 9, 2);

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `content` text NOT NULL,
  `id_sender` varchar(1) NOT NULL,
  `sent_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `added_date` date NOT NULL,
  `last_edit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `projects` (`id`, `name`, `short_description`, `long_description`, `added_date`, `last_edit`) VALUES
(5, 'A project with no deadlines', 'An example of a project with no set deadlines. But now it has some deadlines.', 'A longer example of a project with no set deadlines.', '2019-05-07', '2019-05-20'),
(6, 'Don\'t Fly Underground 2', 'A game with a bird avoiding obstacles on Android.', 'An Android video game to play alone or with friends by beating their score! Help the bird avoid the obstacles in it\'s way and make some points!', '2019-05-20', '2019-05-20'),
(7, 'asda', 'asdasfafs', 'asfsadgsadg', '2019-05-20', '2019-05-20'),
(8, 'asda', 'asdasfafs', 'asfsadgsadg', '2019-05-20', '2019-05-20'),
(9, 'asdasd', 'ffdff', 'aaasd', '2019-06-08', '2019-06-08'),
(10, 'ASDASD', 'ASDASDASD', 'FASFASD', '2019-06-08', '2019-06-08'),
(11, 'fdgdf', 'gdfgdfgdf', 'gdfgdfgd', '2019-06-08', '2019-06-08'),
(12, 'AcaTisM', 'project acatism', 'very complex', '2019-06-08', '2019-06-08'),
(13, 'proiect test', 'o descriere', 'ceva', '2019-06-09', '2019-06-09'),
(14, 'assa', 'asfasfas', 'asfasfa', '2019-06-09', '2019-06-09');

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
(1, 'matei.cioata', 'f439c098085222d9de9753f1be43e25a', 'Cioata Matei-Alexandru', 'matei_alex1998@yahoo.ro', '123', 'Computer Science', 'asdasd', 's', 'dasd', 'f'),
(2, 'mihnea.rezmerita', 'acf0240673628c78654e8e0f2f020ee1', 'Rezmerita Mihnea-Ioan', 'mihnea.superbaiat@gmail.com', '124', 'Computer Science', NULL, NULL, NULL, NULL),
(3, 'andrei.halauca', 'b9221724b681f32d7e3d6e9a3e7d5e46', 'Halauca Andrei', 'ahalauca@gmail.com', '125', 'Computer Science', 'Salut, sunt Andrei!', '15', 'toata', '1'),
(4, 'irina.cercel', 'ca060d17f9876d14aa311e7a5e37f01a', 'Cercel Irina-Elena', 'iriina17@yahoo.com', '126', 'Computer Science', NULL, NULL, NULL, NULL),
(5, 'andrei.damian', '257ee6c8d414641a75eabc7263c83125', 'Damian Andrei', 'mihnear.1997@gmail.com', '127', 'Computer Science', NULL, NULL, NULL, NULL),
(6, 'radu.lipan', '176063ae94db003bffd754df58cc280c', 'Lipan Radu-Matei', 'mihnea.1997@yahoo.com', '128', 'Computer Science', NULL, NULL, NULL, NULL),
(7, 'sergiu.salceanu', 'eeb931eb53f45398e866bd3744f4ef23', 'Salceanu Sergiu-Paul', 'splinter981@gmail.com', '129', 'Computer Science', NULL, NULL, NULL, NULL),
(8, 'lavinia.disca', '850a1729c91d66f6f4dcc4d2baf2e316', 'Disca Lavinia', 'irina.cercel1998@gmail.com', '120', 'Computer Science', NULL, NULL, NULL, NULL),
(9, 'octavian.cota', '4b1120da535075ec3714b55776364ef3', 'Cota Stefan-Octavian', 'andreihalauca@yahoo.com', '130', 'Computer Science', '', '', '', ''),
(10, 'andrei.chiperi', '4b67463520b0a0012a3b14c43811c83d', 'Chiperi Andrei', 'agronaut02@gmail.com', '131', 'Computer Science', NULL, NULL, NULL, NULL),
(11, 'catalin.belu', 'adfbeef00641e74f56b82db89071b420', 'Belu Catalin-Cosmin', 'mihnea.rezmerita@romanvoda.ro', '132', 'Computer Science', '', '', '', ''),
(12, 'bianca.bacaoanu', '30f424a8128d5af5c0bc021e7c69b9a7', 'Bacaoanu Adriana-Bianca', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(13, 'eugen.zaharia', 'e5f3036e9f1586f7f91e44c297400288', 'Zaharia Eugen', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(14, 'corina.garam', 'bda60d9639f0f98b02ba193bb7706b94', 'Garam Corina', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(15, 'marian.mihai', 'aa7de5d46b84f881eac3e5f9e4deaf39', 'Mihai Marian-Sebastian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(16, 'cosmin.iureanu', '65854717bba8d0ddad710fa05fc110c8', 'Iureanu Cosmin-Marian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(17, 'remus.bulboaca', '997816d7e539419b5880157eceb9322f', 'Bulboaca Remus', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(18, 'cotoc.sebastian', 'ae0ded66fb75ac2da5f94ba1b497ece9', 'Cotoc Sebastian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(19, 'petru.martincu', 'f7d15167ea5b492792f39f2ccdb65e20', 'Martincu Petru', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(20, 'constantin.listar', 'b6c8f784e42a0f579f9b7dead322e301', 'Listar Constantin', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(21, 'stefania.andries', 'e0ef3715f591f2bc831377c32c70c860', 'Andries Stefania', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(22, 'alin.vrabie', 'ff406cb88a121b831cab8075c520f7e7', 'Vrabie Alin-Stefan', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(23, 'cristian.adam', '7b08c651fda0f7961a8e9f4b0d96d899', 'Adam Cristian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(24, 'marius.blaj', 'f12cf540ac8fbdeef45886bad76d8ba6', 'Blaj Marius-Marian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(25, 'adrian.lupu', 'b22dd7b7e31d4466f70812b81844a7bc', 'Lupu Adrian-Damian', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(26, 'raluca.dascalu', '3c6be23f6f34bbb76d6a96e2cecb269d', 'Dascalu Raluca', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(27, 'nadia.roman', '240c98beac7e4bd9a898ed3df4cd89f3', 'Roman Nadia-Georgiana', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(28, 'deny.patrascu', '53f85d53dd6db22950dd44de90da1284', 'Patrascu Deny-Constantin', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(29, 'daniel.iacob', '8ada95b2e7597c3ffce07ba2d42c6427', 'Iacob Daniel-Constantin', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(30, 'alex.martinas', '154d925186f7835dc7664c6e687e540b', 'Martinas Alexandru', 'test@test.com', '133', 'Computer Science', NULL, NULL, NULL, NULL),
(31, 'vasile.voicu', '3fe57f1363455273dd984579fc6d2323', 'Voicu Vasile', 'vasile.voicu@test.test', '123', '', NULL, NULL, NULL, NULL);

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `subjects` (`id`, `id_domain`, `id_project`) VALUES
(47, 3, 5),
(48, 2, 5),
(49, 9, 5),
(53, 12, 6),
(54, 8, 6),
(55, 4, 6),
(56, 1, 9),
(58, 3, 12),
(62, 1, 13),
(63, 2, 13),
(64, 5, 14),
(65, 9, 14);

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
(1, 'cosmin.varlan', 'b99601bd29f93c6e4ec2411db3d6517e', 'Varlan Cosmin', 'Database Developer', 'cosmin.varlan@test.email.ro', '123', 'asdasd', 'sadas', 'ffff'),
(3, 'cristian.frasinaru', '80ce281c875e1b1c89c37b6725e6bd4e', 'Cristian Frasinaru', 'Java Back-end Developer', 'matei_alex1998@yahoo.ro', '234', NULL, NULL, NULL),
(4, 'cristian.vidrascu', 'c6e8c64e0de2e25257759c12bf999b7d', 'Cristian Vidrascu', 'C++ developer', 'irina.cercel1998@gmail.com', '345', NULL, NULL, NULL),
(5, 'madalina.raschip', '892a6e381c62274c092ca14d54e3bd82', 'Raschip Madalina', 'Data Structures Teacher', 'iriina17@yahoo.com', '456', NULL, NULL, NULL),
(6, 'cristian.gatu', '7ec48a0de1f160267d974a52832c2b97', 'Gatu Cristian', 'Data Structures Teacher', 'mihnea.superbaiat@gmail.com', '678', NULL, NULL, NULL),
(7, 'vlad.radulescu', 'f1733cee30e45c1f5e9f928ad3174245', 'Radulescu Vlad', 'Computer Architecture Teacher', 'andreihalauca@yahoo.com', '789', NULL, NULL, NULL),
(8, 'adrian.iftene', 'bff071931c1ce4d21a7064d3dfba243c', 'Iftene Adrian', 'Dean of the Faculty of Computer Science', 'ahalauca@gmail.com', '890', NULL, NULL, NULL),
(9, 'andrei.panu', '6b15c791ff983e22510a0acdd2370532', 'Panu Andrei', 'Web Developer', 'mihnea.1997@yahoo.com', '901', NULL, NULL, NULL),
(10, 'sabin.buraga', 'fd5b41853d1cf1ef95990be1e6378a92', 'Buraga Sabin', 'Web Developer', 'mihnear.1997@gmail.com', '012', NULL, NULL, NULL),
(11, 'alex.moruz', '34e23f6e16f0a3c49c28b1e5929e0882', 'Moruz Alexandru', 'Back-end Developer', 'splinter981@gmail.com', '134', NULL, NULL, NULL),
(12, 'oana.captarencu', 'd6cbc7b0b29cf453ee96033b097931b5', 'Captarencu Oana', 'Petri Nets Researcher', 'mihnea.rezmerita@romanvoda.ro', '256', NULL, NULL, NULL),
(13, 'lenuta.alboaie', '2e03fbee160a4e476585c76f87f96b83', 'Alboaie Lenuta', 'C++ Developer', 'agronaut02@gmail.com', '367', NULL, NULL, NULL);

CREATE TABLE `theses` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `project_link` varchar(255) DEFAULT NULL,
  `documentation_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `theses` (`id`, `id_project`, `id_student`, `project_link`, `documentation_link`) VALUES
(2, 11, 7, 'ddd', NULL),
(3, 12, 3, NULL, NULL),
(4, 12, 1, NULL, NULL),
(5, 6, 11, 'dd', NULL),
(6, 13, 9, 'ceva', NULL);

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `work` (`id`, `id_domain`, `id_teacher`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 3, 1);


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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `concepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `deadlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

ALTER TABLE `domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `theses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


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
