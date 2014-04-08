-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 06 Avril 2014 à 00:33
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `ID_classe` varchar(30) NOT NULL,
  `option` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `ID_cours` varchar(20) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `ID_utilisateur` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_cours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`ID_cours`, `titre`, `description`, `ID_utilisateur`) VALUES
('aa', 'aa', 'aa', 'aa'),
('oua', 'oua', 'oua', 'oua');

-- --------------------------------------------------------

--
-- Structure de la table `cours_x_classe`
--

CREATE TABLE IF NOT EXISTS `cours_x_classe` (
  `ID_classe` varchar(30) NOT NULL,
  `ID_cours` varchar(30) NOT NULL,
  KEY `fk3` (`ID_classe`),
  KEY `fk4` (`ID_cours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `document1`
--

CREATE TABLE IF NOT EXISTS `document1` (
  `ID_document` varchar(30) DEFAULT NULL,
  `ID_type_doc` varchar(30) DEFAULT NULL,
  `ID_cours` varchar(30) DEFAULT NULL,
  KEY `ID_cours` (`ID_cours`),
  KEY `fk2` (`ID_type_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `ID_droit` varchar(20) NOT NULL,
  `nom_droit` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_droit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `ID_etudiant` varchar(30) NOT NULL,
  `nom_etudiant` varchar(30) NOT NULL,
  `prenom_etudiant` varchar(30) NOT NULL,
  `cne` int(30) NOT NULL,
  `e-mail` varchar(30) NOT NULL,
  `ID_classe` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_etudiant`),
  KEY `fk5` (`ID_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `ID_role` int(20) NOT NULL,
  `nom_role` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`ID_role`, `nom_role`) VALUES
(1, 'admin'),
(2, 'professeur'),
(3, 'moderateur'),
(4, 'visiteur');

-- --------------------------------------------------------

--
-- Structure de la table `role_x_droit`
--

CREATE TABLE IF NOT EXISTS `role_x_droit` (
  `ID_role` int(20) NOT NULL,
  `ID_droit` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_role`,`ID_droit`),
  KEY `ID_droit` (`ID_droit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_doc`
--

CREATE TABLE IF NOT EXISTS `type_doc` (
  `ID_type_doc` varchar(20) NOT NULL,
  `num_typedoc` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_type_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_utilisateur` varchar(30) NOT NULL,
  `nom_utilisateur` varchar(30) NOT NULL,
  `prenom_utilisateur` varchar(30) NOT NULL,
  `e-mail` varchar(40) NOT NULL,
  `gsm` varchar(30) NOT NULL,
  `ID_role` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `e-mail`, `gsm`, `ID_role`, `login`, `password`) VALUES
('', 'sana', 'sana', 'saana@gmail.com', '06666666', '', 'admin', '1234');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cours_x_classe`
--
ALTER TABLE `cours_x_classe`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`ID_classe`) REFERENCES `classe` (`ID_classe`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`ID_cours`) REFERENCES `cours` (`ID_cours`);

--
-- Contraintes pour la table `document1`
--
ALTER TABLE `document1`
  ADD CONSTRAINT `document1_ibfk_1` FOREIGN KEY (`ID_cours`) REFERENCES `cours` (`ID_cours`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`ID_type_doc`) REFERENCES `type_doc` (`ID_type_doc`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`ID_classe`) REFERENCES `classe` (`ID_classe`);

--
-- Contraintes pour la table `role_x_droit`
--
ALTER TABLE `role_x_droit`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`ID_role`) REFERENCES `role` (`ID_role`),
  ADD CONSTRAINT `role_x_droit_ibfk_1` FOREIGN KEY (`ID_droit`) REFERENCES `droit` (`ID_droit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
