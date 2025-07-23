-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 23 juil. 2025 à 09:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `group4`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_date` date DEFAULT NULL,
  `number_of_guests` int(11) DEFAULT NULL,
  `total_price_yen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `tour_id`, `user_id`, `reservation_date`, `number_of_guests`, `total_price_yen`) VALUES
(1, 1, 8, '2025-07-01', 2, 46000),
(2, 5, 11, '2025-07-03', 4, 20000),
(3, 7, 6, '2025-07-05', 1, 96000),
(4, 12, 15, '2025-07-07', 3, 45000),
(5, 16, 3, '2025-07-09', 2, 120000),
(6, 22, 13, '2025-07-11', 5, 39000),
(7, 2, 7, '2025-07-02', 1, 23000),
(8, 6, 18, '2025-07-04', 6, 40000),
(9, 9, 10, '2025-07-06', 2, 52000),
(10, 14, 19, '2025-07-08', 1, 2400),
(11, 18, 4, '2025-07-10', 3, 360000),
(12, 24, 8, '2025-07-12', 4, 20000),
(13, 3, 9, '2025-07-03', 5, 135000),
(14, 8, 17, '2025-07-05', 2, 29000),
(16, 15, 20, '2025-07-09', 1, 1500),
(17, 20, 2, '2025-07-11', 4, 80000),
(18, 25, 14, '2025-07-13', 2, 10000),
(19, 4, 5, '2025-07-04', 2, 24000),
(20, 10, 12, '2025-07-06', 1, 9500),
(21, 13, 16, '2025-07-08', 3, 57000),
(22, 17, 9, '2025-07-10', 5, 400000),
(23, 21, 17, '2025-07-12', 2, 14600),
(24, 23, 1, '2025-07-14', 6, 45000),
(25, 1, 20, '2025-07-02', 3, 69000),
(26, 5, 16, '2025-07-04', 2, 10000),
(27, 7, 14, '2025-07-06', 4, 384000),
(28, 12, 5, '2025-07-08', 1, 15000),
(29, 16, 12, '2025-07-10', 5, 300000),
(30, 22, 16, '2025-07-12', 2, 15600),
(31, 2, 4, '2025-07-03', 4, 92000),
(32, 6, 8, '2025-07-05', 3, 40000),
(33, 9, 11, '2025-07-07', 1, 26000),
(34, 14, 6, '2025-07-09', 2, 4800),
(35, 18, 15, '2025-07-11', 6, 720000),
(36, 24, 3, '2025-07-13', 3, 15000),
(37, 3, 13, '2025-07-04', 2, 54000),
(38, 8, 7, '2025-07-06', 4, 58000),
(39, 11, 18, '2025-07-08', 5, 30000),
(40, 15, 10, '2025-07-10', 3, 4500),
(41, 20, 19, '2025-07-12', 1, 20000),
(42, 25, 9, '2025-07-14', 5, 25000),
(43, 4, 17, '2025-07-05', 3, 36000),
(45, 13, 20, '2025-07-09', 4, 76000),
(46, 17, 2, '2025-07-11', 1, 80000),
(47, 21, 14, '2025-07-13', 3, 21900),
(49, 1, 12, '2025-07-03', 4, 92000),
(50, 5, 16, '2025-07-05', 5, 5000),
(171, 20, 30, '2025-07-28', 15, 300000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_tour_id` (`tour_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_tour_id` FOREIGN KEY (`tour_id`) REFERENCES `tour_list` (`tour_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
