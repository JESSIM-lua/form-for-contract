-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 déc. 2023 à 20:54
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `var` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `autre` varchar(255) DEFAULT NULL,
  `autre2` varchar(255) DEFAULT NULL,
  `autre3` varchar(255) DEFAULT NULL,
  `DebutAcc` varchar(255) DEFAULT NULL,
  `nouvelInput` varchar(255) DEFAULT NULL,
  `contribPart` varchar(255) DEFAULT NULL,
  `profit` varchar(255) DEFAULT NULL,
  `signaturePad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `form`
--

INSERT INTO `form` (`id`, `date`, `var`, `nom`, `prenom`, `autre`, `autre2`, `autre3`, `DebutAcc`, `nouvelInput`, `contribPart`, `profit`, `signaturePad`) VALUES
(35, '0000-00-00', 1, 'LAIB', 'Ma VIE', 'sd', 'Jessim Laib', 'sd', 'WXCWXC', NULL, NULL, NULL, NULL),
(36, '0000-00-00', 1, 'LAIB', 'Jessim', 'sd', 'Jessim Laib', 'sd', 'WXCWXC', NULL, NULL, NULL, NULL),
(37, '0000-00-00', 1, 'LAIB', 'Jessim', 'sd', 'Jessim Laib', 'sd', 'WXCWXC', NULL, NULL, NULL, NULL),
(38, '0000-00-00', 1, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(39, '2023-12-16', 1, 'LAIB', 'Jessim', 'sd', 'Jessim Laib', 'sd', 'WXCWXC', NULL, NULL, NULL, NULL),
(40, '2023-12-16', 1, 'LAIB', 'Jessim', 'sd', 'Jessim Laib', 'sd', 'WXCWXC', NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
