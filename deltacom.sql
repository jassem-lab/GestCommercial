-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2022 at 08:34 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deltacom`
--
CREATE DATABASE IF NOT EXISTS `deltacom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `deltacom`;

-- --------------------------------------------------------

--
-- Table structure for table `delta_action`
--

CREATE TABLE IF NOT EXISTS `delta_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_action`
--

INSERT INTO `delta_action` (`id`, `action`) VALUES
(1, 'Creation'),
(2, 'Modification\r\n'),
(3, 'Suppression\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `delta_banques`
--

CREATE TABLE IF NOT EXISTS `delta_banques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_banques`
--

INSERT INTO `delta_banques` (`id`, `code`, `designation`, `codsoc`) VALUES
(3, 'ATB', 'ATB', 1),
(4, 'UIB', 'UIB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_devis`
--

CREATE TABLE IF NOT EXISTS `delta_devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  `nombre_chiffre` int(11) NOT NULL,
  `symbole` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_devis`
--

INSERT INTO `delta_devis` (`id`, `code`, `designation`, `codsoc`, `nombre_chiffre`, `symbole`) VALUES
(1, 'USD', 'Dollar', 1, 2, '$'),
(2, 'Euro', 'Euro', 1, 2, '€'),
(3, 'TND', 'Dinar', 1, 3, 'TND'),
(4, 'CAD', 'Dollar', 1, 2, '$');

-- --------------------------------------------------------

--
-- Table structure for table `delta_documents`
--

CREATE TABLE IF NOT EXISTS `delta_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `delta_documents`
--

INSERT INTO `delta_documents` (`id`, `document`) VALUES
(1, 'Utilisateur'),
(2, 'Societe'),
(3, 'Famille produit'),
(4, 'Unite'),
(5, 'Marque'),
(6, 'Emplacement'),
(7, 'Banque\r\n'),
(8, 'Devis'),
(9, 'TVA'),
(10, 'Pays'),
(11, 'Région'),
(12, 'Gouvernorat'),
(13, 'Mode paiement'),
(14, 'Magasin\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `delta_emplacements`
--

CREATE TABLE IF NOT EXISTS `delta_emplacements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delta_emplacements`
--

INSERT INTO `delta_emplacements` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'E1', 'E1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_famille_produit`
--

CREATE TABLE IF NOT EXISTS `delta_famille_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_famille_produit`
--

INSERT INTO `delta_famille_produit` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'eau', '22224', 1),
(2, 'Cake', '213215', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_fournisseurs`
--

CREATE TABLE IF NOT EXISTS `delta_fournisseurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_fournisseurs`
--

INSERT INTO `delta_fournisseurs` (`id`, `code`, `designation`) VALUES
(1, 'Fournisseur1', 'Jassem Gaaloul'),
(2, 'Fournisseur2', 'Majdi Trabelsi');

-- --------------------------------------------------------

--
-- Table structure for table `delta_gouvernorats`
--

CREATE TABLE IF NOT EXISTS `delta_gouvernorats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `delta_gouvernorats`
--

INSERT INTO `delta_gouvernorats` (`id`, `code`, `designation`, `codsoc`) VALUES
(2, 'Tunis', 'Tunis', 1),
(3, 'Nabeul', 'Nabeul', 1),
(4, 'Monastir', 'Monastir', 1),
(5, 'Ariana', 'Ariana', 1),
(6, 'Ben arous', 'Ben Arous', 1),
(7, 'Mahdia', 'Mahdia', 1),
(8, 'Sousse', 'Sousse', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_log`
--

CREATE TABLE IF NOT EXISTS `delta_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateheure` varchar(255) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  `document` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `iddocument` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=189 ;

--
-- Dumping data for table `delta_log`
--

INSERT INTO `delta_log` (`id`, `dateheure`, `idutilisateur`, `document`, `action`, `iddocument`, `code`) VALUES
(1, '2022-06-08 07:45:24', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(2, '2022-06-08 08:02:36', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(3, '2022-06-08 08:04:00', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(4, '2022-06-08 08:05:55', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(5, '2022-06-08 08:06:02', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(6, '2022-06-08 08:06:02', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(7, '2022-06-08 08:06:03', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(8, '2022-06-08 08:08:03', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(9, '2022-06-08 08:08:06', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(10, '2022-06-08 08:08:07', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(11, '2022-06-08 08:08:17', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(12, '2022-06-08 08:08:17', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(13, '2022-06-08 08:08:18', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(14, '2022-06-08 08:08:18', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(15, '2022-06-08 08:09:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(16, '2022-06-08 08:09:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(17, '2022-06-08 08:09:19', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(18, '2022-06-08 08:09:19', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(19, '2022-06-08 08:09:37', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(20, '2022-06-08 08:09:37', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(21, '2022-06-08 08:09:37', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(22, '2022-06-08 08:09:38', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(23, '2022-06-08 08:09:38', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(24, '2022-06-08 08:14:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(25, '2022-06-08 08:14:12', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(26, '2022-06-08 08:18:05', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(27, '2022-06-08 08:18:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(28, '2022-06-08 08:18:12', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(29, '2022-06-08 08:18:12', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(30, '2022-06-08 08:19:03', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(31, '2022-06-08 08:19:04', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(32, '2022-06-08 08:22:39', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(33, '2022-06-08 08:22:40', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(34, '2022-06-08 08:22:58', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(35, '2022-06-08 08:22:59', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(36, '2022-06-08 08:24:11', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(37, '2022-06-08 08:24:12', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(38, '2022-06-08 08:24:13', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(39, '2022-06-08 08:24:36', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(40, '2022-06-08 08:24:50', 1, 0, 'Création d''une Famille produit :eau', 0, ''),
(41, '2022-06-08 08:34:45', 1, 3, '1', 1, ''),
(42, '2022-06-08 08:39:33', 1, 3, '1', 2, ''),
(43, '2022-06-08 09:13:57', 0, 3, '2', 1, ''),
(44, '2022-06-08 09:14:11', 0, 3, '2', 2, ''),
(45, '2022-06-08 09:14:16', 0, 3, '2', 2, ''),
(46, '2022-06-08 09:19:11', 1, 3, '1', 3, ''),
(47, '2022-06-08 09:19:11', 1, 3, '1', 1, ''),
(48, '2022-06-08 09:20:29', 1, 3, '1', 2, ''),
(49, '2022-06-08 09:24:52', 1, 3, '1', 3, ''),
(50, '2022-06-08 09:26:48', 1, 3, '1', 4, ''),
(51, '2022-06-08 09:27:46', 1, 3, '1', 5, ''),
(52, '2022-06-08 09:28:06', 1, 3, '1', 6, ''),
(53, '2022-06-08 09:30:32', 1, 3, '1', 7, ''),
(54, '2022-06-08 09:30:37', 1, 3, '1', 3, ''),
(55, '2022-06-08 09:39:26', 0, 3, '2', 5, ''),
(56, '2022-06-08 09:45:48', 1, 3, '1', 1, ''),
(57, '2022-06-08 09:47:41', 1, 3, '1', 1, ''),
(58, '2022-06-08 09:49:30', 1, 3, '1', 1, ''),
(59, '2022-06-08 09:50:15', 1, 3, '1', 1, ''),
(60, '2022-06-08 09:53:28', 0, 3, '2', 1, ''),
(61, '2022-06-08 09:53:28', 0, 3, '2', 1, ''),
(62, '2022-06-08 09:54:46', 1, 3, '2', 1, ''),
(63, '2022-06-08 09:54:46', 1, 3, '2', 1, ''),
(64, '2022-06-08 09:57:03', 1, 3, '2', 1, ''),
(65, '2022-06-08 09:57:03', 1, 3, '1', 1, ''),
(66, '2022-06-08 09:58:05', 1, 3, '2', 1, ''),
(67, '2022-06-08 09:58:05', 1, 3, '1', 2, ''),
(68, '2022-06-08 09:58:11', 1, 3, '1', 1, ''),
(69, '2022-06-08 09:58:11', 1, 3, '1', 3, ''),
(70, '2022-06-08 09:59:45', 1, 3, '1', 2, ''),
(71, '2022-06-08 09:59:45', 1, 3, '1', 1, ''),
(72, '2022-06-08 10:10:37', 1, 3, '1', 1, ''),
(73, '2022-06-08 10:10:55', 1, 3, '1', 2, ''),
(74, '2022-06-08 10:11:10', 1, 3, '1', 3, ''),
(75, '2022-06-08 10:11:58', 1, 3, '2', 2, ''),
(76, '2022-06-08 10:16:37', 1, 3, '1', 1, ''),
(77, '2022-06-08 10:23:17', 1, 3, '2', 1, ''),
(78, '2022-06-08 10:23:17', 1, 3, '1', 1, ''),
(79, '2022-06-08 10:23:24', 1, 3, '1', 2, ''),
(80, '2022-06-08 10:23:24', 1, 3, '1', 2, ''),
(81, '2022-06-08 10:23:35', 1, 3, '1', 3, ''),
(82, '2022-06-08 10:23:35', 1, 3, '1', 3, ''),
(83, '2022-06-08 10:25:09', 1, 3, '1', 1, ''),
(84, '2022-06-08 10:25:18', 1, 3, '1', 2, ''),
(85, '2022-06-08 10:25:27', 1, 3, '1', 3, ''),
(86, '2022-06-08 10:28:04', 1, 3, '1', 1, ''),
(87, '2022-06-08 10:28:12', 1, 3, '1', 2, ''),
(88, '2022-06-08 10:28:17', 1, 3, '1', 3, ''),
(89, '2022-06-08 10:28:22', 1, 3, '1', 4, ''),
(90, '2022-06-08 10:31:56', 1, 3, '1', 1, ''),
(91, '2022-06-08 10:32:19', 1, 3, '1', 1, ''),
(92, '2022-06-08 10:32:50', 1, 3, '1', 1, ''),
(93, '2022-06-08 10:33:02', 1, 3, '2', 1, ''),
(94, '2022-06-08 10:35:15', 1, 3, '2', 1, ''),
(95, '2022-06-08 10:35:15', 1, 3, '1', 1, ''),
(96, '2022-06-08 10:36:58', 1, 3, '1', 1, ''),
(97, '2022-06-08 10:37:09', 1, 3, '1', 2, ''),
(98, '2022-06-08 10:37:19', 1, 3, '2', 2, ''),
(99, '2022-06-08 10:37:26', 1, 3, '1', 3, ''),
(100, '2022-06-08 10:37:31', 1, 3, '1', 4, ''),
(101, '2022-06-08 10:37:36', 1, 3, '1', 5, ''),
(102, '2022-06-08 10:37:42', 1, 3, '1', 6, ''),
(103, '2022-06-08 10:37:49', 1, 3, '1', 7, ''),
(104, '2022-06-08 10:40:19', 1, 3, '1', 1, ''),
(105, '2022-06-08 10:40:26', 1, 3, '1', 2, ''),
(106, '2022-06-08 10:40:31', 1, 3, '1', 3, ''),
(107, '2022-06-08 10:44:17', 1, 3, '1', 1, ''),
(108, '2022-06-08 10:44:23', 1, 3, '1', 2, ''),
(109, '2022-06-08 10:44:30', 1, 3, '1', 3, ''),
(110, '2022-06-08 10:44:34', 1, 3, '1', 4, ''),
(111, '2022-06-08 10:44:38', 1, 3, '1', 5, ''),
(112, '2022-06-08 10:44:46', 1, 3, '1', 6, ''),
(113, '2022-06-08 10:58:30', 1, 3, '1', 1, ''),
(114, '2022-06-08 10:58:38', 1, 3, '1', 2, ''),
(115, '2022-06-08 10:58:41', 1, 3, '2', 1, ''),
(116, '2022-06-08 11:00:06', 1, 3, '1', 2, ''),
(117, '2022-06-08 11:10:13', 1, 3, '1', 1, ''),
(118, '2022-06-08 11:12:32', 1, 3, '1', 1, ''),
(119, '2022-06-08 11:15:19', 1, 3, '1', 4, ''),
(120, '2022-06-08 11:17:26', 1, 3, '1', 3, ''),
(121, '2022-06-08 11:18:25', 1, 3, '1', 4, ''),
(122, '2022-06-08 11:19:37', 1, 3, '1', 1, ''),
(123, '2022-06-08 11:19:40', 1, 3, '1', 2, ''),
(124, '2022-06-08 11:22:02', 1, 3, '1', 8, ''),
(125, '2022-06-08 11:23:20', 1, 3, '1', 4, ''),
(126, '2022-06-08 11:24:47', 1, 3, '1', 7, ''),
(127, '2022-06-08 13:27:54', 1, 7, '3', 4, ''),
(128, '2022-06-08 13:28:00', 1, 7, '1', 4, ''),
(129, '2022-06-08 13:29:22', 1, 7, '3', 1, ''),
(130, '2022-06-08 13:33:14', 1, 7, '3', 2, 'STB'),
(131, '2022-06-08 14:44:04', 1, 8, '1', 2, ''),
(132, '2022-06-08 14:44:09', 1, 8, '3', 1, 'test'),
(133, '2022-06-08 14:45:26', 1, 8, '3', 2, 'dollar'),
(134, '2022-06-08 14:45:45', 1, 8, '1', 1, ''),
(135, '2022-06-08 14:46:11', 1, 8, '2', 1, ''),
(136, '2022-06-08 14:46:48', 1, 8, '1', 2, ''),
(137, '2022-06-08 14:47:03', 1, 8, '1', 3, ''),
(138, '2022-06-08 14:47:14', 1, 8, '1', 4, ''),
(139, '2022-06-08 14:47:17', 1, 8, '2', 4, ''),
(140, '2022-06-08 15:06:22', 1, 13, '2', 0, ''),
(141, '2022-06-08 15:06:57', 1, 13, '2', 0, ''),
(142, '2022-06-08 15:06:58', 1, 13, '2', 0, ''),
(143, '2022-06-08 15:06:59', 1, 13, '2', 0, ''),
(144, '2022-06-08 15:07:04', 1, 13, '2', 0, ''),
(145, '2022-06-08 15:08:18', 1, 13, '2', 0, ''),
(146, '2022-06-08 15:08:24', 1, 13, '2', 0, ''),
(147, '2022-06-08 15:08:40', 1, 13, '2', 0, ''),
(148, '2022-06-08 15:08:43', 1, 13, '2', 0, ''),
(149, '2022-06-08 15:08:50', 1, 13, '2', 0, ''),
(150, '2022-06-08 15:08:51', 1, 13, '2', 0, ''),
(151, '2022-06-08 15:09:12', 1, 13, '2', 0, ''),
(152, '2022-06-08 15:09:12', 1, 13, '2', 0, ''),
(153, '2022-06-08 15:09:13', 1, 13, '2', 0, ''),
(154, '2022-06-08 15:18:14', 1, 13, '2', 0, ''),
(155, '2022-06-08 15:18:44', 1, 13, '2', 0, ''),
(156, '2022-06-08 15:19:27', 1, 13, '2', 0, ''),
(157, '2022-06-08 15:19:50', 1, 13, '2', 0, ''),
(158, '2022-06-08 15:19:50', 1, 13, '2', 0, ''),
(159, '2022-06-08 15:19:57', 1, 13, '2', 0, ''),
(160, '2022-06-08 15:20:03', 1, 13, '2', 0, ''),
(161, '2022-06-08 15:20:03', 1, 13, '2', 0, ''),
(162, '2022-06-08 15:20:03', 1, 13, '2', 0, ''),
(163, '2022-06-08 15:20:04', 1, 13, '2', 0, ''),
(164, '2022-06-08 15:20:04', 1, 13, '2', 0, ''),
(165, '2022-06-08 15:20:10', 1, 13, '2', 0, ''),
(166, '2022-06-08 15:20:10', 1, 13, '2', 0, ''),
(167, '2022-06-08 15:20:11', 1, 13, '2', 0, ''),
(168, '2022-06-08 15:20:11', 1, 13, '2', 0, ''),
(169, '2022-06-08 15:20:11', 1, 13, '2', 0, ''),
(170, '2022-06-08 15:20:11', 1, 13, '2', 0, ''),
(171, '2022-06-08 15:21:40', 1, 13, '2', 0, ''),
(172, '2022-06-09 22:56:33', 1, 10, '3', 7, 'Finland'),
(173, '2022-06-10 07:54:31', 1, 5, '1', 1, ''),
(174, '2022-06-10 08:10:25', 1, 5, '1', 2, ''),
(175, '2022-06-10 08:27:28', 1, 5, '1', 3, ''),
(176, '2022-06-10 08:43:38', 1, 5, '1', 1, ''),
(177, '2022-06-10 08:47:03', 1, 5, '1', 2, ''),
(178, '2022-06-10 08:47:04', 1, 5, '1', 3, ''),
(179, '2022-06-10 08:47:05', 1, 5, '1', 4, ''),
(180, '2022-06-10 08:48:09', 1, 5, '1', 5, ''),
(181, '2022-06-10 08:48:25', 1, 5, '1', 6, ''),
(182, '2022-06-10 08:48:28', 1, 5, '1', 7, ''),
(183, '2022-06-10 08:48:28', 1, 5, '1', 8, ''),
(184, '2022-06-10 08:48:29', 1, 5, '1', 9, ''),
(185, '2022-06-10 08:48:29', 1, 5, '1', 10, ''),
(186, '2022-06-10 08:48:30', 1, 5, '1', 11, ''),
(187, '2022-06-10 08:49:01', 1, 5, '1', 12, ''),
(188, '2022-06-10 08:51:33', 1, 5, '1', 13, '');

-- --------------------------------------------------------

--
-- Table structure for table `delta_lots`
--

CREATE TABLE IF NOT EXISTS `delta_lots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_lots`
--

INSERT INTO `delta_lots` (`id`, `code`, `designation`) VALUES
(1, 'lot1', 'Lot 1'),
(2, 'lot2', 'Lot 2');

-- --------------------------------------------------------

--
-- Table structure for table `delta_magasins`
--

CREATE TABLE IF NOT EXISTS `delta_magasins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_magasins`
--

INSERT INTO `delta_magasins` (`id`, `code`, `designation`, `codsoc`) VALUES
(2, 'Magasin Hammem sousse', 'Magasing Hammem sousse', 1),
(4, 'Magasin Sahloul', 'Magasin Sahloul', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_marques`
--

CREATE TABLE IF NOT EXISTS `delta_marques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delta_marques`
--

INSERT INTO `delta_marques` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'Coke', 'Coca-Cola', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_mode_paiement`
--

CREATE TABLE IF NOT EXISTS `delta_mode_paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_mode_paiement`
--

INSERT INTO `delta_mode_paiement` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'Chèque', 'Chèque', 1),
(2, 'Espèce', 'Espèce', 1),
(3, 'Virement', 'Virement', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_natures`
--

CREATE TABLE IF NOT EXISTS `delta_natures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nature` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_natures`
--

INSERT INTO `delta_natures` (`id`, `nature`) VALUES
(1, 'Produit'),
(2, 'Service\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `delta_parametres`
--

CREATE TABLE IF NOT EXISTS `delta_parametres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timbre` varchar(255) NOT NULL,
  `fodec` varchar(255) NOT NULL,
  `exercice` varchar(255) NOT NULL,
  `assujetti` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delta_parametres`
--

INSERT INTO `delta_parametres` (`id`, `timbre`, `fodec`, `exercice`, `assujetti`) VALUES
(1, '600', '1', '2022', '1');

-- --------------------------------------------------------

--
-- Table structure for table `delta_pays`
--

CREATE TABLE IF NOT EXISTS `delta_pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `delta_pays`
--

INSERT INTO `delta_pays` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, 'Tunisie', 'Tunisie', 1),
(2, 'USA', 'USA', 1),
(4, 'Egypt', 'Egypt', 1),
(5, 'Qatar', 'Qatar', 1),
(6, 'Algerie', 'Algerie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_produits`
--

CREATE TABLE IF NOT EXISTS `delta_produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `code_ngp` varchar(255) NOT NULL,
  `famille` int(11) NOT NULL,
  `unite` int(11) NOT NULL,
  `marque` int(11) NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `date_achat` varchar(255) NOT NULL,
  `date_fabrication` varchar(255) NOT NULL,
  `date_expiration` varchar(255) NOT NULL,
  `prix_achat_ht` varchar(255) NOT NULL,
  `prix_achat_ttc` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `seuil` varchar(255) NOT NULL,
  `tva` int(11) NOT NULL,
  `emplacement` int(11) NOT NULL,
  `magasin` int(11) NOT NULL,
  `nature` int(11) NOT NULL,
  `lot` int(11) NOT NULL,
  `prix_vente_ht` varchar(255) NOT NULL,
  `prix_vente_ttc` varchar(255) NOT NULL,
  `numero_serie` int(11) NOT NULL,
  `fodec` int(11) NOT NULL,
  `produit_compose` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `delta_profil`
--

CREATE TABLE IF NOT EXISTS `delta_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codsoc` int(11) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_profil`
--

INSERT INTO `delta_profil` (`id`, `codsoc`, `profil`, `archive`) VALUES
(1, 1, 'Super-Administrateur', 0),
(2, 1, 'Utilisateur', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_regions`
--

CREATE TABLE IF NOT EXISTS `delta_regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delta_regions`
--

INSERT INTO `delta_regions` (`id`, `code`, `designation`, `codsoc`) VALUES
(2, 'Grand Tunis', 'Grand Tunis', 1),
(3, 'Cap Bon', 'Cap Bon', 1),
(4, 'Sahel', 'Sahel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_societe`
--

CREATE TABLE IF NOT EXISTS `delta_societe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raisonsocial` varchar(255) NOT NULL,
  `mf` varchar(255) NOT NULL,
  `rc` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `pied` varchar(255) NOT NULL,
  `entete` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delta_societe`
--

INSERT INTO `delta_societe` (`id`, `raisonsocial`, `mf`, `rc`, `telephone`, `mail`, `adresse`, `logo`, `pied`, `entete`) VALUES
(1, 'Delta Web IT', '', '', '', 'deltawebit20@gmail.com', '0', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `delta_tvas`
--

CREATE TABLE IF NOT EXISTS `delta_tvas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delta_tvas`
--

INSERT INTO `delta_tvas` (`id`, `code`, `designation`, `codsoc`) VALUES
(1, '15%', '15%', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_types`
--

CREATE TABLE IF NOT EXISTS `delta_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delta_types`
--

INSERT INTO `delta_types` (`id`, `type`) VALUES
(1, 'Normal'),
(2, 'Fifo'),
(3, 'Filo\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `delta_unite_produit`
--

CREATE TABLE IF NOT EXISTS `delta_unite_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `codsoc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delta_unite_produit`
--

INSERT INTO `delta_unite_produit` (`id`, `code`, `designation`, `codsoc`) VALUES
(2, 'KG', 'Kilogramme', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delta_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `delta_utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codsoc` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `idprofil` int(11) NOT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delta_utilisateurs`
--

INSERT INTO `delta_utilisateurs` (`id`, `codsoc`, `nom`, `prenom`, `mail`, `motdepasse`, `idprofil`, `archive`) VALUES
(1, 1, 'admin', 'admin', 'admin@admin.com', '123', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delta_vehicules`
--

CREATE TABLE IF NOT EXISTS `delta_vehicules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
