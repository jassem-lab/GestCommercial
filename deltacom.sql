-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 07 Juin 2022 à 08:29
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `deltacom`
--
CREATE DATABASE IF NOT EXISTS `deltacom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `deltacom`;

-- --------------------------------------------------------

--
-- Structure de la table `delta_profil`
--

CREATE TABLE IF NOT EXISTS `delta_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codsoc` int(11) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `delta_profil`
--

INSERT INTO `delta_profil` (`id`, `codsoc`, `profil`, `archive`) VALUES
(1, 1, 'Super-Administrateur', 0),
(2, 1, 'Utilisateur', 0);

-- --------------------------------------------------------

--
-- Structure de la table `delta_societe`
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
-- Contenu de la table `delta_societe`
--

INSERT INTO `delta_societe` (`id`, `raisonsocial`, `mf`, `rc`, `telephone`, `mail`, `adresse`, `logo`, `pied`, `entete`) VALUES
(1, 'Delta Web IT', '', '', '', 'deltawebit20@gmail.com', '0', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `delta_utilisateurs`
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
-- Contenu de la table `delta_utilisateurs`
--

INSERT INTO `delta_utilisateurs` (`id`, `codsoc`, `nom`, `prenom`, `mail`, `motdepasse`, `idprofil`, `archive`) VALUES
(1, 1, 'admin', 'admin', 'admin@admin.com', '123', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
