-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 mars 2022 à 10:38
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `produits_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `idProd` int(11) NOT NULL AUTO_INCREMENT,
  `nomProd` varchar(255) NOT NULL,
  `descriptionProd` text NOT NULL,
  `prixProd` float(6,2) NOT NULL,
  `stockProd` tinyint(1) NOT NULL,
  `date-depot-Prod` date NOT NULL,
  `imgProd` varchar(255) NOT NULL,
  PRIMARY KEY (`idProd`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`idProd`, `nomProd`, `descriptionProd`, `prixProd`, `stockProd`, `date-depot-Prod`, `imgProd`) VALUES
(1, 'C# 10 and .NET 6', 'Modern Cross-Platform Development: Build apps, websites, and services with ASP.NET Core 6, Blazor, and EF Core 6 using Visual Studio 2022 and Visual Studio Code, 6th Edition', 47.43, 1, '2022-03-01', 'C:\\wamp64\\www\\test-1-sql\\images\\livre-1'),
(2, 'Programmer en langage C', 'Cours et exercices corrigés. Broché – Livre grand format', 18.00, 1, '2022-03-02', 'C:\\wamp64\\www\\test-1-sql\\images\\livre-2'),
(3, 'Algorithmique - Techniques fondamentales de programmation', 'Exemples en Python (nombreux exercices corrigés) - BTS, DUT informatique (2e édition) Broché – Livre grand format', 29.90, 1, '2022-03-02', 'C:\\wamp64\\www\\test-1-sql\\images\\livre-3');

-- --------------------------------------------------------

--
-- Structure de la table `pc portables`
--

DROP TABLE IF EXISTS `pc portables`;
CREATE TABLE IF NOT EXISTS `pc portables` (
  `idProd` int(11) NOT NULL AUTO_INCREMENT,
  `nomProd` varchar(255) NOT NULL,
  `descriptionProd` text NOT NULL,
  `prixProd` float(6,2) NOT NULL,
  `stockProd` tinyint(1) NOT NULL,
  `date-depot-Prod` date NOT NULL,
  `imgProd` text NOT NULL,
  PRIMARY KEY (`idProd`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pc portables`
--

INSERT INTO `pc portables` (`idProd`, `nomProd`, `descriptionProd`, `prixProd`, `stockProd`, `date-depot-Prod`, `imgProd`) VALUES
(1, 'DELL Precision 7750 ', '17.3\" 1920 x 1080 Pixels Intel Core i7-10xxx 16 GB 512 GB SSD NVIDIA Quadro RTX 3000 Windows 10 Pro', 4830.06, 1, '2022-03-03', 'C:\\wamp64\\www\\test-1-sql\\images\\pc1'),
(2, 'GIGABYTE AORUS 17 YA-7DE2150SH', 'i7-9750H 16Go / GB/1TB SSD 17\" FHD RTX2080 W10', 4805.10, 1, '2022-03-02', 'C:\\wamp64\\www\\test-1-sql\\images\\pc2'),
(3, 'DELL XPS 9710 ', '17\" 3840 x 2400 Pixels Écran Tactile Intel Core i7-11xxx 32 GB 1000 GB SSD NVIDIA GeForce RTX 3060 Windows 10 Pro', 4410.59, 1, '2022-03-03', 'C:\\wamp64\\www\\test-1-sql\\images\\pc3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
