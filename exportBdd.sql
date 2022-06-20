-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : lun. 20 juin 2022 à 14:57
-- Version du serveur : 8.0.29
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-shopper`
--

-- --------------------------------------------------------

--
-- Structure de la table `month_values`
--

CREATE TABLE `month_values` (
  `id` int NOT NULL,
  `months_list` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `month_values`
--

INSERT INTO `month_values` (`id`, `months_list`) VALUES
(1, 'a:13:{s:5:\"Janv.\";d:21.67;s:5:\"Fév.\";d:21.67;s:4:\"Mars\";d:21.67;s:5:\"Avril\";d:21.67;s:3:\"Mai\";d:21.67;s:4:\"Juin\";d:21.67;s:5:\"Juil.\";d:21.67;s:5:\"Août\";d:21.67;s:5:\"Setp.\";d:21.67;s:4:\"Oct.\";d:21.67;s:4:\"Nov.\";d:21.67;s:5:\"Déc.\";d:21.67;s:5:\"Total\";d:21.67;}'),
(2, 'a:13:{s:5:\"Janv.\";i:3;s:5:\"Fév.\";i:3;s:4:\"Mars\";i:3;s:5:\"Avril\";i:3;s:3:\"Mai\";i:3;s:4:\"Juin\";i:3;s:5:\"Juil.\";i:3;s:5:\"Août\";i:3;s:5:\"Setp.\";i:3;s:4:\"Oct.\";i:3;s:4:\"Nov.\";i:3;s:5:\"Déc.\";i:3;s:5:\"Total\";i:36;}'),
(3, 'a:13:{s:5:\"Janv.\";i:3;s:5:\"Fév.\";i:3;s:4:\"Mars\";i:3;s:5:\"Avril\";i:3;s:3:\"Mai\";i:3;s:4:\"Juin\";i:3;s:5:\"Juil.\";i:3;s:5:\"Août\";i:3;s:5:\"Setp.\";i:3;s:4:\"Oct.\";i:3;s:4:\"Nov.\";i:3;s:5:\"Déc.\";i:3;s:5:\"Total\";i:36;}'),
(4, 'a:13:{s:5:\"Janv.\";i:3;s:5:\"Fév.\";i:3;s:4:\"Mars\";i:3;s:5:\"Avril\";i:3;s:3:\"Mai\";i:3;s:4:\"Juin\";i:3;s:5:\"Juil.\";i:3;s:5:\"Août\";i:3;s:5:\"Setp.\";i:3;s:4:\"Oct.\";i:3;s:4:\"Nov.\";i:3;s:5:\"Déc.\";i:3;s:5:\"Total\";i:36;}');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `name`) VALUES
(1, 'Vitrerie'),
(2, 'Remise en état mensuelle');

-- --------------------------------------------------------

--
-- Structure de la table `service_worksite_months`
--

CREATE TABLE `service_worksite_months` (
  `service_id` int NOT NULL,
  `worksite_id` int NOT NULL,
  `months_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `service_worksite_months`
--

INSERT INTO `service_worksite_months` (`service_id`, `worksite_id`, `months_id`) VALUES
(1, 1, 1),
(1, 2, 4),
(2, 1, 2),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `worksite`
--

CREATE TABLE `worksite` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `worksite`
--

INSERT INTO `worksite` (`id`, `name`) VALUES
(1, 'AM PRODUCTION (AMP0301)'),
(2, 'ADOMOS (ADM0101)');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `month_values`
--
ALTER TABLE `month_values`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_worksite_months`
--
ALTER TABLE `service_worksite_months`
  ADD PRIMARY KEY (`service_id`,`worksite_id`);

--
-- Index pour la table `worksite`
--
ALTER TABLE `worksite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `month_values`
--
ALTER TABLE `month_values`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `worksite`
--
ALTER TABLE `worksite`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
