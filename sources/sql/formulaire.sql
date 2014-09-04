-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 04 Septembre 2014 à 11:22
-- Version du serveur :  5.5.34
-- Version de PHP :  5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(134) NOT NULL,
  `name` varchar(134) NOT NULL,
  `firstname` varchar(132) NOT NULL,
  `password` varchar(32) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(132) NOT NULL,
  `codePostal` varchar(5) NOT NULL,
  `ville` varchar(132) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `tel` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`id`, `email`, `name`, `firstname`, `password`, `birthdate`, `address`, `codePostal`, `ville`, `admin`, `tel`) VALUES
(1, 'admin@admin.fr', 'Administrateur', '', 'c4bf3ae6d247a5b1e93e683ab510a97c', '0000-00-00', '', '', '', 1, '');
