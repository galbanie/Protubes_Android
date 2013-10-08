-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2013 at 04:40 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `protubes`
--
CREATE DATABASE IF NOT EXISTS `protubes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `protubes`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(140) NOT NULL,
  `idImage` int(11) DEFAULT NULL,
  `identifiant` varchar(140) NOT NULL,
  `email` varchar(210) NOT NULL,
  `password` varchar(140) NOT NULL,
  `dateNaissance` date NOT NULL,
  `dateInscription` date NOT NULL,
  `pays` varchar(210) DEFAULT NULL,
  `codePostale` varchar(21) DEFAULT NULL,
  `telephone` varchar(210) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nom` (`nom`,`identifiant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `idImage`, `identifiant`, `email`, `password`, `dateNaissance`, `dateInscription`, `pays`, `codePostale`, `telephone`) VALUES
(1, 'moussaoui', 'yanis', NULL, 'yanis', 'yanis', 'yanis', '2013-10-07', '2013-10-23', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datePublication` date NOT NULL,
  `idImage` int(11) DEFAULT NULL,
  `chemin` varchar(270) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `titre` (`titre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `datePublication`, `idImage`, `chemin`, `titre`, `description`, `categorie`) VALUES
(1, '2013-10-05', NULL, 'videos/simpsons.mp4', 'The Simpsons', 'The simpsons videos', 'animation'),
(4, '2013-10-05', NULL, 'videos/beethoven.3gp', 'Beethoven', 's', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
