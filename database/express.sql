-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 07:26 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `express`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(3) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birth_date` varchar(20) NOT NULL,
  `registration_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `birth_date`, `registration_date`) VALUES
(6, 'John', 'Doe', '12/12/2011', '12/09/2020'),
(7, 'Irene', 'Burke', '31/08/03', '08/10/07'),
(8, 'Elliott', 'Knox', '28/12/09', '13/05/08'),
(10, 'Bevis', 'Medge', '18/10/12', '29/07/07'),
(11, 'Bertha', 'Constance', '02/07/03', '19/06/08'),
(12, 'Randall', 'Acton', '23/11/02', '20/03/08'),
(13, 'Rosalyn', 'Connor', '28/11/06', '02/08/07'),
(14, 'Steel', 'Michael', '01/03/16', '26/08/07'),
(15, 'Todd', 'Abigail', '02/01/01', '16/05/08'),
(16, 'Warren', 'Zephr', '26/11/01', '23/09/07'),
(17, 'Clare', 'Dana', '21/10/14', '29/09/07'),
(18, 'Donovan', 'Jocelyn', '22/02/12', '15/11/07'),
(19, 'Aladdin', 'Freya', '01/06/16', '10/09/07'),
(20, 'Justin', 'Hedy', '20/02/02', '22/02/08'),
(21, 'Ariel', 'Pandora', '09/02/21', '03/09/07'),
(22, 'Destiny', 'Laura', '02/08/14', '16/10/07'),
(23, 'Zane', 'Zorita', '02/04/18', '11/03/08'),
(24, 'Kiona', 'Kylie', '31/08/02', '02/03/08'),
(25, 'Jin', 'Garrison', '24/10/18', '11/11/07'),
(26, 'Eliana', 'Mary', '19/02/17', '14/03/08'),
(27, 'Candice', 'Wing', '27/07/11', '19/04/08'),
(28, 'Jane', 'Bevis', '25/08/01', '26/04/08'),
(29, 'Zachery', 'Charlotte', '03/03/03', '04/05/08'),
(30, 'Colleen', 'Gregory', '23/03/13', '21/02/08'),
(31, 'Denise', 'Suki', '27/09/00', '17/06/08'),
(32, 'Dominic', 'Joshua', '20/06/03', '09/11/07'),
(33, 'Isaac', 'Echo', '02/08/09', '11/07/07'),
(34, 'Rhea', 'Castor', '08/02/02', '22/04/08'),
(35, 'Lee', 'Idona', '18/09/15', '20/07/07'),
(36, 'Breanna', 'Mara', '15/03/02', '01/04/08'),
(37, 'Risa', 'Hayden', '20/11/06', '14/09/07'),
(38, 'Shellie', 'Fallon', '05/01/18', '14/08/07'),
(39, 'Kirk', 'Nash', '24/08/04', '11/08/07'),
(40, 'Mark', 'Karyn', '17/11/16', '31/03/08'),
(41, 'Leandra', 'Stewart', '22/07/15', '31/01/08'),
(42, 'Constance', 'Myles', '07/05/04', '27/01/08'),
(43, 'Sharon', 'Kimberly', '20/12/00', '22/06/08'),
(44, 'Patrick', 'Francesca', '23/10/11', '25/01/08'),
(45, 'Jared', 'Linus', '24/11/00', '01/09/07'),
(46, 'Henry', 'Tyler', '24/12/18', '11/12/07'),
(47, 'Adam', 'Gil', '25/02/09', '17/12/07'),
(48, 'Reece', 'Luke', '11/06/02', '02/02/08'),
(49, 'Sade', 'Warren', '02/06/13', '31/10/07'),
(50, 'Mark', 'Katell', '09/02/05', '19/01/08'),
(51, 'Yetta', 'Dylan', '03/02/16', '14/09/07'),
(52, 'Adria', 'Audrey', '09/12/20', '31/03/08'),
(53, 'Jemima', 'Shannon', '19/04/12', '22/04/08'),
(54, 'Rooney', 'Abdul', '28/07/09', '24/02/08'),
(55, 'Hop', 'Mona', '27/04/10', '16/07/07'),
(56, 'August', 'Reese', '30/03/17', '14/05/08'),
(57, 'Jena', 'Bell', '15/07/12', '19/09/07'),
(58, 'Zena', 'Caleb', '23/10/13', '07/07/08'),
(59, 'Felix', 'Breanna', '29/10/12', '18/04/08'),
(60, 'Amena', 'Chaim', '10/06/05', '04/03/08'),
(61, 'Malcolm', 'Charity', '10/11/11', '06/01/08'),
(62, 'Eagan', 'Dawn', '28/10/07', '12/02/08'),
(63, 'Farrah', 'Lucius', '16/01/16', '16/07/08'),
(64, 'Melyssa', 'Bell', '12/01/13', '08/02/08'),
(65, 'Raphael', 'Holly', '05/03/04', '03/04/08'),
(66, 'Damon', 'Rowan', '09/07/17', '02/10/07'),
(67, 'Caldwell', 'Tallulah', '21/12/13', '16/07/07'),
(68, 'Plato', 'Colt', '29/04/21', '16/02/08'),
(69, 'Scarlett', 'Austin', '02/12/01', '09/08/07'),
(70, 'Laurel', 'Alan', '26/01/19', '06/12/07'),
(71, 'Charissa', 'Kenneth', '29/05/08', '30/03/08'),
(72, 'Tallulah', 'Regina', '25/04/06', '17/12/07'),
(73, 'Uriel', 'Geoffrey', '18/05/02', '10/09/07'),
(74, 'Jack', 'Bruno', '29/04/18', '12/07/07'),
(75, 'Mufutau', 'Tad', '30/11/00', '13/10/07'),
(76, 'Reed', 'Griffith', '09/08/05', '22/07/07'),
(77, 'Macey', 'Cecilia', '29/03/03', '07/03/08'),
(78, 'Leo', 'Orlando', '22/07/07', '18/02/08'),
(79, 'Cynthia', 'Ginger', '16/03/05', '13/08/07'),
(80, 'Grady', 'Hall', '25/03/09', '06/03/08'),
(81, 'Callie', 'Meredith', '18/06/11', '26/11/07'),
(82, 'Chester', 'Jakeem', '02/02/13', '25/09/07'),
(83, 'Scarlet', 'Christian', '26/05/05', '08/07/07'),
(84, 'Drake', 'Maite', '26/02/13', '10/02/08'),
(85, 'Bernard', 'Candice', '03/06/14', '18/06/08'),
(86, 'Elijah', 'Tyrone', '28/06/07', '07/11/07'),
(87, 'Brandon', 'Eliana', '27/04/10', '29/02/08'),
(88, 'Gabriel', 'Gary', '02/11/01', '03/06/08'),
(89, 'Beau', 'Rogan', '05/12/04', '22/11/07'),
(90, 'May', 'Linda', '26/04/17', '07/07/07'),
(91, 'Wing', 'Uriel', '17/12/11', '09/03/08'),
(92, 'Dexter', 'Maxine', '06/05/17', '05/03/08'),
(93, 'Iliana', 'Keane', '04/09/17', '08/01/08'),
(94, 'Vincent', 'Ishmael', '07/07/03', '11/05/08'),
(95, 'Grady', 'Cole', '09/11/11', '18/11/07'),
(96, 'Lionel', 'Patricia', '31/01/01', '28/07/07'),
(97, 'Reed', 'Quincy', '27/10/02', '11/12/07'),
(98, 'Nathan', 'Magee', '09/04/09', '21/03/08'),
(99, 'Jonas', 'Todd', '19/07/05', '24/03/08'),
(100, 'Kim', 'Mallory', '31/12/06', '06/03/08'),
(101, 'Kyle', 'Cherokee', '25/06/01', '09/02/08'),
(102, 'Conan', 'Zena', '31/01/10', '29/04/08'),
(103, 'Martin', 'Erasmus', '31/12/00', '16/05/08'),
(104, 'Donna', 'Cally', '14/03/06', '12/06/08'),
(105, 'Nolan', 'Paul', '20/09/00', '16/03/08'),
(106, 'Nola', 'Martena', '08/11/05', '21/12/07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
